<?php

namespace App\Repository;

use PDO;

class InterventionRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param array $data
     * @return void
     */
    public function createIntervention(array $data): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO intervention (incidents_id, hero_profile_id)
VALUES (:incidents_id, :hero_profile_id)');
        $stmt->execute(['incidents_id' => $data['incidents_id'],
            'hero_profile_id' => $data['hero_profile_id']]);
    }

    /**
     * @return void
     */
    public function updateIntervention(array $data): void
    {
        $stmt = $this->pdo->prepare('UPDATE `intervention`
SET `incidents_id` = :incidents_id, `hero_profile_id` = :hero_profile_id, `status` = :status, `date_close` = :date_close
WHERE `id` = :id');
        $stmt->execute(['incidents_id' => $data['incidents_id'],
            'hero_profile_id' => $data['hero_profile_id'],
            'status' => $data['status'],
            'date_close' => $data['date_close'],
            'id' => $data['id']]);

    }

    /**
     * @return void
     */
    public function updateStatus(string $status): void
    {

    }

    /**
     * @return void
     */
    public function findByID(int $id): ?array
    {

    }

    /**
     * @return void
     */
    public function findByHero(string $hero): ?array
    {

    }

}
