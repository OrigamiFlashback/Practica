<?php
$dsn = 'pgsql:host=localhost;dbname=user_app'; // подключение к базе данных
$username = 'postgres';
$password = '1111';

try {
    $pdo = new PDO($dsn, $username, $password); // создание объекта класса PDO для подключению к базе данных
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>