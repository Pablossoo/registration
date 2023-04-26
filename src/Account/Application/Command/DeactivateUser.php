<?php

namespace App\Account\Application\Command;

final readonly class DeactivateUser
{
    public string $login;

    public function __construct(string $login)
    {
        $this->login = $login;
    }
}