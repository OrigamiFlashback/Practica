<?php

session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $message = $_POST['message'];

    // Здесь вы можете отправить сообщение на email или сохранить в базе данных
    $stmt = $pdo->prepare("INSERT INTO feedback (user_id, message) VALUES (?, ?)");
    if ($stmt->execute([$user_id, $message])) {
        echo "Сообщение отправлено!";
    } else {
        echo "Ошибка отправки сообщения!";
    }
    
}
?>
<form action="profile.php" method="post">
    <input type="submit" value="Выйти">

?>