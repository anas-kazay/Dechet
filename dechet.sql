-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 04:25 PM
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
-- Database: `dechet`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `id_vente` int(11) DEFAULT NULL,
  `prix` decimal(8,2) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `designation`, `id_vente`, `prix`, `quantite`) VALUES
(1, 'Halawa', 1, 122.30, 4),
(2, 'Halawa', 1, 122.30, 4),
(3, 'Halawa', 1, 122.30, 4),
(31, 'qwerty', 8, 111.00, 2),
(32, 'qwerty2', 8, 111.00, 3),
(33, 'chichawar', 5, 13.00, 1),
(35, 'hirochima', 21, 64.00, 2),
(38, 'kiwiaa', 22, 10.00, 3),
(39, 'oaaeii', 22, 44.00, 3),
(40, 'ooyiiiii', 22, 46.00, 3),
(42, 'hirochima', 3, 64.00, 2),
(43, 'ooop', 21, 213.00, 2),
(44, 'uuiiooo', 22, 99.00, 5),
(45, 'jajajartty', 22, 87.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `telephone`, `address`, `email`, `user_id`) VALUES
(1, 'anas kazay', '2093', 'asdasd', 'asdasfasge', 1),
(2, 'yassin', '2093', 'asdasd', 'asdasfasge@gmail.com', 1),
(3, 'anas', '2093', 'asdasd', 'asdasfasge', 1),
(4, 'anas kazay', '989', 'tikiouine', 'nounouskazay@gmail.com', 1),
(5, 'anas kazayio', '99909', 'tikiouine agadir morocco', 'nounouskazay@gmail.com', 1),
(10, 'Saamar', '90707897', 'drargad', 'saaraaafiin@gmail.com', 1),
(11, 'hal', '980', 'asfaisf', 'aklsf@gmail.com', 1),
(12, 'kafka', '9o8', 'asdoiasudiu', 'asd@kaw.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `quantite_in` int(11) DEFAULT NULL,
  `quantite_out` int(11) DEFAULT NULL,
  `device_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `date`, `quantite_in`, `quantite_out`, `device_id`) VALUES
(1, '2023-08-05', 10, 0, 1),
(2, '2023-08-05', 5, 2, 1),
(4, '2023-07-19', 0, 1, 1),
(5, '2023-08-19', 2, 97, 1),
(7, '2023-08-26', 87, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `serial` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `serial`, `user_id`) VALUES
(1, 'first', 'aoisjf9asf90a9sf', 1),
(2, 'second', 'asfasf434134', 1),
(6, 'anas kjk', 'nounouskazay@gmail.com', 1),
(9, 'ousso', 'jiasdw', 1),
(11, 'Sii', '9988123124', 1),
(12, 'oumaima', 'cgduuvyv.jfffg', NULL),
(13, 'oumaima', 'cvjufvjgu-jchg', NULL),
(14, 'anas kazay', 'asdasww', NULL),
(15, 'oumaima', 'jffuychjfhgdg', 1),
(16, 'yassin', 'gmaisl@yasin.com', 1),
(17, 'devie22', '923u01235', 1),
(18, 'devicce', 'sdfgsreg4', 1),
(19, 'yyu', 'yuuu', 1),
(20, 'yuui', 'igig', 1),
(21, 'frt33', 'sdfs', 1),
(23, 'ice no', 'kimou', 1),
(25, 'dd', '2fw46twstrg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `factures`
--

CREATE TABLE `factures` (
  `id` int(11) NOT NULL,
  `id_vente` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `factures`
--

INSERT INTO `factures` (`id`, `id_vente`, `date`, `total`) VALUES
(1, 1, '2023-09-05', 1467.60),
(22, 22, '2023-09-06', 1143.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `address`, `email`, `telephone`) VALUES
(1, 'harawkaan', 'admin', 'tikiouine', 'nounouskazay@gmail.com', '+212634768129');

-- --------------------------------------------------------

--
-- Table structure for table `ventes`
--

CREATE TABLE `ventes` (
  `id` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ventes`
--

INSERT INTO `ventes` (`id`, `id_client`, `total`, `date`) VALUES
(1, 1, 88.00, '2023-08-07 13:33:29'),
(3, 1, 98.00, '2023-08-07 13:33:29'),
(4, 2, 333.00, '2023-08-07 13:33:29'),
(5, 1, 0.00, '2023-08-08 09:49:39'),
(8, 1, 0.00, '2023-08-08 09:58:51'),
(15, 2, 0.00, '2023-08-09 08:38:06'),
(21, 1, 0.00, '2023-08-10 13:14:56'),
(22, 1, 0.00, '2023-08-10 13:19:35'),
(43, 3, 0.00, '2023-08-15 18:52:57'),
(44, 3, 0.00, '2023-08-15 18:53:02'),
(45, 3, 0.00, '2023-08-15 18:53:05'),
(47, 12, 0.00, '2023-08-15 18:56:05'),
(48, 10, 0.00, '2023-08-16 12:47:50'),
(49, 4, 0.00, '2023-08-16 12:51:03'),
(50, 5, 0.00, '2023-08-16 12:51:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vente` (`id_vente`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk2` (`user_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk1` (`user_id`);

--
-- Indexes for table `factures`
--
ALTER TABLE `factures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`name`);

--
-- Indexes for table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `factures`
--
ALTER TABLE `factures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_vente`) REFERENCES `ventes` (`id`);



  ALTER TABLE `factures`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_vente`) REFERENCES `ventes` (`id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`);

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ventes`
--
ALTER TABLE `ventes`
  ADD CONSTRAINT `ventes_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
