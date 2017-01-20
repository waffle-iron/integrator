<?php

namespace Simonetti\IntegradorFinanceiro\Bridge;


use Simonetti\IntegradorFinanceiro\Destination\Request;

class Rovereti
{
    /**
     * Version Reference.
     * @var string
     */
    protected $version = 1.0;

    /**
     * Name of the service to be consumed
     * @var string
     */
    protected $name = 'Rovereti';

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Responsible for performing a service
     * @param Request $request
     */
    public function execute(Request $request)
    {
        switch ($request->getMethodIdentifier()) {
            case 'IncluirPessoaJuridica':
                break;
        }

    }

}