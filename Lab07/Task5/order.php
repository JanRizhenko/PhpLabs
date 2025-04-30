<?php
$product = $_GET['product'] ?? 'Невідомий товар';
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Оформлення замовлення</title>
</head>
<body>
<h1>Оформлення замовлення</h1>
<form action="process_order.php" method="post">
    <p>Товар: <strong><?= htmlspecialchars($product) ?></strong></p>
    <input type="hidden" name="product" value="<?= htmlspecialchars($product) ?>">
    Ваше ім'я: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    <button type="submit">Замовити</button>
</form>
</body>
</html>
