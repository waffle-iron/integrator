<?php
namespace Simonetti\IntegradorFinanceiro;

use Doctrine\DBAL\Connection AS DBALConnection;
use Doctrine\DBAL\DriverManager;

/**
 * Class ConnectionManager
 * @package Simonetti\IntegradorFinanceiro
 */
class ConnectionManager
{
    /**
     * DBAL Connection
     * @var DBALConnection
     */
    protected static $connection;

    /**
     * @param Connection $connection Connection properties
     * @return DBALConnection
     */
    public function getConnection(Connection $connection)
    {
        if (self::$connection) {
            return self::$connection;
        }

        self::$connection = DriverManager::getConnection([
            'dbname' => $connection->getDbname(),
            'user' => $connection->getUser(),
            'password' => $connection->getPassword(),
            'host' => $connection->getHost(),
            'driver' => $connection->getDriver(),
            'port' => $connection->getPort(),
        ]);

        return self::$connection;
    }
}