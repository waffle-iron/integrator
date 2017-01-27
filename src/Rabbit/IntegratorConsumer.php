<?php
namespace Simonetti\IntegradorFinanceiro\Rabbit;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use OldSound\RabbitMqBundle\RabbitMq\Producer as RabbitProducer;
use Simonetti\IntegradorFinanceiro\Services\RequestService;

/**
 * Class IntegratorConsumer
 * @package Simonetti\IntegradorFinanceiro\Rabbit
 */
class IntegratorConsumer implements ConsumerInterface
{
    /**
     * @var RequestService
     */
    protected $requestService;

    /**
     * @var RabbitProducer
     */
    protected $rabbitProducer;

    /**
     * IntegratorConsumer constructor.
     * @param RequestService $requestService
     * @param RabbitProducer $rabbitProducer
     */
    public function __construct(RequestService $requestService, RabbitProducer $rabbitProducer)
    {
        $this->requestService = $requestService;
        $this->rabbitProducer = $rabbitProducer;
    }

    public function execute(AMQPMessage $msg)
    {
        try {
            $sourceRequest = $this->requestService->findSourceRequest($msg->body);

            foreach ($sourceRequest->getDestinationRequests() as $destinationRequest) {

            }
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;

            $this->rabbitProducer->publish($msg->body);
        }
    }
}