<?php

require '../vendor/autoload.php';

$app = new App\Core\App();

$app->get('/home', [App\Controllers\HomeController::class, 'index']);

// $app->post('path', 'callback');

$app->run();

?>

