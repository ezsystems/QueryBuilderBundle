<?php
/**
 * File containing the CriterionFactoryInterface class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder;

/**
 * A criterion factory. Has methods to set the operator and target, to add values, and to create the Criterion
 *
 * <code>
 * $criterionFactory->setClass( 'My\Criterion' );
 * $criterionFactory->setTarget( 'foo' );
 * $criterionFactory->setOperator( '=' );
 * $criterionFactory->setValue( 'bar' );
 * $criterion = $criterionFactory->create();
 */
interface CriterionFactoryInterface extends FactoryInterface
{
    /**
     * Returns the criterion's target
     * @return string
     */
    public function getTarget();

    /**
     * Sets the criterion's target
     * @param string $target
     */
    public function setTarget( $target );

    /**
     * Returns the criterion's operator
     * @return string
     */
    public function getOperator();

    /**
     * Sets the criterion's operator
     * @param string $operator
     */
    public function setOperator( $operator );

    /**
     * Adds a value element to the factory. Multiple calls to addValue will stack them up.
     * @param mixed $value
     */
    public function addValue( $value );

    /**
     * Transforms the value into either null, or a single value, or the SplStack, in the order values were added.
     * @return mixed
     */
    public function getValue();

    /**
     * Makes the criterion negative
     * @return void
     */
    public function negate();

    /**
     * @return \eZ\Publish\API\Repository\Values\Content\Query\Criterion
     */
    public function create();
}
