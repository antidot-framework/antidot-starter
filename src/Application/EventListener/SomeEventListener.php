<?php

declare(strict_types=1);

namespace App\Application\EventListener;

use App\Application\Event\SomeEvent;
use Psr\Log\LoggerInterface;

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
