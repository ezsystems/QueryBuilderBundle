<?php
/**
 * File containing the CriterionFactory class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use SplStack;

class CriterionFactory implements CriterionFactoryInterface
{
    private $criterionClass;
    private $target;
    private $operator;
    private $value;

    /**
     * If set to true, the Criterion will be negated
     * @var bool
     */
    private $isNegative = false;

    public function __construct( $criterionClass, $target = null )
    {
        $this->criterionClass = $criterionClass;
        $this->target = $target;
        $this->value = new SplStack();
    }

    public function getClass()
    {
        return $this->criterionClass;
    }

    public function setClass( $criterionClass )
    {
        $this->criterionClass = $criterionClass;
    }

    public function create()
    {
        $criterion = call_user_func_array(
            array( $this->criterionClass, 'createFromQueryBuilder' ),
            array( $this->target, $this->operator, $this->getValue() )
        );

        if ( $this->isNegative )
        {
            $criterion = new Criterion\LogicalNot( $criterion );
        }

        return $criterion;
    }

    public function setTarget( $target )
    {
        $this->target = $target;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function addValue( $value )
    {
        $this->value->push( $value );
    }

    public function setOperator( $operator )
    {
        $this->operator = $operator;
    }

    public function getOperator()
    {
        return $this->operator;
    }

    public function getValue()
    {
        if ( $this->value === null || $this->value->count() == 0 )
        {
            return null;
}
        if ( $this->value->count() == 1 )
        {
            return $this->value->offsetGet( 0 );
        }

        return $this->value;
    }

    public function negate()
    {
        $this->isNegative = true;
    }
}
