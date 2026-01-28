<?php

use App\Controllers\{AdminController,
    AuthController,
    DashboardController,
    ExceptionsController,
    HeroController,
    HomeController,
    IncidentController,
    MovieController,
    NewsletterController,
    RegisterController,
    UserController,
    VillainController};
use App\Core\Router;

return function (Router $router) {
    $router->get('/', [HomeController::class, 'index']);

    //ADMINCONTROLLER
    $router->get('/admin-user-management', [AdminController::class, 'showUserManagement']);
    $router->get('/admin-incidents-list', [AdminController::class, 'showIncidents']);
    $router->get('/admin-movies-list', [AdminController::class, 'showMovies']);
    $router->get('/admin-newsletters', [AdminController::class, 'showNewsletters']);
    $router->get('/admin-users-list', [AdminController::class, 'showUsersList']);

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
    $router->get('/hero-reputation', [HeroController::class, 'showHeroReputation']);
    $router->get('/hero-profile', [HeroController::class, 'showHeroProfile']);

    //INCIDENTCONTROLLER
    $router->get('/incident-list', [IncidentController::class, 'showIncidents']);
    $router->get('/incident-detail', [IncidentController::class, 'showIncidentDetail']);

    $router->get('/incident-create', [IncidentController::class, 'showIncidentCreate']);
    $router->post('/incident-create', [IncidentController::class, 'createIncident']);

    //MOVIECONTROLLER
    $router->get('/movies-list', [MovieController::class, 'showMovieList']);
    $router->get('/hero-movies', [MovieController::class, 'showMoviesHero']);

    //NEWSLETTERCONTROLLER
    $router->get('/admin-newsletters', [NewsletterController::class, 'showNewsletters']);

    //REGISTERCONTROLLER
    $router->get('/register', [RegisterController::class, 'showRegister']);
    $router->post('/register', [RegisterController::class, 'register']);
    $router->get('/register-confirmation', [RegisterController::class, 'showRegisterConfirmation']);

    //USERCONTROLLER
    $router->get('/user-profile', [UserController::class, 'showUserProfile']);
    $router->get('/user-profile-edit', [UserController::class, 'showUserProfileEdit']);
    $router->post('/user-profile-edit', [UserController::class, 'editUserProfile']);

    //VILLAINCONTROLLER
    $router->get('/villains-list', [VillainController::class, 'showVillainList']);


};
