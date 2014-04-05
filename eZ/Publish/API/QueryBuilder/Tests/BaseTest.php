<?php
/**
 * File containing the BaseTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactoryWorkerRegistry;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\QueryBuilder;
use PHPUnit_Framework_TestCase;

/**
 * Base QueryBuilder API test.
 * Provides facilities to validate a building chain
 */
abstract class BaseTest extends PHPUnit_Framework_TestCase
{
    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder */
    private $queryBuilder;

    public function setUp()
    {
        $this->queryBuilder = new QueryBuilder(
            new CriterionFactoryWorkerRegistry()
        );
    }

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder
     */
    protected function getQueryBuilder()
    {
        return $this->queryBuilder;
    }

    /**
     * Tests that the current query is equals (as a string) to $expectedQueryString
     * @param string $expectedQueryString
     */
    protected function assertQueryEquals( $expectedQueryString )
    {
        $this->assertEquals(
            $expectedQueryString,
            (string)$this->queryBuilder->getQuery()
        );
    }
}
