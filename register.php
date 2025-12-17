<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $login = $_POST['login'];
    $password = $_POST['password'];
    $bg = $_POST['bg_color'];

    $sql = "
        INSERT INTO users (login, password, bg_color)
        VALUES ('$login', '$password', '$bg')
    ";

    mysqli_query($mysqli, $sql);

    header("Location: index.php");
    exit;
}
?>
<form method="POST" action="">
    <input name="login" placeholder="login"><br>
    <input type="password" name="password" placeholder="password"><br>
    <input type="color" name="bg_color" value="#ffffff"><br>
    <button>Регистрация</button>
</form>
<a href="index.php">Войти</a>