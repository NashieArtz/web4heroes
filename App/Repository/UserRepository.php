<?php

declare(strict_types=1);

namespace App\Repository;

use PDO;
use PDOException;

final class UserRepository
{
    private PDO $pdo;
    private AddressRepository $addressRepository;
    private int $isUpdated = 0;

    public function __construct(PDO $pdo, AddressRepository $addressRepository)
    {
        $this->pdo = $pdo;
        $this->addressRepository = $addressRepository;
    }

    /**
     * Find a user info by its ID.
     *
     * @param int $userID the ID of the user.
     * @return ?array of infos of one user.
     */
    public function findByID(int $userID): ?array
    {
        $stmt = $this->pdo->prepare(' SELECT * FROM `users` WHERE id = :id');
        $stmt->execute([':id' => $userID]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /**
     * Find all infos of all users.
     *
     * @return array of all infos of all users.
     */
    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM `users`');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//

    /**
     * Find all information from a user by its username
     *
     * @param string $username
     * @return ?array|null of all user info.
     */
    public function findByUsername(string $username): ?array
    {
        $stmt = $this->pdo->prepare(' SELECT * FROM `users` WHERE username = :username');
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    public function findByEmail(string $email): ?array {
        $stmt = $this->pdo->prepare(' SELECT * FROM `users` WHERE email = :email');
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    public function findByUsernameOrEmail(string $identifier): ?array
    {
        $sql = "
        SELECT *
        FROM users
        WHERE username = :username OR email = :email
        LIMIT 1
    ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'username' => $identifier,
            'email'    => $identifier,
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    public function findRoleById(int $userId): ?string
    {
        $sql = "SELECT role FROM users WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $userId]);

        $result = $stmt->fetch();
        return $result['role'] ?? null;
    }


    public function isHero(string $email): bool {
        $sql = "SELECT COUNT(*)
            FROM users u
            INNER JOIN hero_profile hp ON u.id = hp.users_id
            WHERE u.email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return (int)$stmt->fetchColumn() > 0;
    }

// TODO: saveresettoken(), finduserbytoken()
//
//    /**
//     * @param int $id
//     * @param string $token
//     * @return void
//     */
//    public function saveResetToken(int $id, string $token) {
//
//    }
//
//    /**
//     * @param string $token
//     * @return void
//     */
//    public function findUserByToken(string $token) {
//
//    }

    /**
     * @param array $data
     * @return void
     *
     * //TODO: Enum gender
     */
    public function createUser(array $data): void
    {
        $stmt = $this->pdo->prepare('INSERT INTO `users` (`email`, `pwd`, `lastname`, `firstname`,
        `birthdate`, `phone`)
        VALUES (:email, :pwd, :lastname, :firstname, :birthdate, :phone)');
        $stmt->execute([
            ':email' => $data['email'],
            ':pwd' => $data['pwd'],
            ':lastname' => $data['lastname'],
            ':firstname' => $data['firstname'],
            ':birthdate' => $data['birthdate'],
            ':phone' => $data['phone']
        ]);
    }

    /**
     * @param int $userID
     * @param array $data
     * @return int
     */
    public function updateUser(int $userID, array $data): bool
    {
        try {
            $stmt = $this->pdo->prepare('UPDATE `users` SET
                   `username` = :username,
                   `email` = :email,
                   `pwd` = :pwd,
                   `lastname` = :lastname,
                   `firstname` = :firstname,
                   `gender` = :gender,
                   `birthdate` = :birthdate,
                   `phone` = :phone
               WHERE id = :id');
            return $stmt->execute([
                ':username'  => $data['username'],
                ':email'     => $data['email'],
                ':pwd'       => $data['pwd'],
                ':lastname'  => $data['lastname'],
                ':firstname' => $data['firstname'],
                ':gender'    => $data['gender'],
                ':birthdate' => $data['birthdate'],
                ':phone'     => $data['phone'],
                ':id'        => $userID,
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * @param int $userID
     * @return bool
     */
    public function deleteUser(int $userID): bool
    {

        $this->pdo->beginTransaction();

        try {
            $checkAll = $this->pdo->prepare("SELECT (EXISTS (SELECT 1 FROM hero_profile WHERE users_id = :id)
                            OR EXISTS (SELECT 1 FROM incident WHERE users_id = :id)
                            OR EXISTS (SELECT 1 FROM newsletter_subscribers WHERE users_id = :id))

                ");
            $checkAll->execute([':id' => $userID]);

            $this->addressRepository->deleteAddressUser($userID);

            if ((bool)$checkAll->fetchColumn()) {
                $data = [
                    'username' => 'compte supprimé',
                    'firstname' => null,
                    'gender' => null,
                    'lastname' => null,
                    'phone' => null,
                    'pwd' => null,
                    'email' => 'deleted@web4heroes.com',
                    'birthdate' => null,
                ];
                $result = $this->updateUser($userID, $data);
            } else {
                $delete = $this->pdo->prepare("
                        DELETE FROM users
                        WHERE id = :id
                    ");
                $delete->execute([':id' => $userID]);
                $result = $delete->rowCount() > 0;
            }
            $this->pdo->commit();
            return $result;
        } catch (\Throwable $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}
