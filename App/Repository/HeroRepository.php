<?php
declare(strict_types=1);
namespace App\Repository;
use PDO;

final class HeroRepository
{
    private PDO $pdo;

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
     */
    public function addSpeciality(int $heroID, string $speciality)
    {
        $specialityTrim = htmlspecialchars(trim($speciality), ENT_QUOTES);
        $stmt = $this->pdo->prepare('SELECT speciality.name FROM speciality WHERE NOT EXISTS (name = :speciality)');
        // trim.lowercase($speciality);
        // If speciality.name === speciality then
            // INSERT INTO hero_profile_has_speciality VALUES hero_profile_id, speciality_id
        // ELSE
            // INSERT INTO speciality VALUES speciality.name
            // GET speciality.id FROM speciality.name
            // INSERT INTO hero_profile_has_speciality VALUES hero_profile_id, speciality_id
    }

    /**
     * @param int $heroID
     * @param string $speciality
     * @return void
     */
    public function removeSpeciality(int $heroID, string $speciality)
    {

    }

    /**
     * @param int $heroID
     * @return void
     */
    public function getSpecialities(int $heroID)
    {

    }

    /**
     * @param array $data
     * @return void
     */
    public function createHero(array $data)
    {


    }

    /**
     * @param int $heroID
     * @param array $data
     * @return void
     */
    public function updateHero(int $heroID, array $data)
    {

    }

    /**
     * @param int $heroID
     * @return void
     */
    public function deleteHero(int $heroID)
    {

    }


}
