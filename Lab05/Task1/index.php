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

    <?php if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true): ?>
        <h2>Login In</h2>
        <form action="Actions/login.php" method="POST">
            <input type="hidden" name="userId" value="<?php echo $_SESSION['user_id'] ?? ''; ?>">

            <label for="phoneNumber">Phone Number:</label>
            <input type="text" name="phoneNumber" required> <br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required> <br><br>

            <button type="submit">Submit</button>
            <br><br>
            <label>First time here? - </label>
            <a href="Forms/registration.php">Registration</a>
        </form>
    <?php else:
        echo "You are logged in as a " . $_SESSION['user_name'] . '. ' .'<a href="Actions/logout.php">Logout' . "<br>";
        echo '<a href="Forms/editInfo.php">Edit user info</a> <br>';
        echo '<a href="Actions/delete.php">Delete user</a>';
        ?>


    <?php endif; ?>

</body>
</html>