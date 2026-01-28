<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\UserRepository;

class UserController extends Controller
{

    private UserRepository $userRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository, Response $response)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->response = $response;
    }

    public function showUserProfile(): Response
    {
        $userRole = $_SESSION['user']['role'];
        $userRole = $this->roleCheck($userRole);
        if ($userRole !== 'user') {
            return $this->response->redirect('/');
        }
        $userID = $_SESSION['user']['userID'];
        $userInfo = $this->userRepository->findByID($userID);
        return $this->view('/user-profile', [
            'title' => 'Mon profil',
                'userInfo' => $userInfo
            ]
        );
    }

    public function showUserProfileEdit(): Response
    {
        $userRole = $_SESSION['user']['role'];
        $userRole = $this->roleCheck($userRole);
        if ($userRole !== 'user') {
            return $this->response->redirect('/');
        }
        $userID = $_SESSION['user']['userID'];
        $userInfo = $this->userRepository->findByID($userID);
        return $this->view('/user-profile-edit', [
            'title' => 'Édition de mon profil',
            'userInfo' => $userInfo
        ]);
    }

    public function editUserProfile(array $data)  {


    }

}
