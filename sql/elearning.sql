-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2024 at 02:24 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `confirmpassword` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `email`, `password`, `confirmpassword`) VALUES
(1, 'Sahil', 'ridwan@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'e807f1fcf82d132f9bb018ca6738a19f');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cat_thumbnail` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category_name`, `cat_thumbnail`) VALUES
(8, 'Science', 'pngwing.com.png'),
(10, 'Arts', 'neven-krcmarek-V4EOZj7g1gw-unsplash.jpg'),
(11, 'IT', 'future-of-java-programming-language.jpg'),
(13, 'Psychology', 'wp11337627-yuuichi-wallpapers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `email`, `message`) VALUES
(1, 'Siddhant Sharma', 'sid@gmail.com', 'Hello! I am having problem with accessing my dashboard despite using correct email and password.');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_file` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `thumbnail` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `course_name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `course_category` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `course_desc` varchar(800) COLLATE utf8mb4_general_ci NOT NULL,
  `pub_id` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_file`, `thumbnail`, `course_name`, `course_category`, `course_desc`, `pub_id`) VALUES
(11, 'javanotes5.pdf', 'future-of-java-programming-language.jpg', 'Java Course for beginners', 'IT', '<h3>Introduction </h3><p>This course is designed for beginners</p>', 'SahilAli65f1345e1bf4c'),
(12, 'DC_Circuit.pdf', 'pngwing.com.png', 'DC Circuit', 'Science', '<h3>Introduction</h3><p>DC Circuit class 11 physics</p>', 'SahilAli65f1345e1bf4c'),
(13, 'kotlin.pdf', 'kotlin.png', 'Kotlin Programming course for beginners', 'IT', '<h3>Introduction</h3><p>Kotlin programming course for beginners</p>', 'user65f135bd81843'),
(14, 'Numerical method. (unit-2 &3 (Report-2)).pdf', 'neven-krcmarek-V4EOZj7g1gw-unsplash.jpg', 'Numerical Methods', 'Mathematics', '<p>Numerical Methods&nbsp;</p>', 'user65f135bd81843');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `qn_id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `answer` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `question_by` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `answer_by` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`qn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qn_id`, `question`, `answer`, `question_by`, `answer_by`) VALUES
(7, '<b>How to calculate force of a falling object?</b>', 'Formula to Calculate Force:-\r\nF = ma', 'Sunil Dhawal', 'Sahil Ali'),
(9, '<b>What is a Software?</b>', 'Software is basically a set of instructions or commands that tell a computer what to do. In other words, the software is a computer program that provides a set of instructions to execute a user’s commands and tell the computer what to do. For example like MS-Word, MS-Excel, PowerPoint, etc.', 'Sunil Dhawal', 'Sahil Ali');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `stud_id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `confirmpassword` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `userrole` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `fullname`, `email`, `password`, `confirmpassword`, `userrole`) VALUES
(1, 'Sunil Kumar Dhawal', 'sunil@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'student'),
(2, 'Sunil Shah', 'shah@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'e807f1fcf82d132f9bb018ca6738a19f', 'student'),
(3, 'Krito Kurosaki', 'krito@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'e807f1fcf82d132f9bb018ca6738a19f', '');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cv` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `confirmpassword` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `userrole` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `pub_id` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `fullname`, `email`, `subject`, `cv`, `password`, `confirmpassword`, `userrole`, `pub_id`, `status`) VALUES
(6, 'Vinay Yadav', 'vinay@gmail.com', 'Mathematics', 'python.pdf', 'e807f1fcf82d132f9bb018ca6738a19f', 'e807f1fcf82d132f9bb018ca6738a19f', 'teacher', 'VinayYadav65f13171e4e81', 'approved'),
(7, 'Sahil Ali', 'sahil@gmail.com', 'Science', 'projectproposal.pdf', 'e807f1fcf82d132f9bb018ca6738a19f', 'e807f1fcf82d132f9bb018ca6738a19f', 'teacher', 'SahilAli65f1345e1bf4c', 'approved'),
(8, 'Siddhant Sharma', 'sid@gmail.com', 'Commerce', 'cv.pdf', 'e807f1fcf82d132f9bb018ca6738a19f', 'e807f1fcf82d132f9bb018ca6738a19f', 'teacher', 'user65f135bd81843', 'approved'),
(9, 'Santosh Yadav', 'santosh@gmail.com', 'Information Technology', 'CACS-256-Project-I-4th-SEM-BCA.pdf[1].pdf', 'e807f1fcf82d132f9bb018ca6738a19f', 'e807f1fcf82d132f9bb018ca6738a19f', 'teacher', 'user6608fe80eb670', 'unapproved');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
