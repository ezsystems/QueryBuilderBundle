<?php
/**
 * File containing the ContentId class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion;

class SectionIdentifierTest extends Worker\Identifier
{
    public function setUp()
    {
        self::markTestSkipped( "@todo fix feature" );
    }

    protected function getCriterionName()
    {
        return 'sectionIdentifier';
    }
}
