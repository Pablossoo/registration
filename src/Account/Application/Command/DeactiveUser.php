<?php

namespace App\Account\Application\Command;

final readonly class DeactiveUser
{
    public string $login;
    public string $active;


    public function __construct(string $login)
    {
        $this->login = $login;
    }
}