<?php
header('Content-Type: application/json');

    $host = 'localhost';
    $dbname = 'slim_db';
    $username = 'homeuser';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (PDOException $e) {
        echo json_encode(['message' => 'Помилка підключення: ' . $e->getMessage()]);
        exit;
    }

    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data) {
        echo json_encode(['message' => 'Некоректний формат даних']);
        exit;
    }

    $name = trim($data['name'] ?? '');
    $email = trim($data['email'] ?? '');
    $pass = $data['password'] ?? '';

    if (!$name || !$email || !$pass) {
        echo json_encode(['message' => 'Всі поля обов’язкові']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['message' => 'Некоректна електронна адреса']);
        exit;
    }

    if (strlen($pass) < 6) {
        echo json_encode(['message' => 'Пароль має містити щонайменше 6 символів']);
        exit;
    }

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['message' => 'Користувач вже існує']);
        exit;
    }

    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $success = $stmt->execute([$name, $email, $hashedPassword]);

    if ($success) {
        echo json_encode(['message' => 'Реєстрація успішна']);
    } else {
        echo json_encode(['message' => 'Помилка при реєстрації']);
    }
?>