<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task4</title>

    <style>
        *
        {
            margin-top: 50px;
            text-align: center;
            font-size: 26px;
        }
    </style>
</head>
<body>

<?php
$char = 'i';

$char = strtolower($char);

switch ($char) {
    case 'a':
    case 'e':
    case 'i':
    case 'o':
    case 'u':
    case 'y':
        echo "Символ '$char' є голосним.";
        break;
    default:
        if (ctype_alpha($char)) {
            echo "Символ '$char' є приголосним.";
        } else {
            echo "Введений символ '$char' не є літерою.";
        }
        break;
}
?>

</body>
</html>