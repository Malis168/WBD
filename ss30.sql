-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 12:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ss30`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE `tbl_property` (
  `property_id` int(10) UNSIGNED NOT NULL,
  `property_name` varchar(255) DEFAULT NULL,
  `property_price` decimal(10,2) DEFAULT NULL,
  `property_desc` varchar(255) DEFAULT NULL,
  `property_img` varchar(255) DEFAULT NULL,
  `property_type_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`property_id`, `property_name`, `property_price`, `property_desc`, `property_img`, `property_type_id`) VALUES
(1, 'ផ្ទះអាជីវកម្ម', '70000.00', 'shop house', NULL, 1),
(2, 'វីឡា', '100000.00', 'Villa', NULL, 1),
(3, 'ផ្ទះល្វែង', '60000.00', 'flat house', NULL, 1),
(4, 'ខុនដូជាន់ទី១', '30000.00', 'unit 1', NULL, 2),
(5, 'ខុនដូជាន់ទី២', '450000.00', 'unit 2', NULL, 2),
(6, 'ដីសម្រាប់លក់', '25000.00', 'Land', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property_type`
--

CREATE TABLE `tbl_property_type` (
  `property_type_id` int(10) UNSIGNED NOT NULL,
  `property_type_name_en` varchar(255) DEFAULT NULL,
  `property_type_name_kh` varchar(255) DEFAULT NULL,
  `property_type_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_property_type`
--

INSERT INTO `tbl_property_type` (`property_type_id`, `property_type_name_en`, `property_type_name_kh`, `property_type_desc`) VALUES
(1, 'House1', 'ផ្ទះ', 'ប្រភេទផ្ទះ'),
(2, 'Condo', 'ខុនដូ', 'ប្រភេទខុនដូ'),
(3, 'Apartment ', 'Apartment ', 'ប្រភេទApartment '),
(4, 'Land', 'ដី', 'ប្រភេទដី'),
(5, 'house_type', 'ប្រភេទផ្ទះ', 'description about type'),
(6, 'House Type 1', 'ប្រភេទផ្ទះទី1', 'Testing'),
(12, 'House Type 2', 'ប្រភេទផ្ទះទី2', 'Testing'),
(13, 'House Type 2', 'ប្រភេទផ្ទះទី2', 'Testing'),
(14, 'House Type 2', 'ប្រភេទផ្ទះទី2', 'Testing'),
(15, 'House Type 2', 'ប្រភេទផ្ទះទី2', 'Testing'),
(16, 'House Type 2', 'ប្រភេទផ្ទះទី2', 'Testing'),
(17, 'House Type 2', 'ប្រភេទផ្ទះទី2', 'Testing'),
(18, 'House Type 2', 'ប្រភេទផ្ទះទី2', 'Testing'),
(19, 'House Type 2', 'ប្រភេទផ្ទះទី2', 'Testing'),
(20, 'House Type 2', 'ប្រភេទផ្ទះទី2', 'Testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `property_type_id` (`property_type_id`) USING BTREE;

--
-- Indexes for table `tbl_property_type`
--
ALTER TABLE `tbl_property_type`
  ADD PRIMARY KEY (`property_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `property_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_property_type`
--
ALTER TABLE `tbl_property_type`
  MODIFY `property_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD CONSTRAINT `tbl_property_ibfk_1` FOREIGN KEY (`property_type_id`) REFERENCES `tbl_property_type` (`property_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
