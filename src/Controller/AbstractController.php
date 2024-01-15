<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use PDO;

abstract class AbstractController implements ControllerInterface
{
    public function __construct(protected PDO $pdo)
    {
    }

    protected function getUser(): User
    {
        return $_SESSION['user'];
    }
}
