<?php
/**
 * File containing the MapLocationDistanceCriterionFactoryWorkerTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker\Criterion;

/**
 * @todo Implement MapLocationDistanceCriterionFactoryWorkerTest
 */
class MapLocationDistanceCriterionFactoryWorkerTest extends CriterionFactoryWorkerBaseTest
{
    public function testDistance()
    {
        $this->factory->shouldReceive( 'addValue' )->with( 'lat' );
        $this->factory->shouldReceive( 'addValue' )->with( 'lon' );

        $return = $this->worker->distance( 'lat', 'lon' );

        $this->assertInstanceOf(
            'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\NumberCriterionFactoryWorker',
            $return
        );
    }

    protected function getWorkerClass()
    {
        return 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\MapLocationDistanceCriterionFactoryWorker';
    }

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\GeneratedQueryBuilder\MapLocationDistanceCriterionFactoryWorker */
    protected $worker;
}
