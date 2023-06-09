<?php

declare(strict_types=1);

namespace App\Account\Infrastructure\ORM;

use App\Account\Application\Query\UserQuery;
use App\Account\Domain\User\User;
use Symfony\Contracts\Cache\CacheInterface;

final readonly class CacheUserRepository implements UserQuery
{
    public function __construct(
        private CacheInterface $cache,
        private UserQuery $userQuery
    ) {
    }

    public function getUsersCollection(): array
    {
        if ($this->cache->get('users')) {
            return $this->cache->get('users', function (): array {
                return $this->userQuery->getUsersCollection();
            });
        }
    }

    public function getLastCreatedUser(): User
    {
        if ($this->cache->get('last-created')) {
            return $this->cache->get('last-created', function (): array {
                return $this->userQuery->getUsersCollection();
            });
        }
    }

    public function getUserByUuid(string $id): User
    {
        if ($this->cache->get('user-uuid')) {
            return $this->cache->get('user-uuid', function () use ($id): array {
                return $this->userQuery->getUsersCollection($id);
            });
        }
    }

    public function getUserByLogin(string $login): User
    {
        if ($this->cache->get('user-login')) {
            return $this->cache->get('user-login', function ($login): \App\Account\Domain\User\User {
                return $this->userQuery->getUserByLogin($login);
            });
        }
    }
}
