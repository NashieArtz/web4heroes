<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return $this->view('home', [
            'title' => 'bienvenue sur Web4heroes',
            'message' => 'ici sauvez des vie'
        ]);
    }
}