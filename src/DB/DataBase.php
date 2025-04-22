<?php
namespace App\Database;

use PDO;

class Database {
    private static $instance = null;
    private $connection;

    private function __construct(array $cfg) {
        $dsn = "mysql:host={$cfg['host']};dbname={$cfg['name']};charset=utf8";
        $this->connection = new PDO(
            $dsn,
            $cfg['user'],
            $cfg['pass'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    public static function getInstance(array $cfg) {
        if (self::$instance === null) {
            self::$instance = new self($cfg);
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
}