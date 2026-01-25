<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\UserRepository;

class RegisterController extends Controller
{

    private UserRepository $userRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->response = new Response();

    }

    public function showRegister(): Response
    {
        return $this->view('register');
    }
    public function showForgotPassword(): Response
    {
        return $this->view('forgotten-pwd');
    }
    public function showResetPassword(): Response
    {
        return $this->view('new-pwd');
    }


    /**
     * public function register(): Response
     * {
     * if ($this->request->method() === 'POST' && empty($errors)) {
     *
     * $data = $this->request->input();
     * $data = [
     * 'username' => htmlspecialchars(trim($data['username'])),
     * 'pwd' => password_hash($data['pwd'], PASSWORD_DEFAULT),
     * 'email' => htmlspecialchars(trim($data['email'])),
     * 'firstname' => htmlspecialchars(trim($data['firstname'])),
     * 'lastname' => htmlspecialchars(trim($data['lastname'])),
     * 'phone' => htmlspecialchars(trim($data['phone'])),
     * ];
     * $success = true;
     */

    public function register(): Response
    {
        $errors = [];

        if ($this->request->method() === 'POST') {

            $data = $this->request->input();
            $data = [
                'lastname' => trim($_POST['lastname'] ?? ''),
                'firstname' => trim($_POST['firstname'] ?? ''),
                'birthdate' => $_POST['birthdate'] ?? '',
                'phone' => trim($_POST['phone'] ?? ''),
                'username' => trim($_POST['username'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'pwd' => $_POST['pwd'] ?? '',
                'pwd_confirm' => $_POST['pwd_confirm'] ?? '',
            ];
            $success = true;
            //validation

            //<editor-fold desc="Javascript">
            //if ($data['gender'] === '') {
            //$errors[] = 'La civilité est obligatoire.';
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

            // On hach le mot de passe si y'a pas d'erreur
            if (empty($errors)) {
                $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);

                $this->userRepository->createUser($data);

                return $this->response->redirect('/');
            }
        }

        return $this->view('register', ['errors' => $errors]);
        //</editor-fold>
        $this->userRepository->createUser($data);
        return $this->response->redirect('/');
    }
}
