<?php
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use Dflydev\Provider\DoctrineOrm\DoctrineOrmServiceProvider;

if (!defined('APP_PATH')) {
    define('APP_PATH', __DIR__);
}

require_once __DIR__ . '/config.php';

$app = new Application();

$app->register(new DoctrineServiceProvider, [
    'db.options' => [
        'driver' => 'pdo_mysql',
        'host' => '192.168.111.2',
        'dbname' => 'integradorFinanceiro',
        'user' => '',
        'password' => '',
        'charset' => 'utf8mb4',
    ],
]);

$app->register(new DoctrineOrmServiceProvider, [
    'orm.proxies_dir' => __DIR__ . '/../var/cache/',
    'orm.em.options' => [
        'mappings' => [
            [
                'type' => 'annotation',
                'namespace' => 'Simonetti\IntegradorFinanceiro',
                'path' => __DIR__ . '/../src',
                'use_simple_annotation_reader' => false
            ]
        ],
    ],
]);

$app->register(new Silex\Provider\ValidatorServiceProvider());

if ('prod' == APP_ENV) {
    $app['debug'] = true;
}

require_once __DIR__ . '/providers.php';

return $app;
