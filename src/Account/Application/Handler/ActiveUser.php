<?php

namespace App\Account\Application\Handler;

use App\Account\Domain\User\UseRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class ActiveUser
{
    public function __construct(private UseRepository $userRepository)
    {
    }

    public function __invoke(\App\Account\Application\Command\ActiveUser $activeUserCommand): void
    {
        $user = $this->userRepository->getUserByLogin($activeUserCommand->login);
        $user->activeUser();
        $this->userRepository->save($user);
    }
}