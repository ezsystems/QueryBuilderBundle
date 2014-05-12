<?php
/**
 * File containing the CriterionValueBuilder class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\IdCriterionFactoryWorker as IdCriterionFactoryWorkerInterface;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

class IdCriterionFactoryWorker extends CriterionFactoryWorker implements IdCriterionFactoryWorkerInterface
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
}
