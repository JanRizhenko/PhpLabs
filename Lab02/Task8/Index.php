<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 8</title>
</head>
<body>

<?php

$users = [
    "Олександр" => 25,
    "Марія" => 30,
    "Максим" => 22,
    "Андрій" => 27,
    "Анастасія" => 24
];
function sortUsers(array &$array, string $parameter): void
{
    if ($parameter === 'age') {
        asort($array);
    } elseif ($parameter === 'name') {
        ksort($array);
    }
}
echo "Асоціативний масив: <br>";
foreach ($users as $name => $age) {
    echo "<p>$name: $age</p>";
}
sortUsers($users, 'age');
echo "Масив відсортований за віком: <br>";
foreach ($users as $name => $age)
    {
        echo "<p>$name: $age</p>";
    }

sortUsers($users, 'name');
echo "Масив відсортований за іменем: <br>";
foreach ($users as $name => $age)
    {
        echo "<p>$name: $age</p>";
    }

?>

</body>
</html>
