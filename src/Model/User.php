<?php

declare(strict_types=1);

namespace App\Model;

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
}
