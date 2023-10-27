-- Выгрузка SQL из phpMyAdmin
-- версия 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Создано: 25 октября 2023 года в 15:30
-- Версия сервера: 10.1.38-MariaDB
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `продажаавто`
--

-- --------------------------------------------------------

--
-- Структура таблицы `авто`
--

CREATE TABLE `авто` (
  `идентификатор` int(11) NOT NULL,
  `марка` varchar(30) DEFAULT NULL,
  `модель` varchar(30) DEFAULT NULL,
  `комплектация` varchar(30) DEFAULT NULL,
  `год` int(11) DEFAULT NULL,
  `пробег` int(11) DEFAULT NULL,
  `топливо` varchar(10) DEFAULT NULL,
  `трансмиссия` varchar(10) DEFAULT NULL,
  `кВт` int(11) DEFAULT NULL,
  `цена` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных для таблицы `авто`
--

INSERT INTO `авто` (`идентификатор`, `марка`, `модель`, `комплектация`, `год`, `пробег`, `топливо`, `трансмиссия`, `кВт`, `цена`) VALUES
(1, 'Хендай', 'i10', '1.0 MPI Prime', 2018, 67965, 'Бензин', 'Автомат', 49, '10000.00'),
(2, 'Хендай', 'i10', '1.0 MPi PRIME', 2020, 65000, 'Бензин', 'Автомат', 49, '11900.00'),
(3, 'Ауди', 'A6', '3.0 tdi quattro s-line', 2018, 63000, 'Дизель', 'Полуавтомат', 160, '28900.00'),
(4, 'Ленд Ровер', 'Discovery', 'IV3.0 tdV6 SE', 2016, 11000, 'Дизель', 'Полуавтомат', 155, '27000.00'),
(5, 'Альфа Ромео', 'Giulia', '2.2 Турбодизель', 2019, 67000, 'Дизель', 'Механика', 100, '20000.00'),
(6, 'Альфа Ромео', 'Giulietta', '750 Квадрифоглио Верде', 2011, 130000, 'Бензин', 'Механика', 173, '13900.00'),
(7, 'Вольво', 'XC40', 'D3 Momentum', 2019, 174338, 'Дизель', 'Автомат', 110, '21990.00'),
(8, 'Тесла', 'Model X', '100D Dual Motor', 2017, 131800, 'Электричество', 'Автомат', 158, '54500.00'),
(9, 'Рено', 'ZOE', 'Zen R135 Flex', 2020, 23276, 'Электричество', 'Автомат', 51, '13500.00'),
(10, 'Рено', 'Clio', 'Blue dCi 8V', 2022, 16420, 'Дизель', 'Механика', 74, '15950.00');

--
-- Индексы для скачанных таблиц
--

--
-- Индексы для таблицы `авто`
--
ALTER TABLE `авто`
  ADD PRIMARY KEY (`идентификатор`);

--
-- AUTO_INCREMENT для скачанных таблиц
--

--
-- AUTO_INCREMENT для таблицы `авто`
--
ALTER TABLE `авто`
  MODIFY `идентификатор` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
