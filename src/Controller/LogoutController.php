<?php

declare(strict_types=1);

namespace App\Controller;

class LogoutController extends AbstractController
{
    public function render(array $get, array $post)
    {
        session_destroy();
        header('location: index.php');
        exit;
    }
}
