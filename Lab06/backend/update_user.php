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

    $id = $data['id'] ?? '';
    $name = trim($data['name'] ?? '');
    $email = trim($data['email'] ?? '');
    $newPassword = $data['password'] ?? '';

    if (!$name || !$email || !$id) {
        echo json_encode(['message' => 'Всі поля (крім пароля) обов’язкові']);
        exit;
    }

    try {
        if ($newPassword) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $email, $hashedPassword, $id]);
        } else {
            $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $email, $id]);
        }

        echo json_encode(['message' => 'Користувача оновлено успішно.']);
    } catch (PDOException $e) {
        echo json_encode(['message' => 'Помилка при оновленні: ' . $e->getMessage()]);
    }

?>