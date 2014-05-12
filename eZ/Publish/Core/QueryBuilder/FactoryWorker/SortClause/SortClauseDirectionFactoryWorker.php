<?php
/**
 * File containing the SortClauseDirectionBuilder class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\SortClause;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker as SortClauseDirectionFactoryWorkerInterface;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\SortClauseBuilder;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactoryInterface;
use eZ\Publish\API\Repository\Values\Content\Query;

/**
 * SortClause worker that sets the sorting direction
 */
class SortClauseDirectionFactoryWorker implements SortClauseDirectionFactoryWorkerInterface
{
    /** @var SortClauseFactoryInterface */
    private $sortClauseFactory;

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseBuilder */
    private $sortClauseBuilder;

    public function __construct( SortClauseBuilder $sortClauseBuilder, SortClauseFactoryInterface $sortClauseFactory )
    {
        $this->sortClauseFactory = $sortClauseFactory;
        $this->sortClauseBuilder = $sortClauseBuilder;
    }

    public function desc()
    {
        return $this->descending();
    }

    public function asc()
    {
        return $this->ascending();
    }

    public function ascending()
    {
        return $this->finish( Query::SORT_ASC );
    }

    public function descending()
    {
        return $this->finish( Query::SORT_DESC );
    }

    private function finish( $direction )
    {
        $this->sortClauseFactory->setDirection( $direction );
        $this->sortClauseBuilder->addSortClause( $this->sortClauseFactory->create() );
        return $this->sortClauseBuilder;
    }
}
