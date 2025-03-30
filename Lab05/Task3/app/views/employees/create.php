<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати працівника</title>
    <link rel="stylesheet" href="/Lab05/Task3/public/style.css?v=1.0">
</head>
<body>
<div class="container">
    <h2>Додати працівника</h2>
    <form action="/Lab05/Task3/create" method="post">
        <input type="text" name="name" placeholder="Ім'я" required>
        <input type="text" name="position" placeholder="Посада" required>
        <input type="number" name="salary" placeholder="Зарплата" required>
        <button type="submit" class="btn">Додати</button>
    </form>
    <a href="/Lab05/Task3" class="btn-back">Назад</a>
</div>
</body>
</html>
