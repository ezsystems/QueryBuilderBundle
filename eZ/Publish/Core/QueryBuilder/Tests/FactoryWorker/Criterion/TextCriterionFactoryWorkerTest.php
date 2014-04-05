<?php
/**
 * File containing the TextCriterionFactoryWorkerTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\Criterion;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion\Operator;

/**
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\TextCriterionFactoryWorker
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\CriterionFactoryWorker
 */
class TextCriterionFactoryWorkerTest extends CriterionFactoryWorkerBaseTest
{
    public function testEndsWith()
    {
        $this->setExpectations( Operator::LIKE, "%ez" );
        $this->worker->endsWith( "ez" );
    }

    public function testBeginsWith()
    {
        $this->setExpectations( Operator::LIKE, "ez%" );
        $this->worker->beginsWith( "ez" );
    }

    public function testContains()
    {
        $this->setExpectations( Operator::CONTAINS, "ez" );
        $this->worker->contains( "ez" );
    }

    public function testLike()
    {
        $this->setExpectations( Operator::LIKE, "ez" );
        $this->worker->like( "ez" );
    }

    protected function getWorkerClass()
    {
        return 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\TextCriterionFactoryWorker';
    }

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\GeneratedQueryBuilder\TextCriterionFactoryWorker */
    protected $worker;
}
