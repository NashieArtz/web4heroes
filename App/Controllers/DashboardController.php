<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\AddressRepository;
use App\Repository\UserRepository;

class DashboardController extends Controller
{

    private UserRepository $userRepository;
    private AddressRepository $addressRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository, AddressRepository $addressRepository, Response $response)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
        $this->response = $response;
    }

    public function showDashboard(): Response
    {
        if (isset($_SESSION['user']))
        {
            // Récupère le rôle de l'utilisateur
            $role = $this->userRepository->findRoleById($_SESSION['user']['userID']);
            return $this->response->redirect('/' . $role . '-dashboard');
        }
        return $this->response->redirect('/login');
    }

    public function showUserDashboard(): Response
    {
        $userRole = $_SESSION['user']['role'];
        $userRole = $this->roleCheck($userRole);
        if ($userRole !== 'user') {
            return $this->response->redirect('/');
        }
        $printIncidentCree = null;
        if (isset($_SESSION['incidentCreated']) && $_SESSION['incidentCreated'] === true) {
            $printIncidentCree = 'La création de l\'incident a bien été créé. Une intervention sera créée sous peu';
        }

        $userID = $_SESSION['user']['userID'];
        $userProfileData = $this->userRepository->findById($userID);
        $userAddressData = $this->addressRepository->findByUserId($userID);


        return $this->view('dashboard/user-dashboard', [
            'title' => 'user-dashboard',
            'printIncidentCree' => $printIncidentCree,
            'userFirstName' => $userProfileData['firstname'],
        ]);
    }

    public function showHeroDashboard(): Response
    {
        $userRole = $_SESSION['user']['role'];
        $userRole = $this->roleCheck($userRole);
        if ($userRole !== 'hero') {
            return $this->response->redirect('/');
        }
        return $this->view('dashboard/hero-dashboard');
    }

    public function showAdminDashboard(): Response
    {
        $userRole = $_SESSION['user']['role'];
        $userRole = $this->roleCheck($userRole);
        if ($userRole !== 'admin') {
            return $this->response->redirect('/');
        }
        return $this->view('dashboard/admin-dashboard');
    }

}
