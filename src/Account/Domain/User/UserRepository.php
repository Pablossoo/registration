<?php

declare(strict_types=1);

namespace App\Account\Domain\User;

interface UserRepository
{
    public function save(User $user): void;
}
