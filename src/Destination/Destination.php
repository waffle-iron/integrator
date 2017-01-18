<?php

namespace Simonetti\IntegradorFinanceiro\Destination;

use Doctrine\Common\Collections\Collection as MethodsCollection;


/**
 * Class Destination
 * @package Simonetti\IntegradorFinanceiro\Destination
 */
class Destination
{
    /**
     * Destination ID
     * @var int
     */
    protected $id;

    /**
     * Destination Identifier
     * @var string
     */
    protected $identifier;

    /**
     * Destination Name
     * @var string
     */
    protected $name;

    /**
     * Destination Bridge
     * @var string
     */
    protected $bridge;

    /**
     * Destination methods
     * @var MethodsCollection
     */
    protected $methods;

    /**
     * Destination constructor.
     * @param string $identifier
     * @param string $name
     * @param string $bridge
     */
    public function __construct(string $identifier, string $name, string $bridge)
    {
        $this->identifier = $identifier;
        $this->name = $name;
        $this->bridge = $bridge;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getBridge(): string
    {
        return $this->bridge;
    }

    /**
     * @return MethodsCollection
     */
    public function getMethods(): MethodsCollection
    {
        return $this->methods;
    }
}