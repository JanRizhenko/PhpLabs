<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <style>
        *
        {
            font-size: 28px;
        }
    </style>
</head>
<body>

    <h2>Register User</h2>

    <form action="../Actions/insert.php" method="POST">
        <label for="username">Name:</label>
        <input type="text" name="username" required> <br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required> <br><br>

        <label for="phoneNumber">Phone Number:</label>
        <input type="text" name="phoneNumber" required> <br><br>

        <button type="submit">Submit</button>
        <br><br>
        <label class="link">Already have an account? - </label>
        <a class="link" href="../index.php">Authorization</a>
    </form>

</body>
</html>