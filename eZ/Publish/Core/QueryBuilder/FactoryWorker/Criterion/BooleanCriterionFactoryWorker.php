<?php
/**
 * File containing the CriterionValueBuilder class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion;

use DateTime;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\BooleanCriterionFactoryWorker as BooleanCriterionFactoryWorkerInterface;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\Operator;

/**
 * Sets the operator + value for a criterion, and returns the query builder with the added criterion
 */
class BooleanCriterionFactoryWorker extends CriterionFactoryWorker implements BooleanCriterionFactoryWorkerInterface
{
    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder
     */
    public function isTrue()
    {
        return $this->addCriterion( true, Operator::EQ );
    }

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder
     */
    public function isFalse()
    {
        return $this->addCriterion( false, Operator::EQ );
    }
}
