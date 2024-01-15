<?php

declare(strict_types=1);

namespace App\Controller;

use PDO;
use PDOException;

class RegisterController implements ControllerInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function render(array $get, array $post)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $stmt = $this->pdo->prepare("INSERT INTO users (email, password, isAdmin) VALUES (?, ?, false)");
                $stmt->execute([$post['email'], md5($post['password'])]);

                header('location: ?path=login');
                exit;
            } catch (PDOException $e) {
                $msg = "<p class='error'>Registration failed. Please try again.</p>";
            }
        }

        require 'view/register.php';

    }


}
