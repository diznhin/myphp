<?php

namespace App\Core;

use PDO;

class Database
{
    private PDO $pdo;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'myapp'; // sửa tên database cho đúng
        $username = 'appuser'; // tên user CSDL
        $password = 'password'; // mật khẩu của user CSDL
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $this->pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function insertContact(array $data): bool
    {
        $sql = "INSERT INTO contacts (name, email, subject, message)
                VALUES (:name, :email, :subject, :message)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }
}
