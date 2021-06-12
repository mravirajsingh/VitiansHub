-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2021 at 09:26 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitianshub`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `chat_room_id` int(11) DEFAULT NULL,
  `chat_msg` text DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `chat_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `chat_room_id`, `chat_msg`, `userid`, `chat_date`) VALUES
(1, 1, 'Hello Everyone', 1, '2021-06-04 01:11:02am'),
(2, 1, 'Yess hello', 2, '2021-06-04 01:32:13am'),
(5, 1, 'Good morning guys !', 2, '2021-06-04 08:22:13am');

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE `chat_room` (
  `chat_room_id` int(11) NOT NULL,
  `chat_room_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_room`
--

INSERT INTO `chat_room` (`chat_room_id`, `chat_room_name`) VALUES
(1, 'Welcome To VitiansHub Chat Room!');

-- --------------------------------------------------------

--
-- Table structure for table `club_details`
--

CREATE TABLE `club_details` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club_details`
--

INSERT INTO `club_details` (`id`, `name`, `type`, `fee`, `contact`, `link`) VALUES
(1, 'Adventure Club', 'Sport', '500', '4678965', 'http://vitap.ac.in/adventure-club-2/'),
(2, 'Music Club', 'Extracurricular', '200', '897456', 'http://vitap.ac.in/music-club-2/'),
(3, 'Bulls and Bears', 'Financial Management', '1000', '9856321', 'http://vitap.ac.in/invest-and-stock-club/'),
(4, 'Dungeon', 'Bodybuilding', '500', '985632', 'http://vitap.ac.in/dungeon-club-2/'),
(5, 'Google Developers Student Club', 'Technology', 'Free', '546321', 'http://vitap.ac.in/gdsc-club/');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `stipend` varchar(10) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `name`, `type`, `stipend`, `contact`, `link`) VALUES
('1', 'Orangewood Labs', 'Software - internship', '15000', 'contact@orangewood.com', 'https://www.orangewood.co/'),
('2', 'Click Labs', 'Super Dream internship software', '25000', 'contact@clicklabs.com', 'https://click-labs.com/'),
('3', 'NUNAM TECHNOLOGIES', 'Dream', '20000', 'contact@nunam.com', 'https://www.nunam.com'),
('4', 'ESKO-GRAPHICS', 'Regular', '35000', 'contact@esko.com', 'https://www.esko.com'),
('4', 'NUNAM TECHNOLOGIES', 'Dream', '20000', 'contact@nunam.com', 'https://www.nunam.com');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `program` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `owner` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `program`, `subject`, `owner`, `date`, `link`) VALUES
(1, 'MTech', 'IWP', 'Swati Sinha', '2021-06-05 10:35:43am', 'upload/html.pdf'),
(2, 'MCA', 'Java', 'Avinash Raj', '2021-06-05 10:39:33am', 'upload/java.pdf'),
(11, 'MCA', 'IoT', 'Avinash Raj', '2021-06-05 11:33:10am', 'upload/operating_system.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `questions_paper`
--

CREATE TABLE `questions_paper` (
  `id` int(11) NOT NULL,
  `program` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `owner` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions_paper`
--

INSERT INTO `questions_paper` (`id`, `program`, `subject`, `owner`, `year`, `date`, `link`) VALUES
(1, 'MTech', 'IWP', 'Swati Sinha', '2016', '2021-06-05 10:35:43am', 'upload/html.pdf'),
(2, 'MCA', 'Java', 'Avinash Raj', '2019', '2021-06-05 10:39:33am', 'upload/java.pdf'),
(3, 'MCA', 'DOS', 'Swati Sinha', '2020', '2021-06-05 11:55:32am', 'upload/PROCESSOR.pdf'),
(4, 'BTech', 'IoT', 'Avinash Raj', '2015', '2021-06-05 12:25:13pm', 'upload/Network_security.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `name`, `password`) VALUES
(1, 'user1@vitstudent.ac.in', 'Avinash Raj', '123456789'),
(2, 'user2@vitstudent.ac.in', 'Swati Sinha', '987654321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD PRIMARY KEY (`chat_room_id`);

--
-- Indexes for table `club_details`
--
ALTER TABLE `club_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions_paper`
--
ALTER TABLE `questions_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `chat_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questions_paper`
--
ALTER TABLE `questions_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
