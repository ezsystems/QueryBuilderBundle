<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\CriterionBuilder;

interface IdCriterionFactoryWorker extends CriterionFactoryWorker
{
    /**
     * @param $value
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder
     */
    public function eq( $value );

    /**
     * @param mixed $value,...
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder
     */
    public function in( $value );

    /**
     * @return self
     */
    public function not();
}
