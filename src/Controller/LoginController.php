<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use PDO;

class LoginController implements ControllerInterface
{
    public function __construct(private PDO $pdo)
    {
    }

    public function render(array $get, array $post)
    {
        if (isset($get['email'], $get['password'])) {
            if ($this->validateLogin($get['email'], $get['password'])) {
                header('location: ' . $_GET['goto']);
                exit;
            } else {
                $msg = '<p class="error">Login failed. Please check your username and password.</p>';
            }
        }

        require 'view/login.php';
    }

    private function validateLogin(string $email, string $password): bool
    {
        if (str_contains($password, 'DROP')) {
            die('Please have mercy');
        }

        var_dump($email);
        $stmt = $this->pdo->query('SELECT * FROM users WHERE password = "' . md5($password) . '" and email = "' . $email . '"');
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!isset($user['id'])) {
            return false;
        }

        $_SESSION['user'] = new User($user['id'], $user['email'], (bool)$user['isAdmin']);
        return true;
    }
}
