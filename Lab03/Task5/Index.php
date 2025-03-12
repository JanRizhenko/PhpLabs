<?php
$file = "text.txt";
$sorted_words = "sorted_words.txt";

if(file_exists($file))
{
    $content = file_get_contents($file);

    $content = mb_convert_encoding($content, 'UTF-8', 'auto');
    $content = preg_replace('/[^a-zA-Z\s]/', '', $content);

    $words = explode(" ", $content);

    $words = array_filter($words);

    echo "Слова до сортування: <br>";
    echo implode("\n", $words);

    sort($words, SORT_STRING);

    file_put_contents($sorted_words, implode("\n", $words));

    echo "<br><br>Слова після сортування: <br>";
    echo implode("\n", $words);

    echo "<br><br>Слова відсортовані та збережені у $sorted_words.";
} else {
    echo "Файл $file не знайдено.";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 5</title>
</head>
<body>

</body>
</html>
