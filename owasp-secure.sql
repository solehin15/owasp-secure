-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 02:55 PM
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
  `cartAttachment` varchar(255) NOT NULL,
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

INSERT INTO `carts` (`cartId`, `cartReceipt`, `cartAttachment`, `cartDate`, `cartUserId`, `cartProductId`, `cartProductName`, `cartProductPrice`, `cartProductQuantity`, `cartStatus`) VALUES
(1, '615da70804c07', '../attachment/615da70804c07.jpg', '2021-10-06', 2, 14, '', '0.00', 1, 'completed'),
(2, '615dab3f4a886', '', '2021-10-06', 2, 13, '', '0.00', 1, 'cancelled'),
(3, '615dab8001832', '../attachment/615dab8001832.jpg', '2021-10-06', 2, 20, '', '0.00', 2, 'cancelled'),
(4, '615dab8001832', '../attachment/615dab8001832.jpg', '2021-10-06', 2, 21, '', '0.00', 1, 'cancelled'),
(5, '615dab8001832', '../attachment/615dab8001832.jpg', '2021-10-06', 2, 14, '', '0.00', 1, 'cancelled'),
(6, '615dabe0c5f33', '../attachment/615dabe0c5f33.jpg', '2021-10-06', 2, 25, '', '0.00', 1, 'shipped');

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
(1, 'cpu+motherboard', '[BUNDLE PROMO] AMD Ryzen 5 5600X + ASUS ROG STRIX B550-F GAMING AM4 MOTHERBOARD.PNG', '[BUNDLE PROMO] AMD Ryzen 5 5600X + ASUS ROG STRIX B550-F GAMING AM4 MOTHERBOARD', '', 5, '2294.00'),
(2, 'cpu+motherboard', '[BUNDLE PROMO] AMD Ryzen 5 5600X + GIGABYTE AORUS B550i PRO AX AM4 MOTHERBOARD.PNG', '[BUNDLE PROMO] AMD Ryzen 5 5600X + GIGABYTE AORUS B550i PRO AX AM4 MOTHERBOARD', '', 10, '2198.00'),
(3, 'cpu+motherboard', '[BUNDLE PROMO] AMD Ryzen 5 5600X + GIGABYTE B550 AORUS ELITE ATX AM4 MOTHERBOARD.PNG', '[BUNDLE PROMO] AMD Ryzen 5 5600X + GIGABYTE B550 AORUS ELITE ATX AM4 MOTHERBOARD', '', 7, '2088.00'),
(4, 'cpu+motherboard', '[BUNDLE PROMO] AMD Ryzen 5 5600X + GIGABYTE B550 AORUS PRO AM4 MOTHERBOARD.PNG', '[BUNDLE PROMO] AMD Ryzen 5 5600X + GIGABYTE B550 AORUS PRO AM4 MOTHERBOARD', '', 10, '2258.00'),
(5, 'cpu+motherboard', '[BUNDLE PROMO] AMD Ryzen 5 5600X + GIGABYTE B550M DS3H AM4 MOTHERBOARD.PNG', '[BUNDLE PROMO] AMD Ryzen 5 5600X + GIGABYTE B550M DS3H AM4 MOTHERBOARD', '', 21, '1768.00'),
(6, 'cpu+motherboard', '[BUNDLE PROMO] AMD Ryzen 5 5600X + MSI B550M A PRO AM4 MOTHERBOARD.PNG', '[BUNDLE PROMO] AMD Ryzen 5 5600X + MSI B550M A PRO AM4 MOTHERBOARD', '', 11, '1698.00'),
(7, 'cpu+motherboard', '[BUNDLE PROMO] AMD Ryzen 5 5600X + MSI B550M MORTAR AM4 MOTHERBOARD.PNG', '[BUNDLE PROMO] AMD Ryzen 5 5600X + MSI B550M MORTAR AM4 MOTHERBOARD', '', 11, '2028.00'),
(8, 'cpu+motherboard', '[BUNDLE PROMO] AMD Ryzen 5 5600X + MSI B550M PRO VDH WIFI AM4 MOTHERBOARD.PNG', '[BUNDLE PROMO] AMD Ryzen 5 5600X + MSI B550M PRO VDH WIFI AM4 MOTHERBOARD', '', 11, '1958.00'),
(9, 'cpu+motherboard', '[BUNDLE PROMO] Intel Core i7-11700K Processor + ASROCK Z590 Steel Legend WiFi 6E LGA 1200 MOTHERBOARD.PNG', '[BUNDLE PROMO] Intel Core i7-11700K Processor + ASROCK Z590 Steel Legend WiFi 6E LGA 1200 MOTHERBOARD', '', 4, '2709.00'),
(10, 'cpu+motherboard', '[BUNDLE PROMO] Intel Core i7-11700K Processor + GIGABYTE Z590 AORUS ELITE AX LGA 1200 MOTHERBOARD.PNG', '[BUNDLE PROMO] Intel Core i7-11700K Processor + GIGABYTE Z590 AORUS ELITE AX LGA 1200 MOTHERBOARD.PNG', '', 7, '2918.00'),
(11, 'cpu+motherboard', '[BUNDLE PROMO] Intel Core i7-11700K Processor + GIGABYTE Z590 UD LGA 1200 MOTHERBOARD.PNG', '[BUNDLE PROMO] Intel Core i7-11700K Processor + GIGABYTE Z590 UD LGA 1200 MOTHERBOARD', '', 9, '2558.00'),
(12, 'cpu+motherboard', '[BUNDLE PROMO] Intel Core i7-11700K Processor + MSI MAG Z590 TORPEDO LGA 1200 MOTHERBOARD.PNG', '[BUNDLE PROMO] Intel Core i7-11700K Processor + MSI MAG Z590 TORPEDO LGA 1200 MOTHERBOARD', '', 12, '2798.00'),
(13, 'cpu+motherboard', '[BUNDLE PROMO] Intel Core i7-11700K Processor + MSI Z590 A PRO LGA 1200 MOTHERBOARD.PNG', '[BUNDLE PROMO] Intel Core i7-11700K Processor + MSI Z590 A PRO LGA 1200 MOTHERBOARD', '', 15, '2558.00'),
(14, 'psu power supply unit', 'ACBEL 500W 80+ GOLD.PNG', 'ACBEL 500W 80+ GOLD', '', 61, '419.00'),
(15, 'ssd+hardisk+hdd', 'ADDLINK S68 GEN3X4 NVME 256GB 512GB.PNG', 'ADDLINK S68 GEN3X4 NVME 256GB 512GB', '', 37, '219.00'),
(16, 'gpu graphic card', 'ASRock AMD Radeon RX 6900 XT OC Formula 16GB GDDR6.PNG', 'ASRock AMD Radeon RX 6900 XT OC Formula 16GB GDDR6', '', 9, '11202.45'),
(17, 'aio cooler', 'ASUS ROG STRIX LC II 280 ARGB AIO.PNG', 'ASUS ROG STRIX LC II 280 ARGB AIO', '', 9, '859.00'),
(18, 'ssd+hardisk+hdd', 'BIOSTAR S160-512GB ULTRASLIM SATA SSD.PNG', 'BIOSTAR S160-512GB ULTRASLIM SATA SSD', '', 37, '292.95'),
(19, 'casing', 'COOLER MASTER MASTERCASE H500P MESH ARGB.PNG', 'COOLER MASTER MASTERCASE H500P MESH ARGB', '', 37, '629.00'),
(20, 'casing', 'CORSAIR 5000D AIRFLOW Tempered Glass Mid-Tower ATX PC Case WhiteBlack.PNG', 'CORSAIR 5000D AIRFLOW Tempered Glass Mid-Tower ATX PC Case WhiteBlack', '', 37, '579.00'),
(21, 'ssd+hardisk+hdd', 'Dynabook AE100 SATA SSD 240GB 480GB 960GB.PNG', 'Dynabook AE100 SATA SSD 240GB 480GB 960GB', '', 37, '411.00'),
(22, 'ssd+hardisk+hdd', 'Dynabook Boost AX4000 PCIe 3 NVME 256GB 512GB.PNG', 'Dynabook Boost AX4000 PCIe 3 NVME 256GB 512GB', '', 37, '279.00'),
(23, 'ssd+hardisk+hdd', 'Dynabook Boost AX5000 PCIe NVME 512GB 1TB.PNG', 'Dynabook Boost AX5000 PCIe NVME 512GB 1TB', '', 37, '288.00'),
(24, 'aio cooler', 'EK AIO BASIC 240 EK AIO BASIC 360.PNG', 'EK AIO BASIC 240 EK AIO BASIC 360', '', 9, '479.00'),
(25, 'aio cooler', 'EK-AIO ELITE 360 D-RGB.PNG', 'EK-AIO ELITE 360 D-RGB', '', 9, '899.00'),
(26, 'psu power supply unit', 'FSP HYDRO G PRO 1000W 80 PLUS GOLD FULL MODULAR POWER SUPPLY.PNG', 'FSP HYDRO G PRO 1000W 80 PLUS GOLD FULL MODULAR POWER SUPPLY', '', 61, '899.00'),
(27, 'psu power supply unit', 'FSP Hydro PTM 750W 80+ Platinum Full Modular Power Supply.PNG', 'FSP Hydro PTM 750W 80+ Platinum Full Modular Power Supply', '', 61, '619.00'),
(28, 'ram', 'G.SKILL AEGIS 8GB (8GBx1) DDR4 2666MHZ.PNG', 'G.SKILL AEGIS 8GB (8GBx1) DDR4 2666MHZ', '', 9, '169.00'),
(29, 'ram', 'G.SKILL TRIDENT Z NEO 16GB (2X8GB) 3600MHZ CL18.PNG', 'G.SKILL TRIDENT Z NEO 16GB (2X8GB) 3600MHZ CL18', '', 9, '629.00'),
(30, 'gpu graphic card', 'GALAX GEFORCE RTX 3060 (1-CLICK-OC) 12GB GDDR6 + SILVERSTONE PF360 ARGB 360L AIO.PNG', 'GALAX GEFORCE RTX 3060 (1-CLICK-OC) 12GB GDDR6 + SILVERSTONE PF360 ARGB 360L AIO', '', 9, '6999.00'),
(31, 'gpu graphic card', 'GALAX GEFORCE RTX 3090 HOF PREMIUM 24GB GDDR6X.PNG', 'GALAX GEFORCE RTX 3090 HOF PREMIUM 24GB GDDR6X', '', 9, '16000.00'),
(32, 'ssd+hardisk+hdd', 'GIGABYTE AORUS RGB M.2 GEN 3 NVME 256GB 512GB.PNG', 'GIGABYTE AORUS RGB M.2 GEN 3 NVME 256GB 512GB', '', 37, '419.00'),
(33, 'ram', 'GSKILL TRIDENT Z ROYAL ELITE GOLD (16x2gb) 3600MHz (F4-3600C14D-32GTEGA).PNG', 'GSKILL TRIDENT Z ROYAL ELITE GOLD (16x2gb) 3600MHz (F4-3600C14D-32GTEGA)', '', 9, '1968.00'),
(34, 'ram', 'GSKILL TRIDENT Z ROYAL ELITE SILVER (16x2gb) 3600MHz (F4-3600C14D-32GTESA).PNG', 'GSKILL TRIDENT Z ROYAL ELITE SILVER (16x2gb) 3600MHz (F4-3600C14D-32GTESA)', '', 9, '1968.00'),
(35, 'OS Software microsoft office', 'MICROSOFT OFFICE 365 BUSINESS PREMIUM 1 PERSON 12MONTH PC&MAC.PNG', 'MICROSOFT OFFICE 365 BUSINESS PREMIUM 1 PERSON 12MONTH PC&MAC', '', 4, '599.00'),
(36, 'ssd+hardisk+hdd', 'SEAGATE BARRACUDA 2TB 2.5 INCH SATA 5400RPM 128MB.PNG', 'SEAGATE BARRACUDA 2TB 2.5 INCH SATA 5400RPM 128MB', '', 37, '341.00'),
(37, 'psu power supply unit', 'SILVERSTONE DA850 GOLD FULL MODULAR POWER SUPPLY.PNG', 'SILVERSTONE DA850 GOLD FULL MODULAR POWER SUPPLY', '', 61, '399.00'),
(38, 'aio cooler', 'SILVERSTONE PF360 WHITE AIO.PNG', 'SILVERSTONE PF360 WHITE AIO', '', 9, '399.00'),
(39, 'casing', 'SSUPD Meshlicious TG ITX Case (BLACKWHITE).PNG', 'SSUPD Meshlicious TG ITX Case (BLACKWHITE)', '', 37, '519.00');

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
(1, 'solehin15', '0175121027', 'ohhmyphaleg@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '', '910578', '::1'),
(2, 'kimmohito', '01111110470', 'kimmohito@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '', '', '192.168.0.178');

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
  MODIFY `cartId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
