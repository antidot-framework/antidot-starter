<?php

declare(strict_types=1);

use Antidot\Application\Http\Application;
use Antidot\Application\Http\Handler\ApplicationRequestHandler;
use Antidot\Application\Http\Middleware\RouteDispatcherMiddleware;
use Antidot\Application\Http\Middleware\RouteNotFoundMiddleware;
use Antidot\Application\Http\ServerRequestErrorResponseGenerator;
use Antidot\Container\ApplicationFactory;
use Antidot\Container\EmitterFactory;
use Antidot\Container\ServerRequestErrorResponseGeneratorFactory;
use Aura\Router\RouterContainer;
use Zend\HttpHandlerRunner\Emitter\EmitterStack;

return [
    'dependencies' => [
        'invokables' => [
            ApplicationRequestHandler::class => ApplicationRequestHandler::class,
            RouterContainer::class => RouterContainer::class,
            RouteDispatcherMiddleware::class => RouteDispatcherMiddleware::class,
            RouteNotFoundMiddleware::class => RouteNotFoundMiddleware::class,
        ],
        'factories' => [
            Application::class => ApplicationFactory::class,
            EmitterStack::class => EmitterFactory::class,
            ServerRequestErrorResponseGenerator::class => ServerRequestErrorResponseGeneratorFactory::class,
        ]
    ]
];
