<?php

namespace Simonetti\IntegradorFinanceiro\Source\Destination;

/**
 * Class DataMapping
 * @package Simonetti\IntegradorFinanceiro\Source\Destination
 */
class DataMapping
{
    /**
     * Columns to make the systems meet
     * @var array
     */
    private $columns;

    /**
     * DataMapping constructor.
     * @param array $columns
     */
    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    /**
     * Informed the key the system makes the comparison
     * @param $key
     * @return array
     */
    public function getColumnByKey($key)
    {
        if (!array_key_exists($key, $this->columns)) {
            return null;
        }

        return $this->columns[$key];
    }

}