<?php

declare(strict_types=1);

use Antidot\Framework\Application;
use Antidot\Framework\Middleware\MiddlewareFactory;
use Antidot\Framework\Router\RouteFactory;
use Antidot\Framework\Router\Router;
use Antidot\Framework\Runtime\AntidotRuntime;

ini_set('memory_limit', '2048M');

$_SERVER['APP_RUNTIME'] = AntidotRuntime::class;
$_SERVER['APP_RUNTIME_OPTIONS'] = [
    'host' => '0.0.0.0',
    'port' => 3000,
    'debug' => true,
];
$rootDir = dirname(__DIR__);

require_once $rootDir . '/vendor/autoload_runtime.php';

return static function () use ($rootDir) {
    $container = require $rootDir . '/config/container.php';
    $middlewareFactory = $container->get(MiddlewareFactory::class);
    $application = new Application(
        $middlewareFactory,
        new RouteFactory(),
        $container->get(Router::class)
    );
    (require $rootDir . '/router/middleware.php')($application);
    (require $rootDir . '/router/routes.php')($application, $container);

    return $application;
};

