<?php
$connection = new mysqli("localhost:8080", "astein", "root", "");

/* Check connection */
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/* Change character set to utf8 */
if (!$connection->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit();
}

 ?>
