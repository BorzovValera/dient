<?php
include('dbconnect.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

// Проверяем, получено ли значение категории из параметра URL
if (isset($_GET['category'])) {
    $category = $_GET['category'];

    // Здесь вы можете выполнить логику удаления категории из базы данных
    // Например:
    $sql = "DELETE FROM tovar WHERE category = '$category'";
    mysqli_query($conn, $sql);

    // Перенаправляем пользователя обратно на страницу администратора
    header('Location: admin_category.php');
    exit();
} else {
    // Если значение категории не получено, перенаправляем пользователя на страницу администратора
    header('Location: admin_category.php');
    exit();
}
?>
