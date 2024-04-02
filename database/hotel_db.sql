-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 06:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`) VALUES
(2, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactno` varchar(13) NOT NULL,
  `adult` int(11) NOT NULL,
  `child` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `user`, `firstname`, `middlename`, `lastname`, `address`, `contactno`, `adult`, `child`) VALUES
(19, 13, 'harshavardhan', '', 'GUGGILLA', 'kodur', '8367036895', 2, 1),
(20, 13, 'hemanth', '', 'vj', 'kodur', '9332777900', 2, 1),
(21, 9, 'bharathgd', '', 'roy', 'tpt', '8765431923', 2, 1),
(22, 9, 'hemanth', '', 'vj', 'kodur', '9332777900', 2, 2),
(23, 9, 'harshavardhan', '', 'GUGGILLA', 'kodur', '8367036895', 3, 2),
(24, 9, 'naveen', '', 'k', 'guntur', '9876543222', 2, 1),
(25, 9, 'naveen', '', 'k', 'guntur', '9876543222', 1, 2),
(32, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 1, 0),
(33, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 1, 2),
(34, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 2, 2),
(35, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 1, 0),
(36, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 2, 1),
(37, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 2, 1),
(38, 9, 'rave', '', 'kumaa', 'chennai', '1234567890', 2, 2),
(39, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 1, 0),
(40, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 1, 1),
(41, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 2, 1),
(42, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 2, 2),
(43, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 2, 1),
(44, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 1, 1),
(45, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 1, 0),
(46, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 1, 3),
(47, 9, 'rave', '', 'kumaa', 'chennai', '1234567890', 2, 1),
(48, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 1, 1),
(49, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 1, 1),
(50, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 1, 1),
(51, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 2, 2),
(52, 9, 'rave', '', 'kumaa', 'chennai', '1234567890', 4, 3),
(53, 9, 'vina', '', 'kumaa', 'chennai', '1234567890', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `total` int(100) NOT NULL,
  `price` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `total`, `price`, `photo`, `description`) VALUES
(1, 'Standard', 5, '2000', '1.jpg', 'haii 11'),
(3, 'Super Deluxe', 5, '2800', '4.jpg', 'haii 2'),
(4, 'Jr. Suite', 5, '3800', '5.jpg', 'haii 33'),
(6, 'Standard', 2, '1000', '1.jpg', 'haii 44'),
(9, 'Superior', 1, '2400', 'sup.jpg', 'haii 5 ');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` int(5) NOT NULL,
  `status` varchar(20) NOT NULL,
  `days` int(2) NOT NULL,
  `checkin` date NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout` date NOT NULL,
  `checkout_time` time NOT NULL,
  `bill` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `guest_id`, `user`, `room_id`, `room_no`, `status`, `days`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `bill`) VALUES
(51, 51, 9, 3, 1, 'Check Out', 1, '2024-03-15', '14:24:35', '2024-03-15', '14:25:19', '2800'),
(52, 52, 9, 1, 5, 'Check Out', 2, '2024-03-15', '14:26:45', '2024-03-15', '14:27:07', '4000'),
(53, 53, 9, 3, 1, 'Check Out', 1, '2024-03-19', '10:32:43', '2024-03-19', '10:33:09', '2800');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `mobile`, `image`) VALUES
(9, 'ramchinna', 'ramchinna123@gmail.com', '123', 8367036895, 'about-img.jpg'),
(13, 'harshav', 'ram123@gmail.com', '123', 7893398115, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
