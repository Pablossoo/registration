<?php

namespace App\Account\Application\Handler;

use App\Account\Application\Query\UserQuery;

use App\Account\Domain\User\UseRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class DeactivateUser
{
    public function __construct(private UseRepository $userRepository)
    {
    }

    public function __invoke(\App\Account\Application\Command\DeactiveUser $deactivateUserCommand): void
    {
        $user = $this->userRepository->getUserByLogin($deactivateUserCommand->login);
        $user->deactiveUser();
        $this->userRepository->save($user);
    }
}