<?php
namespace App\Core;

class Controller
{
    protected function view($viewName, $data = [])
    {
        extract($data);
        require_once __DIR__ . "/../Views/" . $viewName . ".php";
    }
}
