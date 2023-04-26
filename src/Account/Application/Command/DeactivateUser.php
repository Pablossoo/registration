<?php

declare(strict_types=1);

namespace App\Account\Application\Command;

final readonly class DeactivateUser
{
    public string $login;

    public function __construct(string $login)
    {
        $this->login = $login;
    }
}
