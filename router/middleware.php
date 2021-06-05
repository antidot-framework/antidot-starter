<?php

declare(strict_types=1);

use Antidot\Application\Http\Application;
use Antidot\Application\Http\Middleware\ErrorMiddleware;
use Antidot\Application\Http\Middleware\RouteDispatcherMiddleware;
use Antidot\Application\Http\Middleware\RouteNotFoundMiddleware;
use Antidot\Logger\Application\Http\Middleware\ExceptionLoggerMiddleware;
use Antidot\Logger\Application\Http\Middleware\RequestLoggerMiddleware;
use Antidot\NoFLoC\NoFLoCMiddleware;

return static function (Application $app) : void {
    $app->pipe(NoFLoCMiddleware::class);
    $app->pipe(ErrorMiddleware::class);
    $app->pipe(ExceptionLoggerMiddleware::class);
    $app->pipe(RequestLoggerMiddleware::class);
    $app->pipe(RouteDispatcherMiddleware::class);
    $app->pipe(RouteNotFoundMiddleware::class);
};
