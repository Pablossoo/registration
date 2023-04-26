<?php

declare(strict_types=1);

namespace App\Infrastructure\ORM;

use App\Domain\User\User;
use App\Domain\User\UseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

final readonly class UserRepository implements UseRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }
    public function save(User $user): void
    {
        persist($user);
        $this->entityManager->flush();
    }

}
