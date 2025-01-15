<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Message;
use App\Model\User;

class MessageController extends AbstractController
{
    public function render(array $get, array $post) : void
    {

        $inbox = Message::loadMessagesRecieved($this->pdo, $_SESSION['user']->getId());
        $outbox = Message::loadMessagesSent($this->pdo, $_SESSION['user']->getId());
        if(!empty($_GET['filter'])) {
            if (str_contains($_GET['filter'], 'DROP')) {
                die('Please have mercy');
            }

            $inbox = Message::loadMessagesRecievedWithFilter($this->pdo, $_SESSION['user']->getId(), $_GET['filter']);
        }

        $users = User::loadAllUsers($this->pdo);

        require 'view/messages.php';
    }
}