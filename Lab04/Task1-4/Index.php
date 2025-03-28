<?php
# Основний файл, що виконує завантаження та використовує класи.
require_once "autoload.php";

use MVC\Controllers\UserController;

$controller = new UserController();
$controller->showUser();
?>