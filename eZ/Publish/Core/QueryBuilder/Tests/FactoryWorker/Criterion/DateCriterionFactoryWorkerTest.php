<?php
/**
 * File containing the DateCriterionFactoryWorkerTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\Criterion;

use DateTime;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\Operator;

/**
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\DateCriterionFactoryWorker
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\CriterionFactoryWorker
 * @todo Cover polymorphism on input format
 */
class DateCriterionFactoryWorkerTest extends CriterionFactoryWorkerBaseTest
{
    /**
     * @dataProvider getDates
     *
     * @param $methodValue
     * @param $factoryValue
     */
    public function testBefore( $methodValue, $factoryValue )
    {
        $this->setExpectations( Operator::LT, $factoryValue );
        $this->worker->before( $methodValue );
    }

    /**
     * @dataProvider getDates
     *
     * @param $methodValue
     * @param $factoryValue
     */
    public function testAfter( $methodValue, $factoryValue )
    {
        $this->setExpectations( Operator::GT, $factoryValue );
        $this->worker->after( $methodValue );
    }

    /**
     * @dataProvider getDates
     *
     * @param $methodValue
     * @param $factoryValue
     */
    public function testAt( $methodValue, $factoryValue )
    {
        $this->setExpectations( Operator::EQ, $factoryValue );
        $this->worker->at( $methodValue );
    }

    public function testBetween()
    {
        self::markTestIncomplete( "Method not implemented yet" );
    }

    /**
     * Dates data provider
     * Arguments:
     * - expected date sent to criterion
     * - expected value sent to the method
     */
    public function getDates()
    {
        $datetime = new DateTime;
        $timestamp = $datetime->getTimestamp();

        return array(
            // argument as a string
            array( "yesterday", strtotime( 'yesterday' ) ),
            array( $timestamp, $timestamp ),
            array( "$timestamp", $timestamp ),
            array( $datetime, $timestamp )
        );
    }

    protected function getWorkerClass()
    {
        return 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\DateCriterionFactoryWorker';
    }

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\GeneratedQueryBuilder\DateCriterionFactoryWorker */
    protected $worker;
}
