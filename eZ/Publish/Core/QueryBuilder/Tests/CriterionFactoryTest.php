<?php
/**
 * File containing the CriterionFactoryTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests;

use PHPUnit_Framework_TestCase;

/**
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory
 */
class CriterionFactoryTest extends FactoryTest
{
    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory */
    protected $factory;

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory
     */
    protected function createFactory()
    {
        return new \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory(
            $this->getBuiltClassName()
        );
    }

    /**
     * Returns the built class name.
     * @return string
     */
    protected function getBuiltClassName()
    {
        return 'eZ\Publish\API\Repository\Values\Content\Query\Criterion\ContentId';
    }

    /**
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactory::setClass()
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactory::getClass()
     */
    public function testClass()
    {
        $this->assertPropertyWorks( 'class', 'X\Y' );
    }

    /**
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory::setTarget()
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory::getTarget()
     */
    public function testTarget()
    {
        $this->assertPropertyWorks( 'target', 'foo' );
    }

    /**
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory::setOperator()
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory::getOperator()
     */
    public function testOperator()
    {
        $this->assertPropertyWorks( 'operator', '=' );
    }


    /**
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory::addValue()
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactory::getValue()
     */
    public function testAddValue()
    {
        $this->assertEquals( null, $this->factory->getValue(), "getValue with no value should return null" );

        $this->factory->addValue( 'foo' );
        $this->assertEquals( 'foo', $this->factory->getValue(), "getValue with one value should return the value" );

        $this->factory->addValue( 'bar' );
        $value = $this->factory->getValue();
        $this->assertInstanceOf( 'SplStack', $value, "getValue with more than one value should return the SplStack" );
        $this->assertEquals( 2, $value->count() );
        $this->assertEquals( 'foo', $value->shift() );
        $this->assertEquals( 'bar', $value->shift() );
    }

    protected function preCreate()
    {
        $this->factory->addValue( 'foo' );
    }
}
