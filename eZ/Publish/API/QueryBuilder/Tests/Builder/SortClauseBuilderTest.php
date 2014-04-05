<?php
/**
 * File containing the SortClauseBuilderTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Builder;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\BaseTest;

class SortClauseBuilderTest extends BaseTest
{
    /**
     * Tests that calling getQuery() after building sort clauses returns the query like the query builder does
     */
    public function testGetQuery()
    {
        self::assertEquals(
            $this->getQueryBuilder()
                ->contentTypeIdentifier()->eq( 'article' )
                ->sortBy()->contentName()->ascending()->getQuery(),
            $this->getQueryBuilder()->getQuery()
        );
    }
}
