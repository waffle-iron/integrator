<?php
namespace Simonetti\IntegradorFinanceiro\Source;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Embedded;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;
use Simonetti\IntegradorFinanceiro\Destination\Destination as FinalDestination;
use Simonetti\IntegradorFinanceiro\Destination\Method;
use Simonetti\IntegradorFinanceiro\Source\Destination\DataMapping;

/**
 * Class Destination
 * @package Simonetti\IntegradorFinanceiro\Source
 * @Entity()
 * @Table(name="destination")
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
     * Final destination
     * @OneToOne(targetEntity="Simonetti\IntegradorFinanceiro\Destination\Destination")
     * @JoinColumn(name="final_destination_id", referencedColumnName="id")
     * @var FinalDestination
     */
    protected $finalDestination;

    /**
     * Destination method
     * @OneToOne(targetEntity="Simonetti\IntegradorFinanceiro\Destination\Method")
     * @JoinColumn(name="method_id", referencedColumnName="id")
     * @var Method
     */
    protected $method;

    /**
     * Data mapping
     * @Embedded(class="DataMapping", columnPrefix=false)
     * @var DataMapping
     */
    protected $dataMapping;

    /**
     * Destination constructor.
     * @param FinalDestination $finalDestination
     * @param Method $method
     * @param DataMapping $dataMapping
     */
    public function __construct(FinalDestination $finalDestination, Method $method, DataMapping $dataMapping)
    {
        $this->finalDestination = $finalDestination;
        $this->method = $method;
        $this->dataMapping = $dataMapping;
    }

    /**
     * @return FinalDestination
     */
    public function getFinalDestination(): FinalDestination
    {
        return $this->finalDestination;
    }

    /**
     * @return Method
     */
    public function getMethod(): Method
    {
        return $this->method;
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