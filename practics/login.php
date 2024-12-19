<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") { //Если запрос обрабатывается методом пост, тогда выполняются блоки кода
    $email = $_POST['email']; //получение введенных данных пользователем
    $password = $_POST['password'];////получение введенных данных пользователем

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?"); // Проверка email через базу (есть ли она в базе)
    $stmt->execute([$email]); 
    $user = $stmt->fetch();//Извлекает данные пользователя из выполненного запроса (если пользователь с таким email существует)

    if ($user && password_verify($password, $user['password'])) { // Проверка пароля ( есть ли он у пользователя введенный)
        $_SESSION['user_id'] = $user['id']; //Если аутентификация успешна, сохраняет ID и имя пользователя в сессии для дальнейшего использования.
        $_SESSION['user_name'] = $user['name'];
        header("Location: profile.php");//  на сайт
        exit();
    } else {
        echo "Неверный email или пароль!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
</head>
<body>
    <h2>Вход</h2>
    <form method="post">
        Email: <input type="email" name="email" required><br>
        Пароль: <input type="password" name="password" required><br> <!-- Здесь все в целом форма для входа и выхода -->
        <input type="submit" value="Войти">
    </form>
   
    <form action="index.php" method="post">
        <input type="submit" value="Выйти">
    </form>
    
    
</body>
</html>