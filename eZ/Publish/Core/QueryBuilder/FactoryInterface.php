<?php
/**
 * File containing the FactoryInterface class.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder;


/**
 * A factory is meant to instantiate an object configured on local properties:
 *
 * <code>
 * $thingFactory->setClass( 'foo' );
 * $thing = $thingFactory->create();
 * </code>
 *
 * @todo Rename to CriterionFactoryInterface
 */
interface FactoryInterface
{
    /**
     * @return mixed Creates an instance of the class handled by the factory
     */
    public function create();

    /**
     * Sets the class built in the factory
     * @param string $factoryClass
     * @return void
     */
    public function setClass( $factoryClass );

    /**
     */
    public function getClass();
}

