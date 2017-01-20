<?php
namespace Simonetti\IntegradorFinanceiro\Source;

/**
 * Class Request
 * @package Simonetti\IntegradorFinanceiro\Source
 */
class Request
{
    /**
     * Source of Request
     * @var Source
     */
    protected $source;

    /**
     * Request constructor.
     * @param Source $source Source of Request
     */
    public function __construct(Source $source)
    {
        $this->source = $source;
    }

    /**
     * @return Source
     */
    public function getSource(): Source
    {
        return $this->source;
    }
}