<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\ORM;

use App\Account\Domain\User\User;
use App\Account\Domain\User\UseRepository;
use Doctrine\ORM\EntityManagerInterface;

final readonly class UserRepository implements UseRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }
    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

}
