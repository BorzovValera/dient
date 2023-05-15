<?php
session_start();
include('dbconnect.php');

// Получение userId для данного пользователя
$userId = $_SESSION['userId'];

// Запрос для получения товаров из корзины
$sql = "SELECT c.productId, c.quanty, t.nalichie FROM cart c JOIN tovar t ON c.productId = t.id WHERE c.user_Id = '$userId'";
$result = mysqli_query($conn, $sql);

if ($result) {
  // Перебираем каждый товар в корзине
  while ($row = mysqli_fetch_assoc($result)) {
    $productId = $row['productId'];
    $quanty = $row['quanty'];
    $nalichie = $row['nalichie'];

    // Проверяем, достаточно ли товара в наличии
    if ($nalichie >= $quanty) {
      // Обновляем значение nalichie в таблице tovar
      $updatedNalichie = $nalichie - $quanty;
      $updateSql = "UPDATE tovar SET nalichie = $updatedNalichie WHERE id = '$productId'";
      mysqli_query($conn, $updateSql);
    }
  }
}

// Очищаем корзину после заказа
$clearCartSql = "DELETE FROM cart WHERE user_Id = '$userId'";
mysqli_query($conn, $clearCartSql);

// Перенаправление пользователя на страницу корзины
header('Location: cart.php');
exit();
?>
