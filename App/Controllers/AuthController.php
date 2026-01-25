<?php
declare(strict_types=1);

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


    public function login(): Response
    {
        $error = null;

        if ($this->request->method() === 'POST') {
            $identifier = trim($_POST['pseudo'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($identifier) || empty($password)) {
                $error = 'Tous les champs sont obligatoires.';
            } else {
                $user = $this->userRepository->findByUsernameOrEmail($identifier);

                if ($user && password_verify($password, $user['pwd'])) {

                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['firstname'] = $user['firstname'];
                    $_SESSION['role'] = $user['role'];

                    // Redirection selon le rôle


                    var_dump($_SESSION);

                    switch ($user['role']) {
                        case 'admin':
                            return $this->response->redirect('/admin-dashboard');
                        case 'hero':
                            return $this->response->redirect('/hero-dashboard');
                        default:
                            return $this->response->redirect('/user-dashboard');
                    }
                } else {
                    $error = 'Identifiant ou mot de passe incorrect.';
                }
            }
        }

        return $this->view('login', ['error' => $error]);
    }


    public function showDashboard(): Response
    {
        if (!isset($_SESSION['user_id'])) {
            return $this->response->redirect('/login');
        }

        // Récupère le rôle de l'utilisateur
        $role = $this->userRepository->findRoleById($_SESSION['user_id']);

        switch ($role) {
            case 'admin':
                return $this->response->redirect('/admin-dashboard');
            case 'hero':
                return $this->response->redirect('/hero-dashboard');
            default:
                return $this->response->redirect('/user-dashboard');
        }
    }
}
