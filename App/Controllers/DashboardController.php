<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\AddressRepository;
use App\Repository\IncidentRepository;
use App\Repository\UserRepository;
use App\Repository\VillainRepository;

class DashboardController extends Controller
{

    private UserRepository $userRepository;
    private AddressRepository $addressRepository;
    private IncidentRepository $incidentRepository;
    private VillainRepository $villainRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository,
                                AddressRepository $addressRepository, Response $response,
                                IncidentRepository $incidentRepository, VillainRepository $villainRepository)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
        $this->response = $response;
        $this->incidentRepository = $incidentRepository;
        $this->villainRepository = $villainRepository;
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
        $userOpenIncidentData = $this->incidentRepository->findUserIncidentByStatus($userID,'open');
        $userResolvedIncidentData = $this->incidentRepository->findUserIncidentByStatus($userID, 'resolved');
        $allRecentIncidents = $this->incidentRepository->findAllRecent();

        $translationPriority = [
            'Low' => 'Basse',
            'Mid' => 'Moyenne',
            'High' => 'Haute',
        ];

        $translationStatus = [
            'Open' => 'En cours',
            'Resolved' => 'Résolu'
        ];

        $translationType = [
            'Attack' => 'Attaque de vilain',
            'Robbery' => 'Braquage / Vol',
            'Disaster' => 'Catastrophe Naturelle',
            'Kidnapping' => 'Enlèvement',
            'Vandalism' => 'Vandalisme',
            'HostageTaking' => 'Prise d\'otages',
            'Invasion' => 'Invasion (Creeper/Zombie)',
            'Medical' => 'Urgence Médicale',
            'Other' => 'Autre'
        ];

        return $this->view('dashboard/user-dashboard', [
            'title' => 'Tableau de bord utilisateur',
            'printIncidentCree' => $printIncidentCree ?? null,
            'userFirstName' => $userProfileData['firstname'],
            'userOpenedIncidents' => $userOpenIncidentData,
            'userResolvedIncidents' => $userResolvedIncidentData,
            'recentIncidents' => $allRecentIncidents,
            'translationPriority' => $translationPriority,
            'translationType' => $translationType,
            'translationStatus' => $translationStatus,
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
