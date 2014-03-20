<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion\Operator;

class NumberCriterionFactoryWorker extends CriterionFactoryWorker
{
    public function eq( $value )
    {
        return $this->addCriterion( $value, Operator::EQ );
    }

    public function gt( $value )
    {
        return $this->addCriterion( $value, Operator::GT );
    }

    public function gte( $value )
    {
        return $this->addCriterion( $value, Operator::GTE );
    }

    public function lt( $value )
    {
        return $this->addCriterion( $value, Operator::LT );
    }

    public function lte( $value )
    {
        return $this->addCriterion( $value, Operator::LTE );
    }

    public function between( $minValue, $maxValue )
    {
        return $this->addCriterion( array( $minValue, $maxValue ), Operator::BETWEEN );
    }

    public function not()
    {
        throw new \Exception( "Not implemented yet" );
    }
}
