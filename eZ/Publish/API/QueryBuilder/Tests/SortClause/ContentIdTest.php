<?php
/**
 * File containing the ContentId SortClause API test.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\SortClause;

class ContentIdTest extends SortClauseTest
{
    protected function getMethod()
    {
        return 'contentId';
    }
}
