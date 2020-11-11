-- phpMyAdmin SQL Dump
-- version 4.4.15.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Сен 04 2017 г., 22:25
-- Версия сервера: 5.5.44-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `racing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `drift`
--

CREATE TABLE IF NOT EXISTS `drift` (
  `id` int(4) NOT NULL,
  `fio` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auto` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `accept` int(1) NOT NULL DEFAULT '0',
  `accorder` int(11) NOT NULL DEFAULT '0',
  `city` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Саратов'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `drift_qual`
--

CREATE TABLE IF NOT EXISTS `drift_qual` (
  `id` int(4) NOT NULL,
  `fio` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auto` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `res1` decimal(11,2) NOT NULL,
  `res2` decimal(11,2) NOT NULL,
  `res3` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `drift_qual`
--

INSERT INTO `drift_qual` (`id`, `fio`, `auto`, `res1`, `res2`, `res3`) VALUES
(1, 'Андрей Журин', 'Ваз 2103', 0.00, 0.00, 0.00),
(2, 'Матвеев Андрей', 'Mercedes W123', 0.00, 0.00, 0.00),
(3, 'Ян Гизатуллин', 'Газ 3110 АльфаСервис Валволин', 0.00, 0.00, 0.00),
(4, 'Илья Боинг', 'Ваз АльфаСервис Валволин 2106', 0.00, 0.00, 0.00),
(5, 'Андрей Сенько', '2105 BleachCustomShop', 0.00, 0.00, 0.00),
(6, 'Андрей Журин', 'Ваз 2103', 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Структура таблицы `drift_top2`
--

CREATE TABLE IF NOT EXISTS `drift_top2` (
  `id` int(4) NOT NULL,
  `fio` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auto` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `res1` decimal(11,2) NOT NULL,
  `res2` decimal(11,2) NOT NULL,
  `res3` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `drift_top4`
--

CREATE TABLE IF NOT EXISTS `drift_top4` (
  `id` int(4) NOT NULL,
  `fio` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auto` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `res1` decimal(11,2) NOT NULL,
  `res2` decimal(11,2) NOT NULL,
  `res3` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `drift_top8`
--

CREATE TABLE IF NOT EXISTS `drift_top8` (
  `id` int(4) NOT NULL,
  `fio` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auto` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `res1` decimal(11,2) NOT NULL,
  `res2` decimal(11,2) NOT NULL,
  `res3` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `drift_top16`
--

CREATE TABLE IF NOT EXISTS `drift_top16` (
  `id` int(4) NOT NULL,
  `fio` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auto` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `res1` decimal(11,2) NOT NULL,
  `res2` decimal(11,2) NOT NULL,
  `res3` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `drift_top24`
--

CREATE TABLE IF NOT EXISTS `drift_top24` (
  `id` int(4) NOT NULL,
  `fio` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auto` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `res1` decimal(11,2) NOT NULL,
  `res2` decimal(11,2) NOT NULL,
  `res3` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `qual`
--

CREATE TABLE IF NOT EXISTS `qual` (
  `id` int(4) NOT NULL,
  `fio` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auto` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `res1` decimal(11,2) NOT NULL,
  `res2` decimal(11,2) NOT NULL,
  `res3` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `racing`
--

CREATE TABLE IF NOT EXISTS `racing` (
  `id` int(4) NOT NULL,
  `fio` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auto` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `accept` int(1) NOT NULL DEFAULT '0',
  `accorder` int(11) NOT NULL DEFAULT '0',
  `city` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Саратов'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `racing`
--

INSERT INTO `racing` (`id`, `fio`, `auto`, `accept`, `accorder`, `city`) VALUES
(6, '', '', 0, 0, ''),
(7, 'андрей', 'ваз 2103', 0, 0, 'саратов'),
(5, 'Роман', 'Honda civic', 0, 0, 'Саратов'),
(3, 'Вельш Владимир', 'Integra', 0, 0, 'Энгельс'),
(4, 'Дмитрий Глухов', 'Subaru Impreza WRX', 0, 0, 'Пенза'),
(2, 'виктор', 'митсубиси поджеро спорт', 0, 0, 'саратов'),
(1, 'Григорий', 'Тойота', 0, 0, 'Вольск');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`name`, `value`) VALUES
('header', 'Закрытие сезона 24 Февраля.'),
('headerdrift', 'Дрифт-тренировка 15 Января.');

-- --------------------------------------------------------

--
-- Структура таблицы `thisrace`
--

CREATE TABLE IF NOT EXISTS `thisrace` (
  `chatid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ChatId Админа',
  `stage` int(11) NOT NULL COMMENT 'Этап гонки',
  `racer` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `thisrace`
--

INSERT INTO `thisrace` (`chatid`, `stage`, `racer`) VALUES
('289710549', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL,
  `user_login` varchar(20) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `admin`) VALUES
(1, 'admin', '39f61dabbf917c9e265108391f1dbba2', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `qual`
--
ALTER TABLE `qual`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `qual`
--
ALTER TABLE `qual`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
