<?php
use Silex\Application;

$app->mount('/api', function (Application $api) {
    $api->post('/integrate/{sourceIdentifier}/{queryParameter}', 'integrator.controller:integrateAction');
});