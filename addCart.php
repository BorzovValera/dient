<?php
session_start();
include('dbconnect.php');

// Получение userId для данного пользователя
$userId = $_SESSION['userId'];

// Запрос для получения cartId из таблицы users
$sql = "SELECT cartId FROM users WHERE id = '$userId'";
$result = mysqli_query($conn, $sql);

if ($result) {
  // Проверка наличия значения cartId
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $cartId = $row['cartId'];

    // Вставка записи в таблицу `cart`
    $productId = $_POST['productId']; // Пример значения productId
    $nazvanie = $_POST['nazvanie']; // Пример значения названия
    $category = $_POST['category']; // Пример значения категории
    $img = $_POST['img']; // Пример значения изображения
    $nalichie = $_POST['nalichie']; // Пример значения наличия
    $price = $_POST['price']; // Пример значения цены

    $sql = "SELECT * FROM cart WHERE productId = $productId AND user_Id = $userId";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // Обновление количества (quanty) для существующей записи
  $sql = "UPDATE cart SET quanty = quanty + 1 WHERE productId = $productId AND user_Id = $userId";
  mysqli_query($conn, $sql);
} else {
  // Вставка новой записи в таблицу cart
  $sql = "INSERT INTO cart (productId, user_Id, quanty) VALUES ($productId, $userId, 1)";
  mysqli_query($conn, $sql);
}


    // Перенаправление пользователя на страницу корзины или другую страницу
    header('Location: cart.php');
    exit(); // Добавьте эту строку, чтобы прекратить выполнение кода после перенаправления
  } else {
    echo "Ошибка: У пользователя не указан cartId.";
  }
} else {
  echo "Ошибка при выполнении запроса: " . mysqli_error($conn);
}
?>
