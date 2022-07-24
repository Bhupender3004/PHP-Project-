-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 09, 2019 at 12:35 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_assignment_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `assmnt_marks`
--

DROP TABLE IF EXISTS `assmnt_marks`;
CREATE TABLE IF NOT EXISTS `assmnt_marks` (
  `ID` int(11) NOT NULL,
  `Sub_Name` varchar(50) NOT NULL,
  `Assmnt_ID` int(11) NOT NULL,
  `Max_M` int(50) NOT NULL,
  `Obt_M` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_received_assmnt`
--

DROP TABLE IF EXISTS `tb_received_assmnt`;
CREATE TABLE IF NOT EXISTS `tb_received_assmnt` (
  `ID` int(100) NOT NULL,
  `Assmnt_ID` int(100) NOT NULL,
  `Assmnt_path` varchar(250) NOT NULL,
  `Sub_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_upload_assmnt`
--

DROP TABLE IF EXISTS `tb_upload_assmnt`;
CREATE TABLE IF NOT EXISTS `tb_upload_assmnt` (
  `Assmnt_ID` int(100) NOT NULL,
  `Sub_Name` varchar(50) NOT NULL,
  `Assmnt_path` varchar(250) NOT NULL,
  `Upload_date` date NOT NULL,
  `Submission_date` datetime NOT NULL,
  `Max_M` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE IF NOT EXISTS `tb_users` (
  `ID` int(100) NOT NULL,
  `Pwd` varchar(50) NOT NULL,
  `Type` varchar(2) NOT NULL DEFAULT 'T',
  `Name` varchar(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`ID`, `Pwd`, `Type`, `Name`) VALUES
(111, '111', 'S', '111'),
(1234, '1234', 'T', 'Amit'),
(2736, 'a1b2h3i4', 'S', 'Abhishek Kumar'),
(12345, '1234', 'S', 'Ajay'),
(123456, '1234', 'S', 'Abhi'),
(11111111, '1111', 'S', 'Ajay');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
