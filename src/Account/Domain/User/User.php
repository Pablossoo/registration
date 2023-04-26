<?php

declare(strict_types=1);

namespace App\Account\Domain\User;

use App\Account\Domain\User\ValueObject\Nip;
use App\Account\Domain\User\ValueObject\Pesel;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

final class User
{
    private UuidInterface $id;

    public readonly string $login;

    public readonly string $password;

    public readonly string $name;

    public readonly string $username;

    public readonly Pesel $pesel;

    public readonly Nip $nip;

    public function __construct(string $login, string $password, string $name, string $username, Pesel $pesel, Nip $nip)
    {
        $this->id = Uuid::uuid4();
        $this->login = $login;
        $this->password = $this->hashPassword($password);
        $this->name = $name;
        $this->username = $username;
        $this->pesel = $pesel;
        $this->nip = $nip;
    }

    private function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
