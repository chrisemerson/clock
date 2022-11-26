<?php declare(strict_types = 1);

namespace CEmerson\Clock;

use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Psr\Clock\ClockInterface;

class WallClock implements Clock, ClockInterface
{
    /** @var DateTimeZone */
    private $timeZone;

    public function __construct(DateTimeZone $timeZone)
    {
        $this->timeZone = $timeZone;
    }

    public function getDateTime(): DateTimeInterface
    {
        return $this->now();
    }

    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->timeZone);
    }
}
