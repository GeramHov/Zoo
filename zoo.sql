-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 21, 2023 at 10:48 AM
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
  `size` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `enclosure_id` int(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `sound` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `specie_type`, `specie_name`, `size`, `weight`, `age`, `enclosure_id`, `icon`, `sound`) VALUES
(12, 'reptile', 'alligator', 240, 110, 7, 5, 'alligator.png', 'alligator.mp3'),
(13, 'mammal', 'bear', 140, 500, 15, 1, 'bear.png', 'bear.mp3'),
(14, 'fish', 'blowfish', 23, 2, 2, 7, 'blowfish.png', 'pufferfish-sound.mp3'),
(15, 'reptile', 'crocodile', 210, 85, 22, 5, 'crocodile.png', 'croc+alig.mp3'),
(16, 'mammal', 'dolphin', 350, 150, 10, 7, 'dolphin.png', 'dolphin.mp3'),
(17, 'bird', 'eagle', 80, 5, 21, 6, 'eagle.png', 'eagle.mp3'),
(18, 'mammal', 'elephant', 280, 3400, 38, 3, 'elephant.png', 'elephant.mp3'),
(19, 'bird', 'falcon', 40, 2, 12, 6, 'falcon.png', 'falcone.mp3'),
(20, 'antelope', 'gazelle', 110, 18, 8, 2, 'gazelle.png', 'gazelle.mp3'),
(21, 'mammal', 'giraffe', 430, 1900, 18, 2, 'giraffe.png', 'giraffe.mp3'),
(22, 'mammal', 'hippopotamus', 350, 1750, 33, 5, 'hippopotamus.png', 'hippo.mp3'),
(23, 'mammal', 'hyena', 155, 74, 4, 3, 'hyena.png', 'hyena-laugh.mp3'),
(24, 'feline', 'leopard', 65, 21, 11, 4, 'leopard.png', 'leopard.mp3'),
(25, 'feline', 'lion', 110, 160, 6, 4, 'lion.png', 'lion.mp3'),
(26, 'mammal', 'monkey', 140, 60, 22, 3, 'monkey.png', 'monkey.mp3'),
(27, 'whale', 'orca', 700, 3800, 45, 7, 'orca.png', 'orca.mp3'),
(28, 'bird', 'ostrich', 250, 125, 15, 3, 'ostrich.png', 'ostrich.mp3'),
(29, 'mammal', 'rhinoceros', 240, 2800, 17, 2, 'rhinoceros.png', 'rhinoceros.mp3'),
(30, 'fish', 'shark', 160, 230, 4, 7, 'shark.png', 'shark.mp3'),
(31, 'feline', 'tiger', 105, 285, 4, 4, 'tiger.png', 'tiger.mp3'),
(32, 'reptile', 'turtle', 78, 33, 73, 5, 'turtle.png', 'turtle.mp3'),
(33, 'bird', 'vulture', 95, 2, 13, 6, 'vulture.png', 'vulture.mp3'),
(34, 'feline', 'wildcat', 40, 3, 9, 3, 'wildcat.png', 'wildcat.mp3'),
(35, 'mammal', 'wolf', 75, 35, 15, 1, 'wolf.png', 'wolf.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `enclosures`
--

CREATE TABLE `enclosures` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tide_index` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enclosures`
--

INSERT INTO `enclosures` (`id`, `name`, `tide_index`) VALUES
(1, 'carnivorous', 10),
(2, 'herbivorous', 10),
(3, 'savannah', 10),
(4, 'felines', 10),
(5, 'amphibians', 10),
(6, 'birds', 10),
(7, 'aquarium', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enclosures`
--
ALTER TABLE `enclosures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `enclosures`
--
ALTER TABLE `enclosures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
