<?php

namespace App\Core;

class Routes {
    private $routes = [];

    public function addRoute(string $type, string $path, $callback) {
        $this->routes[$type][$path] = $callback;
    }

    public function findRoute(string $method, string $path) {
        return $this->routes[$method][$path];
    }
}