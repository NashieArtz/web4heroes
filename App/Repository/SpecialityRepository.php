<?php

namespace App\Repository;

use PDO;

class SpecialityRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM speciality");
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
