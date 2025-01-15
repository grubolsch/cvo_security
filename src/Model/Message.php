<?php

declare(strict_types=1);

namespace App\Model;

use PDO;

class Message
{
    private ?int $id;
    private int $from;
    private int $to;

    private string $message;

    public function __construct(?int $id, int $from, int $to, string $message)
    {
        $this->id = $id;
        $this->from = $from;
        $this->to = $to;
        $this->message = $message;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getfrom(): int
    {
        return $this->from;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getTo(): int
    {
        return $this->to;
    }

    public static function loadMessagesSent(Pdo $pdo, int $from): array
    {
        $q = $pdo->query('SELECT u_to.email, message FROM messages left join users u_to on u_to.id = to_user_id left join users u on u.id=user_id where user_id = ' . $from);
        return $q->fetchAll();
    }

    public static function loadMessagesRecieved(PDO $pdo, int $to)
    {
        $q = $pdo->query('SELECT email, message FROM messages left join users u on u.id=user_id where to_user_id = ' . $to);
        return $q->fetchAll();
    }

    public static function loadMessagesRecievedWithFilter(Pdo $pdo, int $to, string $from): array
    {
        $q = $pdo->query('SELECT email, message FROM messages left join users u on u.id=user_id where to_user_id = ' . $to . ' and user_id = ' . $from);
        return $q->fetchAll();
    }

    public function save(Pdo $pdo)
    {
        $q = $pdo->prepare('INSERT INTO messages SET user_id = :from, to_user_id = :to, message = :message');
        $q->execute(['from' => $this->from, 'to' => $this->to, 'message' => $this->message]);
    }
}
