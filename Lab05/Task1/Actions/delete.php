<?php
    session_start();

    $config = include "../db_config.php";

    try {
        $dsn = "mysql:host={$config['db_server']};dbname={$config['db_name']};charset=utf8"; // Correct charset
        $pdo = new PDO($dsn, $config['db_username'], $config['db_password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable exceptions for PDO

        if (isset($_SESSION['user_id'])) {
            $userId = (int) $_SESSION['user_id'];

            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            $stmt->execute([':id' => $userId]);

            session_unset();
            session_destroy();

            echo "User deleted successfully! You will be redirected shortly.";
            echo '<meta http-equiv="refresh" content="2;url=../index.php">';
        } else {
            echo "No user ID provided.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>