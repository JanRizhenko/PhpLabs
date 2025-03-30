<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Статистика працівників</title>
    <link rel="stylesheet" href="/Lab05/Task3/public/style.css?v=1.0">
</head>
<body>
<div class="container">
    <h2>Статистика працівників</h2>

    <h3>Загальна середня зарплата</h3>
    <p><strong><?php echo number_format($stats['overall_avg_salary'], 2); ?> грн</strong></p>

    <h3>Кількість працівників за посадами</h3>
    <table>
        <tr>
            <th>Посада</th>
            <th>Кількість працівників</th>
        </tr>
        <?php foreach ($stats['position_counts'] as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['position']); ?></td>
                <td><?php echo $row['count']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>Середня зарплата за посадами</h3>
    <table>
        <tr>
            <th>Посада</th>
            <th>Середня зарплата (грн)</th>
        </tr>
        <?php foreach ($stats['position_avg_salaries'] as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['position']); ?></td>
                <td><?php echo number_format($row['avg_salary'], 2); ?> грн</td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="/Lab05/Task3" class="btn-back">Назад до списку працівників</a>
</div>
</body>
</html>
