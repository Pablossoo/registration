<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\ORM;

use App\Account\Application\Query\UserQuery;
use App\Account\Domain\User\User;
use App\Account\Domain\User\UseRepository;
use Doctrine\ORM\EntityManagerInterface;

final readonly class UserRepository implements UseRepository, UserQuery
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }
    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function getUsersCollection(): array
    {
        // TODO: Implement getUsersCollection() method.
    }

    public function getLastCreatedUser(): User
    {
        // TODO: Implement getLastCreatedUser() method.
    }

    public function getUserById(int $id): User
    {
        // TODO: Implement getUserById() method.
    }
}
