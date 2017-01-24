<?php

namespace Simonetti\IntegradorFinanceiro\Destination;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

/**
 * Class Method
 * @package Simonetti\IntegradorFinanceiro\Destination
 * @Entity()
 * @Table(name="metodo")
 */
class Method
{
    /**
     * Method ID
     * @Id()
     * @Column(type="integer", name="id")
     * @GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * Method Description
     * @Column(type="string", name="descricao")
     * @var string
     */
    protected $description;

    /**
     * Method Identifier
     * @Column(type="string", name="identificador")
     * @var string
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
     * @param string $identifier
     * @param array $param
     */
    public function __construct(string $description, string $identifier, array $param)
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
     * @return string
     */
    public function getIdentifier(): string
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