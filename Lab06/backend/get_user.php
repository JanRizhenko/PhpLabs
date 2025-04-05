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
        echo json_encode(['message' => 'Помилка: ' . $e->getMessage()]);
        exit;
    }

    $id = $_GET['id'] ?? '';
    if (!$id) {
        echo json_encode(['message' => 'ID не знайдено.']);
        exit;
    }

    $stmt = $pdo->prepare("SELECT id, name, email FROM users WHERE id = ?");
    $stmt->execute([$id]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        echo json_encode($user);
    } else {
        echo json_encode(['message' => 'Користувача не знайдено']);
    }
?>