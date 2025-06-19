<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\ContactController;
use App\Controllers\AboutController;
use App\Controllers\EducationController;
use App\Controllers\ProjectsController;
use App\Controllers\ServicesController;

// Load biến môi trường
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Định nghĩa route
$router = new Router();
$router->get('', [HomeController::class, 'index']);
$router->get('home', [HomeController::class, 'index']);
$router->get('about', [AboutController::class, 'index']);
$router->get('education', [EducationController::class, 'index']);
$router->get('projects', [ProjectsController::class, 'index']);
$router->get('services', [ServicesController::class, 'index']);
$router->get('contact', [ContactController::class, 'index']);
$router->post('contact', [ContactController::class, 'handleForm']);

// Xử lý yêu cầu
$router->dispatch($_SERVER['REQUEST_URI']);
