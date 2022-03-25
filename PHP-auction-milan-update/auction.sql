-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 01:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(7) NOT NULL,
  `delivery` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `product_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sold` varchar(3) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodName`, `description`, `price`, `delivery`, `startDate`, `endDate`, `product_id`, `username`, `sold`, `buyer`, `post_tags`, `image`) VALUES
('sold test 2', 'test', 2090, 'test', '2022-03-24', '2022-03-25', 27, 'new', 'Yes', 'Null', 'fasgsa', ''),
('Nokia', 'image test', 10, 'whatever', '2022-03-25', '2022-03-26', 40, 'new', 'No', 'Null', 'halo', ''),
('fon', 'test', 100, 'test', '2022-03-25', '2022-03-28', 44, 'new', 'No', 'Null', 'test', 'items/samsungga.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstName` varchar(255) NOT NULL,
  `user_lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_email`, `user_password`, `user_firstName`, `user_lastName`, `username`, `user_id`) VALUES
('noviiii@gagss', 'test', 'Novi', 'Edit', 'noviedit', 6),
('stefan@gmail.com', 'test', 'Stefan', 'Stefanovic', '', 10),
('kupac@gmail.com', 'test', 'Kupac', 'Test', 'kupac', 15),
('new@gmail.com', 'test', 'lala', 'fgafa', 'new', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
