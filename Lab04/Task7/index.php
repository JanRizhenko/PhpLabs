<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 7</title>
    <style>
        *
        {
            font-size: 20px;
        }
    </style>
</head>
<body>

<?php

class FileManager
{
    private static $dir = "text";

    public static function writeToFile($filename, $content)
    {
        $filepath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($filepath, $content . PHP_EOL, FILE_APPEND);
        echo "Written to file: $filepath <br>";
    }

    public static function readFromFile($filename)
    {
        $filepath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($filepath)) {
            return file_get_contents($filepath);
        } else {
            return "File not found: $filepath <br>";
        }
    }

    public static function clearFile($filename)
    {
        $filepath = self::$dir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($filepath, "");
    }
}

if (!is_dir("text")) {
    mkdir("text");
}

$files = ["file1.txt", "file2.txt", "file3.txt"];
foreach ($files as $file) {
    $path = "text" . DIRECTORY_SEPARATOR . $file;
    if (!file_exists($path)) {
        file_put_contents($path, "");
    }
}

FileManager::writeToFile("file1.txt", "Hello, this is file1!");
FileManager::writeToFile("file2.txt", "Welcome to file2.");
FileManager::writeToFile("file3.txt", "This is the third file.");

echo "<br>Contents of file1: <br>" . FileManager::readFromFile("file1.txt");
echo "<br>Contents of file2: <br>" . FileManager::readFromFile("file2.txt");
echo "<br>Contents of file3: <br>" . FileManager::readFromFile("file3.txt");

FileManager::clearFile("file1.txt");
echo "<br><br>After clearing, contents of file1: <br>" . FileManager::readFromFile("file1.txt");

FileManager::clearFile("file2.txt");
echo "<br>After clearing, contents of file2: <br>" . FileManager::readFromFile("file2.txt");

FileManager::clearFile("file3.txt");
echo "<br>After clearing, contents of file3: <br>" . FileManager::readFromFile("file3.txt");

?>

</body>
</html>
