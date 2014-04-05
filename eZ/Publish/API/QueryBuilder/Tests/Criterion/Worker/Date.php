<?php
/**
 * File containing the Date CriterionTest worker.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion\Worker;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion\CriterionTest;

/**
 * @todo Add providers for different input formats
 * @method \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\DateCriterionFactoryWorker invoke()
 */
abstract class Date extends CriterionTest
{
    public function testBetween()
    {
        self::markTestSkipped( "@todo Feature not implemented" );
        $this->invoke()->between( 1234567, 1456789 );
        $this->assertQueryMatches( 'between',  '(1234567, 1456789)' );
    }

    public function testAt()
    {
        $this->invoke()->at( 123456789 );
        $this->assertQueryMatches( '=',  '123456789' );
    }

    public function testBefore()
    {
        $this->invoke()->before( 123456789 );
        $this->assertQueryMatches( '<',  '123456789' );
    }

    public function testAfter()
    {
        $this->invoke()->after( 123456789 );
        $this->assertQueryMatches( '>',  '123456789' );
    }
}
