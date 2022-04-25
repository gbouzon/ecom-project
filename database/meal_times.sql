-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 09:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meal_times`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `createAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = in \r\nCart, 1 = pending, 2 = accepted, 3 = ready to pick up, 4 = close'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `store_id`, `total`, `createAt`, `order_status`) VALUES
(1, 8, 3, NULL, '2022-03-20 15:06:00', 0),
(2, 8, 1, NULL, '2022-03-20 16:46:45', 0),
(3, 8, 1, NULL, '2022-03-20 16:48:55', 0),
(4, 15, 4, NULL, '2022-03-22 04:03:17', 0),
(5, 3, 1, NULL, '2022-03-21 02:52:17', 0),
(6, 12, 1, NULL, '2022-04-25 07:56:19', 4),
(7, 10, NULL, NULL, '2022-03-21 03:37:45', 0),
(8, 15, NULL, NULL, '2022-03-21 03:38:00', 0),
(9, 15, NULL, NULL, '2022-03-21 04:39:12', 0),
(10, 15, NULL, NULL, '2022-03-22 01:11:17', 0),
(11, 15, NULL, NULL, '2022-03-22 03:59:12', 0),
(12, 12, 3, 30.652335, '2022-04-18 17:25:39', 1),
(13, 12, NULL, NULL, '2022-04-18 14:02:42', 0),
(14, 7, NULL, NULL, '2022-04-25 03:15:55', 0),
(15, 5, 1, NULL, '2022-04-25 07:01:43', 0),
(16, 7, NULL, NULL, '2022-04-25 06:30:15', 0),
(17, 5, NULL, NULL, '2022-04-25 06:54:54', 0),
(18, 7, NULL, NULL, '2022-04-25 07:32:20', 0),
(19, 5, NULL, NULL, '2022-04-25 08:20:43', 0),
(20, 5, NULL, NULL, '2022-04-25 08:22:31', 0),
(21, 5, NULL, NULL, '2022-04-25 08:31:01', 0),
(22, 7, NULL, NULL, '2022-04-25 08:36:06', 0),
(23, 7, NULL, NULL, '2022-04-25 08:41:00', 0),
(24, 5, NULL, NULL, '2022-04-25 13:45:54', 0),
(29, 5, NULL, NULL, '2022-04-25 17:50:49', 0),
(33, 5, NULL, NULL, '2022-04-25 18:40:43', 0),
(34, 5, NULL, NULL, '2022-04-25 19:00:12', 0),
(35, 5, NULL, NULL, '2022-04-25 19:01:32', 0),
(36, 6, NULL, NULL, '2022-04-25 19:06:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `unit_price` double NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `unit_price`, `price`) VALUES
(114, 6, 2, 1, 3.5, 3.5),
(115, 12, 5, 2, 13.33, 26.66),
(120, 15, 2, 2, 3.5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_image` varchar(50) DEFAULT 'blank.jpg',
  `product_availability` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'product is generally available when it''s added. 0 means sold out and 1 means available',
  `product_price` double NOT NULL,
  `product_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `store_id`, `product_name`, `product_image`, `product_availability`, `product_price`, `product_description`) VALUES
(1, 1, '', 'v.jpg', 0, 0, ''),
(2, 1, 'Strawberry cupcake', '62370d6f27ce7.jpg', 1, 3.5, 'A Strawberry cupcake!'),
(5, 3, 'Cheese Pizza ', 'cheese-pizza.jpg', 1, 13.33, 'This is a Chesse Pizza'),
(8, 3, 'Pepperoni pizza ', '62376049d61b0.jpg', 1, 16, 'This is a pepperoni Pizza'),
(9, 4, 'Poutine', '623778e2bb0d8.jpg', 1, 16, 'This a an poutine !'),
(10, 4, 'Rouge Bol', '623778d1cd398.jpg', 1, 14, 'This a Bol');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `store_address` varchar(95) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `user_id`, `store_name`, `store_address`, `description`) VALUES
(1, 7, 'The Jane Store', '122, Avenue something', 'This is a store for Jane'),
(3, 4, 'Pizza Store', '4843 12e avenue', ' This is a pizza place lol'),
(4, 9, 'Poulet Rouge', '4843 12e avenue', 'This is a Poulet rouge Store');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 is for customer and 1 is for store',
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password_hash` varchar(63) NOT NULL,
  `picture` varchar(50) NOT NULL DEFAULT 'blank.jpg',
  `secret_key` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `password_hash`, `picture`, `secret_key`) VALUES
(3, 0, 'Danich', '', 'Hang', 'test@email.com', '51445559999', '$2y$10$m940Yn2vBnKdvdlXb6tNPuv67FFYVB2H/ejRZuvfhfmRC9oUtPHqq', 'blank.jpg', NULL),
(4, 1, 'Jeremy ', '', 'Vison', 'jeremyvison@hotmail.com', '514555555555', '$2y$10$lwoxhY4Oy0O7zgyGZS5gGOfJe1QfJfM/zbzTWQT3sWnW/zYW1l/16', 'blank.jpg', NULL),
(5, 0, 'Giuliana', '', 'Bouzon', 'test@gmail.com', '', '$2y$10$WNVhD/V6S4p1xJlnBuGGwOEA9eMXIaMWuSUKfTFrKvRqV34Qku.Au', 'blank.jpg', 'XEL4CGPHLVWBQZPL'),
(6, 0, 'Test', '', 'LN', 'test2@gmail.com', '', '$2y$10$22OmPhpZJ9qGGPIqHP5SyudHGh1duP1SOlS3IQuW9A/lJfLjqB9x.', '6266f296e0d7c.png', NULL),
(7, 1, 'Tarzan', '', 'Tarzan', 'tarzan@gmail.com', '', '$2y$10$AdsrMkKusrGe8E3j52SrGuTZc5gXGa1sHKJ4zMv4bUVVtkAfD/GAG', 'blank.jpg', 'JPIHUCAIUBKLV33N'),
(8, 0, 'David', '', 'H', 'David@hotmail.com', '444444444', '$2y$10$DmBcPSHFHz.IyL7wZy3Xie9awxEPXOSfzTvu2CPSpoky1nbvP7y06', 'blank.jpg', NULL),
(9, 1, 'Pizza', '', 'Owner', 'Pizza@gmail.c0m', '', '$2y$10$cI/U7cWgFMz9cYGHyCzUJexw2GVhjKjBvtd/R9C38OIQljHpBa6Dq', 'blank.jpg', NULL),
(10, 0, 'pizza', '', 'pizzA', 'PIZAAA@email.com', '', '$2y$10$tdEjyULpOjETswvFCQJ40e8tKQ5NolJyP3AAcq4e44JkwZEAyERbK', 'blank.jpg', NULL),
(12, 0, 'customer1', '', 'customer1', 'customer1@email.com', '', '$2y$10$0KRM8jHFaNrtqXq5QnThRuQPCx/fROQDKbxuL8OQLL6RE4NS.rApC', 'blank.jpg', NULL),
(15, 0, 'New user', '', 'New user', 'Newuser@gmail.com', '', '$2y$10$xNpCOY.5g99RelSvPhIbr.KPkxnyEDOpc.2mauvIJTKh7dVsTQa4e', 'blank.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_user_fk` (`user_id`),
  ADD KEY `order_store_fk` (`store_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD UNIQUE KEY `order_id` (`order_id`,`product_id`),
  ADD KEY `order_detail_product_fk` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `User_Store_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_store_fk` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_fk` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `order_detail_product_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `User_Store_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
