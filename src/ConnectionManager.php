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
     * List of DBAL Connections
     * @var DBALConnection[]
     */
    protected static $connections;

    /**
     * @param Connection $connection Connection properties
     * @return DBALConnection
     */
    public function getConnection(Connection $connection): DBALConnection
    {
        if (isset(self::$connections[$connection->getDriver()])) {
            return self::$connections[$connection->getDriver()];
        }

        self::$connections[$connection->getDriver()] = DriverManager::getConnection([
            'dbname' => $connection->getDbname(),
            'user' => $connection->getUser(),
            'password' => $connection->getPassword(),
            'host' => $connection->getHost(),
            'driver' => $connection->getDriver(),
            'port' => $connection->getPort(),
        ]);

        return self::$connections[$connection->getDriver()];
    }
}