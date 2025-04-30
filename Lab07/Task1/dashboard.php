<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

require 'messages.php';
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Профіль користувача</title>
</head>
<body>
<h1>Особиста сторінка</h1>
<p>Вітаємо, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>

<h3>Повідомлення:</h3>
<div style="background: #eee; padding: 10px; border-radius: 5px;">
    <?php foreach ($_SESSION['messages'] ?? [] as $msg): ?>
        <p><?php echo htmlspecialchars($msg); ?></p>
    <?php endforeach; ?>
</div>
</body>
</html>
?>