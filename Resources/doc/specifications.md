# Simplified search API, aka QueryBuilder
> - http://jira.ez.no/browse/EZP-22438
> - WIP branch: [bdunogier/ezpublish-kernel/EZP-22438-query_builder_generator](https://github.com/bdunogier/ezpublish-kernel/tree/EZP-22438-query_builder_generator)
> - [Feedback gathering blog post](http://share.ez.no/blogs/core-development-team/call-for-developer-feedback-the-query-builder)

The objective is to conceive a fluent, easy to use API to build location and content search queries. The keyword is **fluent**, as defined by [Martin Fowler](http://martinfowler.com/bliki/FluentInterface.html): the API methods should match the Domain Language as closely as possible. Chaining of methods is esthetic sugar, but required sugar if we want IDEs to provide contextual completion that *always* makes sense. Within a given context, the IDE  should suggests valid elements, and valid elements should always be suggested.

## Architecture

### The QueryBuilder object
This object does one thing: it builds a query. The query is parametered by calling a sequence of methods that add criterion, sortclause and facet objects to an internal `eZ\Publish\API\Repository\Values\Content\Query` (or Location Query) instance.

The built query can be obtained at any time using the `getQuery()` method.

Methods must be called in a specific order:

1. metadata criteria methods first
2. then in any order (see Check filtering namespaces and calling order/sequence note at the bottom)
    - `field()`
    - `facets()` (name TBD)
    - `sortBy()`


### Content/Location metadata criteria
Each metadata criterion (ContentId, ModificationDate, ContentTypeIdentifier...) has its own method in the `QueryBuilder` class: `contentId()`, `modificationDate()` (or `wasModified()` ?), `contentTypeIdentifier()`. They don't accept parameters.

```php
$queryBuilder->contentTypeIdentifier();
$queryBuilder->contentId();
$queryBuilder->wasModified();
```

Those method return an instance of a subclass of `CriterionBuilder` (currently `ValueBuilder`): `DateCriterionBuilder`, `IdCriterionBuilder`..., depending on the type of data this criterion filters on.

#### CriterionBuilder objects
Those objects have a set of explicit methods to filter with: `eq()` (alias to `equals` for verbosity ?), `between()`, `before()`... They accept the value(s) to filter against as their argument(s), and may perform additional, flexible transformations on the input value:

```php
// array is implicit, with variable arguments list
$queryBuilder->contentTypeIdentifier->in( 'article', 'blog_post' );
$queryBuilder->contentId()->eq( 42 );
// transformed via strtotime(); may also accept a DateTime object
$queryBuilder->wasModified()->after( 'last monday' );
```

Calling those will:
- generate a Criterion object;
- add it to the query being built;
- return the `QueryBuilder` object, allowing for further criterion calls:

```php
$queryBuilder
    ->contentTypeIdentifier->in( 'article', 'blog_post' ),
    ->contentId()->eq( 42 ),
    ->wasModified()->after( 'last monday' );
```

### Fields criteria
> How is field filtering handled ?

Each field will support its own type of filtering. This type has a semantical meaning: string, number, date...

Field filtering is done in a specific namespace, like sorting below. All methods are obtained from the `FieldCriterionBuilder` object returned by the `field()` method. It has one method per FieldType, named after the type itself: `textLine()`, `url()`, `author()`. Those methods accept a `FieldDefinition` identifier as their argument:

```php
$queryBuilder()->field()->textLine( 'title' );
$queryBuilder()->field()->dateTime( 'event_date' );
```

Those methods return a CriterionBuilder of a subclass that depends on the filtered FieldType. `dateTime()` return a `DateCriterionBuilder`, `TextLine` a `TextCriterionBuilder`, and `Integer` a `NummericCriterionBuilder` (not prototyped yet, CriterionBuilder classes are geared towards semantical types like 'id' or 'identifier).

#### CriterionBuilder for fields
They have exactly the same behaviour, and should be identical. They:
- provide "operator" methods (`eq()`, `between()`, depending on their type);
- instanciate the Field criterion object specified by the calling criterion method;
- add the Criterion to the query builder;
- return the `FieldCriterionBuilder`, so that more field criteria can be added.

```php
$queryBuilder()->field()->textLine( 'title' )->beginsWith( 'eZ' );
$queryBuilder()->field()->dateTime( 'event_date' )->before( 'last monday' );
```

#### Discoverability
The FieldType should be the one documenting this, by implementing an interface (`StringSearchable`, `NumberSearchable` ?). Can those belong to the API ? At the very least, it should be possible to implement extra services/interfaces that provide this "mapping".

## Sorting
Sorting is "namespaced" into the `sortBy()` method. It returns a `SortClauseBuilder` object, that has its own methods. Those match the `SortClause` objects from the [eZ\Publish\API\Repository\Values\Content\Query\SortClause] namespace (or implementing the matching interface):
- `ContentId` => `contentId()`;
- `DatePublished` => `datePublished()`

```php
$queryBuilder->sortBy()->datePublished();
```

Those methods return a `SortClauseDirectionBuilder` object, that has two methods: `descending()` and `ascending()`. They will:
- instanciate the `SortClause` object;
- set the direction based on which method was called
- return the `SortClauseBuilder` object

### "Exiting" methods
The `SortClauseBuilder` also provides "proxy" methods from the QueryBuilder, that will exit from the "sorting namespace":
- `getQuery()`
- methods that would grant access to other "namespaces", like facetting.

[eZ\Publish\API\Repository\Values\Content\Query\SortClause]: https://github.com/ezsystems/ezpublish-kernel/tree/master/eZ/Publish/API/Repository/Values/Content/Query/SortClause 

## Facetting
> How are they presented semantically speaking ? Facet ? Group ? 

The term "facetting" is clearly part of the search domain, while "grouping" is from the SQL domain ? 

# Open questions and todos

### Rename ValueBuilder to CriterionBuilder ?
> **done**, renamed to CriterionFactoryWorker, and moved to `eZ/Publish/API/Repository/`

Sounds like it works...
  - IdCriterionBuilder
  - DateCriterionBuilder
  - TextCriterionBuilder

### Check inheritance of generated query builder
> The kernel must contain a pre-generated QueryBuilder (possibly updated via generation ?)

Should the generated query builder extend the native one, or should it only extend the base one ?
Should the generated query builder only *add* methods based on what is *added* to the system ? Or is the whole builder dynamic depending on the system ? e.g. are native criterion and fields unmutable, or can their behaviour be overridden ?

### Namespacing
> Does it belong in `eZ/Publish/API/Repository` ?

If `eZ/Publish/API/Repository` is only meant for the API repository, it could be moved to another namespace
However, it should still be a higher level API, part of a namespace explicitely documented as *public* and *maintained*. **SiteAPI** ? Don't  like the name very much though.

Suggestions:
1. `eZ\Publish\API\QueryBuilder`
2. `eZ\Publish\SiteAPI\QueryBuilder`

### Do we need a query builder interface in API ?
It would mean that this API is *public*. We need to distinguish the implementation from the interface, and a clear interface should be generated.

### Check filtering namespaces and calling order/sequence
`sortBy` and `field()` have their own "namespace". Make sure you can, from any "filtering namespace", go to another one. Or should we enforce an order:

1. metadata
2. fields
3. facetting
4. sorting

In this case, we *have* to be able to jump to another step, not only to the next one. We could have metadata + sorting.

### The 'not()' method
Available in all criterion factory workers, not() will negate the following operator statement: `$queryBuilder->sectionIdentifier()->not()->in( 'article' )`.

### Implement semantical value builders in eZ\Publish\API\Repository\QueryBuilder\ValueBuilder:
  1. NumberValueBuilder
  2. MapLocationValueBuilder
  3. RatingValueBuilder

### Implement actual sorting in SortClauseBuilder
> **Done**

Where is the SortClause object created and added to the query ?

### Specify & implement limit/offset

### Logical operators
This is a wee bit of an issue. We kind of need a recursive builder for this, since we are going to build sets of criteria, grouped by the logical operator.

A logical operator applies to metadata & field criterion generation. Other operations must not be suggested.

#### Plan A: operator as the parent
When invoked, logical operators "open" a logical group. The group is closed with a matching `endOr`/`endAnd` methods.

```php
$queryBuilder
  ->or()
    ->parentLocationId()->eq(2)
    ->contentTypeIdentifier()->eq( 'blog_post' )
    ->endOr();
```

> Pros: nested logical operations are possible
> Cons: having to terminate the statement is tedious; the termination statements need to be suggested at QueryBuilder level, or they're not available on the finishing worker return

#### Plan B: operator as a chained worker
The method is invoked *after* a criterion has been created, and links the conditions together.

```php
$queryBuilder
  ->parentLocationId()->eq(2)
  ->or()
  ->contentTypeIdentifier()->eq('blog_post');
```

> Pros: easier to read and write; no termination statement
> Cons: no grouped statements. Maybe with a trick, but nothing natural that comes to mind...

#### Plan C: break building chain for logical statements
This may imply a major change, but would make logical statements MUCH more readable. Logical statements (or/and) are "ending" statements. Nesting of those statements is provided by the nesting of those calls. It avoids "custom" termination statements, since nesting is done the usual way, with parenthesis.

```php
/** @var $builder \eZ\Publish\API\Repository\QueryBuilder */
$criterionBuilder = $builder->criterion();
$criterionBuilder->or( // RV requirements: and(), or(), sortBy(), getQuery() (a QueryBuilder)
  $criterionBuilder
    ->parentLocationId()->eq(2) // RV requirements: something that can be used by the calling `or()` to add the created elements to
    ->and(
      $criterionBuilder
        ->contentTypeIdentifier()->in('article', 'blog_post')
        ->sectionIdentifier()->eq('vip')
  )
)->sortBy();
  ->datePublished()->descending()
  ->contentName()->ascending();
```

**What if...* the top-level QueryBuilder acted as a Proxy to the criterion builder ? `API\QueryBuilder implements CriterionBuilderInterface`, that builds `Criterion` objects. The implementation of this interface within `QueryBuilder` forward the calls to the `Core\CriterionBuilder` it has as a property. `Core\CriterionBuilder` *implementation* implements `CriterionBuilderInterface` and `LogicalBuilderInterface`. `Core\CriterionBuilder` can be obtained by calling `$queryBuilder->criterion()`. It *does* expose the logical methods (not exposed by QueryBuilder, that does *not* implement `LogicalBuilderInterface`. Doesn't work: we still use the same instance of the CriterionBuilder, who *needs* to inject something back into the QueryBuilder, while it should inject it into the logical criterion being built.

**What if...* we separated building a (more) complex expression from building a simple one ? The logical methods expect a set of built criteria. Those criteria must be buildable using a fluent, yet contextually correct, API, that only exposes criterion + logical methods. A QueryBuilder::expr() method (or expression), that *needs* to be called whenever a new logical expression is startd could work: it would *instantiate a new CriterionBuilder*, that implements `LogicalCriterionBuilder`, `MetadataCriterionBuilder` and `FieldCriterionBuilder`.
`QueryBuilder` itself implements `LogicalCriterionBuilder`, `MetadataCriterionBuilder` and `FieldCriterionBuilder`, but also `QueryBuilder` (that has `sortBy()`, `getQuery()`...).

```php
// simple query
$queryBuilder
  ->contentTypeIdentifier()->eq('article')
  ->sortBy()->datePublished()->descending();
  
// complex query
$queryBuilder->or(
  $queryBuilder->expr()
    ->parentLocationId()->eq(2) // RV requirements: something that can be used by the calling `or()` to add the created elements to 
    ->and(
      $queryBuilder->expr()
        ->contentTypeIdentifier()->in('article', 'blog_post')
        ->sectionIdentifier()->eq('vip')
  )
```

The first "or()" is called on the `QueryBuilder` itself. It will take whatever it receives as an argument (a `CriterionBuilder` object), and extract a set of criterion objects from it.

The call to `$queryBuilder->expr()` returns a new `CriterionBuilder`. It only exposes `CriterionBuilder` (implements `LogicalCriterionBuilder`, `MetadataCriterionBuilder` and `FieldCriterionBuilder`), and won't suggest methods that apply to the QueryBuilder. Problem: `FactoryWorker` objects have no way of knowing that they're called from another context, and must suggest methods from the `QueryBuilder` interface...

What if... methods from the `CriterionBuilder` interface were *documented* as returning a `QueryBuilder` ? They would expose `sortBy()` and stuff. The "real" `CriterionBuilder` interface, *returned by `expr()`*, wouldn't expose those. Problem is: FactoryWorker objects... their (documented...) return value can't *vary*, and expose **either `QueryBuilder` OR `CriterionBuilder`**. Then what if again, the `QueryBuilder` interface exposed *different* interfaces ?
- `QueryBuilder::contentId()` returns a `FactoryWorker\QueryBuilder\CriterionQuery\Id` interface
- `CriterionBuilder::contentId()` returns a `FactoryWorker\CriterionBuilder\CriterionQuery\Id` interface
Only the `CriterionBuilder` one is implemented, the other one is only used for phpdoc.
Workers in `FactoryWorker\QueryBuilder\CriterionQuery`, only used within the context of the `QueryBuilder`, return instances of each other and/or a `QueryBuilder` instance. They expose follow-up methods like `sortBy()`
Workers in `FactoryWorker\CriterionBuilder\CriterionQuery`, only used within the context of a `CriterionBuilder` , return instances of each other and/or a `CriterionBuilder` instance. They don't expose follow-up methods like `sortBy()`.

##### Potential pitfall: return values
Multiple queries can't be built simultaneously. Is this really an issue ? Do we expect this to be possible ? I don't think so...

This is all about the "state" of the builder. How does the builder "know" that we are building a nested query ? It kinda has to be recursive, doesn't it ? What is each call supposed to return ?

The return value of an 'or()' statement needs to provide proper code completion for further calls on the builder (more criteria, sortBy() or getQuery(). It is also, in some cases, passed as an argument to a logical operator (and/or). This means that logical operators accept as their argument a builder object ! They should then be able to use the builder object to get the built criteria, and create their logical criterion based on those.

Can we prevent sortBy and getQuery from being called within the context of an "or" ? Probably not, since we start from the *same QueryBuilder object*. It doesn't have a way of "knowing" what is being done, and we can't have it document its return value differently.


### Add support for the filter/query differenciation
> https://github.com/ezsystems/ezpublish-kernel/pull/497

Queries now differenciate between filtering and querying, via the `Query::$filter` and `Query::$query` properties. Default criteria should go to `$filter`, but `$query` should also be available.

> Written with [StackEdit](https://stackedit.io/).
