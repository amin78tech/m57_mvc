<?php

namespace App\Core\Database\MySql;

use App\Core\Database\DatabaseConnectionInterface;

class DatabaseConnection implements DatabaseConnectionInterface {

    private static ?DatabaseConnection $instance = null;
    private \PDO $connectionInstance;

    private function __construct() {
        $serverName = env('DB_HOST');
        $dbName = env('DB_NAME');

        $this->connectionInstance = new \PDO("mysql:host=$serverName;dbname=$dbName", env('DB_USERNAME'), env('DB_PASSWORD'));
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