<?php

namespace App\Controllers;

use App\Models\Service;

class ServicesController
{
    public function index()
    {
        $serviceModel = new Service();
        $services = $serviceModel->getAll();

        include __DIR__ . '/../Views/services.php';
    }
}
