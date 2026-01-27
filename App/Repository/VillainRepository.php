<?php
declare(strict_types=1);

namespace App\Repository;

use PDO;

final class VillainRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findVillainById(int $villainID): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM villain_profile WHERE id = :id');
        $stmt->execute(['id' => $villainID]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM villain_profile');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $stmt = $this->pdo->prepare('
            INSERT INTO villain_profile (alias, name, description, photo_path)
            VALUES (:alias, :name, :description, :photo_path)
        ');
        return $stmt->execute([
            'alias'       => $data['alias'],
            'name'        => $data['name'] ?? null,
            'description' => $data['description'],
            'photo_path'  => $data['photo_path']
        ]);
    }

    public function createNewVillain(string $villainAlias): int {
        if($this->villainExists($villainAlias)) {
            $stmt = $this->pdo->prepare('SELECT id FROM villain_profile WHERE alias = :alias');
            $stmt->execute(['alias' => $villainAlias]);
            return $stmt->fetchColumn();
        }
        else {
            $stmt = $this->pdo->prepare('INSERT INTO villain_profile (alias) VALUES (:alias)');
            $stmt->execute(['alias' => $villainAlias]);
            return (int)$this->pdo->lastInsertId();
        }
    }

    public function villainExists(string $villainAlias): bool {
        $stmt = $this->pdo->prepare('SELECT 1 FROM villain_profile WHERE alias = :alias');
        $stmt->execute(['alias' => $villainAlias]);
        return (bool) $stmt->fetchColumn();
    }


    public function update(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare('
            UPDATE villain_profile
            SET alias = :alias, name = :name, description = :description, photo_path = :photo_path
            WHERE id = :id
        ');
        return $stmt->execute([
            'id'          => $id,
            'alias'       => $data['alias'],
            'name'        => $data['name'] ?? null,
            'description' => $data['description'],
            'photo_path'  => $data['photo_path']
        ]);
    }


    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM villain_profile WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }


    public function findAllNames(): array
    {
        $stmt = $this->pdo->query('SELECT id, alias FROM villain_profile');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addSpeciality(int $villainId, int $specialityId): bool
    {
        $stmt = $this->pdo->prepare('
            INSERT INTO speciality_has_villain_profile (speciality_id, villain_profile_id)
            VALUES (:specialityId, :villainId)
        ');
        return $stmt->execute([
            'villainId'    => $villainId,
            'specialityId' => $specialityId
        ]);
    }


    public function getSpecialities(int $villainId): array
    {
        $stmt = $this->pdo->prepare('
            SELECT s.* FROM speciality s
            JOIN speciality_has_villain_profile shv ON s.id = shv.speciality_id
            WHERE shv.villain_profile_id = :villainId
        ');
        $stmt->execute(['villainId' => $villainId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByName(string $alias): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM villain_profile WHERE alias LIKE :alias');
        $stmt->execute(['alias' => "%$alias%"]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }
}
