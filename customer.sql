-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 07, 2023 at 01:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `onlineorder`
--

CREATE TABLE `onlineorder` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL,
  `sublocation` varchar(40) DEFAULT NULL,
  `food` varchar(100) DEFAULT 'None',
  `drink` varchar(100) DEFAULT 'None',
  `total` int(10) DEFAULT 0,
  `location_description` varchar(200) DEFAULT NULL,
  `time_of_order` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `onlineorder`
--

INSERT INTO `onlineorder` (`order_id`, `customer_name`, `phone_number`, `email`, `location`, `sublocation`, `food`, `drink`, `total`, `location_description`, `time_of_order`) VALUES
(1, 'Ashraf Hassan', '0712345234', 'ashrafanil434@gmail.com', 'Moons', 'TicTac', '  Biriani(1)', ' Pepsi(1)', 330, 'Near tictac opposite to Alwahda fruit palour brown building', '2023-04-01 23:33:51'),
(2, 'Abdulbasit waruru', '0101234560', 'abdiwaruru232@gmail.com', 'Kisauni', 'mtopanga', ' Chapati(7) Beans(2)', ' MountainDew(2) Mangojuice(2)', 650, 'near old posta in mtopanga', '2023-04-01 23:36:12'),
(3, 'Mohammed abdi', '0735933885', 'moha@gmail.com', 'Nyali', 'Kongowea', '  Pilau(2)', ' Pepsi(2)', 400, 'near kongowea market', '2023-04-01 23:51:31'),
(4, 'Ron Mokwozi', '0101234560', 'ronZoro@gmail.com', 'Ganjoni', 'Magarini', '  Pilau(1)', ' Milkshake(1)', 220, 'Opposite Ganjoni Primary', '2023-04-05 01:00:22'),
(5, 'Abdulbasit waruru', '0735933885', 'abdiwaruru232@gmail.com', 'Majengo', 'Kingorani', '  Pilau(1)', ' Pepsi(2)', 280, 'Near kwa ma radio building named Al-shafaa', '2023-04-05 10:21:09'),
(6, 'wwww', '0721111111', 'someone@mail', 'Mombasa', 'majengo', ' Chapati(1) Beans(1)', '', 90, 'majengo kwa mskiti', '2023-04-05 11:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`username`, `password`) VALUES
('ashrafanil002', 'ash2002'),
('aliwahid234', 'diin222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `onlineorder`
--
ALTER TABLE `onlineorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `onlineorder`
--
ALTER TABLE `onlineorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
