<?php
if (isset($_GET['value']))
{
    $value = $_GET['value'];
    setcookie("font_size", $value, time() + (180 * 24 * 60 * 60), "/");
}
header("Location: index.php");
exit();
?>