<?php
/**
 * File containing the FactoryWorkerBaseTest class.
 *
 * @copyright Copyright (C) 2014 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */
namespace EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\Tests\FactoryWorker;

use EzSystems\QueryBuilderBundle\eZ\Publish\Core\QueryBuilder\FactoryInterface;
use PHPUnit_Framework_TestCase;
use Mockery\MockInterface;

abstract class FactoryWorkerBaseTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tested worker object, type depends on test
     */
    protected $worker;

    /**
     * Builder object/mock
     * @var MockInterface
     */
    protected $builder;

    /**
     * Factory object/mock
     * @var FactoryInterface|MockInterface
     */
    protected $factory;

    public function setUp()
    {
        parent::setUp();
        $this->builder = $this->createBuilder();
        $this->factory = $this->createFactory();
        $this->worker = $this->createWorker( $this->factory, $this->builder );
    }

    abstract protected function createBuilder();

    abstract protected function createFactory();

    abstract protected function createWorker( $factory, $builder );
}
