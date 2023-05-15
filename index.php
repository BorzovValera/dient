<?php

include('dbconnect.php');

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
            <li><a class="active" href = "index.php">Главная</a></li>
            <li><a href = "shop.php">Каталог</a></li>
            <li><a href = "blog.html">Блог</a></li>
            <li><a href = "about.html">О нас</a></li>
            <li><a href = "contact.html">Контакты</a></li>
            <li><a href = "form_auth.php">Вход</a></li>
            <li><a href = "form_register.php">Регистрация</a></li>
            <li><a href = "cart.php"><i class="far fa-shopping-bag"></i></a></li>
          </ul>
        </div>
      </section>

      <section id="hero">
        <h4> Начинай с каачества </h4>
        <h2> Современное оборудование </h2>
        <h1> Оригинальные товары </h1>
        <p> Сохраняй деньги, покупая у нас </p>
      <a href="shop.php"> <button> Начать </button></a>
      </section>

      <section id="feature" class="section-p1">

        <div class="fe-box">
            <img src="img/features/f1.png" alt="no picture">
            <h6>Бесплатная доставка</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f2.png" alt="no picture">
            <h6>Быстрая доставка</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f3.png" alt="no picture">
            <h6>Лучшие цены</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f4.png" alt="no picture">
            <h6>Качество упаковки</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f5.png" alt="no picture">
            <h6>Приятный персонал</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/f6.png" alt="no picture">
            <h6>Хорошая поддержка</h6>
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
            <button type="submit" class="btn btn-outline-primary">В корзину</button>
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
            <button type="submit" class="btn btn-outline-primary">В корзину</button>
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
            <button type="submit" class="btn btn-outline-primary">В корзину</button>
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
            <button type="submit" class="btn btn-outline-primary">В корзину</button>
          </form>
            </div>

        </div>


      </section>

      <section id="banner" class="section-m1">
        <h4><span>Больше товаров</span></h4>
        <h2>Широкий ассортимент от знаменитых производителей!</h2>
        <a href="shop.html"> <button class="normal">Перейти</button></a>
      </section>

      <section id="sm-banner" class="section-p1">
        <div class="banner-box">
          <h4>Новые поставки</h4>
          <h2>Только у нас!</h2>
          <span>Скоро появится возможность приобретать новые товары</span>
          <a href="shop.html"><button class="white">Узнать больше</button></a>
        </div>

        <div class="banner-box banner-box2">
          <h4>Новые поставки</h4>
          <h2>Только у нас!</h2>
          <span>Скоро появится возможность приобретать новые товары</span>
            <a href="shop.html"><button class="white">Узнать больше</button></a>
        </div>
      </section>

      <section id="banner3">
        <div class="banner-box">
          <h2>В НОВОМ 2023</h2>
          <h3>СЕЗОННЫЕ СКИДКИ</h3>
        </div>

        <div class="banner-box banner-box2">
          <h2>В НОВОМ 2023</h2>
          <h3>СЕЗОННЫЕ СКИДКИ</h3>
        </div>

        <div class="banner-box banner-box3">
          <h2>В НОВОМ 2023</h2>
          <h3>СЕЗОННЫЕ СКИДКИ</h3>
        </div>

      </section>

      <footer class="section-p1">
        <div class="col">
          <img class="logo" src="img/logomin.png">
          <h4>Контакты</h4>
          <p><strong>Адрес:</strong> Г.Москва Владыкино, ул.Хачатуряна д.17с2</p>
          <p><strong>Телефон:</strong> +7 (926) 289 05 43</p>
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

        <script src="script.js"></script>
  </body>
</html>
