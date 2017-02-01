<?php

namespace Simonetti\IntegradorFinanceiro\Tests\Destination;

use Simonetti\IntegradorFinanceiro\Destination\Request;
use Simonetti\IntegradorFinanceiro\Source\Destination as SourceDestination;
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

        $mockDestination = $this->getMockBuilder(SourceDestination::class)
            ->disableOriginalConstructor()
            ->getMock();

        $data = [
            'oldKey1' => 'newKey1',
            'oldKey2' => 'newKey2',
            'oldKey3' => 'newKey3',
        ];

        $request = new Request($mockDestination, $mockSource, (object)$data);

        $this->assertInstanceOf(Request::class, $request);
        $this->assertEquals((object)$data, $request->getData());
        $this->assertInstanceOf(SourceRequest::class, $request->getSourceRequest());
        $this->assertInstanceOf(SourceDestination::class, $request->getDestination());
    }

}
