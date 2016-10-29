<?php
/**
 * File containing the BaseQueryBuilder class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder;

use eZ\Publish\Core\Base\Exceptions\InvalidArgumentType;
use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Publish\Core\Base\Exceptions\InvalidArgumentException;

abstract class BaseQueryBuilder extends BaseCriterionBuilder implements CriterionBuilderInterface
{
    /** @var Query */
    private $query;

    /** @var Query\SortClause[] */
    private $sortClauseArray = array();

    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\CriterionBuilder */
    protected $criterionBuilder;

    public function __construct( CriterionFactoryWorkerRegistry $criterionFactoryWorkerRegistry )
    {
        $this->criterionFactoryWorkerRegistry = $criterionFactoryWorkerRegistry;
        $this->query = new Query;

        // $this should always point to the implementor, that implements the right interface
        $this->criterionBuilder = new CriterionBuilder( $this->criterionFactoryWorkerRegistry, $this );
    }

    public function filter()
    {
        $this->destination = 'filter';

        return $this;
    }

    public function query()
    {
        $this->destination = 'query';

        return $this;
    }

    public function getQuery()
    {
        $this->query->filter = $this->getCriterion($this->criterionArray['filter']);
        $this->query->query = $this->getCriterion($this->criterionArray['query']);
        $this->query->sortClauses = $this->sortClauseArray;

        return $this->query;
    }

    public function addSortClause( Query\SortClause $sortClause )
    {
        $this->sortClauseArray[] = $sortClause;
    }

    public function sortBy()
    {
        return new SortClauseBuilder( $this );
    }

    public function expr()
    {
        return new CriterionBuilder( $this->criterionFactoryWorkerRegistry );
    }

    private function getCriterion(array $array)
    {
        if (count($array) == 1 && ($array[0] instanceof Criterion\LogicalAnd || $array[0] instanceof Criterion\LogicalOr)) {
            return $array[0];
        } else {
            return new Criterion\LogicalAnd($array);
        }
    }
}
