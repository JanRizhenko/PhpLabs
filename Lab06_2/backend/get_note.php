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
} catch (PDOException $e) {
    echo json_encode(['message' => 'Помилка: ' . $e->getMessage()]);
    exit;
}

$id = $_GET['id'] ?? '';

if (!$id) {
    echo json_encode(['success' => false, 'message' => 'ID не знайдено.']);
    exit;
}

$stmt = $pdo->prepare("SELECT title, content FROM notes WHERE id = ?");
$stmt->execute([$id]);

$note = $stmt->fetch(PDO::FETCH_ASSOC);

if ($note) {
    echo json_encode(['success' => true, 'note' => $note]);
} else {
    echo json_encode(['success' => false, 'message' => 'Нотатку не знайдено']);
}
?>