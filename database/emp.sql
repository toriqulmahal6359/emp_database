-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2021 at 09:13 AM
-- Server version: 8.0.23
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emp`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_name`, `city`) VALUES
('ACI Ltd', 'Dhaka'),
('Dutch Bangla Bank', 'Chittagong'),
('One Bank', 'Dhaka'),
('Pubali Bank Ltd', 'Dhaka'),
('Trust Bank', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_name` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_name`, `street`, `city`) VALUES
('Afzal', 'Wari', 'Dhaka'),
('Ashraf', 'Mirpur-1', 'Dhaka'),
('Faisal', 'Farmgate', 'Dhaka'),
('Jaman', 'Hazaribagh', 'Chittagong'),
('Jamil', 'Kazipara', 'Dhaka'),
('Karim', 'Mirpur-10', 'Dhaka'),
('Nurul', 'Agargaon', 'Dhaka'),
('Rahat', 'Banani', 'Dhaka'),
('Rahim', 'Dhanmondi-27', 'Dhaka'),
('Raihan', 'Taltola', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `manages`
--

CREATE TABLE `manages` (
  `employee_name` varchar(100) NOT NULL,
  `manager_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `manages`
--

INSERT INTO `manages` (`employee_name`, `manager_name`) VALUES
('Afzal', 'Md. Ashraful Haque'),
('Ashraf', 'Md. Nurul Hossain'),
('Faisal', 'Md. Hasan Shikder'),
('Jaman', 'Md. Ishtiak Reza'),
('Jamil', 'Md. Rokonuzzaman Khan'),
('Karim', 'Md. Khondokar Ibrahim Ahmed'),
('Nurul', 'Md. Ismail Sheikh'),
('Rahat', 'Md. Faisal Mirza'),
('Rahim', 'Md. Rokonuzzaman Khan'),
('Raihan', 'Md. Mushtak Ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `employee_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`employee_name`, `company_name`, `salary`) VALUES
('Afzal', 'Trust Bank', 20000),
('Ashraf', 'Pubali Bank Ltd', 18000),
('Faisal', 'ACI Ltd', 15000),
('Jaman', 'Dutch Bangla Bank', 50000),
('Jamil', 'Pubali Bank Ltd', 25000),
('Karim', 'One Bank', 20000),
('Nurul', 'Trust Bank', 22000),
('Rahat', 'Trust Bank', 12000),
('Rahim', 'Pubali Bank Ltd', 30000),
('Raihan', 'ACI Ltd', 30000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_name`);

--
-- Indexes for table `manages`
--
ALTER TABLE `manages`
  ADD PRIMARY KEY (`employee_name`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`employee_name`,`company_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
