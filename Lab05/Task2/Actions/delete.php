<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
        $config = include "../db_config.php";

        $pdo = new PDO("mysql:host={$config['db_server']};dbname={$config['db_name']};charset=utf8", "{$config['db_username']}", "{$config['db_password']}");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = $_POST['id'];

        $sql = "DELETE FROM tov WHERE id = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        header("Location: ../index.php");
        exit();
    } catch (PDOException $e)
    {
        die("Помилка: " . $e->getMessage());
    }
}