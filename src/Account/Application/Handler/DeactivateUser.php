<?php

namespace App\Account\Application\Handler;

use App\Account\Application\Query\UserQuery;

use App\Account\Domain\User\UserRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class DeactivateUser
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function __invoke(\App\Account\Application\Command\DeactivateUser $deactivateUserCommand): void
    {
        $user = $this->userRepository->getUserByLogin($deactivateUserCommand->login);
        $user->deactiveUser();
        $this->userRepository->save($user);
    }
}