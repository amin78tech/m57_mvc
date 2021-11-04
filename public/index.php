<?php

require '../vendor/autoload.php';

use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use Dotenv\Dotenv;
$app = new App\Core\App();

$app->get('/home', [HomeController::class, 'index']);

$app->get('/test', [HomeController::class, 'test']);

$app->get('/login', [AuthController::class, 'showLogin']);

$app->post('/login', [AuthController::class, 'login']);

if (getCookie('user')) {
    $app->get('/dashboard', [AdminController::class, 'showDashboard']);

    $app->post('/logout', [AuthController::class, 'logout']);

    $app->get('/dashboard/admin/create', [AdminController::class, 'create']);

    $app->post('/admin/store', [AdminController::class, 'store']);

    $app->get('/dashboard/admins', [AdminController::class, 'show']);

    $app->get('/dashboard/admin/edit', [AdminController::class, 'edit']);

    $app->post('/admin/update', [AdminController::class, 'update']);

    $app->post('/admin/delete', [AdminController::class, 'destroy']);
} 

setEnvs();
session_start();
$app->run();

?>

