<?php
/**
 * File containing the Number CriterionTest interface.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion\Worker;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion\CriterionTest;

/**
 * @method \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\NumberCriterionFactoryWorker invoke()
 */
abstract class Number extends CriterionTest
{
    public function testEq()
    {
        $this->invoke()->eq( 42 );
        $this->assertQueryMatches( '=',  '42' );
    }

    public function testGt()
    {
        $this->invoke()->gt( 42 );
        $this->assertQueryMatches( '>',  '42' );
    }

    public function testGte()
    {
        $this->invoke()->gte( 42 );
        $this->assertQueryMatches( '>=',  '42' );
    }

    public function testLt()
    {
        $this->invoke()->lt( 42 );
        $this->assertQueryMatches( '<',  '42' );
    }

    public function testLte()
    {
        $this->invoke()->lte( 42 );
        $this->assertQueryMatches( '<=',  '42' );
    }

    public function testBetween()
    {
        $this->invoke()->between( 42, 2048 );
        $this->assertQueryMatches( 'between',  '(42, 2048)' );
    }
}
