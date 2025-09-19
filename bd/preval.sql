-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2025 at 05:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preval`
--

-- --------------------------------------------------------

--
-- Table structure for table `coments`
--

CREATE TABLE `coments` (
  `idComent` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `coment` varchar(200) NOT NULL,
  `phone` int(10) NOT NULL,
  `date` date NOT NULL,
  `resolutionDetails` varchar(255) DEFAULT NULL,
  `state` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coments`
--

INSERT INTO `coments` (`idComent`, `name`, `email`, `coment`, `phone`, `date`, `resolutionDetails`, `state`) VALUES
(1, 'a', 'lubilluse@gmail.com', 's', 0, '2025-07-19', 'SE ATENDIO', 'R'),
(38, 'a', 'a@a.com', 's', 0, '2025-07-24', NULL, 'P'),
(39, 'a', 'asd@mail.com', 'asd', 998131777, '2025-08-02', NULL, 'P'),
(71, 'qwe', 'qwe@mail.com', 'qwe', 998131777, '2025-08-03', 'Envie un correo electronico al potencial cliente el dia tal', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `idEmployer` int(11) NOT NULL,
  `userNameEmployer` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rolId` int(11) NOT NULL,
  `state` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`idEmployer`, `userNameEmployer`, `name`, `password`, `rolId`, `state`) VALUES
(1, 'lUbillus', 'LUIS UBILLUS', '$2y$10$5YXS5uobbyBamr24xKHjfeshx30wZUySoNVZyGOc/8RLyPnu0PF1e', 1, 'A'),
(3, 'lValverde', 'LUIS VALVERDE', '$2y$10$eRnRl17TO.flcOtmHbJcEuTWYKfvIE7vuV6HegIK14cHcj.jX4lMC', 2, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `employerrol`
--

CREATE TABLE `employerrol` (
  `rolId` int(11) NOT NULL,
  `rolName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employerrol`
--

INSERT INTO `employerrol` (`rolId`, `rolName`) VALUES
(1, 'admin'),
(2, 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `quantity` double(7,2) NOT NULL,
  `material` varchar(50) NOT NULL,
  `productCost` double(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `quantity`, `material`, `productCost`) VALUES
(1, 'Tanque redondo', 3500.00, 'Fibra de vidrio', 7000.00),
(5, 'Tanque con filtrado', 500.00, 'Fibra de vidrio', 9999.00),
(6, 'Resevorio', 5000.00, 'Fibra de vidrio', 8500.00);

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `quotationId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `structureType` varchar(50) NOT NULL,
  `structureCost` decimal(10,0) NOT NULL,
  `distance` decimal(10,0) NOT NULL,
  `distanceCost` decimal(10,0) NOT NULL,
  `idEmployer` int(11) DEFAULT NULL,
  `total` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`quotationId`, `productId`, `structureType`, `structureCost`, `distance`, `distanceCost`, `idEmployer`, `total`) VALUES
(1, 6, 'Acero inoxidable', 1, 200, 1, 1, 8502.00),
(2, 6, 's', 1, 2, 3, 1, 8504.00),
(3, 6, 'Metal Quirurgico', 1200, 360, 200, 1, 9900.00),
(4, 6, '1', 2, 3, 4, 1, 8506.00),
(5, 6, 'Metal', 850, 85, 200, 1, 9550.00),
(6, 6, '1', 2, 3, 4, 1, 8506.00),
(7, 6, 'Metal', 850, 85, 200, 1, 9550.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`idComent`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`idEmployer`),
  ADD UNIQUE KEY `userNameEmployer` (`userNameEmployer`),
  ADD KEY `rolId` (`rolId`);

--
-- Indexes for table `employerrol`
--
ALTER TABLE `employerrol`
  ADD PRIMARY KEY (`rolId`),
  ADD UNIQUE KEY `rolName` (`rolName`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`quotationId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `idEmployer` (`idEmployer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coments`
--
ALTER TABLE `coments`
  MODIFY `idComent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `idEmployer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employerrol`
--
ALTER TABLE `employerrol`
  MODIFY `rolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `quotationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `employer_ibfk_1` FOREIGN KEY (`rolId`) REFERENCES `employerrol` (`rolId`);

--
-- Constraints for table `quotation`
--
ALTER TABLE `quotation`
  ADD CONSTRAINT `quotation_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`),
  ADD CONSTRAINT `quotation_ibfk_2` FOREIGN KEY (`idEmployer`) REFERENCES `employer` (`idEmployer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
