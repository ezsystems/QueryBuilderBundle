<?php
/**
 * File containing the IdentifierCriterionFactoryWorkerTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\Criterion;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\Operator;

/**
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\IdentifierCriterionFactoryWorker
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\CriterionFactoryWorker
 */
class IdentifierCriterionFactoryWorkerTest extends CriterionFactoryWorkerBaseTest
{
    public function testEq()
    {
        $this->setExpectations( Operator::EQ, 'abcde' );
        $this->worker->eq( 'abcde' );
    }

    public function testIn()
    {
        $this->setExpectations( Operator::IN, array( 'abcde', 'fghij' ) );
        $this->worker->in( array( 'abcde', 'fghij' ) );
    }

    public function testInWithVarArguments()
    {
        $this->setExpectations( Operator::IN, array( 'abcde', 'fghij' ) );
        $this->worker->in( 'abcde', 'fghij' );
    }

    protected function getWorkerClass()
    {
        return 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\IdentifierCriterionFactoryWorker';
    }

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\GeneratedQueryBuilder\IdentifierCriterionFactoryWorker */
    protected $worker;
}
