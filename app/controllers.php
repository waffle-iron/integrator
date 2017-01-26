<?php
use Simonetti\IntegradorFinanceiro\Controllers\IntegratorController;

$app['integrator.controller'] = function () use ($app) {
    return new IntegratorController();
};