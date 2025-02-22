-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 22 2025 г., 18:05
-- Версия сервера: 5.7.39
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gostin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bron`
--

CREATE TABLE `bron` (
  `id_bron` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_uslugi` int(11) DEFAULT NULL,
  `id_nomer` int(11) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `nomers`
--

CREATE TABLE `nomers` (
  `id_nomer` int(11) NOT NULL,
  `namen` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nomers`
--

INSERT INTO `nomers` (`id_nomer`, `namen`, `description`, `price`, `photo`) VALUES
(1, 'Стандарт', 'Отличный вариант для путешествия. Простой и функциональный номер.Одноместные номера.Площадь - 24 кв. м', '2300.00', '1.png'),
(2, 'Комфорт', 'Удобные и уютные номера идеально подойдут как для отдыха, так и для деловых поездок.Одноместные номера.Площадь - 38 кв. м', '2700.00', '2.png'),
(3, 'Бизнес', 'Номер в гостинице обеспечит каждому гостю высокое качество сервиса по разумной цене.Двухместные номера.Площадь - 46 кв. м', '2900.00', '3.png'),
(4, 'Делюкс', 'Номер позволит ощутить себя как дома. Подходит для приятного отдыха двух гостей.Двухместные номера.Площадь - 46 кв. м', '3400.00', '4.png'),
(5, 'Сьют', 'Номера повышенной комфортности, с улучшенной планировкой и современным дизайном. Подходит для приятного отдыха двух гостей. Двухместные номера. Площадь - 46 кв. м', '5000.00', '5.png'),
(6, 'Люкс', 'Роскошный номер улучшенной планировки, который имеет общую площадь 60 квадратных метров.Состоит из двух жилых комнат - гостиной и спальни.', '7000.00', '6.png');

-- --------------------------------------------------------

--
-- Структура таблицы `otzivs`
--

CREATE TABLE `otzivs` (
  `id_otziv` int(11) NOT NULL,
  `ball` int(11) NOT NULL,
  `description` text,
  `id_bron` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `namer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id_role`, `namer`) VALUES
(1, 'Руководитель'),
(2, 'Администратор'),
(3, 'Бухгалтер'),
(4, 'Клиент');

-- --------------------------------------------------------

--
-- Структура таблицы `type_nomer`
--

CREATE TABLE `type_nomer` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_nomer`
--

INSERT INTO `type_nomer` (`id_type`, `name_type`) VALUES
(1, 'Стандарт'),
(2, 'Комфорт'),
(3, 'Бизнес'),
(4, 'Делюкс'),
(5, 'Сьют'),
(6, 'Люкс');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `pasport_number` varchar(15) NOT NULL,
  `pasport_date` date NOT NULL,
  `date_birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `login`, `pass`, `fio`, `phone`, `pasport_number`, `pasport_date`, `date_birthday`) VALUES
(3, 3, 'nelli', '555', 'Бархович Нелли Сергеевна', '79282005050', '5555', '2025-02-01', '2002-04-01');

-- --------------------------------------------------------

--
-- Структура таблицы `uslugi`
--

CREATE TABLE `uslugi` (
  `id_uslugi` int(11) NOT NULL,
  `name_usluga` varchar(255) NOT NULL,
  `opisanie` text NOT NULL,
  `ed_izm` varchar(255) DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `uslugi`
--

INSERT INTO `uslugi` (`id_uslugi`, `name_usluga`, `opisanie`, `ed_izm`, `price`, `img`) VALUES
(1, 'Питание', 'Завтрак,обед,ужин', NULL, '500.00', '8.png'),
(2, 'Релакс', 'массаж, спа, бассейн', NULL, '2000.00', '12.png'),
(3, 'Прачечная', 'стирка, глажка', NULL, '400.00', '15.png'),
(4, 'Поздравления', 'оформление номера, заказ цветов, фруктов, торта', NULL, '300.00', '13.png'),
(5, 'Детская', 'няня, кроватка, аренда коляски', NULL, '500.00', '16.png'),
(6, 'Трансфер', 'перевозка пассажиров из условленного места к другому заранее согласованному месту', NULL, '350.00', '14.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bron`
--
ALTER TABLE `bron`
  ADD PRIMARY KEY (`id_bron`),
  ADD KEY `id_nomera` (`id_nomer`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_uslugi` (`id_uslugi`);

--
-- Индексы таблицы `nomers`
--
ALTER TABLE `nomers`
  ADD PRIMARY KEY (`id_nomer`);

--
-- Индексы таблицы `otzivs`
--
ALTER TABLE `otzivs`
  ADD PRIMARY KEY (`id_otziv`),
  ADD KEY `id_bron` (`id_bron`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `type_nomer`
--
ALTER TABLE `type_nomer`
  ADD PRIMARY KEY (`id_type`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Индексы таблицы `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id_uslugi`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bron`
--
ALTER TABLE `bron`
  MODIFY `id_bron` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `nomers`
--
ALTER TABLE `nomers`
  MODIFY `id_nomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `otzivs`
--
ALTER TABLE `otzivs`
  MODIFY `id_otziv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `type_nomer`
--
ALTER TABLE `type_nomer`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id_uslugi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bron`
--
ALTER TABLE `bron`
  ADD CONSTRAINT `bron_ibfk_1` FOREIGN KEY (`id_nomer`) REFERENCES `nomers` (`id_nomer`),
  ADD CONSTRAINT `bron_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `bron_ibfk_3` FOREIGN KEY (`id_uslugi`) REFERENCES `uslugi` (`id_uslugi`);

--
-- Ограничения внешнего ключа таблицы `nomers`
--
ALTER TABLE `nomers`
  ADD CONSTRAINT `nomers_ibfk_1` FOREIGN KEY (`id_nomer`) REFERENCES `type_nomer` (`id_type`);

--
-- Ограничения внешнего ключа таблицы `otzivs`
--
ALTER TABLE `otzivs`
  ADD CONSTRAINT `otzivs_ibfk_1` FOREIGN KEY (`id_bron`) REFERENCES `bron` (`id_bron`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
