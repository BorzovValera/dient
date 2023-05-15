<?php
session_start();
include('dbconnect.php');

// Получение userId для данного пользователя
$userId = $_SESSION['userId'];

// Запрос для получения товаров из корзины
$sql = "SELECT c.*, t.img, t.nazvanie, t.price, c.quanty FROM cart c JOIN tovar t ON c.productId = t.id WHERE c.user_Id = '$userId'";

$result = mysqli_query($conn, $sql);

$totalPrice = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bobrius Production</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <section id="header">
        <a href = "#"><img src= "img/logo3.png" width="200" height="50" class = "logo" alt= "not found"></a>

        <div>
          <ul id = "navbar">
            <li><a href = "index.php">Главная</a></li>
            <li><a href = "shop.php">Каталог</a></li>
            <li><a href = "blog.html">Блог</a></li>
            <li><a href = "about.html">О нас</a></li>
            <li><a href = "contact.html">Контакты</a></li>
            <li id="lg-bag"><a class="active" href = "cart.php"><i class="far fa-shopping-bag"></i></a></li>
          </ul>
        </div>
      </section>

      <section id="page-header" class="about-header">

          <h2>#Корзина</h2>

          <p>Тут находятся ваши товары</p>

      </section>

    <section id="cart" class="section-p1">
        <table width="100%">
            <thead>
                <tr>
                    <td>Удалить</td>
                    <td>Изображение</td>
                    <td>Продукт</td>
                    <td>Количество</td>
                    <td>Цена</td>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                    <td>
  <form method="POST" action="remove_from_cart.php">
    <input type="hidden" name="productId" value="<?php echo $row['productId']; ?>">
    <button type="submit" name="action" value="remove"><i class="far fa-times-circle"></i></button>
  </form>
</td>
                        <td><img src="<?php echo $row['img']; ?>" alt=""></td>
                        <td><a href="product.php?id=<?php echo $row['productId']; ?>"><?php echo $row['nazvanie']; ?></a></td>
                        <td>
  <form method="POST" action="update_quanty.php">
    <input type="hidden" name="productId" value="<?php echo $row['productId']; ?>">
    <input type="hidden" name="quanty" value="<?php echo $row['quanty']; ?>">
    <button type="submit" name="action" value="decrement">-</button>
    <?php echo $row['quanty']; ?>
    <button type="submit" name="action" value="increment">+</button>
  </form>
</td>
                        <td><?php echo $row['price'] * $row['quanty']; ?>р</td>
                    </tr>
                    <?php
                    $itemPrice = $row['price'] * $row['quanty'];
                    $totalPrice += $itemPrice;
                    ?>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br><br>
          <div>
            <span class="itogspan" href = "shop.html">Итоговая цена корзины:<?php echo $totalPrice; ?></span>
          </div>
            <br>
            <a class="btn btn-success" href="update_nach.php" role="button">Заказать</a>

          </div>
    </section>

    <!-- Остальная разметка страницы -->

    <script src="script.js"></script>
</body>
<footer class="section-p1">
        <div class="col">
          <img class="logo" src="img/logomin.png">
          <h4>Контакты</h4>
          <p><strong>Адрес:</strong> Г.Москва Владыкино, ул.Хачатуряна д.17с2</p>
          <p><strong>Телефон:</strong> +7 926 (289) 05 43</p>
          <p><strong>Склад:</strong> Г.Лобня ул.Маяковского д.23</p>
        </div>

            <div class="col">
              <h4>Информация</h4>
              <a href=""><p>О нас</p></a>
              <a href=""><p>Каталог</p></a>
              <a href=""><p>Главгая</p></a>
              <a href=""><p>ТП</p></a>
            </div>

            <div class="copyright">
              <p>@ 2023, Борзов Валерий, все права защищены.</p>
            </div>
      </footer>
</html>
