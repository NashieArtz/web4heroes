<?php
declare(strict_types=1);


namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\AddressRepository;
use App\Repository\CityRepository;
use App\Repository\CountryRepository;
use App\Repository\IncidentRepository;
use App\Repository\UserRepository;
use App\Repository\VillainRepository;

class IncidentController extends Controller
{

    private UserRepository $userRepository;
    private IncidentRepository $incidentRepository;
    private AddressRepository $addressRepository;
    private VillainRepository $villainRepository;
    private Response $response;
    private CountryRepository $countryRepository;
    private CityRepository $cityRepository;

    public function __construct(Request           $request, UserRepository $userRepository,
                                Response          $response, IncidentRepository $incidentRepository,
                                AddressRepository $addressRepository, VillainRepository $villainRepository,
    CountryRepository $countryRepository, CityRepository $cityRepository)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->incidentRepository = $incidentRepository;
        $this->addressRepository = $addressRepository;
        $this->villainRepository = $villainRepository;
        $this->countryRepository = $countryRepository;
        $this->cityRepository = $cityRepository;
        $this->response = $response;
    }


    public function showIncidents(): Response
    {
        return $this->view('incident-list', [
            'title' => 'Liste Incidents',
        ]);
    }

    public function showIncidentCreate(): Response
    {
        $typeTranslations = [
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

        return $this->view('incident-create', [
            'title' => 'Créer Incident',
            'typeTranslations' => $typeTranslations,
            'incidentTypes' => $this->incidentRepository->findIncidentTypes(),
            'villains' => $this->villainRepository->findAllNames(),
            'countries' => $this->countryRepository->findAllNames(),
            'cities' => $this->cityRepository->findAllNames(),
        ]);
    }

    /**
     * TODO: City is varchar, enum better
     */

    public function createIncident(): Response
    {
        $errors = [];
        $userID = $_SESSION['user']['userID'] ?? null;

        if ($this->request->method() === 'POST') {
            $dataAddress = [
                'number' => htmlspecialchars($_POST['address-number']) ?? null,
                'complement' => htmlspecialchars($_POST['address-complement']) ?? null,
                'street' => htmlspecialchars($_POST['address-street']) ?? null,
                'postal_code' => htmlspecialchars($_POST['address-postal_code']) ?? null,
                'city_id' => $_POST['address-city'] ?? null,
                'country_id' => $_POST['address-country'] ?? null,
                'users_id' => $userID
            ];

            $data = [
                'title' => htmlspecialchars($_POST['incident-title']),
                'description' => htmlspecialchars($_POST['incident-description']),
                'type' => $_POST['incident-type'],
            ];

            if (
                empty($dataAddress['city_id'])
                || empty($dataAddress['country_id'])
                || empty($data['title'])
                || empty($data['type'])) {
                $errors[] = 'Veuillez rentrez la ville, le pays, un titre et le type d\'incident';
            }

            $incidentInRegionExists = $this->incidentRepository->findDuplicate(
                (int)$dataAddress['city_id'],
                (int)$dataAddress['country_id'],
                $data['title'],
                $data['type']
            );

            if (empty($errors)) {
                if ($incidentInRegionExists) {
                    $errors[] = 'L\'incident existe déjà dans votre région';
                    return $this->view('incident-create', [
                        'error' => $errors,
                    ]);
                }
            }

            $villainID = null;
            if ($_POST['incident-villain'] === "Vilain Inconnu") {
                $villainID = $_POST['incident-villain'];
            } elseif (isset($_POST['incident-villain-new'])) {
                $villainAlias = htmlspecialchars(strtolower(trim($_POST['incident-villain-new'])), ENT_QUOTES);
                $villainID = $this->villainRepository->createNewVillain($villainAlias);
            }

            $addressId = $this->addressRepository->findIdByData($dataAddress);

            if (!$addressId) {
                $addressId = $this->addressRepository->create($dataAddress);
            }

            $this->incidentRepository->createIncident($data, $userID, (int)$villainID, $addressId);
            $_SESSION['incidentCreated'] = true;
            if ($userID) {
            return $this->response->redirect('/user-dashboard');
            }
            else {
                return $this->response->redirect('/incident-list');
            }

        }
        return $this->view('incident-create', ['errors' => $errors]);
    }
}
