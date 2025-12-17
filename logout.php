<?php
session_start();
require 'db.php';

if (isset($_SESSION['user_id'])) {
    mysqli_query(
        $mysqli,
        "UPDATE users SET auth_token=NULL WHERE id=" . $_SESSION['user_id']
    );
}

session_destroy();
setcookie("auth_token", "", time() - 3600, "/");
setcookie("bg_color", "", time() - 3600, "/");

header("Location: index.php");