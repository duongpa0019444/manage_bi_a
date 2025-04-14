<?php
namespace App;

class Router {
    protected $routes = [];

    public function get($uri, $action) {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action) {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch($requestUri, $requestMethod) {
        // print_r($this->routes);     // In ra danh sách routes đã load
        $requestUri = trim(parse_url($requestUri, PHP_URL_PATH), '/'); //Loại bỏ daassu / ở đầu cuối
        $requestMethod = strtoupper($requestMethod); //Chuyển phương thức về dạng chữ hoa

        // debug($requestUri);
        // var_dump($this->routes[$requestMethod]);

        foreach ($this->routes[$requestMethod] as $route => $action) {
            
            $routePattern = preg_replace('/:\w+/', '(\d+)', trim($route, '/'));
            $routePattern = "#^" . $routePattern . "$#";
            // debug($routePattern);
            if (preg_match($routePattern, $requestUri, $matches)) {
                array_shift($matches);
                
                [$controller, $method] = explode('@', $action);
                $controller = "App\\Controllers\\" . $controller;

                if (!class_exists($controller)) {
                    die("Controller $controller not found!");
                }

                $controllerInstance = new $controller();
                if (!method_exists($controllerInstance, $method)) {
                    die("Method $method not found in $controller!");
                }

                return call_user_func_array([$controllerInstance, $method], $matches);
            }
        }

        die("404 - Route not found");
    }
}
