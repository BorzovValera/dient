-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 14 2023 г., 21:44
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dip`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id` int(11) NOT NULL,
  `nazvanie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nalichie` int(11) NOT NULL,
  `opisanie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id`, `nazvanie`, `category`, `price`, `img`, `nalichie`, `opisanie`) VALUES
(1, 'Дрель MAKITA', 'Инструменты', 300, 'img/product.jpg', 3, 'Мне его не дали'),
(2, 'Шуруповёрт Bort', 'Инструменты', 3990, 'img/product3.jpg', 8, 'Шуруповерт Bort BAB-10.8-P - отличный и легкий инструмент для дома. Li-Ion батарея обеспечивает продолжительную и бесперебойную работу.'),
(4, 'Молоток строительный', 'Инструменты', 599, 'img/product2.jpg', 2, 'Предназначен для забивания гвоздей, разбивания керамической плитки, тонкого слоя бетона, придания формы металлическим трубкам, для множества других целей.'),
(5, 'Шпатель', 'Инструменты', 290, 'img/product4.jpg', 4, 'Предназначен для нанесения шпаклевок и других строительных растворов на широкий шпатель, а также для заделки небольших трещин и швов.'),
(6, 'Гаечный ключ', 'Инструмент', 400, 'img/product5.jpg', 32, 'Предназначен для работ с различным шестигранным крепежом диаметром 17 мм.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
