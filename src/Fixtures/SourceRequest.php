<?php
namespace Simonetti\IntegradorFinanceiro\Fixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Simonetti\IntegradorFinanceiro\Source\Request;
use Simonetti\IntegradorFinanceiro\Source\Source;

class SourceRequestFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * @var array
     */
    private $data = [
        [
            'query_parameter' => '123',
        ],
    ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $data) {
            /**
             * @var $source Source
             */
            $source = $this->getReference('source');

            $source = new Request($source, $data['query_parameter']);

            $manager->persist($source);
        }

        $manager->flush();
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return 7;
    }
}