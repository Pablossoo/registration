<?php

namespace App\Account\Application\Handler;

use App\Account\Domain\User\User;
use App\Account\Domain\User\UseRepository;

final readonly class CreateUser
{
    public function __construct(private UseRepository $useRepository)
    {
    }

    public function __invoke(): User
    {

    }
}