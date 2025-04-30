<?php
ob_start();
session_start();
require 'db.php';

$messages = [];

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($username)) {
    $messages[] = 'Поле "Логін" не може бути порожнім';
}

if (empty($messages)) {
    /** @var $conn */
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 0) {
        $messages[] = 'Користувача не знайдено';
    } else {
        $user = $res->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $messages[] = "Ласкаво просимо, {$user['username']}!";
            $messages[] = 'Ви успішно увійшли до системи';
            $messages[] = 'Останній вхід: ' . $user['last_login'];

            if (!isset($_COOKIE['device_logged'])) {
                $messages[] = 'Вхід з нового пристрою або браузера';
                setcookie('device_logged', '1', time() + 3600 * 24 * 30);
            }

            $stmt = $conn->prepare("UPDATE users SET last_login=NOW() WHERE id=?");
            $stmt->bind_param("i", $user['id']);
            $stmt->execute();

            $_SESSION['username'] = $user['username'];
            $_SESSION['messages'] = $messages;

            header("Location: dashboard.php");
            exit;
        } else {
            $messages[] = 'Неправильний логін або пароль';

            $_SESSION['login_attempts'][$username] = ($_SESSION['login_attempts'][$username] ?? 0) + 1;

            if ($_SESSION['login_attempts'][$username] >= 3) {
                $messages[] = 'Користувач тричі ввів невірний пароль';
            }
        }
    }
}

$_SESSION['messages'] = $messages;
header("Location: login.php");
exit;
?>