<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\AddressRepository;
use App\Repository\HeroRepository;
use App\Repository\UserRepository;

class AuthController extends Controller
{
    private UserRepository $userRepository;
    private HeroRepository $heroRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository, HeroRepository $heroRepository, Response $response)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->heroRepository = $heroRepository;
        $this->response = $response;
    }

    //<editor-fold desc="SHOW">
    public function showLogin(): Response
    {
        return $this->view('login',[
            'title' => 'Connexion'
        ]);


    }

    public function showForgotPassword(): Response
    {
        return $this->view('forgot-password');
    }

    public function showResetPassword(): Response
    {
        return $this->view('new-pwd');
    }
    //</editor-fold>


    //<editor-fold desc="LOGIN">
    public function login(): Response
    {
        $error = null;

        if ($this->request->method() === 'POST') {
            $identifier = trim($_POST['user-email'] ?? '');
            $password = $_POST['pwd'] ?? '';

            if (empty($identifier) || empty($password)) {
                $error = 'Tous les champs sont obligatoires.';
            } else {
                $user = $this->userRepository->findByUsernameOrEmail($identifier);
                if ($user && password_verify($password, $user['pwd'])) {
                    $_SESSION['user'] = [
                        'userID' => $user['id'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'role' => $user['role']
                    ];

                    if ($user['role'] === 'hero') {
                        $heroID = $this->heroRepository->findHeroID($user['id']);
                        $_SESSION['user'] += [
                            'heroID' => $heroID,
                        ];
                    }

                    // Redirection selon le rôle
                    return match ($user['role']) {
                        'admin' => $this->response->redirect('/admin-dashboard'),
                        'hero' => $this->response->redirect('/hero-dashboard'),
                        default => $this->response->redirect('/user-dashboard'),
                    };
                } else {
                    $error = 'Identifiant ou mot de passe incorrect.';
                }
            }
        }

        return $this->view('login', [
            'title' => 'Connexion',
            'error' => $error]);
    }

    //</editor-fold>


    public function logout(): Response
    {
        $_SESSION = [];

        session_destroy();

        header("Location: http://web4heroes.dvl.to/");
        exit();
    }


    public function forgotPassword(): Response
    {
        $title = "Créa-code - Mot de passe oublié ?";
        $desc = "Réinitialisez votre mot de passe en saisissant votre adresse email.";

        return $this->view('forgot-password', compact('title', 'desc'));
    }

}
