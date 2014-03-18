<?php
/**
 * File containing the FieldValueBuilder class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FieldCriterionBuilder as FieldCriterionBuilderInterface;

class FieldCriterionBuilder extends BaseFieldCriterionBuilder implements FieldCriterionBuilderInterface
{
    public function author( $fieldIdentifier )
    {
        return $this->startCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function binaryFile( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function checkbox( $fieldIdentifier )
    {
        return $this->startCriterionFactoryWork( 'bool', $fieldIdentifier );
    }

    public function country( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function date( $fieldIdentifier )
    {
        return $this->startCriterionFactoryWork( 'date', $fieldIdentifier );
    }

    public function dateAndTime( $fieldIdentifier )
    {
        return $this->startCriterionFactoryWork( 'date', $fieldIdentifier );
    }

    public function emailAddress( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function float( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function image( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function integer( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function keyword( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function mapLocation( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function media( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function page( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function price( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function rating( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function relation( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function relationList( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function richText( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function selection( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function textBlock( $fieldIdentifier )
    {
        return $this->startCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function textLine( $fieldIdentifier )
    {
        return $this->startCriterionFactoryWork( 'text', $fieldIdentifier );
    }

    public function time( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function url( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function user( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }

    public function xmlText( $fieldIdentifier )
    {
        throw new \Exception( 'Not implemented yet' );
    }
}
