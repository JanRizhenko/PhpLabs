<?php

namespace MVC\Views;
/**
 * Class UserView
 * Відповідає за відображення інформації користувача.
 */

class UserView
{
    /**
     * Відображає дані користувача.
     *
     * Метод приймає строку з даними користувача, розбиває їх за допомогою функції explode та HTML-екранує вхідні дані,
     * після чого виводить результуючі рядки у форматі HTML.
     *
     * @param string $userInfo Рядок з інформацією користувача (наприклад, "User: Ім'я, Age: Вік").
     * @return void
     */

    public function displayUser($userInfo)
    {
        $userData = explode(", ", htmlspecialchars($userInfo, ENT_QUOTES, 'UTF-8'));
        echo "<h2>";
        foreach ($userData as $line) {
            echo nl2br($line) . "<br>";
        }
        echo "</h2>";
    }
}

?>