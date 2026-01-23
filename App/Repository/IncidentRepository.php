<?php
declare(strict_types=1);

namespace App\Repository;

use PDO;

final class IncidentRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByID(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `incidents` WHERE `id` = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateIncident(int $id, array $data): void
    {
        $stmt = $this->pdo->prepare('UPDATE `incidents` SET
                       `title` = :title,
                       `description` = :description,
                       `date` = :date,
                       `priority` = :priority,
                       `type` = :type,
                       `villain_profile_id` = :villain_profile_id,
                       `status` = :status
                       WHERE `id` = :id');
        $stmt->execute([
            'title' => $data['title'],
            'description' => $data['description'],
            'date' => $data['date'],
            'priority' => $data['priority'],
            'type' => $data['type'],
            'villain_profile_id' => $data['villain_profile_id'],
            'status' => $data['status'],
            'id' => $id
        ]);
}

    public function findAllActiveIncident(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `incidents` WHERE `status` = :status');
        $stmt->execute(['status' => 1]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findIncidentByPriority(string $priority): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `incidents` WHERE `priority` = :priority');
        $stmt->execute(['priority' => $priority]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findIncidentByType(string $type): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `incidents` WHERE `type` = :type');
        $stmt->execute(['type' => $type]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findIncidentByReporter(int $userId): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `incidents` WHERE `users_id` = :user_id');
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findIncidentHistoryByVillain(int $villainId): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `incidents` WHERE `villain_profile_id` = :villain_id');
        $stmt->execute(['villain_id' => $villainId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteIncident(int $id) : void
    {
        $stmt = $this->pdo->prepare('DELETE FROM `incidents` WHERE `id` = :id');
        $stmt->execute(['id' => $id]);

    }
}
