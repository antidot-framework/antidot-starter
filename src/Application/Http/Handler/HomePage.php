<?php

declare(strict_types=1);

namespace App\Application\Http\Handler;

use App\Application\Event\SomeEvent;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomePage implements RequestHandlerInterface
{
    /** @var EventDispatcherInterface */
    private $eventDispatcher;
    private ResponseFactoryInterface $responseFactory;

    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        ResponseFactoryInterface $responseFactory
    ) {
        $this->eventDispatcher = $eventDispatcher;
        $this->responseFactory = $responseFactory;
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
