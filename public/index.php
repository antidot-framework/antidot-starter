<?php

declare(strict_types=1);

// Delegate static file requests back to the PHP built-in webserver
use Antidot\Application\Http\Application;

if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}
\chdir(\dirname(__DIR__));
require 'vendor/autoload.php';
/**
 * Self-called anonymous function that creates its own scope and keep the global namespace clean.
 */
\call_user_func(static function (): void {
    error_reporting(E_ALL & ~E_USER_DEPRECATED & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);

    /** @var \Psr\Container\ContainerInterface $container */
    $container = require 'config/container.php';
    /** @var Application $app */
    $app = $container->get(Application::class);
    // Execute programmatic/declarative middleware pipeline and routing
    // configuration statements
    (require 'router/middleware.php')($app, $container);
    (require 'router/routes.php')($app, $container);
    $app->run();
});
