<?php
namespace Simonetti\IntegradorFinanceiro\Tests\Source;

use Simonetti\IntegradorFinanceiro\Source\Request;
use Simonetti\IntegradorFinanceiro\Source\Source;

/**
 * Class RequestTest
 * @package Simonetti\IntegradorFinanceiro\Tests\Source
 */
class RequestTest extends \PHPUnit_Framework_TestCase
{
    protected function getSource()
    {
        return $this->getMockBuilder(Source::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testConstructor()
    {
        $source = $this->getSource();

        $queryParameter = '123';

        $request = new Request($source, $queryParameter);

        $this->assertInstanceOf(Source::class, $request->getSource());
        $this->assertEquals($source, $request->getSource());
        $this->assertEquals($queryParameter, $request->getQueryPamameter());
    }
}
