<?php
namespace Simonetti\IntegradorFinanceiro\Fixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Simonetti\IntegradorFinanceiro\Destination\Method;
use Simonetti\IntegradorFinanceiro\Destination\Request as DestinationRequest;
use Simonetti\IntegradorFinanceiro\Source\Request as SourceRequest;

/**
 * Class DestinationRequestFixture
 * @package Simonetti\IntegradorFinanceiro\Fixtures
 */
class DestinationRequestFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * @var array
     */
    private $data = [
        [
            'data' => [
                "CodEmpresa" => "72",
                "NumCnpj" => "56670666000101",
                "NomFantasia" => "EMPRESA INTEGRACAO",
                "RazaoSocial" => "EMPRESA INTEGRACAO LTDA SA",
                "DscRazaoSocial" => "142fdsafsagfsag",
                "NumInscricaoEstadual" => "1232123123",
                "NumInscricaoMunicipal" => "1232123123",
                "NomLogradouro" => "Logradouro",
                "NumLogradouro" => "3423",
                "DscComplemento" => "Complemento",
                "NomBairro" => "Bairro teste",
                "NomLocalidade" => "Sao Paulo",
                "SglUF" => "SP",
                "NumCep" => "09851180",
                "SglPais" => "BRA",
                "NumDDD" => "11",
                "NumTelefone" => "972357869",
                "DscEmail" => "Email@com.br",
                "NomFavorecido" => "Jose Joao da Silva",
                "NumCpfCnpjFavorecido" => "26639677857",
                "NumBanco" => 1,
                "NumAgencia" => 174,
                "NumContaCorrente" => 10847,
                "NumDigitoContaCorrente" => "2",
            ],
        ],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $data) {
            /**
             * @var $sourceRequest SourceRequest
             */
            $sourceRequest = $this->getReference('sourceRequest');

            /**
             * @var $method Method
             */
            $method = $this->getReference('method');

            $destinationRequest = new DestinationRequest(
                $sourceRequest,
                (object) $data['data'],
                $method
            );

            $manager->persist($destinationRequest);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return 8;
    }
}