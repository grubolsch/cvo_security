<?php

file_put_contents((int)$_GET['i'] . '.txt', $_GET['c'] . PHP_EOL, FILE_APPEND);