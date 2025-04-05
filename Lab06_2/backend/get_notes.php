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

    $stmt = $pdo->query("SELECT id, title, content, created_at FROM notes");
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($notes);
?>