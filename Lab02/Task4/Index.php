<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 4</title>
    <style>
        *{
            font-size: 28px;
        }
    </style>
</head>
<body>
<form method="post">
    <label for="number">Введіть довжину пароля:</label>
    <input type="number" step="1" name="number" id="number"><br>
    <button type="submit">Згенерувати пароль</button>
</form>
<?php
function isStrongPassword($password) {
    return strlen($password) >= 8 &&
        preg_match('/[A-Z]/', $password) &&
        preg_match('/[a-z]/', $password) &&
        preg_match('/[0-9]/', $password) &&
        preg_match('/[\W_]/', $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $length = $_POST['number'];

        $lowerCase = "abcdefghijklmnopqrstuvwxyz";
        $upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $digits = "0123456789";
        $specialChars = '!@#$%^&*()-_=+[]{};:,>.?';

        $password = '';

        $allChars = $lowerCase . $upperCase . $digits . $specialChars;
        for ($i = 0; $i < $length; $i++)
        {
            $password .= $allChars[random_int(0, strlen($allChars) - 1)];
        }
        str_shuffle($password);
        echo "<p>Згенерований пароль:</p><p> $password </p>";

        echo isStrongPassword($password) ? "Пароль міцний." : "Пароль занадто слабкий.";
    }
?>

</body>
</html>