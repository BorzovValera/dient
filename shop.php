<?php

include('dbconnect.php');

$sql = 'SELECT id, nazvanie, category, price, img, nalichie, opisanie FROM tovar';

$result = mysqli_query($conn, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

//очищаем результат в переменноё result
mysqli_free_result($result);

// разрываем соединение
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
            <li><a href = "index.html">Главная</a></li>
            <li><a class="active" href = "shop.html">Каталог</a></li>
            <li><a href = "blog.html">Блог</a></li>
            <li><a href = "about.html">О нас</a></li>
            <li><a href = "contact.html">Контакты</a></li>
            <li><a href = "cart.html"><i class="far fa-shopping-bag"></i></a></li>
          </ul>
        </div>
      </section>

      <section id="page-header">

          <h2>#Пользуйся качеством</h2>

          <p> Будь на пике с нашими инструментами </p>

      </section>

      <section id="product1" class="section-p1">
      <ul id="navbar" class="categorynav">
        <li><a href = "#">Инструменты</a></li>
        <li><a href = "#">Запчаcти</a></li>
        <li><a href = "#">Строй материалы</a></li>
        <li><a href = "#">Сантехника</a></li>
      </ul>
        <div class="pro-container">
        <?php foreach($products as $product):  ?>
            <div class="pro" onclick="window.location.href='sproduct.html';">
              <img src="
              <?php
              foreach(explode(',', $product['img']) as $ing)
              echo $ing;
        
              ?>
              " alt="no picture">
                <div class="des">
                  <span>MAKITA</span>
                  <h5><?php foreach(explode(',', $product['nazvanie']) as $ing) 
                  echo $ing;
        endforeach;
                  ?>
                </h5>
                  <h4>3999р</h4>
                </div>
                <a href="#"><i class="fa fa-shopping-cart cart"></i></a>
            </div>

            

      </section>

      <section id="pagination" class="section-p1">
        <a  href="#">1</a>
        <a  href="#">2</a>
        <a  href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
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

        <script src="script.js"></script>
  </body>
</html>
