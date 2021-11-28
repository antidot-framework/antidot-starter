<?php

declare(strict_types=1);

use Antidot\Framework\Application;
use Antidot\Runtime\AntidotRuntime;

ini_set('memory_limit', '2048M');

$_SERVER['APP_RUNTIME'] = AntidotRuntime::class;
$rootDir = dirname(__DIR__);

require_once $rootDir . '/vendor/autoload_runtime.php';

return static function () use ($rootDir) {
    $container = require $rootDir . '/config/container.php';
    $application = $container->get(Application::class);

    (require $rootDir . '/router/middleware.php')($application);
    (require $rootDir . '/router/routes.php')($application, $container);

    return $container;
};

