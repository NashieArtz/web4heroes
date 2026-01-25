<?php
declare(strict_types=1);

namespace App\Core;

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Repository\UserRepository;
use App\Repository\AddressRepository;
use PDO;

final class Container
{
    private PDO $pdo;
    private AddressRepository $addressRepository;
    private UserRepository $userRepository;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        $this->addressRepository = new AddressRepository($pdo);
        $this->userRepository = new UserRepository($pdo, $this->addressRepository);
    }

    public function make(string $class, Request $request): object
    {
        return match ($class) {
            AuthController::class => new AuthController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository),

            ),

            DashboardController::class => new DashboardController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository)
            ),
            default => new $class($request),

        };
    }
}
