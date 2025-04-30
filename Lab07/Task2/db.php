<?php
    $host = 'localhost';
    $db = 'dynamic_menu';
    $user = 'homeuser';
    $pass = '';


    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Підключення не вдалося: " . $conn->connect_error);
    }
?>