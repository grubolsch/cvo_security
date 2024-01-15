<?php

if (empty($_GET['c'])) {
    echo file_get_contents('innocent.log');
    exit;
}

file_put_contents('innocent.log', $_GET['c'] . PHP_EOL, FILE_APPEND);
