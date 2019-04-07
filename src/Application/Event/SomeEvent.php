<?php

declare(strict_types=1);

namespace App\Application\Event;

use Antidot\Event\Event;

final class SomeEvent extends Event
{
    private function __construct(string $name)
    {
        $this->name = $name;
        $this->stopped = false;
    }

    public static function occur(): self
    {
        return new self('some.event');
    }
}
