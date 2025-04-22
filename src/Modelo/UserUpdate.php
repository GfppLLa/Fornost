<?php
namespace App\Models;

class UserUpdate extends BaseModel {
    public function update(int $id, array $data): int {
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':name'  => $data['name'],
            ':email' => $data['email'],
            ':id'    => $id,
        ]);
        return $stmt->rowCount();
    }
}