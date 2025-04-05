<?php

header('Content-Type: application/json');

    $host = 'localhost';
    $dbname = 'notesdb';
    $username = 'homeuser';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
    catch (PDOException $e)
    {
        echo json_encode(['message' => 'Помилка підключення: ' . $e->getMessage()]);
        exit;
    }

    $data = json_decode(file_get_contents('php://input'), true);

    if (!$data) {
        echo json_encode(['message' => 'Некоректний формат даних']);
        exit;
    }

    $title = trim($data['title'] ?? '');
    $content = trim($data['content'] ?? '');

    if (!$title || !$content) {
        echo json_encode(['message' => 'Всі поля обов’язкові']);
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO notes (title, content) VALUES (?, ?)");
    $stmt->execute([$title, $content]);

    echo json_encode(['message' => 'Нотатку додано успішно.']);

?>