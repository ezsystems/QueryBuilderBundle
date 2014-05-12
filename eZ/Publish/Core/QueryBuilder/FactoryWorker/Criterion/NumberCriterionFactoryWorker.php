<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
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
}
