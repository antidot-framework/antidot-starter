<?php

declare(strict_types=1);

use Antidot\Framework\Application;
use App\Application\Http\Handler\HomePage;
use App\Application\Http\Handler\SomeMiddleware;
use Psr\Container\ContainerInterface;

/**
 * Setup routes with a single request method:
 *
 * $app->get('/', [App\Handler\HomePageHandler::class], 'home');
 * $app->post('/album', [App\Handler\AlbumCreateHandler::class], 'album.create');
 * $app->put('/album/:id', [App\Handler\AlbumUpdateHandler::class], 'album.put');
 * $app->patch('/album/:id', [App\Handler\AlbumUpdateHandler::class], 'album.patch');
 * $app->delete('/album/:id', [App\Handler\AlbumDeleteHandler::class], 'album.delete');
 */
return static function (Application $app, ContainerInterface $container) : void {
    $app->get('/', [SomeMiddleware::class, HomePage::class], 'home');
};
