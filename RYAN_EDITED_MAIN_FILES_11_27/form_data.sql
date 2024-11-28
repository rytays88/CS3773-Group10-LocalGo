-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2024 at 10:58 PM
-- Server version: 8.0.40-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users` -- this will be for log in stuff 
--
CREATE TABLE `Users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password_hash` varchar(255) NOT NULL,    -- will need to hash so im just gonna start working toward that (changed varchar from 16 to 255)
  PRIMARY KEY (user_id)
);

--
-- Table structure for table `form_data` -- this will be for events 
--

CREATE TABLE `form_data` (
  `auto_id` int NOT NULL,
  `first_name` varchar(32) NOT NULL,   -- event name
  `last_name` varchar(32) NOT NULL,    -- event date
  `email` varchar(32) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `username` varchar(16) NOT NULL,     -- event time 
  `password` varchar(16) NOT NULL,     -- event ticket price 
  `comments` text NOT NULL             -- once we ensure this current version is working, maybe we can use this comments val as created_by
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`auto_id`, `first_name`, `last_name`, `email`, `phone`, `username`, `password`, `comments`) VALUES
(12, 'Don Broko', 'August15', '', '', '8:00', '50', ''),
(13, 'Taylor Swift', 'August30', '', '', '9:00', '80', ''),
(14, 'Lady Gaga', 'September1', '', '', '9:00', '100', ''),
(15, 'Metallica', 'October1', '', '', '10:00', '50', ''),
(16, 'Test ', 'Test', '', '', 'Test', 'test', ''),
(17, 'testingName', 'testingDate', '', '', 'testingTime', 'testingPrice', ''),
(18, 'asdf', 'asdf', 'asdf@asdf.com', '', '', '', ''),
(19, 'asdffdsa', 'asdffdsa', 'asdf@asdf.com', '', '', '', ''),
(20, 'gdgdgdgdggd', 'gdgdgdgdgd', 'gdgdgd@hfhfhfg.com', '', '', '', ''),
(21, 'xmxmxmxmmxmx', '34343434343', '', '', '300', '400', ''),
(22, 'testChazNovTwenty', 'testChaz1120', '', '', '', '', ''),
(23, 'testagain', 'testagain', '', '', '', '', ''),
(24, 'testagainB', 'testagainB', '', '', '', '', ''),
(25, 'ChazTest', 'ChazTest', '', '', '', '', ''),
(26, 'testRegistration', 'TestRegistration', '', '', 'testRegistration', 'TestRegistration', ''),
(27, 'testting', 'teeesting', '', '', 'testiiiing', 'tesssting', ''),
(28, 'dcdcdcdcdc', 'dcdcdcdcdcdc', '', '', 'dcdcdcdcdc', 'dcdcdcdcdc', ''),
(29, 'asasasasas', 'asasasasasas', '', '', 'asasasasasasa', 'asasasasasasas', ''),
(30, 'rfrfrfrfrfrfrfrf', '', '', '', 'rfrfrfrfrrfrfr', 'rfrfrfrfrf', ''),
(31, 'Hello123', 'Hello123', '', '', 'Hello123', 'Hello123', ''),
(32, 'HelloHash', 'HelloHash', '', '', 'HelloHash', 'HelloHash', ''),
(33, 'WhateverDude', 'WhateverDude', '', '', '', '', ''),
(34, 'TestRyan', '11-21-24', '', '', '', '', ''),
(35, 'Chaztestnov23', 'ChaztestNov23', '', '', '', '', ''),
(36, 'testingAgain', 'testingAgain', '', '', '', '', ''),
(37, 'moreTesting', 'moreTesting', '', '', '', '', ''),
(38, 'testing', 'testing', '', '', '', '', ''),
(39, 'testing2', 'testing2', '', '', '', '', ''),
(40, 'testing3', 'testing3', '', '', '', '', ''),
(41, 'testing3', 'testing3', '', '', '', '', ''),
(42, 'test', 'test', '', '', '', '', ''),
(43, 'test', 'test', '', '', '', '', ''),
(44, 'stuff', 'stuff', '', '', 'stuff', 'stuff', ''),
(45, 'morestuff', 'morestuff', '', '', '', '', ''),
(46, 'stuff2', 'stuff2', '', '', 'stuff2', 'stuff2', ''),
(51, 'Ryan', 'Tays', '', '', 'ryantest', 'ryanpassword', ''),
(52, 'Slayer', '11-21-24', '', '', '', '', ''),
(53, 'testChaz112524', 'testChaz112524', '', '', 'testChaz112524', 'testChaz112524', ''),
(54, 'testChaz1234', 'testChaz1234', '', '', 'testChaz112524', 'testChaz112524', ''),
(55, 'testChaztestChaz', 'testChaztestChaz', '', '', '', '', ''),
(56, 'afdadsfadsf', 'adfasdfadf', '', '', '', '', ''),
(57, 'ffffffffffff', 'ffffffffffff', '', '', '', '', ''),
(58, 'dddddddddd', 'dddddddd', '', '', 'ddddddd', 'dddddddddd', ''),
(59, 'ggggggggggg', 'gggggggggg', '', '', '', '', ''),
(60, 'TestEvent ', '11-25-24', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`auto_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_data`
--
ALTER TABLE `form_data`
  MODIFY `auto_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
