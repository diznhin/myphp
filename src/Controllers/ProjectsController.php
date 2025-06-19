<?php

namespace App\Controllers;

use App\Models\Project;

class ProjectsController
{
    public function index()
    {
        $projectModel = new Project();
        $projects = $projectModel->getAll();

        include __DIR__ . '/../Views/projects.php';
    }

    public function show($id)
    {
        $projectModel = new Project();
        $project = $projectModel->find($id);

        include __DIR__ . '/../Views/project_detail.php';
    }
}
