<?php
declare(strict_types=1);

namespace App\Repository;

final class IncidentRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

//find(int $id)
//
//update(int $id, array $data)
//
//findAllOpen()
//
//findByPriority(string $priority)
//
//findByReporter(int $userId)
//
//findHistoryByVillain(int $villainId)
//
//countOpenIncidents()
}
