<?php

declare(strict_types=1);

namespace App\Account\Domain\User;

use App\Contract\EventInterface;

trait EventCollector
{
    private static array $events = [];

    private static function addEvent(EventInterface $event): void
    {
        self::$events[] = $event;
    }
}
