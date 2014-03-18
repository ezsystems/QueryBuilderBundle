<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder;

/**
 * Fluent query building object.
 *
 * Can be used to :
 * - add metadata criteria, using the various methods available on the class: contentId, contentTypeIdentifier...
 * - add field criteria, using the field() method.
 * - set sorting criteria, using the sortBy() method.
 *
 * <code>
 * $queryBuilder
 *     ->contentTypeIdentifier( 'article' )
 *     ->sectionId( 4 )
 *     ->field()->checkbox( 'vip' )->isTrue()
 *     ->sortBy()->contentName()->ascending();
 * $query = $queryBuilder->getQuery();
 * </code>
 *
 * @method \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder or(\EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder $criterionBuilder) Start a LogicalOr criterion.
 * @method \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder and(\EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder $criterionBuilder) Start a LogicalAnd criterion.
 */
interface QueryBuilder extends CriterionBuilder
{
    /**
     * @return \eZ\Publish\API\Repository\Values\Content\Query
     */
    public function getQuery();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\SortClauseBuilder
     */
    public function sortBy();

    /**
     * Creates a new criterion builder. Must be used within logical expressions
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder
     */
    public function expr();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\IdCriterionFactoryWorker
     */
    public function contentTypeGroupId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\IdCriterionFactoryWorker
     */
    public function contentTypeId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\IdCriterionFactoryWorker
     */
    public function contentId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\CriterionFactoryWorker
     */
    public function depth();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\CriterionFactoryWorker
     */
    public function language();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\IdentifierCriterionFactoryWorker
     */
    public function contentTypeIdentifier();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\IdentifierCriterionFactoryWorker
     */
    public function sectionIdentifier();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\IdCriterionFactoryWorker
     */
    public function locationRemoteId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\IdCriterionFactoryWorker
     */
    public function locationId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\IdCriterionFactoryWorker
     */
    public function parentLocationId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\IdCriterionFactoryWorker
     */
    public function sectionId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\TextCriterionFactoryWorker
     */
    public function fullText();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\DateCriterionFactoryWorker
     */
    public function wasModified();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\DateCriterionFactoryWorker
     */
    public function wasCreated();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\TextCriterionFactoryWorker
     */
    public function authorField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\FileValueBuilder
     */
    public function binaryFileField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\BooleanCriterionFactoryWorker
     */
    public function checkboxField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\TextCriterionFactoryWorker
     */
    public function countryField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\DateCriterionFactoryWorker
     */
    public function dateField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\DateCriterionFactoryWorker
     */
    public function dateAndTimeField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\TextCriterionFactoryWorker
     */
    public function emailAddressField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\NumberCriterionFactoryWorker
     */
    public function floatField( $fieldIdentifier );

    public function imageField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\NumberCriterionFactoryWorker
     */
    public function integerField( $fieldIdentifier );

    public function keywordField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\MapLocationDistanceCriterionFactoryWorker
     */
    public function mapLocationField( $fieldIdentifier );

    public function mediaField( $fieldIdentifier );

    public function pageField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\NumberCriterionFactoryWorker
     */
    public function priceField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\RatingCriterionFactoryWorker
     */
    public function ratingField( $fieldIdentifier );

    public function relationField( $fieldIdentifier );

    public function relationListField( $fieldIdentifier );

    public function richTextField( $fieldIdentifier );

    public function selectionField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\TextCriterionFactoryWorker
     */
    public function textBlockField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\TextCriterionFactoryWorker
     */
    public function textLineField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\DateCriterionFactoryWorker
     */
    public function timeField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\TextCriterionFactoryWorker
     */
    public function urlField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\TextCriterionFactoryWorker
     */
    public function userField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder\TextCriterionFactoryWorker
     */
    public function xmlTextField( $fieldIdentifier );
}
