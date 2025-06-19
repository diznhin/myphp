<?php

namespace App\Database;

use PDO;
use PDOException;
use Exception;

class Connection
{
    private static ?PDO $instance = null;

    private function __construct() {}

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $dsn = sprintf(
                "mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4",
                $_ENV["DB_HOST"] ?? 'localhost',
                $_ENV["DB_PORT"] ?? '3306',
                $_ENV["DB_DATABASE"] ?? 'test'
            );
            try {
                self::$instance = new PDO(
                    $dsn,
                    $_ENV["DB_USERNAME"] ?? 'root',
                    $_ENV["DB_PASSWORD"] ?? '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            } catch (PDOException $e) {
                // Hiện lỗi rõ ràng hơn
                die("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$instance;
    }

    public static function close(): void
    {
        self::$instance = null;
    }

    public static function test(): bool
    {
        try {
            $pdo = self::getInstance();
            return $pdo->query("SELECT 1") !== false;
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function query(string $sql, array $params = []): array
    {
        try {
            $pdo = self::getInstance();
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Query error: " . $e->getMessage());
        }
    }

    public static function execute(string $sql, array $params = []): int
    {
        try {
            $pdo = self::getInstance();
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            die("Execution error: " . $e->getMessage());
        }
    }
}
