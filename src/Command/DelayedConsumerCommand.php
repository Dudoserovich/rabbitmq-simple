<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DelayedConsumerCommand extends Command
{
    private ?object $delayedEmailProducer;

    public function __construct(ContainerInterface $container)
    {
        $this->delayedEmailProducer = $container->get('old_sound_rabbit_mq.delayed_send_email_producer');

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('app:delayed-consumer')
            ->setDescription('Delayed send email message');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->delayedEmailProducer->publish('Ура, сообщенька...');
        $this->delayedEmailProducer->publish('bad');

        return Command::SUCCESS;
    }
}
