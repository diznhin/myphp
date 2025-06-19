<?php

namespace App\Models;

use App\Database\Connection;
use PDO;
use PDOException;

class Education
{
    protected PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = Connection::getInstance();
        } catch (PDOException $e) {
            die("Database connection error: " . $e->getMessage());
        }
    }

    public function getAll(): array
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM education");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Ghi log nếu cần
            return [];
        }
    }
}
