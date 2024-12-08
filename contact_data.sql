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
(1, 'D.R.I.', '12-6-24', '', '', '', '', ''),
(2, 'Why Bonnie', '12-6-24', '', '', '', '', ''),
(3, 'Nightmare Before Christmas Party', '12-7-24', '', '', '', '', ''),
(4, 'KPOP Night', '12-7-24', '', '', '', '', ''),
(5, 'The Mountain Goats', '12-9-24', '', '', '', '', ''),
(6, 'Lie', '12-11-24', '', '', '', '', ''),
(7, 'Olive Klug', '12-11-24', '', '', '', '', ''),
(8, 'Teenage Bottlerocket', '12-12-24', '', '', '', '', ''),
(9, 'Tear Dungeon', '12-13-24', '', '', '', '', ''),
(10, 'Soft Kill', '12-13-24', '', '', '', '', ''),
(11, 'Phora: Child of God Tour', '12-14-24', '', '', '', '', ''),
(12, 'sundiver ca, Marlon Funaki', '12-14-24', '', '', '', '', ''),
(13, 'FOL HOLIDAY TOY DRIVE `24', '12-14-24', '', '', '', '', ''),
(14, 'Die Spitz', '12-20-24', '', '', '', '', ''),
(15, 'Local Disturbance: 20th Annual', '12-21-24', '', '', '', '', ''),
(16, 'Bidi Bidi Banda', '12-22-24', '', '', '', '', ''),
(17, 'Life Cycles', '12-27-24', '', '', '', '', ''),
(18, 'Orion 224', '12-21-24', '', '', '', '', ''),
(19, '2nd Annual WINTERFEST METAL MASSACRE', '12-28-24', '', '', '', '', ''),
(20, 'Solitary Runaway', '12-28-24', '', '', '', '', ''),
(21, 'TR/ST', '12-30-24', '', '', '', '', ''),
(22, 'NYE $ PdV', '12-31-24', '', '', '', '', '');






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
