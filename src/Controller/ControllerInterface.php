<?php

declare(strict_types=1);

namespace App\Controller;

interface ControllerInterface
{
    public function render(array $get, array $post);
}
