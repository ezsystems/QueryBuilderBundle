<?php
/**
 * File containing the ${NAME} class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder;

interface SortClauseBuilder
{
    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function contentName();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function locationPriority();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function dateModified();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function sectionIdentifier();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function locationPathString();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function mapLocationDistance();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function locationPath();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function field();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function datePublished();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function sectionName();

    /**
     * @return \eZ\Publish\API\Repository\Values\Content\Query
     */
    public function getQuery();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function locationDepth();

    /**
     * @return \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker
     */
    public function contentId();
}
