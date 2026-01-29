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

    public function findAllWithDetails(): array
    {
        $query = "SELECT i.*,
              u.firstname, u.lastname,
              cit.name as city_name
              FROM `incidents` as i
              LEFT JOIN `users` as u ON i.users_id = u.id
              LEFT JOIN `address` as a ON i.address_id = a.id
              LEFT JOIN `cities` as cit ON a.city_id = cit.id
              ORDER BY i.date DESC";

        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function createIncident(array $data, ?int $userID, ?int $villainID, ?int $addressID): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO `incidents`
(title, description, type, users_id, villain_profile_id, address_id)
VALUES (:title, :description, :type, :users_id, :villain_profile_id, :address_id)');
        if ($userID === 0) {
            $userID = null;
        }
        if ($villainID === 0) {
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

    public function findIncidentTypes(): array
    {
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

    public function findDuplicate(int $city_id, int $country_id, string $title, string $type): bool
    {
        $stmt = $this->pdo->prepare('SELECT 1 FROM `address` as a JOIN `incidents` as i
        WHERE i.title = :title
            AND i.type = :type
            AND a.city_id = :city_id
            AND a.country_id = :country_id
            AND i.status = \'Open\'');
        $stmt->execute([
            ':title' => $title,
            ':type' => $type,
            ':city_id' => $city_id,
            ':country_id' => $country_id
        ]);
        return (bool)$stmt->fetchColumn();
    }

    public function findAllRecent(): array {
        $stmt = $this->pdo->prepare('SELECT * FROM `incidents` WHERE date between
    NOW() - INTERVAL 30 DAY AND NOW() ORDER BY date DESC');
            $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findUserIncidentByStatus(int $userID, string $status): array
    {
        $stmt = $this->pdo->prepare("SELECT i.*, vp.alias,
        CONCAT(a.number, ' ', a.street, ', ', cit.name, ', ', cou.name) as address
         FROM `incidents` as i
              LEFT JOIN `villain_profile` as vp ON i.villain_profile_id = vp.id
              LEFT JOIN address as a ON i.address_id = a.id
              LEFT JOIN cities as cit ON a.city_id = cit.id
              LEFT JOIN countries as cou ON a.country_id = cou.id
              WHERE i.users_id = :userID AND i.status = :status");
        $stmt->execute([
            ':userID' => $userID,
            ':status' => $status
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }
}
