<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 5</title>
    <style>
        *{
            font-size: 26px;
        }
    </style>
</head>
<body>

<?php
function find_duplications($array)
{
    $duplicates = [];

    foreach ($array as $index => $value) {
        $duplicates[$value][] = $index;
    }

    foreach ($duplicates as $value => $indexes) {
        if (count($indexes) > 1) {
            echo "Дублікат числа <strong>$value</strong> знайдено, індекси: " . implode(", ", $indexes) . "<br><br>";
        }
    }
}

$array = [];
for ($i = 0; $i < 10; $i++) {
    $array[$i] = random_int(1, 15);
}

echo "Згенерований масив: " . implode(", ", $array) . "<br><br>";

find_duplications($array);
?>

</body>
</html>