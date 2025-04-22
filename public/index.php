<?php
// 1) Carrega Autoload do Composer e configurações
require_once __DIR__ . '/../vendor/autoload.php';
$config = require_once __DIR__ . '/../config/config.php';

// 2) Validação de API Key
auth:
$expectedKey = $_ENV['API_KEY'] ?? '';
$clientKey = '';
if (isset($_SERVER['HTTP_X_API_KEY'])) {
    $clientKey = trim($_SERVER['HTTP_X_API_KEY']);
} elseif (isset($_GET['api_key'])) {
    $clientKey = trim($_GET['api_key']);
}

if (empty($clientKey) || $clientKey !== $expectedKey) {
    header('HTTP/1.1 401 Unauthorized');
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Unauthorized: API key inválida ou ausente']);
    exit;
}

// 3) Roteamento de requisições
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
switch ($uri) {
    case '/users':
        require_once __DIR__ . '/../src/Controllers/UserController.php';
        (new App\Controllers\UserController($config))->handle();
        break;

    default:
        header('HTTP/1.1 404 Not Found');
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Rota não encontrada']);
        break;
}