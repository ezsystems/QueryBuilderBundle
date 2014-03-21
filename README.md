# eZ Publish Query Builder bundle

This bundle for eZ Publish, the open-source CMS platform, provides a PHP API dedicated to fluently writing repository
queries. It is built to provide **accurate** and contextually relevant **code completion** as long as a rich PHP IDE is used
(**tested with PhpStorm, Eclipse and NetBeans**, works out of the box on all).

## Status: prototype

This bundle is provided as is. It is currently a working proof of concept:

- most metadata criteria will work (`parentLocationId`, `contentTypeIdentifier`, `dateModified`...)
- most metadata based sorting will work
- about 30% of field filters have been tested

It has only been tested with PhpStorm 7 and 8 so far.

## Installation

From your eZ Publish 5 installation, run `composer require ezsystems/query-builder-bundle.
Register the bundle in `ezpublish/EzPublishKernel.php:

```php
    public function registerBundles()
    {
        $bundles = array(
            new FrameworkBundle(),
            // [...]
            new NelmioCorsBundle(),
            new \EzSystems\QueryBuilder\EzSystemsQueryBuilderBundle()
        );
```

## Testing out the prototype

A command is available that can be used to test the builder: `php ezpublish/console query-builder:test`.
It will execute the query written in
`vendor/ezsystems/query-builder-bundle/EzSystems/QueryBuilderBundle/Command/QueryBuilderTestCommand.php`, and print
 out the results as a table.

 You can play with it, and test the various methods.

## Usage

The builder is obtained from the Symfony2 service container. The fluent API is used to configure the query's options,
and the `eZ\Publish\API\Values\Content\Query` object is obtained by using `getQuery()`:

```php
/** @var \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder */
$queryBuilder = $container->get( 'ezpublish.api.query_builder' );

// Filter on articles within sections #6 & #7 that have 'query' in their 'title' field, sorted by name
in an ascending order:

$queryBuilder
    ->contentTypeIdentifier()->eq( 'article' )
    ->sectionId()->in( 6, 7 )
    ->textLineField( 'title' )->contains( 'CMS' )
    ->sortBy()->contentName()->ascending();

// Get the query
$query = $queryBuilder->getQuery();

// Run the query using the search service
$results = $container->get( 'ezpublish.api.service.search' )->find( $query );
```

## License

This bundle is under **[GPL v2.0 license](http://www.gnu.org/licenses/gpl-2.0.html)**.
