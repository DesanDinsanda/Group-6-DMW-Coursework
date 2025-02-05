-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Feb 05, 2025 at 06:02 PM
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
-- Database: `eventmanagementdmw`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `firstName`, `lastName`, `email`, `mobile`, `password`) VALUES
(1, 'Hasindu', 'Eshan', 'hasindu@gmail.com', '0783555673', 'Hasindu123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstName`, `lastName`, `email`, `number`, `password`, `confirmPassword`) VALUES
(1, 'Desan', 'Dinsanda', 'desandinsanda@gmail.com', '0781463975', 'Desan123', 'Desan123'),
(2, 'Denura', 'Minulaka', 'denura.minulaka@gmail.com', '0787979981', 'Denura123', 'Denura123'),
(3, 'Senan', 'Thenuka', 'senanthenuka@gmail.com', '0772567822', 'SenanT', 'SenanT'),
(10, 'Dinistha', 'Ransilu', 'ransilu@gmail.com', '0783566783', 'Ransilu123', 'Ransilu123'),
(11, 'Hiruna', 'Dilmith', 'hiruna@gmail.com', '0782266486', 'Hiruna123', 'Hiruna123'),
(19, 'Kasun111', 'Kalhara', 'kasun@gmail.com', '06745667', 'Kasun123', 'Kasun123');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`) VALUES
(14, 'Event Planning & Full day coordination'),
(15, 'Bridal dressing package'),
(16, 'Any type of groom’s dresses'),
(17, 'Traditional Dancing or Dhol Drummers'),
(18, 'Complete flower decorations'),
(19, 'Wedding cakes'),
(20, 'Wedding cake structure'),
(21, 'Champaign fountain with bottle'),
(22, 'Complete Photography package'),
(23, 'Complete DJ Package'),
(24, 'Wedding car with Decoration'),
(25, 'Projector with screen'),
(26, 'Invitations with envelopes'),
(27, 'Complete floral decorations'),
(28, 'Poruwa ceremony with goods'),
(29, 'Shashrika table or Cake structure'),
(30, 'Milk fount. or Champaign fountain (with bottle)'),
(31, 'Wedding car with decorations'),
(32, 'Basic balloon decor'),
(33, 'Simple backdrop'),
(34, '1 kg birthday cake'),
(35, 'Disposable tableware'),
(36, 'Music system'),
(37, 'Gift bags for 10 guests'),
(38, 'Themed balloon arch & backdrop'),
(39, '2 kg custom cake'),
(40, 'Party favors for 20 guests'),
(41, 'Photographer (3 hours)'),
(42, 'DJ or live music'),
(43, 'Venue lighting'),
(44, 'Snacks & drinks for 20 guests'),
(45, 'Themed centerpieces'),
(46, 'Grand balloon wall & luxury backdrop'),
(47, 'Multi-tier designer cake (3+ kg)'),
(48, 'Personalized gift boxes (50 guests)'),
(49, 'Photographer & videographer'),
(50, 'Live DJ or performers'),
(51, 'Dessert & buffet meal'),
(52, 'LED wall displays'),
(53, 'Red carpet entrance'),
(54, 'Fireworks/sparklers'),
(55, 'Luxury seating'),
(56, 'Event coordinator'),
(57, 'Full lighting setup');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `orderDate` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `eventDate` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(50) NOT NULL,
  `packageID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderDate`, `status`, `eventDate`, `time`, `location`, `packageID`, `customerID`) VALUES
(29, '2025-02-04', 'accepted', '2025-02-20', '10:03:00', 'Colombo', 11, 1),
(30, '2025-02-04', 'rejected', '2025-02-26', '15:04:00', 'Kandy', 14, 2),
(31, '2025-02-04', 'accepted', '2025-02-18', '16:42:00', 'Kandy', 11, 19),
(32, '2025-02-04', 'accepted', '2025-02-13', '16:02:00', 'Matara', 12, 19);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `packageID` int(11) NOT NULL,
  `eventType` varchar(30) NOT NULL,
  `packageName` varchar(30) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`packageID`, `eventType`, `packageName`, `price`) VALUES
(11, 'Wedding', 'Silver Package', 550000),
(12, 'Wedding', 'Gold Packages', 599000),
(13, 'Birthday', 'Silver Package', 35000),
(14, 'Birthday', 'Gold Package', 50000),
(15, 'Birthday', 'Elite Package', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `package_item`
--

CREATE TABLE `package_item` (
  `packageID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_item`
--

INSERT INTO `package_item` (`packageID`, `itemID`) VALUES
(11, 14),
(11, 15),
(11, 16),
(11, 17),
(11, 18),
(11, 19),
(11, 20),
(11, 21),
(11, 22),
(11, 23),
(11, 24),
(11, 25),
(13, 32),
(13, 33),
(13, 34),
(13, 35),
(13, 36),
(13, 37),
(14, 38),
(14, 39),
(14, 40),
(14, 41),
(14, 42),
(14, 43),
(14, 44),
(14, 45),
(15, 46),
(15, 47),
(15, 48),
(15, 49),
(15, 50),
(15, 51),
(15, 52),
(15, 53),
(15, 54),
(15, 55),
(15, 56),
(15, 57),
(12, 14),
(12, 26),
(12, 27),
(12, 15),
(12, 16),
(12, 28),
(12, 29),
(12, 30),
(12, 22),
(12, 19),
(12, 23),
(12, 31),
(12, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `packageID` (`packageID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`packageID`);

--
-- Indexes for table `package_item`
--
ALTER TABLE `package_item`
  ADD KEY `itemID` (`itemID`),
  ADD KEY `packageID` (`packageID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `packageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);

--
-- Constraints for table `package_item`
--
ALTER TABLE `package_item`
  ADD CONSTRAINT `package_item_ibfk_1` FOREIGN KEY (`packageID`) REFERENCES `package` (`packageID`),
  ADD CONSTRAINT `package_item_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
