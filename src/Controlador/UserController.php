<?php
namespace App\Controllers;

use App\Models\UserCreate;
use App\Models\UserRead;
use App\Models\UserUpdate;
use App\Models\UserDelete;

class UserController {
    private array $config;

    public function __construct(array $config) {
        $this->config = $config;
    }

    public function handle(): void {
        header('Content-Type: application/json');
        $method = $_SERVER['REQUEST_METHOD'];

        switch ($method) {
            case 'GET':
                $data = isset($_GET['id'])
                    ? (new UserRead($this->config))->getUserById((int) $_GET['id'])
                    : (new UserRead($this->config))->getAllUsers();
                echo json_encode($data);
                break;

            case 'POST':
                $input = json_decode(file_get_contents('php://input'), true) ?: [];
                $id = (new UserCreate($this->config))->create($input);
                echo json_encode(['id' => $id]);
                break;

            case 'PUT':
                $input = json_decode(file_get_contents('php://input'), true) ?: [];
                $updated = (new UserUpdate($this->config))->update((int) $input['id'], $input);
                echo json_encode(['updated' => $updated]);
                break;

            case 'DELETE':
                $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
                $deleted = (new UserDelete($this->config))->delete($id);
                echo json_encode(['deleted' => $deleted]);
                break;

            default:
                http_response_code(405);
                echo json_encode(['error' => 'Método não permitido']);
                break;
        }
    }
}