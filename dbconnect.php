<?php
    // Указываем кодировку
    header('Content-Type: text/html; charset=utf-8');

    $server = "localhost"; // имя хоста (уточняется у провайдера), если работаем на локальном сервере, то указываем localhost
    $username = "root"; // Имя пользователя БД
    $password = ""; // Пароль пользователя. Если у пользователя нету пароля то, оставляем пустое значение ""
    $database = "dip"; // Имя базы данных, которую создали

    // Подключение к базе данных через MySQLi
    $mysqli = new mysqli($server, $username, $password, $database);

    // Проверяем, успешность соединения.
    if ($mysqli->connect_errno) {
        die("<p><strong>Ошибка подключения к БД</strong></p><p><strong>Код ошибки: </strong> ". $mysqli->connect_errno ." </p><p><strong>Описание ошибки:</strong> ".$mysqli->connect_error."</p>");
    }

    // Устанавливаем кодировку подключения
    $mysqli->set_charset('utf8');

    //Для удобства, добавим здесь переменную, которая будет содержать адрес (URL) нашего сайта
    $address_site = "http://dient-master20/";
?>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'dip');

if(!$conn){
    echo 'Connect error: ' . mysqli_connect_error();
}

