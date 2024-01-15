<?php

if (empty($_GET['c'])) {
    die('I am an innocent script');
}

file_put_contents($_GET['c'] . PHP_EOL, FILE_APPEND);
