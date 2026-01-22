<?php
declare(strict_types=1);


namespace App\Repository;

final class MovieRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


}
