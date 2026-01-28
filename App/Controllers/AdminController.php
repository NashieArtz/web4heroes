<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\UserRepository;

class AdminController extends Controller
{

    private UserRepository $userRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository, Response $response)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->response = $response;
        if ($_SESSION['user']['role'] !== 'admin') {
            $this->redirect('/');
        }

    }


}
