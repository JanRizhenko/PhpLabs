<?php
ob_start();
session_start();
require 'db.php';

$messages = [];

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

// Валідація
if (empty($username)) {
    $messages[] = 'Поле "Логін" не може бути порожнім';
}
if (empty($password)) {
    $messages[] = 'Поле "Пароль" не може бути порожнім';
}
if ($password !== $confirm) {
    $messages[] = 'Паролі не збігаються';
}

if (empty($messages)) {
    /** @var $conn */
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $messages[] = 'Користувач з таким логіном вже існує';
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, password, last_login) VALUES (?, ?, NOW())");
        $stmt->bind_param("ss", $username, $hash);

        if ($stmt->execute()) {
            $_SESSION['messages'] = ['Реєстрація успішна. Тепер увійдіть до системи.'];
            header("Location: login.php");
            exit;
        } else {
            $messages[] = 'Помилка під час створення користувача';
        }
    }
}

$_SESSION['register_messages'] = $messages;
header("Location: register.php");
exit;
