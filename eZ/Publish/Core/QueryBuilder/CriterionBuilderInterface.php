<?php
/**
 * File containing the CriterionBuilderInterface class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

/**
 * A builder that creates Criterion objects
 */
interface CriterionBuilderInterface
{
    /**
     * Adds the current criterion to the built element
     * @param Criterion $criterion
     * @return mixed
     */
    public function addCriterion( Criterion $criterion );
}
