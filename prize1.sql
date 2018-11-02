-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 29 2018 г., 14:23
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `prize1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bonuses`
--

CREATE TABLE `bonuses` (
  `bonuse_id` int(3) NOT NULL,
  `bonuse_value` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `casino`
--

CREATE TABLE `casino` (
  `casino_id` int(10) NOT NULL,
  `casino_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `casino_balance` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `casino`
--

INSERT INTO `casino` (`casino_id`, `casino_name`, `casino_balance`) VALUES
(2, 'casino', 2698328);

-- --------------------------------------------------------

--
-- Структура таблицы `money`
--

CREATE TABLE `money` (
  `money_id` int(3) NOT NULL,
  `money_value` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `money`
--

INSERT INTO `money` (`money_id`, `money_value`) VALUES
(88, '2183986');

-- --------------------------------------------------------

--
-- Структура таблицы `prizes_types`
--

CREATE TABLE `prizes_types` (
  `prise_type_id` int(3) NOT NULL,
  `prise_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `prizes_types`
--

INSERT INTO `prizes_types` (`prise_type_id`, `prise_type`) VALUES
(1, 'thing'),
(2, 'money'),
(3, 'bonus');

-- --------------------------------------------------------

--
-- Структура таблицы `things`
--

CREATE TABLE `things` (
  `thing_id` int(3) NOT NULL,
  `thing_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thing_photo` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thing_price` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thing_chance` int(3) NOT NULL,
  `thing_description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `thing_quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `things`
--

INSERT INTO `things` (`thing_id`, `thing_name`, `thing_photo`, `thing_price`, `thing_chance`, `thing_description`, `thing_quantity`) VALUES
(1, 'Двуххэтажный пентхаус в Дейтона Бич', 'house.png', '20000000', 9, 'Двухуровневый пентхаус воплотил в себе все преимущества жилого пространства в комплексе самого высокого класса', 99),
(2, 'Mercedes-Benz Е-класс', 'car.png', '200000', 8, 'Седан E-Класса с удивительной легкостью воплощает в себе современный стиль и утонченную спортивность.', 100),
(3, 'Iphone x', 'iphonex.png', '2000', 5, 'Совершенно новый дисплей Super Retina с диагональю 5,8 дюйма, который удобно лежит в руке и потрясающе выглядит, - это и есть iPhone X.', 100),
(4, 'Термокружка', 'thermal_cup.png', '20', 1, 'Двухслойная конструкция из пластика внутри и нержавеющей стали снаружи.', 100),
(5, 'Пылесос Кирби.', 'dustsucker.png', '100', 7, 'Хорошо сосёт пыль и не только.', 100);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `login`, `password`) VALUES
(2, 'alucard123', 'alucard123', 'alucard123');

-- --------------------------------------------------------

--
-- Структура таблицы `user_prizes`
--

CREATE TABLE `user_prizes` (
  `user_price_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `prize_type_id` int(3) NOT NULL,
  `prize_id` int(10) NOT NULL,
  `prize_status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `user_prizes`
--

INSERT INTO `user_prizes` (`user_price_id`, `user_id`, `prize_type_id`, `prize_id`, `prize_status`) VALUES
(222, 2, 2, 88, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bonuses`
--
ALTER TABLE `bonuses`
  ADD PRIMARY KEY (`bonuse_id`);

--
-- Индексы таблицы `casino`
--
ALTER TABLE `casino`
  ADD PRIMARY KEY (`casino_id`);

--
-- Индексы таблицы `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`money_id`);

--
-- Индексы таблицы `prizes_types`
--
ALTER TABLE `prizes_types`
  ADD PRIMARY KEY (`prise_type_id`);

--
-- Индексы таблицы `things`
--
ALTER TABLE `things`
  ADD PRIMARY KEY (`thing_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user_prizes`
--
ALTER TABLE `user_prizes`
  ADD PRIMARY KEY (`user_price_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bonuses`
--
ALTER TABLE `bonuses`
  MODIFY `bonuse_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT для таблицы `casino`
--
ALTER TABLE `casino`
  MODIFY `casino_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `money`
--
ALTER TABLE `money`
  MODIFY `money_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT для таблицы `prizes_types`
--
ALTER TABLE `prizes_types`
  MODIFY `prise_type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `things`
--
ALTER TABLE `things`
  MODIFY `thing_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `user_prizes`
--
ALTER TABLE `user_prizes`
  MODIFY `user_price_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
