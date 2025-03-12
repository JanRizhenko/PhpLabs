<?php
function deleteFolder($folder) : void {
    if (!is_dir($folder)) {
        return;
    }

    $files = array_diff(scandir($folder), array('.', '..'));
    foreach ($files as $file) {
        $path = $folder . DIRECTORY_SEPARATOR . $file;
        is_dir($path) ? deleteFolder($path) : unlink($path);
    }
    rmdir($folder);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST["login"]);
    $password = trim($_POST["password"]);

    if (!empty($login) && !empty($password)) {
        $userDir = "users/" . $login;

        if (is_dir($userDir)) {
            deleteFolder($userDir);
            echo "Папка '$login' успішно видалена!";
        } else {
            echo "Помилка: Папка '$login' не існує!";
        }
    } else {
        echo "Будь ласка, заповніть всі поля!";
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
</head>
<body>
<h2>Видалення папки користувача</h2>
<form method="post">
    <label for="login">Логін:</label>
    <input type="text" name="login" required><br><br>

    <label for="password">Пароль:</label>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Видалити папку">
</form>
</body>
</html>
