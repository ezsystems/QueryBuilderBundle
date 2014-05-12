<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\GeneratedQueryBuilder;

interface NumberCriterionFactoryWorker extends CriterionFactoryWorker
{
    /**
     * @param $value
     * @return \eZ\Publish\API\Repository\GeneratedQueryBuilder
     */
    public function eq( $value );

    /**
     * @param $value
     * @return \eZ\Publish\API\Repository\GeneratedQueryBuilder
     */
    public function gt( $value );

    /**
     * @param $value
     * @return \eZ\Publish\API\Repository\GeneratedQueryBuilder
     */
    public function gte( $value );

    /**
     * @param $value
     * @return \eZ\Publish\API\Repository\GeneratedQueryBuilder
     */
    public function lt( $value );

    /**
     * @param $value
     * @return \eZ\Publish\API\Repository\GeneratedQueryBuilder
     */
    public function lte( $value );

    /**
     * @param $value
     * @return \eZ\Publish\API\Repository\GeneratedQueryBuilder
     */
    public function between( $minValue, $maxValue );

    /**
     * @return self
     */
    public function not();
}
