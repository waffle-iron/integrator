<?php
namespace Simonetti\IntegradorFinanceiro\Rabbit;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class IntegratorConsumer
 * @package Simonetti\IntegradorFinanceiro\Rabbit
 */
class IntegratorConsumer implements ConsumerInterface
{
    public function execute(AMQPMessage $msg)
    {
        // TODO: Implement execute() method.
    }
}