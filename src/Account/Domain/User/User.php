<?php

declare(strict_types=1);

namespace App\Account\Domain\User;

use App\Account\Domain\User\Event\UserEvent;
use App\Account\Domain\User\ValueObject\Nip;
use App\Account\Domain\User\ValueObject\Pesel;

final class User
{
    use EventCollector;

    public readonly string $login;

    public readonly string $password;

    public readonly string $name;

    public readonly string $username;

    public readonly Pesel $pesel;

    public readonly Nip $nip;

    public bool $status;

    private string $id;

    public function __construct(
        string $id,
        string $login,
        string $password,
        string $name,
        string $username,
        Pesel $pesel,
        Nip $nip,
        bool $status
    ) {
        $this->id       = $id;
        $this->login    = $login;
        $this->password = $this->hashPassword($password);
        $this->name     = $name;
        $this->username = $username;
        $this->pesel    = $pesel;
        $this->nip      = $nip;
        $this->status   = $status;
    }

    public function activeUser(): void
    {
        $this->status = true;
        $this->addEvent(new UserEvent($this->id, new \DateTime()));
    }

    public function deactivateUser(): void
    {
        $this->status = false;
        $this->addEvent(new UserEvent($this->id, new \DateTime()));
    }

    public static function createUser(
        string $id,
        string $login,
        string $password,
        string $name,
        string $username,
        Pesel $pesel,
        Nip $nip,
        bool $status
    ): self {
        $user = new self($id, $login, $password, $name, $username, $pesel, $nip, $status);
        self::addEvent(new UserEvent($id, new \DateTime()));

        return $user;
    }

    public function getEvents(): array
    {
        return self::$events;
    }

    private function hashPassword(string $password): string
    {
        return \password_hash($password, PASSWORD_BCRYPT);
    }
}
