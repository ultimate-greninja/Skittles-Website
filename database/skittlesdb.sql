-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2025 at 02:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skittlesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `GameID` int(11) NOT NULL,
  `TeamH` varchar(20) NOT NULL,
  `TeamA` varchar(20) NOT NULL,
  `GameType` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = legs, 1 = pins',
  `Position1H` varchar(5) NOT NULL,
  `Position2H` varchar(5) NOT NULL,
  `Position3H` varchar(5) NOT NULL,
  `Position4H` varchar(5) NOT NULL,
  `Position5H` varchar(5) NOT NULL,
  `Position6H` varchar(5) NOT NULL,
  `Position7H` varchar(5) NOT NULL,
  `Position8H` varchar(5) NOT NULL,
  `Position1A` varchar(5) NOT NULL,
  `Position2A` varchar(5) NOT NULL,
  `Position3A` varchar(5) NOT NULL,
  `Position4A` varchar(5) NOT NULL,
  `Position5A` varchar(5) NOT NULL,
  `Position6A` varchar(5) NOT NULL,
  `Position7A` varchar(5) NOT NULL,
  `Position8A` varchar(5) NOT NULL,
  `R1P1TA` int(2) NOT NULL,
  `R1P2TA` int(2) NOT NULL,
  `R1P3TA` int(2) NOT NULL,
  `R1P4TA` int(2) NOT NULL,
  `R1P5TA` int(2) NOT NULL,
  `R1P6TA` int(2) NOT NULL,
  `R1P7TA` int(2) NOT NULL,
  `R1P8TA` int(2) NOT NULL,
  `R1P1TH` int(2) NOT NULL,
  `R1P2TH` int(2) NOT NULL,
  `R1P3TH` int(2) NOT NULL,
  `R1P4TH` int(2) NOT NULL,
  `R1P5TH` int(2) NOT NULL,
  `R1P6TH` int(2) NOT NULL,
  `R1P7TH` int(2) NOT NULL,
  `R1P8TH` int(2) NOT NULL,
  `R2P1TA` int(2) NOT NULL,
  `R2P2TA` int(2) NOT NULL,
  `R2P3TA` int(2) NOT NULL,
  `R2P4TA` int(2) NOT NULL,
  `R2P5TA` int(2) NOT NULL,
  `R2P6TA` int(2) NOT NULL,
  `R2P7TA` int(2) NOT NULL,
  `R2P8TA` int(2) NOT NULL,
  `R2P1TH` int(2) NOT NULL,
  `R2P2TH` int(2) NOT NULL,
  `R2P3TH` int(2) NOT NULL,
  `R2P4TH` int(2) NOT NULL,
  `R2P5TH` int(2) NOT NULL,
  `R2P6TH` int(2) NOT NULL,
  `R2P7TH` int(2) NOT NULL,
  `R2P8TH` int(2) NOT NULL,
  `R3P1TA` int(2) NOT NULL,
  `R3P2TA` int(2) NOT NULL,
  `R3P3TA` int(2) NOT NULL,
  `R3P4TA` int(2) NOT NULL,
  `R3P5TA` int(2) NOT NULL,
  `R3P6TA` int(2) NOT NULL,
  `R3P7TA` int(2) NOT NULL,
  `R3P8TA` int(2) NOT NULL,
  `R3P1TH` int(2) NOT NULL,
  `R3P2TH` int(2) NOT NULL,
  `R3P3TH` int(2) NOT NULL,
  `R3P4TH` int(2) NOT NULL,
  `R3P5TH` int(2) NOT NULL,
  `R3P6TH` int(2) NOT NULL,
  `R3P7TH` int(2) NOT NULL,
  `R3P8TH` int(2) NOT NULL,
  `R4P1TA` int(2) NOT NULL,
  `R4P2TA` int(2) NOT NULL,
  `R4P3TA` int(2) NOT NULL,
  `R4P4TA` int(2) NOT NULL,
  `R4P5TA` int(2) NOT NULL,
  `R4P6TA` int(2) NOT NULL,
  `R4P7TA` int(2) NOT NULL,
  `R4P8TA` int(2) NOT NULL,
  `R4P1TH` int(2) NOT NULL,
  `R4P2TH` int(2) NOT NULL,
  `R4P3TH` int(2) NOT NULL,
  `R4P4TH` int(2) NOT NULL,
  `R4P5TH` int(2) NOT NULL,
  `R4P6TH` int(2) NOT NULL,
  `R4P7TH` int(2) NOT NULL,
  `R4P8TH` int(2) NOT NULL,
  `R5P1TA` int(2) NOT NULL,
  `R5P2TA` int(2) NOT NULL,
  `R5P3TA` int(2) NOT NULL,
  `R5P4TA` int(2) NOT NULL,
  `R5P5TA` int(2) NOT NULL,
  `R5P6TA` int(2) NOT NULL,
  `R5P7TA` int(2) NOT NULL,
  `R5P8TA` int(2) NOT NULL,
  `R5P1TH` int(2) NOT NULL,
  `R5P2TH` int(2) NOT NULL,
  `R5P3TH` int(2) NOT NULL,
  `R5P4TH` int(2) NOT NULL,
  `R5P5TH` int(2) NOT NULL,
  `R5P6TH` int(2) NOT NULL,
  `R5P7TH` int(2) NOT NULL,
  `R5P8TH` int(2) NOT NULL,
  `R6P1TA` int(2) NOT NULL,
  `R6P2TA` int(2) NOT NULL,
  `R6P3TA` int(2) NOT NULL,
  `R6P4TA` int(2) NOT NULL,
  `R6P5TA` int(2) NOT NULL,
  `R6P6TA` int(2) NOT NULL,
  `R6P7TA` int(2) NOT NULL,
  `R6P8TA` int(2) NOT NULL,
  `R6P1TH` int(2) NOT NULL,
  `R6P2TH` int(2) NOT NULL,
  `R6P3TH` int(2) NOT NULL,
  `R6P4TH` int(2) NOT NULL,
  `R6P5TH` int(2) NOT NULL,
  `R6P6TH` int(2) NOT NULL,
  `R6P7TH` int(2) NOT NULL,
  `R6P8TH` int(2) NOT NULL,
  `R7P1TA` int(2) NOT NULL,
  `R7P2TA` int(2) NOT NULL,
  `R7P3TA` int(2) NOT NULL,
  `R7P4TA` int(2) NOT NULL,
  `R7P5TA` int(2) NOT NULL,
  `R7P6TA` int(2) NOT NULL,
  `R7P7TA` int(2) NOT NULL,
  `R7P8TA` int(2) NOT NULL,
  `R7P1TH` int(2) NOT NULL,
  `R7P2TH` int(2) NOT NULL,
  `R7P3TH` int(2) NOT NULL,
  `R7P4TH` int(2) NOT NULL,
  `R7P5TH` int(2) NOT NULL,
  `R7P6TH` int(2) NOT NULL,
  `R7P7TH` int(2) NOT NULL,
  `R7P8TH` int(2) NOT NULL,
  `R8P1TA` int(2) NOT NULL,
  `R8P2TA` int(2) NOT NULL,
  `R8P3TA` int(2) NOT NULL,
  `R8P4TA` int(2) NOT NULL,
  `R8P5TA` int(2) NOT NULL,
  `R8P6TA` int(2) NOT NULL,
  `R8P7TA` int(2) NOT NULL,
  `R8P8TA` int(2) NOT NULL,
  `R8P1TH` int(2) NOT NULL,
  `R8P2TH` int(2) NOT NULL,
  `R8P3TH` int(2) NOT NULL,
  `R8P4TH` int(2) NOT NULL,
  `R8P5TH` int(2) NOT NULL,
  `R8P6TH` int(2) NOT NULL,
  `R8P7TH` int(2) NOT NULL,
  `R8P8TH` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `PlayerID` int(11) NOT NULL,
  `PlayerName` varchar(50) NOT NULL,
  `PlayerInitials` varchar(5) NOT NULL,
  `TeamID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players_games`
--

CREATE TABLE `players_games` (
  `GameID` int(6) NOT NULL,
  `PlayerID` int(2) NOT NULL,
  `TeamID` int(2) NOT NULL,
  `Initials` varchar(5) NOT NULL,
  `Round1` int(2) NOT NULL,
  `Round2` int(2) NOT NULL,
  `Round3` int(2) NOT NULL,
  `Round4` int(2) NOT NULL,
  `Round5` int(2) NOT NULL,
  `Round6` int(2) NOT NULL,
  `Round7` int(2) NOT NULL,
  `Round8` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `TeamID` int(5) NOT NULL,
  `Team name` varchar(25) NOT NULL,
  `Location` varchar(8) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`GameID`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`PlayerID`),
  ADD UNIQUE KEY `TeamID` (`TeamID`),
  ADD UNIQUE KEY `PlayerInitials` (`PlayerInitials`);

--
-- Indexes for table `players_games`
--
ALTER TABLE `players_games`
  ADD UNIQUE KEY `Initials` (`Initials`),
  ADD UNIQUE KEY `Initials_3` (`Initials`),
  ADD KEY `TeamID` (`TeamID`),
  ADD KEY `PlayerID` (`PlayerID`),
  ADD KEY `GameID` (`GameID`),
  ADD KEY `Initials_2` (`Initials`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`TeamID`),
  ADD UNIQUE KEY `Team name` (`Team name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `PlayerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `TeamID` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `teams` (`TeamID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `players_games`
--
ALTER TABLE `players_games`
  ADD CONSTRAINT `players_games_ibfk_1` FOREIGN KEY (`GameID`) REFERENCES `game` (`GameID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `players_games_ibfk_2` FOREIGN KEY (`PlayerID`) REFERENCES `players` (`PlayerID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `players_games_ibfk_3` FOREIGN KEY (`TeamID`) REFERENCES `teams` (`TeamID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `players_games_ibfk_4` FOREIGN KEY (`Initials`) REFERENCES `players` (`PlayerInitials`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
