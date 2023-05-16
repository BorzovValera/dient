<?php

include('dbconnect.php');

if (isset($_GET['id'])) {
  // Получаем значение 'id' из URL
  $productId = $_GET['id'];

  // Формируем SQL-запрос с использованием параметра 'id'
  $sql = "SELECT id, nazvanie, category, price, img, nalichie, opisanie FROM tovar WHERE id = $productId";

  // Выполняем запрос к базе данных и получаем результат
  $result = mysqli_query($conn, $sql);
  $product = mysqli_fetch_assoc($result);

  //очищаем результат в переменной result
  mysqli_free_result($result);

  
}

$min = 1;
$max = 26;

$randomNumberOne = rand($min, $max);

$randomNumberTwo = 0;
while ($randomNumberTwo === 0 || $randomNumberTwo === $randomNumberOne) {
    $randomNumberTwo = rand($min, $max);
}

$randomNumberThree = 0;
while ($randomNumberThree === 0 || $randomNumberThree === $randomNumberOne || $randomNumberThree === $randomNumberTwo) {
    $randomNumberThree = rand($min, $max);
}

$randomNumberFour = 0;
while ($randomNumberFour === 0 || $randomNumberFour === $randomNumberOne || $randomNumberFour === $randomNumberTwo || $randomNumberFour === $randomNumberThree) {
    $randomNumberFour = rand($min, $max);
}

$sqlOne = "SELECT id, nazvanie, price, img FROM tovar WHERE id = $randomNumberOne";
$resultOne = mysqli_query($conn, $sqlOne);
$productOne = mysqli_fetch_assoc($resultOne);

$sqlTwo = "SELECT id, nazvanie, price, img FROM tovar WHERE id = $randomNumberTwo";
$resultTwo = mysqli_query($conn, $sqlTwo);
$productTwo = mysqli_fetch_assoc($resultTwo);

$sqlThree = "SELECT id, nazvanie, price, img FROM tovar WHERE id = $randomNumberThree";
$resultThree = mysqli_query($conn, $sqlThree);
$productThree = mysqli_fetch_assoc($resultThree);

$sqlFour = "SELECT id, nazvanie, price, img FROM tovar WHERE id = $randomNumberFour";
$resultFour = mysqli_query($conn, $sqlFour);
$productFour = mysqli_fetch_assoc($resultFour);

// Освобождаем память от результатов запросов
mysqli_free_result($resultFour);
mysqli_free_result($resultThree);
mysqli_free_result($resultTwo);
mysqli_free_result($resultOne);

// Закрываем соединение с базой данных
mysqli_close($conn);


  
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bobrius Production</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    </head>

    <body>

      <section id="header">
        <a href = "#"><img src= "img/logo3.png" width="200" height="50" class = "logo" alt= "not found"></a>

        <div>
          <ul id = "navbar">
            <li><a href = "index.php">Главная</a></li>
            <li><a class="active" href = "shop.php">Каталог</a></li>
            <li><a href = "blog.html">Блог</a></li>
            <li><a href = "about.html">О нас</a></li>
            <li><a href = "contact.html">Контакты</a></li>
            <li><a href = "cart.php"><i class="far fa-shopping-bag"></i></a></li>
          </ul>
        </div>
      </section>

      <section id="prodetails" class="section-p1">
      <div class="single-pro-image">
    <img src="<?php echo $product['img']; ?>" width="100%" id="MainImg" alt="No picture">
</div>

<div class="single-pro-details">
    <h6><?php echo $product['category']; ?></h6>
    <h4><?php echo $product['nazvanie']; ?></h4>
    <h2><?php echo $product['price']; ?></h2>
    <form method="post" action="addCart.php"> <!-- Изменено значение атрибута action -->
            <input type="hidden" name="productId" value="<?php echo $product['id']; ?>">
            <button type="submit" class="normal">В корзину</button>
          </form>
    <h4>Описание товара</h4>
    <span><?php echo $product['opisanie']; ?></span>
</div>

      </section>

      <section id="product1" class="section-p1">
        <h2>Рекомендуемые товары</h2>
        <p>Новинки, с которыми стоит ознакомиться!</p>

        <div class="pro-container">

            <div class="pro">
            <a href="product.php?id=<?php echo $productOne['id']; ?>">
              <img src="<?php echo $productOne['img']; ?>" alt="no picture">
                <div class="des">
                  <h5><?php echo $productOne['nazvanie']; ?></h5>
                  <h4><?php echo $productOne['price']; ?></h4>
                </div>
                <form method="post" action="addCart.php"> <!-- Изменено значение атрибута action -->
            <input type="hidden" name="productId" value="<?php echo $productOne['id']; ?>">
            <button type="submit" class="fa fa-shopping-cart cart"></button>
          </form>
            </div>

            <div class="pro">
            <a href="product.php?id=<?php echo $productTwo['id']; ?>">
              <img src="<?php echo $productTwo['img']; ?>" alt="no picture">
                <div class="des">
                  <h5><?php echo $productTwo['nazvanie']; ?></h5>
                  <h4><?php echo $productTwo['price']; ?></h4>
                </div>
                <form method="post" action="addCart.php"> <!-- Изменено значение атрибута action -->
            <input type="hidden" name="productId" value="<?php echo $productTwo['id']; ?>">
            <button type="submit" class="fa fa-shopping-cart cart"></button>
          </form>
            </div>

            <div class="pro">
            <a href="product.php?id=<?php echo $productThree['id']; ?>">
              <img src="<?php echo $productThree['img']; ?>" alt="no picture">
                <div class="des">
                  <h5><?php echo $productThree['nazvanie']; ?></h5>
                  <h4><?php echo $productThree['price']; ?></h4>
                </div>
                <form method="post" action="addCart.php"> <!-- Изменено значение атрибута action -->
            <input type="hidden" name="productId" value="<?php echo $productThree['id']; ?>">
            <button type="submit" class="fa fa-shopping-cart cart"></button>
          </form>
            </div>

            <div class="pro">
            <a href="product.php?id=<?php echo $productFour['id']; ?>">
              <img src="<?php echo $productFour['img']; ?>" alt="no picture">
                <div class="des">
                  <h5><?php echo $productFour['nazvanie']; ?></h5>
                  <h4><?php echo $productFour['price']; ?></h4>
                </div>
                <form method="post" action="addCart.php"> <!-- Изменено значение атрибута action -->
            <input type="hidden" name="productId" value="<?php echo $productFour['id']; ?>">
            <button type="submit" class="fa fa-shopping-cart cart"></button>
          </form>
            </div>

        </div>

      </section>

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

      <script>
        var MainImg = document.getElementById("MainImg");
        var smalling = document.getElementsByClassName("small-img");

        smalling[0].onclick = function() {
          MainImg.src = smalling[0].src;
        }

        smalling[1].onclick = function() {
          MainImg.src = smalling[1].src;
        }

        smalling[2].onclick = function() {
          MainImg.src = smalling[2].src;
        }

        smalling[3].onclick = function() {
          MainImg.src = smalling[3].src;
        }
      </script>

        <script src="script.js"></script>
  </body>
</html>
