<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\ORM;

use App\Account\Application\Query\UserQuery;
use App\Account\Domain\User\User;
use App\Account\Domain\User\UseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        return $this->entityManager->createQueryBuilder()
            ->orderBy('u.id', 'ASC')
            ->getQuery()->getResult();
    }

    public function getLastCreatedUser(): User
    {
        $user = $this->entityManager->createQueryBuilder()
            ->setMaxResults(1)
            ->orderBy('u.id', 'DESC')
            ->getQuery()->getOneOrNullResult();

        if ($user === null) {
            throw new NotFoundHttpException('User not Found');
        }

        return $user;
    }

    public function getUserById(int $id): User
    {
        $user = $this->entityManager->createQueryBuilder()
            ->where('u.id = :id')
            ->setParameter(':id', $id)
            ->getQuery()->getOneOrNullResult();

        if ($user === null) {
            throw new NotFoundHttpException('User not Found');
        }

        return $user;
    }
}
