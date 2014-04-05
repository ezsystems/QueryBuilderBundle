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
 * @method \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\BooleanCriterionFactoryWorker invoke()
 */
abstract class Boolean extends CriterionTest
{
    public function testIsTrue()
    {
        $this->invoke()->isTrue();
        $this->assertQueryMatches( '=',  '1' );
    }

    public function testIsFalse()
    {
        $this->invoke()->isFalse();
        $this->assertQueryMatches( '=',  '' );
    }
}
