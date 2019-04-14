<?php

declare(strict_types=1);

namespace App\Application\EventListener;

use App\Application\Event\SomeEvent;
use Psr\Log\LoggerInterface;

use function get_class;
use function sprintf;

class SomeEventListener
{
    /** @var LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(SomeEvent $event): void
    {
        $this->logger->debug(sprintf('Event `%s` captured.', get_class($event)));
    }
}
