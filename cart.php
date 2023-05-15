<?php
session_start();
include('dbconnect.php');

// Получение userId для данного пользователя
$userId = $_SESSION['userId'];

// Запрос для получения товаров из корзины
$sql = "SELECT c.*, t.img, t.nazvanie, t.price, t.nalichie FROM cart c JOIN tovar t ON c.productId = t.id WHERE c.user_Id = '$userId'";
$result = mysqli_query($conn, $sql);

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
            <li><a href = "index.html">Главная</a></li>
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
                        <td><a href=""><i class="far fa-times-circle"></i></a></td>
                        <td><img src="<?php echo $row['img']; ?>" alt=""></td>
                        <td><?php echo $row['nazvanie']; ?></td>
                        <td><input type="number" value="<?php echo $row['nalichie']; ?>"></td>
                        <td><?php echo $row['price']; ?>р</td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>

    <!-- Остальная разметка страницы -->

    <script src="script.js"></script>
</body>

</html>
