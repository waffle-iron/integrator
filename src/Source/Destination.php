<?php
namespace Simonetti\IntegradorFinanceiro\Source;

use Simonetti\IntegradorFinanceiro\Destination\Destination as FinalDestination;
use Simonetti\IntegradorFinanceiro\Destination\Method;
use Simonetti\IntegradorFinanceiro\Source\Destination\DataMapping;

/**
 * Class Destination
 * @package Simonetti\IntegradorFinanceiro\Source
 */
class Destination
{
    /**
     * Final destination
     * @var FinalDestination
     */
    protected $destination;

    /**
     * Destination method
     * @var Method
     */
    protected $method;

    /**
     * Data mapping
     * @var DataMapping
     */
    protected $dataMapping;

    /**
     * Destination constructor.
     * @param FinalDestination $destination
     * @param Method $method
     * @param DataMapping $dataMapping
     */
    public function __construct(FinalDestination $destination, Method $method, DataMapping $dataMapping)
    {
        $this->destination = $destination;
        $this->method = $method;
        $this->dataMapping = $dataMapping;
    }

    /**
     * @return FinalDestination
     */
    public function getDestination(): FinalDestination
    {
        return $this->destination;
    }

    /**
     * @return Method
     */
    public function getMethod(): Method
    {
        return $this->method;
    }

    /**
     * @return DataMapping
     */
    public function getDataMapping(): DataMapping
    {
        return $this->dataMapping;
    }

    /**
     * @param string $key Key to use in data mapping
     * @return string
     */
    public function getColumnByKey(string $key)
    {
        return $this->dataMapping->getColumnByKey($key);
    }
}