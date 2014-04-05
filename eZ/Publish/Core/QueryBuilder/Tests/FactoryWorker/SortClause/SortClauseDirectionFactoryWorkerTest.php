<?php
/**
 * File containing the SortClauseDirectionFactoryWorkerTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\SortClause;

use eZ\Publish\API\Repository\Values\Content\Query;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\SortClauseBuilder;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactoryInterface;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\FactoryWorkerBaseTest;
use Mockery\MockInterface;
use Mockery as m;

/**
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
 */
class SortClauseDirectionFactoryWorkerTest extends FactoryWorkerBaseTest
{
    /** @var SortClauseDirectionFactoryWorker */
    protected $worker;

    /** @var SortClauseBuilder|MockInterface */
    protected $builder;

    /** @var SortClauseFactoryInterface|MockInterface */
    protected $factory;

    protected function createBuilder()
    {
        return m::mock( 'EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\SortClauseBuilder' );
    }

    protected function createFactory()
    {
        return m::mock( 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactoryInterface' );
    }

    protected function createWorker( $factory, $builder )
    {
        return new SortClauseDirectionFactoryWorker( $builder, $factory );
    }

    public function testDescending()
    {
        $sortClause = $this->createSortClauseMock();
        $this->factory->shouldReceive( 'setDirection' )->withArgs( array( Query::SORT_DESC ) );
        $this->factory->shouldReceive( 'create' )->andReturn( $sortClause );
        $this->builder->shouldReceive( 'addSortClause' )->withArgs( array( $sortClause ) )->andReturn( $this->builder );
        self::assertEquals( $this->builder, $this->worker->descending() );
    }

    public function testDesc()
    {
        $sortClause = $this->createSortClauseMock();
        $this->factory->shouldReceive( 'setDirection' )->withArgs( array( Query::SORT_DESC ) );
        $this->factory->shouldReceive( 'create' )->andReturn( $sortClause );
        $this->builder->shouldReceive( 'addSortClause' )->withArgs( array( $sortClause ) )->andReturn( $this->builder );
        self::assertEquals( $this->builder, $this->worker->desc() );
    }

    public function testAscending()
    {
        $sortClause = $this->createSortClauseMock();
        $this->factory->shouldReceive( 'setDirection' )->withArgs( array( Query::SORT_ASC ) );
        $this->factory->shouldReceive( 'create' )->andReturn( $sortClause );
        $this->builder->shouldReceive( 'addSortClause' )->withArgs( array( $sortClause ) )->andReturn( $this->builder );
        self::assertEquals( $this->builder, $this->worker->ascending() );
    }

    public function testAsc()
    {
        $sortClause = $this->createSortClauseMock();
        $this->factory->shouldReceive( 'setDirection' )->withArgs( array( Query::SORT_ASC ) );
        $this->factory->shouldReceive( 'create' )->andReturn( $sortClause );
        $this->builder->shouldReceive( 'addSortClause' )->withArgs( array( $sortClause ) )->andReturn( $this->builder );
        self::assertEquals( $this->builder, $this->worker->asc() );
    }

    /**
     * @return \eZ\Publish\API\Repository\Values\Content\Query\Criterion|MockInterface
     */
    public function createSortClauseMock()
    {
        return m::mock( '\eZ\Publish\API\Repository\Values\Content\Query\Criterion' );
    }
}
