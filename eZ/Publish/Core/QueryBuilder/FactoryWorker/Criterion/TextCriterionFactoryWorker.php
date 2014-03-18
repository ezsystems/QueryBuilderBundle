<?php
/**
 * File containing the CriterionValueBuilder class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\FactoryWorker\Criterion;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\TextCriterionFactoryWorker as TextCriterionFactoryWorkerInterface;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

class TextCriterionFactoryWorker extends CriterionFactoryWorker implements TextCriterionFactoryWorkerInterface
{
    public function endsWith( $value )
    {
        return $this->addCriterion( "%$value", Criterion\Operator::LIKE );
    }

    public function beginsWith( $value )
    {
        return $this->addCriterion( "$value%", Criterion\Operator::LIKE );
    }

    public function contains( $value )
    {
        return $this->addCriterion( $value, Criterion\Operator::CONTAINS, $value );
    }

    public function like( $value )
    {
        return $this->addCriterion( $value, Criterion\Operator::LIKE, $value );
    }

    public function matches( $regexp )
    {
        throw new \Exception( "@todo not implemented (might not be at all, depends if operator can be supported)" );
    }
}
