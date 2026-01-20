<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;

class AuthController extends Controller
{
    public function showLogin(): Response
    {
        return $this->view('login');
    }

    public function showRegister(): Response
    {
        return $this->view('register');
    }
    public function register(): void
    {
    }

    public function showForgotPassword(): Response
    {
        return $this->view('forgotten-pwd');
    }

    public function resetPassword(): void
    {

    }

    public function showResetPassword(): Response
    {
        return $this->view('new-pwd');
    }

    public function showError(): Response
    {
        return $this->view('error');
    }


    public function showHome(): Response
    {
        return $this->view('home');
    }
    public function showIncidentList(): Response
    {
        return $this->view('incident-list');
    }
    public function showIncidentAdd(): Response
    {
        return $this->view('incident-declaration');
    }
    public function showIncidentDetail(): Response
    {
        return $this->view('incident-detail');
    }
    public function showMovieList(): Response
    {
        return $this->view('movie-list');
    }
    public function showHeroList(): Response
    {
        return $this->view('hero-list');
    }

}
