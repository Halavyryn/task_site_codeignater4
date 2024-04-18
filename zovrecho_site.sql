-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 18 2024 г., 13:59
-- Версия сервера: 5.7.42-cll-lve
-- Версия PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zovrecho_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`) VALUES
(1, 'Без категории', 'Используется для главных категорий', 25),
(17, 'Xiaomi', 'краткое описание категории', 45),
(20, 'Asus', 'Категория Asus', 47),
(21, 'Honor', 'Категория Honor', 46),
(22, 'Sennheiser', 'Категория Sennheiser', 44),
(23, 'LG', 'Категория LG', 42),
(24, 'POCO', 'Категория POCO', 46),
(25, 'Samsung', 'Категория Samsung', 43),
(42, 'Аксессуары', 'краткое описание категории', 1),
(43, 'Телевизоры', 'краткое описание категории', 1),
(44, 'Наушники', 'краткое описание категории', 1),
(45, 'Смартфоны', 'краткое описание категории', 1),
(46, 'Планшеты', 'краткое описание категории', 1),
(47, 'Ноутбуки', 'краткое описание категории', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `file` varchar(50) NOT NULL,
  `name_product` varchar(150) NOT NULL,
  `check_mark_product` varchar(50) NOT NULL,
  `price_product` decimal(10,2) NOT NULL,
  `rating_product` int(11) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `file`, `name_product`, `check_mark_product`, `price_product`, `rating_product`, `category_id`) VALUES
(57, 'product1.png', 'Смартфон POCO M4 PRO 5G 4GB/64GB Yellow EU', 'в наличии', 489.00, 4, 1),
(58, 'product2.png', 'Смартфон Apple iPhone 15 Pro Max 256GB Blue Titanium (MU6T3J/A)', 'в наличии', 5999.00, 4, 45),
(59, 'product3.png', 'Смартфон Xiaomi Redmi Note 12 8GB/256GB without NFC Ice Blue EU', 'в наличии', 799.00, 4, 17),
(60, 'product4.png', 'Смартфон Samsung Galaxy A34 5G SM-A346 6GB/128GB (серебристый)', 'в наличии', 899.00, 4, 25);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(12, 'admin', 'admin@by.com', '$2y$10$Tpur272QW7FvbaAjbbC85OO8zaffw6fCuvnv0hxLXebLSUN66j3xe', '2024-04-17 09:45:43');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
