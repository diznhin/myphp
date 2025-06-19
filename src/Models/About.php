<?php

namespace App\Models;

use App\Database\Connection;

class About
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    public function getFirst(): ?array
    {
        $stmt = $this->pdo->query("SELECT * FROM about LIMIT 1");
        $result = $stmt->fetch();
        return $result ?: null;
    }
}
