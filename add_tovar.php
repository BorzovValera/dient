<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Подключение к базе данных
    require_once('dbconnect.php');

    // Получение значений товара из формы
    $nazvanie = $_POST['nazvanie'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $img = $_POST['img'];
    $opisanie = $_POST['opisanie'];
    $nalichie = $_POST['nalichie'];

    // SQL-запрос для добавления товара
    $insertSql = "INSERT INTO tovar (nazvanie, price, category, img, opisanie, nalichie) VALUES ('$nazvanie', '$price', '$category', '$img', '$opisanie', '$nalichie')";

    if (mysqli_query($conn, $insertSql)) {
        // Товар успешно добавлен
        header('Location: admin_tovar.php');
        exit();
    } else {
        // Обработка ошибки добавления товара
        echo "Ошибка при добавлении товара: " . mysqli_error($conn);
    }

    // Закрытие соединения с базой данных
    mysqli_close($conn);
}
?>
<!-- Добавьте HTML-форму для добавления товара -->
<form method="POST" action="">
    <label for="nazvanie">Название:</label>
    <input type="text" name="nazvanie"><br>

    <label for="price">Цена:</label>
    <input type="number" name="price"><br>

    <label for="category">Категория:</label>
    <input type="text" name="category"><br>

    <label for="img">Изображение:</label>
    <input type="text" name="img"><br>

    <label for="opisanie">Описание:</label>
    <textarea name="opisanie"></textarea><br>

    <label for="nalichie">Наличие:</label>
    <input type="number" name="nalichie"><br>

    <button type="submit">Добавить товар</button>
</form>
