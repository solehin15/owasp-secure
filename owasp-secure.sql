-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 02:57 PM
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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cartId` int(255) NOT NULL,
  `cartReceipt` varchar(255) NOT NULL,
  `cartDate` date NOT NULL,
  `cartUserId` int(255) NOT NULL,
  `cartProductId` int(255) NOT NULL,
  `cartProductName` varchar(255) NOT NULL,
  `cartProductPrice` decimal(16,2) NOT NULL,
  `cartProductQuantity` int(255) NOT NULL,
  `cartStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cartId`, `cartReceipt`, `cartDate`, `cartUserId`, `cartProductId`, `cartProductName`, `cartProductPrice`, `cartProductQuantity`, `cartStatus`) VALUES
(1, '', '0000-00-00', 2, 1, '', '0.00', 1, 'cart'),
(3, '', '0000-00-00', 2, 2, '', '0.00', 2, 'cart');

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
(1, 'burger', '', 'Ayam', 'Ini adalah ayam', 5, '5.00'),
(2, 'telur', '', 'Itik', 'Ini initk', 10, '6.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPhone` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userForgot` varchar(255) NOT NULL,
  `user2FA` varchar(255) NOT NULL,
  `userIP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPhone`, `userEmail`, `userPass`, `userForgot`, `user2FA`, `userIP`) VALUES
(1, 'solehin15', '0175121027', 'ohhmyphaleg@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '', '129438', '2001:f40:908:3545:c99f:8185:e87a:4988'),
(2, 'kimmohito', '01111110470', 'kimmohito@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '', '', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cartId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
