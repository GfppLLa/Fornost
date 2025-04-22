<?php
namespace App\Models;

class UserCreate extends BaseModel {
    public function create(array $data): int {
        $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':name'  => $data['name'],
            ':email' => $data['email'],
        ]);
        return (int)$this->db->lastInsertId();
    }
}