<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    /** @var $conn */
    $username = $conn->real_escape_string(trim($_POST['username']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        header("Location: profile.php?user=" . urlencode($username));
        exit;
    } else {
        $error = "Користувач вже існує або сталася помилка.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 40px;
        }

        form {
            background: #fff;
            padding: 20px;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 1px 5px rgba(0,0,0,0.1);
        }

        input[type="text"], input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            background: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h2>Реєстрація нового користувача</h2>
<form method="post">
    <input type="text" name="username" placeholder="Ім’я користувача" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit">Зареєструватись</button>
</form>

<?php if (!empty($error)): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

</body>
</html>
