<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task3</title>
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
    $month = 7;
    if ($month == 12 || $month == 1 || $month == 2)
        {
            echo("It's winter outside!");
        }
    else if ($month == 3 || $month == 4 || $month == 5 )
    {
        echo("It's spring outside!");
    }
    else if ($month == 6 || $month == 7 || $month == 8 )
    {
        echo("It's summer outside!");
    }
    else if ($month == 9 || $month == 10 || $month == 11 )
    {
        echo("It's autumn outside!");
    }
    else
    {
        echo("Number should be less than 12 and greater than 1");
    }
?>

</body>
</html>