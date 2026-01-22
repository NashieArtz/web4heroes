<?php
declare(strict_types=1);

namespace App\Core;

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Repository\AddressRepository;
use App\Repository\UserRepository;
use PDO;

final class Container
{
    private PDO $pdo;
    private AddressRepository $addressRepository;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function make(string $class, Request $request): object
    {
        return match ($class) {
            AuthController::class => new AuthController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository),
            ),

            DashboardController::class => new DashboardController(
                $request
            ),

            default => new $class($request),
        };
    }
}
