<?php
    $uploadDir = 'uploads/';
    $message = '';

    if(!is_dir($uploadDir))
    {
        mkdir($uploadDir, 0777, true);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK)
        {
            $fileTmpName = $_FILES['image']['tmp_name'];
            $fileName = basename($_FILES['image']['name']);
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedTypes = array('jpg', 'jpeg', 'gif', 'png');
        }
        if(in_array($fileType, $allowedTypes))
        {
            $destination = $uploadDir . $fileType;
            if (file_exists($destination))
            {
                $message = 'Sorry, file already exists.';
            }
            else
            {
                $uniqueName = $uploadDir . uniqid('img_', true) . '.' . $fileType;

                if (move_uploaded_file($fileTmpName, $uniqueName))
                {
                    $message = 'Image uploaded successfully';
                } else {
                    $message = 'Error while uploading file.';
                }
            }
        }
        else
        {
                $message = 'Error. Allowed formats: jpg, jpeg, gif, png';
        }
    }
    else
        {
            $message = 'There was an error uploading your file';
        }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 6</title>
</head>
<style>
    body
    {
        font-size: 25px;
        display: flex;
    }
</style>
<body>

<form method="post" enctype="multipart/form-data">
    <h2>Завантажити зображення</h2>
    <?php if ($message) echo "<p>$message</p>"; ?>
    <input name="image" accept="image/*" type="file">
    <br>
    <input type="submit" value="Завантажити">
</form>

</body>
</html>