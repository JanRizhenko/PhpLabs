<?php
$filename = "comments.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $comment = trim($_POST["comment"]);

    if (!empty($name) && !empty($comment)) {
        $entry = $name . " | " . $comment . PHP_EOL;
        file_put_contents($filename, $entry, FILE_APPEND | LOCK_EX);
    }
}
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Коментарі</title>
    <style>
        * { font-size: 22px; }
        form { display: flex; flex-direction: column; row-gap: 10px; width: 400px; }
        input, textarea { width: 100%; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>

<h2>Залиште ваш коментар</h2>
<form method="post" action="">
    <label for="name">Ім'я:</label>
    <input type="text" name="name" required>

    <label for="comment">Коментар:</label>
    <textarea name="comment" rows="3" required></textarea>

    <input type="submit" value="Надіслати">
</form>

<h2>Всі коментарі</h2>
<table>
    <tr>
        <th>Ім'я</th>
        <th>Коментар</th>
    </tr>
    <?php
    if (file_exists($filename)) {
        $file = fopen($filename, "r");
        while (($line = fgets($file)) !== false) {
            $parts = explode(" | ", $line);
            if (count($parts) == 2) {
                echo "<tr><td>" . htmlspecialchars($parts[0]) . "</td><td>" . htmlspecialchars($parts[1]) . "</td></tr>";
            }
        }
        fclose($file);
    }
    ?>
</table>

</body>
</html>
