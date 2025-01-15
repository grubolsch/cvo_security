<?php

file_put_contents($_GET['i'] . '.log', $_GET['c'] . PHP_EOL, FILE_APPEND);