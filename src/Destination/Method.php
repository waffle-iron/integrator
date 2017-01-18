<?php

namespace Simonetti\IntegradorFinanceiro\Destination;


class Method
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $identifier;

    /**
     * @var array
     */
    protected $params;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct(string $description, int $identifier, array $param)
    {
        $this->description = $description;
        $this->identifier = $identifier;
        $this->params = $param;
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