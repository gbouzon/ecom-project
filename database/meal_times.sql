-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 10:34 AM
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
(15, 5, 6, NULL, '2022-04-26 06:40:11', 0),
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
(36, 6, 1, 8.04825, '2022-04-26 07:06:17', 2),
(37, 20, NULL, NULL, '2022-04-26 02:09:12', 0),
(38, 7, NULL, NULL, '2022-04-26 02:32:20', 0),
(39, 21, 1, 17.24625, '2022-04-26 08:30:39', 0),
(40, 21, 1, NULL, '2022-04-26 06:02:20', 0),
(41, 7, NULL, NULL, '2022-04-26 02:47:36', 0),
(42, 5, NULL, NULL, '2022-04-26 02:47:36', 0),
(43, 5, NULL, NULL, '2022-04-26 02:47:36', 0),
(44, 7, NULL, NULL, '2022-04-26 02:47:36', 0),
(45, 5, NULL, NULL, '2022-04-26 02:47:36', 0),
(46, 7, NULL, NULL, '2022-04-26 02:50:13', 0),
(47, 5, NULL, NULL, '2022-04-26 02:50:13', 0),
(48, 5, NULL, NULL, '2022-04-26 02:50:13', 0),
(49, 7, NULL, NULL, '2022-04-26 02:50:14', 0),
(50, 5, NULL, NULL, '2022-04-26 02:50:14', 0),
(51, 7, NULL, NULL, '2022-04-26 02:56:05', 0),
(52, 5, NULL, NULL, '2022-04-26 02:56:05', 0),
(53, 5, NULL, NULL, '2022-04-26 02:56:05', 0),
(54, 7, NULL, NULL, '2022-04-26 02:56:05', 0),
(55, 5, NULL, NULL, '2022-04-26 02:56:05', 0),
(56, 7, NULL, NULL, '2022-04-26 03:00:12', 0),
(57, 23, NULL, NULL, '2022-04-26 03:02:20', 0),
(58, 23, NULL, NULL, '2022-04-26 03:08:02', 0),
(59, 23, NULL, NULL, '2022-04-26 03:11:36', 0),
(60, 23, NULL, NULL, '2022-04-26 03:13:07', 0),
(61, 7, NULL, NULL, '2022-04-26 03:14:07', 0),
(62, 5, NULL, NULL, '2022-04-26 03:14:07', 0),
(63, 5, NULL, NULL, '2022-04-26 03:14:07', 0),
(64, 7, NULL, NULL, '2022-04-26 03:14:07', 0),
(65, 5, NULL, NULL, '2022-04-26 03:14:07', 0),
(66, 7, NULL, NULL, '2022-04-26 03:16:11', 0),
(67, 5, NULL, NULL, '2022-04-26 03:16:11', 0),
(68, 5, NULL, NULL, '2022-04-26 03:16:12', 0),
(69, 7, NULL, NULL, '2022-04-26 03:16:12', 0),
(70, 5, NULL, NULL, '2022-04-26 03:16:12', 0),
(71, 7, NULL, NULL, '2022-04-26 03:16:43', 0),
(72, 5, NULL, NULL, '2022-04-26 03:16:43', 0),
(73, 5, NULL, NULL, '2022-04-26 03:16:43', 0),
(74, 7, NULL, NULL, '2022-04-26 03:16:43', 0),
(75, 5, NULL, NULL, '2022-04-26 03:16:44', 0),
(76, 21, NULL, NULL, '2022-04-26 03:18:48', 0),
(77, 23, NULL, NULL, '2022-04-26 03:19:05', 0),
(78, 23, NULL, NULL, '2022-04-26 03:37:49', 0),
(79, 5, NULL, NULL, '2022-04-26 03:37:49', 0),
(80, 5, NULL, NULL, '2022-04-26 03:37:49', 0),
(81, 7, NULL, NULL, '2022-04-26 03:37:49', 0),
(82, 5, NULL, NULL, '2022-04-26 03:37:50', 0),
(83, 23, NULL, NULL, '2022-04-26 03:38:31', 0),
(84, 5, NULL, NULL, '2022-04-26 03:38:31', 0),
(85, 5, NULL, NULL, '2022-04-26 03:38:31', 0),
(86, 7, NULL, NULL, '2022-04-26 03:38:32', 0),
(87, 5, NULL, NULL, '2022-04-26 03:38:32', 0),
(88, 23, NULL, NULL, '2022-04-26 03:43:01', 0),
(89, 5, NULL, NULL, '2022-04-26 03:43:01', 0),
(90, 5, NULL, NULL, '2022-04-26 03:43:02', 0),
(91, 7, NULL, NULL, '2022-04-26 03:43:02', 0),
(92, 5, NULL, NULL, '2022-04-26 03:43:02', 0),
(93, 23, NULL, NULL, '2022-04-26 03:44:11', 0),
(94, 5, NULL, NULL, '2022-04-26 03:44:11', 0),
(95, 5, NULL, NULL, '2022-04-26 03:44:11', 0),
(96, 7, NULL, NULL, '2022-04-26 03:44:12', 0),
(97, 21, NULL, NULL, '2022-04-26 03:44:12', 0),
(98, 23, NULL, NULL, '2022-04-26 03:45:14', 0),
(99, 5, NULL, NULL, '2022-04-26 03:45:14', 0),
(100, 5, NULL, NULL, '2022-04-26 03:45:14', 0),
(101, 7, NULL, NULL, '2022-04-26 03:45:14', 0),
(102, 21, NULL, NULL, '2022-04-26 03:45:14', 0),
(103, 21, NULL, NULL, '2022-04-26 03:57:53', 0),
(104, 23, NULL, NULL, '2022-04-26 04:08:01', 0),
(105, 5, NULL, NULL, '2022-04-26 04:08:01', 0),
(106, 21, NULL, NULL, '2022-04-26 04:08:01', 0),
(107, 7, NULL, NULL, '2022-04-26 04:08:01', 0),
(108, 21, NULL, NULL, '2022-04-26 04:08:02', 0),
(109, 21, NULL, NULL, '2022-04-26 04:19:16', 0),
(110, 5, NULL, NULL, '2022-04-26 04:26:54', 0),
(111, 21, NULL, NULL, '2022-04-26 04:27:45', 0),
(112, 23, NULL, NULL, '2022-04-26 04:28:06', 0),
(113, 5, NULL, NULL, '2022-04-26 04:28:06', 0),
(114, 21, NULL, NULL, '2022-04-26 04:28:06', 0),
(115, 7, NULL, NULL, '2022-04-26 04:28:06', 0),
(116, 21, NULL, NULL, '2022-04-26 04:28:07', 0),
(117, 23, NULL, NULL, '2022-04-26 04:30:00', 0),
(118, 23, NULL, NULL, '2022-04-26 04:32:17', 0),
(119, 23, NULL, NULL, '2022-04-26 04:34:38', 0),
(120, 24, NULL, NULL, '2022-04-26 04:37:51', 0),
(121, 23, NULL, NULL, '2022-04-26 04:38:58', 0),
(122, 24, NULL, NULL, '2022-04-26 04:38:58', 0),
(123, 21, NULL, NULL, '2022-04-26 04:38:58', 0),
(124, 7, NULL, NULL, '2022-04-26 04:38:58', 0),
(125, 21, NULL, NULL, '2022-04-26 04:38:59', 0),
(126, 23, NULL, NULL, '2022-04-26 04:41:04', 0),
(127, 5, NULL, NULL, '2022-04-26 04:45:17', 0),
(128, 23, NULL, NULL, '2022-04-26 04:45:54', 0),
(129, 23, NULL, NULL, '2022-04-26 04:51:00', 0),
(130, 23, NULL, NULL, '2022-04-26 04:51:42', 0),
(131, 23, NULL, NULL, '2022-04-26 04:52:32', 0),
(132, 21, NULL, NULL, '2022-04-26 04:53:33', 0),
(133, 23, NULL, NULL, '2022-04-26 04:54:01', 0),
(134, 24, NULL, NULL, '2022-04-26 04:54:01', 0),
(135, 21, NULL, NULL, '2022-04-26 04:54:01', 0),
(136, 7, NULL, NULL, '2022-04-26 04:54:01', 0),
(137, 21, NULL, NULL, '2022-04-26 04:54:01', 0),
(138, 21, NULL, NULL, '2022-04-26 05:14:18', 0),
(139, 23, NULL, NULL, '2022-04-26 05:14:18', 0),
(140, 24, NULL, NULL, '2022-04-26 05:14:18', 0),
(141, 21, NULL, NULL, '2022-04-26 05:14:19', 0),
(142, 7, NULL, NULL, '2022-04-26 05:14:19', 0),
(143, 21, NULL, NULL, '2022-04-26 05:14:19', 0),
(144, 21, NULL, NULL, '2022-04-26 05:15:34', 0),
(145, 23, NULL, NULL, '2022-04-26 05:15:34', 0),
(146, 24, NULL, NULL, '2022-04-26 05:15:34', 0),
(147, 21, NULL, NULL, '2022-04-26 05:15:34', 0),
(148, 7, NULL, NULL, '2022-04-26 05:15:34', 0),
(149, 21, NULL, NULL, '2022-04-26 05:15:34', 0),
(150, 21, NULL, NULL, '2022-04-26 05:19:27', 0),
(151, 23, NULL, NULL, '2022-04-26 05:19:27', 0),
(152, 24, NULL, NULL, '2022-04-26 05:19:27', 0),
(153, 21, NULL, NULL, '2022-04-26 05:19:28', 0),
(154, 7, NULL, NULL, '2022-04-26 05:19:28', 0),
(155, 21, NULL, NULL, '2022-04-26 05:19:28', 0),
(156, 23, NULL, NULL, '2022-04-26 05:32:36', 0),
(157, 24, NULL, NULL, '2022-04-26 05:32:37', 0),
(158, 21, NULL, NULL, '2022-04-26 05:32:37', 0),
(159, 7, NULL, NULL, '2022-04-26 05:32:37', 0),
(160, 21, NULL, NULL, '2022-04-26 05:32:37', 0),
(161, 21, NULL, NULL, '2022-04-26 05:33:22', 0),
(162, 23, NULL, NULL, '2022-04-26 05:33:22', 0),
(163, 24, NULL, NULL, '2022-04-26 05:33:22', 0),
(164, 21, NULL, NULL, '2022-04-26 05:33:23', 0),
(165, 7, NULL, NULL, '2022-04-26 05:33:23', 0),
(166, 21, NULL, NULL, '2022-04-26 05:33:23', 0),
(167, 21, NULL, NULL, '2022-04-26 05:33:48', 0),
(168, 23, NULL, NULL, '2022-04-26 05:33:48', 0),
(169, 24, NULL, NULL, '2022-04-26 05:33:49', 0),
(170, 21, NULL, NULL, '2022-04-26 05:33:49', 0),
(171, 7, NULL, NULL, '2022-04-26 05:33:49', 0),
(172, 21, NULL, NULL, '2022-04-26 05:33:49', 0),
(173, 23, NULL, NULL, '2022-04-26 05:41:24', 0),
(174, 24, NULL, NULL, '2022-04-26 05:41:24', 0),
(175, 21, NULL, NULL, '2022-04-26 05:41:24', 0),
(176, 7, NULL, NULL, '2022-04-26 05:41:24', 0),
(177, 21, NULL, NULL, '2022-04-26 05:41:24', 0),
(178, 21, NULL, NULL, '2022-04-26 05:45:19', 0),
(179, 23, NULL, NULL, '2022-04-26 05:45:19', 0),
(180, 24, NULL, NULL, '2022-04-26 05:45:19', 0),
(181, 21, NULL, NULL, '2022-04-26 05:45:20', 0),
(182, 7, NULL, NULL, '2022-04-26 05:45:20', 0),
(183, 21, NULL, NULL, '2022-04-26 05:45:20', 0),
(184, 6, 6, 17.24625, '2022-04-26 07:41:50', 4),
(185, 6, 6, 17.24625, '2022-04-26 07:41:59', 4),
(186, 6, 6, 17.24625, '2022-04-26 07:42:03', 4),
(187, 6, 6, 17.24625, '2022-04-26 07:42:05', 4),
(188, 21, NULL, NULL, '2022-04-26 05:55:10', 0),
(189, 23, NULL, NULL, '2022-04-26 05:55:10', 0),
(190, 24, NULL, NULL, '2022-04-26 05:55:11', 0),
(191, 21, NULL, NULL, '2022-04-26 05:55:11', 0),
(192, 7, NULL, NULL, '2022-04-26 05:55:11', 0),
(193, 21, NULL, NULL, '2022-04-26 05:55:11', 0),
(194, 6, 6, 17.24625, '2022-04-26 07:45:19', 4),
(195, 21, NULL, NULL, '2022-04-26 06:01:22', 0),
(196, 21, NULL, NULL, '2022-04-26 06:02:00', 0),
(197, 6, 6, 17.24625, '2022-04-26 07:47:46', 4),
(198, 21, NULL, NULL, '2022-04-26 06:02:20', 0),
(199, 23, NULL, NULL, '2022-04-26 06:02:20', 0),
(200, 24, NULL, NULL, '2022-04-26 06:02:21', 0),
(201, 21, NULL, NULL, '2022-04-26 06:02:21', 0),
(202, 7, NULL, NULL, '2022-04-26 06:02:21', 0),
(203, 21, NULL, NULL, '2022-04-26 06:02:21', 0),
(204, 6, 6, 17.24625, '2022-04-26 07:49:26', 4),
(205, 21, NULL, NULL, '2022-04-26 06:04:27', 0),
(206, 21, NULL, NULL, '2022-04-26 06:04:28', 0),
(207, 23, NULL, NULL, '2022-04-26 06:04:28', 0),
(208, 24, NULL, NULL, '2022-04-26 06:04:28', 0),
(209, 21, NULL, NULL, '2022-04-26 06:04:28', 0),
(210, 7, NULL, NULL, '2022-04-26 06:04:28', 0),
(211, 21, NULL, NULL, '2022-04-26 06:04:28', 0),
(212, 6, 6, 17.24625, '2022-04-26 08:03:07', 4),
(213, 21, NULL, NULL, '2022-04-26 06:04:45', 0),
(214, 21, NULL, NULL, '2022-04-26 06:04:45', 0),
(215, 23, NULL, NULL, '2022-04-26 06:04:45', 0),
(216, 24, NULL, NULL, '2022-04-26 06:04:45', 0),
(217, 21, NULL, NULL, '2022-04-26 06:04:46', 0),
(218, 7, NULL, NULL, '2022-04-26 06:04:46', 0),
(219, 21, NULL, NULL, '2022-04-26 06:04:46', 0),
(220, 21, NULL, NULL, '2022-04-26 06:13:01', 0),
(221, 6, 6, 17.24625, '2022-04-26 08:29:55', 4),
(222, 21, NULL, NULL, '2022-04-26 06:13:31', 0),
(223, 21, NULL, NULL, '2022-04-26 06:13:31', 0),
(224, 21, NULL, NULL, '2022-04-26 06:13:31', 0),
(225, 23, NULL, NULL, '2022-04-26 06:13:31', 0),
(226, 24, NULL, NULL, '2022-04-26 06:13:32', 0),
(227, 21, NULL, NULL, '2022-04-26 06:13:32', 0),
(228, 7, NULL, NULL, '2022-04-26 06:13:32', 0),
(229, 21, NULL, NULL, '2022-04-26 06:13:32', 0),
(230, 21, NULL, NULL, '2022-04-26 06:21:34', 0),
(231, 6, 6, 17.24625, '2022-04-26 08:30:39', 4),
(232, 21, NULL, NULL, '2022-04-26 06:28:29', 0),
(233, 21, NULL, NULL, '2022-04-26 06:28:29', 0),
(234, 21, NULL, NULL, '2022-04-26 06:28:29', 0),
(235, 21, NULL, NULL, '2022-04-26 06:28:30', 0),
(236, 23, NULL, NULL, '2022-04-26 06:28:30', 0),
(237, 24, NULL, NULL, '2022-04-26 06:28:30', 0),
(238, 21, NULL, NULL, '2022-04-26 06:28:30', 0),
(239, 7, NULL, NULL, '2022-04-26 06:28:30', 0),
(240, 21, NULL, NULL, '2022-04-26 06:28:30', 0),
(241, 6, 6, 17.24625, '2022-04-26 08:30:40', 2),
(242, 21, NULL, NULL, '2022-04-26 06:28:39', 0),
(243, 21, NULL, NULL, '2022-04-26 06:28:39', 0),
(244, 21, NULL, NULL, '2022-04-26 06:28:39', 0),
(245, 21, NULL, NULL, '2022-04-26 06:28:39', 0),
(246, 23, NULL, NULL, '2022-04-26 06:28:40', 0),
(247, 24, NULL, NULL, '2022-04-26 06:28:40', 0),
(248, 21, NULL, NULL, '2022-04-26 06:28:40', 0),
(249, 7, NULL, NULL, '2022-04-26 06:28:40', 0),
(250, 21, NULL, NULL, '2022-04-26 06:28:40', 0),
(251, 6, NULL, NULL, '2022-04-26 06:31:51', 0),
(252, 6, NULL, NULL, '2022-04-26 06:33:44', 0),
(253, 21, NULL, NULL, '2022-04-26 06:33:44', 0),
(254, 21, NULL, NULL, '2022-04-26 06:33:44', 0),
(255, 21, NULL, NULL, '2022-04-26 06:33:44', 0),
(256, 21, NULL, NULL, '2022-04-26 06:33:44', 0),
(257, 6, NULL, NULL, '2022-04-26 06:33:45', 0),
(258, 23, NULL, NULL, '2022-04-26 06:33:45', 0),
(259, 24, NULL, NULL, '2022-04-26 06:33:45', 0),
(260, 21, NULL, NULL, '2022-04-26 06:33:45', 0),
(261, 7, NULL, NULL, '2022-04-26 06:33:45', 0),
(262, 21, NULL, NULL, '2022-04-26 06:33:45', 0),
(263, 6, NULL, NULL, '2022-04-26 06:36:32', 0),
(264, 6, NULL, NULL, '2022-04-26 06:36:32', 0),
(265, 21, NULL, NULL, '2022-04-26 06:36:32', 0),
(266, 21, NULL, NULL, '2022-04-26 06:36:32', 0),
(267, 21, NULL, NULL, '2022-04-26 06:36:32', 0),
(268, 21, NULL, NULL, '2022-04-26 06:36:33', 0),
(269, 6, NULL, NULL, '2022-04-26 06:36:33', 0),
(270, 23, NULL, NULL, '2022-04-26 06:36:33', 0),
(271, 24, NULL, NULL, '2022-04-26 06:36:33', 0),
(272, 21, NULL, NULL, '2022-04-26 06:36:33', 0),
(273, 7, NULL, NULL, '2022-04-26 06:36:33', 0),
(274, 21, NULL, NULL, '2022-04-26 06:36:34', 0),
(275, 23, NULL, NULL, '2022-04-26 06:38:28', 0),
(276, 5, NULL, NULL, '2022-04-26 06:38:55', 0),
(277, 5, NULL, NULL, '2022-04-26 06:39:38', 0),
(278, 23, NULL, NULL, '2022-04-26 06:57:59', 0),
(279, 7, NULL, NULL, '2022-04-26 06:58:52', 0),
(280, 6, NULL, NULL, '2022-04-26 07:17:08', 0),
(281, 6, NULL, NULL, '2022-04-26 07:17:08', 0),
(282, 21, NULL, NULL, '2022-04-26 07:17:08', 0),
(283, 21, NULL, NULL, '2022-04-26 07:17:09', 0),
(284, 21, NULL, NULL, '2022-04-26 07:17:09', 0),
(285, 21, NULL, NULL, '2022-04-26 07:17:09', 0),
(286, 6, NULL, NULL, '2022-04-26 07:17:09', 0),
(287, 23, NULL, NULL, '2022-04-26 07:17:09', 0),
(288, 24, NULL, NULL, '2022-04-26 07:17:09', 0),
(289, 21, NULL, NULL, '2022-04-26 07:17:10', 0),
(290, 7, NULL, NULL, '2022-04-26 07:17:10', 0),
(291, 21, NULL, NULL, '2022-04-26 07:17:10', 0),
(292, 6, NULL, NULL, '2022-04-26 07:18:06', 0),
(293, 6, NULL, NULL, '2022-04-26 07:18:06', 0),
(294, 21, NULL, NULL, '2022-04-26 07:18:06', 0),
(295, 21, NULL, NULL, '2022-04-26 07:18:06', 0),
(296, 21, NULL, NULL, '2022-04-26 07:18:07', 0),
(297, 21, NULL, NULL, '2022-04-26 07:18:07', 0),
(298, 6, NULL, NULL, '2022-04-26 07:18:07', 0),
(299, 23, NULL, NULL, '2022-04-26 07:18:07', 0),
(300, 24, NULL, NULL, '2022-04-26 07:18:07', 0),
(301, 21, NULL, NULL, '2022-04-26 07:18:07', 0),
(302, 7, NULL, NULL, '2022-04-26 07:18:08', 0),
(303, 21, NULL, NULL, '2022-04-26 07:18:08', 0),
(304, 7, NULL, NULL, '2022-04-26 07:18:35', 0),
(305, 7, NULL, NULL, '2022-04-26 07:19:56', 0),
(306, 6, NULL, NULL, '2022-04-26 07:20:21', 0),
(307, 6, NULL, NULL, '2022-04-26 07:20:21', 0),
(308, 21, NULL, NULL, '2022-04-26 07:20:21', 0),
(309, 21, NULL, NULL, '2022-04-26 07:20:21', 0),
(310, 21, NULL, NULL, '2022-04-26 07:20:21', 0),
(311, 21, NULL, NULL, '2022-04-26 07:20:22', 0),
(312, 6, NULL, NULL, '2022-04-26 07:20:22', 0),
(313, 23, NULL, NULL, '2022-04-26 07:20:22', 0),
(314, 24, NULL, NULL, '2022-04-26 07:20:22', 0),
(315, 21, NULL, NULL, '2022-04-26 07:20:22', 0),
(316, 7, NULL, NULL, '2022-04-26 07:20:23', 0),
(317, 21, NULL, NULL, '2022-04-26 07:20:23', 0),
(318, 23, NULL, NULL, '2022-04-26 07:22:21', 0),
(319, 6, NULL, NULL, '2022-04-26 07:22:57', 0),
(320, 6, NULL, NULL, '2022-04-26 07:22:58', 0),
(321, 21, NULL, NULL, '2022-04-26 07:22:58', 0),
(322, 21, NULL, NULL, '2022-04-26 07:22:58', 0),
(323, 21, NULL, NULL, '2022-04-26 07:22:58', 0),
(324, 21, NULL, NULL, '2022-04-26 07:22:58', 0),
(325, 6, NULL, NULL, '2022-04-26 07:22:58', 0),
(326, 23, NULL, NULL, '2022-04-26 07:22:59', 0),
(327, 24, NULL, NULL, '2022-04-26 07:22:59', 0),
(328, 21, NULL, NULL, '2022-04-26 07:22:59', 0),
(329, 7, NULL, NULL, '2022-04-26 07:22:59', 0),
(330, 21, NULL, NULL, '2022-04-26 07:22:59', 0),
(331, 7, NULL, NULL, '2022-04-26 07:24:39', 0),
(332, 6, NULL, NULL, '2022-04-26 07:25:27', 0),
(333, 6, NULL, NULL, '2022-04-26 07:25:27', 0),
(334, 21, NULL, NULL, '2022-04-26 07:25:27', 0),
(335, 21, NULL, NULL, '2022-04-26 07:25:27', 0),
(336, 21, NULL, NULL, '2022-04-26 07:25:28', 0),
(337, 21, NULL, NULL, '2022-04-26 07:25:28', 0),
(338, 6, NULL, NULL, '2022-04-26 07:25:28', 0),
(339, 23, NULL, NULL, '2022-04-26 07:25:28', 0),
(340, 24, NULL, NULL, '2022-04-26 07:25:28', 0),
(341, 21, NULL, NULL, '2022-04-26 07:25:29', 0),
(342, 7, NULL, NULL, '2022-04-26 07:25:29', 0),
(343, 21, NULL, NULL, '2022-04-26 07:25:29', 0),
(344, 6, NULL, NULL, '2022-04-26 07:26:45', 0),
(345, 6, NULL, NULL, '2022-04-26 07:26:45', 0),
(346, 21, NULL, NULL, '2022-04-26 07:26:45', 0),
(347, 21, NULL, NULL, '2022-04-26 07:26:45', 0),
(348, 21, NULL, NULL, '2022-04-26 07:26:45', 0),
(349, 21, NULL, NULL, '2022-04-26 07:26:45', 0),
(350, 6, NULL, NULL, '2022-04-26 07:26:46', 0),
(351, 23, NULL, NULL, '2022-04-26 07:26:46', 0),
(352, 24, NULL, NULL, '2022-04-26 07:26:46', 0),
(353, 21, NULL, NULL, '2022-04-26 07:26:46', 0),
(354, 7, NULL, NULL, '2022-04-26 07:26:46', 0),
(355, 21, NULL, NULL, '2022-04-26 07:26:47', 0),
(356, 6, NULL, NULL, '2022-04-26 07:27:21', 0),
(357, 6, NULL, NULL, '2022-04-26 07:27:22', 0),
(358, 21, NULL, NULL, '2022-04-26 07:27:22', 0),
(359, 21, NULL, NULL, '2022-04-26 07:27:22', 0),
(360, 21, NULL, NULL, '2022-04-26 07:27:22', 0),
(361, 21, NULL, NULL, '2022-04-26 07:27:22', 0),
(362, 6, NULL, NULL, '2022-04-26 07:27:22', 0),
(363, 23, NULL, NULL, '2022-04-26 07:27:23', 0),
(364, 24, NULL, NULL, '2022-04-26 07:27:23', 0),
(365, 21, NULL, NULL, '2022-04-26 07:27:23', 0),
(366, 7, NULL, NULL, '2022-04-26 07:27:23', 0),
(367, 21, NULL, NULL, '2022-04-26 07:27:23', 0),
(368, 6, NULL, NULL, '2022-04-26 07:32:45', 0),
(369, 6, NULL, NULL, '2022-04-26 07:32:45', 0),
(370, 21, NULL, NULL, '2022-04-26 07:32:45', 0),
(371, 21, NULL, NULL, '2022-04-26 07:32:46', 0),
(372, 21, NULL, NULL, '2022-04-26 07:32:46', 0),
(373, 21, NULL, NULL, '2022-04-26 07:32:46', 0),
(374, 6, NULL, NULL, '2022-04-26 07:32:46', 0),
(375, 23, NULL, NULL, '2022-04-26 07:32:46', 0),
(376, 24, NULL, NULL, '2022-04-26 07:32:46', 0),
(377, 21, NULL, NULL, '2022-04-26 07:32:47', 0),
(378, 7, NULL, NULL, '2022-04-26 07:32:47', 0),
(379, 21, NULL, NULL, '2022-04-26 07:32:47', 0),
(380, 23, NULL, NULL, '2022-04-26 07:33:08', 0),
(381, 23, NULL, NULL, '2022-04-26 07:33:24', 0),
(382, 6, NULL, NULL, '2022-04-26 07:34:40', 0),
(383, 6, NULL, NULL, '2022-04-26 07:34:40', 0),
(384, 21, NULL, NULL, '2022-04-26 07:34:40', 0),
(385, 21, NULL, NULL, '2022-04-26 07:34:40', 0),
(386, 21, NULL, NULL, '2022-04-26 07:34:41', 0),
(387, 21, NULL, NULL, '2022-04-26 07:34:41', 0),
(388, 6, NULL, NULL, '2022-04-26 07:34:41', 0),
(389, 23, NULL, NULL, '2022-04-26 07:34:41', 0),
(390, 6, NULL, NULL, '2022-04-26 07:34:41', 0),
(391, 6, NULL, NULL, '2022-04-26 07:34:41', 0),
(392, 24, NULL, NULL, '2022-04-26 07:34:42', 0),
(393, 21, NULL, NULL, '2022-04-26 07:34:42', 0),
(394, 7, NULL, NULL, '2022-04-26 07:34:42', 0),
(395, 21, NULL, NULL, '2022-04-26 07:34:42', 0),
(396, 6, NULL, NULL, '2022-04-26 07:35:57', 0),
(397, 6, NULL, NULL, '2022-04-26 07:35:57', 0),
(398, 21, NULL, NULL, '2022-04-26 07:35:57', 0),
(399, 21, NULL, NULL, '2022-04-26 07:35:57', 0),
(400, 21, NULL, NULL, '2022-04-26 07:35:57', 0),
(401, 21, NULL, NULL, '2022-04-26 07:35:58', 0),
(402, 6, NULL, NULL, '2022-04-26 07:35:58', 0),
(403, 23, NULL, NULL, '2022-04-26 07:35:58', 0),
(404, 6, NULL, NULL, '2022-04-26 07:35:58', 0),
(405, 6, NULL, NULL, '2022-04-26 07:35:58', 0),
(406, 24, NULL, NULL, '2022-04-26 07:35:58', 0),
(407, 21, NULL, NULL, '2022-04-26 07:35:59', 0),
(408, 7, NULL, NULL, '2022-04-26 07:35:59', 0),
(409, 21, NULL, NULL, '2022-04-26 07:35:59', 0),
(410, 6, NULL, NULL, '2022-04-26 07:37:33', 0),
(411, 6, NULL, NULL, '2022-04-26 07:37:34', 0),
(412, 21, NULL, NULL, '2022-04-26 07:37:34', 0),
(413, 21, NULL, NULL, '2022-04-26 07:37:34', 0),
(414, 21, NULL, NULL, '2022-04-26 07:37:34', 0),
(415, 21, NULL, NULL, '2022-04-26 07:37:34', 0),
(416, 6, NULL, NULL, '2022-04-26 07:37:34', 0),
(417, 23, NULL, NULL, '2022-04-26 07:37:35', 0),
(418, 6, NULL, NULL, '2022-04-26 07:37:35', 0),
(419, 6, NULL, NULL, '2022-04-26 07:37:35', 0),
(420, 23, NULL, NULL, '2022-04-26 07:37:35', 0),
(421, 24, NULL, NULL, '2022-04-26 07:37:35', 0),
(422, 21, NULL, NULL, '2022-04-26 07:37:35', 0),
(423, 7, NULL, NULL, '2022-04-26 07:37:35', 0),
(424, 21, NULL, NULL, '2022-04-26 07:37:36', 0),
(425, 6, NULL, NULL, '2022-04-26 07:39:47', 0),
(426, 6, NULL, NULL, '2022-04-26 07:39:47', 0),
(427, 21, NULL, NULL, '2022-04-26 07:39:47', 0),
(428, 21, NULL, NULL, '2022-04-26 07:39:47', 0),
(429, 21, NULL, NULL, '2022-04-26 07:39:48', 0),
(430, 21, NULL, NULL, '2022-04-26 07:39:48', 0),
(431, 6, NULL, NULL, '2022-04-26 07:39:48', 0),
(432, 23, NULL, NULL, '2022-04-26 07:39:48', 0),
(433, 6, NULL, NULL, '2022-04-26 07:39:48', 0),
(434, 6, NULL, NULL, '2022-04-26 07:39:48', 0),
(435, 23, NULL, NULL, '2022-04-26 07:39:49', 0),
(436, 24, NULL, NULL, '2022-04-26 07:39:49', 0),
(437, 21, NULL, NULL, '2022-04-26 07:39:49', 0),
(438, 7, NULL, NULL, '2022-04-26 07:39:49', 0),
(439, 21, NULL, NULL, '2022-04-26 07:39:49', 0),
(440, 6, NULL, NULL, '2022-04-26 07:44:39', 0),
(441, 6, NULL, NULL, '2022-04-26 07:44:39', 0),
(442, 21, NULL, NULL, '2022-04-26 07:44:39', 0),
(443, 21, NULL, NULL, '2022-04-26 07:44:39', 0),
(444, 21, NULL, NULL, '2022-04-26 07:44:40', 0),
(445, 21, NULL, NULL, '2022-04-26 07:44:40', 0),
(446, 6, NULL, NULL, '2022-04-26 07:44:40', 0),
(447, 23, NULL, NULL, '2022-04-26 07:44:40', 0),
(448, 6, NULL, NULL, '2022-04-26 07:44:40', 0),
(449, 6, NULL, NULL, '2022-04-26 07:44:40', 0),
(450, 23, NULL, NULL, '2022-04-26 07:44:40', 0),
(451, 24, NULL, NULL, '2022-04-26 07:44:41', 0),
(452, 21, NULL, NULL, '2022-04-26 07:44:41', 0),
(453, 7, NULL, NULL, '2022-04-26 07:44:41', 0),
(454, 21, NULL, NULL, '2022-04-26 07:44:41', 0),
(455, 6, NULL, NULL, '2022-04-26 07:46:39', 0),
(456, 6, NULL, NULL, '2022-04-26 07:46:39', 0),
(457, 21, NULL, NULL, '2022-04-26 07:46:39', 0),
(458, 21, NULL, NULL, '2022-04-26 07:46:39', 0),
(459, 21, NULL, NULL, '2022-04-26 07:46:39', 0),
(460, 21, NULL, NULL, '2022-04-26 07:46:39', 0),
(461, 6, NULL, NULL, '2022-04-26 07:46:39', 0),
(462, 23, NULL, NULL, '2022-04-26 07:46:40', 0),
(463, 6, NULL, NULL, '2022-04-26 07:46:40', 0),
(464, 6, NULL, NULL, '2022-04-26 07:46:40', 0),
(465, 23, NULL, NULL, '2022-04-26 07:46:40', 0),
(466, 24, NULL, NULL, '2022-04-26 07:46:40', 0),
(467, 21, NULL, NULL, '2022-04-26 07:46:40', 0),
(468, 7, NULL, NULL, '2022-04-26 07:46:41', 0),
(469, 21, NULL, NULL, '2022-04-26 07:46:41', 0),
(470, 6, NULL, NULL, '2022-04-26 07:49:18', 0),
(471, 6, NULL, NULL, '2022-04-26 07:49:18', 0),
(472, 21, NULL, NULL, '2022-04-26 07:49:18', 0),
(473, 21, NULL, NULL, '2022-04-26 07:49:18', 0),
(474, 21, NULL, NULL, '2022-04-26 07:49:18', 0),
(475, 21, NULL, NULL, '2022-04-26 07:49:19', 0),
(476, 6, NULL, NULL, '2022-04-26 07:49:19', 0),
(477, 23, NULL, NULL, '2022-04-26 07:49:19', 0),
(478, 6, NULL, NULL, '2022-04-26 07:49:19', 0),
(479, 6, NULL, NULL, '2022-04-26 07:49:19', 0),
(480, 23, NULL, NULL, '2022-04-26 07:49:19', 0),
(481, 24, NULL, NULL, '2022-04-26 07:49:19', 0),
(482, 21, NULL, NULL, '2022-04-26 07:49:20', 0),
(483, 7, NULL, NULL, '2022-04-26 07:49:20', 0),
(484, 21, NULL, NULL, '2022-04-26 07:49:20', 0),
(485, 6, NULL, NULL, '2022-04-26 08:00:50', 0),
(486, 6, NULL, NULL, '2022-04-26 08:00:50', 0),
(487, 21, NULL, NULL, '2022-04-26 08:00:50', 0),
(488, 21, NULL, NULL, '2022-04-26 08:00:51', 0),
(489, 21, NULL, NULL, '2022-04-26 08:00:51', 0),
(490, 21, NULL, NULL, '2022-04-26 08:00:51', 0),
(491, 6, NULL, NULL, '2022-04-26 08:00:51', 0),
(492, 23, NULL, NULL, '2022-04-26 08:00:51', 0),
(493, 6, NULL, NULL, '2022-04-26 08:00:51', 0),
(494, 6, NULL, NULL, '2022-04-26 08:00:51', 0),
(495, 23, NULL, NULL, '2022-04-26 08:00:52', 0),
(496, 24, NULL, NULL, '2022-04-26 08:00:52', 0),
(497, 21, NULL, NULL, '2022-04-26 08:00:52', 0),
(498, 7, NULL, NULL, '2022-04-26 08:00:52', 0),
(499, 21, NULL, NULL, '2022-04-26 08:00:52', 0),
(500, 6, NULL, NULL, '2022-04-26 08:03:06', 0),
(501, 6, NULL, NULL, '2022-04-26 08:03:06', 0),
(502, 21, NULL, NULL, '2022-04-26 08:03:06', 0),
(503, 21, NULL, NULL, '2022-04-26 08:03:06', 0),
(504, 21, NULL, NULL, '2022-04-26 08:03:06', 0),
(505, 21, NULL, NULL, '2022-04-26 08:03:07', 0),
(506, 6, NULL, NULL, '2022-04-26 08:03:07', 0),
(507, 23, NULL, NULL, '2022-04-26 08:03:07', 0),
(508, 23, NULL, NULL, '2022-04-26 08:03:07', 0),
(509, 6, NULL, NULL, '2022-04-26 08:03:07', 0),
(510, 6, NULL, NULL, '2022-04-26 08:03:08', 0),
(511, 23, NULL, NULL, '2022-04-26 08:03:08', 0),
(512, 24, NULL, NULL, '2022-04-26 08:03:08', 0),
(513, 21, NULL, NULL, '2022-04-26 08:03:08', 0),
(514, 7, NULL, NULL, '2022-04-26 08:03:08', 0),
(515, 21, NULL, NULL, '2022-04-26 08:03:08', 0),
(516, 24, NULL, NULL, '2022-04-26 08:18:21', 0),
(517, 24, NULL, NULL, '2022-04-26 08:19:07', 0),
(518, 7, NULL, NULL, '2022-04-26 08:19:53', 0),
(519, 23, NULL, NULL, '2022-04-26 08:20:04', 0),
(520, 24, NULL, NULL, '2022-04-26 08:20:49', 0),
(521, 6, NULL, NULL, '2022-04-26 08:29:54', 0),
(522, 6, NULL, NULL, '2022-04-26 08:29:54', 0),
(523, 21, NULL, NULL, '2022-04-26 08:29:54', 0),
(524, 21, NULL, NULL, '2022-04-26 08:29:54', 0),
(525, 21, NULL, NULL, '2022-04-26 08:29:54', 0),
(526, 21, NULL, NULL, '2022-04-26 08:29:54', 0),
(527, 6, NULL, NULL, '2022-04-26 08:29:55', 0),
(528, 23, NULL, NULL, '2022-04-26 08:29:55', 0),
(529, 23, NULL, NULL, '2022-04-26 08:29:55', 0),
(530, 6, NULL, NULL, '2022-04-26 08:29:55', 0),
(531, 6, NULL, NULL, '2022-04-26 08:29:55', 0),
(532, 23, NULL, NULL, '2022-04-26 08:29:55', 0),
(533, 24, NULL, NULL, '2022-04-26 08:29:55', 0),
(534, 24, NULL, NULL, '2022-04-26 08:29:56', 0),
(535, 21, NULL, NULL, '2022-04-26 08:29:56', 0),
(536, 7, NULL, NULL, '2022-04-26 08:29:56', 0),
(537, 21, NULL, NULL, '2022-04-26 08:29:56', 0),
(538, 6, NULL, NULL, '2022-04-26 08:30:38', 0),
(539, 6, NULL, NULL, '2022-04-26 08:30:38', 0),
(540, 21, NULL, NULL, '2022-04-26 08:30:38', 0),
(541, 21, NULL, NULL, '2022-04-26 08:30:38', 0),
(542, 21, NULL, NULL, '2022-04-26 08:30:39', 0),
(543, 21, NULL, NULL, '2022-04-26 08:30:39', 0),
(544, 6, NULL, NULL, '2022-04-26 08:30:39', 0),
(545, 23, NULL, NULL, '2022-04-26 08:30:39', 0),
(546, 23, NULL, NULL, '2022-04-26 08:30:39', 0),
(547, 6, NULL, NULL, '2022-04-26 08:30:40', 0),
(548, 6, NULL, NULL, '2022-04-26 08:30:40', 0),
(549, 23, NULL, NULL, '2022-04-26 08:30:40', 0),
(550, 24, NULL, NULL, '2022-04-26 08:30:40', 0),
(551, 24, NULL, NULL, '2022-04-26 08:30:40', 0),
(552, 21, NULL, NULL, '2022-04-26 08:30:40', 0),
(553, 7, NULL, NULL, '2022-04-26 08:30:40', 0),
(554, 21, NULL, NULL, '2022-04-26 08:30:41', 0);

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
(131, 36, 2, 2, 3.5, 7),
(136, 40, 2, 2, 3.5, 7),
(156, 15, 11, 2, 15, 30),
(186, 184, 11, 1, 15, 15),
(190, 185, 11, 1, 15, 15),
(194, 186, 11, 1, 15, 15),
(198, 187, 11, 1, 15, 15),
(202, 194, 11, 1, 15, 15),
(206, 197, 11, 1, 15, 15),
(210, 204, 11, 1, 15, 15),
(214, 212, 11, 1, 15, 15),
(218, 221, 11, 1, 15, 15),
(222, 231, 11, 1, 15, 15),
(226, 241, 11, 1, 15, 15);

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
(2, 1, 'Strawberry cupcake', '62370d6f27ce7.jpg', 1, 3.5, 'A Strawberry cupcake!'),
(5, 3, 'Cheese Pizza ', 'cheese-pizza.jpg', 1, 13.33, 'This is a Chesse Pizza'),
(8, 3, 'Pepperoni pizza ', '62376049d61b0.jpg', 1, 16, 'This is a pepperoni Pizza'),
(9, 4, 'Poutine', '623778e2bb0d8.jpg', 1, 16, 'This a an poutine !'),
(10, 4, 'Rouge Bol', '623778d1cd398.jpg', 1, 14, 'This a Bol'),
(11, 6, 'Chocolate', '62676660e0dc2.jpg', 1, 15, 'A box of chocolates.');

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
(4, 9, 'Poulet Rouge', '4843 12e avenue', 'This is a Poulet rouge Store'),
(6, 23, 'Candy Store', '122 Your Mom', 'A store that sells candy. What a surprise ain\'t it'),
(44, 24, 'Test Store', '249 street', 'a test store');

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
(5, 0, 'Giuliana', '', 'Bouzon', 'test@gmail.com', '', '$2y$10$WNVhD/V6S4p1xJlnBuGGwOEA9eMXIaMWuSUKfTFrKvRqV34Qku.Au', 'blank.jpg', NULL),
(6, 0, 'Test', '', 'Hat', 'test2@gmail.com', '', '$2y$10$22OmPhpZJ9qGGPIqHP5SyudHGh1duP1SOlS3IQuW9A/lJfLjqB9x.', '6266f296e0d7c.png', NULL),
(7, 1, 'Tarzan', '', 'Tarzan', 'tarzan@gmail.com', '', '$2y$10$AdsrMkKusrGe8E3j52SrGuTZc5gXGa1sHKJ4zMv4bUVVtkAfD/GAG', 'blank.jpg', 'VRO5LSJJ36PZIVZ6'),
(8, 0, 'David', '', 'H', 'David@hotmail.com', '444444444', '$2y$10$DmBcPSHFHz.IyL7wZy3Xie9awxEPXOSfzTvu2CPSpoky1nbvP7y06', 'blank.jpg', NULL),
(9, 1, 'Pizza', '', 'Owner', 'Pizza@gmail.c0m', '', '$2y$10$cI/U7cWgFMz9cYGHyCzUJexw2GVhjKjBvtd/R9C38OIQljHpBa6Dq', 'blank.jpg', NULL),
(10, 0, 'pizza', '', 'pizzA', 'PIZAAA@email.com', '', '$2y$10$tdEjyULpOjETswvFCQJ40e8tKQ5NolJyP3AAcq4e44JkwZEAyERbK', 'blank.jpg', NULL),
(12, 0, 'customer1', '', 'customer1', 'customer1@email.com', '', '$2y$10$0KRM8jHFaNrtqXq5QnThRuQPCx/fROQDKbxuL8OQLL6RE4NS.rApC', 'blank.jpg', NULL),
(15, 0, 'New user', '', 'New user', 'Newuser@gmail.com', '', '$2y$10$xNpCOY.5g99RelSvPhIbr.KPkxnyEDOpc.2mauvIJTKh7dVsTQa4e', 'blank.jpg', NULL),
(20, 0, 'Test', '', 'User', 'hello@gmail.com', '', '$2y$10$eDaJE0BFBgqfJvjeBpPJ2ebxAgXTFgBATisqkVg8QvhZkdnu4D4Ze', '', 'N26OOTLH4ECFUES5'),
(21, 0, 'Acceptance', 'Test', 'Tester', 'tester@gmail.com', '', '$2y$10$xCU7ttC8uN.sPi3HHG8t0.gpOBYf49/4RLs44.2cDU9IJcc5CLT.a', '', NULL),
(22, 0, 'User', '', 'Test', 'test45@gmail.com', '', '$2y$10$7i2ydpD0o9XbOThvAxurveRAx8MqrruGth.Jm0Rvl6Lk0G4VIm72q', '', NULL),
(23, 1, 'Bob', '', 'Dylan', 'candy@gmail.com', '', '$2y$10$Nhg4vBi/rWaGuoaRnKk0t.y8QXEwFCgcdiCKceRP8zNcBCBSNx1Km', '626760b6e8ce9.jpg', NULL),
(24, 1, 'Store', '', 'Test', 'teststore@gmail.com', '', '$2y$10$jO4oH.lX/IaJTQr9wZN/lOLSeSyWys/Vdq/qCOJMzt.ez1PJvWS2C', '', NULL);

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
  ADD UNIQUE KEY `user_id` (`user_id`),
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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  ADD CONSTRAINT `order_detail_order_fk` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_product_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `User_Store_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
