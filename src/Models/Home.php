<?php

namespace App\Models;

use App\Database\Connection;
use PDO;

class Home
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    public function get(): ?array
    {
        $stmt = $this->pdo->query("SELECT * FROM home LIMIT 1");
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            // Giải mã chuỗi JSON sang mảng PHP
            $data['typewriter_words'] = json_decode($data['typewriter_words'], true);
        }

        return $data ?: null;
    }
}
