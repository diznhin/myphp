<?php

namespace App\Controllers;

use App\Models\Home;

class HomeController
{
    public function index()
    {
        $homeModel = new Home();
        $homeData = $homeModel->get();

        include __DIR__ . '/../Views/home.php';
    }
}
