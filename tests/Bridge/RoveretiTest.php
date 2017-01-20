<?php

namespace Simonetti\IntegradorFinanceiro\Tests\Bridge;

use Simonetti\IntegradorFinanceiro\Bridge\Rovereti;

class RoveretiTest extends \PHPUnit_Framework_TestCase
{
    public function testValidateProperties()
    {
        $rovereti = new Rovereti();

        $this->assertEquals(1.0, $rovereti->getVersion());
        $this->assertEquals('Rovereti', $rovereti->getName());
    }

}
