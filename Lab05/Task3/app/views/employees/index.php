<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список працівників</title>
    <link rel="stylesheet" href="/Lab05/Task3/public/style.css?v=1.0">
</head>
<body>
<div class="container">
    <h2>Список працівників</h2>
    <div class="buttons">
        <a href="create/" class="btn">Додати працівника</a>
        <a href="statistics/" class="btn">Переглянути статистику</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Ім'я</th>
            <th>Посада</th>
            <th>Зарплата</th>
            <th>Дії</th>
        </tr>
        <?php foreach ($employees as $emp): ?>
            <tr>
                <td><?= $emp['id'] ?></td>
                <td><?= $emp['name'] ?></td>
                <td><?= $emp['position'] ?></td>
                <td><?= $emp['salary'] ?></td>
                <td>
                    <a href="update/<?= $emp['id'] ?>" class="btn-edit">Редагувати</a>
                    <a href="delete/<?= $emp['id'] ?>" class="btn-delete" onclick="return confirm('Видалити?')">Видалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
