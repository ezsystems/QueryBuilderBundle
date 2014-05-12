<?php
/**
 * File containing the SortClauseFactoryInterface class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder;


interface SortClauseFactoryInterface extends FactoryInterface
{
    /**
     * Returns the SortClause's target
     * @return string
     */
    public function getTarget();

    /**
     * Sets the SortClause's target
     * @param string $target
     * @return void
     */
    public function setTarget( $target );

    /**
     * Returns the SortClause's direction
     * @return string
     */
    public function getDirection();

    /**
     * Sets the SortClause's direction
     * @param string $direction
     * @return void
     */
    public function setDirection( $direction );

    /**
     * @return \eZ\Publish\API\Repository\Values\Content\Query\SortClause
     */
    public function create();
}
