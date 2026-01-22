<?php
declare(strict_types=1);


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
}
