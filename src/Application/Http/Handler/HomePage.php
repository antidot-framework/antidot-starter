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
use Zend\Diactoros\Response\JsonResponse;

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

        return new JsonResponse([
            'docs' => 'https://antidotfw.io',
            'Message' => 'Welcome to Antidot Framework Starter'
        ]);
    }
}
