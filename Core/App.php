<?php

namespace App\Core;

class App {
    private $router;

    public function __construct() {
        $this->router = new Routes();
    }

    public function run() {
        $callback = $this->router->findRoute(strtolower($_SERVER['REQUEST_METHOD']), $_SERVER['REQUEST_URI']);
        if (is_null($callback)) {
            echo "a beautiful 404 page";
            exit();
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0];
        }
        
        call_user_func($callback);
    }

    public function get(string $path, $callback) {
        $this->router->addRoute('get', $path, $callback);
    }

    public function post(string $path, $callback) {
        $this->router->addRoute('post', $path, $callback);
    }
}