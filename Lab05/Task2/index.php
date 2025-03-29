<?php
try {
    $config = include("db_config.php");

    $pdo = new PDO("mysql:host={$config['db_server']};dbname={$config['db_name']};charset=utf8", "{$config['db_username']}", "{$config['db_password']}");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM tov";
    $result = $pdo->query($sql);

    $pdo->exec($sql);
} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список товарів</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .container { width: 80%; margin: auto; text-align: center; }
        .buttons { margin-top: 20px; }
        input, button { padding: 10px; margin: 5px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Список товарів</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Назва</th>
            <th>Опис</th>
            <th>Ціна (грн)</th>
            <th>Кількість</th>
        </tr>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['quantity']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <div class="buttons">
        <button onclick="window.location.href='Actions/add.php'">Додати запис</button>
        <form action="Actions/delete.php" method="post" style="display:inline;">
            <input type="number" name="id" placeholder="№ запису" required>
            <button type="submit">Вилучити запис</button>
        </form>
    </div>
</div>
</body>
</html>
