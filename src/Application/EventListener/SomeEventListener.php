<?php

declare(strict_types=1);

namespace App\Application\EventListener;

use App\Application\Event\SomeEvent;

class SomeEventListener
{
    public function __invoke(SomeEvent $event): void
    {
        dump('Yes!!!', $event);
    }
}
