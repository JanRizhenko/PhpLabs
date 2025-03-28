<?php

namespace MVC\Controllers;

use MVC\Models\UserModel;
use MVC\Views\UserView;

/**
 * Class UserController
 * Контролер, що управляє взаємодією між моделлю користувача та її відображенням.
 * Створює об'єкт моделі UserModel із заданими даними,
 * ініціалізує представлення UserView та відображає інформацію.
 */
class UserController
{
    /**
     * Показує інформацію про користувача.
     * Метод створює екземпляр UserModel з попередньо заданими значеннями,
     * а потім використовує UserView для виведення даних користувача.
     * @return void
     */
    public function showUser()
    {
        $user = new UserModel("Jan Rizhenko", 18);
        $view = new UserView();
        $view->displayUser($user->getUserInfo());
    }
}
?>