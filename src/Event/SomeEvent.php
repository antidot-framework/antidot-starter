<?php

declare(strict_types=1);

namespace App\Event;

use Antidot\Event\Event;

final class SomeEvent extends Event
{
    private function __construct()
    {
        $this->stopped = false;
    }

    public static function occur(): self
    {
        return new self();
    }
}
