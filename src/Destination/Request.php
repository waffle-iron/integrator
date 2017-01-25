<?php
namespace Simonetti\IntegradorFinanceiro\Destination;

use Doctrine\ORM\Mapping as ORM;
use Simonetti\IntegradorFinanceiro\Source\Request as SourceRequest;

/**
 * Class Request
 * @package Simonetti\IntegradorFinanceiro\Destination
 * @ORM\Entity()
 * @ORM\Table(name="destination_request")
 */
class Request
{
    /**
     * Destination Request ID
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", name="id")
     * @var int
     */
    protected $id;

    /**
     * Source Request
     * @ORM\ManyToOne(targetEntity="Simonetti\IntegradorFinanceiro\Source\Request")
     * @ORM\JoinColumn(name="source_request_id", referencedColumnName="id")
     * @var SourceRequest
     */
    protected $sourceRequest;

    /**
     * Source Data
     * @ORM\Column(type="object", name="data")
     * @var \stdClass
     */
    protected $data;

    /**
     * Source Method
     * @ORM\ManyToOne(targetEntity="Simonetti\IntegradorFinanceiro\Destination\Method")
     * @ORM\JoinColumn(name="method_id", referencedColumnName="id")
     * @var Method
     */
    protected $method;

    /**
     * Request constructor.
     * @param SourceRequest $sourceRequest
     * @param \stdClass $data
     * @param Method $method
     */
    public function __construct(
        SourceRequest $sourceRequest,
        \stdClass $data,
        Method $method
    ) {
        $this->sourceRequest = $sourceRequest;
        $this->data = $data;
        $this->method = $method;
    }

    /**
     * @return SourceRequest
     */
    public function getSourceRequest(): SourceRequest
    {
        return $this->sourceRequest;
    }

    /**
     * @return \stdClass
     */
    public function getData(): \stdClass
    {
        return $this->data;
    }

    /**
     * @return Method
     */
    public function getMethod(): Method
    {
        return $this->method;
    }
}