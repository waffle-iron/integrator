<?php

namespace Simonetti\IntegradorFinanceiro\Tests\Source;

use Doctrine\Common\Collections\ArrayCollection;
use Simonetti\IntegradorFinanceiro\Connection;
use Simonetti\IntegradorFinanceiro\Destination\Destination;
use Simonetti\IntegradorFinanceiro\Source\Source;

class SourceTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructor()
    {
        $dbname = 'mydb';
        $user = 'user';
        $password = 'pass';
        $host = 'localhost';
        $port = 8080;
        $driver = 'pdo_mysql';

        $connection = new Connection($dbname, $user, $password, $host, $port, $driver);

        $identifier = '122345421';
        $sql = 'SELECT* FROM user WHERE 1 = 1';

        $mockDestination1 = $this->getMockBuilder(Destination::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockDestination2 = $this->getMockBuilder(Destination::class)
            ->disableOriginalConstructor()
            ->getMock();

        $destinations = [
            $mockDestination1,
            $mockDestination2
        ];

        $source = new Source($identifier, $connection, $sql, new ArrayCollection($destinations));

        $this->assertInstanceOf(Source::class, $source);
        $this->assertEquals($identifier, $source->getIdentifier());
        $this->assertEquals($connection, $source->getConnection());
        $this->assertEquals($sql, $source->getSql());
        $this->assertContainsOnlyInstancesOf(Destination::class, $source->getDestinations());
    }
}
