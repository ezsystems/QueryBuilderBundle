<?php
/**
 * File containing the CriterionTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\BaseTest;

abstract class CriterionTest extends BaseTest
{
    /**
     * Returns the name of the criterion being tested
     * @return string
     */
    abstract protected function getCriterionName();

    /**
     * Returns the criterion string, as used in queries. Usually equals to {@see getCriterionName()}.
     * @return string
     */
    protected function getCriterionString()
    {
        return $this->getCriterionName();
    }

    /**
     * Tests that the current criterion with $operator and $value matches the built query.
     *
     * @param string $operator
     * @param string $value expected value as a string: "42", or "( 42, 5, 2048 )"
     */
    protected function assertQueryMatches( $operator, $value )
    {
        $this->assertQueryEquals(
            sprintf( '%s %s %s', $this->getCriterionString(), strtoupper( $operator ), $value )
        );
    }

    /**
     * Runs the criterion method, and returns the worker
     */
    protected function invoke()
    {
        $method = $this->getCriterionName();
        return $this->getQueryBuilder()->$method();
    }
}
