<?php

namespace Simonetti\Integrador\Tests;

use Simonetti\IntegradorFinanceiro\Destination\Method;

class MethodTest extends \PHPUnit_Framework_TestCase
{

    public function testValidateProperties()
    {
        $method = new Method('IncluirPessoaJuridica', 12210, ['nome' => 'Basilio Ferraz', 'cpf' => 15717815794]);

        $this->assertEquals('IncluirPessoaJuridica', $method->getDescription());
        $this->assertEquals(12210, $method->getIdentifier());
        $this->assertEquals(['nome' => 'Basilio Ferraz', 'cpf' => 15717815794], $method->getParams());
        $this->assertArrayHasKey('nome', $method->getParams());
        $this->assertArrayHasKey('cpf', $method->getParams());
    }

}
