<?php

declare(strict_types=1);

namespace App\Account\UserInterface\Controller;

use App\Account\Application\Command\CreateUser;
use App\Account\Application\Query\UserQuery;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

final class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user', methods: ['GET'])]
    public function index(MessageBusInterface $messageBus, UserQuery $userQuery): Response
    {
        $uuid = UuidV4::uuid4();
        $messageBus->dispatch(
            new CreateUser($uuid->toString(), 'rrr', 'test', 'test2', 'test3', '12345678910', '1234567891')
        );
        $createdUser = $userQuery->getLastCreatedUser();

        return $this->json([
            'message'           => 'user has been created !',
            'last_created_user' => $createdUser->name,
        ]);
    }
}
