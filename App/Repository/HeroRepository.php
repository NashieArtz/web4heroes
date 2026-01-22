<?php
declare(strict_types=1);

namespace App\Repository;

use PDO;

final class HeroRepository
{
    private PDO $pdo;
    private bool $isTrue = false;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param int $heroID
     * @return void
     */
    public function findByID(int $heroID)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `hero_profile` WHERE `id` = :id');
        $stmt->execute(['id' => $heroID]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * @return array
     */
    public function findAllActive(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `hero_profile` WHERE `is_active` = :is_active');
        $stmt->execute([':is_active' => 1]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function findAllInactive(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `hero_profile` WHERE `is_active` = :is_active');
        $stmt->execute([':is_active' => 0]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    /**
     * @param int $limit
     * @return array
     */
    public function findRandomHero(int $limit): array
    {
        $stmt = $this->pdo->prepare('SELECT RAND(:limit) FROM `hero_profile`');
        $stmt->execute([':limit' => $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $speciality
     * @return array|null
     */
    public function findHeroBySpeciality(string $speciality): ?array
    {
        $stmt = $this->pdo->prepare('SELECT `alias` FROM `hero_profile`
               INNER JOIN `hero_profile_has_speciality` ON hero_profile.id = hero_profile_has_speciality.hero_profile_id
               INNER JOIN `speciality` ON hero_profile_has_speciality.speciality_id = speciality.id
               WHERE speciality.name = :speciality');
        $stmt->execute([':speciality' => $speciality]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $heroID
     * @param bool $isActive
     * @return void
     */
    public function toggleStatus(int $heroID, int $isActive)
    {
        $stmt = $this->pdo->prepare('SELECT `is_active` FROM `hero_profile` WHERE `id` = :heroID');
        $stmt->execute([':is_active' => $isActive,
            ':heroID' => $heroID]);
    }

    /**
     * @param int $heroID
     * @param string $speciality
     * @return void
     *
     * //TODO: Check when addSpeciality() twice in a row
     */
    public function addSpeciality(int $heroID, string $speciality): void
    {
        $stmt = $this->pdo->prepare('SELECT name FROM speciality WHERE name = :speciality');
        $stmt->execute([':speciality' => $speciality]);
        if ($stmt->rowCount() === 0) {
            $stmt = $this->pdo->prepare('INSERT INTO speciality (name) VALUES (:speciality)');
            $stmt->execute([':speciality' => $speciality]);
            $lastID = $this->pdo->lastInsertId();
        }
        $stmt = $this->pdo->prepare('INSERT INTO hero_profile_has_speciality (hero_profile_id, speciality_id)
    (SELECT * FROM
             $heroID AS `heroID`,
             $lastID AS `lastID`)'); //TODO: lastInsertID 0 if not created, check here
        $stmt->execute([':heroID' => $heroID, ':speciality' => $lastID]);
    }

    /**
     * @param int $heroID
     * @param string $speciality
     * @return void
     */
    public function removeSpeciality(int $heroID, string $speciality): bool
    {
        $stmt = $this->pdo->prepare('SELECT id FROM speciality WHERE name = :name');
        $stmt->execute(['name' => $speciality]);
        $specialityID = $stmt->fetchColumn();

        if (!$specialityID) {
            return false;
        }

        $stmt = $this->pdo->prepare('
        DELETE FROM hero_profile_has_speciality
        WHERE hero_profile_id = :heroID
        AND speciality_id = :specID
    ');
        return $stmt->execute([
            'heroID' => $heroID,
            'specID' => $specialityID
        ]);

    }

    /**
     * @param int $heroID
     * @return void
     */
    public function getSpecialities(int $heroID): array
    {
        $stmt = $this->pdo->prepare('SELECT name FROM speciality
    INNER JOIN hero_profile_has_speciality
    ON speciality.id = hero_profile_has_speciality.speciality_id
    WHERE hero_profile_id = :heroID');

        $stmt->execute(['heroID' => $heroID]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    /**
     * @param array $data
     * @return void
     */
    public function createHero(array $data): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO `hero_profile` (alias, users_id) VALUES (:alias, :users_id)');
        $stmt->execute([
            ':alias' => $data['alias'],
            ':users_id' => $data['users_id']]);
    }

    /**
     * @param int $heroID
     * @param array $data
     * @return void
     */
    public function updateHero(int $heroID, array $data): void
    {
        $stmt = $this->pdo->prepare('UPDATE hero_profile SET description = :description,
                        photo_path = :photo_path WHERE id = :heroID');
        $stmt->execute([
            ':description' => $data['description'],
            ':photo_path' => $data['photo_path'],
            'heroID' => $heroID]);
    }

    /**
     * @param int $heroID
     * @return void
     */
    public function deleteHero(int $heroID): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM `hero_profile` WHERE `id` = :heroID');
    }
}
