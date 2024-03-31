<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class TestConsumerCommand extends Command
{
    private ?object $emailProducer;

    public function __construct(ContainerInterface $container)
    {
        $this->emailProducer = $container->get('old_sound_rabbit_mq.send_email_producer');

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('app:test-consumer')
            ->setDescription('Hello PhpStorm');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->emailProducer->publish('Сообщенька для отправки на мыло...');

        return Command::SUCCESS;
    }
}
