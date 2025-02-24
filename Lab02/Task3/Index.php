<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 3</title>
    <style>
        label, button, p
        {
            font-size: 26px;
        }
        textarea
        {
            font-size: 18px;
        }
    </style>
</head>
<body>
<form method="post">
    <label for="text">Введіть назви міст через пробіл:</label><br>
    <textarea name="text" id="text" rows="4" cols="50" required></textarea><br>

    <button type="submit">Отримати назву файлу</button>
</form>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $text = $_POST["text"];

        $fileInfo = pathinfo(trim($text));

        $fileName = $fileInfo['filename'];

        echo "<p>$fileName</p>";
    }
?>

</body>
</html>
