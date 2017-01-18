<?php

namespace Simonetti\IntegradorFinanceiro\Tests;


use Simonetti\IntegradorFinanceiro\Source\Destination\DataMapping;

class DataMappingTest extends \PHPUnit_Framework_TestCase
{

    public function testValidateColumns()
    {
        $columns = [
            'empresa' => 'codIntegracaoEmpresa',
            'storeno' => 'codIntegracaoFilial',
            'nome' => 'nomFantasia'
        ];

        $dataMapping = new DataMapping($columns);

        $key = 'storeno';

        $columByKey = $dataMapping->getColumnByKey($key);

        $this->assertInstanceOf(DataMapping::class, $dataMapping);
        $this->assertEquals('codIntegracaoFilial', $columByKey);
    }
}
