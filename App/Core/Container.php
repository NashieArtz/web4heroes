<?php
declare(strict_types=1);

namespace App\Core;

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
            ProductController::class => new ProductController(
                $request,
                new ProductsRepository($this->pdo),
                new CategoryRepository($this->pdo)
            ),

            CategoryController::class => new CategoryController(
                $request,
                new ProductsRepository($this->pdo),
                new CategoryRepository($this->pdo)
            ),

            default => new $class($request),
        };
    }
}
