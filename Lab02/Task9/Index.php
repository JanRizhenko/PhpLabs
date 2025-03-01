<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['form_data'] = $_POST;

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        $file_name = basename($_FILES['photo']['name']);
        $target_file = $upload_dir . $file_name;

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            $_SESSION['form_data']['photo'] = $file_name;
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        if (isset($_FILES['photo'])) {
            echo "File upload error: " . $_FILES['photo']['error'];
        }
    }
}

$available_langs = ['ukr', 'eng', 'pol'];

if (isset($_GET['lang']) && in_array($_GET['lang'], $available_langs)) {
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time() + (180 * 24 * 60 * 60), "/");
    $_SESSION['lang'] = $lang;
} elseif (isset($_COOKIE['lang']) && in_array($_COOKIE['lang'], $available_langs)) {
    $lang = $_COOKIE['lang'];
} else {
    $lang = 'ukr';
}

$language_file = "lang/{$lang}.php";
$languages = file_exists($language_file) ? include $language_file : [];

$form_data = $_SESSION['form_data'] ?? [];
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 9</title>
    <style>
        img {
            height: 100px;
            width: 150px;
            cursor: pointer;
        }
        body { font-size: 20px; background: lightcoral }
        .error { color: red; }
    </style>
</head>
<body>

<h2>Форма реєстрації</h2>

<form action="submit.php" method="post" enctype="multipart/form-data">
    <label for="login">Логін:</label>
    <input type="text" id="login" name="login" value="<?= htmlspecialchars($form_data['login'] ?? '') ?>" required><br><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="confirm_password">Пароль (ще раз):</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>

    <label>Стать:</label>
    <input type="radio" id="male" name="gender" value="чоловік" <?= (isset($form_data['gender']) && $form_data['gender'] === 'чоловік') ? 'checked' : '' ?> required>
    <label for="male">чоловік</label>
    <input type="radio" id="female" name="gender" value="жінка" <?= (isset($form_data['gender']) && $form_data['gender'] === 'жінка') ? 'checked' : '' ?>>
    <label for="female">жінка</label><br><br>

    <label for="city">Місто:</label>
    <select id="city" name="city" required>
        <?php
        $cities = ["Житомир", "Київ", "Львів", "Одеса"];
        foreach ($cities as $city) {
            $selected = (isset($form_data['city']) && $form_data['city'] === $city) ? 'selected' : '';
            echo "<option value=\"$city\" $selected>$city</option>";
        }
        ?>
    </select><br><br>

    <label>Улюблені ігри:</label><br>
    <?php
    $games = [
        "футбол" => "football",
        "баскетбол" => "basketball",
        "волейбол" => "volleyball",
        "шахи" => "chess",
        "World of Tanks" => "wot"
    ];
    $selected_games = isset($form_data['games']) && is_array($form_data['games']) ? $form_data['games'] : [];
    foreach ($games as $game_name => $game_id) {
        $checked = in_array($game_name, $selected_games) ? 'checked' : '';
        echo "<input type='checkbox' id='$game_id' name='games[]' value='$game_name' $checked>
              <label for='$game_id'>$game_name</label><br>";
    }
    ?>
    <br>

    <label for="about">Про себе:</label><br>
    <textarea id="about" name="about" rows="4" cols="40"><?= htmlspecialchars($form_data['about'] ?? '') ?></textarea><br><br>

    <label for="photo">Фотографія:</label>
    <input type="file" id="photo" name="photo" accept="image/*"><br>
    <br>

    <button type="submit">Зареєструватися</button>
</form>

<p>
    <a href="?lang=ukr"><img src="flags/Flag_of_Ukraine.svg.webp" alt="Українська"></a>
    <a href="?lang=eng"><img src="flags/Flag_of_the_United_States.png" alt="English"></a>
    <a href="?lang=pol"><img src="flags/Flag_of_Poland.svg.webp" alt="Polski"></a>
</p>

<p><?= $languages['selected'] ?? 'Мова не знайдена' ?></p>

</body>
</html>
