<?php declare(strict_types = 1);

namespace CEmerson\Clock;

use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;

class WallClock implements Clock
{
    /** @var DateTimeZone */
    private $timeZone;

    public function __construct(DateTimeZone $timeZone)
    {
        $this->timeZone = $timeZone;
    }

    public function getDateTime(): DateTimeInterface
    {
        return new DateTimeImmutable('now', $this->timeZone);
    }
}
