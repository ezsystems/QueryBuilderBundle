<?php
/**
 * File containing the CriterionBuilderInterface class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder;

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
