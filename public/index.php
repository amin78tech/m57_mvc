<?php

require '../vendor/autoload.php';

$app = new App\Core\App();

$app->get('/home', [App\Controllers\HomeController::class, 'index']);

$app->get('/test', [App\Controllers\HomeController::class, 'test']);

// $app->post('path', 'callback');

$app->run();

?>

