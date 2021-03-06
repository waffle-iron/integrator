<?php
use Simonetti\IntegradorFinanceiro\ConnectionManager;
use Simonetti\IntegradorFinanceiro\Services\RequestService;
use Simonetti\IntegradorFinanceiro\Destination;
use Simonetti\IntegradorFinanceiro\Source;
use Simonetti\IntegradorFinanceiro\Rabbit;
use Simonetti\IntegradorFinanceiro\Services\SourceService;
use Simonetti\IntegradorFinanceiro\BridgeFactory;

/* Repositories */
$app['source.request.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository(Source\Request::class);
};

$app['destination.request.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository(Destination\Request::class);
};

$app['source.repository'] = function () use ($app) {
    return $app['orm.em']->getRepository(Source\Source::class);
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
        $app['destination.request.creator'],
        $app['source.request.repository'],
        $app['destination.request.repository']
    );
};

$app['source.service'] = function () use ($app) {
    return new SourceService($app['source.repository']);
};

$app['bridge.factory'] = function () use ($app) {
    return new BridgeFactory($app);
};

/* Rabbit Consumers */
$app['integrator_consumer'] = function () use ($app) {
    return new Rabbit\IntegratorConsumer(
        $app['request.service'],
        $app['rabbit.producer']['integrator_producer'],
        $app['bridge.factory']
    );
};