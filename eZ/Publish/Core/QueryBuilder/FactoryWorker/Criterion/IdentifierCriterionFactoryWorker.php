<?php
/**
 * File containing the CriterionValueBuilder class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\IdentifierCriterionFactoryWorker as IdentifierCriterionFactoryWorkerInterface;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

/**
 * Sets the operator + comparison value for an identifier
 */
class IdentifierCriterionFactoryWorker extends CriterionFactoryWorker implements IdentifierCriterionFactoryWorkerInterface
{
    public function eq( $value )
    {
        return $this->addCriterion( $value, Criterion\Operator::EQ );
    }

    public function in( $value )
    {
        if ( !is_array( $value ) )
        {
            $value = func_get_args();
        }
        return $this->addCriterion( $value, Criterion\Operator::IN );
    }

    public function matches( $regexp )
    {
        throw new \Exception( "Not implemented (might not be at all" );
    }
}
