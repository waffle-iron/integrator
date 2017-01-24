<?php

namespace Simonetti\IntegradorFinanceiro\Source\Destination;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embeddable;

/**
 * Class DataMapping
 * @package Simonetti\IntegradorFinanceiro\Source\Destination
 * @Embeddable()
 */
class DataMapping
{
    /**
     * Columns to make the systems meet
     * @Column(type="array", name="parametros")
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
     * @return string
     */
    public function getColumnByKey($key)
    {
        if (!array_key_exists($key, $this->columns)) {
            return null;
        }

        return $this->columns[$key];
    }

}