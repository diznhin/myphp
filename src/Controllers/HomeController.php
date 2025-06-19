<?php

namespace App\Controllers;

use App\Models\Home;

class HomeController
{
    public function index()
    {
        $model = new Home();
        $homeData = $model->get(); 
        include __DIR__ . '/../Views/home.php'; 
    }
}
