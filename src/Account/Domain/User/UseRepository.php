<?php

namespace App\Account\Domain\User;

interface UseRepository
{
    public function save(User $user): void;
}