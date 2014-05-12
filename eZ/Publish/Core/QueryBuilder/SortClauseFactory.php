<?php
/**
 * File containing the CriterionFactory class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

/**
 * Factory for SortClause objects.
 *
 * <code>
 * $sortClauseFactory->setClass( 'F\Q\N\MySortClause' );
 * $sortClauseFactory->set
 *
 * @package EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\QueryBuilder
 */
class SortClauseFactory implements SortClauseFactoryInterface
{
    private $sortClauseClass;
    private $direction;
    private $target;

    public function __construct( $sortClauseClass, $direction = null, $target = null )
    {
        $this->sortClauseClass = $sortClauseClass;
        $this->direction = $direction;
        $this->target = $target;
    }

    public function getClass()
    {
        return $this->sortClauseClass;
    }

    public function setClass( $sortClauseClass )
    {
        $this->sortClauseClass = $sortClauseClass;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function setTarget( $target )
    {
        $this->target = $target;
    }

    public function getDirection()
    {
        return $this->direction;
    }

    public function setDirection( $direction )
    {
        $this->direction = $direction;
    }

    public function create()
    {
        return new $this->sortClauseClass( $this->direction );
    }
}
