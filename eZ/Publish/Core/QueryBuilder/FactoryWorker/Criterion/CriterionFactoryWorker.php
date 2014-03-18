<?php
/**
 * File containing the ValueBuilder class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\FactoryWorker\Criterion;

use Exception;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\CriterionFactory;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionFactoryWorker as CriterionFactoryWorkerInterface;

abstract class CriterionFactoryWorker implements CriterionFactoryWorkerInterface
{
    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder */
    protected $queryBuilder;

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\CriterionFactory */
    protected $criterionFactory;

    /**
     * @param \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\CriterionFactory $criterionFactory
     * @param \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\CriterionBuilderInterface $builder
     */
    public function __construct( CriterionFactory $criterionFactory, CriterionBuilder $builder )
    {
        $this->criterionFactory = $criterionFactory;
        $this->builder = $builder;
    }

    /**
     * Adds the calling criterion with $operator and $value to the query, and returns the builder
     * @param mixed $value
     * @param mixed $operator
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
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
        throw new Exception( "Not implemented" );
        // return $this->queryBuilder;
    }
}
