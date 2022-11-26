<?php

namespace CEmerson\Clock;

use DateTimeInterface;
use Psr\Clock\ClockInterface;

class Psr20ClockAdapter implements Clock
{
    private ClockInterface $clock;

    public function __construct(ClockInterface $clock)
    {
        $this->clock = $clock;
    }

    public function getDateTime(): DateTimeInterface
    {
        return $this->clock->now();
    }
}
