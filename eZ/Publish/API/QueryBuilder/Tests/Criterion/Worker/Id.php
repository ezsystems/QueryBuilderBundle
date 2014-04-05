<?php
/**
 * File containing the Id class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion\Worker;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion\CriterionTest;

/**
 * @method \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\IdCriterionFactoryWorker invoke()
 */
abstract class Id extends CriterionTest
{
    /**
     * Tests the eq( $value ) operator
     */
    public function testEq()
    {
        $this->invoke()->eq( 42 );
        $this->assertQueryMatches( '=', '42' );
    }

    /**
     * Tests the in( v1, v2, ..., vN ) operator
     */
    public function testIn()
    {
        $this->invoke()->in( 42, 5, 2048 );
        $this->assertQueryMatches( 'in', '(42, 5, 2048)' );
    }

    public function testNotIn()
    {
        self::markTestIncomplete( "@todo not tested yet" );
    }

    public function testNotEq()
    {
        self::markTestIncomplete( "@todo not tested yet" );
    }
}
