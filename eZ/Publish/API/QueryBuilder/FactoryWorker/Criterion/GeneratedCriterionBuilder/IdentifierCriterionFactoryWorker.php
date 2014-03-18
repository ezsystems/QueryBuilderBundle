<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\GeneratedCriterionBuilder;

interface IdentifierCriterionFactoryWorker extends CriterionFactoryWorker
{
    /**
     * @param $value
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\GeneratedCriterionBuilder
     */
    public function eq( $value );

    /**
     * @param mixed $value,... Either an array of identifiers, or a sequence of identifiers.
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\GeneratedCriterionBuilder
     */
    public function in( $value );

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\GeneratedCriterionBuilder
     */
    public function matches( $regexp );

    /**
     * @return self
     */
    public function not();
}
