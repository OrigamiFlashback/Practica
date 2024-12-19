<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная страница</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Добро пожаловать на персональную динамическую веб-страницу!</h1>

    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Привет, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p> <!-- Здесь выводится имя пользователя в случае если он естьл на сайте -->
        <p><a href="profile.php">Перейти в профиль</a></p>
        <form action="logout.php" method="post">
            <input type="submit" value="Выйти">
        </form>
    <?php else: ?>
        <p><a href="register.php">Зарегистрироваться</a></p>
        <p><a href="login.php">Войти</a></p>
    <?php endif; ?>
</body>
</html>
