<?php
/**
 * File containing the CriterionFactoryWorkerRegistryTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests;

use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactoryWorkerRegistry;
use Mockery as m;
use PHPUnit_Framework_TestCase;

/**
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactoryWorkerRegistry
 */
class CriterionFactoryWorkerRegistryTest extends PHPUnit_Framework_TestCase
{
    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionFactoryWorkerRegistry */
    private $registry;

    public function setUp()
    {
        parent::setUp();
        $this->registry = new CriterionFactoryWorkerRegistry();
    }
    /**
     * @dataProvider registryMappingProvider
     */
    public function testCreate( $id, $expectedClass )
    {
        $this->registry->create(
            $id, $this->getCriterionBuilder(), $this->getCriterionFactory()
        );
    }

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionBuilderInterface
     */
    public function getCriterionBuilder()
    {
        return m::mock( '\EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionBuilderInterface' );
    }

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryInterface
     */
    public function getCriterionFactory()
    {
        return m::mock( '\EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryInterface' );
    }

    public function registryMappingProvider()
    {
        return array(
            array( 'date', 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\DateCriterionFactoryWorker' ),
            array( 'identifier', 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\IdentifierCriterionFactoryWorker' ),
            array( 'id', 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\IdCriterionFactoryWorker' ),
            array( 'text', 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\TextCriterionFactoryWorker' ),
            array( 'bool', 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\BooleanCriterionFactoryWorker' ),
            array( 'number', 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\NumberCriterionFactoryWorker' ),
            array( 'map_location', 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion\MapLocationDistanceCriterionFactoryWorker' )
        );
    }
}
