<?php

namespace Simonetti\IntegradorFinanceiro\Destination;

/**
 * Class Method
 * @package Simonetti\IntegradorFinanceiro\Destination
 */
class Method
{
    /**
     * Method ID
     * @var int
     */
    protected $id;

    /**
     * Method Description
     * @var string
     */
    protected $description;

    /**
     * Method Identifier
     * @var int
     */
    protected $identifier;

    /**
     * Method Params
     * @var array
     */
    protected $params;

    /**
     * Method constructor.
     * @param string $description
     * @param int $identifier
     * @param array $param
     */
    public function __construct(string $description, int $identifier, array $param)
    {
        $this->description = $description;
        $this->identifier = $identifier;
        $this->params = $param;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getIdentifier(): int
    {
        return $this->identifier;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }
}