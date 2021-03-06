<?php
/**
 * File containing the ValueBuilder class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion;

use Exception;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionFactoryWorker as CriterionFactoryWorkerInterface;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionBuilderInterface;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryInterface;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

abstract class CriterionFactoryWorker implements CriterionFactoryWorkerInterface
{
    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\QueryBuilder */
    protected $queryBuilder;

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory */
    protected $criterionFactory;

    /**
     * @param \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory $criterionFactory
     * @param \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionBuilderInterface $builder
     */
    public function __construct( FactoryInterface $criterionFactory, CriterionBuilderInterface $builder )
    {
        $this->criterionFactory = $criterionFactory;
        $this->builder = $builder;
    }

    /**
     * Adds the calling criterion with $operator and $value to the query, and returns the builder
     * @param mixed $value
     * @param mixed $operator
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder
     */
    protected function addCriterion( $value, $operator )
    {
        $this->criterionFactory->addValue( $value );
        $this->criterionFactory->setOperator( $operator );
        $this->builder->addCriterion(
            $this->criterionFactory->create()
        );
        return $this->builder;
    }

    public function not()
    {
        $this->criterionFactory->negate();
        return $this;
    }
}
