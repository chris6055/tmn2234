-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 11:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `myuser`
--

CREATE TABLE `myuser` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `userID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` bigint(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `state` varchar(15) NOT NULL,
  `gender` enum('Male','Female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myuser`
--

INSERT INTO `myuser` (`firstname`, `lastname`, `userID`, `email`, `phonenumber`, `password`, `state`, `gender`) VALUES
('LeBron', 'James', 1, 'king@gmail.com', 60196382323, '22#wwE', 'sabah', 'Male'),
('Michelle', 'Chang', 2, 'yunwen@gmail.com', 60196384545, '44$rrR', 'kelantan', 'Female'),
('Muzuka', 'shii', 3, 'itried@gmail.com', 60196389999, 'Hhh*88', 'labuan', 'Female'),
('Christopher Sii', 'How Chiong', 4, 'chris96055@gmail.com', 60196386769, 'Ccc(99', 'sarawak', 'Male'),
('Halen', 'Nigel', 6, 'aunthalen@msg.com', 60196381234, 'iII8**', 'melaka', 'Female'),
('Muzuka', 'Shiidesu', 7, 'so@difficult.com', 60134448888, 'Rrr$44', 'putrajaya', 'Female'),
('Kawaii', 'desu yoo', 8, 'arigatou@difficult.com', 60134448888, 'Qqq!11', 'selangor', 'Female'),
('wakari', 'masu', 9, 'kawa@rimasu.com', 60112233344, '00)ppP', 'kedah', 'Male'),
('Haji', 'memashite', 10, 'nice@tomeet.you', 60123331111, '#33Eee', 'kelantan', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `myuserlog`
--

CREATE TABLE `myuserlog` (
  `userlogid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myuserlog`
--

INSERT INTO `myuserlog` (`userlogid`, `user_id`, `login_date_time`, `logout_date_time`, `duration`) VALUES
(1, 1, '2021-05-24 16:00:00', '2021-05-24 17:00:00', '01:00:00'),
(2, 2, '2021-05-24 17:00:00', '2021-05-25 19:00:00', '02:00:00'),
(3, 3, '2021-05-24 18:00:00', '2021-05-25 21:00:00', '03:00:00'),
(4, 4, '2021-05-24 19:00:00', '2021-05-25 22:00:00', '03:00:00'),
(6, 3, '2021-05-26 01:00:00', '2021-05-26 02:00:00', '00:00:00'),
(7, 3, '2021-05-26 02:00:00', '2021-05-26 03:00:00', '01:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myuser`
--
ALTER TABLE `myuser`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `myuserlog`
--
ALTER TABLE `myuserlog`
  ADD PRIMARY KEY (`userlogid`),
  ADD KEY `myuserlog_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myuser`
--
ALTER TABLE `myuser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `myuserlog`
--
ALTER TABLE `myuserlog`
  MODIFY `userlogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `myuserlog`
--
ALTER TABLE `myuserlog`
  ADD CONSTRAINT `myuserlog_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `myuser` (`userID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
