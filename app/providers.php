<?php
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->register(
    new Silex\Provider\MonologServiceProvider(),
    [
        'monolog.logfile' => __DIR__ . '/logs/development.log',
    ]
);

$app['monolog'] = $app->extend('monolog', function ($monolog, $app) {
    $monolog->pushHandler(
        new \Monolog\Handler\RotatingFileHandler($app['monolog.logfile'], 90, \Monolog\Logger::DEBUG)
    );

    return $monolog;
});