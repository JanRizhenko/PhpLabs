<?php
$product = $_GET['product'] ?? 'невідомий товар';
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Замовлення підтверджено</title>
</head>
<body>
<h1>Дякуємо за замовлення!</h1>
<p>Ви замовили: <strong><?= htmlspecialchars($product) ?></strong></p>
</body>
</html>
