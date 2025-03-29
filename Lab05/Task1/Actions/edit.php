<?php
session_start();

$config = include '../db_config.php';

$conn = null;

try {

    $dsn = "mysql:host={$config['db_server']};
        dbname={$config['db_name']};
        charset=utf8";

    $pdo = new PDO($dsn,
        $config['db_username'],
        $config['db_password']);


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $userId = $_POST['userId'] ?? $_SESSION['user_id'] ?? 0;
        $userId = (int) $userId;

        if ($userId <= 0) {
            die("Invalid user ID.");
        }

        $newUsername = trim($_POST['username']);
        $newPhone = trim($_POST['phoneNumber']);
        $newPassword = trim($_POST['password']);

        if (!preg_match("/^[0-9]{9,15}$/", $newPhone)) {
            die("Invalid phone number. Only 9-15 digits allowed.");
        }

        if (!preg_match("/^[a-zA-Z0-9_]+$/", $newUsername)) {
            die("Invalid username format. Only letters, numbers, and underscores allowed.");
        }

        if (empty($newUsername) || empty($newPhone)) {
            die("Username and Phone Number are required.");
        }

        $checkSql = "SELECT id FROM users WHERE phoneNumber = :phoneNumber AND id != :id";
        $stmt = $pdo->prepare($checkSql);
        $stmt->execute([':phoneNumber' => $newPhone, ':id' => $userId]);

        if ($stmt->fetch()) {
            die("Phone number is already in use.");
        }

        $sql = "UPDATE users SET username = :username, phoneNumber = :phoneNumber";

        $params = [
            ':username' => $newUsername,
            ':phoneNumber' => $newPhone,
            ':id' => $userId
        ];

        if (!empty($newPassword)) {
            $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
            $sql .= ", password = :password";
            $params[':password'] = $hashed_password;
        }

        $sql .= " WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        $_SESSION['user_name'] = $newUsername;

        echo "User info edited successfully! You will be redirected shortly.";
        echo '<meta http-equiv="refresh" content="2;url=../index.php">';
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}
?>