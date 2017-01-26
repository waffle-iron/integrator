<?php
use Silex\Application;

if (!defined('APP_PATH')) {
    define('APP_PATH', __DIR__);
}

require_once __DIR__ . '/config.php';

$app = new Application();

if ('prod' == APP_ENV) {
    $app['debug'] = true;
}

require_once __DIR__ . '/providers.php';
include_once __DIR__ . '/controllers.php';

return $app;
