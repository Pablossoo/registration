<?php

declare(strict_types=1);

namespace App\Account\Application\Handler;

use App\Account\Domain\User\UserRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class ActiveUser
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function __invoke(\App\Account\Application\Command\ActiveUser $activeUserCommand): void
    {
        $user = $this->userRepository->getUserByLogin($activeUserCommand->login);
        $user->activeUser();

        $this->userRepository->save($user);
    }
}
