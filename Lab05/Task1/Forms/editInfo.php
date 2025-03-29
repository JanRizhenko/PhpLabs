<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task1</title>
    <style>
        *
        {
            font-size: 28px;
        }
    </style>
</head>
<body>
<h2>Update User Info</h2>
<form action="../Actions/edit.php" method="POST">

    <label for="username">New Username:</label>
    <input type="text" name="username" required> <br><br>

    <label for="phoneNumber">New Phone Number:</label>
    <input type="text" name="phoneNumber" required> <br><br>

    <label for="password">New Password (leave blank to keep current):</label>
    <input type="password" name="password"> <br><br>

    <button type="submit">Submit</button>
</form>
</body>
</html>
