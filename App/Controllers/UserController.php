<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Repository\AddressRepository;
use App\Repository\CityRepository;
use App\Repository\UserRepository;

class UserController extends Controller
{

    private UserRepository $userRepository;
    private Response $response;
    private CityRepository $cityRepository;
    private AddressRepository $addressRepository;

    public function __construct(Request $request, UserRepository $userRepository, Response $response,
    CityRepository $cityRepository, AddressRepository $addressRepository)
    {
        parent::__construct($request);
        $this->userRepository = $userRepository;
        $this->response = $response;
        $this->cityRepository = $cityRepository;
        $this->addressRepository = $addressRepository;

    }

    public function showUserProfile(): Response
    {
        $userRole = $_SESSION['user']['role'];
        $userRole = $this->roleCheck($userRole);
        if ($userRole === 'admin' || $userRole == null) {
            return $this->response->redirect('/');
        }
        $userID = $_SESSION['user']['userID'];
        $userInfo = $this->userRepository->findByID($userID);
        return $this->view('/user-profile', [
            'title' => 'Mon profil',
                'userInfo' => $userInfo
            ]
        );
    }

    public function showUserProfileEdit(): Response
    {
        $userRole = $_SESSION['user']['role'];
        $userRole = $this->roleCheck($userRole);
        if ($userRole !== 'user' && $userRole !== 'hero') {
            return $this->response->redirect('/');
        }

        $userID = $_SESSION['user']['userID'];
        $userInfo = $this->userRepository->findByID($userID);
        $address = $this->addressRepository->findByUserId($userID);


        return $this->view('/user-profile-edit', [
            'title' => 'Édition de mon profil',
            'userInfo' => $userInfo,
            'userRole' => $userRole,
            'address' => $address,
            'cities' => $this->cityRepository->findAllNames(),
        ]);
    }

    public function editUserProfile(): Response {
        $userID = $_SESSION['user']['userID'];
        $currentUser = $this->userRepository->findByID($userID);
        $isDataSent = false;

        if ($this->request->method() === 'POST') {
            $userData = [
                'username' => $_POST['username'] ?? null,
                'lastname' => $_POST['lastname'],
                'firstname' => $_POST['firstname'],
                'gender' => $_POST['gender'],
                'birthdate' => $_POST['birthdate'],
                'phone' => $_POST['phone'],
                'email' => $currentUser['email'],
                'pwd' => $currentUser['pwd'],
            ];

            $userAddressData = [
                'number'      => $_POST['address-number'],
                'complement'  => null,
                'street'      => $_POST['address-street'],
                'city_id'     => $_POST['address-city'],
                'postal_code' => $_POST['address-postal_code'] ?? null,
                'country_id'  => 1,
            ];

            $this->userRepository->updateUser($userID, $userData);

            $existingAddress = $this->addressRepository->findByUserId($userID);

            if ($existingAddress) {
                $this->addressRepository->updateByUser($userID, $userAddressData);
            } else {
                $userAddressData['users_id'] = $userID;
                $this->addressRepository->create($userAddressData);
            }

            $isDataSent = true;
            $_SESSION['flash'] = "Profil modifié, votre demande de changement d'email sera géré par un admin";
        }
        return $this->response->redirect('/user-profile');
    }


}
