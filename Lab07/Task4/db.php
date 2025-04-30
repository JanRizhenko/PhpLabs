<?php
$host = 'localhost';
$user = 'homeuser';
$pass = '';
$db   = 'user_registration';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}
?>