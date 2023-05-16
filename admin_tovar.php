<?php

include('dbconnect.php');
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

$sql = "SELECT * FROM tovar";

// Выполняем запрос SQL
$result = mysqli_query($conn, $sql);

$tovary = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
        <td>Товары</td>
        <td>Цена</td>
        <td>Наличие</td>
        <td>Описание</td>
        <td>Категория</td>
        <td>Изображение</td>
        <td>Удалить</td>
        <td>Изменить</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tovary as $tovar) : ?>
        <tr>
          <td><?php echo $tovar['nazvanie']; ?></td>
          <td><?php echo $tovar['price']; ?></td>
          <td><?php echo $tovar['nalichie']; ?></td>
          <!-- <td><?php echo $tovar['opisanie']; ?></td> -->
          <td><?php echo $tovar['category']; ?></td>
          <td><img src="<?php echo $tovar['img']; ?>" alt=""></td>
          <td><a href="delete_tovar.php?id=<?php echo urlencode($tovar['id']); ?>">Удалить</a></td>
          <td><a href="edit_tovar.php?id=<?php echo urlencode($tovar['id']); ?>">Изменить</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <br>
  <a class="btn btn-success" href="add_tovar.php" role="button">Добавить</a>

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