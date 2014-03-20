<?php
/**
 * File containing the CriterionValueBuilder class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryWorker\Criterion;

use DateTime;
use EzSystems\QueryBuilderBundle\eZ\Publish\API\QueryBuilder\FactoryWorker\Criterion\DateCriterionFactoryWorker as DateCriterionFactoryWorkerInterface;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Publish\Core\Base\Exceptions\InvalidArgumentException;

/**
 * Sets the operator + value for a criterion, and returns the query builder with the added criterion
 */
class DateCriterionFactoryWorker extends CriterionFactoryWorker implements DateCriterionFactoryWorkerInterface
{
    public function before( $value)
    {
        return $this->addCriterion( $this->parseDateArgument( $value ), Criterion\Operator::LT );
    }

    public function after( $value )
    {
        return $this->addCriterion( $this->parseDateArgument( $value ), Criterion\Operator::GT );
    }

    public function at( $value )
    {
        return $this->addCriterion( $this->parseDateArgument( $value ), Criterion\Operator::EQ );
    }

    public function between( $startValue, $endValue )
    {
        throw new \Exception( "Fix me" );
        // return $this->addCriterion( $startValue, Criterion\Operator::BETWEEN );
    }

    /**
     * Parses a string or object date argument into a timestamp
     * @param string|DateTime $argument
     * @return int unix timestamp
     * @throws InvalidArgumentException if $argument isn't in a recognized format
     */
    private function parseDateArgument( $argument )
    {
        // UNIX timestamp
        if ( is_numeric( $argument ) )
        {
            return $argument;
        }
        // strtotime compatible string
        if ( is_string( $argument ) )
        {
            return strtotime( $argument );
        }
        // DateTime object
        else if ( $argument instanceof DateTime )
        {
            return $argument->getTimestamp();
        }

        throw new InvalidArgumentException(
            'date',
            'Not a DateTime or an strtotime compatible string'
        );
    }
}
