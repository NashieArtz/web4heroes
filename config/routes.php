<?php

use App\Controllers\{AuthController, HomeController, IncidentController, RegisterController};
use App\Core\Router;

return function (Router $router) {
    $router->get('/', [HomeController::class, 'index']);

    //ADMINCONTROLLER

    // AUTHCONTROLLER
    $router->get('/login', [AuthController::class, 'showLogin']);
    $router->post('/login', [AuthController::class, 'login']);
    $router->post('/logout', [AuthController::class, 'logout']);

    //DASHBOARDCONTROLLER

    //EXCEPTIONSCONTROLLER

    //HEROCONTROLLER


    //INCIDENTCONTROLLER
    $router->get('/incident-list', [IncidentController::class, 'showIncidents']);


    //MOVIECONTROLLER

    //NEWSLETTERCONTROLLER

    //REGISTERCONTROLLER
    $router->get('/register', [RegisterController::class, 'showRegister']);
    $router->post('/register', [RegisterController::class, 'register']);
    $router->get('/forgotten-pwd', [RegisterController::class, 'showForgotPassword']);
    $router->post('/forgot-password', [RegisterController::class, 'forgotPassword']);

    //USERCONTROLLER

    //VILLAINCONTROLLER





};
