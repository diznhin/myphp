<?php

namespace App\Models;

use PDO;
use PDOException;

class Project
{
    protected $pdo;

    public function __construct()
    {
        try {
            if (!isset($_ENV['DB_HOST'], $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'])) {
                throw new \Exception("Thiếu biến môi trường DB trong .env");
            }

            $this->pdo = new PDO(
                'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'] . ';port=' . ($_ENV['DB_PORT'] ?? 3306) . ';charset=utf8mb4',
                $_ENV['DB_USERNAME'],
                $_ENV['DB_PASSWORD']
            );

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Lỗi kết nối PDO: " . $e->getMessage());
        } catch (\Exception $e) {
            die("Lỗi môi trường: " . $e->getMessage());
        }
    }

    // Lấy tất cả dự án
    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT id, title, description, image_url, detail_link FROM projects");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tìm dự án theo ID
    public function find(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT id, title, description, image_url, detail_link FROM projects WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $project = $stmt->fetch(PDO::FETCH_ASSOC);
        return $project ?: null;
    }
}
