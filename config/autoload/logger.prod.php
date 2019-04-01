<?php

declare(strict_types=1);

use Antidot\Logger\Container\MonologFactory;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

/**
 * @see https://github.com/wshafer/psr11-monolog
 */
return [
    'dependencies' => [
        'factories' => [
            LoggerInterface::class => MonologFactory::class,
        ],
    ],
    'monolog' => [
        'handlers' => [
            'default' => [
                'type' => 'stream',
                'options' => [
                    'stream' => \sprintf(
                        '%s/%s-%s.log',
                        \dirname(__DIR__, 2).'/var/log/',
                        (new DateTimeImmutable())->format('Y-m-d'),
                        'default'
                    ),
                    'level' => Logger::ERROR,
                ],
            ],
        ],
        'channels' => [
        ],
    ],
];
