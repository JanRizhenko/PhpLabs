<?php session_start(); ?>
<?php
if (isset($_SESSION['register_messages'])) {
    echo "<div style='color: red'>";
    foreach ($_SESSION['register_messages'] as $msg) {
        echo "<p>$msg</p>";
    }
    echo "</div>";
    unset($_SESSION['register_messages']);
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
</head>
<body>
<h2>Реєстрація нового користувача</h2>
<form action="process_register.php" method="post">
    <label>Логін: <input type="text" name="username"></label><br>
    <label>Пароль: <input type="password" name="password"></label><br>
    <label>Підтвердження пароля: <input type="password" name="confirm_password"></label><br>
    <button type="submit">Зареєструватися</button>
</form>


<p><a href="login.php">Повернутися до входу</a></p>
</body>
</html>