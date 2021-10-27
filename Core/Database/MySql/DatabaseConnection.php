<?php

namespace App\Core\Database\MySql;

use App\Core\Database\DatabaseConnectionInterface;

class DatabaseConnection implements DatabaseConnectionInterface {

    private static ?DatabaseConnection $instance = null;
    private \PDO $connectionInstance;

    private function __construct() {
        $serverName = '127.0.0.1';
        $dbName = 'mvc';

        $this->connectionInstance = new \PDO("mysql:host=$serverName;dbname=$dbName", 'root', '13801019');
    }

    public static function getInstance() {
        if (is_null(self::$instance))
            self::$instance = new DatabaseConnection;

        return self::$instance;
    }

    public function connection() : \PDO {
        return $this->connectionInstance;
    }
}