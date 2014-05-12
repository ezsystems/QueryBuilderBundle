<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder;

interface DateCriterionFactoryWorker extends CriterionFactoryWorker
{
    /**
     * @param \DateTime|string $value A DateTime object or strtotime compatible string to compare against.
     *
*@return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder
     */
    public function between( $startDate, $endDate );

    /**
     * @param \DateTime|string $value A DateTime object or strtotime compatible string to compare against.
     *
*@return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder
     */
    public function at( $date );

    /**
     * @param \DateTime|string $value A DateTime object or strtotime compatible string to compare against.
     *
*@return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder
     */
    public function before( $date );

    /**
     * @param \DateTime|string $value A DateTime object or strtotime compatible string to compare against.
     *
*@return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder
     */
    public function after( $date );

    /**
     * @return self
     */
    public function not();
}
