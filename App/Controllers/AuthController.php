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

    //<editor-fold desc="SHOW">
    public function showLogin(): Response
    {
        return $this->view('login');
    }
    public function showForgotPassword(): Response
    {
        return $this->view('forgotten-pwd');
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
    //</editor-fold>


}
