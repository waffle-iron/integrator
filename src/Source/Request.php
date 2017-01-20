<?php
namespace Simonetti\IntegradorFinanceiro\Source;

use Doctrine\Common\Collections\ArrayCollection as DestinationsCollection;
use Simonetti\IntegradorFinanceiro\Connection;

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

    /**
     * @return Connection
     */
    public function getConnection(): Connection
    {
        return $this->source->getConnection();
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        return $this->source->getSql();
    }

    /**
     * @return Destination[]|DestinationsCollection
     */
    public function getDestinations(): DestinationsCollection
    {
        return $this->source->getDestinations();
    }
}