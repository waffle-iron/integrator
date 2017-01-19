<?php

namespace Simonetti\IntegradorFinanceiro\Destination;

use Simonetti\IntegradorFinanceiro\Source\Source;

class Request
{
    /**
     * Source Request
     * @var Source
     */
    protected $source;

    /**
     * Source Data
     * @var \stdClass
     */
    protected $data;

    /**
     * Source Method
     * @var Method
     */
    protected $method;

    /**
     * Source Method Identifier
     * @var string
     */
    protected $methodIdentifier;

    /**
     * Request constructor.
     * @param Source $source
     * @param \stdClass $data
     * @param Method $method
     * @param string $methodIdentifier
     */
    public function __construct(Source $source, \stdClass $data, Method $method, string $methodIdentifier)
    {
        $this->source = $source;
        $this->data = $data;
        $this->method = $method;
        $this->methodIdentifier = $methodIdentifier;
    }

    /**
     * @return Source
     */
    public function getSource(): Source
    {
        return $this->source;
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

    /**
     * @return string
     */
    public function getMethodIdentifier(): string
    {
        return $this->methodIdentifier;
    }
}