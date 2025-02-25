<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 7</title>
</head>
<body>

<?php
    function createArray()
    {
        $array = [];
        for ($i = 0; $i <= random_int(3,7); $i++)
        {
            $array[$i] = random_int(10,20);
        }
        return $array;
    }
    function mainFunction($array1, $array2)
    {
        $mergedArray = array_merge($array1, $array2);
        $sortedArray = array_unique($mergedArray);
        sort($sortedArray);
        return $sortedArray;
    }


    $array1 = createArray();
    echo "Згенерований масив 1: <br>";
    foreach ($array1 as $item)
    {
        echo "$item ";
    }
    echo "<br>";
    $array2 = createArray();
    echo "Згенерований масив 2: <br>";
    foreach ($array2 as $item)
    {
        echo "$item ";
    }
    echo "<br>";
    $sortedArray = mainFunction($array1, $array2);
    echo "Поєднаний та відсортований масив: <br>";
    foreach ($sortedArray as $item)
    {
        echo "$item ";
    }
?>

</body>
</html>