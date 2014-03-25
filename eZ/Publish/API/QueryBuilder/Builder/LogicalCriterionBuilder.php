<?php
/**
 * File containing the LogicalCriterionBuilder class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder;

/**
 * Provides logical operators on a query
 *
 * @method QueryBuilder or() Start a LogicalOr criterion. Terminate with {@see endOr()}.
 * @method QueryBuilder and() Start a LogicalAnd criterion. Terminate with {@see endAnd()}.
 */
interface LogicalCriterionBuilder
{
}
