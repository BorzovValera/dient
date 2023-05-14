<?php

include('dbconnect.php');

$sql = 'SELECT id, nazvanie, category, price, img, nalichie, opisanie FROM tovar';

$result = mysqli_query($conn, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

$limit = 1;

// определяем текущую страницу
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

// определяем количество записей в базе данных
$count_query = "SELECT COUNT(*) FROM tovar";
$count_result = mysqli_query($conn, $count_query);
$count_row = mysqli_fetch_row($count_result);
$count = $count_row[0];

// определяем количество страниц
$pages = ceil($count / $limit);

//очищаем результат в переменноё result
mysqli_free_result($result);

// разрываем соединение
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="RU">

<head>
  <meta charset="UTF-8">
  <title>Галерея дверей</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container my-5">
    <h1 class="text-center my-5">ГАЛЕРЕЯ ДВЕРЕЙ</h1>

    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php foreach ($products as $product) : ?>
        <div class="col">
          <div class="card h-100">
            <img src="<?php foreach (explode(',', $product['img']) as $ing) echo $ing; ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php foreach (explode(',', $product['nazvanie']) as $ing) echo $ing; ?></h5>
              <p class="card-text"><?php foreach (explode(',', $product['price']) as $ing) echo $ing; ; ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>


  <!-- Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.min.js"></script>
</body>

</html>