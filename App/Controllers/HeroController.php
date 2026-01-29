<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\HeroRepository;
use App\Repository\UserRepository;

class HeroController extends Controller
{

    private UserRepository $userRepository;
    private HeroRepository $heroRepository;
    private Response $response;

    public function __construct(Request $request, UserRepository $userRepository, HeroRepository $heroRepository, Response $response)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->heroRepository = $heroRepository;
        $this->response = $response;

    }
    public function dashboard(): Response
    {
        // 1. Récupérer l'ID utilisateur depuis la session
        $userId = $_SESSION['user_id'] ?? null;

        if (!$userId) {
            // Rediriger vers login si pas de session (ou gérer erreur)
            return $this->response->redirect('/login');
        }

        // 2. Trouver le profil héros lié à cet utilisateur
        $hero = $this->heroRepository->findByUserId((int)$userId);

        if (!$hero) {
            // Si l'utilisateur est connecté mais n'a pas encore de profil héros créé
            // On pourrait rediriger vers une page de création de profil ou afficher un message
            return $this->view('hero-dashboard', [
                'hero' => ['is_active' => 0], // Profil par défaut vide
                'stats' => ['assigned' => 0, 'success' => 0, 'failed' => 0, 'rating' => 0],
                'intervention' => []
            ]);
        }

        // 3. Récupérer les statistiques et les interventions
        $stats = $this->heroRepository->getStats((int)$hero['id']);
        $interventions = $this->heroRepository->getInterventions((int)$hero['id']);

        // 4. Envoyer les données à la vue
        $data = [
            'hero' => $hero,
            'stats' => $stats,
            'intervention' => $interventions
        ];

        return $this->view('hero-dashboard', $data);
    }



    public function showHeroesList(): Response {
        return $this->view('heroes-list', [
            'title' => 'Liste des Heroes',
        ]);
    }

    public function showHeroProfile(): Response {
        return $this->view('hero-profile', [
            'title' => 'Profile Hero'
        ]);
    }
}
