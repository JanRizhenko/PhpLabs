<?php
    session_start();

    $config = include "../db_config.php";

    $conn = null;

    try {
        $dsn = "mysql:host={$config['db_server']};
        dbname={$config['db_name']};
        charset=utf8";

        $pdo = new PDO($dsn, $config['db_username'], $config['db_password']);

        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
            echo "Welcome back! You are already logged in.";

            echo '<meta http-equiv="refresh" content="2;url=../index.php">';
        }
        else {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $phoneNumber = trim($_POST['phoneNumber']);
                }
                $password = trim($_POST['password']);


            if (empty($password) || empty($phoneNumber)) {
                die("All fields are required.");
            }

            $checkSql = "SELECT * FROM users WHERE phoneNumber = :phoneNumber";
            $stmt = $pdo->prepare($checkSql);
            $stmt->execute(['phoneNumber' => $phoneNumber]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['username'];
                $_SESSION['user_logged_in'] = true;
                echo "Authorized successfully! You will be redirected shortly.";

                echo '<meta http-equiv="refresh" content="2;url=../index.php">';
            } else {
                echo "Authorization failed: Invalid phone number or password.";

                echo '<meta http-equiv="refresh" content="2;url=../index.php">';
            }
        }
    }
    catch (PDOException $e)
    {
        echo "Authorization failed: " . $e->getMessage() . "<br>";
    }

?>