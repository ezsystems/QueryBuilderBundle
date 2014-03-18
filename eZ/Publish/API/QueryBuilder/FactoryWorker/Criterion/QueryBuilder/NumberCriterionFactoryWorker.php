<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder;

interface NumberCriterionFactoryWorker extends CriterionFactoryWorker
{
    /**
     * @param $value
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
     */
    public function eq( $value );

    /**
     * @param $value
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
     */
    public function gt( $value );

    /**
     * @param $value
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
     */
    public function gte( $value );

    /**
     * @param $value
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
     */
    public function lt( $value );

    /**
     * @param $value
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
     */
    public function lte( $value );

    /**
     * @param $value
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
     */
    public function between( $minValue, $maxValue );

    /**
     * @return self
     */
    public function not();
}
