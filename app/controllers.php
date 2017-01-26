<?php

$app['integrator.controller'] = function () use ($app) {
    return new \Simonetti\IntegradorFinanceiro\Controllers\IntegratorController();
};