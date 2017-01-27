<?php

namespace Simonetti\IntegradorFinanceiro;

use Simonetti\IntegradorFinanceiro\Destination\Request;

/**
 * Interface IntegratorInterface
 * @package Simonetti\IntegradorFinanceiro
 */
interface BridgeInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function integrate(Request $request);
}