<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["login"] = $_POST['login'];
    $_SESSION["password"] = $_POST['password'];

    if ($_POST["login"] == "Admin" && $_POST["password"] == "password") {
        $_SESSION["admin"] = true;
        $_SESSION["hello"] = "Добрий день, Admin!";
        unset($_SESSION["error"]);
    } else {
        unset($_SESSION["hello"]);
        $_SESSION["admin"] = false;
        $_SESSION["error"] = "Помилка авторизації!";

    }

    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2</title>
    <style>
        *
        {
            font-size: 26px;
        }
        form
        {
            display: flex;
            flex-direction: column;
            row-gap: 15px;
        }
        input
        {
            width: 500px;
        }
    </style>
</head>
<body>

<p>
    <?php
    if (isset($_SESSION["hello"])) {
        echo $_SESSION["hello"];
    }

    if (isset($_SESSION["error"])) {
        echo $_SESSION["error"];
        unset($_SESSION["error"]);
    }
    ?>
</p>

<form method="post" action="">
    <label for="login">Логін:</label>
    <input name="login" type="text">
    <label for="password">Пароль:</label>
    <input name="password" type="password">
    <input type="submit" value="Авторизація">
</form>

</body>
</html>
