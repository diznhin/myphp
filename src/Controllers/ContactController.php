<?php
namespace App\Controllers;

use App\Models\Contact;
use App\Database\Connection;

class ContactController
{
    public function index()
    {
        include __DIR__ . '/../Views/contact.php';
    }

public function handleForm()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $data = [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'subject' => $_POST['subject'] ?? '',
            'message' => $_POST['message'] ?? ''
        ];

        $sql = "INSERT INTO contacts (name, email, subject, message)
                VALUES (:name, :email, :subject, :message)";

        $rowCount = \App\Database\Connection::execute($sql, $data);

        if ($rowCount > 0) {
            $_SESSION['success'] = "Gửi liên hệ thành công!";
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra khi gửi liên hệ.";
        }

        // Quay về lại trang contact
        header("Location: /contact");
        exit;
    }
}
}
