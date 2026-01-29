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

    public function showAdminUsersList(): Response
    {
        return $this->view('admin/admin-users-list', [
            'title' => 'Gestion des Utilisateurs',
        ]);
    }


    public function showAdminIncidents(): Response
    {
        return $this->view('admin/admin-incidents-list', [
            'title' => 'Gestion des Incidents',
        ]);
    }

    public function showAdminMovies(): Response
    {
        return $this->view('admin/admin-movies-list', [
            'title' => 'Gestion des Films',
        ]);
    }

    public function showAdminNewsletters(): Response
    {
        return $this->view('admin/admin-newsletters', [
            'title' => 'Administration Newsletter'
        ]);
    }

}
