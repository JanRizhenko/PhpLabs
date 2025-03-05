<?php
if (isset($_COOKIE['font_size'])) {
    $font_size = $_COOKIE['font_size'];
} else {
    $font_size = '26px';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 1</title>
    <style>
    *
    {
        font-size: <?php echo $font_size?>;
    }</style>
</head>
<body>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi architecto autem blanditiis consequuntur dolor, eius explicabo molestias pariatur placeat qui repudiandae veniam vitae voluptatum? Animi commodi error ipsam placeat voluptate?</p>
<a href="set_cookie.php?value=18px">S</a>
<a href="set_cookie.php?value=26px">M</a>
<a href="set_cookie.php?value=32px">L</a>
<?php
?>

</body>
</html>