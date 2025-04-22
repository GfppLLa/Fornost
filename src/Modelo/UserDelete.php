<?php
namespace App\Models;

class UserDelete extends BaseModel {
    public function delete(int $id): int {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount();
    }
}