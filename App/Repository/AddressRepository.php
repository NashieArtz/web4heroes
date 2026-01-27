<?php
declare(strict_types=1);
namespace App\Repository;
use PDO;

final class AddressRepository
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

//    /**
//     * @param int $userID
//     * @return void
//     */
//    public function findByUserID(int $userID) {
//
//    }
//
    /**
     * @param array $data
     * @return void
     */
    public function create(array $data): int {
        $stmt = $this->pdo->prepare('INSERT INTO `address`
(number, complement, street, postal_code, city_id, country_id, users_id)
VALUES (:number, :complement, :street, :postal_code, :city_id, :country_id, :users_id)');
        $stmt->execute([
            ':number' => $data['number'] ?? null,
            ':complement' => $data['complement'] ?? null,
            ':street' => $data['street'] ?? null,
            ':postal_code' => $data['postal_code'] ?? null,
            ':city_id' => (int)$data['city_id'],
            ':country_id' => (int)$data['country_id'],
            ':users_id' => $data['users_id']
        ]);
        return (int)$this->pdo->lastInsertId();
    }

    public function findIdByData(array $data): ?int {
        $stmt = $this->pdo->prepare('SELECT id FROM `address`
          WHERE number = :number
            AND complement = :complement
            AND street = :street
            AND postal_code = :postal_code
            AND city_id = :city_id
            AND country_id = :country_id');
        $stmt->execute([
            ':number' => $data['number'] ?? null,
            ':complement' => $data['complement'] ?? null,
            ':street' => $data['street'] ?? null,
            ':postal_code' => $data['postal_code'] ?? null,
            ':city_id' => (int)$data['city_id'],
            ':country_id' => (int)$data['country_id']
        ]);
        $id = $stmt -> fetchColumn();
        return $id ? (int)$id : null;
    }



    public function updateByUser(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare("
            UPDATE address
            SET number = :number,
                complement = :complement,
                street = :street,
                postal_code = :postal_code,
                city_id = :city_id,
                country_id = :country_id
            WHERE id = :id
        ");
        $stmt->execute([
            ':id' => $id,
            ':number' => $data['number'],
            ':complement' => $data['complement'],
            ':street' => $data['street'],
            ':postal_code' => $data['postal_code'],
            ':city_id' => $data['city_id'],
            ':country_id' => $data['country_id']
        ]);
        return $stmt->rowCount() > 0;
    }

    public function deleteAddressUser(int $id): bool
    {
        $stmt = $this->pdo->prepare("
            DELETE FROM address
            WHERE id = :id
        ");
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount() > 0;
    }

    public function findByUserId(int $userId): ?array
    {
        $stmt = $this->pdo->prepare("
            SELECT number, complement, street, postal_code, city_id, country_id
            FROM address
            WHERE users_id = :userId
        ");
        $stmt->execute([':userId' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function deleteUser(int $userId): bool
    {
        $stmt = $this->pdo->prepare("
        DELETE FROM address
        WHERE users_id = :userId
    ");
        $stmt->execute([':userId' => $userId]);

        return $stmt->rowCount() > 0;
    }

}

