<?php

namespace Simonetti\IntegradorFinanceiro\Tests;

use Pimple\Container;
use Simonetti\IntegradorFinanceiro\BridgeFactory;
use Simonetti\IntegradorFinanceiro\BridgeInterface;
use Simonetti\IntegradorFinanceiro\Destination\Request;

/**
 * Class BridgeFactoryTest
 * @package Simonetti\IntegradorFinanceiro\Tests
 */
class BridgeFactoryTest extends \PHPUnit_Framework_TestCase
{
    protected $container;

    public function setUp()
    {
        $this->container = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testAddBridgeMustIncreaseListOfBridges()
    {
        $factory = new BridgeFactory($this->container);

        $bridge = (new class() implements BridgeInterface
        {
            public function integrate(Request $request)
            {
                return true;
            }
        });

        $this->assertCount(0, $factory->getBridges());

        $factory->addBridge($bridge, 'key');

        $this->assertCount(1, $factory->getBridges());
        $this->assertContainsOnlyInstancesOf(BridgeInterface::class, $factory->getBridges());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage Bridge not found
     */
    public function testFactoryMustThrowExceptionIfNotFoundBridge()
    {
        $factory = new BridgeFactory($this->container);

        $bridge = (new class() implements BridgeInterface
        {
            public function integrate(Request $request)
            {
                return true;
            }
        });

        $factory->addBridge($bridge, 'key');

        $factory->factory('');
    }


    public function testReturnBridgeCorrect()
    {
        $factory = new BridgeFactory($this->container);

        $bridge = (new class() implements BridgeInterface
        {
            public function integrate(Request $request)
            {
                return true;
            }
        });

        $factory->addBridge($bridge, 'key');

        $retorno = $factory->factory('key');

        $this->assertEquals($factory->getBridges()['key'], $retorno);
    }
}
