<?php

namespace App\Command;

use App\Account\Application\Command\CreateUser;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsCommand(
    name: 'create-user',
    description: 'Create user command',
)]final class CreateUserCommand extends Command
{

    public function __construct(private MessageBusInterface $messageBus)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $uuid = UuidV4::uuid4();
        $this->messageBus->dispatch(new CreateUser($uuid->toString(),'rrr', 'test','test2', 'test3', '12345678910', '1234567891'));
        $io->success('User has been created');

        return Command::SUCCESS;
    }
}
