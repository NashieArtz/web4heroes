<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\CityRepository;
use App\Repository\CountryRepository;
use App\Repository\UserRepository;

class RegisterController extends Controller
{

    private UserRepository $userRepository;
    private Response $response;
    private CityRepository $cityRepository;
    private CountryRepository $countryRepository;

    public function __construct(Request        $request, UserRepository $userRepository, Response $response,
                                CityRepository $cityRepository, CountryRepository $countryRepository)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->response = $response;
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;

    }

    public function showRegister(): Response
    {
        if(isset($_SESSION['user'])){
            return $this->redirect('/');
        }
        $cities = $this->cityRepository->findAllNames();
        $countries = $this->countryRepository->findAllNames();
        return $this->view('register',
            [
                'title' => 'Inscription',
                'cities' => $cities,
                'countries' => $countries,
            ]);
    }

    public function showRegisterConfirmation(): Response
    {
        return $this->view('register-confirmation',
            ['title' => 'Confirmation d\'inscription']);
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
                'lastname' => htmlspecialchars(trim($_POST['lastname'] ?? ''), ENT_QUOTES),
                'firstname' => htmlspecialchars(trim($_POST['firstname'] ?? ''), ENT_QUOTES),
                'birthdate' => $_POST['birthdate'] ?? '',
                'phone' => htmlspecialchars(trim($_POST['phone'] ?? ''), ENT_QUOTES),
                'email' => htmlspecialchars(trim($_POST['email'] ?? ''), ENT_QUOTES),
                'pwd' => htmlspecialchars($_POST['pwd'] ?? '', ENT_QUOTES),
                'pwd_confirm' => htmlspecialchars($_POST['pwd_confirm'] ?? '', ENT_QUOTES),
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
//                if ($is_hero_request == 1) {
//
//                }

                $this->userRepository->createUser($data);

                return $this->response->redirect('/register-confirmation');
            }
        }

        return $this->view('register', [
            'errors' => $errors,]);
        //</editor-fold>
    }
}
