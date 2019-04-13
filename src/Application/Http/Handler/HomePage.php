<?php

declare(strict_types=1);

namespace App\Application\Http\Handler;

use App\Application\Event\SomeEvent;
use Exception;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\HtmlResponse;

class HomePage implements RequestHandlerInterface
{
    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->eventDispatcher->dispatch(SomeEvent::occur());

        return new HtmlResponse('<html><body><h1>Hola mundo</h1></body></html>');
    }
}
