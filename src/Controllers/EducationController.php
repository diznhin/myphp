<?php

namespace App\Controllers;

use App\Models\Education;

class EducationController
{
    public function index()
    {
        $model = new Education();
        $educations = $model->getAll();
        include __DIR__ . '/../Views/education.php';
    }
}
