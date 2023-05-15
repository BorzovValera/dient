<?php
session_start();
include('dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $userId = $_SESSION['userId'];
  $productId = $_POST['productId'];

  // Получите информацию о товаре из базы данных на основе идентификатора

  // Вставка записи в таблицу `cart`
  $sql = "INSERT INTO cart (userId, productId) VALUES ('$userId', '$productId')";
  mysqli_query($conn, $sql);

  // Перенаправление пользователя на страницу корзины или другую страницу
  header('Location: cart.php');
}
?>
