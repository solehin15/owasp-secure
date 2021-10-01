-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 04:09 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `owasp-secure`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(255) NOT NULL,
  `productCategories` varchar(255) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDescription` varchar(255) NOT NULL,
  `productQuantity` int(255) NOT NULL,
  `productPrice` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productCategories`, `productImage`, `productName`, `productDescription`, `productQuantity`, `productPrice`) VALUES
(1, 'cpu motherboard', '[BUNDLE PROMO] AMD Ryzen™ 5 5600X + ASUS ROG STRIX B550-F GAMING AM4 MOTHERBOARD.PNG', '[BUNDLE PROMO] AMD Ryzen™ 5 5600X + ASUS ROG STRIX B550-F GAMING AM4 MOTHERBOARD', '', 5, '5.00'),
(2, 'cpu motherboard', '[BUNDLE PROMO] AMD Ryzen™ 5 5600X + GIGABYTE AORUS B550i PRO AX AM4 MOTHERBOARD.PNG', '[BUNDLE PROMO] AMD Ryzen™ 5 5600X + GIGABYTE AORUS B550i PRO AX AM4 MOTHERBOARD', '', 10, '6.00'),
(3, 'cpu motherboard', 'test', '3', '', 10, '6.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
