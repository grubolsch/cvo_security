<?php

declare(strict_types=1);

namespace App\Model;

use PDO;

class User
{
    private int $id;
    private bool $isAdmin;

    private string $email;

    public function __construct(int $id, string $email, bool $isAdmin = false)
    {
        $this->id = $id;
        $this->email = $email;
        $this->isAdmin = $isAdmin;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public static function loadAllUsers(Pdo $pdo): array
    {
        $q = $pdo->prepare('SELECT * FROM users order by email');
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }
}
