-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 11:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bnsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE `match` (
  `id` int(11) NOT NULL,
  `team_home` varchar(100) NOT NULL,
  `team_away` varchar(100) NOT NULL,
  `score_home` int(11) NOT NULL,
  `score_away` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`id`, `team_home`, `team_away`, `score_home`, `score_away`) VALUES
(685, 'TimA', 'TimB', 3, 0),
(686, 'TimB', 'TimC', 2, 1),
(687, 'TimC', 'TimD', 1, 0),
(688, 'TimD', 'TimA', 3, 4),
(689, 'TimE', 'TimB', 2, 2),
(690, 'TimA', 'TimC', 2, 3),
(691, 'TimB', 'TimD', 1, 0),
(692, 'TimE', 'TimA', 2, 0),
(693, 'TimC', 'TimE', 5, 1),
(694, 'TimD', 'TimE', 3, 3),
(700, 'TimC', 'TimB', 3, 1),
(701, 'TimC', 'TimE', 3, 2);

--
-- Triggers `match`
--
DELIMITER $$
CREATE TRIGGER `trigger_update` BEFORE INSERT ON `match` FOR EACH ROW BEGIN
    DECLARE team_homes INT;
    DECLARE team_aways INT;

    -- Hitung poin tim pertama
    SELECT point INTO team_homes
    FROM team
    WHERE name = NEW.team_home;

    -- Hitung poin tim kedua
    SELECT point INTO team_aways
    FROM team
    WHERE name = NEW.team_away;

    -- Tentukan pemenang dan perbarui poin
    IF NEW.score_home > NEW.score_away THEN
        UPDATE team
        SET point = team_homes + 3
        WHERE name = NEW.team_home;
    ELSEIF NEW.score_home < NEW.score_away THEN
        UPDATE team
        SET point = team_aways + 3
        WHERE name = NEW.team_away;
    ELSE
        UPDATE team
        SET point = team_homes + 1
        WHERE name = NEW.team_home;
        UPDATE team
        SET point = team_aways + 1
        WHERE name = NEW.team_away;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `point` int(11) NOT NULL,
  `gd` int(11) NOT NULL,
  `gf` int(11) NOT NULL,
  `ga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id_team`, `name`, `point`, `gd`, `gf`, `ga`) VALUES
(72, 'TimA', 9, 1, 9, 8),
(73, 'TimB', 7, -3, 6, 9),
(74, 'TimC', 12, 7, 13, 6),
(75, 'TimD', 1, -3, 6, 9),
(76, 'TimE', 5, 3, 8, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `match`
--
ALTER TABLE `match`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `match`
--
ALTER TABLE `match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=702;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
