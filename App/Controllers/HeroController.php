<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\UserRepository;

class HeroController extends Controller
{

    private UserRepository $userRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->response = new Response();

    }


    public function showHeroesList(): Response {
        return $this->view('heroes-list', [
            'title' => 'Liste des Heroes',
        ]);
    }

    public function showHeroProfile(): Response {
        return $this->view('hero-profile', [
            'title' => '<i<i'
        ]);
    }



}
