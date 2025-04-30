<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['author'], $_POST['content'])) {
    /** @var $conn */
    $author = $conn->real_escape_string($_POST['author']);
    $content = $conn->real_escape_string($_POST['content']);

    ob_start();
    echo nl2br(htmlspecialchars($content));
    $bufferedContent = ob_get_contents();
    ob_end_clean();

    $stmt = $conn->prepare("INSERT INTO posts (author, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $author, $bufferedContent);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Простий блог</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
            color: #333;
        }
        h2 { color: #444; }

        form {
            background: #fff;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 400px;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            box-sizing: border-box;
        }

        button {
            padding: 10px 15px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #0056b3;
        }

        .post {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .post small {
            color: #777;
        }
    </style>
</head>
<body>

<h2>Додати запис у блог</h2>
<form method="post">
    <input type="text" name="author" placeholder="Ваше ім’я" required>
    <textarea name="content" placeholder="Ваш запис" rows="5" required></textarea>
    <button type="submit">Додати запис</button>
</form>

<h2>Останні записи</h2>

<?php
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");

while ($row = $result->fetch_assoc()) {
    ob_start();
    ?>
    <div class="post">
        <strong><?= htmlspecialchars($row['author']) ?></strong><br>
        <small><?= $row['created_at'] ?></small>
        <div><?= $row['content'] ?></div>
    </div>
    <?php
    $postHtml = ob_get_contents();
    ob_end_clean();
    echo $postHtml;
}
?>

</body>
</html>
