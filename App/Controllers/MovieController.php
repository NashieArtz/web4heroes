<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\HeroRepository;
use App\Repository\UserRepository;

class MovieController extends Controller
{

    private UserRepository $userRepository;
    private HeroRepository $heroRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository, HeroRepository $heroRepository,
    Response $response)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->heroRepository = $heroRepository;
        $this->response = $response;

    }

    public function showMovieList(): Response {
        return $this->view('movies-list', [
            'title' => 'Liste des Films',
        ]);
    }

    public function checkHeroID(): Response {
        $userID = $_GET['user']['id'];
        $hero = $this->heroRepository->findByID($userID);
        $heroID =
        $this->showMoviesHero($heroID);
    }

    public function showMoviesHero(): Response {
        return $this->view('hero/hero-movies', [
            'title' => 'Mes Films',
        ]);
    }


}
