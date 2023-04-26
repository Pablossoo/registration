<?php

declare(strict_types=1);

namespace App\Account\Application\Command;

final readonly class CreateUser
{
    public string $id;

    public string $login;

    public string $password;

    public string $name;

    public string $username;

    public string $pesel;

    public string $nip;

    public bool $status;

    public function __construct(
        string $id,
        string $login,
        string $password,
        string $name,
        string $username,
        string $pesel,
        string $nip,
        bool $status
    ) {
        $this->id       = $id;
        $this->login    = $login;
        $this->password = $password;
        $this->name     = $name;
        $this->username = $username;
        $this->pesel    = $pesel;
        $this->nip      = $nip;
        $this->status   = $status;
    }
}
