<?php

namespace App\Application\Command;

final readonly class CreateUser
{
    public string $login;

    public string $password;

    public string $name;

    public string $username;

    public string $pesel;

    public string $nip;
}