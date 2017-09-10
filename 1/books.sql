-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 10 2017 г., 12:20
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `patronymic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`, `surname`, `patronymic`) VALUES
(1, 'Эрих', 'Гамма', NULL),
(2, 'Ричард', 'Хелм', NULL),
(3, 'Ральф', 'Джонсон', NULL),
(4, 'Ричард', 'Хелм', NULL),
(5, 'Джон', 'Влиссидес', NULL),
(6, 'Ирина', 'Домбровская\r\n', 'Геннадьевна'),
(7, 'Марк', 'Выгодский', 'Яковлевич'),
(8, 'Джозеф', 'Олбахари', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `published` year(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `published`) VALUES
(1, 'Теория баз данных', 1997),
(2, 'ООП', 2002),
(3, 'Высшая Матиматика', 1993),
(4, 'C#', 2006);

-- --------------------------------------------------------

--
-- Структура таблицы `books_authors`
--

CREATE TABLE IF NOT EXISTS `books_authors` (
  `id_book` int(10) unsigned NOT NULL,
  `id_author` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_authors`
--

INSERT INTO `books_authors` (`id_book`, `id_author`) VALUES
(2, 1),
(2, 2),
(1, 3),
(1, 4),
(2, 5),
(1, 6),
(3, 7),
(4, 8);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books_authors`
--
ALTER TABLE `books_authors`
  ADD PRIMARY KEY (`id_book`,`id_author`),
  ADD KEY `id_author` (`id_author`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books_authors`
--
ALTER TABLE `books_authors`
  ADD CONSTRAINT `books_authors_author` FOREIGN KEY (`id_author`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_authors_book` FOREIGN KEY (`id_book`) REFERENCES `books` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
