<?php

namespace App\Contract;

interface EventCollectorInterface
{
    public function addEvent(EventInterface $event): void;

    public function getEvents(): array;
}