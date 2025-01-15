<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Message;
use App\Model\User;

class CreateMessageController extends AbstractController
{
    public function render(array $get, array $post) : void
    {
        if (isset($post['from'], $post['to'], $post['message'])) {
            $invoice = new Message(null, (int)$post['from'], (int)$post['to'], $post['message']);
            $invoice->save($this->pdo);

            header('location: ?path=messages');
            exit;
        }

        $users = User::loadAllUsers($this->pdo);

        require 'view/createMessage.php';
    }
}