<?php

namespace Simonetti\IntegradorFinanceiro\Tests\Destination;

use Simonetti\IntegradorFinanceiro\Destination\Method;
use Simonetti\IntegradorFinanceiro\Destination\Request;
use Simonetti\IntegradorFinanceiro\Source\Source;

/**
 * Class RequestTest
 * @package Simonetti\IntegradorFinanceiro\Tests\Destination
 */
class RequestTest extends \PHPUnit_Framework_TestCase
{

    public function testValidateConstruct()
    {
        $mockSource = $this->getMockBuilder(Source::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockMethod = $this->getMockBuilder(Method::class)
            ->disableOriginalConstructor()
            ->getMock();

        $data = [
            'oldKey1' => 'newKey1',
            'oldKey2' => 'newKey2',
            'oldKey3' => 'newKey3',
        ];

        $methodIdentifier = 121212;

        $request = new Request($mockSource, (object)$data, $mockMethod, $methodIdentifier);

        $this->assertInstanceOf(Request::class, $request);
        $this->assertEquals($methodIdentifier, $request->getMethodIdentifier());
        $this->assertEquals((object)$data, $request->getData());
        $this->assertInstanceOf(Source::class, $request->getSource());
        $this->assertInstanceOf(Method::class, $request->getMethod());
    }

}
