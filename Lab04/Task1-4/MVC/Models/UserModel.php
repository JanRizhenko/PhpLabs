<?php

namespace MVC\Models;
/**
 * Class UserModel
 * Модель для зберігання даних користувача.Властивості:
 * @property string $name Ім'я користувача.
 * @property int $age Вік користувача.
 */

class UserModel
{
    # Ім'я користувача. @var int
    private $name;

    # Вік користувача. @var int
    private $age;

    /**
     * Конструктор класу UserModel.
     * Ініціалізує властивості моделі даними про користувача.
     * @param string $name Ім'я користувача.
     * @param int $age Вік користувача.
     */
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    /**
     * Повертає рядок з інформацією про користувача.
     * Формує строку у форматі "User: {name}, Age: {age}".
     * @return string Інформація про користувача.
     */
    public function getUserInfo()
    {
        return "User: {$this->name}, Age: {$this->age}";
    }
}

?>