<?php
$servername = "localhost";
$username = "homeuser";
$password = "";
$database = "auth_system";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Помилка з'єднання з базою даних: " . $conn->connect_error);
}
?>