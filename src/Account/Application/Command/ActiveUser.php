<?php

declare(strict_types=1);

namespace App\Account\Application\Command;

final readonly class ActiveUser
{
    public string $login;

    public function __construct(string $login)
    {
        $this->login = $login;
    }
}
