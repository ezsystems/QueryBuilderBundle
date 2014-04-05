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
 * @method \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\TextCriterionFactoryWorker invoke()
 */
abstract class Text extends CriterionTest
{
    public function testContains()
    {
        self::markTestSkipped( "@todo fix criterion, fails. 'contains' == 'like %foo%', currently 'like foo" );
        $this->invoke()->contains( 'foo' );
        $this->assertQueryMatches( 'like',  '%foo%' );
    }

    public function testLike()
    {
        $this->invoke()->like( 'foo' );
        $this->assertQueryMatches( 'like',  'foo' );
    }

    public function testEndsWith()
    {
        $this->invoke()->endsWith( 'foo' );
        $this->assertQueryMatches( 'like',  '%foo' );
    }

    public function testBeginsWith()
    {
        $this->invoke()->beginsWith( 'foo' );
        $this->assertQueryMatches( 'like',  'foo%' );
    }

    public function testMatches()
    {
        self::markTestSkipped( "@todo Feature not implemented" );
    }
}
