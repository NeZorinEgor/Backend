-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 03 2023 г., 18:42
-- Версия сервера: 5.7.36-39
-- Версия PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_calendar12340`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic` varchar(255) NOT NULL,
  `type` enum('встреча','звонок','совещание','дело') NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `comment` text,
  `status` enum('текущая задача','просроченная','готово') NOT NULL DEFAULT 'текущая задача'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `topic`, `type`, `location`, `date_time`, `duration`, `comment`, `status`) VALUES
(18, 'Flutter dev', 'дело', 'На дому', '2023-08-01 21:02:00', 600, 'Разработка приложений ', 'готово'),
(19, 'Kotlin', 'дело', 'На дому', '2023-10-01 00:14:00', 10080, 'android dev', 'готово'),
(20, 'Firebase', 'дело', 'На дому', '2023-06-01 14:09:00', 600, 'Выбор бд', 'просроченная'),
(21, 'C++', 'дело', 'На дому', '2023-05-01 14:59:00', 900, 'Выучить с++ до конча лета', 'просроченная'),
(22, 'PHP Laravel', 'дело', 'На дому', '2023-07-01 23:39:00', 10080, 'Понять природу сервера', 'текущая задача'),
(23, 'Docker', 'дело', 'На дому', '2023-07-01 23:41:00', 900, 'Научиться деплоить в контейнер', 'текущая задача');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'test@123', 'test@123'),
(2, 'polinalebedeva04@gmail.com', '123'),
(3, 'zorin-ep@mail.ru', '12345');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
