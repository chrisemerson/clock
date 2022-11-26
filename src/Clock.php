<?php declare(strict_types = 1);

namespace CEmerson\Clock;

use DateTimeInterface;

/**
 * @deprecated
 *
 * Use ClockInterface from PSR-20 instead. An adapter is provided in this package to help you use PSR-20
 * while switching out dependent code on this repo.
 */
interface Clock
{
    public function getDateTime(): DateTimeInterface;
}
