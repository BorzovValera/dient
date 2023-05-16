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

    // Здесь вы можете выполнить логику изменения категории
    // Например, обновить название категории в базе данных

    // Проверяем, была ли отправлена форма для изменения категории
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newCategory = $_POST['new_category'];

        // Здесь вы можете выполнить логику обновления категории в базе данных
        // Например:
        $sql = "UPDATE tovar SET category = '$newCategory' WHERE category = '$category'";
        mysqli_query($conn, $sql);

        // Перенаправляем пользователя обратно на страницу администратора
        header('Location: admin_category.php');
        exit();
    }
} else {
    // Если значение категории не получено, перенаправляем пользователя на страницу администратора
    header('Location: admin_category.php');
    exit();
}
?>

<!-- Ваш остальной HTML-код -->
<form method="POST" action="">
    <input type="text" name="new_category" placeholder="изменить категорию">
    <button type="submit">Изменить</button>
</form>
