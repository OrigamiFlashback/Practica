<?php
session_start();
include 'db.php'; // запуск сессии и подключение к базе данных

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit(); // Проверка есть ли идентификатор пользователя на сессии и есть нет то перенаправление на страницу с логином
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?"); // проверка привязанного пароля к юзер айди
$stmt->execute([$user_id]);
$user = $stmt->fetch();

$projectStmt = $pdo->prepare("SELECT * FROM projects WHERE user_id = ?"); // проверка привязанности проекта к юзер айди
$projectStmt->execute([$user_id]);
$projects = $projectStmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Профиль</title>
</head>
<body>
    <h2>Привет, <?php echo htmlspecialchars($user['name']); ?>!</h2>
    <h3>О себе</h3>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>

    <h3>Портфолио</h3>
    <a href="add_project.php">Добавить новый проект</a>
    <ul>
        <?php foreach ($projects as $project): ?> <!-- берет проект и добавляет --> 
            <li>
                <strong><?php echo htmlspecialchars($project['title']); ?></strong>
                <p><?php echo htmlspecialchars($project['description']); ?></p>
            </li>
        <?php endforeach; ?>
    </ul>

    <h3>Обратная связь</h3>
    <form method="post" action="send_feedback.php">
        Сообщение: <textarea name="message" required></textarea><br>
        <input type="submit" value="Отправить">
    </form>

    <form action="logout.php" method="post">
        <input type="submit" value="Выйти">
    </form>
</body>
</html>