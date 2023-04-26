<?php

namespace App\Account\Domain\User\Event\Collector;

use App\Contract\EventCollectorInterface;
use App\Contract\EventInterface;

class EventCollector implements EventCollectorInterface
{
    private array $events = [];

    public function addEvent(EventInterface $event): void
    {
        $this->events[] = $event;
    }

    public function getEvents(): array
    {
        return $this->events;
    }
}