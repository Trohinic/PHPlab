<?php
session_start();
require 'db.php';

if (!isset($_COOKIE['auth_token'])) {
    header("Location: index.php");
    exit;
}

$token = $_COOKIE['auth_token'];

$res = mysqli_query(
    $mysqli,
    "SELECT * FROM users WHERE auth_token='$token'"
);

$user = mysqli_fetch_assoc($res);

if ($user) {
    $_SESSION['user_id'] = $user['id'];
    setcookie("bg_color", $user['bg_color'], time() + 86400, "/");
    header("Location: profile.php");
} else {
    header("Location: index.php");
}