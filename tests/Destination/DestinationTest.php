<?php

namespace Simonetti\IntegradorFinanceiro\Tests;

use Simonetti\IntegradorFinanceiro\Destination\Destination;

class DestinationTest extends \PHPUnit_Framework_TestCase
{

    public function testValidateProperties()
    {
        $identifier = '122345421';
        $name = 'Rovereti';
        $bridge = 'IncluirPessoaJuridica';

        $destination = new Destination($identifier, $name, $bridge);

        $this->assertInstanceOf(Destination::class, $destination);
        $this->assertEquals($identifier, $destination->getIdentifier());
        $this->assertEquals($name, $destination->getName());
        $this->assertEquals($bridge, $destination->getBridge());
    }

}
