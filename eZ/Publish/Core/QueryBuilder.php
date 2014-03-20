<?php
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core;

use Exception;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder as QueryBuilderInterface;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\BaseQueryBuilder;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

/**
 * @method \eZ\Publish\API\Repository\GeneratedQueryBuilder or(\EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder $criterionBuilder) Start a LogicalOr criterion.
 * @method \eZ\Publish\API\Repository\GeneratedQueryBuilder and(\EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder $criterionBuilder) Start a LogicalAnd criterion.
 */
class QueryBuilder extends BaseQueryBuilder implements QueryBuilderInterface
{
    public function contentId()
    {
        return $this->criterionBuilder->contentId();
    }

    public function contentTypeGroupId()
    {
        return $this->criterionBuilder->contentTypeGroupId();
    }

    public function contentTypeId()
    {
        return $this->criterionBuilder->contentTypeId();
    }

    public function contentTypeIdentifier()
    {
        return $this->criterionBuilder->contentTypeIdentifier();
    }

    public function wasCreated()
    {
        return $this->criterionBuilder->wasCreated();
    }

    public function wasModified()
    {
        return $this->criterionBuilder->wasModified();
    }

    public function depth()
    {
        throw new Exception( "Not implemented yet" );
        // $this->startCriterionFactory( 'text', 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\FullText' );
    }

    public function fullText()
    {
        return $this->criterionBuilder->fullText();
    }

    public function language()
    {
        throw new Exception( "Not implemented yet" );
    }

    public function locationId()
    {
        return $this->criterionBuilder->locationId();
    }

    public function locationRemoteId()
    {
        return $this->criterionBuilder->locationRemoteId();
    }

    public function sectionId()
    {
        return $this->criterionBuilder->sectionId();
    }

    public function sectionIdentifier()
    {
        return $this->criterionBuilder->sectionIdentifier();
    }

    public function parentLocationId()
    {
        return $this->criterionBuilder->parentLocationId();
    }

    public function authorField( $fieldIdentifier )
    {
        return $this->criterionBuilder->authorField( $fieldIdentifier );
    }

    public function binaryFileField( $fieldIdentifier )
    {
        return $this->criterionBuilder->binaryFileField( $fieldIdentifier );
    }

    public function checkboxField( $fieldIdentifier )
    {
        return $this->criterionBuilder->checkboxField( $fieldIdentifier );
    }

    public function countryField( $fieldIdentifier )
    {
        return $this->criterionBuilder->countryField( $fieldIdentifier );
    }

    public function dateField( $fieldIdentifier )
    {
        return $this->criterionBuilder->dateField( $fieldIdentifier );
    }

    public function dateAndTimeField( $fieldIdentifier )
    {
        return $this->criterionBuilder->dateAndTimeField( $fieldIdentifier );
    }

    public function emailAddressField( $fieldIdentifier )
    {
        return $this->criterionBuilder->emailAddressField( $fieldIdentifier );
    }

    public function floatField( $fieldIdentifier )
    {
        return $this->criterionBuilder->floatField( $fieldIdentifier );
    }

    public function imageField( $fieldIdentifier )
    {
        return $this->criterionBuilder->imageField( $fieldIdentifier );
    }

    public function integerField( $fieldIdentifier )
    {
        return $this->criterionBuilder->integerField( $fieldIdentifier );
    }

    public function keywordField( $fieldIdentifier )
    {
        return $this->criterionBuilder->keywordField( $fieldIdentifier );
    }

    public function mapLocationField( $fieldIdentifier )
    {
        return $this->criterionBuilder->mapLocationField( $fieldIdentifier );
    }

    public function mediaField( $fieldIdentifier )
    {
        return $this->criterionBuilder->mediaField( $fieldIdentifier );
    }

    public function pageField( $fieldIdentifier )
    {
        return $this->criterionBuilder->pageField( $fieldIdentifier );
    }

    public function priceField( $fieldIdentifier )
    {
        return $this->criterionBuilder->priceField( $fieldIdentifier );
    }

    public function ratingField( $fieldIdentifier )
    {
        return $this->criterionBuilder->ratingField( $fieldIdentifier );
    }

    public function relationField( $fieldIdentifier )
    {
        return $this->criterionBuilder->relationField( $fieldIdentifier );
    }

    public function relationListField( $fieldIdentifier )
    {
        return $this->criterionBuilder->relationListField( $fieldIdentifier );
    }

    public function richTextField( $fieldIdentifier )
    {
        return $this->criterionBuilder->richTextField( $fieldIdentifier );
    }

    public function selectionField( $fieldIdentifier )
    {
        return $this->criterionBuilder->selectionField( $fieldIdentifier );
    }

    public function textBlockField( $fieldIdentifier )
    {
        return $this->criterionBuilder->textBlockField( $fieldIdentifier );
    }

    public function textLineField( $fieldIdentifier )
    {
        return $this->criterionBuilder->textLineField( $fieldIdentifier );
    }

    public function timeField( $fieldIdentifier )
    {
        return $this->criterionBuilder->timeField( $fieldIdentifier );
    }

    public function urlField( $fieldIdentifier )
    {
        return $this->criterionBuilder->urlField( $fieldIdentifier );
    }

    public function userField( $fieldIdentifier )
    {
        return $this->criterionBuilder->userField( $fieldIdentifier );
    }

    public function xmlTextField( $fieldIdentifier )
    {
        return $this->criterionBuilder->xmlTextField( $fieldIdentifier );
    }
}
