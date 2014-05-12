<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\MapLocationDistanceCriterionFactoryWorker as MapLocationDistanceCriterionFactoryWorkerInterface;

class MapLocationDistanceCriterionFactoryWorker extends CriterionFactoryWorker implements MapLocationDistanceCriterionFactoryWorkerInterface
{
    public function distance( $referenceLatitude, $referenceLongitude )
    {
        $this->criterionFactory->addValue( $referenceLatitude );
        $this->criterionFactory->addValue( $referenceLongitude );
        return new NumberCriterionFactoryWorker( $this->criterionFactory, $this->builder );
    }
}
