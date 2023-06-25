-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июн 07 2023 г., 10:39
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
-- База данных: `plushki`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--

CREATE TABLE `bookings` (
  `id_booking` int NOT NULL,
  `client` int NOT NULL,
  `event` int NOT NULL,
  `date_booking` date NOT NULL,
  `comment` varchar(150) NOT NULL,
  `amount` varchar(150) NOT NULL,
  `status` int NOT NULL,
  `date_submission` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `bookings`
--

INSERT INTO `bookings` (`id_booking`, `client`, `event`, `date_booking`, `comment`, `amount`, `status`, `date_submission`) VALUES
(7, 11, 3, '2023-06-15', '-', '12', 2, '2023-06-07 06:18:02'),
(8, 10, 1, '2023-06-08', '-', '3', 1, '2023-06-07 06:20:28'),
(9, 10, 4, '2023-06-21', 'Хочу капибару', '2', 2, '2023-06-07 06:46:03');

-- --------------------------------------------------------

--
-- Структура таблицы `events`
--

CREATE TABLE `events` (
  `id_event` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `price` varchar(150) NOT NULL,
  `description` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `events`
--

INSERT INTO `events` (`id_event`, `title`, `photo`, `price`, `description`) VALUES
(1, 'Игровые автоматы', 'GameCenter.jpg', '500', 'Здесь вы найдете большой выбор разнообразных игр - от классических слотов до современных видео-игр. Мы постоянно следим за обновлением ассортимента и заботимся о вашем комфорте'),
(3, 'Боулинг', '1192b3d51b4bd82cd73cac5fd48fe15c.jpg', '600', 'Боулинг - это не просто интересное соревнование, это всегда яркие впечатления и незабываемые воспоминания. <br> Для комфортной игры количество игроков на одной дорожке – 5 человек <br> Максимальное количество игроков на одной дорожке – 7 человек <br> Неоплаченная бронь отменяется за 15 минут до начала игры <br> Продление времени игры возможно только при наличии свободных дорожек'),
(4, 'Контактный зоопарк', '1675366270_phonoteka-org-p-oboi-kapibara-na-rabochii-stol-vkontakte-26.jpg', '550', 'Для современного городского жителя мир дикой природы почти всегда в диковинку.  <br> Зоопарки — это наш редкий шанс понаблюдать за животными, кроме домашних. Они несут не только развлекательную, но в том числе и важную воспитательную функцию.'),
(7, 'Картинг', 'orig.jpg', '300', 'Картинг — это вид гонки на специальных малолитражных гоночных автомобилях с маленькими колёсами. Такие мини-авто называются картами. Они состоят из рамы, сидения и двигателя. При этом у них нет кузова и упругой подвески. А ещё карты не знают что такое задний ход.'),
(8, 'Американские горки', 'a81b05fbd1d6dd17b1bb96d0829980e0.jpg', '300', 'Этот аттракцион подойдет тем, кто жаждет экстрима, но предпочитает постепенный накал эмоций. Высота конструкции горки составляет 8 метров, а петли и виражи на трассе заставят сердце биться значительно быстрее, тренируя Ваш разум и волю перед подступом к новым вершинам'),
(10, 'Лазертаг', 'lasertag_laserland.jpg', '500', 'Настоящий мини экшн-квест с лазерным лабиринтом, интерактивным тиром и аттракционом.\r\n\r\nВы - космические авантюристы, которые оказались на борту инопланетного корабля! Преодолейте лазерную систему безопасности с десятками лазерных лучей, стараясь не задеть их. Как в шпионских фильмах. Получите доступ к арсеналу с оружием и дайте бой по инопланетным мишеням! На что способны Вы? Проявите свою ловкость, гибкость, реакцию и скорость.');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int NOT NULL,
  `name_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `name_role`) VALUES
(1, 'Администратор '),
(2, 'Пользователь'),
(3, 'Гость');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `name_status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `name_status`) VALUES
(1, 'Ожидание'),
(2, 'Принято'),
(3, 'Отклонено ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `roles` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `name`, `surname`, `password`, `email`, `phone`, `photo`, `roles`) VALUES
(2, 'admin', 'admin', 'admin', 'admin', 'admin', 'unknownUser.png', 1),
(10, 'Даня', 'Махмутов', '727', 'da@mail.ru', '+79613690452', '6526591210.webp', 2),
(11, 'Иван', 'Иванов', '555', '12@mail.ru', '+78005553535', '6442355251.webp', 2),
(13, 'dssds', 'sdsd', '555', 'da@mail.ru', '+79613690452', 'unknownUser.png', 2),
(14, 'dssds', 'sdsd', '555', 'da@mail.ru', '+79613690452', 'unknownUser.png', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `client` (`client`),
  ADD KEY `event` (`event`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `roles` (`roles`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id_booking` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`client`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`event`) REFERENCES `events` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles`) REFERENCES `roles` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
