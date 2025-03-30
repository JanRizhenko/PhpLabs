<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        try {
            $config = include "../db_config.php";

            $pdo = new PDO("mysql:host={$config['db_server']};dbname={$config['db_name']};charset=utf8", "{$config['db_username']}", "{$config['db_password']}");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];

            $sql = "INSERT INTO tov (name, description, price, quantity) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $description, $price, $quantity]);

            header("Location: ../index.php");
            exit;
        }
        catch (PDOException $e)
        {
            die("Помилка: " . $e->getMessage());
        }
    }
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати товар</title>
    <style>
        input
        {
            font-size: 24px;
            padding: 10px;
            margin: 5px;
        }
    </style>
</head>
<body>
<h2>Додати товар</h2>
<form method="post">
    <input type="text" name="name" placeholder="Назва" required><br>
    <input type="text" name="description" placeholder="Опис" required><br>
    <input type="number" step="0.01" name="price" placeholder="Ціна" required><br>
    <input type="number" name="quantity" placeholder="Кількість" required><br>
    <input value="Додати" type="submit"></input>
</form>
<br>
<a href="../index.php">Назад</a>
</body>
</html>
