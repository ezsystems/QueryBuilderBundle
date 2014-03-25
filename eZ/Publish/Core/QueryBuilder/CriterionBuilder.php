<?php
/**
 * File containing the CriterionBuilder class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder;

use Exception;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder as CriterionBuilderInterface;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\QueryBuilder;

/**
 * @method CriterionBuilder or(CriterionBuilder $criterionBuilder) Start a LogicalOr criterion. Terminate with {@see endOr()}.
 * @method CriterionBuilder and(CriterionBuilder $criterionBuilder) Start a LogicalAnd criterion. Terminate with {@see endAnd()}.
 */
class CriterionBuilder extends BaseCriterionBuilder implements CriterionBuilderInterface
{
    public function __construct( CriterionFactoryWorkerRegistry $criterionFactoryWorkerRegistry, QueryBuilder $parentBuilder = null)
    {
        parent::__construct( $criterionFactoryWorkerRegistry );
        $this->parentBuilder = $parentBuilder;
    }

    /**
     * Returns the builder that must be injected the product of the factories.
     *
     * Returns $this by default.
     *
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder
     */
    protected function getFactoryBuilder()
    {
        return $this->parentBuilder ?: $this;
    }

    public function contentId()
    {
        return $this->startCriterionFactoryWork(
            'id', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\ContentId'
        );
    }

    public function contentTypeGroupId()
    {
        return $this->startCriterionFactoryWork(
            'id', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\ContentTypeGroupId'
        );
    }

    public function contentTypeId()
    {
        return $this->startCriterionFactoryWork(
            'id', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\ContentTypeId'
        );
    }

    public function contentTypeIdentifier()
    {
        return $this->startCriterionFactoryWork(
            'identifier', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\ContentTypeIdentifier'
        );
    }

    public function wasCreated()
    {
        return $this->startCriterionFactoryWork(
            'date', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\DateMetadata', Criterion\DateMetadata::CREATED
        );
    }

    public function wasModified()
    {
        return $this->startCriterionFactoryWork(
            'date', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\DateMetadata', Criterion\DateMetadata::MODIFIED
        );
    }

    public function depth()
    {
        throw new Exception( "Not implemented yet" );
        // $this->startCriterionFactory( 'text', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\FullText' );
    }

    public function fullText()
    {
        return $this->startCriterionFactoryWork(
            'text', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\FullText'
        );
    }

    public function language()
    {
        throw new Exception( "Not implemented yet" );
    }

    public function locationId()
    {
        return $this->startCriterionFactoryWork(
            'id', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\LocationId'
        );
    }

    public function locationRemoteId()
    {
        return $this->startCriterionFactoryWork(
            'id', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\LocationRemoteId'
        );
    }

    public function sectionId()
    {
        return $this->startCriterionFactoryWork(
            'id', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\SectionId'
        );
    }

    public function sectionIdentifier()
    {
        return $this->startCriterionFactoryWork(
            'identifier', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\SectionIdentifier'
        );
    }

    public function parentLocationId()
    {
        return $this->startCriterionFactoryWork(
            'id', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\ParentLocationId'
        );
    }

    public function authorField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function binaryFileField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function checkboxField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'bool', $fieldIdentifier );
    }

    public function countryField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function dateField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'date', $fieldIdentifier );
    }

    public function dateAndTimeField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'date', $fieldIdentifier );
    }

    public function emailAddressField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'date', $fieldIdentifier );
    }

    public function floatField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'number', $fieldIdentifier );
    }

    public function imageField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function integerField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'number', $fieldIdentifier );
    }

    public function keywordField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function mapLocationField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'map_location', $fieldIdentifier, 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\MapLocationDistance' );
    }

    public function mediaField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function pageField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function priceField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'number', $fieldIdentifier );
    }

    public function ratingField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'rating', $fieldIdentifier );
    }

    public function relationField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function relationListField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function richTextField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function selectionField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function textBlockField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function textLineField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function timeField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'date', $fieldIdentifier );
    }

    public function urlField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function userField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function xmlTextField( $fieldIdentifier )
    {
        return $this->startFieldCriterionFactoryWork( 'text', $fieldIdentifier );
    }
}
