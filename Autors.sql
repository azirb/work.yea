-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 27 2019 г., 21:44
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Autors`
--

CREATE TABLE `Autors` (
  `Autor` varchar(100) NOT NULL,
  `Book's` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Autors`
--

INSERT INTO `Autors` (`Autor`, `Book's`) VALUES
('Лев Николаевич Толстой', 'Война и мир, Анна Каренина, Чем люди живы, Два старика, Три старца, Корней Васильев, Молитва'),
('', ''),
('Тургеньев Иван Сергеевич', 'Бежин луг, Бирюк, Певцы, Хорь и Калиныч'),
('', ''),
('Александр Сергеевич Пушкин', 'Песнь о Вещем Олеге, Сказка о золотом петушке, Сказка о мёртвой царевне и о семи богатырях, Сказка о попе и о работнике его Балде, Сказка о рыбаке и рыбке'),
('', ''),
('Сергей Александрович Есенин', 'Я иду долиной. На затылке кепи…, Как должна рекомендоваться Марина, Нивы сжаты, рощи голы…, Черемуха, Вечер, как сажа…, Бабушкины сказки, С добрым утром!, Пороша');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
