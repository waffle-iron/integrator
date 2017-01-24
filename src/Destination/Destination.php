<?php

namespace Simonetti\IntegradorFinanceiro\Destination;

use Doctrine\Common\Collections\Collection as MethodsCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;


/**
 * Class Destination
 * @package Simonetti\IntegradorFinanceiro\Destination
 * @Entity()
 * @Table(name="destino_final")
 */
class Destination
{
    /**
     * Destination ID
     * @Id()
     * @Column(type="integer", name="id")
     * @GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * Destination Identifier
     * @Column(type="string", name="identificador")
     * @var string
     */
    protected $identifier;

    /**
     * Destination Name
     * @Column(type="string", name="nome")
     * @var string
     */
    protected $name;

    /**
     * Destination Bridge
     * @Column(type="string", name="bridge")
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