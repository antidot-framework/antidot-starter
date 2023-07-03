<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use App\Event\SomeEvent;

final class HomePage implements RequestHandlerInterface
{
    public function __construct(
        private EventDispatcherInterface $eventDispatcher,
        private ResponseFactoryInterface $responseFactory
    ) {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->eventDispatcher->dispatch(SomeEvent::occur());

        $response = $this->responseFactory->createResponse();
        $response = $response->withAddedHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode([
            'docs' => 'https://antidotfw.io',
            'Message' => 'Welcome to Antidot Framework Starter'
        ], JSON_THROW_ON_ERROR));

        return $response;
    }
}
