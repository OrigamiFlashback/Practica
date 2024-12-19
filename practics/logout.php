php
<?php
session_start();
session_destroy();
header("Location: login.php"); //сессия начинается сессия прерывается и нет доступа и перебрасывает на страницу входа
exit();
?>