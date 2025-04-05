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

    if (!$id) {
        echo json_encode(['message' => 'ID не знайдено.']);
        exit;
    }

    try {
            $sql = "DELETE FROM users WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);

        echo json_encode(['message' => 'Користувача видалено успішно.']);
    }
    catch (PDOException $e) {
        echo json_encode(['message' => 'Помилка при видаленні: ' . $e->getMessage()]);
    }
?>