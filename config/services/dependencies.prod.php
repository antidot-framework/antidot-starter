<?php

declare(strict_types=1);

use App\Handler\HomePage;
use App\Handler\SomeMiddleware;
use App\Command\SomeCommandExample;
use App\Event\SomeEvent;
use App\EventListener\SomeEventListener;

return [
    // Config
    'debug' => false,
    'config_cache_enabled' => true,
    'log_level' => 'WARNING',
    'server' => [
        'workers' => 4,
        'host' => '0.0.0.0',
        'port' => 3000,
    ],
    // Dependencies
    'services' => [
        HomePage::class => HomePage::class,
        SomeMiddleware::class => SomeMiddleware::class,
        SomeEventListener::class => SomeEventListener::class,
    ],
    'app-events' => [
        'event-listeners' => [
            SomeEvent::class => [
                SomeEventListener::class,
            ],
        ],
    ],
    'console' => [
        'commands' => [
            'my:custom:command' => SomeCommandExample::class,
        ],
        'services' => [
            SomeCommandExample::class => SomeCommandExample::class,
        ],
    ],
];
