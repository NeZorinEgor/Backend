-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3308
-- Время создания: Май 19 2023 г., 19:18
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ADMINISTRATION`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int UNSIGNED NOT NULL,
  `topic` varchar(255) NOT NULL,
  `type` enum('встреча','звонок','совещание','дело') NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date_time` datetime NOT NULL,
  `duration` int DEFAULT NULL,
  `comment` text,
  `status` enum('текущая задача','просроченная','готово') NOT NULL DEFAULT 'текущая задача'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `topic`, `type`, `location`, `date_time`, `duration`, `comment`, `status`) VALUES
(1, 'Мобильное приложение для банка', 'совещание', 'Иркутск', '2023-05-19 20:43:00', 60, 'Я люблю Flutter!', 'готово'),
(2, 'Сайт', 'совещание', 'Иркутск', '2023-05-28 21:08:00', 120, 'Все нормально ', 'готово'),
(3, 'Сервер', 'встреча', 'Иркутск', '2023-05-27 22:12:00', 180, 'VPS', 'готово'),
(4, 'Просрочка тест', 'дело', 'Просрочка тест', '2023-05-17 23:52:00', 123, 'Просрочка тест', 'просроченная'),
(5, 'Мобильное приложение для банка', 'встреча', 'Иркутск', '2023-06-04 23:58:00', 22, '123', 'текущая задача'),
(6, 'Сайт', 'совещание', '123123123', '2023-05-03 23:59:00', 123123, '123123', 'просроченная'),
(7, 'ФФФФФФФФФФФФФФФФФ', 'звонок', 'Иркутск', '2023-05-21 00:02:00', 21, '3333', 'текущая задача'),
(8, 'Сайт', 'совещание', 'На дому', '2023-05-21 00:06:00', -2, '', 'текущая задача');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'zorin-ep@mail.ru', '123'),
(2, 'zorin-ep@mail.ru123123', '123'),
(3, 'alex@123', '12345');

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
