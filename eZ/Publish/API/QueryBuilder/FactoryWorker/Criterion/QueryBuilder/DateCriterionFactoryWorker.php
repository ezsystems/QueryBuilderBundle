<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\QueryBuilder;

interface DateCriterionFactoryWorker extends CriterionFactoryWorker
{
    /**
     * @param \DateTime|string $value A DateTime object or strtotime compatible string to compare against.
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
     */
    public function between( $startDate, $endDate );

    /**
     * @param \DateTime|string $value A DateTime object or strtotime compatible string to compare against.
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
     */
    public function at( $date );

    /**
     * @param \DateTime|string $value A DateTime object or strtotime compatible string to compare against.
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
     */
    public function before( $date );

    /**
     * @param \DateTime|string $value A DateTime object or strtotime compatible string to compare against.
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder
     */
    public function after( $date );

    /**
     * @return self
     */
    public function not();
}
