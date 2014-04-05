<?php
/**
 * File containing the SortClauseFactoryTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests;
use eZ\Publish\API\Repository\Values\Content\Query;
use PHPUnit_Framework_TestCase;

/**
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactory
 */
class SortClauseFactoryTest extends FactoryTest
{
    protected function getBuiltClassName()
    {
        return 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\ContentId';
    }
    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactory
     */
    protected function createFactory()
    {
        return new \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactory(
            $this->getBuiltClassName()
        );
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
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactory::setTarget()
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactory::getTarget()
     */
    public function testTarget()
    {
        $this->assertPropertyWorks( 'target', 'foo' );
    }

    /**
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactory::setDirection()
     * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactory::getDirection()
     */
    public function testDirection()
    {
        $this->assertPropertyWorks( 'direction', Query::SORT_ASC );
    }

    protected function preCreate()
    {
        $this->factory->setDirection( Query::SORT_ASC );
    }
}
