<?php
# Клас автозавантаження
spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    $file = __DIR__ . DIRECTORY_SEPARATOR . $classPath . '.php';

    if (file_exists($file)) {
        require_once $file;
        return;
    }

    throw new Exception("Class $class not found in structure.");
});
?>
