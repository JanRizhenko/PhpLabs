<?php
    ob_start();
    require 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'], $_POST['link'])) {
        /** @var $conn */
        $title = $conn->real_escape_string($_POST['title']);
        $link = $conn->real_escape_string($_POST['link']);
        $conn->query("INSERT INTO menu (title, link) VALUES ('$title', '$link')");
        ob_clean();
    }

    if (isset($_GET['delete'])) {
        $id = (int)$_GET['delete'];
        $conn->query("DELETE FROM menu WHERE id = $id");
        ob_clean();
    }

    $result = $conn->query("SELECT * FROM menu");

    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>
            <a href='{$row['link']}'>{$row['title']}</a>  
            <a href='?delete={$row['id']}' style='color:red; margin-left:10px;'>Видалити</a>
    </li>";
    }
    echo "</ul>";
?>