<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\GeneratedCriterionBuilder;

interface MapLocationDistanceCriterionFactoryWorker extends CriterionFactoryWorker
{
    /**
     * Text must contain $value
     * @param string $value Value the text must contain
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\GeneratedCriterionBuilder\NumberCriterionFactoryWorker
     */
    public function distance( $referenceLatitude, $referenceLongitude );
}
