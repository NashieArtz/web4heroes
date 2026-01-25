<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\UserRepository;

class MovieController extends Controller
{

    private UserRepository $userRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->response = new Response();

    }

    public function showMovieList(): Response {
        return $this->view('movies-list', [
            'title' => 'Liste des Films',
        ]);
    }


}
