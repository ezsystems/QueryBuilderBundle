<?php
/**
 * File containing the SortClausTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\SortClause;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\BaseTest;

/**
 * Base class for a SortClause API test.
 *
 * Calls the criterion provided with
 */
abstract class SortClauseTest extends BaseTest
{
    /**
     * Returns the sortBy() QueryBuilder method being tested.
     * @return string
     */
    abstract protected function getMethod();

    /**
     * Returns the SortClause string representing the generated SortClause. Usually equals to the method name.
     * @return string
     */
    protected function getSortClauseName()
    {
        return $this->getMethod();
    }


    /**
     * @dataProvider methodProvider
     */
    public function testAsc( $sortMethod, $expectedSortClauseClass )
    {
        $this->getQueryBuilder()->sortBy()->$sortMethod()->asc();
        $this->assertQueryIsSortedBy( $expectedSortClauseClass, 'ascending' );
    }

    /**
     * @dataProvider methodProvider
     */
    public function testDesc( $sortMethod, $expectedSortClauseClass )
    {
        $this->getQueryBuilder()->sortBy()->$sortMethod()->desc();
        $this->assertQueryIsSortedBy( $expectedSortClauseClass, 'descending' );
    }

    /**
     * @dataProvider methodProvider
     */
    public function testAscending( $sortMethod, $expectedSortClauseClass )
    {
        $this->getQueryBuilder()->sortBy()->$sortMethod()->ascending();
        $this->assertQueryIsSortedBy( $expectedSortClauseClass, 'ascending' );
    }

    /**
     * @dataProvider methodProvider
     */
    public function testDescending( $sortMethod, $expectedSortClauseClass )
    {
        $this->getQueryBuilder()->sortBy()->$sortMethod()->descending();
        $this->assertQueryIsSortedBy( $expectedSortClauseClass, 'descending' );
    }

    public function methodProvider()
    {
        return array(
            array( $this->getMethod(), $this->getSortClauseName() )
        );
    }
    /**
     * Tests that the current criterion with $operator and $value matches the built query.
     * @param string $direction asc or desc
     */
    protected function assertQueryIsSortedBy( $sortClauseClass, $direction )
    {
        $query = $this->getQueryBuilder()->getQuery();
        $this->assertEquals(
            sprintf( "SORT BY %s %s", $sortClauseClass, $direction ),
            (string)$query
        );
    }
}
