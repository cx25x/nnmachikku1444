-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 أغسطس 2022 الساعة 10:45
-- إصدار الخادم: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce`
--

-- --------------------------------------------------------

--
-- بنية الجدول `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `cart`
--

INSERT INTO `cart` (`id`, `p_id`) VALUES
(19, 21),
(20, 26),
(21, 28),
(22, 23);

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(151) NOT NULL,
  `name` varchar(151) NOT NULL,
  `description` varchar(151) NOT NULL,
  `price` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `category` varchar(151) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`, `rate`, `discount`, `category`) VALUES
(19, '1-web-desktop-recos.webp', 'Dress', 'dress that would be appropriate for brunch or afternoon tea.', 34, 4, 10, 'women'),
(20, 'bug1.jpg', 'Bag-in-box', 'single-compartment bag that usually has no closure, a tote makes it easy to throw items', 12, 2, 0, 'bags'),
(21, 'bug2.jpg', 'Bin bag', 'As such, the modern messenger bag keeps its utility but adds some aesthetics. Great', 14, 3, 0, 'bags'),
(22, 'f1.jpg', 'Midi Dress', ' Sitting between a maxi and a mini dress,', 39, 4, 25, 'women'),
(23, 'fashion-img-3.png', 'dress shoes', 'A shoe is a type of footwear that covers the foot and protects it with a sole', 22, 5, 25, 'shoes'),
(24, 'shoe-1.png', 'boots', 'This is a list of shoe styles and designs. A shoe is an item of footwear intended to protect and comfort the human foot while doing various activities.', 12, 3, 0, 'shoes'),
(25, 'shoe-2.png', 'boots', 'his is a list of shoe styles and designs. A shoe is an item of footwear intended to protect and comfort the human foot while doing various activities.', 12, 3, 0, 'shoes'),
(26, 'shoe-6.png', 'high heels', 'A shoe is a type of footwear that covers the foot and protects it with a sole.', 34, 5, 30, 'shoes'),
(27, 'shoe-7.png', 'dress shoes', 'shoe is a type of footwear that covers the foot and protects it with a sole.', 22, 5, 10, 'shoes'),
(28, 'tsh1.jpg', ' T-shirt', ' style of fabric shirt named after the T shape of its body and sleeves', 22, 4, 0, 'man'),
(29, 'tsh2.jpg', 'V-Neck T-Shirt ', 'V-Neck T-Shirt Like its name suggests, these T-shirts form a pointed V shape ', 22, 3, 10, 'man');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
