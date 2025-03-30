<?php

require_once __DIR__ . '/app/controllers/EmployeeController.php';

$controller = new EmployeeController();

$requestUrl = str_replace('/Lab05/Task3', '', $_SERVER['REQUEST_URI']);
$url_segments = array_values(array_filter(explode('/', trim($requestUrl, '/'))));

if (empty($url_segments)) {
    $controller->index();
} else {
    switch ($url_segments[0]) {
        case 'create':
            $controller->create();
            break;
        case 'update':
            if (isset($url_segments[1])) {
                $controller->update($url_segments[1]);
            } else {
                echo "Помилка: ID для зміни інформації не вказано.";
            }
            break;
        case 'delete':
            if (isset($url_segments[1])) {
                $controller->delete($url_segments[1]);
            } else {
                echo "Помилка: ID для видалення не вказано.";
            }
            break;
        case 'statistics':
            $controller->statistics();
            break;
        default:
            echo "404 Not Found.";
            break;
    }
}

exit();
