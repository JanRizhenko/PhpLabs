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
    $email = trim($data['email'] ?? '');
    $password = $data['password'] ?? '';

    if (!$email || !$password) {
        echo json_encode(['message' => 'Всі поля обов’язкові']);
        exit;
    }

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])) {
        echo json_encode(['message' => 'Вхід виконано успішно.', 'id' => $user['id']]);
    }
    else {
        echo json_encode(['message' => 'Невірні дані']);
    }
?>