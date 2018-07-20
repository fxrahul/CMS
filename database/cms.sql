-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 08:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `post` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(5, 'March-04-2018 22:13:17', 'sS', 'fdxfncfncgn', 'Rahul Singh', 'niraj.jpg', 'SCASCsc'),
(6, 'March-11-2018 15:17:11', 'eqvwevw', 'amit', 'Rahul Singh', 'background2.jpg', '            bgssssssssssssssssssssssssssssssssssssssssssssssssssssss          '),
(7, 'March-11-2018 15:24:12', 'fwe', 'hajhJ', 'Rahul Singh', 'background3.jpg', 'ceeeeeeddddddddd'),
(8, 'March-11-2018 16:08:01', 'acs', 'hajhJ', 'rahul', 'background3.jpg', 'caaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(9, 'March-11-2018 16:14:27', 'test', 'ajay', 'root', 'comment.png', 'testing'),
(10, 'March-11-2018 21:07:27', 'scassc', 'fdxfncfncgn', 'root', 'background1.jpg', 'sasasc'),
(11, 'March-11-2018 21:07:35', 'sacASC', 'fdxfncfncgn', 'root', 'background1.jpg', 'ASAa ad VAVA'),
(12, 'March-11-2018 21:07:44', 'ASASVASVadv', 'amit', 'root', 'background3.jpg', 'asasvasv'),
(13, 'March-11-2018 21:07:58', 'wcSCavADVavA', 'edu', 'root', 'background2.jpg', 'ADVadvDVdsvvvvvvvvvvvvvvvv'),
(14, 'March-11-2018 21:08:18', 'z Z zc zc ZC zC ', 'hajhJ', 'root', 'background2.jpg', ' ccccccccccccccccccccccccccccc'),
(15, 'March-11-2018 21:08:33', 'dvzdbzdvddvdvadv', 'books', 'root', 'background3.jpg', 'dvssssssssssssssssssssss'),
(16, 'March-11-2018 21:08:54', 'zvavavasvasvasvasvasvav', 'ajay', 'root', 'background2.jpg', 'aACscSCscASCASCASASC'),
(17, 'March-11-2018 21:09:28', 'ZXA ZX AX ', 'amit', 'root', 'background2.jpg', 'ADVADDDDDDDDDDDD'),
(18, 'March-11-2018 21:09:43', 'SAAAAAAAAAAAAAA', 'edu', 'root', 'background2.jpg', 'SCCCCCCCCCCCCCCCCCCCCCCCCC'),
(19, 'March-11-2018 21:09:53', 'SCscSCscscscascSXASCSCASC', 'ajay', 'root', 'background2.jpg', 'SCCCCCCCCCCCCCCCCCCCCC'),
(20, 'March-11-2018 23:11:21', 'ssvvasv', 'edu', 'root', 'background3.jpg', 'svaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `creatorname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `datetime`, `name`, `creatorname`) VALUES
(1, 'March-02-2018 15:38:12', 'books', 'Rahul Singh'),
(2, 'March-02-2018 15:40:11', 'hajhJ', 'Rahul Singh'),
(18, 'March-02-2018 16:17:31', 'amit', 'Rahul Singh'),
(19, 'March-02-2018 16:19:48', 'ajay', 'Rahul Singh'),
(23, 'March-02-2018 16:28:19', 'fdxfncfncgn', 'Rahul Singh'),
(24, 'March-11-2018 16:11:11', 'edu', 'rahul');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(200) NOT NULL,
  `status` varchar(5) NOT NULL,
  `admin_panel_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `email`, `comment`, `approvedby`, `status`, `admin_panel_id`) VALUES
(1, 'March-09-2018 18:26:10', 'Rahul Singh', 'rohits130198@gmail.com', 'rrhf................................adfggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggadj', '', 'ON', 5),
(3, 'March-10-2018 00:16:07', 'rohit', 'rs316222@gmail.com', 'jdvablllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllbajvbajdvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvl;', '', 'OFF', 5),
(4, 'March-11-2018 15:21:31', 'rrrrrrrr', 'rs@gmail.com', 'acsssvdddddddddddddddddd', '', 'ON', 6),
(5, 'March-11-2018 16:27:39', 'sSVSV', 'rohits130198@gmail.com', 'approve test', 'root', 'OFF', 9);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `addedby` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `datetime`, `username`, `password`, `addedby`) VALUES
(3, 'March-11-2018 12:39:21', 'rahul', 'dc0625038382ea1a672c1ab7ecb0a5e2', 'Rahul Singh'),
(4, 'March-11-2018 16:12:37', 'root', 'dc0625038382ea1a672c1ab7ecb0a5e2', 'rahul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_panel_id` (`admin_panel_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `foreign key to admin_panel table` FOREIGN KEY (`admin_panel_id`) REFERENCES `admin_panel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
