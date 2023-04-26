<?php

namespace App\Account\Application\Handler;

use App\Account\Domain\User\User;
use App\Account\Domain\User\UseRepository;
use App\Account\Domain\User\ValueObject\Nip;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class CreateUser
{
    public function __construct(private UseRepository $useRepository)
    {
    }

    public function __invoke(\App\Application\Command\CreateUser $createUserCommand): void
    {
        $user = new User(
            $createUserCommand->login,
            $createUserCommand->password,
            $createUserCommand->name,
            $createUserCommand->username,
            new Pesel($createUserCommand->pesel),
            new Nip($createUserCommand->nip)
        );
        $this->useRepository->save($user);
    }
}