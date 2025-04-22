<?php
use Dotenv\Dotenv;

// Carrega .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Retorna array de configurações
return [
    'db' => [
        'host' => $_ENV['DB_HOST'],
        'name' => $_ENV['DB_NAME'],
        'user' => $_ENV['DB_USER'],
        'pass' => $_ENV['DB_PASS'],
    ],
    'api_key' => $_ENV['API_KEY'],
];