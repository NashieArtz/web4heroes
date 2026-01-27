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

    public function findByID(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `incidents` WHERE `id` = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function createIncident(array $data, ?int $userID, ?int $villainID, ?int $addressID): void {
        $stmt = $this->pdo->prepare('INSERT INTO `incidents`
(title, description, type, users_id, villain_profile_id, address_id)
VALUES (:title, :description, :type, :users_id, :villain_profile_id, :address_id)');
        if($userID === 0) {
            $userID = null;
        }
        if($villainID === 0) {
            $villainID = null;
        }
        $stmt->execute([
            'title' => $data['title'],
            'description' => $data['description'],
            'type' => $data['type'],
            'users_id' => $userID,
            'villain_profile_id' => $villainID,
            'address_id' => $addressID
        ]);
    }

    public function findIncidentTypes(): array {
            $sql = "
        SELECT COLUMN_TYPE
        FROM information_schema.COLUMNS
        WHERE TABLE_SCHEMA = DATABASE()
          AND TABLE_NAME = 'incidents'
          AND COLUMN_NAME = 'type'
        ";

            $stmt = $this->pdo->query($sql);
            $column = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (!isset($column['COLUMN_TYPE'])) {
                return [];
            }

            preg_match("/^enum\((.*)\)$/", $column['COLUMN_TYPE'], $matches);

            if (!isset($matches[1])) {
                return [];
            }

            return str_getcsv($matches[1], ',', "'");
    }

    public function findDuplicate(string $city, string $country, string $title, string $type): bool
    {
        $stmt = $this->pdo->prepare('SELECT 1 FROM `address` as a JOIN `incidents` as i
        WHERE i.title = :title
            AND i.type = :type
            AND a.city = :city
            AND a.country = :country
            AND i.status = \'open\'');
        $stmt->execute([
            ':title' => $title,
            ':type' => $type,
            ':city' => $city,
            ':country' => $country
        ]);
        return (bool)$stmt->fetchColumn();
    }
}
