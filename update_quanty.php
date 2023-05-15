<?php
session_start();
include('dbconnect.php');

$userId = $_SESSION['userId'];
$productId = $_POST['productId'];
$action = $_POST['action'];

// Получение текущего значения quanty
$sql = "SELECT quanty FROM cart WHERE user_Id = '$userId' AND productId = '$productId'";
$result = mysqli_query($conn, $sql);

if ($result) {
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $currentQuanty = $row['quanty'];

    // Изменение значения quanty в зависимости от действия
    if ($action == 'decrement') {
      $newQuanty = max(0, $currentQuanty - 1); // Уменьшение на 1, но не меньше нуля
    } elseif ($action == 'increment') {
      $newQuanty = $currentQuanty + 1; // Увеличение на 1
    }

    // Обновление значения quanty в базе данных
    $sql = "UPDATE cart SET quanty = $newQuanty WHERE user_Id = '$userId' AND productId = '$productId'";
    mysqli_query($conn, $sql);
  }
}

header('Location: cart.php');
exit();
?>
