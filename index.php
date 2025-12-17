<?php
session_start();
require 'db.php';

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "
        SELECT * FROM users
        WHERE login='$login' AND password='$password'
    ";
    $res = mysqli_query($mysqli, $sql);
    $user = mysqli_fetch_assoc($res);
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $token = uniqid();
        mysqli_query(
            $mysqli,
            "UPDATE users SET auth_token='$token' WHERE id=" . $user['id']
        );
        setcookie("auth_token", $token, time() + 86400, "/");
        setcookie("bg_color", $user['bg_color'], time() + 86400, "/");
        header("Location: profile.php");
        exit;
    }

    echo "Неверный логин или пароль";
}
?>

<form method="post">
    <input name="login" placeholder="login"><br>
    <input type="password" name="password" placeholder="password"><br>
    <button>Войти</button>
</form>
<a href="register.php">Зарегистрироваться</a>

<!-- JS автологин -->
<script>
    if (document.cookie.includes('auth_token')) {
        window.location = 'auto_login.php';
    }
</script>