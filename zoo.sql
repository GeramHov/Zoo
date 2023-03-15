-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2023 at 08:52 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
  `id` int NOT NULL,
  `specie_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `specie_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `size` int NOT NULL,
  `weight` int NOT NULL,
  `age` int NOT NULL,
  `enclosure_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sound` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `specie_type`, `specie_name`, `size`, `weight`, `age`, `enclosure_name`, `icon`, `sound`) VALUES
(12, 'reptile', 'alligator', 240, 110, 7, 'amphibians', 'alligator.png', 'alligator.mp3'),
(13, 'mammal', 'bear', 140, 500, 15, 'carnivorous', 'bear.png', 'bear.mp3'),
(14, 'fish', 'blowfish', 23, 2, 2, 'aquarium', 'blowfish.png', 'pufferfish-sound.mp3'),
(15, 'reptile', 'crocodile', 210, 85, 22, 'amphibians', 'crocodile.png', 'croc+alig.mp3'),
(16, 'mammal', 'dolphin', 350, 150, 10, 'aquarium', 'dolphin.png', 'dolphin.mp3'),
(17, 'bird', 'eagle', 80, 5, 21, 'birds', 'eagle.png', 'eagle.mp3'),
(18, 'mammal', 'elephant', 280, 3400, 38, 'savannah', 'elephant.png', 'elephant.mp3'),
(19, 'bird', 'falcon', 40, 2, 12, 'birds', 'falcon.png', 'falcone.mp3'),
(20, 'antelope', 'gazelle', 110, 18, 8, 'herbivorous', 'gazelle.png', 'gazelle.mp3'),
(21, 'mammal', 'giraffe', 430, 1900, 18, 'herbivorous', 'giraffe.png', 'giraffe.mp3'),
(22, 'mammal', 'hippopotamus', 350, 1750, 33, 'amphibians', 'hippopotamus.png', 'hippo.mp3'),
(23, 'mammal', 'hyena', 155, 74, 4, 'savannah', 'hyena.png', 'hyena-laugh.mp3'),
(24, 'feline', 'leopard', 65, 21, 11, 'felines', 'leopard.png', 'leopard.mp3'),
(25, 'feline', 'lion', 110, 160, 6, 'felines', 'lion.png', 'lion.mp3'),
(26, 'mammal', 'monkey', 140, 60, 22, 'savannah', 'monkey.png', 'monkey.mp3'),
(27, 'whale', 'orca', 700, 3800, 45, 'aquarium', 'orca.png', 'orca.mp3'),
(28, 'bird', 'ostrich', 250, 125, 15, 'savannah', 'ostrich.png', 'ostrich.mp3'),
(29, 'mammal', 'rhinoceros', 240, 2800, 17, 'herbivorous', 'rhinoceros.png', 'rhinoceros.mp3'),
(30, 'fish', 'shark', 160, 230, 4, 'aquarium', 'shark.png', 'shark.mp3'),
(31, 'feline', 'tiger', 105, 285, 4, 'felines', 'tiger.png', 'tiger.mp3'),
(32, 'reptile', 'turtle', 78, 33, 73, 'amphibians', 'turtle.png', 'turtle.mp3'),
(33, 'bird', 'vulture', 95, 2, 13, 'birds', 'vulture.png', 'vulture.mp3'),
(34, 'feline', 'wildcat', 40, 3, 9, 'savannah', 'wildcat.png', 'wildcat.mp3'),
(35, 'mammal', 'wolf', 75, 35, 15, 'carnivorous', 'wolf.png', 'wolf.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `enclosures`
--

CREATE TABLE `enclosures` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `tide_index` int NOT NULL DEFAULT '10',
  `a1_name` varchar(255) NOT NULL,
  `a2_name` varchar(255) NOT NULL,
  `a3_name` varchar(255) NOT NULL,
  `a4_name` varchar(255) NOT NULL,
  `a5_name` varchar(255) NOT NULL,
  `a6_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enclosures`
--

INSERT INTO `enclosures` (`id`, `name`, `tide_index`, `a1_name`, `a2_name`, `a3_name`, `a4_name`, `a5_name`, `a6_name`) VALUES
(1, 'carnivorous', 10, 'bear', 'wolf', 'wolf', 'wolf', 'bear', 'bear'),
(2, 'herbivorous', 10, 'gazelle', 'gazelle', 'giraffe', 'giraffe', 'rhinoceros', 'rhinoceros'),
(3, 'savannah', 10, 'elephant', 'elephant', 'hyena', 'monkey', 'monkey', 'wildcat'),
(4, 'felines', 10, 'leopard', 'leopard', 'lion', 'lion', 'tiger', 'tiger'),
(5, 'amphibians', 10, 'crocodile', 'crocodile', 'hippopotamus', 'hippopotamus', 'alligator', 'turtle'),
(6, 'birds', 10, 'eagle', 'eagle', 'falcon', 'falcon', 'vulture', 'vulture'),
(7, 'aquarium', 10, 'dolphin', 'dolphin', 'orca', 'orca', 'shark', 'blowfish');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `enclosures`
--
ALTER TABLE `enclosures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
