<?php
/**
 * File containing the SortClauseDirectionBuilder class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\SortClause;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\SortClause\SortClauseDirectionFactoryWorker as SortClauseDirectionFactoryWorkerInterface;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\SortClauseBuilder;
use eZ\Publish\API\Repository\Values\Content\Query;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder;
use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactory;

/**
 * SortClause worker that sets the sorting direction
 */
class SortClauseDirectionFactoryWorker implements SortClauseDirectionFactoryWorkerInterface
{
    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseFactory */
    private $sortClauseFactory;

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseBuilder */
    private $sortClauseBuilder;

    public function __construct( SortClauseBuilder $sortClauseBuilder, SortClauseFactory $sortClauseFactory )
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
