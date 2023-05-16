<?php
if (isset($_GET['id'])) {
    $tovarId = $_GET['id'];

    // Подключение к базе данных
    require_once('dbconnect.php');

    // SQL-запрос для удаления товара по идентификатору
    $sql = "DELETE FROM tovar WHERE id = $tovarId";
    
    // Выполнение SQL-запроса
    if (mysqli_query($conn, $sql)) {
        // Товар успешно удален
        header('Location: cart.php');
        exit();
    } else {
        // Обработка ошибки удаления товара
        echo "Ошибка при удалении товара: " . mysqli_error($conn);
    }

    // Закрытие соединения с базой данных
    mysqli_close($conn);
} else {
    // Неверные параметры запроса
    header('Location: admin_tovar.php');
    exit();
}
?>
