<?php
/**
 * File containing the IdCriterionFactoryWorkerTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\Criterion;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\Operator;

/**
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\IdCriterionFactoryWorker
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\CriterionFactoryWorker
 */
class IdCriterionFactoryWorkerTest extends CriterionFactoryWorkerBaseTest
{
    public function testEq()
    {
        $this->setExpectations( Operator::EQ, 42 );
        $this->worker->eq( 42 );
    }

    public function testIn()
    {
        $this->setExpectations( Operator::IN, array( 42, 2048 ) );
        $this->worker->in( array( 42, 2048 ) );
    }

    protected function getWorkerClass()
    {
        return 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\IdCriterionFactoryWorker';
    }

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\GeneratedQueryBuilder\IdCriterionFactoryWorker */
    protected $worker;
}
