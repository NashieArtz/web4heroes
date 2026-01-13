<?php

use App\Controllers\{
    AuthController,
    HomeController,
};
use App\Core\Router;

return function (Router $router) {
    $router->get('/', [HomeController::class, 'index']);

    $router->get('/login', [AuthController::class, 'showLogin']);
    $router->post('/login', [AuthController::class, 'login']);
    $router->post('/logout', [AuthController::class, 'logout']);
};