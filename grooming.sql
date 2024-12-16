-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 12:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grooming`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `service_id`, `size_id`, `price`, `appointment_date`, `appointment_time`, `customer_name`, `customer_email`, `customer_phone`, `created_at`) VALUES
(1, 1, 1, 40.00, '2024-12-12', '08:00:00', 'Виктория Петрова', 'viki@gmail.com', '0888123456', '2024-12-11 13:53:56'),
(2, 1, 3, 80.00, '2024-12-12', '13:00:00', 'Татяна Иванова', 'tatyana@gmail.com', '0888123456', '2024-12-11 13:58:01'),
(3, 5, 1, 10.00, '2024-12-13', '16:00:00', 'Марин Щерев', 'marin@gmail.com', '0888123456', '2024-12-11 14:05:41'),
(4, 5, 2, 10.00, '2024-12-13', '11:00:00', 'Димитър Маринов', 'dimitar@gmail.com', '0888123456', '2024-12-11 14:18:24'),
(5, 2, 4, 10.00, '2024-12-13', '12:00:00', 'Георги Стоянов', 'george@gmail.com', '0888123456', '2024-12-11 14:52:10'),
(6, 4, 1, 10.00, '2024-12-12', '14:00:00', 'Стефан Петров', 'stephen@gmail.com', '0888123456', '2024-12-11 19:23:57'),
(7, 3, 4, 50.00, '2024-12-13', '08:00:00', 'Диана Миткова', 'diana@gmail.com', '0888123456', '2024-12-12 13:22:36'),
(8, 2, 1, 55.00, '2024-12-16', '10:00:00', 'Яница Димитрова', 'yanitsa@gmail.com', '0888123456', '2024-12-13 21:38:52'),
(9, 2, 1, 55.00, '2024-12-17', '10:00:00', 'Мария Петрова', 'mariya@gmail.com', '0888123456', '2024-12-16 21:37:34'),
(10, 3, 1, 20.00, '2024-12-17', '09:00:00', 'Мария Петрова', 'mariya@gmail.com', '0888123456', '2024-12-16 21:50:01'),
(11, 3, 1, 20.00, '2024-12-18', '08:00:00', 'Мария Петрова', 'mariya@gmail.com', '0888123456', '2024-12-16 22:03:30'),
(12, 2, 3, 85.00, '2024-12-17', '14:00:00', 'Петър Стоянов', 'petar@gmail.com', '0888123456', '2024-12-16 22:05:10'),
(13, 6, 1, 20.00, '2024-12-17', '13:00:00', 'Юлиан Димов', 'yulian@gmail.com', '0888123456', '2024-12-16 22:06:34'),
(14, 2, 4, 120.00, '2024-12-18', '12:00:00', 'Стефан Стефанов', 'stephen@gmail.com', '0888123456', '2024-12-16 22:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `breed_sizes`
--

CREATE TABLE `breed_sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breed_sizes`
--

INSERT INTO `breed_sizes` (`id`, `name`) VALUES
(1, 'Малка порода'),
(2, 'Средна порода'),
(3, 'Голяма порода'),
(4, 'Екстра голяма');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `first_name`, `last_name`, `phone`, `address`, `image`) VALUES
(1, 'Алина', 'Петрова', '0888123456', 'гр.София, кв.Младост', '..\\assets\\images\\profiles\\profile1.jpg'),
(2, 'Иван', 'Иванов', '0888123456', 'гр.София, кв.Младост', '..\\assets\\images\\profiles\\profile2.jpg'),
(3, 'Калина', 'Генова', '0888123456', 'гр.София, кв.Младост', NULL),
(4, 'Яница', 'Филипова', '', '', NULL),
(6, 'Лазар', 'Канзафиров', '+359888222222', 'гр.Варна, жк Възраждане, бл.12', NULL),
(7, 'Павел', 'Георгиев', NULL, NULL, NULL),
(9, 'Яна', 'Петрова', NULL, NULL, NULL),
(10, 'Димо', 'Димов', NULL, NULL, NULL),
(11, 'Петър', 'Генов', NULL, NULL, NULL),
(12, 'Ина', 'Славова', NULL, NULL, NULL),
(13, 'Алина', 'Генова', NULL, NULL, NULL),
(15, 'Иван', 'Георгиев', NULL, NULL, NULL),
(16, 'Мария', 'Стоева', NULL, NULL, NULL),
(17, 'Виктория', 'Щерева', NULL, NULL, NULL),
(19, 'Боян ', 'Боянов', '+359888222222', 'гр. Пловдив, ул. Роза 15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image`) VALUES
(1, 'Къпане и изсушаване', 'Освежете домашния си любимец с професионално къпане и нежно изсушаване, които гарантират чистота и комфорт. Подбираме внимателно подходящи шампоани, за да осигурим релаксиращо и приятно изживяване. Подарете на вашия любимец перфектна грижа за мека и блестяща козина!', '..\\assets\\images\\cards\\card1.jpeg'),
(2, 'Подстригване', 'Подарете на вашия любимец стилна и удобна прическа с професионално подстригване, съобразено с неговите нужди. Грижим се за поддържаната му козина с внимание към детайла, за да има перфектен вънщен вид и да се чувства прекрасно.', '..\\assets\\images\\cards\\card2.jpg'),
(3, 'Разресване', 'Подарете на вашия любимец гладка и здрава козина с професионално разресване, което премахва заплитанията с лекота. Нежно поддържаме козината му, за да изглежда стилно и впечатляващо. Комфортът и грижата за вашия четириног приятел са винаги наш приоритет!', '..\\assets\\images\\cards\\card3.jpg'),
(4, 'Почистване на уши', 'Погрижете се за здравето и комфорта на вашия любимец с професионално почистване на ушите. Нежно и безопасно премахваме натрупванията, за да предотвратим инфекции и да осигурим чистота. За щастлив и доволен любимец, който се чувства прекрасно!', '..\\assets\\images\\cards\\card4.jpeg'),
(5, 'Изрязване на нокти', 'Осигурете здраве и комфорт на вашия любимец с професионално изрязване на нокти. Нежно и безопасно подрязваме ноктите, за да предотвратим дискомфорт и наранявания. Здрави лапи за активен и щастлив любимец, който заслужава най-добрата грижа!', '..\\assets\\images\\cards\\card5.jpg'),
(6, 'Почистване на зъби', 'Представяме ви новата ни услуга за почистване на зъби! Предлагаме професионално и нежно почистване, което помага за поддържане на чисти зъби. Използваме безопасни и ефективни методи и продукти, осигурявайки комфорт и релаксация на вашето куче през целия процес.', '..\\assets\\images\\cards\\card6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_prices`
--

CREATE TABLE `service_prices` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_prices`
--

INSERT INTO `service_prices` (`id`, `service_id`, `size_id`, `price`) VALUES
(1, 1, 1, 40.00),
(2, 1, 2, 60.00),
(3, 1, 3, 80.00),
(4, 1, 4, 100.00),
(5, 2, 1, 55.00),
(6, 2, 2, 65.00),
(7, 2, 3, 85.00),
(8, 2, 4, 120.00),
(9, 3, 1, 20.00),
(10, 3, 3, 30.00),
(11, 3, 3, 40.00),
(12, 3, 4, 50.00),
(13, 4, 1, 10.00),
(14, 4, 2, 10.00),
(15, 4, 3, 15.00),
(16, 4, 4, 15.00),
(17, 5, 1, 10.00),
(18, 5, 2, 10.00),
(19, 5, 3, 15.00),
(20, 5, 4, 15.00),
(21, 6, 1, 20.00),
(22, 6, 2, 20.00),
(23, 6, 4, 30.00),
(24, 6, 4, 30.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'alina@gmail.com', 'Алина', 'Петрова', '*19D81809049212F6CEA0AB01A65DCF97BD00CBB9', '2024-12-13 17:34:52', '2024-12-14 13:47:20'),
(2, 'ivan@gmail.com', 'Иван', 'Иванов', '$argon2i$v=19$m=65536,t=4,p=1$VUczdHU3dGdDRDVvNWsvaA$Vjd2wFjykXjOJlVLZ8tCJk2/crlTANb2Go4uUVLWnWs', '2024-12-14 14:23:05', '2024-12-14 14:23:05'),
(3, 'kalina@gmail.com', 'Калина', 'Генова', '$argon2i$v=19$m=65536,t=4,p=1$bnB4WFFXbGJXUlh4REtzdA$c15ynwr7Y8bLpa/58tfSfQcbF/lmCgvd3myixvqkQAs', '2024-12-14 14:51:21', '2024-12-14 14:51:21'),
(4, 'yanitsa@gmail.com', 'Яница', 'Филипова', '$argon2i$v=19$m=65536,t=4,p=1$U3k2cktyUFgyc2dpQVc3Ng$wnPqTNgC+j9ASjm/bgQ/bjaNPNTHfVD1P90I6DGAXhA', '2024-12-14 22:28:38', '2024-12-14 22:28:38'),
(6, 'lazar@gmail.com', 'Лазар', 'Канзафиров', '$argon2i$v=19$m=65536,t=4,p=1$b1FBYzV1Z2s5NGhtQW1hZg$y4zOwa8Q5U5itiOPjLP9+4iSpcQGQvCwlgFMYIUSuoU', '2024-12-14 23:13:13', '2024-12-15 13:25:03'),
(7, 'pavel@gmail.com', 'Павел', 'Георгиев', '$argon2i$v=19$m=65536,t=4,p=1$Q2VsWnBWRzdjWmtyU2JuUA$2iLL2rOgjtqmY5dkCWbve1bKbQPaW7P3f/cHtUlsTJ4', '2024-12-16 09:38:45', '2024-12-16 09:38:45'),
(9, 'yana@gmail.com', 'Яна', 'Петрова', '$argon2i$v=19$m=65536,t=4,p=1$NkhzakIxa0tBV1BxMXRVOA$j8Ny7bDCI83Fd3WMIE4ScPsOWyCSR7GUoUPyeSYuqz0', '2024-12-16 10:27:53', '2024-12-16 10:27:53'),
(10, 'dimo@gmail.com', 'Димо', 'Димов', '$argon2i$v=19$m=65536,t=4,p=1$NW12ODRiOGsvZmc4WWthUg$g4iFLaBrWqr72s14KaDAzjRp5ZqohcGXpfiPnlt77lc', '2024-12-16 12:04:36', '2024-12-16 12:04:36'),
(11, 'petar@gmail.com', 'Петър', 'Генов', '$argon2i$v=19$m=65536,t=4,p=1$dC5XblZzNmZvU01YSXg5TA$iT4CAN1WLIQsNLQJCLwCjHFihaD9gcnU4W4uO07/Uds', '2024-12-16 12:37:13', '2024-12-16 12:37:13'),
(12, 'ina@gmail.com', 'Ина', 'Славова', '$argon2i$v=19$m=65536,t=4,p=1$ZkZGRFBqci5PTW5NcEdvNw$ifUnnoMtCNdjyc3c6D26pv/dhbgnEYFBMaAnR45fvSo', '2024-12-16 13:15:01', '2024-12-16 13:15:01'),
(13, 'alina2345@gmail.com', 'Алина', 'Генова', '$argon2i$v=19$m=65536,t=4,p=1$MTRMUVU2NG4wbi8yWExtVw$+XwjuhCiZiSCbWF19cZ1TSC0j+pxHyJ4tdtTZbEcvA8', '2024-12-16 13:25:30', '2024-12-16 13:25:30'),
(14, 'george@gmail.com', 'Георги ', 'Георгиев', '$argon2i$v=19$m=65536,t=4,p=1$c2lvM1F5bzZDeHE0YmRSZA$LMJEDPDZ2CGEPp0t26vSRMPK7Iiu6ywf/P76Os3YS9k', '2024-12-16 13:50:53', '2024-12-16 13:50:53'),
(15, 'ivan2@gmail.com', 'Иван', 'Георгиев', '$argon2i$v=19$m=65536,t=4,p=1$Llg3ZVVDQmRhNVZPOHByaA$Y0LQ37I2hQ4ZdSxyau4900TVULvRF4HK7TWaK1m3D3E', '2024-12-16 13:55:15', '2024-12-16 13:55:15'),
(16, 'mariya@gmail.com', 'Мария', 'Стоева', '$argon2i$v=19$m=65536,t=4,p=1$bU01dmouWGdJdnJrRGhxMw$jIkWrgJRmARldpBdZngUVbSJzp7R4vJFGaxY+FANgyU', '2024-12-16 14:05:45', '2024-12-16 14:05:45'),
(17, 'viki@gmail.com', 'Виктория', 'Щерева', '$argon2i$v=19$m=65536,t=4,p=1$OTFiMFdSWmo0eUhWN1ROdA$NGrIxCc5T1+rRixuvZy1TKR9GDE6SNQFIX5rI0Zkiys', '2024-12-16 14:19:05', '2024-12-16 14:19:05'),
(19, 'boyan@gmail.com', 'Боян ', 'Боянов', '$argon2i$v=19$m=65536,t=4,p=1$aEhxaldyLjFNeXhZdjl6MA$k6pN/zbIm1L2G39znpsDaChU00ghcLoN9qKEeLBXnk8', '2024-12-16 20:06:53', '2024-12-16 20:06:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `breed_sizes`
--
ALTER TABLE `breed_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_prices`
--
ALTER TABLE `service_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `breed_sizes`
--
ALTER TABLE `breed_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_prices`
--
ALTER TABLE `service_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `breed_sizes` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_prices`
--
ALTER TABLE `service_prices`
  ADD CONSTRAINT `service_prices_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `service_prices_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `breed_sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
