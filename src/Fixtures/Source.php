<?php
namespace Simonetti\IntegradorFinanceiro\Fixtures;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Simonetti\IntegradorFinanceiro\Connection;
use Simonetti\IntegradorFinanceiro\Source\Destination;
use Simonetti\IntegradorFinanceiro\Source\Source;

/**
 * Class SourceFixture
 * @package Simonetti\IntegradorFinanceiro\Fixtures
 */
class SourceFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * @var array
     */
    private $data = [
        [
            'identifier' => 'pessoa-juridica',
            'sql' => '',
        ],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $data) {
            /**
             * @var $connection Connection
             */
            $connection = $this->getReference('connection');

            /**
             * @var $destination Destination
             */
            $destination = $this->getReference('destination');

            $source = new Source(
                $data['identifier'],
                $connection,
                $data['sql'],
                new ArrayCollection([$destination])
            );

            $manager->persist($source);

            $this->addReference('source', $source);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return 6;
    }
}