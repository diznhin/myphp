<?php

namespace App\Core;

class Router
{
protected $routes = [
        '' => ['controller' => 'HomeController', 'method' => 'index'],
        'about' => ['controller' => 'AboutController', 'method' => 'index'],
        'education' => ['controller' => 'EducationController', 'method' => 'index'],
        'services' => ['controller' => 'ServicesController', 'method' => 'index'],
        'projects' => ['controller' => 'ProjectsController', 'method' => 'index'],
        'contact' => ['controller' => 'ContactController', 'method' => 'index'],
    ];
    public function get(string $uri, array $action): void
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, array $action): void
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch($uri)
    {
        $uri = trim(parse_url($uri, PHP_URL_PATH), '/');
        $method = strtoupper($_SERVER['REQUEST_METHOD']);

        if (isset($this->routes[$method][$uri])) {
            $handler = $this->routes[$method][$uri];
            [$class, $function] = $handler;
            (new $class)->$function();
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
