-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 03:33 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mr_simple_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `mr_shop_cart_user`
--

CREATE TABLE `mr_shop_cart_user` (
  `cartID` int(11) NOT NULL,
  `transDate` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `sizeID` tinyint(1) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mr_shop_cart_user`
--

INSERT INTO `mr_shop_cart_user` (`cartID`, `transDate`, `userID`, `productID`, `sizeID`, `quantity`, `dateCreated`, `dateUpdated`) VALUES
(1, '2023-07-04 09:05:41', 1, 1, 3, 3, '2023-07-04 09:05:41', '2023-07-04 09:05:41'),
(2, '2023-07-04 09:12:52', 1, 1, 2, 11, '2023-07-04 09:12:52', '2023-07-04 09:12:52'),
(3, '2023-07-04 09:16:22', 1, 1, 3, 4, '2023-07-04 09:14:25', '2023-07-04 09:16:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mr_shop_cart_user`
--
ALTER TABLE `mr_shop_cart_user`
  ADD PRIMARY KEY (`cartID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mr_shop_cart_user`
--
ALTER TABLE `mr_shop_cart_user`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
