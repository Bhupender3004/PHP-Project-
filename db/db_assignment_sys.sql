-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 29, 2022 at 11:56 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `ID` int NOT NULL,
  `Sub_Name` varchar(50) NOT NULL,
  `Assmnt_ID` int NOT NULL,
  `Max_M` int NOT NULL,
  `Obt_M` int NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Assmnt_ID` (`Assmnt_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
('CSE_001', 'Couputer Science Engineering'),
('ECE_002', 'Electrical Engineering'),
('ME_003', 'Mechanical Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `notice_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `subject_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `semester` int NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `ID` int NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `course_id` (`course_id`),
  KEY `teachers` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `semester`, `course_id`, `ID`) VALUES
('ADBMS_011_', 'Advanced Database Management Systems', 6, 'CSE_001', 2),
('AI_034_001', 'Artficial Intelligence', 6, 'CSE_001', 2),
('AJ_053_001', 'Advanced Java', 6, 'CSE_001', 1),
('CD_064_001', 'Compiler Design', 6, 'CSE_001', 1),
('DM_043_001', 'Discete Mathematics', 4, 'CSE_001', 3),
('JAVA_020_0', 'Java', 5, 'CSE_001', 1),
('OOP_043_00', 'Object Oriented Programming', 4, 'CSE_001', 1),
('PHY_011', 'Physics 1', 1, 'ECE_002', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_received_assmnt`
--

DROP TABLE IF EXISTS `tb_received_assmnt`;
CREATE TABLE IF NOT EXISTS `tb_received_assmnt` (
  `ID` int NOT NULL,
  `upload_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Assmnt_ID` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Assmnt_path` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `submitted_on` date NOT NULL,
  `obt_marks` int DEFAULT NULL,
  `subject_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Semester` int NOT NULL,
  PRIMARY KEY (`upload_name`) USING BTREE,
  KEY `ID` (`ID`) USING BTREE,
  KEY `subjects` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tb_received_assmnt`
--

INSERT INTO `tb_received_assmnt` (`ID`, `upload_name`, `Assmnt_ID`, `Assmnt_path`, `submitted_on`, `obt_marks`, `subject_id`, `Semester`) VALUES
(1, '1_25.06.2022.21.29.57.png', '1_25.06.2022.11.58.39.png', './uploads/submissions/1_25.06.2022.21.29.57.png', '2022-06-26', 12, 'AJ_053_001', 6),
(1, '1_25.06.2022.21.33.52.png', '1_25.06.2022.12.03.18.png', './uploads/submissions/1_25.06.2022.21.33.52.png', '2022-06-26', 2, 'AJ_053_001', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_students`
--

DROP TABLE IF EXISTS `tb_students`;
CREATE TABLE IF NOT EXISTS `tb_students` (
  `ID` int NOT NULL,
  `Pwd` varchar(200) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Semester` int NOT NULL,
  `Name` varchar(15) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_students`
--

INSERT INTO `tb_students` (`ID`, `Pwd`, `email`, `Semester`, `Name`, `course_id`) VALUES
(1, '$2y$10$RhIfgXZECb.Q10BHC40q8eIQSAgs5BFaf2EDH4/BTgK0xg4rH4S9.', 'test@gmail.com', 6, 'User0', 'CSE_001'),
(2, '$2y$10$NnWNW03GhTEVYN7mkTtJlue7PEJVMJL7hcNFiato/.f3peF.DJzra', 'test@user.com', 5, 'User1', 'CSE_001'),
(42, '$2y$10$qC4TR2I/UVBU3PSJSumU0...UvRHfaxAIKck9IT5V1SLcX/C2z4cq', '52t4', 4, '13', 'CSE_001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teachers`
--

DROP TABLE IF EXISTS `tb_teachers`;
CREATE TABLE IF NOT EXISTS `tb_teachers` (
  `ID` int NOT NULL,
  `Pwd` varchar(200) NOT NULL,
  `Mobile` int DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Name` varchar(15) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_teachers`
--

INSERT INTO `tb_teachers` (`ID`, `Pwd`, `Mobile`, `email`, `Name`, `course_id`) VALUES
(1, '$2y$10$RhIfgXZECb.Q10BHC40q8eIQSAgs5BFaf2EDH4/BTgK0xg4rH4S9.', 1234567891, 'test0@gmail.com', 'Teacher_0', 'CSE_001'),
(2, '$2y$10$NnWNW03GhTEVYN7mkTtJlue7PEJVMJL7hcNFiato/.f3peF.DJzra', 1234567891, 'test1@user.com', 'Teacher_1', 'CSE_001'),
(3, '$2y$10$qC4TR2I/UVBU3PSJSumU0...UvRHfaxAIKck9IT5V1SLcX/C2z4cq', 1234567891, 'test2@user.com', 'Teacher_2', 'CSE_001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_uploaded_assmnt`
--

DROP TABLE IF EXISTS `tb_uploaded_assmnt`;
CREATE TABLE IF NOT EXISTS `tb_uploaded_assmnt` (
  `Assmnt_ID` varchar(50) CHARACTER SET utf8 NOT NULL,
  `subject_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Assmnt_path` varchar(250) CHARACTER SET utf8 NOT NULL,
  `Upload_date` datetime NOT NULL,
  `Submission_date` date NOT NULL,
  `Max_M` int NOT NULL,
  PRIMARY KEY (`Assmnt_ID`),
  UNIQUE KEY `Assmnt_path` (`Assmnt_path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_uploaded_assmnt`
--

INSERT INTO `tb_uploaded_assmnt` (`Assmnt_ID`, `subject_id`, `Assmnt_path`, `Upload_date`, `Submission_date`, `Max_M`) VALUES
('1_25.06.2022.11.58.39.png', 'AJ_053_001', './uploads/assignments/1_25.06.2022.11.58.39.png', '2022-06-25 17:28:39', '2022-06-08', 21),
('1_25.06.2022.12.03.18.png', 'AJ_053_001', './uploads/assignments/1_25.06.2022.12.03.18.png', '2022-06-25 17:33:18', '2022-06-15', 3),
('1_25.06.2022.12.35.48.png', 'CD_064_001', './uploads/assignments/1_25.06.2022.12.35.48.png', '2022-06-25 18:05:48', '2022-06-29', 14),
('1_25.06.2022.12.39.00.png', 'AJ_053_001', './uploads/assignments/1_25.06.2022.12.39.00.png', '2022-06-25 18:09:00', '2022-06-28', 2),
('1_25.06.2022.12.40.55.png', 'AJ_053_001', './uploads/assignments/1_25.06.2022.12.40.55.png', '2022-06-25 18:10:55', '2022-06-12', 1),
('1_25.06.2022.12.43.07.png', 'PHY_011', './uploads/assignments/1_25.06.2022.12.43.07.png', '2022-06-25 18:13:07', '2022-06-28', 34),
('1_27.06.2022.05.21.58.png', 'AJ_053_001', './uploads/assignments/1_27.06.2022.05.21.58.png', '2022-06-27 10:51:58', '2022-06-30', 10),
('1_27.06.2022.06.51.17.png', 'AJ_053_001', './uploads/assignments/1_27.06.2022.06.51.17.png', '2022-06-27 12:21:17', '2022-06-30', 15);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `teachers` FOREIGN KEY (`ID`) REFERENCES `tb_teachers` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_received_assmnt`
--
ALTER TABLE `tb_received_assmnt`
  ADD CONSTRAINT `subjects` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
