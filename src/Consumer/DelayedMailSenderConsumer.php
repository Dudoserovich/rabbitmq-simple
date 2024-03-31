<?php

namespace App\Consumer;

use Exception;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use OldSound\RabbitMqBundle\RabbitMq\ProducerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class DelayedMailSenderConsumer implements ConsumerInterface
{
    private ProducerInterface $delayedProducer;

    public function __construct(ProducerInterface $delayedProducer)
    {
        $this->delayedProducer = $delayedProducer;
    }

    public function execute(AMQPMessage $msg): void
    {
        $body = $msg->getBody();

        echo 'Ну тут типа сообщение отправляю ' . $body . ' ...' . PHP_EOL;

        try {
            if ($body == 'bad') {
                throw new Exception();
            }

            echo 'Успешно отправлено...'.PHP_EOL;
        } catch (Exception $exception) {
            echo 'ERROR' . PHP_EOL;
            $this->delayedProducer->publish($body);
        }
    }
}
