<?php

require '../vendor/autoload.php';

use App\Controllers\AdminController;
use App\Controllers\ClinicController;
use App\Controllers\SectionController;
use App\Controllers\AuthController;
use App\Controllers\HomeController;

$app = new App\Core\App();

$app->get('/home', [HomeController::class, 'index']);

$app->get('/test', [HomeController::class, 'test']);

$app->get('/login', [AuthController::class, 'showLogin']);

$app->post('/login', [AuthController::class, 'login']);

if (getCookie('user')) {
    $app->get('/dashboard', [AdminController::class, 'showDashboard']);

    $app->post('/logout', [AuthController::class, 'logout']);

    // CRUD functions for admins

    $app->get('/dashboard/admin/create', [AdminController::class, 'create']);

    $app->post('/admin/store', [AdminController::class, 'store']);

    $app->get('/dashboard/admins', [AdminController::class, 'show']);

    $app->get('/dashboard/admin/edit', [AdminController::class, 'edit']);

    $app->post('/admin/update', [AdminController::class, 'update']);

    $app->post('/admin/delete', [AdminController::class, 'destroy']);

    // CRUD functions for clinics

    $app->get('/dashboard/clinic/create', [ClinicController::class, 'create']);

    $app->post('/clinic/store', [ClinicController::class, 'store']);

    $app->get('/dashboard/clinics', [ClinicController::class, 'show']);

    $app->get('/dashboard/clinic/edit', [ClinicController::class, 'edit']);

    $app->post('/clinic/update', [ClinicController::class, 'update']);

    $app->post('/clinic/delete', [ClinicController::class, 'destroy']);

    // CRUD funtions for sections

    $app->get('/dashboard/section/create', [SectionController::class, 'create']);

    $app->post('/section/store', [SectionController::class, 'store']);

    $app->get('/dashboard/sections', [SectionController::class, 'show']);

    $app->get('/dashboard/section/edit', [SectionController::class, 'edit']);

    $app->post('/section/update', [SectionController::class, 'update']);

    $app->post('/section/delete', [SectionController::class, 'destroy']);

} 

setEnvs();
session_start();
$app->run();

?>

