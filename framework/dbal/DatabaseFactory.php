<?php

namespace RLC\Framework\dbal;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;


class DatabaseFactory
{
    public Connection $connection;
    public function __construct()
    {
        $connectionParams = [
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'host' => $_ENV['DB_HOST'],
            'driver' => $_ENV['DB_DRIVER'],
        ];
        $conn = DriverManager::getConnection($connectionParams);
        $this->connection = $conn;
    }

    public function getConnection(){
        return $this->connection;
    }
}
