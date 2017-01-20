<?php

namespace Simonetti\IntegradorFinanceiro\Destination;

use Simonetti\IntegradorFinanceiro\Source\Source;
use Simonetti\IntegradorFinanceiro\Source\Request as SourceRequest;

class Request
{
    /**
     * Source Request
     * @var SourceRequest
     */
    protected $sourceRequest;

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