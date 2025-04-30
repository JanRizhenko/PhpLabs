<?php
$host = 'localhost';
$user = 'homeuser';
$pass = '';
$db   = 'blog_buffer';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}
?>