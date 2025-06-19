<?php

namespace App\Models;

use App\Database\Connection;
use PDO;

class Contact
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Connection::getInstance();
    }

    public function save($name, $email, $subject, $message)
    {
        $stmt = $this->pdo->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $subject, $message]);
    }
}
