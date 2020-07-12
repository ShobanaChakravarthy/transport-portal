-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 08:04 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cab`
--

CREATE TABLE `cab` (
  `cab_number` varchar(12) NOT NULL,
  `cab_seater` int(2) NOT NULL,
  `cab_driver_name` varchar(50) NOT NULL,
  `cab_driver_no` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cab`
--

INSERT INTO `cab` (`cab_number`, `cab_seater`, `cab_driver_name`, `cab_driver_no`) VALUES
('cab1', 4, 'driver_shobi', 9566140919),
('cab2', 4, 'driver_aravind', 9856412345),
('cab3', 4, 'driver_sreenu', 9123456789),
('cab4', 4, 'driver_aswin', 9966552413),
('cab5', 4, 'driver_revathi', 8932903230),
('cab6', 4, 'driver_athirai', 9876543210);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `account` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone_number` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `account`, `location`, `phone_number`) VALUES
(607508, 'Deepa', 'Capita', 'Mylapore', 9876543210),
(618983, 'Gowtham', 'RLG', 'Anna nagar', 8765432109),
(619472, 'Aravind', 'Tesco', 'Nanganallur', 7654321098),
(635988, 'Vishnu', 'Capita', 'Medavakkam', 6543210987),
(650267, 'Aswinsankar', 'Tesco', 'Madipakkam', 5432109876),
(650277, 'Revathi', 'RLG', 'Chrompet', 4321098765),
(655407, 'Sreenu', 'FCA', 'Pallavaram', 3210987654),
(657384, 'Tamil', 'RLG', 'Avadi', 2109876543),
(662148, 'Gokulnath', 'Tesco', 'Triplicane', 1098765432),
(663648, 'Ghoushika', 'Tesco', 'Medavakkam', 9876543211),
(664494, 'Meena', 'FCA', 'Sholinganallur', 1234567891),
(664495, 'Vaishali', 'Capita', 'Vadapalani', 1234567890),
(666304, 'Moorthy', 'Tesco', 'Sholinganallur', 2345678901),
(666473, 'Puneet', 'Tesco', 'Madipakkam', 3456789012),
(677089, 'Resnick', 'Capita', 'Thiruvanmyur', 4567890123),
(681472, 'Shobana', 'Tesco', 'Perumbakkam', 5678901234),
(683017, 'Janusha', 'Tesco', 'Koyambedu', 6789012345),
(683027, 'Poornima', 'FCA', 'Perumbakkam', 7890123456),
(685240, 'Shubank', 'Capita', 'Vadapalani', 9010234567),
(685500, 'Athirai', 'RLG', 'Padur', 9012345678);

-- --------------------------------------------------------

--
-- Table structure for table `rota`
--

CREATE TABLE `rota` (
  `rota_date` date NOT NULL,
  `rota_employee_id` int(11) NOT NULL,
  `rota_cab_number` varchar(12) NOT NULL DEFAULT 'Not Assigned',
  `rota_generated` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rota`
--

INSERT INTO `rota` (`rota_date`, `rota_employee_id`, `rota_cab_number`, `rota_generated`) VALUES
('2018-07-10', 607508, 'Not Assigned', 'N'),
('2018-07-10', 618983, 'Not Assigned', 'N'),
('2018-07-10', 619472, 'Not Assigned', 'N'),
('2018-07-10', 635988, 'Not Assigned', 'N'),
('2018-07-10', 650267, 'Not Assigned', 'N'),
('2018-07-10', 650277, 'Not Assigned', 'N'),
('2018-07-10', 655407, 'Not Assigned', 'N'),
('2018-07-10', 657384, 'Not Assigned', 'N'),
('2018-07-10', 662148, 'Not Assigned', 'N'),
('2018-07-10', 663648, 'Not Assigned', 'N'),
('2018-07-10', 664494, 'Not Assigned', 'N'),
('2018-07-10', 664495, 'Not Assigned', 'N'),
('2018-07-10', 666304, 'Not Assigned', 'N'),
('2018-07-10', 666473, 'Not Assigned', 'N'),
('2018-07-10', 677089, 'Not Assigned', 'N'),
('2018-07-10', 681472, 'Not Assigned', 'N'),
('2018-07-10', 683017, 'Not Assigned', 'N'),
('2018-07-10', 683027, 'Not Assigned', 'N'),
('2018-07-10', 685240, 'Not Assigned', 'N'),
('2018-07-10', 685500, 'Not Assigned', 'N'),
('2018-07-11', 607508, 'cab1', 'Y'),
('2018-07-11', 618983, 'cab1', 'Y'),
('2018-07-11', 619472, 'cab2', 'Y'),
('2018-07-11', 635988, 'cab4', 'Y'),
('2018-07-11', 650267, 'cab3', 'Y'),
('2018-07-11', 650277, 'cab3', 'Y'),
('2018-07-11', 655407, 'cab3', 'Y'),
('2018-07-11', 657384, 'cab1', 'Y'),
('2018-07-11', 662148, 'cab1', 'Y'),
('2018-07-11', 663648, 'cab4', 'Y'),
('2018-07-11', 664494, 'cab5', 'Y'),
('2018-07-11', 664495, 'cab2', 'Y'),
('2018-07-11', 666304, 'cab5', 'Y'),
('2018-07-11', 666473, 'cab3', 'Y'),
('2018-07-11', 677089, 'cab5', 'Y'),
('2018-07-11', 681472, 'cab4', 'Y'),
('2018-07-11', 683017, 'cab2', 'Y'),
('2018-07-11', 683027, 'cab4', 'Y'),
('2018-07-11', 685240, 'cab2', 'Y'),
('2018-07-11', 685500, 'cab5', 'Y'),
('2018-07-12', 650267, 'cab3', 'Y'),
('2018-07-12', 650277, 'cab2', 'Y'),
('2018-07-12', 655407, 'cab2', 'Y'),
('2018-07-12', 657384, 'cab1', 'Y'),
('2018-07-12', 662148, 'cab1', 'Y'),
('2018-07-12', 663648, 'cab4', 'Y'),
('2018-07-12', 664494, 'cab4', 'Y'),
('2018-07-12', 664495, 'cab2', 'Y'),
('2018-07-12', 666304, 'cab4', 'Y'),
('2018-07-12', 666473, 'cab3', 'Y'),
('2018-07-12', 677089, 'cab1', 'Y'),
('2018-07-12', 681472, 'cab3', 'Y'),
('2018-07-12', 683017, 'cab1', 'Y'),
('2018-07-12', 683027, 'cab3', 'Y'),
('2018-07-12', 685240, 'cab2', 'Y'),
('2018-07-12', 685500, 'cab4', 'Y'),
('2018-07-13', 607508, 'cab1', 'Y'),
('2018-07-13', 618983, 'cab1', 'Y'),
('2018-07-13', 619472, 'cab2', 'Y'),
('2018-07-13', 635988, 'cab4', 'Y'),
('2018-07-13', 650267, 'cab3', 'Y'),
('2018-07-13', 650277, 'cab3', 'Y'),
('2018-07-13', 655407, 'cab3', 'Y'),
('2018-07-13', 657384, 'cab1', 'Y'),
('2018-07-13', 662148, 'cab1', 'Y'),
('2018-07-13', 663648, 'cab4', 'Y'),
('2018-07-13', 664494, 'cab5', 'Y'),
('2018-07-13', 664495, 'cab2', 'Y'),
('2018-07-13', 666304, 'cab5', 'Y'),
('2018-07-13', 666473, 'cab3', 'Y'),
('2018-07-13', 677089, 'cab5', 'Y'),
('2018-07-13', 681472, 'cab4', 'Y'),
('2018-07-13', 683017, 'cab2', 'Y'),
('2018-07-13', 683027, 'cab4', 'Y'),
('2018-07-13', 685240, 'cab2', 'Y'),
('2018-07-13', 685500, 'cab5', 'Y'),
('2018-07-14', 618983, 'Not Assigned', 'N'),
('2018-07-14', 619472, 'Not Assigned', 'N'),
('2018-07-14', 635988, 'Not Assigned', 'N'),
('2018-07-14', 650267, 'Not Assigned', 'N'),
('2018-07-14', 650277, 'Not Assigned', 'N'),
('2018-07-14', 655407, 'Not Assigned', 'N'),
('2018-07-14', 657384, 'Not Assigned', 'N'),
('2018-07-14', 662148, 'Not Assigned', 'N'),
('2018-07-14', 663648, 'Not Assigned', 'N'),
('2018-07-14', 664494, 'Not Assigned', 'N'),
('2018-07-14', 664495, 'Not Assigned', 'N'),
('2018-07-14', 666304, 'Not Assigned', 'N'),
('2018-07-14', 666473, 'Not Assigned', 'N'),
('2018-07-14', 677089, 'Not Assigned', 'N'),
('2018-07-14', 681472, 'Not Assigned', 'N'),
('2018-07-14', 683017, 'Not Assigned', 'N'),
('2018-07-14', 683027, 'Not Assigned', 'N'),
('2018-07-14', 685240, 'Not Assigned', 'N'),
('2018-07-14', 685500, 'Not Assigned', 'N'),
('2018-07-15', 607508, 'Not Assigned', 'N'),
('2018-07-15', 618983, 'Not Assigned', 'N'),
('2018-07-15', 619472, 'Not Assigned', 'N'),
('2018-07-15', 635988, 'Not Assigned', 'N'),
('2018-07-15', 650267, 'Not Assigned', 'N'),
('2018-07-15', 650277, 'Not Assigned', 'N'),
('2018-07-15', 655407, 'Not Assigned', 'N'),
('2018-07-15', 657384, 'Not Assigned', 'N'),
('2018-07-15', 662148, 'Not Assigned', 'N'),
('2018-07-15', 663648, 'Not Assigned', 'N'),
('2018-07-15', 664494, 'Not Assigned', 'N'),
('2018-07-15', 664495, 'Not Assigned', 'N'),
('2018-07-15', 666304, 'Not Assigned', 'N'),
('2018-07-15', 666473, 'Not Assigned', 'N'),
('2018-07-15', 677089, 'Not Assigned', 'N'),
('2018-07-15', 681472, 'Not Assigned', 'N'),
('2018-07-15', 683017, 'Not Assigned', 'N'),
('2018-07-15', 683027, 'Not Assigned', 'N'),
('2018-07-15', 685240, 'Not Assigned', 'N'),
('2018-07-15', 685500, 'Not Assigned', 'N'),
('2018-07-16', 607508, 'Not Assigned', 'N'),
('2018-07-16', 618983, 'Not Assigned', 'N'),
('2018-07-16', 619472, 'Not Assigned', 'N'),
('2018-07-16', 635988, 'Not Assigned', 'N'),
('2018-07-16', 650267, 'Not Assigned', 'N'),
('2018-07-16', 650277, 'Not Assigned', 'N'),
('2018-07-16', 655407, 'Not Assigned', 'N'),
('2018-07-16', 657384, 'Not Assigned', 'N'),
('2018-07-16', 662148, 'Not Assigned', 'N'),
('2018-07-16', 663648, 'Not Assigned', 'N'),
('2018-07-16', 664494, 'Not Assigned', 'N'),
('2018-07-16', 664495, 'Not Assigned', 'N'),
('2018-07-16', 666304, 'Not Assigned', 'N'),
('2018-07-16', 666473, 'Not Assigned', 'N'),
('2018-07-16', 677089, 'Not Assigned', 'N'),
('2018-07-16', 681472, 'Not Assigned', 'N'),
('2018-07-16', 683017, 'Not Assigned', 'N'),
('2018-07-16', 683027, 'Not Assigned', 'N'),
('2018-07-16', 685240, 'Not Assigned', 'N'),
('2018-07-16', 685500, 'Not Assigned', 'N'),
('2018-07-17', 607508, 'cab1', 'Y'),
('2018-07-17', 618983, 'cab1', 'Y'),
('2018-07-17', 619472, 'cab2', 'Y'),
('2018-07-17', 635988, 'cab4', 'Y'),
('2018-07-17', 650267, 'cab3', 'Y'),
('2018-07-17', 650277, 'cab3', 'Y'),
('2018-07-17', 655407, 'cab3', 'Y'),
('2018-07-17', 657384, 'cab1', 'Y'),
('2018-07-17', 662148, 'cab1', 'Y'),
('2018-07-17', 663648, 'cab4', 'Y'),
('2018-07-17', 664494, 'cab5', 'Y'),
('2018-07-17', 664495, 'cab2', 'Y'),
('2018-07-17', 666304, 'cab5', 'Y'),
('2018-07-17', 666473, 'cab3', 'Y'),
('2018-07-17', 677089, 'cab5', 'Y'),
('2018-07-17', 681472, 'cab4', 'Y'),
('2018-07-17', 683017, 'cab2', 'Y'),
('2018-07-17', 683027, 'cab4', 'Y'),
('2018-07-17', 685240, 'cab2', 'Y'),
('2018-07-17', 685500, 'cab5', 'Y'),
('2018-07-18', 607508, 'Not Assigned', 'N'),
('2018-07-18', 618983, 'Not Assigned', 'N'),
('2018-07-18', 619472, 'Not Assigned', 'N'),
('2018-07-18', 635988, 'Not Assigned', 'N'),
('2018-07-18', 650267, 'Not Assigned', 'N'),
('2018-07-18', 650277, 'Not Assigned', 'N'),
('2018-07-18', 655407, 'Not Assigned', 'N'),
('2018-07-18', 657384, 'Not Assigned', 'N'),
('2018-07-18', 662148, 'Not Assigned', 'N'),
('2018-07-18', 663648, 'Not Assigned', 'N'),
('2018-07-18', 664494, 'Not Assigned', 'N'),
('2018-07-18', 664495, 'Not Assigned', 'N'),
('2018-07-18', 666304, 'Not Assigned', 'N'),
('2018-07-18', 666473, 'Not Assigned', 'N'),
('2018-07-18', 677089, 'Not Assigned', 'N'),
('2018-07-18', 681472, 'Not Assigned', 'N'),
('2018-07-18', 683017, 'Not Assigned', 'N'),
('2018-07-18', 683027, 'Not Assigned', 'N'),
('2018-07-18', 685240, 'Not Assigned', 'N'),
('2018-07-18', 685500, 'Not Assigned', 'N'),
('2018-07-19', 607508, 'Not Assigned', 'N'),
('2018-07-19', 618983, 'Not Assigned', 'N'),
('2018-07-19', 619472, 'Not Assigned', 'N'),
('2018-07-19', 635988, 'Not Assigned', 'N'),
('2018-07-19', 650267, 'Not Assigned', 'N'),
('2018-07-19', 650277, 'Not Assigned', 'N'),
('2018-07-19', 655407, 'Not Assigned', 'N'),
('2018-07-19', 657384, 'Not Assigned', 'N'),
('2018-07-19', 662148, 'Not Assigned', 'N'),
('2018-07-19', 663648, 'Not Assigned', 'N'),
('2018-07-19', 664494, 'Not Assigned', 'N'),
('2018-07-19', 664495, 'Not Assigned', 'N'),
('2018-07-19', 666304, 'Not Assigned', 'N'),
('2018-07-19', 666473, 'Not Assigned', 'N'),
('2018-07-19', 677089, 'Not Assigned', 'N'),
('2018-07-19', 681472, 'Not Assigned', 'N'),
('2018-07-19', 683017, 'Not Assigned', 'N'),
('2018-07-19', 683027, 'Not Assigned', 'N'),
('2018-07-19', 685240, 'Not Assigned', 'N'),
('2018-07-19', 685500, 'Not Assigned', 'N'),
('2018-07-20', 607508, 'Not Assigned', 'N'),
('2018-07-20', 618983, 'Not Assigned', 'N'),
('2018-07-20', 619472, 'Not Assigned', 'N'),
('2018-07-20', 635988, 'Not Assigned', 'N'),
('2018-07-20', 650267, 'Not Assigned', 'N'),
('2018-07-20', 650277, 'Not Assigned', 'N'),
('2018-07-20', 655407, 'Not Assigned', 'N'),
('2018-07-20', 657384, 'Not Assigned', 'N'),
('2018-07-20', 662148, 'Not Assigned', 'N'),
('2018-07-20', 663648, 'Not Assigned', 'N'),
('2018-07-20', 664494, 'Not Assigned', 'N'),
('2018-07-20', 664495, 'Not Assigned', 'N'),
('2018-07-20', 666304, 'Not Assigned', 'N'),
('2018-07-20', 666473, 'Not Assigned', 'N'),
('2018-07-20', 677089, 'Not Assigned', 'N'),
('2018-07-20', 681472, 'Not Assigned', 'N'),
('2018-07-20', 683017, 'Not Assigned', 'N'),
('2018-07-20', 683027, 'Not Assigned', 'N'),
('2018-07-20', 685240, 'Not Assigned', 'N'),
('2018-07-20', 685500, 'Not Assigned', 'N'),
('2018-07-21', 607508, 'Not Assigned', 'N'),
('2018-07-21', 618983, 'Not Assigned', 'N'),
('2018-07-21', 619472, 'Not Assigned', 'N'),
('2018-07-21', 635988, 'Not Assigned', 'N'),
('2018-07-21', 650267, 'Not Assigned', 'N'),
('2018-07-21', 650277, 'Not Assigned', 'N'),
('2018-07-21', 655407, 'Not Assigned', 'N'),
('2018-07-21', 657384, 'Not Assigned', 'N'),
('2018-07-21', 662148, 'Not Assigned', 'N'),
('2018-07-21', 663648, 'Not Assigned', 'N'),
('2018-07-21', 664494, 'Not Assigned', 'N'),
('2018-07-21', 664495, 'Not Assigned', 'N'),
('2018-07-21', 666304, 'Not Assigned', 'N'),
('2018-07-21', 666473, 'Not Assigned', 'N'),
('2018-07-21', 677089, 'Not Assigned', 'N'),
('2018-07-21', 681472, 'Not Assigned', 'N'),
('2018-07-21', 683017, 'Not Assigned', 'N'),
('2018-07-21', 683027, 'Not Assigned', 'N'),
('2018-07-21', 685240, 'Not Assigned', 'N'),
('2018-07-21', 685500, 'Not Assigned', 'N'),
('2018-07-22', 607508, 'Not Assigned', 'N'),
('2018-07-22', 618983, 'Not Assigned', 'N'),
('2018-07-22', 619472, 'Not Assigned', 'N'),
('2018-07-22', 635988, 'Not Assigned', 'N'),
('2018-07-22', 650267, 'Not Assigned', 'N'),
('2018-07-22', 650277, 'Not Assigned', 'N'),
('2018-07-22', 655407, 'Not Assigned', 'N'),
('2018-07-22', 657384, 'Not Assigned', 'N'),
('2018-07-22', 662148, 'Not Assigned', 'N'),
('2018-07-22', 663648, 'Not Assigned', 'N'),
('2018-07-22', 664494, 'Not Assigned', 'N'),
('2018-07-22', 664495, 'Not Assigned', 'N'),
('2018-07-22', 666304, 'Not Assigned', 'N'),
('2018-07-22', 666473, 'Not Assigned', 'N'),
('2018-07-22', 677089, 'Not Assigned', 'N'),
('2018-07-22', 681472, 'Not Assigned', 'N'),
('2018-07-22', 683017, 'Not Assigned', 'N'),
('2018-07-22', 683027, 'Not Assigned', 'N'),
('2018-07-22', 685240, 'Not Assigned', 'N'),
('2018-07-22', 685500, 'Not Assigned', 'N'),
('2018-07-23', 607508, 'Not Assigned', 'N'),
('2018-07-23', 618983, 'Not Assigned', 'N'),
('2018-07-23', 619472, 'Not Assigned', 'N'),
('2018-07-23', 635988, 'Not Assigned', 'N'),
('2018-07-23', 650267, 'Not Assigned', 'N'),
('2018-07-23', 650277, 'Not Assigned', 'N'),
('2018-07-23', 655407, 'Not Assigned', 'N'),
('2018-07-23', 657384, 'Not Assigned', 'N'),
('2018-07-23', 662148, 'Not Assigned', 'N'),
('2018-07-23', 663648, 'Not Assigned', 'N'),
('2018-07-23', 664494, 'Not Assigned', 'N'),
('2018-07-23', 664495, 'Not Assigned', 'N'),
('2018-07-23', 666304, 'Not Assigned', 'N'),
('2018-07-23', 666473, 'Not Assigned', 'N'),
('2018-07-23', 677089, 'Not Assigned', 'N'),
('2018-07-23', 681472, 'Not Assigned', 'N'),
('2018-07-23', 683017, 'Not Assigned', 'N'),
('2018-07-23', 683027, 'Not Assigned', 'N'),
('2018-07-23', 685240, 'Not Assigned', 'N'),
('2018-07-23', 685500, 'Not Assigned', 'N'),
('2018-07-24', 607508, 'Not Assigned', 'N'),
('2018-07-24', 618983, 'Not Assigned', 'N'),
('2018-07-24', 619472, 'Not Assigned', 'N'),
('2018-07-24', 635988, 'Not Assigned', 'N'),
('2018-07-24', 650267, 'Not Assigned', 'N'),
('2018-07-24', 650277, 'Not Assigned', 'N'),
('2018-07-24', 655407, 'Not Assigned', 'N'),
('2018-07-24', 657384, 'Not Assigned', 'N'),
('2018-07-24', 662148, 'Not Assigned', 'N'),
('2018-07-24', 663648, 'Not Assigned', 'N'),
('2018-07-24', 664494, 'Not Assigned', 'N'),
('2018-07-24', 664495, 'Not Assigned', 'N'),
('2018-07-24', 666304, 'Not Assigned', 'N'),
('2018-07-24', 666473, 'Not Assigned', 'N'),
('2018-07-24', 677089, 'Not Assigned', 'N'),
('2018-07-24', 681472, 'Not Assigned', 'N'),
('2018-07-24', 683017, 'Not Assigned', 'N'),
('2018-07-24', 683027, 'Not Assigned', 'N'),
('2018-07-24', 685240, 'Not Assigned', 'N'),
('2018-07-24', 685500, 'Not Assigned', 'N'),
('2018-07-25', 607508, 'Not Assigned', 'N'),
('2018-07-25', 618983, 'Not Assigned', 'N'),
('2018-07-25', 619472, 'Not Assigned', 'N'),
('2018-07-25', 635988, 'Not Assigned', 'N'),
('2018-07-25', 650267, 'Not Assigned', 'N'),
('2018-07-25', 650277, 'Not Assigned', 'N'),
('2018-07-25', 655407, 'Not Assigned', 'N'),
('2018-07-25', 657384, 'Not Assigned', 'N'),
('2018-07-25', 662148, 'Not Assigned', 'N'),
('2018-07-25', 663648, 'Not Assigned', 'N'),
('2018-07-25', 664494, 'Not Assigned', 'N'),
('2018-07-25', 664495, 'Not Assigned', 'N'),
('2018-07-25', 666304, 'Not Assigned', 'N'),
('2018-07-25', 666473, 'Not Assigned', 'N'),
('2018-07-25', 677089, 'Not Assigned', 'N'),
('2018-07-25', 681472, 'Not Assigned', 'N'),
('2018-07-25', 683017, 'Not Assigned', 'N'),
('2018-07-25', 683027, 'Not Assigned', 'N'),
('2018-07-25', 685240, 'Not Assigned', 'N'),
('2018-07-25', 685500, 'Not Assigned', 'N'),
('2018-07-26', 607508, 'Not Assigned', 'N'),
('2018-07-26', 618983, 'Not Assigned', 'N'),
('2018-07-26', 619472, 'Not Assigned', 'N'),
('2018-07-26', 635988, 'Not Assigned', 'N'),
('2018-07-26', 650267, 'Not Assigned', 'N'),
('2018-07-26', 650277, 'Not Assigned', 'N'),
('2018-07-26', 655407, 'Not Assigned', 'N'),
('2018-07-26', 657384, 'Not Assigned', 'N'),
('2018-07-26', 662148, 'Not Assigned', 'N'),
('2018-07-26', 663648, 'Not Assigned', 'N'),
('2018-07-26', 664494, 'Not Assigned', 'N'),
('2018-07-26', 664495, 'Not Assigned', 'N'),
('2018-07-26', 666304, 'Not Assigned', 'N'),
('2018-07-26', 666473, 'Not Assigned', 'N'),
('2018-07-26', 677089, 'Not Assigned', 'N'),
('2018-07-26', 681472, 'Not Assigned', 'N'),
('2018-07-26', 683017, 'Not Assigned', 'N'),
('2018-07-26', 683027, 'Not Assigned', 'N'),
('2018-07-26', 685240, 'Not Assigned', 'N'),
('2018-07-26', 685500, 'Not Assigned', 'N'),
('2018-07-27', 607508, 'Not Assigned', 'N'),
('2018-07-27', 618983, 'Not Assigned', 'N'),
('2018-07-27', 619472, 'Not Assigned', 'N'),
('2018-07-27', 635988, 'Not Assigned', 'N'),
('2018-07-27', 650267, 'Not Assigned', 'N'),
('2018-07-27', 650277, 'Not Assigned', 'N'),
('2018-07-27', 655407, 'Not Assigned', 'N'),
('2018-07-27', 657384, 'Not Assigned', 'N'),
('2018-07-27', 662148, 'Not Assigned', 'N'),
('2018-07-27', 663648, 'Not Assigned', 'N'),
('2018-07-27', 664494, 'Not Assigned', 'N'),
('2018-07-27', 664495, 'Not Assigned', 'N'),
('2018-07-27', 666304, 'Not Assigned', 'N'),
('2018-07-27', 666473, 'Not Assigned', 'N'),
('2018-07-27', 677089, 'Not Assigned', 'N'),
('2018-07-27', 681472, 'Not Assigned', 'N'),
('2018-07-27', 683017, 'Not Assigned', 'N'),
('2018-07-27', 683027, 'Not Assigned', 'N'),
('2018-07-27', 685240, 'Not Assigned', 'N'),
('2018-07-27', 685500, 'Not Assigned', 'N'),
('2018-07-28', 607508, 'Not Assigned', 'N'),
('2018-07-28', 618983, 'Not Assigned', 'N'),
('2018-07-28', 619472, 'Not Assigned', 'N'),
('2018-07-28', 635988, 'Not Assigned', 'N'),
('2018-07-28', 650267, 'Not Assigned', 'N'),
('2018-07-28', 650277, 'Not Assigned', 'N'),
('2018-07-28', 655407, 'Not Assigned', 'N'),
('2018-07-28', 657384, 'Not Assigned', 'N'),
('2018-07-28', 662148, 'Not Assigned', 'N'),
('2018-07-28', 663648, 'Not Assigned', 'N'),
('2018-07-28', 664494, 'Not Assigned', 'N'),
('2018-07-28', 664495, 'Not Assigned', 'N'),
('2018-07-28', 666304, 'Not Assigned', 'N'),
('2018-07-28', 666473, 'Not Assigned', 'N'),
('2018-07-28', 677089, 'Not Assigned', 'N'),
('2018-07-28', 681472, 'Not Assigned', 'N'),
('2018-07-28', 683017, 'Not Assigned', 'N'),
('2018-07-28', 683027, 'Not Assigned', 'N'),
('2018-07-28', 685240, 'Not Assigned', 'N'),
('2018-07-28', 685500, 'Not Assigned', 'N'),
('2018-07-29', 607508, 'Not Assigned', 'N'),
('2018-07-29', 618983, 'Not Assigned', 'N'),
('2018-07-29', 619472, 'Not Assigned', 'N'),
('2018-07-29', 635988, 'Not Assigned', 'N'),
('2018-07-29', 650267, 'Not Assigned', 'N'),
('2018-07-29', 650277, 'Not Assigned', 'N'),
('2018-07-29', 655407, 'Not Assigned', 'N'),
('2018-07-29', 657384, 'Not Assigned', 'N'),
('2018-07-29', 662148, 'Not Assigned', 'N'),
('2018-07-29', 663648, 'Not Assigned', 'N'),
('2018-07-29', 664494, 'Not Assigned', 'N'),
('2018-07-29', 664495, 'Not Assigned', 'N'),
('2018-07-29', 666304, 'Not Assigned', 'N'),
('2018-07-29', 666473, 'Not Assigned', 'N'),
('2018-07-29', 677089, 'Not Assigned', 'N'),
('2018-07-29', 681472, 'Not Assigned', 'N'),
('2018-07-29', 683017, 'Not Assigned', 'N'),
('2018-07-29', 683027, 'Not Assigned', 'N'),
('2018-07-29', 685240, 'Not Assigned', 'N'),
('2018-07-29', 685500, 'Not Assigned', 'N'),
('2018-07-30', 607508, 'Not Assigned', 'N'),
('2018-07-30', 618983, 'Not Assigned', 'N'),
('2018-07-30', 619472, 'Not Assigned', 'N'),
('2018-07-30', 635988, 'Not Assigned', 'N'),
('2018-07-30', 650267, 'Not Assigned', 'N'),
('2018-07-30', 650277, 'Not Assigned', 'N'),
('2018-07-30', 655407, 'Not Assigned', 'N'),
('2018-07-30', 657384, 'Not Assigned', 'N'),
('2018-07-30', 662148, 'Not Assigned', 'N'),
('2018-07-30', 663648, 'Not Assigned', 'N'),
('2018-07-30', 664494, 'Not Assigned', 'N'),
('2018-07-30', 664495, 'Not Assigned', 'N'),
('2018-07-30', 666304, 'Not Assigned', 'N'),
('2018-07-30', 666473, 'Not Assigned', 'N'),
('2018-07-30', 677089, 'Not Assigned', 'N'),
('2018-07-30', 681472, 'Not Assigned', 'N'),
('2018-07-30', 683017, 'Not Assigned', 'N'),
('2018-07-30', 683027, 'Not Assigned', 'N'),
('2018-07-30', 685240, 'Not Assigned', 'N'),
('2018-07-30', 685500, 'Not Assigned', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `designation`) VALUES
(611452, 'asaa', '12344', '2018-06-05 10:20:01', 'employee'),
(681472, 'admin', 'admin', '2018-05-21 09:33:47', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cab`
--
ALTER TABLE `cab`
  ADD PRIMARY KEY (`cab_number`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `rota`
--
ALTER TABLE `rota`
  ADD PRIMARY KEY (`rota_date`,`rota_employee_id`,`rota_cab_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=681473;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
