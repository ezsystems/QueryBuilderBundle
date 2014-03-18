<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion;

interface TextCriterionFactoryWorker extends CriterionFactoryWorker
{
    /**
     * Text must contain $value
     * @param string $value Value the text must contain
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder
     */
    public function contains( $value );

    /**
     * Flexible match with a like operator and wildcards (using %)
     * @param string $value
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder
     */
    public function like( $value );

    /**
     * @param string $value Value the text must end with
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder
     */
    public function endsWith( $value );

    /**
     * @param string $value Value the text must begin with
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder
     */
    public function beginsWith( $value );

    /**
     * @param $regexp
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\CriterionBuilder
     */
    public function matches( $regexp );

    /**
     * @return self
     */
    public function not();
}
