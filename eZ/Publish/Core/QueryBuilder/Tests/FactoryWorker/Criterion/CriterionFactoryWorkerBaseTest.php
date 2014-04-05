<?php
/**
 * File containing the CriterionFactoryWorkerBaseTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\Criterion;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactoryInterface;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\FactoryWorkerBaseTest;
use Mockery as m;
use Mockery\MockInterface;

abstract class CriterionFactoryWorkerBaseTest extends FactoryWorkerBaseTest
{
    /** @var CriterionBuilder|MockInterface */
    protected $builder;

    /** @var CriterionFactoryInterface|MockInterface */
    protected $factory;

    protected function createBuilder()
    {
        return m::mock( 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionBuilderInterface' );
    }

    protected function createFactory()
    {
        return m::mock( 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactoryInterface' );
    }

    protected function createWorker( $factory, $builder )
    {
        $workerClass = $this->getWorkerClass();
        return new $workerClass( $factory, $builder );
    }

    /**
     * Returns the FQN of the worker being tested
     * @return string
     */
    abstract protected function getWorkerClass();

    /**
     * @return \eZ\Publish\API\Repository\Values\Content\Query\Criterion|MockInterface
     */
    protected function createCriterionMock()
    {
        return m::mock( '\eZ\Publish\API\Repository\Values\Content\Query\Criterion' );
    }

    /**
     * Helper that sets $operator, $value and $target for the calls setting up the criterion
     *
     * Doesn't allow setting a different value for method argument and factory expectations.
     *
     * @param string $operator
     * @param string $value
     * @param string $target
     */
    protected function setExpectations( $operator, $value, $target = null )
    {
        $criterion = $this->createCriterionMock();

        $this->factory->shouldReceive( 'addValue' )->with( $value );
        $this->factory->shouldReceive( 'setOperator' )->with( $operator );

        if ( isset( $target ) )
        {
            $this->factory->shouldReceive( 'setTarget' )->with( $target );
        }
        $this->factory->shouldReceive( 'create' )->andReturn( $criterion );
        $this->builder->shouldReceive( 'addCriterion' )->with( $criterion )->andReturn( $this->builder );

        // @todo Test created criterion ? Or is the CriterionFactory enough ? See with coverage.
    }

    /**
     * Helper that adds
     */
    protected function addValueExpectation( $value )
    {
        $this->factory->shouldReceive( 'addValue' )->with( $value );
    }
}
