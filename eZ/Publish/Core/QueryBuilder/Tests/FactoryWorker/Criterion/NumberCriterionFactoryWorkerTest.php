<?php
/**
 * File containing the NumberCriterionFactoryWorkerTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\Criterion;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion\Operator;

/**
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\NumberCriterionFactoryWorker
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\CriterionFactoryWorker
 */
class NumberCriterionFactoryWorkerTest extends CriterionFactoryWorkerBaseTest
{
    public function testEq()
    {
        $this->setExpectations( Operator::EQ, 42 );
        $this->worker->eq( 42 );
    }

    public function testGt()
    {
        $this->setExpectations( Operator::GT, 42 );
        $this->worker->gt( 42 );
    }

    public function testGte()
    {
        $this->setExpectations( Operator::GTE, 42 );
        $this->worker->gte( 42 );
    }

    public function testLt()
    {
        $this->setExpectations( Operator::LT, 42 );
        $this->worker->lt( 42 );
    }

    public function testLte()
    {
        $this->setExpectations( Operator::LTE, 42 );
        $this->worker->lte( 42 );
    }

    public function testBetween()
    {
        $this->setExpectations( Operator::BETWEEN, array( 42, 2048 ) );
        $this->worker->between( 42, 2048 );
    }

    protected function getWorkerClass()
    {
        return 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\NumberCriterionFactoryWorker';
    }

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\GeneratedQueryBuilder\NumberCriterionFactoryWorker */
    protected $worker;
}
