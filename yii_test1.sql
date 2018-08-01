-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 01 2018 г., 13:23
-- Версия сервера: 10.1.32-MariaDB
-- Версия PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii_test1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1532601759),
('m130524_201442_init', 1532601762);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT '2018-07-27 10:08:39',
  `author` int(11) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `datetime`, `author`, `nickname`, `parent`) VALUES
(15, '123124', '1244', '0000-00-00 00:00:00', NULL, 'Алексей', NULL),
(18, 'trhtht', 'hrthrthrth54', '2018-07-27 10:08:39', 2, NULL, NULL),
(19, '6r6', 'i67', '2018-07-27 14:36:01', NULL, NULL, NULL),
(20, '1123', '123123123123', '0000-00-00 00:00:00', 1, NULL, NULL),
(21, 'ooo', 'ooooooooooooooooooooooo', '2018-07-27 10:39:11', NULL, NULL, NULL),
(22, 'jkljhklhjk', 'jhklhjkljh', '2018-07-27 10:39:33', NULL, NULL, NULL),
(23, 'tyd', 'ytjty', '2018-07-27 10:51:55', NULL, NULL, NULL),
(24, '8k66f', 'y67ky67fgk', '2018-07-27 14:35:54', NULL, NULL, NULL),
(25, 'jty', 'rrhthsrhth', '2018-07-27 16:40:23', NULL, NULL, NULL),
(26, 'Новая запись', 'Новая записьНовая записьНовая записьНовая записьНовая записьНовая записьНовая записьНовая запись\r\nНовая записьНовая записьНовая записьНовая записьНовая записьНовая записьНовая записьНовая запись\r\nНовая записьНовая записьНовая записьНовая записьНовая записьНовая записьНовая записьНовая запись', '2018-07-30 13:34:22', 1, NULL, NULL),
(29, '345345345', '3453543453', '2018-07-28 22:05:54', NULL, NULL, NULL),
(30, 'запись номер 13', 'Sort represents information relevant to sorting.\r\n\r\nWhen data needs to be sorted according to one or several attributes, we can use Sort to represent the \r\nsorting information and generate appropriate hyperlinks that can lead to sort actions.\r\n\r\nA typical usage example is as follows,', '2018-07-29 09:17:07', NULL, NULL, NULL),
(31, 'rrrrrrrrrrrrr', 'rrrrrrrrrrrrrrrrrrrrrr', '2018-07-29 16:44:45', NULL, NULL, NULL),
(32, 'tttttttttttttttt', 'ttttttttttttttttttttttt', '2018-07-29 16:46:28', 1, NULL, NULL),
(33, 'ttttttttttttttttui', 'tttttttttttttttttttttttui', '2018-07-29 16:47:29', 1, NULL, NULL),
(40, 'Комментарий', '.io.i', '2018-07-30 12:12:46', 1, NULL, 33),
(41, 'Комментарий', 'liuyuilululu', '2018-07-30 12:13:02', 1, NULL, 33),
(42, 'Комментарий', 'tyeyetntynt', '2018-07-30 12:14:25', NULL, 'darxriass', 33),
(43, 'Комментарий', 'комментируем от имени гостя ', '2018-07-30 13:12:50', NULL, 'ник', 30),
(44, 'Комментарий', 'hstktmpshshtr aargraage eragaege ewgagwegreage ergergergesrg greagraergaegaer eragergaergaerg\r\n geagaergaergag weraergsae garewgraegaeg rgaergrg graegr graegaer egarge\r\n\r\naegrgrrga eraggrqa', '2018-07-30 13:20:33', NULL, 'gut', 30),
(46, 'Комментарий', 'yukutktkyu yuktutyuky yuktukyuty ytuktyukyktyuk yuktuktyk yukutktkyu yuktutyuky yuktukyuty \r\nytuktyukyktyuk yuktuktyk yukutktkyu yuktutyuky yuktukyuty ytuktyukyktyuk yuktuktyk yukutktkyu \r\nyuktutyuky yuktukyuty ytuktyukyktyuk yuktuktyk yukutktkyu yuktutyuky yuktukyuty ytuktyukyktyuk \r\nyuktuktyk yukutktkyu yuktutyuky yuktukyuty ytuktyukyktyuk yuktuktyk yukutktkyu yuktutyuky yuktukyuty\r\n ytuktyukyktyuk yuktuktyk yukutktkyu yuktutyuky yuktukyuty ytuktyukyktyuk yuktuktyk yukutktkyu\r\n yuktutyuky yuktukyuty ytuktyukyktyuk yuktuktyk ', '2018-07-30 14:09:21', 1, NULL, 30),
(47, 'Комментарий', 'комментарий к записи 31', '2018-07-30 14:42:29', 1, NULL, 31),
(48, 'Комментарий', 'комментарий к записи 31', '2018-07-30 14:42:29', 1, NULL, 31),
(49, 'Комментарий', 'rtssrthjsrthsrdths rthrsdthdrthdrt sthsdrthrsthdt', '2018-07-30 15:27:24', 2, NULL, 30),
(50, 'Комментарий', 'комментария комент типа комента', '2018-07-31 19:52:35', 1, NULL, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status_adm` tinyint(1) NOT NULL,
  `link_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT '../../htdocs/upload/default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `description`, `status_adm`, `link_image`) VALUES
(1, 'admin', 'enSo0wZafFu1k4hZQT2Urc464kBUvaAf', '$2y$13$oVaTWxNEt093giaoLEGuqun1MRjenlGMc8zT35MphuD9U.u035dw6', NULL, 'darxriass@gmail.com', 10, 1532603846, 1533062228, 'одмин', 1, '../../htdocs/upload/image/professional-80.png'),
(2, 'userp', 'rFUeDCzONBzQ8ma-jsrsD7gLEjXv79ck', '$2y$13$0/23r7JrP7aCGWsXEf4VYOfMj0O717KsP9Vn2mvrri5g1U7/96tBC', NULL, 'da@da.ru', 10, 1532675883, 1533042484, 'rj67j6j7', 0, '../../htdocs/upload/image/fast-80.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `author_2` (`author`),
  ADD KEY `author_3` (`author`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
