<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Динамічне меню</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 40px;
            color: #333;
        }

        h2, h3 {
            color: #444;
        }

        ul {
            list-style: none;
            padding: 0;
            margin-bottom: 30px;
        }

        ul li {
            background: #fff;
            padding: 12px 20px;
            margin-bottom: 10px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        ul li a:first-child {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        ul li a:first-child:hover {
            text-decoration: underline;
        }

        ul li a:last-child {
            color: #dc3545;
            font-size: 0.9em;
            text-decoration: none;
        }

        ul li a:last-child:hover {
            text-decoration: underline;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        form input[type="text"] {
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        form button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<h2>Меню сайту</h2>
<?php include 'menu.php'; ?>

<h3>Додати пункт меню</h3>
<form method="post">
    <input type="text" name="title" placeholder="Назва" required>
    <input type="text" name="link" placeholder="Посилання" required>
    <button type="submit">Додати</button>
</form>

</body>
</html>
