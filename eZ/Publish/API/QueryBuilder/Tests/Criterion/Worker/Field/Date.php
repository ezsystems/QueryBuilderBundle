<?php
/**
 * File containing the Date CriterionTest worker.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion\Worker\Field;

use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\Tests\Criterion\Worker;

/**
 * @todo Add providers for different input formats
 * @method \EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\DateCriterionFactoryWorker invoke()
 */
abstract class Date extends Worker\Date
{
    protected function invoke()
    {
        $method = $this->getCriterionName();
        return $this->getQueryBuilder()->$method( 'identifier' );
    }

    protected function getCriterionString()
    {
        return 'field.identifier';
    }
}
