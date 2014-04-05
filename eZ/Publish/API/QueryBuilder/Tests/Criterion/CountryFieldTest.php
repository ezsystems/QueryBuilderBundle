<?php
/**
 * File containing the AuthorTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion;

class CountryFieldTest extends Worker\Field\Text
{
    protected function getCriterionName()
    {
        return 'countryField';
    }
}
