<?php
/**
 * File containing the BuilderTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests;

use PHPUnit_Framework_TestCase;

abstract class BuilderTest extends PHPUnit_Framework_TestCase
{

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseBuilder */
    protected $builder;

    public function setUp()
    {
        $this->builder = $this->createBuilder();
    }

    /**
     * Returns the FQN of the builder being tested
     * @return object Builder object (@todo Add interface)
     */
    abstract protected function createBuilder();

    /**
     * Returns the tested methods and their test data
     */
    abstract public function methodsProvider();

    /**
     * Returns the method used to add an item to the builder
     * @todo Refactor builder into one base interface with a common add method
     * @return string
     */
    abstract protected function getAddMethod();

    /**
     * @dataProvider methodsProvider
     * @param string $method The method to test/call
     * @param string $expectedSortClauseType
     * @param string $chainedMethod The method to invoke after $method
     */
    public function testMethod( $method, $expectedSortClauseType, $chainedMethod )
    {
        if ( !method_exists( $this->builder, $method ) )
            PHPUnit_Framework_Assert::fail( "Unknown method $method" );

        $this->queryBuilder
            ->shouldReceive( $this->getAddMethod() )->with( \Mockery::type( $expectedSortClauseType ) )
            ->andReturn( $this->queryBuilder );

        /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker $worker */
        $worker = $this->builder->$method();

        $this->assertInstanceOf(
            'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker',
            $worker
        );

        // Nasty, but required for now. Needs refactoring in order to validate which SortClause is being worked on
        $worker->$chainedMethod();
    }
}
