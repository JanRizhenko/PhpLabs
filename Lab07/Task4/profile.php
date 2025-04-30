<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$username = isset($_GET['user']) ? htmlspecialchars($_GET['user']) : 'Гість';
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Особиста сторінка</title>
</head>
<body>
<h1>Вітаємо, <?= $username ?>!</h1>
<p>Це ваша персональна сторінка.</p>
</body>
</html>