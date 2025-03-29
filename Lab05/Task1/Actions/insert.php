<?php

$config = include '../db_config.php';

$pdo = null;

try {
    $dsn = "mysql:host={$config['db_server']};
        dbname={$config['db_name']};
        charset=utf8";

    $pdo = new PDO($dsn,
        $config['db_username'],
        $config['db_password']);


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $phoneNumber = trim($_POST['phoneNumber']);
    }

    if (empty($username) || empty($password) || empty($phoneNumber)) {
        die("All fields are required.");
    }

    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        die("Invalid username format. Only letters, numbers, and underscores allowed.");
    }

    if (!preg_match("/^[0-9]{9,15}$/", $phoneNumber)) {
        die("Invalid phone number. Only 9-15 digits allowed.");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $checkSql = "SELECT * FROM users WHERE username = :username OR phoneNumber = :phoneNumber";
    $checkStmt = $pdo->prepare($checkSql);
    $checkStmt->execute([
        ':username' => $username,
        ':phoneNumber' => $phoneNumber
    ]);

    if ($checkStmt->rowCount() > 0) {
        echo "Username or phone number already exists. You will be redirected back to the registration page.";

        echo '<meta http-equiv="refresh" content="2;url=../index.php">';
        exit();
    }

    $sql = "INSERT INTO users (username, password, phoneNumber) VALUES (:username, :password, :phoneNumber)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':username' => $username,
        ':password' => $hashed_password,
        ':phoneNumber' => $phoneNumber
    ]);


    echo "User registered successfully! You will be redirected shortly.";

    echo '<meta http-equiv="refresh" content="2;url=../index.php">';
    } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "<br>";
}


?>