<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\UserRepository;

class DashboardController extends Controller
{

    private UserRepository $userRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->response = new Response();

    }

    public function showDashboard(): Response
    {
        if (!isset($_SESSION['user_id'])) {
            return $this->response->redirect('/login');
        }

        // Récupère le rôle de l'utilisateur
        $role = $this->userRepository->findRoleById($_SESSION['user_id']);

        return match ($role) {
            'admin' => $this->response->redirect('/admin-dashboard'),
            'hero' => $this->response->redirect('/hero-dashboard'),
            default => $this->response->redirect('/user-dashboard'),
        };
    }

    public function showUserDashboard(): Response
    {
        return $this->view('dashboard/user-dashboard');
    }

    public function showHeroDashboard(): Response
    {
        return $this->view('dashboard/hero-dashboard');
    }

    public function showAdminDashboard(): Response
    {
        if ($this->request->method() == 'POST') {
            $data = [];
        }
        return $this->view('dashboard/admin-dashboard');
    }

}
