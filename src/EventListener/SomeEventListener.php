<?php

declare(strict_types=1);

namespace App\EventListener;

use Psr\Log\LoggerInterface;
use App\Event\SomeEvent;
use function sprintf;

final class SomeEventListener
{
    public function __construct(
        private LoggerInterface $logger
    ) {
    }

    public function __invoke(SomeEvent $event): void
    {
        $this->logger->debug(sprintf('Event `%s` captured.', get_class($event)));
    }
}
