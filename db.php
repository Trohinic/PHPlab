<?php

$db_server = "127.0.1.28";
$db_user = "root";
$db_pass = "";
$db_name = "phplab4";
$conn = "";

$mysqli = new mysqli($db_server, $db_user, $db_pass, $db_name);

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

?>