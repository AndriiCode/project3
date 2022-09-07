-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 01 2016 г., 21:28
-- Версия сервера: 10.1.10-MariaDB
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cross`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_doc` (IN `Name` VARCHAR(50), IN `Description` TEXT, IN `Date` DATE)  BEGIN
INSERT INTO document ( name_document, description_document, date) values (Name, Description, Date);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_sub` (IN `Name` VARCHAR(50), IN `Res` TEXT, IN `Bud` TEXT)  BEGIN
INSERT INTO subdivision ( name_subdivision, responsible, budget) values ( Name, Res, Bud);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `cm_1`
--
CREATE TABLE `cm_1` (
`name_company` varchar(50)
,`name_housing` varchar(50)
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `cm_2`
--
CREATE TABLE `cm_2` (
`name_room` varchar(50)
,`number_room` text
,`name_subdivision` varchar(50)
,`id_housing` int(200)
);

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE `company` (
  `id_company` int(200) NOT NULL,
  `name_company` varchar(50) NOT NULL,
  `cod_company` text NOT NULL,
  `id_housing` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `document`
--

CREATE TABLE `document` (
  `id_document` int(200) NOT NULL,
  `name_document` varchar(50) NOT NULL,
  `description_document` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `document`
--

INSERT INTO `document` (`id_document`, `name_document`, `description_document`, `date`) VALUES
(3, 'Приказ', 'Передать комнату №42 лабораторному отделу ', '2016-10-05'),
(4, 'Приказ', 'Передать кабинет', '2016-12-11'),
(7, 'Приказ', 'Передать офис№4', '2016-10-08'),
(8, 'Приказ', 'Лаборатория№1', '2016-10-20'),
(9, 'Приказ', 'Передать Лабораторию№2 лабораторному отделу№2', '2016-10-29'),
(10, 'Приказ', 'Передать Лабораторию№1 лабораторному отделу№2', '2016-10-04'),
(11, 'Приказ', 'Передать...', '2016-10-08'),
(12, 'Приказ', 'Передать офис№4 отделу маркетинга', '2016-10-20'),
(13, 'Приказ', 'Передать....', '2016-10-22'),
(14, 'Приказ', 'Передать....', '2016-10-07'),
(15, 'Приказ', 'Передать', '2016-10-06'),
(16, 'Приказ', 'Передать...', '2016-10-15'),
(17, 'Приказ', 'Передать....', '2016-10-13'),
(18, 'Приказ', 'Передать...', '2016-10-03'),
(19, 'Приказ', 'Передать офис№1 управляющему отделу ', '2016-11-18'),
(20, 'Приказ', 'Передать Лабораторию№3 лабораторному отделу№3', '2016-11-13'),
(21, 'Приказ', 'Передать...', '2016-11-17');

-- --------------------------------------------------------

--
-- Структура таблицы `housing`
--

CREATE TABLE `housing` (
  `id_housing` int(200) NOT NULL,
  `name_housing` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `housing`
--

INSERT INTO `housing` (`id_housing`, `name_housing`) VALUES
(4, 'Лабораторный корпус'),
(5, 'Офисный корпус');

-- --------------------------------------------------------

--
-- Структура таблицы `room`
--

CREATE TABLE `room` (
  `id_room` int(200) NOT NULL,
  `name_room` varchar(50) NOT NULL,
  `number_room` text NOT NULL,
  `id_subdivision` int(200) DEFAULT NULL,
  `id_housing` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `room`
--

INSERT INTO `room` (`id_room`, `name_room`, `number_room`, `id_subdivision`, `id_housing`) VALUES
(3, 'Лаборатория№1', '14', 3, 4),
(6, 'Лаборатория№2', '89', 5, 4),
(8, 'склад№1', '01', NULL, 4),
(10, 'офис№2', '17', 9, 5),
(11, 'офис№3', '96', NULL, 5),
(12, 'Лаборатория№4', '354', NULL, 4),
(13, 'офис№5', '346', NULL, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `subdivision`
--

CREATE TABLE `subdivision` (
  `id_subdivision` int(200) NOT NULL,
  `name_subdivision` varchar(50) NOT NULL,
  `responsible` text NOT NULL,
  `budget` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subdivision`
--

INSERT INTO `subdivision` (`id_subdivision`, `name_subdivision`, `responsible`, `budget`) VALUES
(3, 'Лабораторный отдел№1', 'Иван Иванович', '1000$'),
(4, 'отдел маркетинга', 'Пётр Петрович', '2000$'),
(5, 'Лабораторный отдел№2', 'Иван Иванович', '800$'),
(6, 'научный отдел', 'Вася Пупкин', '1500$'),
(7, 'управляющий отдел', 'Андрей Юриевич', '3000$'),
(9, 'отдел кадров', 'Маргарита Генадиевна', '500$');

-- --------------------------------------------------------

--
-- Структура для представления `cm_1`
--
DROP TABLE IF EXISTS `cm_1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cm_1`  AS  select `company`.`name_company` AS `name_company`,`housing`.`name_housing` AS `name_housing` from (`housing` left join `company` on((`company`.`id_housing` = `housing`.`id_housing`))) ;

-- --------------------------------------------------------

--
-- Структура для представления `cm_2`
--
DROP TABLE IF EXISTS `cm_2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cm_2`  AS  select `room`.`name_room` AS `name_room`,`room`.`number_room` AS `number_room`,`subdivision`.`name_subdivision` AS `name_subdivision`,`housing`.`id_housing` AS `id_housing` from ((`housing` left join `room` on((`room`.`id_housing` = `housing`.`id_housing`))) left join `subdivision` on((`room`.`id_subdivision` = `subdivision`.`id_subdivision`))) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD KEY `id_housing` (`id_housing`);

--
-- Индексы таблицы `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`);

--
-- Индексы таблицы `housing`
--
ALTER TABLE `housing`
  ADD PRIMARY KEY (`id_housing`);

--
-- Индексы таблицы `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id_room`),
  ADD KEY `id_subdivision` (`id_subdivision`),
  ADD KEY `id_housing` (`id_housing`);

--
-- Индексы таблицы `subdivision`
--
ALTER TABLE `subdivision`
  ADD PRIMARY KEY (`id_subdivision`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `housing`
--
ALTER TABLE `housing`
  MODIFY `id_housing` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `room`
--
ALTER TABLE `room`
  MODIFY `id_room` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `subdivision`
--
ALTER TABLE `subdivision`
  MODIFY `id_subdivision` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`id_housing`) REFERENCES `housing` (`id_housing`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
