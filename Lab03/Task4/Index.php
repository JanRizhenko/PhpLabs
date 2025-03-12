<?php
$text1 = "text1.txt";
$text2 = "text2.txt";

$words1 = file_exists($text1) ? explode(" ", file_get_contents($text1)) : [];
$words2 = file_exists($text2) ? explode(" ", file_get_contents($text2)) : [];

$words1 = mb_convert_encoding($words1, 'UTF-8', 'auto');
$words2 = mb_convert_encoding($words2, 'UTF-8', 'auto');

$words1 = preg_replace('/[^a-zA-Z\s]/', '', implode(" ", $words1)); // Join before preg_replace
$words2 = preg_replace('/[^a-zA-Z\s]/', '', implode(" ", $words2)); // Join before preg_replace

$words1 = explode(" ", $words1);
$words2 = explode(" ", $words2);

$uniqueInFirst = array_diff($words1, $words2);
file_put_contents("unique_in_first.txt", implode(" ", $uniqueInFirst));

$commonWords = array_intersect($words1, $words2);
file_put_contents("common_words.txt", implode(" ", $commonWords));

$wordsCount = array_merge(array_count_values($words1), array_count_values($words2));
$frequentWords = array_keys(array_filter($wordsCount, fn($count) => $count > 2));
file_put_contents("frequent_words.txt", implode(" ", $frequentWords));

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["filename"])) {
    $fileToDelete = $_POST["filename"];
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
        $message = "Файл '$fileToDelete' видалено.";
    } else {
        $message = "Файл '$fileToDelete' не знайдено.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 4</title>
</head>
<body>

<h2>Видалення файлу</h2>
<form method="post">
    <label for="filename">Введіть ім'я файлу:</label>
    <input type="text" name="filename" required>
    <input type="submit" value="Видалити">
</form>

<?php if (isset($message)) echo "<p>$message</p>"; ?>

</body>
</html>
