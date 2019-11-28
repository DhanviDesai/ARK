-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2019 at 02:18 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ark`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_util`
--

CREATE TABLE `account_util` (
  `uid` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_util`
--

INSERT INTO `account_util` (`uid`, `prod_id`) VALUES
(8, 5),
(8, 6),
(8, 7),
(8, 8),
(9, 9),
(9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Notes'),
(2, 'Books'),
(3, 'Electronics'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `uid`, `name`, `category_id`, `price`, `quantity`, `description`) VALUES
(5, 8, 'Rubiks Cube', 4, 70, 1, 'It is a shengshou 3x3 mirror cube. 2 months old'),
(6, 8, 'Kafka on the shore', 2, 120, 1, 'Book by Harumi Murakami. Good condition'),
(7, 8, 'CN notes', 1, 50, 2, 'CN notes given by Dr.Ram P Rustagi'),
(8, 8, 'The monk who sold his ferrari', 2, 120, 1, 'It is a motivational book written by Robin Sharma'),
(9, 9, 'CG Notes', 1, 70, 1, '6th sem VTU CG notes'),
(10, 9, 'PCD Notes', 1, 50, 1, 'PCD VTU notes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `fname` varchar(56) NOT NULL,
  `lname` varchar(56) NOT NULL,
  `phoneno` varchar(12) NOT NULL,
  `email` varchar(56) NOT NULL,
  `password` varchar(56) NOT NULL,
  `username` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `fname`, `lname`, `phoneno`, `email`, `password`, `username`) VALUES
(8, 'Dhanvi', 'Desai', '919972948002', 'dhnvdesai@gmail.com', 'desai007', 'dhanvi'),
(9, 'User', '123', '1234567890', 'user@xyz.com', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_util`
--

CREATE TABLE `wishlist_util` (
  `uid` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist_util`
--

INSERT INTO `wishlist_util` (`uid`, `prod_id`) VALUES
(8, 5),
(8, 6),
(8, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_util`
--
ALTER TABLE `account_util`
  ADD PRIMARY KEY (`uid`,`prod_id`),
  ADD KEY `account_util_ibfk_1` (`prod_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `wishlist_util`
--
ALTER TABLE `wishlist_util`
  ADD PRIMARY KEY (`uid`,`prod_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_util`
--
ALTER TABLE `account_util`
  ADD CONSTRAINT `account_util_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `wishlist_util`
--
ALTER TABLE `wishlist_util`
  ADD CONSTRAINT `wishlist_util_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
