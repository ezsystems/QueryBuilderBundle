<?php
/**
 * File containing the ValueBuilderFactory class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder;
use eZ\Publish\Core\Base\Exceptions\InvalidArgumentException;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder;

/**
 * Instanciates value FactoryWorker objects
 */
class CriterionFactoryWorkerRegistry
{
    /**
     * Map of criterion factory worker id => criterion factory worker class
     * @var string[string]
     */
    protected static $criterionFactoryWorkers = array(
        'date' => 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\FactoryWorker\Criterion\DateCriterionFactoryWorker',
        'identifier' => 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\FactoryWorker\Criterion\IdentifierCriterionFactoryWorker',
        'id' => 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\FactoryWorker\Criterion\IdCriterionFactoryWorker',
        'text' => 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\FactoryWorker\Criterion\TextCriterionFactoryWorker',
        'bool' => 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\FactoryWorker\Criterion\BooleanCriterionFactoryWorker',
        'number' => 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\FactoryWorker\Criterion\NumberCriterionFactoryWorker',
        'map_location' => 'EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder\FactoryWorker\Criterion\MapLocationDistanceCriterionFactoryWorker'
    );

    /**
     * Creates a new ValueBuilder of type $valueBuilderClass object
     *
     * @param string $factoryWorkerId id of a value builder from {@see self::$valueBuilders}
     * @param CriterionBuilderInterface $queryBuilder The query builder that handles the whole building process
     * @param CriterionFactory $criterionFactory
     *
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionFactoryWorker
     */
    public function create( $factoryWorkerId, CriterionBuilder $queryBuilder, CriterionFactory $criterionFactory )
    {
        $workerClass = $this->getClass( $factoryWorkerId );
        return new $workerClass( $criterionFactory, $queryBuilder );
    }

    /**
     * Returns a Worker FQN based on its ID
     * @param string $criterionFactoryWorkerId
     * @return string Value builder FQN
     * @throws InvalidArgumentException If no matching value builder is found in {@see self::$valueBuilders}
     */
    protected function getClass( $criterionFactoryWorkerId )
    {
        if ( !isset( self::$criterionFactoryWorkers[$criterionFactoryWorkerId] ) )
        {
            throw new InvalidArgumentException( "CriterionFactoryWorker id $criterionFactoryWorkerId", "Unknown value builder id" );
        }

        return self::$criterionFactoryWorkers[$criterionFactoryWorkerId];
    }
}
