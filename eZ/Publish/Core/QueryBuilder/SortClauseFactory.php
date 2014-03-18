<?php
/**
 * File containing the CriterionFactory class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

/**
 * Factory for SortClause objects.
 *
 * <code>
 * $sortClauseFactory->setClass( 'F\Q\N\MySortClause' );
 * $sortClauseFactory->set
 *
 * @package EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder
 */
class SortClauseFactory implements FactoryInterface
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

    public function setClass( $sortClauseClass )
    {
        $this->sortClauseClass = $sortClauseClass;
    }

    public function setTarget( $target )
    {
        $this->target = $target;
    }

    public function setDirection( $direction )
    {
        $this->direction = $direction;
    }

    /**
     * @return Criterion
     */
    public function create()
    {
        return new $this->sortClauseClass( $this->direction );
    }

}
