<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO projects (user_id, title, description) VALUES (?, ?, ?)");
    if ($stmt->execute([$user_id, $title, $description])) {
        echo "Проект успешно добавлен!";
    } else {
        echo "Ошибка добавления проекта!";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить проект</title>
</head>
<body>
    <h2>Добавить новый проект</h2>
    <form method="post">
        Название: <input type="text" name="title" required><br>
        Описание: <textarea name="description" required></textarea><br>
        <input type="submit" value="Добавить проект">
    </form>
    </form>
    <form action="profile.php" method="post">
        <input type="submit" value="Выйти">
    </form>
</body>
</html>