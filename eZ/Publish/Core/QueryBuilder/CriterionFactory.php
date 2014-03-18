<?php
/**
 * File containing the CriterionFactory class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilderBundle\QueryBuilder;

use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use SplStack;

class CriterionFactory implements FactoryInterface
{
    private $criterionClass;
    private $target;
    private $operator;
    private $value;

    public function __construct( $criterionClass, $target = null )
    {
        $this->criterionClass = $criterionClass;
        $this->target = $target;
        $this->value = new SplStack();
    }

    /**
     * @param $operator
     * @param $value
     *
     * @return Criterion
     */
    public function create()
    {
        return call_user_func_array(
            array( $this->criterionClass, 'createFromQueryBuilder' ),
            array( $this->target, $this->operator, $this->getValue() )
        );
    }

    public function setTarget( $target )
    {
        $this->target = $target;
    }

    /**
     * Adds a value element to the factory. Multiple calls to addValue will stack them up.
     */
    public function addValue( $value )
    {
        $this->value->push( $value );
    }

    public function setOperator( $operator )
    {
        $this->operator = $operator;
    }

    /**
     * Transforms the value into either null, or a single value, or the SplStack, in the order values were added.
     * @return mixed
     */
    public function getValue()
    {
        if ( $this->value === null )
        {
            return null;
}
        if ( $this->value->count() == 1 )
        {
            return $this->value->pop();
        }

        return $this->value;
    }
}
