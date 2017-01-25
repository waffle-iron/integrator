<?php
namespace Simonetti\IntegradorFinanceiro\Fixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Simonetti\IntegradorFinanceiro\Destination\Method;
use Simonetti\IntegradorFinanceiro\Source\Destination;
use Simonetti\IntegradorFinanceiro\Destination\Destination as FinalDestination;

/**
 * Class DestinationFixture
 * @package Simonetti\IntegradorFinanceiro\Fixtures
 */
class DestinationFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * @var array
     */
    private $data = [
        [
            'identifier' => 'Rovereti',
            'name' => 'Rovereti ERP',
            'bridge' => 'rovereti',
        ],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $data) {
            /**
             * @var $finalDestination FinalDestination
             */
            $finalDestination = $this->getReference('finalDestination');

            /**
             * @var $method Method
             */
            $method = $this->getReference('method');

            $dataMapping = new Destination\DataMapping([
                'cod_empresa' => 'CodEmpresa',
                'cnpj' => 'NumCnpj',
                'nome_fantasia' => 'NomFantasia',
                'razao_social' => 'RazaoSocial',
                'inscricao_estadual' => 'NumInscricaoEstadual',
                'inscricao_municipal' => 'NumInscricaoMunicipal',
                'endereco_logradouro' => 'NomLogradouro',
                'endereco_numero' => 'NumLogradouro',
                'endereco_complemento' => 'DscComplemento',
                'endereco_bairro' => 'NomBairro',
                'endereco_municipio' => 'NomLocalidade',
                'endereco_uf' => 'SglUF',
                'endereco_cep' => 'NumCep',
                'sigla_pais' => 'SglPais',
                'ddd' => 'NumDDD',
                'telefone' => 'NumTelefone',
                'email' => 'DscEmail',
                'conta_nome_favorecido' => 'NomFavorecido',
                'conta_cpf_cnpj_favorecido' => 'NumCpfCnpjFavorecido',
                'conta_numero_banco' => 'NumBanco',
                'conta_numero_agencia' => 'NumAgencia',
                'conta_numero_conta_corrente' => 'NumContaCorrente',
                'conta_digito_conta_corrente' => 'NumDigitoContaCorrente',
            ]);

            $destination = new Destination(
                $finalDestination,
                $method,
                $dataMapping
            );

            $manager->persist($destination);

            $this->addReference('destination', $destination);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return 5;
    }
}