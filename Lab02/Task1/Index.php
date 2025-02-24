<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 1</title>
</head>
<body>
<form method="post">
    <label for="text">Текст:</label><br>
    <textarea name="text" id="text" rows="4" cols="50" required></textarea><br><br>

    <label for="find">Знайти:</label><br>
    <input type="text" name="find" id="find" required><br><br>

    <label for="replace">Замінити на:</label><br>
    <input type="text" name="replace" id="replace" required><br><br>

    <button type="submit">Виконати заміну</button>
</form>

<h2>Результат:</h2>
<div style="border: 1px solid #000; padding: 10px;">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];
        $find = $_POST["find"];
        $replace = $_POST["replace"];

        $result = str_replace($find, $replace, $text);

        echo nl2br(htmlspecialchars($result));
    }
    ?>
</div>
</body>
</html>