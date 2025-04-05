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

    if (!$data)
    {
        echo json_encode(['message' => 'Некоректний формат даних']);
        exit;
    }

    $id = $data["id"] ?? null;
    $title = $data["title"] ?? '';
    $content = $data["content"] ?? '';

    if (!$id || !$title || !$content) {
        echo json_encode(['success' => false, 'message' => 'Всі поля обов’язкові']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ?");
        $stmt->execute([$title, $content, $id]);

        echo json_encode(['success' => true, 'message' => 'Нотатку оновлено успішно.']);
    }
        catch (PDOException $e) {
        echo json_encode(['success' => true, 'message' => 'Помилка при оновленні: ' . $e->getMessage()]);
    }
?>