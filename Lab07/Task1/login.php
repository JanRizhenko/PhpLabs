<?php session_start(); ?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Вхід</title>
</head>
<body>
<h2>Авторизація</h2>
<form action="process_login.php" method="post">
    <label>Логін: <input type="text" name="username"></label><br>
    <label>Пароль: <input type="password" name="password"></label><br>
    <button type="submit">Увійти</button>
</form>
<?php
if (isset($_SESSION['messages'])) {
    echo "<div style='color: red'>";
    foreach ($_SESSION['messages'] as $msg) {
        echo "<p>$msg</p>";
    }
    echo "</div>";
    unset($_SESSION['messages']);
}?>
</body>
</html>