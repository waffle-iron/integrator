<?php
use Silex\Application;

if (!defined('APP_PATH')) {
    define('APP_PATH', __DIR__);
}

$app = new Application();
$app['debug'] = true;

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/providers.php';

return $app;