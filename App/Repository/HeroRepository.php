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
        $stmt = $this->pdo->prepare('SELECT `name` FROM `speciality` WHERE `name` = :speciality');
        $stmt->execute([':speciality' => $speciality]);
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $speciality_db) {
            if ($speciality_db === $speciality) {
                $stmt = $this->pdo->prepare('SELECT `speciality_id` FROM `hero_profile_has_speciality`
                       WHERE `speciality_id` = :speciality_id');
                $stmt->execute([':speciality_id' => $speciality_db]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else {
                //TODO: Try/Catch
                echo 'ERR: Doesn\'t exist';
            }
        }
        //TODO: Check for return value
        return ?: null;
    }

    /**
     * @param int $heroID
     * @param bool $isActive
     * @return void
     */
    public function toggleStatus(int $heroID, bool $isActive)
    {

    }

    /**
     * @param int $heroID
     * @param string $speciality
     * @return void
     */
    public function addSpeciality(int $heroID, string $speciality)
    {

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
