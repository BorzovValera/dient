<?php

include('dbconnect.php');

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php'); 
    exit(); 
}

$sql = "SELECT * FROM users";

// Выполняем запрос SQL
$result = mysqli_query($conn, $sql);

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

// разрываем соединение
mysqli_close($conn);

?>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Bobrius Production</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <section id="header">
        <a href = "#"><img src= "img/logo3.png" width="200" height="50" class = "logo" alt= "not found"></a>

        <div>
          <ul id = "navbar">
            <li><a class="active" href = "index.php">Главная</a></li>
            <li><a href = "admin_category.php">Категории</a></li>
            <li><a href = "admin_users.php">Пользователи</a></li>
            <li><a href = "admin_tovar.php">Товары</a></li>
          </ul>
        </div>
      </section>
      <section id="cart" class="section-p1">
  <table width="100%">
    <thead>
      <tr>
        <td>Id</td>
        <td>Имя</td>
        <td>Фамилия</td>
        <td>email</td>
        <td>Роль</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>
        <tr>
          <td><?php echo $user['id']; ?></td>
          <td><?php echo $user['first_name']; ?></td>
          <td><?php echo $user['last_name']; ?></td>
          <td><?php echo $user['email']; ?></td>
          <td><?php echo $user['role']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
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