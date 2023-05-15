<?php
session_start();
include('dbconnect.php');

// Получение userId для данного пользователя
$userId = $_SESSION['userId'];

// Получение productId для удаления
$productId = $_POST['productId'];

// Удаление товара из корзины
$sql = "DELETE FROM cart WHERE productId = '$productId' AND user_Id = '$userId'";
$result = mysqli_query($conn, $sql);

if ($result) {
  // Перенаправление пользователя на страницу корзины или другую страницу
  header('Location: cart.php');
  exit();
} else {
  echo "Ошибка при удалении товара из корзины: " . mysqli_error($conn);
}
?>
