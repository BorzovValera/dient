<?php
include('dbconnect.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

// Проверяем, была ли отправлена форма для добавления категории
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newCategory = $_POST['new_category'];

    // Здесь вы можете выполнить логику добавления категории в базу данных
    // Например:
    $sql = "INSERT INTO tovar (category) VALUES ('$newCategory')";
    mysqli_query($conn, $sql);

    // Перенаправляем пользователя обратно на страницу администратора
    header('Location: admin_category.php');
    exit();
}
?>

<!-- Ваш остальной HTML-код -->
<form method="POST" action="">
    <input type="text" name="new_category" placeholder="Новая категория">
    <button type="submit">Добавить</button>
</form>
