<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task5</title>
    <style>
        *{
            font-size: 40px;
        }
    </style>
</head>
<body>

<?php
$number = rand(100, 999);

$hundreds = floor($number / 100);
$tens = floor(($number % 100) / 10);
$ones = $number % 10;

$sum = $hundreds + $tens + $ones;

$reversedNumber = strrev((string)$number);

$numberString = (string)$number;

$digits = str_split($numberString);

rsort($digits);

$biggestNumber = (int)implode('',$digits);

echo "Число: $number<br>";
echo "Сума цифр: $sum<br>";
echo "Обернене число: $reversedNumber <br>";
echo "Найбільше можливе число: $biggestNumber";
?>

</body>
</html>