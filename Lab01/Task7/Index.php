<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task7</title>
    <style>
        body {
            box-sizing: border-box;
            background-color: black;
            position: relative;
            overflow: hidden;
        }
        .box {
            position: absolute;
            background-color: red;
        }
    </style>
</head>
<body>

<?php
function generateBoxes($boxes) {
    for ($i = 0; $i < $boxes; $i++) {
        $randomSize = rand(55, 105) .'px';
        $randomX = rand(0, 1920 - intval($randomSize)) .'px';
        $randomY = rand(0, 1080 - intval($randomSize)) .'px';
        echo "<span class='box' style='width: $randomSize; height: $randomSize; left: $randomX; top: $randomY;'></span>";
    }
}

generateBoxes(35);
?>

</body>
</html>