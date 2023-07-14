-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 11:06 AM
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
-- Database: `pokemart`
--

-- --------------------------------------------------------

--
-- Table structure for table `pokeitems`
--

CREATE TABLE `pokeitems` (
  `item_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pokeitems`
--

INSERT INTO `pokeitems` (`item_id`, `name`, `price`, `img`) VALUES
(1, '20 Poké Balls', 100, 'img/items/itm_pkball.webp'),
(2, '100 Poké Balls', 460, 'img/items/itm_pkball.webp'),
(3, '200 Poké Balls', 800, 'img/items/itm_pkball.webp'),
(4, 'Incense', 80, 'img/items/itm_incense.webp'),
(5, '8 Incense', 500, 'img/items/itm_incense.webp'),
(6, '25 Incense', 1250, 'img/items/itm_incense.webp'),
(7, 'Lucky Egg', 80, 'img/items/itm_luckyegg.webp'),
(8, '8 Lucky Eggs', 500, 'img/items/itm_luckyegg.webp'),
(9, '25 Lucky Eggs', 1250, 'img/items/itm_luckyegg.webp'),
(10, 'Lure Module', 100, 'img/items/itm_lure.webp'),
(11, '8 Lure Module', 680, 'img/items/itm_lure.webp'),
(12, 'Glacial Lure Module', 180, 'img/items/itm_glaciallure.webp'),
(13, 'Mossy Lure Module', 180, 'img/items/itm_mossylure.webp'),
(14, 'Magnetic Lure Module', 180, 'img/items/itm_maglure.webp'),
(15, 'Rainy Lure Module', 180, 'img/items/itm_rainlure.webp'),
(16, 'Egg Incubator', 150, 'img/items/itm_incubator.webp'),
(17, 'Super Incubator', 200, 'img/items/itm_superincubator.webp'),
(18, 'Premium Battle Pass', 100, 'img/items/itm_prmbattle.webp'),
(19, '3 Premium Battle Passes', 250, 'img/items/itm_prmbattle.webp'),
(20, 'Remote Raid Pass', 100, 'img/items/itm_remoteraid.webp'),
(21, '3 Remote Raid Passes', 525, 'img/items/itm_remoteraid.webp'),
(22, 'Rocket Radar', 200, 'img/items/itm_rocketradar.webp'),
(23, 'Poffin', 100, 'img/items/itm_poffin.webp'),
(24, 'Star Piece', 100, 'img/items/itm_star.webp'),
(25, '8 Star Pieces', 640, 'img/items/itm_star.webp'),
(26, '10 Max Potions', 200, 'img/items/itm_maxpt.webp'),
(27, '6 Max Revives', 180, 'img/items/itm_maxrv.webp');

-- --------------------------------------------------------

--
-- Table structure for table `pokeorder`
--

CREATE TABLE `pokeorder` (
  `order_id` int(11) NOT NULL,
  `items` varchar(250) NOT NULL,
  `total` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pokeorder`
--

INSERT INTO `pokeorder` (`order_id`, `items`, `total`, `email`, `order_date`) VALUES
(28, '25 Lucky Eggs<br>Lure Module', 1350, 'pokepoke26@pokemail.com', '0000-00-00'),
(29, '20 Poké Balls<br>25 Incense', 1350, 'pokepoke26@pokemail.com', '0000-00-00'),
(30, 'Incense<br>25 Lucky Eggs', 1330, 'pokepoke26@pokemail.com', '0000-00-00'),
(44, '100 Poké Balls<br>200 Poké Balls<br>Lure Module<br>25 Lucky Eggs<br>8 Lucky Eggs', 3110, 'testing@pokemail.com', '2023-07-14'),
(45, 'Incense<br>8 Incense<br>25 Incense', 1830, 'testing@pokemail.com', '2023-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `pokeusers`
--

CREATE TABLE `pokeusers` (
  `id` int(11) NOT NULL,
  `player_id` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pokeusers`
--

INSERT INTO `pokeusers` (`id`, `player_id`, `email`, `pass`) VALUES
(9, '--', 'alpha@pokemail.com', '12345'),
(10, '1111-2222-3333', 'testing@pokemail.com', '1234'),
(11, '3123-4325-2432', 'pokepoke26@pokemail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokeitems`
--
ALTER TABLE `pokeitems`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `pokeorder`
--
ALTER TABLE `pokeorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pokeusers`
--
ALTER TABLE `pokeusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokeitems`
--
ALTER TABLE `pokeitems`
  MODIFY `item_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pokeorder`
--
ALTER TABLE `pokeorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pokeusers`
--
ALTER TABLE `pokeusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
