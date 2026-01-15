<?php

use App\Controllers\{AuthController, HomeController, IncidentController};
use App\Core\Router;

return function (Router $router) {
    $router->get('/', [HomeController::class, 'index']);
    $router->get('/test', [IncidentController::class, 'index']);

    $router->get('/login', [AuthController::class, 'showLogin']);
    $router->post('/login', [AuthController::class, 'login']);
    $router->post('/logout', [AuthController::class, 'logout']);

    $router->get('/incident-list', [IncidentController::class, 'showIncidents']);
};
