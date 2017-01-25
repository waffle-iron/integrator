<?php
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Symfony\Component\Console\Helper\QuestionHelper;

$app = include __DIR__ . '/../vendor/autoload.php';

$app = include __DIR__ . '/app.php';

$console = new Application('My Silex Application', 'n/a');

$console->getDefinition()->addOption(new InputOption('--env', '-e', InputOption::VALUE_REQUIRED,
    'The Environment name.', 'dev'));

$console->setDispatcher($app['dispatcher']);

$helperSet = new HelperSet([
    'db' => new ConnectionHelper($app['orm.em']->getConnection()),
    'em' => new EntityManagerHelper($app['orm.em']),
    'dialog' => new QuestionHelper(),
]);

$console->setHelperSet($helperSet);

Doctrine\ORM\Tools\Console\ConsoleRunner::addCommands($console);

$console->run();