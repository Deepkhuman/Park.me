-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 09:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle-parking-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Security_Code` int(55) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Security_Code`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'deep', 'deep', 123456789, 1101, 'deep12@gmail.com', '123', '2022-09-27 05:11:35'),
(2, 'viv', 'viv', 1234567898, 1102, 'viv@gmail.com', '123', '2022-09-27 05:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `c_id` int(11) NOT NULL,
  `c_uname` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_pass` varchar(100) NOT NULL,
  `c_mobile` int(12) NOT NULL,
  `c_review` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`c_id`, `c_uname`, `c_email`, `c_pass`, `c_mobile`, `c_review`) VALUES
(1, 'mahipat', 'mahipat@gmail.com', '123', 2147483647, NULL),
(2, 'sagar', 'sagar@gmail.com', '456', 2147483647, NULL),
(3, 'jeet', 'jeet@gmail.com', '789', 2147483647, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`) VALUES
(2, 'veek', 'viv@gmail.com', 'about service', 'very easy user interface');

-- --------------------------------------------------------

--
-- Table structure for table `c_review`
--

CREATE TABLE `c_review` (
  `c_id` int(255) NOT NULL,
  `c_uname` varchar(255) DEFAULT NULL,
  `c_gmail` varchar(255) NOT NULL,
  `c_rev` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_review`
--

INSERT INTO `c_review` (`c_id`, `c_uname`, `c_gmail`, `c_rev`) VALUES
(1, 'mahipat', 'mahipat@gmail.com', 'Nice Services!'),
(2, 'sagar', 'sagar@gmail.com', 'Very Nice'),
(3, 'jeet', 'jeet@gmail.com', 'Excellent');

-- --------------------------------------------------------

--
-- Table structure for table `opt`
--

CREATE TABLE `opt` (
  `o_id` int(255) NOT NULL,
  `o_name` varchar(255) NOT NULL,
  `o_mobile` varchar(12) NOT NULL,
  `o_email` varchar(100) NOT NULL,
  `o_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opt`
--

INSERT INTO `opt` (`o_id`, `o_name`, `o_mobile`, `o_email`, `o_pass`) VALUES
(3, 'pritam', '6515651211', 'pritam@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `parea`
--

CREATE TABLE `parea` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parea`
--

INSERT INTO `parea` (`a_id`, `a_name`, `a_limit`) VALUES
(1, 'Lathi Road', 10),
(2, 'Keriya Road', 4),
(3, 'Rajakamal Chowk', 6),
(4, 'Market Yard', 8);

-- --------------------------------------------------------

--
-- Table structure for table `vcategory`
--

CREATE TABLE `vcategory` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `shortDescription` varchar(50) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vcategory`
--

INSERT INTO `vcategory` (`ID`, `VehicleCat`, `shortDescription`, `CreationDate`) VALUES
(2, 'Two Wheeler', 'Demo 2W', '2019-07-05 11:07:09'),
(6, 'Three Wheeler', 'MTCL 2W', '2021-03-07 16:41:57'),
(8, 'Four Wheeler', 'Four Wheel', '2022-08-27 04:02:40'),
(10, 'Ten Wheeler', 'Truck or Bus', '2022-09-19 02:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `ID` int(10) NOT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `VehicleCompanyname` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `a_id` int(11) NOT NULL,
  `OutTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ParkingCharge` varchar(120) DEFAULT NULL,
  `Remark` mediumtext DEFAULT NULL,
  `Status` varchar(5) DEFAULT NULL,
  `ticket` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `intime` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`ID`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `a_id`, `OutTime`, `ParkingCharge`, `Remark`, `Status`, `ticket`, `email`, `intime`, `date`) VALUES
(1, '85515', 'Two Wheeler', 'hero honda', 'gj-5-hk-9152', 'virani mahipat jagdishbhai', 8758291346, 1, NULL, NULL, NULL, NULL, '81769', 'mahipat@gmail.com', '22:16', '2022-10-13'),
(2, '46820', 'Two Wheeler', 'Royal Enfield', 'MOL-456', 'Sagar Kanani', 2147483647, 3, NULL, NULL, NULL, NULL, '95361', 'sagar@gmail.com', '22:21', '2022-10-06'),
(3, '78485', 'Four Wheeler', 'Maruti Suzuki', 'GJ-14-va-5727', 'Jeet Atulbhai Patel', 8200383227, 2, NULL, NULL, NULL, NULL, '81513', '', '05:15', '2022-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `vout`
--

CREATE TABLE `vout` (
  `id` int(255) NOT NULL,
  `v_rn` varchar(250) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `cat` varchar(250) NOT NULL,
  `p_number` varchar(250) NOT NULL,
  `v_in_time` varchar(250) NOT NULL,
  `outtime` varchar(250) NOT NULL,
  `owner` varchar(250) NOT NULL,
  `owner_contact` varchar(250) NOT NULL,
  `charge` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `remark` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_review`
--
ALTER TABLE `c_review`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `opt`
--
ALTER TABLE `opt`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `parea`
--
ALTER TABLE `parea`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `vcategory`
--
ALTER TABLE `vcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vout`
--
ALTER TABLE `vout`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `c_review`
--
ALTER TABLE `c_review`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opt`
--
ALTER TABLE `opt`
  MODIFY `o_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parea`
--
ALTER TABLE `parea`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vcategory`
--
ALTER TABLE `vcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vout`
--
ALTER TABLE `vout`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
