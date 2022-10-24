-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 11:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pick_your_team`
--

-- --------------------------------------------------------

--
-- Table structure for table `wcss_player_votes`
--

CREATE TABLE `wcss_player_votes` (
  `player_id` int(9) NOT NULL,
  `player_name` varchar(100) NOT NULL,
  `player_role` varchar(100) NOT NULL,
  `player_votes` int(9) NOT NULL DEFAULT 0,
  `team` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wcss_player_votes`
--

INSERT INTO `wcss_player_votes` (`player_id`, `player_name`, `player_role`, `player_votes`, `team`) VALUES
(1, 'Pope', 'Goal Keeper', 0, 'England'),
(2, 'Ramsdale', 'Goal Keeper', 0, 'England'),
(3, 'Henderson', 'Goal Keeper', 0, 'England'),
(4, 'Pickford', 'Goal Keeper', 0, 'England'),
(5, 'James', 'Defender', 0, 'England'),
(6, 'Shaw', 'Defender', 0, 'England'),
(7, 'Stones', 'Defender', 0, 'England'),
(8, 'Shaw', 'Defender', 0, 'England'),
(9, 'Stones', 'Defender', 0, 'England'),
(10, 'Dier', 'Defender', 0, 'England'),
(11, 'Maguire', 'Defender', 0, 'England'),
(12, 'Trippier', 'Defender', 0, 'England'),
(13, 'Walker', 'Defender', 0, 'England'),
(14, 'Coady', 'Defender', 0, 'England'),
(15, 'Guéhi', 'Defender', 0, 'England'),
(16, 'Chilwell', 'Defender', 0, 'England'),
(17, 'Alexander-Arnold', 'Defender', 0, 'England'),
(18, 'Tomori', 'Defender', 0, 'England'),
(19, 'Mings', 'Defender', 0, 'England'),
(20, 'Rice', 'Midfielder', 0, 'England'),
(21, 'Bellingham', 'Midfielder', 0, 'England'),
(22, 'Henderson', 'Midfielder', 0, 'England'),
(23, 'Mount', 'Midfielder', 0, 'England'),
(24, 'Ward-Prowse', 'Midfielder', 0, 'England'),
(25, 'Phillips', 'Midfielder', 0, 'England'),
(26, 'Grealish', 'Midfielder', 0, 'England'),
(27, 'Bowen', 'Midfielder', 0, 'England'),
(28, 'Kane', 'Forward', 0, 'England'),
(29, 'Sterling', 'Forward', 0, 'England'),
(30, 'Foden', 'Forward', 0, 'England'),
(31, 'Saka', 'Forward', 0, 'England'),
(32, 'Toney', 'Forward', 0, 'England'),
(33, 'Abraham', 'Forward', 0, 'England'),
(34, 'Rashford', 'Forward', 0, 'England'),
(35, 'Watkins', 'Forward', 0, 'England'),
(36, 'Sancho', 'Forward', 0, 'England'),
(37, 'Hennessey', 'Goal Keeper', 1, 'Wales'),
(38, 'Ward', 'Goal Keeper', 3, 'Wales'),
(39, 'Davies', 'Goal Keeper', 3, 'Wales'),
(40, 'King', 'Goal Keeper', 3, 'Wales'),
(41, 'Gunter', 'Defender', 2, 'Wales'),
(42, 'Roberts', 'Defender', 3, 'Wales'),
(43, 'Rodon', 'Defender', 3, 'Wales'),
(44, 'Williams', 'Defender', 3, 'Wales'),
(45, 'Ampadu', 'Defender', 3, 'Wales'),
(46, 'Davies', 'Defender', 3, 'Wales'),
(47, 'Cabango', 'Defender', 2, 'Wales'),
(48, 'Davies', 'Defender', 2, 'Wales'),
(49, 'Lawrence', 'Defender', 2, 'Wales'),
(50, 'Mepham', 'Defender', 2, 'Wales'),
(51, 'Williams', 'Midfielder', 1, 'Wales'),
(52, 'Morrell', 'Midfielder', 3, 'Wales'),
(53, 'Smith', 'Midfielder', 3, 'Wales'),
(54, 'Levitt', 'Midfielder', 3, 'Wales'),
(55, 'Colwill', 'Midfielder', 3, 'Wales'),
(56, 'Thomas', 'Midfielder', 3, 'Wales'),
(57, 'Burns', 'Midfielder', 2, 'Wales'),
(58, 'Allen', 'Midfielder', 3, 'Wales'),
(59, 'James', 'Midfielder', 1, 'Wales'),
(60, 'Ramsey', 'Midfielder', 3, 'Wales'),
(61, 'Wilson', 'Midfielder', 2, 'Wales'),
(62, 'Bale', 'Forward', 2, 'Wales'),
(63, 'James', 'Forward', 3, 'Wales'),
(64, 'Moore', 'Forward', 3, 'Wales'),
(65, 'Roberts', 'Forward', 3, 'Wales'),
(66, 'Johnson', 'Forward', 3, 'Wales'),
(67, 'Harris', 'Forward', 3, 'Wales'),
(68, 'Matondo', 'Forward', 3, 'Wales');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wcss_player_votes`
--
ALTER TABLE `wcss_player_votes`
  ADD PRIMARY KEY (`player_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
