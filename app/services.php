<?php
use Simonetti\IntegradorFinanceiro\ConnectionManager;
use Simonetti\IntegradorFinanceiro\Services\RequestService;
use Simonetti\IntegradorFinanceiro\Destination;
use Simonetti\IntegradorFinanceiro\Source;
use Simonetti\IntegradorFinanceiro\Rabbit;

/* Repositories */
$app['source.request.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository(Source\Request::class);
};

$app['destination.request.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository(Destination\Request::class);
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

/* Rabbit Consumers */
$app['integrator_consumer'] = function () use ($app) {
    return new Rabbit\IntegratorConsumer();
};