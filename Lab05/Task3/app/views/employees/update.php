<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагувати працівника</title>
    <link rel="stylesheet" href="/Lab05/Task3/public/style.css?v=1.0">
</head>
<body>
<div class="container">
    <h2>Редагувати працівника</h2>
    <form action="/Lab05/Task3/update/<?= $employee['id'] ?>" method="post">
        <input type="text" name="name" value="<?= $employee['name'] ?>" required>
        <input type="text" name="position" value="<?= $employee['position'] ?>" required>
        <input type="number" name="salary" value="<?= $employee['salary'] ?>" required>
        <button type="submit" class="btn">Оновити</button>
    </form>
    <a href="/Lab05/Task3" class="btn-back">Назад</a>
</div>
</body>
</html>
