<?php

declare(strict_types=1);

namespace App\Account\Domain\User;

use App\Account\Domain\ValueObject\Nip;
use App\Account\Domain\ValueObject\Pesel;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class User
{
    private UuidInterface $id;

    private readonly string $login;

    private readonly string $password;

    private readonly string $name;

    private readonly string $username;

    private readonly Pesel $pesel;

    private readonly Nip $nip;

    public function __construct(string $login, string $password, string $name, string $username, Pesel $pesel, Nip $nip)
    {
        $this->id = Uuid::uuid4();
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->username = $username;
        $this->pesel = $pesel;
        $this->nip = $nip;
    }
}
