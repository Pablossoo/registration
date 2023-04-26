<?php

namespace App\Account\Domain\User;

use App\Contract\EventInterface;

trait EventCollector
{
    private static array $events = [];

    private static function addEvent(EventInterface $event): void
    {
        self::$events [] = $event;
    }

    private static function getEvents(): array
    {
        return self::$events;
    }
}