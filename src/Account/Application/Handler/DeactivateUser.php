<?php

declare(strict_types=1);

namespace App\Account\Application\Handler;

use App\Account\Domain\User\UserRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class DeactivateUser
{
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    public function __invoke(\App\Account\Application\Command\DeactivateUser $deactivateUserCommand): void
    {
        $user = $this->userRepository->getUserByLogin($deactivateUserCommand->login);
        $user->deactivateUser();

        $this->userRepository->save($user);
    }
}
