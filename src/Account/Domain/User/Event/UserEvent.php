<?php

namespace App\Account\Domain\User\Event;

use App\Contract\EventInterface;

class UserEvent implements EventInterface
{
    public readonly string $id;

    public readonly \DateTimeInterface $created;

    public function __construct(string $id, \DateTimeInterface $created)
    {
        $this->id = $id;
        $this->created = $created;
    }
}