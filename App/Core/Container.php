<?php
declare(strict_types=1);

namespace App\Core;

use App\Controllers\AuthController;
use App\Controllers\RegisterController;
use App\Repository\UserRepository;
use PDO;

final class Container
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function make(string $class, Request $request): object
    {
        return match ($class) {
            RegisterController::class => new RegisterController(
                $request,
                new UserRepository($this->pdo)
            ),

            default => new $class($request),
        };
    }
}
