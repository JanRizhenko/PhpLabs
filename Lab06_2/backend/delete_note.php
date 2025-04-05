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

    $id = $_GET['id'] ?? null;
    if (!$id || !is_numeric($id)) {
        echo json_encode(['success' => false, 'message' => 'ID нотатки не передано або некоректне']);
        exit;
    }

    $stmt = $pdo->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->execute([$id]);

    echo json_encode(['success' => true, 'message' => 'Нотатку успішно видалено']);
?>