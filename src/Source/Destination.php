<?php
namespace Simonetti\IntegradorFinanceiro\Source;

use Simonetti\IntegradorFinanceiro\Destination\Destination as FinalDestination;
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
     * Data mapping
     * @var DataMapping
     */
    protected $dataMapping;

    /**
     * Destination constructor.
     * @param FinalDestination $destination
     * @param DataMapping $dataMapping
     */
    public function __construct(FinalDestination $destination, DataMapping $dataMapping)
    {
        $this->destination = $destination;
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