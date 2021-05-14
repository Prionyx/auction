<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

http_response_code(500);

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([
    'config' => [
        'debug' => (bool)getenv('APP_DEBUG'),
    ],
]);
$container = $containerBuilder->build();
$app = AppFactory::createFromContainer($container);

$app->addErrorMiddleware($container->get('config')['debug'], true, true);

(require __DIR__ . '/../config/routes.php')($app);

$app->run();
