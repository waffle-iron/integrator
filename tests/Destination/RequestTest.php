<?php

namespace Simonetti\IntegradorFinanceiro\Tests\Destination;

use Simonetti\IntegradorFinanceiro\Destination\Method;
use Simonetti\IntegradorFinanceiro\Destination\Request;
use Simonetti\IntegradorFinanceiro\Source\Source;
use Simonetti\IntegradorFinanceiro\Source\Request as SourceRequest;

/**
 * Class RequestTest
 * @package Simonetti\IntegradorFinanceiro\Tests\Destination
 */
class RequestTest extends \PHPUnit_Framework_TestCase
{

    public function testValidateConstruct()
    {
        $mockSource = $this->getMockBuilder(SourceRequest::class)
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

        $request = new Request($mockSource, (object)$data, $mockMethod);

        $this->assertInstanceOf(Request::class, $request);
        $this->assertEquals((object)$data, $request->getData());
        $this->assertInstanceOf(SourceRequest::class, $request->getSourceRequest());
        $this->assertInstanceOf(Method::class, $request->getMethod());
    }

}
