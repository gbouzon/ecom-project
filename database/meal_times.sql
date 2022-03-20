-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 07:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
  `store_id` int(11) NOT NULL,
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
(4, 15, 1, NULL, '2022-03-20 17:11:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(5, 1, 5, 1, 13.33),
(9, 1, 5, 1, 13.33),
(10, 1, 5, 1, 13.33),
(11, 1, 5, 1, 13.33),
(17, 1, 1, 1, 3.5),
(18, 1, 1, 1, 3.5),
(19, 1, 8, 1, 16),
(20, 1, 1, 1, 3.5),
(21, 4, 1, 1, 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_image` varchar(50) DEFAULT 'blank.png',
  `product_availability` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'product is generally available when it''s added. 0 means sold out and 1 means available',
  `product_quantity` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `product_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `store_id`, `product_name`, `product_image`, `product_availability`, `product_quantity`, `product_price`, `product_description`) VALUES
(1, 1, 'Vanilla Cupcake', 'blank.png', 1, 5, 3.5, 'A simple Vanilla cupcake!'),
(2, 1, 'Strawberry cupcake', 'blank.png', 1, 10, 3.5, 'A Strawberry cupcake!'),
(5, 3, 'Cheese Pizza ', 'blank.png', 1, 100, 13.33, 'This is a Chesse Pizza'),
(6, 5, 'Customer2 Store item 0', 'blank.png', 1, 1, 9.99, 'Customer2 Store item'),
(8, 3, 'Pepperoni pizza ', '6235ff762f7c0.jpg', 1, 1, 16, 'This is a pepperoni Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 9, 'Change to Pizza Store ', '4843 12e avenue', 'dsfasd');

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
  `picture` varchar(50) NOT NULL DEFAULT 'blank.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `password_hash`, `picture`) VALUES
(3, 0, 'Danich', '', 'Hang', 'test@email.com', '51445559999', '$2y$10$m940Yn2vBnKdvdlXb6tNPuv67FFYVB2H/ejRZuvfhfmRC9oUtPHqq', 'blank.jpg'),
(4, 1, 'Jeremy ', '', 'Vison', 'jeremyvison@hotmail.com', '514555555555', '$2y$10$lwoxhY4Oy0O7zgyGZS5gGOfJe1QfJfM/zbzTWQT3sWnW/zYW1l/16', 'blank.jpg'),
(5, 0, 'Giuliana', '', 'Bouzon', 'test@gmail.com', '', '$2y$10$WNVhD/V6S4p1xJlnBuGGwOEA9eMXIaMWuSUKfTFrKvRqV34Qku.Au', 'blank.jpg'),
(6, 0, 'Test', '', 'LN', 'test2@gmail.com', '', '$2y$10$22OmPhpZJ9qGGPIqHP5SyudHGh1duP1SOlS3IQuW9A/lJfLjqB9x.', 'blank.jpg'),
(7, 1, 'Tarzan', '', 'Tarzan', 'tarzan@gmail.com', '', '$2y$10$AdsrMkKusrGe8E3j52SrGuTZc5gXGa1sHKJ4zMv4bUVVtkAfD/GAG', 'blank.jpg'),
(8, 0, 'David', '', 'H', 'David@hotmail.com', '444444444', '$2y$10$DmBcPSHFHz.IyL7wZy3Xie9awxEPXOSfzTvu2CPSpoky1nbvP7y06', 'blank.jpg'),
(9, 1, 'Pizza', '', 'Owner', 'Pizza@gmail.c0m', '', '$2y$10$cI/U7cWgFMz9cYGHyCzUJexw2GVhjKjBvtd/R9C38OIQljHpBa6Dq', 'blank.jpg'),
(10, 0, 'pizza', '', 'pizzA', 'PIZAAA@email.com', '', '$2y$10$tdEjyULpOjETswvFCQJ40e8tKQ5NolJyP3AAcq4e44JkwZEAyERbK', 'blank.jpg'),
(12, 0, 'customer1', '', 'customer1', 'customer1@email.com', '', '$2y$10$0KRM8jHFaNrtqXq5QnThRuQPCx/fROQDKbxuL8OQLL6RE4NS.rApC', 'blank.jpg'),
(15, 0, 'New user', '', 'New user', 'Newuser@gmail.com', '', '$2y$10$xNpCOY.5g99RelSvPhIbr.KPkxnyEDOpc.2mauvIJTKh7dVsTQa4e', 'blank.jpg');

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
  ADD KEY `order_detail_order_fk` (`order_id`),
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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_store_fk` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`),
  ADD CONSTRAINT `order_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

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
