<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$bg = $_COOKIE['bg_color'] ?? '#ffffff';

if (isset($_POST['bg_color'])) {
    $bg = $_POST['bg_color'];

    mysqli_query(
        $mysqli,
        "UPDATE users SET bg_color='$bg' WHERE id=" . $_SESSION['user_id']
    );

    setcookie("bg_color", $bg, time() + 86400, "/");
}
?>

<body style="background: <?= $bg ?>">

    <h2>Профиль</h2>

    <form method="post">
        Цвет фона:
        <input type="color" name="bg_color" value="<?= $bg ?>">
        <button>Сохранить</button>
    </form>

    <br>
    <a href="logout.php">Выйти</a>

</body>