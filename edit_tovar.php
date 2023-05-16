<?php
if (isset($_GET['id'])) {
    $tovarId = $_GET['id'];

    // Подключение к базе данных
    require_once('dbconnect.php');

    // Получение информации о товаре по идентификатору
    $sql = "SELECT * FROM tovar WHERE id = $tovarId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $tovar = mysqli_fetch_assoc($result);

        // Обработка формы изменения товара
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Получение новых значений товара из формы
            $newNazvanie = $_POST['nazvanie'];
            $newPrice = $_POST['price'];
            $newCategory = $_POST['category'];
            $newImg = $_POST['img'];
            $newOpisanie = $_POST['opisanie'];
            $newNalichie = $_POST['nalichie'];

            // SQL-запрос для обновления товара
            $updateSql = "UPDATE tovar SET nazvanie = '$newNazvanie', price = '$newPrice', category = '$newCategory', img = '$newImg', opisanie = '$newOpisanie', nalichie = '$newNalichie' WHERE id = $tovarId";

            if (mysqli_query($conn, $updateSql)) {
                // Товар успешно обновлен
                header('Location: cart.php');
                exit();
            } else {
                // Обработка ошибки обновления товара
                echo "Ошибка при обновлении товара: " . mysqli_error($conn);
            }
        }

        // Закрытие соединения с базой данных
        mysqli_close($conn);
    } else {
        // Товар с указанным идентификатором не найден
        header('Location: shop.php');
        exit();
    }
} else {
    // Неверные параметры запроса
    header('Location: admin_tovar.php');
    exit();
}
?>
<!-- Добавьте HTML-форму для редактирования товара -->
<form method="POST" action="">
    <label for="nazvanie">Название:</label>
    <input type="text" name="nazvanie" value="<?php echo $tovar['nazvanie']; ?>"><br>

    <label for="price">Цена:</label>
    <input type="number" name="price" value="<?php echo $tovar['price']; ?>"><br>

    <label for="category">Категория:</label>
    <input type="text" name="category" value="<?php echo $tovar['category']; ?>"><br>

    <label for="img">Изображение:</label>
    <input type="text" name="img" value="<?php echo $tovar['img']; ?>"><br>

    <label for="opisanie">Описание:</label>
    <textarea name="opisanie"><?php echo $tovar['opisanie']; ?></textarea><br>

    <label for="nalichie">Наличие:</label>
    <input type="number" name="nalichie" value="<?php echo $tovar['nalichie']; ?>"><br>
    <button type="submit">Сохранить изменения</button>
    </form>
