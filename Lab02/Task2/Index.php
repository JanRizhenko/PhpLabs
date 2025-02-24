<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2</title>
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

    <button type="submit">Відсортувати міста за алфавітом</button>
</form>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];

        $cities = explode(" ", $text);
        sort($cities);
        foreach ($cities as $city) {
            $city = mb_convert_case($city, MB_CASE_TITLE, 'UTF-8');
            echo "<p> $city</p>";
        }
    }
?>

</body>
</html>