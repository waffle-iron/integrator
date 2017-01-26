<?php
use Simonetti\IntegradorFinanceiro\ConnectionManager;
use Simonetti\IntegradorFinanceiro\Services\RequestService;
use Simonetti\IntegradorFinanceiro\Destination;

/* Repositories */
$app['source.request.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository('Simonetti\\IntegradorFinanceiro\\Source\\Request');
};

$app['destination.request.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository('Simonetti\\IntegradorFinanceiro\\Destination\\Request');
};

/* Services */
$app['connection_manager.service'] = function () use ($app) {
    return new ConnectionManager();
};

$app['destination.request.creator'] = function () use ($app) {
    return new Destination\RequestCreator($app['connection_manager.service']);
};

$app['request.service'] = function () use ($app) {
    return new RequestService(
        $app['connection_manager.service'],
        $app['source.request.repository'],
        $app['destination.request.repository']
    );
};