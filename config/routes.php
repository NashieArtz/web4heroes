<?php

use App\Controllers\{AdminController, AuthController, ExceptionsController, HomeController, IncidentController};
use App\Core\Router;

return function (Router $router) {
    $router->get('/', [HomeController::class, 'index']);

    $router->get('/login', [AuthController::class, 'showLogin']);
    $router->post('/login', [AuthController::class, 'login']);
    $router->post('/logout', [AuthController::class, 'logout']);

    $router->get('/register', [AuthController::class, 'showRegister']);
    $router->post('/register', [AuthController::class, 'register']);

    $router->get('/forgotten-pwd', [AuthController::class, 'showForgotPassword']);
    $router->post('/forgot-password', [AuthController::class, 'forgotPassword']);

    $router->get('/reset-password/{token}', [AuthController::class, 'showResetPassword']);
    $router->post('/reset-password', [AuthController::class, 'resetPassword']);



    $router->get('/home', [AuthController::class, 'showHome']);
    $router->get('/incident-list', [IncidentController::class, 'showIncidentList']);
    $router->get('/incident-declaration', [IncidentController::class, 'showIncidentAdd']);
    $router->get('/incident-detail', [IncidentController::class, 'showIncidentDetail']);


    $router->get('/movie-list', [AuthController::class, 'showMovieList']);
    $router->get('/hero-list', [AuthController::class, 'showHeroList']);
    $router->get('/villain-list', [AuthController::class, 'showVilainList']);

    $router->get('/user-management', [AdminController::class, 'showUserManagement']);
    $router->get('/admin-dashboard', [AdminController::class, 'showAdminDashboard']);

    $router->get('/error', [ExceptionsController::class, 'showError']);

};
