<?php

namespace App\Account\Application\Handler;

use App\Account\Domain\User\User;
use App\Account\Domain\User\UserRepository;
use App\Account\Domain\User\ValueObject\Nip;
use App\Account\Domain\User\ValueObject\Pesel;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class CreateUser
{
    public function __construct(private UserRepository $useRepository)
    {
    }

    public function __invoke(\App\Account\Application\Command\CreateUser $createUserCommand): void
    {
        $user = User::createUser(
            $createUserCommand->id,
            $createUserCommand->login,
            $createUserCommand->password,
            $createUserCommand->name,
            $createUserCommand->username,
            new Pesel($createUserCommand->pesel),
            new Nip($createUserCommand->nip),
            $createUserCommand->status);

        $this->useRepository->save($user);

        //tutaj powinna być jakąś obsługa transakcji, jeżeli jest w porzadku to wypuszczamy eventy dalej

        foreach ($user->getEvents() as $event) {
            $this->eventDispatcher()->publish($event);
        }
    }
}