<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    http_response_code(303);
    header("Location: confirmation.php?product=" . urlencode($product));
    exit;
}
?>
