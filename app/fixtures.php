<?php
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

include __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/app.php';

$loader = new Loader();
$loader->loadFromDirectory(__DIR__ . '/../src/Fixtures');

$purger = new ORMPurger();

$executor = new ORMExecutor($app['orm.em'], $purger);

$executor->execute($loader->getFixtures(), false);