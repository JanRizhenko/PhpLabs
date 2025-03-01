<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if (empty($_POST['login'])) {
        $errors[] = "Логін є обов’язковим!";
    } else {
        $login = htmlspecialchars(trim($_POST['login']));
    }

    if (empty($_POST['password']) || empty($_POST['confirm_password']))
        {
            $errors[] = "Пароль є обов’язковим!";
        }
    elseif ($_POST['password'] !== $_POST['confirm_password'])
        {
            $errors[] = "Паролі не співпадають!";
        }
    else
        {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

    if (empty($_POST['gender']))
        {
            $errors[] = "Будь ласка, оберіть стать!";
        }
    else
        {
            $gender = $_POST['gender'];
        }

    if (empty($_POST['city'])) {
        $errors[] = "Будь ласка, виберіть місто!";
    } else {
        $city = $_POST['city'];
    }

    $games = $_POST['games'] ?? [];

    $about = !empty($_POST['about']) ? nl2br(htmlspecialchars(trim($_POST['about']))) : "Не вказано";

    if (!empty($_FILES['photo']['name'])) {
        $allowed_extensions = ["jpg", "jpeg", "png", "gif", "webp"];
        $file_ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

        if (!in_array(strtolower($file_ext), $allowed_extensions))
            {
                $errors[] = "Файл повинен бути зображенням (jpg, jpeg, png, gif, webp)!";
            }
        elseif ($_FILES['photo']['size'] > 12 * 1024 * 1024)
            {
                $errors[] = "Файл занадто великий (максимум 12MB)!";
            }
        else {
            $upload_dir = "uploads/";
            if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

            $file_path = $upload_dir . time() . "_" . basename($_FILES['photo']['name']);
            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $file_path)) {
                $errors[] = "Помилка завантаження файлу! Код помилки: " . $_FILES['photo']['error'];
            }
        }
    } else {
        $file_path = "Не завантажено";
    }

    if (!empty($errors)) {
        echo "<h3>Помилки:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li style='color:red;'>$error</li>";
        }
    } else {
        echo "<h2>Реєстрація успішна!</h2>";
        echo "<p><strong>Логін:</strong> $login</p>";
        echo "<p><strong>Стать:</strong> $gender</p>";
        echo "<p><strong>Місто:</strong> $city</p>";
        echo "<p><strong>Улюблені ігри:</strong> " . (!empty($games) ? implode(", ", $games) : "Не вибрано") . "</p>";
        echo "<p><strong>Про себе:</strong> $about</p>";
        echo "<p><strong>Фотографія:</strong> " . ($file_path != "Не завантажено" ? "<img src='$file_path' width='150'>" : "Не завантажено") . "</p>";
    }

    echo "</ul><a href='Index.php'>Повернутися назад</a>";
}
?>