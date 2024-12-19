<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; //  Получение имени и емейла
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // хэшивароение пароля

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)"); // Подготовка запроса
    if ($stmt->execute([$name, $email, $password])) {
        echo "Регистрация успешна!";
    } else {
        echo "Ошибка регистрации!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
    <h2>Регистрация</h2>
    <form method="post">
        Имя: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        Пароль: <input type="password" name="password" required><br>
        <input type="submit" value="Зарегистрироваться">
    </form>
    <form action="index.php" method="post">
        <input type="submit" value="Выйти">
    </form>
</body>
</html>