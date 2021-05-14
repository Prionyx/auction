<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\App;

require __DIR__ . '/../vendor/autoload.php';

http_response_code(500);

/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/container.php';

/** @var App $app */
$app = (require __DIR__ . '/../config/app.php')($container);
$app->run();
