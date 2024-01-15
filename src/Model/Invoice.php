<?php

declare(strict_types=1);

namespace App\Model;

use PDO;

class Invoice
{
    private ?int $id;
    private int $userId;
    private string $file;
    private string $name;

    public function __construct(?int $id, int $userId, string $name, string $file)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->file = $file;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getFile(): string
    {
        return $this->file;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function delete(Pdo $pdo): void
    {
        $q = $pdo->prepare('DELETE FROM invoices where id = :id');
        $q->execute(['id' => $this->id]);
    }

    public function save(Pdo $pdo)
    {
        var_dump(['userId' => $this->userId, 'name' => $this->name, 'file' => $this->file]);
        $q = $pdo->prepare('INSERT INTO invoices SET userId = :userId, name = :name, file = :file');
        $q->execute(['userId' => $this->userId, 'name' => $this->name, 'file' => $this->file]);
    }
}
