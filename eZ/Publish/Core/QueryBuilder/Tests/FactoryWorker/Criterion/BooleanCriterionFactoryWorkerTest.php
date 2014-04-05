<?php
/**
 * File containing the BooleanCriterionFactoryWorkerTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\Criterion;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion\Operator;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\BooleanCriterionFactoryWorker;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\Criterion\CriterionFactoryWorkerBaseTest;

/**
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\BooleanCriterionFactoryWorker
 */
class BooleanCriterionFactoryWorkerTest extends CriterionFactoryWorkerBaseTest
{
    public function testIsTrue()
    {
        $this->setExpectations( Operator::EQ, true );
        $this->worker->isTrue();
    }

    public function testIsFalse()
    {
        $this->setExpectations( Operator::EQ, false );
        $this->worker->isFalse();
    }

    protected function getWorkerClass()
    {
        return 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\BooleanCriterionFactoryWorker';
    }

    /** @var BooleanCriterionFactoryWorker */
    protected $worker;
}
