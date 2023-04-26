<?php

namespace App\Account\Domain\User;

interface UserRepository
{
    public function save(User $user): void;
}