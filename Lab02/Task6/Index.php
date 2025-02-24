<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 6</title>
    <style>
        *
        {
            font-size: 26px;
        }
    </style>
</head>
<form method="post">
    <button type="submit">Згенерувати ім'я</button>
</form>
<body>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $name = "";

        $syllables = ["пу","ля","ла","му","па","ба","ка","до","та","ло","за","не","бо","ма"];

        for($i = 0; $i < random_int(2,3); $i++)
            {
                $name .= $syllables[array_rand($syllables)];
            }
        echo "<p>Згенероване імя: </p>" . mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
    }
?>

</body>
</html>