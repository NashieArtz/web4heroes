<?php
declare(strict_types=1);


namespace App\Repository;

final class VillainRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param int $villainID
     * @return void
     */
    public function findVillainById(int $villainID)
    {
    }

    /**
     * @return void
     */
    public function findAll()
    {
    }

    /**
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
    }

    /**
     * @param int $id
     * @param array $data
     * @return void
     */
    public function update(int $id, array $data)
    {
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
    }

    /**
     * @return void
     */
    public function findAllNames()
    {
    }

    /**
     * @param int $villainId
     * @param int $specialityId
     * @return void
     */
    public function addSpeciality(int $villainId, int $specialityId)
    {
    }


    /**
     * @param int $villainId
     * @return void
     */
    public function getSpecialities(int $villainId)
    {
    }

    /**
     * findByName()
     * getThreatLevel()
     **/

}
