<?php

require '../vendor/autoload.php';

use App\Controllers\AuthController;

$app = new App\Core\App();

$app->get('/home', [App\Controllers\HomeController::class, 'index']);

$app->get('/test', [App\Controllers\HomeController::class, 'test']);

$app->get('/register', [AuthController::class, 'showRegister']);

$app->post('/register', [AuthController::class, 'register']);

$app->get('/login', [AuthController::class, 'showLogin']);

$app->post('/login', [AuthController::class, 'login']);

// $app->post('path', 'callback');

$app->run();

?>

