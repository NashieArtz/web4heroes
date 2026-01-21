<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\AddressRepository;
use App\Repository\UserRepository;

class AuthController extends Controller
{
    private UserRepository $userRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->response = new Response();
    }

    public function showLogin(): Response
    {
        return $this->view('login');
    }

    public function showRegister(): Response
    {
        return $this->view('register');
    }
    public function register(): Response
    {
        if ($this->request->method() === 'POST' && empty($errors)) {

            $data = [
                //'gender'     => trim($_POST['gender'] ?? ''),
                'lastname'   => trim($_POST['lastname'] ?? ''),
                'firstname'  => trim($_POST['firstname'] ?? ''),
                'birthdate'  => $_POST['birthdate'] ?? '',
                'phone'      => trim($_POST['phone'] ?? ''),
                'username'   => trim($_POST['username'] ?? ''),
                'email'      => trim($_POST['email'] ?? ''),
                'pwd'        => $_POST['pwd'] ?? '',
                'pwd_confirm'=> $_POST['pwd_confirm'] ?? '',
            ];
            $success = true;
            //validation

            //if ($data['gender'] === '') {
//                $errors[] = 'La civilité est obligatoire.';
  //          }

            if ($data['lastname'] === '' || $data['firstname'] === '') {
                $errors[] = 'Le nom et le prénom sont obligatoires.';
            }
            if ($data['birthdate'] === '') {
                $errors[] = 'La date de naissance est obligatoire.';
            }

            if ($data['phone'] === '') {
                $errors[] = 'Le numéro de téléphone est obligatoire.';
            }

            if ($data['username'] === '') {
                $errors[] = 'Le nom d’utilisateur est obligatoire.';
            }

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Adresse email invalide.';
            }

            if (strlen($data['pwd']) < 6) {
                $errors[] = 'Le mot de passe doit contenir au moins 6 caractères.';
            }

            if ($data['pwd'] !== $data['pwd_confirm']) {
                $errors[] = 'Les mots de passe ne correspondent pas.';
            }

        }

       $this->userRepository->createUser($data);
        return $this->response->redirect('/');

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

    public function showUserManagement(): Response
    {
        return $this->view('user-management');
    }
    public function showVilainList(): Response
    {
        return $this->view('vilain-list');
    }
    public function showAdminDashboard(): Response
    {
        return $this->view('Admin-dashboard');
    }
}
