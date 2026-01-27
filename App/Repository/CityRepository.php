<?php
declare(strict_types=1);
namespace App\Repository;
use PDO;

final class CityRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAllNames(): array {
        $stmt = $this->pdo->prepare('SELECT * FROM cities');
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
