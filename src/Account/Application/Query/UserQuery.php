<?php

namespace App\Account\Application\Query;

use App\Account\Domain\User\User;

interface UserQuery
{
    public function getUsersCollection(): array;

    public function getLastCreatedUser(): User;

    public function getUserById(int $id): User;
}