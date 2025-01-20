<?php
$dirPath = $_GET['path'] ?? '.';

// $dirPath contain path to directory whose files are to be listed
if ($handle = opendir($dirPath)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry !== "." && $entry !== ".." && is_file($dirPath . '/' . $entry)) {
            if($entry === 'index.php') continue;
            echo '<li>' . $entry;
        }
    }
    closedir($handle);
}
