<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 10</title>
    <style>
        table {
            border-collapse: collapse;
            width: 600px;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: yellow;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <label for="x">Введіть X:</label>
    <input type="number" name="x" id="x" step="any" required>
    <label for="y">Введіть Y:</label>
    <input type="number" name="y" id="y" step="any" required>
    <button type="submit">Обчислити</button>
</form>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        if (isset($_POST["x"]) && isset($_POST["y"]))
        {
            $x = $_POST["x"];
            $y = $_POST["y"];
            include ("Functions/func.php");
            func($x, $y);
        }
    }
?>

</body>
</html>