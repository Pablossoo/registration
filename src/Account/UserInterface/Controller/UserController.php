<?php

namespace App\Account\UserInterface\Controller;

use App\Application\Command\CreateUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user', methods: ['GET']) ]
    public function index(Request $request, MessageBusInterface $messageBus): Response
    {

        $messageBus->dispatch(new CreateUser());

        return $this->json([
            'message' => 'user has been created !',
        ]);
    }
}
