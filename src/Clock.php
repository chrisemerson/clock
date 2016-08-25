<?php declare(strict_types = 1);

namespace CEmerson\Clock;

use DateTimeInterface;

interface Clock
{
    public function getDateTime(): DateTimeInterface;
}
