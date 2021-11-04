<?php

require '../vendor/autoload.php';

use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Core\Cookie;

$app = new App\Core\App();

$app->get('/home', [HomeController::class, 'index']);

$app->get('/test', [HomeController::class, 'test']);

$app->get('/login', [AuthController::class, 'showLogin']);

$app->post('/login', [AuthController::class, 'login']);

if (Cookie::get('user')) {
    $app->get('/dashboard', [AdminController::class, 'showDashboard']);

    $app->post('/logout', [AuthController::class, 'logout']);
} 

// $app->post('path', 'callback');

$app->run();

?>

