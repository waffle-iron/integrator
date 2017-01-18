<?php
namespace Simonetti\IntegradorFinanceiro\Tests;

use Doctrine\DBAL\Connection AS DBALConnection;
use Simonetti\IntegradorFinanceiro\Connection;
use Simonetti\IntegradorFinanceiro\ConnectionManager;

/**
 * Class ConnectionManagerTest
 * @package Simonetti\IntegradorFinanceiro\Tests
 */
class ConnectionManagerTest extends \PHPUnit_Framework_TestCase
{
    protected function getConnection()
    {
        $dbname = 'mydb';
        $user = 'user';
        $password = 'pass';
        $host = 'localhost';
        $port = 8080;
        $driver = 'pdo_mysql';

        return new Connection($dbname, $user, $password, $host, $port, $driver);
    }

    public function testGetConnectionMustReturnCorrectInstance()
    {
        $baseConnection = $this->getConnection();

        $connectionManager = new ConnectionManager();
        $connection = $connectionManager->getConnection($baseConnection);

        $this->assertInstanceOf(DBALConnection::class, $connection);
    }
}
