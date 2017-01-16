<?php
// Rabbit
define('RABBIT_HOST', getenv('RABBIT_HOST') ?: 'rabbit');
define('RABBIT_PORT', getenv('RABBIT_PORT') ?: 5672);
define('RABBIT_USER', getenv('RABBIT_USER') ?: 'guest');
define('RABBIT_PASSWORD', getenv('RABBIT_PASSWORD' ?: 'guest'));
define('RABBIT_VHOST', getenv('RABBIT_VHOST') ?: '/');