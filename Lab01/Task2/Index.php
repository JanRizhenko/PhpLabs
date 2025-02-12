<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Конвертер валют</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        input, select, button {
            margin: 10px;
            padding: 8px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<h2>Конвертер гривні ↔ долар</h2>

<?php
$amount = "";
$conversion = "uah_to_usd";
$resultMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exchangeRate = 41.65;
    $amount = $_POST['amount'] ?? '';
    $conversion = $_POST['conversion'] ?? 'uah_to_usd';

    if ($amount <= 0) {
        $resultMessage = "<p style='color:red;'>Помилка: сума повинна бути більше 0!</p>";
    } else {
        if ($conversion == "uah_to_usd") {
            $result = $amount / $exchangeRate;
            $resultMessage = "<p>$amount грн. можна обміняти на " . round($result, 2) . " доларів</p>";
        } else {
            $result = $amount * $exchangeRate;
            $resultMessage = "<p>$amount USD можна обміняти на " . round($result, 2) . " грн.</p>";
        }
    }
}
?>

<form method="POST">
    <label for="amount">Сума:</label>
    <input type="number" id="amount" name="amount" min="0" step="0.01" value="<?php echo htmlspecialchars($amount); ?>" required>

    <label for="conversion">Конвертувати:</label>
    <select name="conversion" id="conversion">
        <option value="uah_to_usd" <?php if ($conversion == "uah_to_usd") echo "selected"; ?>>UAH → USD</option>
        <option value="usd_to_uah" <?php if ($conversion == "usd_to_uah") echo "selected"; ?>>USD → UAH</option>
    </select>

    <button type="submit">Конвертувати</button>
</form>

<?php echo $resultMessage; ?>
</body>
</html>
