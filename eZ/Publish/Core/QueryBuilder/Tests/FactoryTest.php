<?php
/**
 * File containing the FactoryTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests;

use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryInterface;
use eZ\Publish\API\Repository\Values\Content\Query;
use PHPUnit_Framework_TestCase;

abstract class FactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var \EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryInterface */
    protected $factory;

    public function setUp()
    {
        parent::setUp();
        $this->factory = $this->getFactory();
    }

    private function getFactory()
    {
        if ( !isset( $this->factory ) )
        {
            $this->factory = $this->createFactory();
        }

        return $this->factory;
    }

    /**
     * Checks that a setter and its getter works correctly
     */
    protected function assertPropertyWorks( $propertyName, $value )
    {
        $setterMethod = "set" . ucfirst( $propertyName );
        $getterMethod = "get" . ucfirst( $propertyName );

        $this->factory->$setterMethod( $value );

        self::assertEquals( $value, $this->factory->$getterMethod() );
    }

    public function testCreate()
    {
        $this->preCreate();
        self::assertInstanceOf(
            $this->getBuiltClassName(),
            $this->factory->create()
        );
    }

    /**
     * @return FactoryInterface
     */
    abstract protected function createFactory();

    /**
     * Returns the built class name.
     * @return string
     */
    abstract protected function getBuiltClassName();

    /**
     * Called before testing create(). Can be used to set properties.
     */
    protected function preCreate()
    {

    }
}
