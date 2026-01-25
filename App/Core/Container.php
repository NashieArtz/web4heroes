<?php
declare(strict_types=1);

namespace App\Core;

use App\Controllers\AdminController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Controllers\ExceptionsController;
use App\Controllers\HeroController;
use App\Controllers\IncidentController;
use App\Controllers\MovieController;
use App\Controllers\NewsletterController;
use App\Controllers\RegisterController;
use App\Controllers\UserController;
use App\Controllers\VillainController;
use App\Repository\UserRepository;
use App\Repository\AddressRepository;
use Couchbase\User;
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
            AdminController::class => new AdminController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository)
            ),

            AuthController::class => new AuthController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository),

            ),

            DashboardController::class => new DashboardController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository)
            ),

            ExceptionsController::class => new ExceptionsController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository),
            ),

            HeroController::class => new HeroController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository),
            ),

            IncidentController::class => new IncidentController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository),
            ),

            MovieController::class => new MovieController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository),
            ),

            NewsletterController::class => new NewsletterController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository),
            ),

            RegisterController::class => new RegisterController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository),
            ),

            UserController::class => new UserController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository),
            ),

            VillainController::class => new VillainController(
                $request,
                new UserRepository($this->pdo, $this->addressRepository),
            ),

            default => new $class($request),

        };
    }
}
