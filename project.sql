-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 02:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` enum('admin','user') NOT NULL DEFAULT 'user',
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `cgpa` decimal(3,2) NOT NULL DEFAULT 0.00,
  `email` varchar(100) NOT NULL DEFAULT '',
  `address` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `roll`, `password`, `user_type`, `name`, `phone`, `cgpa`, `email`, `address`) VALUES
(1, '21052163', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'Aditya Bhardwaj', '6206884279', '9.01', '21052163@kiit.ac.in', 'Patna'),
(2, '21051246', '381d4dcacacdc3e9abf2cb74115fa4e3', 'user', 'Sanket Kumar Mohapatra', '8249454080', '9.40', '21051246@kiit.ac.in', 'Bhubaneswar'),
(3, '21051683', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'Shilpi Tikader', '9752692282', '8.68', '21051683@kiit.ac.in', 'Kolkata'),
(4, '21051481', '99e52704462d3580db3528cad7ea9660', 'user', 'Suhank Kali', '9938967411', '9.10', '21051481@kiit.ac.in', 'Bhubaneswar'),
(8, '21052126', 'cf9c2b50c45dae741f96e5c12bd14aef', 'admin', 'Aastha Anand', '09897054908', '9.90', '21052126@kiit.ac.in', 'Patna'),
(9, '21051747', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'Nimisha Ghosh', '9827613535', '8.50', '21051747@kiit.ac.in', 'Angul'),
(10, '21051734', '202cb962ac59075b964b07152d234b70', 'user', 'Harshita Laad', '6265444148', '8.50', '21051734@kiit.ac.in', 'Indore'),
(11, '21051699', 'ef2a4be5473ab0b3cc286e67b1f59f44', 'user', 'Vipashyana Deepak', '7484815298', '8.67', '21051699@kiit.ac.in', 'Gaya'),
(12, '21051477', '78b9cab19959e4af8ff46156ee460c74', 'user', 'Harpreet Kaur', '9708444610', '8.90', '21051477@kiit.ac.in', 'Jamshedpur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
