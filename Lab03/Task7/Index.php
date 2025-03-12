<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST["login"]);
    $password = trim($_POST["password"]);

    if (!empty($login) && !empty($password)) {
        $userDir = "users/" . $login;

        if (!is_dir($userDir)) {
            mkdir($userDir, 0777, true);

            mkdir("$userDir/video", 0777, true);
            mkdir("$userDir/music", 0777, true);
            mkdir("$userDir/photo", 0777, true);

            file_put_contents("$userDir/video/video1.mp4", "Video file");
            file_put_contents("$userDir/music/song1.mp3", "Music file");
            file_put_contents("$userDir/photo/image1.jpg", "Photo file");

            echo "Користувацька папка '$login' успішно створена!";
        } else {
            echo "Помилка: Папка для '$login' вже існує!";
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
    <title>Task 7</title>
</head>
<body>
<h2>Створення папки користувача</h2>
<form method="post">
    <label for="login">Логін:</label>
    <input type="text" name="login" required><br><br>

    <label for="password">Пароль:</label>
    <input type="password" name="password" required><br><br>

    <input type="submit" value="Створити папку">
</form>
</body>
</html>