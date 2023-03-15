-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 15, 2023 at 09:46 AM
-- Server version: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004-log
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `specie_type` varchar(255) NOT NULL,
  `specie_name` varchar(255) NOT NULL,
  `size` int(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `age` int(255) NOT NULL,
  `enclosure_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `sound` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `specie_type`, `specie_name`, `size`, `weight`, `age`, `enclosure_name`, `icon`, `sound`) VALUES
(12, 'reptile', 'alligator', 240, 110, 7, 'amphibians', 'aligator.png', 'alligator.mp3'),
(13, 'mammal', 'bear', 140, 500, 15, 'carnivorous', 'bear.png', 'bear.mp3'),
(14, 'fish', 'blowfish', 23, 2, 2, 'aquarium', 'blowfish.png', 'pufferfish-sound.mp3'),
(15, 'reptile', 'crocodile', 210, 85, 22, 'amphibians', 'crocodile.png', 'croc+alig.mp3'),
(16, 'mammal', 'dolphin', 350, 150, 10, 'aquarium', 'dolphin.png', 'dolphin.mp3'),
(17, 'bird', 'eagle', 80, 5, 21, 'birds', 'eagle.png', 'eagle.mp3'),
(18, 'mammal', 'elephant', 280, 3400, 38, 'savannah', 'elephant.png', 'elephant.mp3'),
(19, 'bird', 'falcon', 40, 2, 12, 'birds', 'falcone.png', 'falcone.mp3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
