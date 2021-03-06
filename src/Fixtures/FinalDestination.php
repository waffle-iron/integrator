<?php
namespace Simonetti\IntegradorFinanceiro\Fixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Simonetti\IntegradorFinanceiro\Destination\Destination;

/**
 * Class FinalDestinationFixture
 * @package Simonetti\IntegradorFinanceiro\Fixtures
 */
class FinalDestinationFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * @var array
     */
    private $data = [
        [
            'identifier' => 'Rovereti',
            'name' => 'Rovereti ERP',
            'bridge' => 'rovereti',
        ],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $data) {
            $destination = new Destination($data['identifier'], $data['name'], $data['bridge']);

            $manager->persist($destination);

            $this->addReference('finalDestination', $destination);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return 3;
    }
}