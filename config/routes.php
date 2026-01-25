<?php

use App\Controllers\{AdminController,
    AuthController,
    DashboardController,
    ExceptionsController,
    HeroController,
    HomeController,
    IncidentController,
    MovieController,
    RegisterController,
    VillainController
};
use App\Core\Router;

return function (Router $router) {
    $router->get('/', [HomeController::class, 'index']);

    //ADMINCONTROLLER
    $router->get('/admin-user-management', [AdminController::class, 'showUserManagement']);

    // AUTHCONTROLLER
    $router->get('/login', [AuthController::class, 'showLogin']);
    $router->post('/login', [AuthController::class, 'login']);
    $router->post('/logout', [AuthController::class, 'logout']);

    $router->get('/forgotten-pwd', [AuthController::class, 'showForgotPassword']);
    $router->post('/forgot-password', [AuthController::class, 'forgotPassword']);
    $router->get('/reset-password/{token}', [AuthController::class, 'showResetPassword']);
    $router->post('/reset-password', [AuthController::class, 'resetPassword']);

    //DASHBOARDCONTROLLER
    $router->get('/index-dashboard', [DashboardController::class, 'showDashboard']);
    $router->get('/hero-dashboard', [DashboardController::class, 'showHeroDashboard']);
    $router->get('/user-dashboard', [DashboardController::class, 'showUserDashboard']);
    $router->get('/admin-dashboard', [DashboardController::class, 'showAdminDashboard']);

    //EXCEPTIONSCONTROLLER
    $router->get('/error404', [ExceptionsController::class, 'showError']);

    //HEROCONTROLLER
    $router->get('/heroes-list', [HeroController::class, 'showHeroesList']);

    //INCIDENTCONTROLLER
    $router->get('/incident-list', [IncidentController::class, 'showIncidents']);
    $router->get('/incident-detail', [IncidentController::class, 'showIncidentDetail']);
    $router->get('/incident-create', [IncidentController::class, 'showIncidentCreate']);

    //MOVIECONTROLLER
    $router->get('/movies-list', [MovieController::class, 'showMovieList']);

    //NEWSLETTERCONTROLLER

    //REGISTERCONTROLLER
    $router->get('/register', [RegisterController::class, 'showRegister']);
    $router->post('/register', [RegisterController::class, 'register']);

    //USERCONTROLLER

    //VILLAINCONTROLLER
    $router->get('/villains-list', [VillainController::class, 'showVillainList']);


};
