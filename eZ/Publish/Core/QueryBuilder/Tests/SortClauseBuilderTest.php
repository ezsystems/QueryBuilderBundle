<?php
/**
 * File containing the SortClauseBuilderTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests;

use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseBuilder;
use Mockery as m;
use PHPUnit_Framework_TestCase;

/**
 * @covers \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseBuilder
 */
class SortClauseBuilderTest extends BuilderTest
{
    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder|\Mockery\MockInterface */
    protected $queryBuilder;

    public function setUp()
    {
        $this->queryBuilder = m::mock( 'EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Builder\QueryBuilder' );
        parent::setUp();
    }

    /**
     * @return EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\SortClauseBuilder
     */
    protected function createBuilder()
    {
        return new SortClauseBuilder( $this->queryBuilder );
    }

    public function testAddSortClause()
    {
        $sortClause = new \eZ\Publish\API\Repository\Values\Content\Query\SortClause\ContentId();
        $this->queryBuilder->shouldReceive( 'addSortClause' )->with( $sortClause );
        $this->builder->addSortClause( $sortClause );
    }

    protected function getAddMethod()
    {
        return 'addSortClause';
    }

    public function methodsProvider()
    {
        return array(
            array( 'contentId', 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\ContentId', 'asc' ),
            array( 'contentName', 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\ContentName', 'asc' ),
            array( 'dateModified', 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\DateModified', 'asc' ),
            array( 'datePublished', 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\DatePublished', 'asc' ),
            array( 'locationDepth', 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\LocationDepth', 'asc' ),
            array( 'locationPath', 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\LocationPath', 'asc' ),
            array( 'locationPathString', 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\LocationPathString', 'asc' ),
            array( 'locationPriority', 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\LocationPriority', 'asc' ),
            // @todo Not working (needs further data): array( 'mapLocationDistance', 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\MapLocationDistance' ),
            array( 'sectionIdentifier', 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\SectionIdentifier', 'asc' ),
            array( 'sectionName', 'eZ\Publish\API\Repository\Values\Content\Query\SortClause\SectionName', 'asc' ),
        );
    }
}
