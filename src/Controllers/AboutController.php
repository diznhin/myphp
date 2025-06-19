<?php

namespace App\Controllers;

use App\Models\About;

class AboutController
{
    public function index()
    {
        $model = new About();
        $about = $model->getFirst();
        include __DIR__ . '/../Views/about.php';
    }
}
