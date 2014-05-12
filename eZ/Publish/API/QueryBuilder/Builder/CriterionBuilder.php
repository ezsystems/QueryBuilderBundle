<?php
/**
 * File containing the CriterionBuilder class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder;

/**
 * @method CriterionBuilder or(CriterionBuilder $criterionBuilder) Start a LogicalOr criterion.
 * @method CriterionBuilder and(CriterionBuilder $criterionBuilder) Start a LogicalAnd criterion.
 */
interface CriterionBuilder extends LogicalCriterionBuilder
{
    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\IdCriterionFactoryWorker
     */
    public function contentTypeGroupId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\IdCriterionFactoryWorker
     */
    public function contentTypeId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\IdCriterionFactoryWorker
     */
    public function contentId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\CriterionFactoryWorker
     */
    public function depth();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\CriterionFactoryWorker
     */
    public function language();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\IdentifierCriterionFactoryWorker
     */
    public function contentTypeIdentifier();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\IdentifierCriterionFactoryWorker
     */
    public function sectionIdentifier();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\IdCriterionFactoryWorker
     */
    public function locationRemoteId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\IdCriterionFactoryWorker
     */
    public function locationId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\IdCriterionFactoryWorker
     */
    public function parentLocationId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\IdCriterionFactoryWorker
     */
    public function sectionId();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\TextCriterionFactoryWorker
     */
    public function fullText();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\DateCriterionFactoryWorker
     */
    public function wasModified();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\DateCriterionFactoryWorker
     */
    public function wasCreated();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\TextCriterionFactoryWorker
     */
    public function authorField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\FileValueBuilder
     */
    public function binaryFileField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\BooleanCriterionFactoryWorker
     */
    public function checkboxField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\TextCriterionFactoryWorker
     */
    public function countryField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\DateCriterionFactoryWorker
     */
    public function dateField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\DateCriterionFactoryWorker
     */
    public function dateAndTimeField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\TextCriterionFactoryWorker
     */
    public function emailAddressField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\NumberCriterionFactoryWorker
     */
    public function floatField( $fieldIdentifier );

    public function imageField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\NumberCriterionFactoryWorker
     */
    public function integerField( $fieldIdentifier );

    public function keywordField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\MapLocationDistanceCriterionFactoryWorker
     */
    public function mapLocationField( $fieldIdentifier );

    public function mediaField( $fieldIdentifier );

    public function pageField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\NumberCriterionFactoryWorker
     */
    public function priceField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\RatingCriterionFactoryWorker
     */
    public function ratingField( $fieldIdentifier );

    public function relationField( $fieldIdentifier );

    public function relationListField( $fieldIdentifier );

    public function richTextField( $fieldIdentifier );

    public function selectionField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\TextCriterionFactoryWorker
     */
    public function textBlockField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\TextCriterionFactoryWorker
     */
    public function textLineField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\DateCriterionFactoryWorker
     */
    public function timeField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\TextCriterionFactoryWorker
     */
    public function urlField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\TextCriterionFactoryWorker
     */
    public function userField( $fieldIdentifier );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder\TextCriterionFactoryWorker
     */
    public function xmlTextField( $fieldIdentifier );
}
