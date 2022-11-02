-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 01:28 PM
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
(0, 'Calvert-Lewin', 'Forward', 0, 'England'),
(1, 'Pope', 'Goal Keeper', 0, 'England'),
(2, 'Ramsdale', 'Goal Keeper', 0, 'England'),
(3, 'Henderson', 'Goal Keeper', 0, 'England'),
(4, 'Pickford', 'Goal Keeper', 0, 'England'),
(5, 'James', 'Defender', 0, 'England'),
(6, 'Shaw', 'Defender', 0, 'England'),
(7, 'Stones', 'Defender', 0, 'England'),
(8, 'White', 'Defender', 0, 'England'),
(9, 'Maddison', 'Midfielder', 0, 'England'),
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
(27, 'Bowen', 'Forward', 0, 'England'),
(28, 'Kane', 'Forward', 0, 'England'),
(29, 'Sterling', 'Forward', 0, 'England'),
(30, 'Foden', 'Forward', 0, 'England'),
(31, 'Saka', 'Forward', 0, 'England'),
(32, 'Toney', 'Forward', 0, 'England'),
(33, 'Abraham', 'Forward', 0, 'England'),
(34, 'Rashford', 'Forward', 0, 'England'),
(35, 'Watkins', 'Forward', 0, 'England'),
(36, 'Sancho', 'Forward', 0, 'England'),
(37, 'Hennessey', 'Goal Keeper', 0, 'Wales'),
(38, 'Ward', 'Goal Keeper', 0, 'Wales'),
(39, 'A Davies', 'Goal Keeper', 0, 'Wales'),
(40, 'King', 'Goal Keeper', 0, 'Wales'),
(41, 'Gunter', 'Defender', 0, 'Wales'),
(42, 'Roberts', 'Defender', 0, 'Wales'),
(43, 'Rodon', 'Defender', 0, 'Wales'),
(44, 'N Williams', 'Defender', 0, 'Wales'),
(45, 'Ampadu', 'Midfielder', 0, 'Wales'),
(46, 'B Davies', 'Defender', 0, 'Wales'),
(47, 'Cabango', 'Defender', 0, 'Wales'),
(48, 'Denham', 'Defender', 0, 'Wales'),
(49, 'Lawrence', 'Defender', 0, 'Wales'),
(50, 'Mepham', 'Defender', 0, 'Wales'),
(51, 'J Williams', 'Midfielder', 0, 'Wales'),
(52, 'Morrell', 'Midfielder', 0, 'Wales'),
(53, 'Smith', 'Midfielder', 0, 'Wales'),
(54, 'Levitt', 'Midfielder', 0, 'Wales'),
(55, 'Colwill', 'Midfielder', 0, 'Wales'),
(56, 'Thomas', 'Midfielder', 0, 'Wales'),
(57, 'Matondo', 'Midfielder', 0, 'Wales'),
(58, 'Allen', 'Midfielder', 0, 'Wales'),
(59, 'Cooper', 'Midfielder', 0, 'Wales'),
(60, 'Ramsey', 'Midfielder', 0, 'Wales'),
(61, 'Wilson', 'Midfielder', 0, 'Wales'),
(62, 'Bale', 'Forward', 0, 'Wales'),
(63, 'James', 'Forward', 0, 'Wales'),
(64, 'Moore', 'Forward', 0, 'Wales'),
(65, 'Roberts', 'Forward', 0, 'Wales'),
(66, 'Johnson', 'Forward', 0, 'Wales'),
(67, 'Broadhead', 'Forward', 0, 'Wales'),
(68, 'Thomas', 'Forward', 0, 'Wales'),
(69, 'Wilson', 'Forward', 0, 'England'),
(70, 'Lockyer', 'Defender', 0, 'Wales'),
(71, 'Savage', 'Midfielder', 0, 'Wales'),
(72, 'L Harris', 'Forward', 0, 'Wales'),
(73, 'M Harris', 'Forward', 0, 'Wales'),
(74, 'Dunk', 'Defender', 0, 'England'),
(75, 'Loftus-Cheek', 'Midfielder', 0, 'England'),
(76, 'Welbeck', 'Forward', 0, 'England');

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
