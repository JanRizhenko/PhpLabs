<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
function generateColorfulTable($rows, $cols) {
    echo "<table style='border-collapse: collapse; border: 1px solid black;'>";

    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $cols; $j++) {
            $randomColor = '#' . dechex(mt_rand(0, 0xFFFFFF));
            echo "<td style='background-color: $randomColor; width: 50px; height: 50px;'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

generateColorfulTable(12, 7);
?>


</body>
</html>