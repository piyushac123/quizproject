-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2020 at 02:05 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `NewQUIZ`
--
CREATE DATABASE IF NOT EXISTS `NewQUIZ` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `NewQUIZ`;

-- --------------------------------------------------------

--
-- Table structure for table `Participant`
--

DROP TABLE IF EXISTS `Participant`;
CREATE TABLE `Participant` (
  `participant_id` int(10) NOT NULL,
  `registration_id` int(10) DEFAULT NULL,
  `Participation_date` datetime DEFAULT NULL,
  `Topic` varchar(20) DEFAULT NULL,
  `Score` int(10) DEFAULT NULL,
  `Questions` varchar(100) DEFAULT NULL,
  `Answer` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Participant`
--

INSERT INTO `Participant` (`participant_id`, `registration_id`, `Participation_date`, `Topic`, `Score`, `Questions`, `Answer`) VALUES
(37, 2, '2020-04-24 12:07:52', 'Politics', 6, '4|3|2|1|10|7', 'Morarji Desai|Dr. B.R. Ambedkar|Atal Bihari Vajpayee|11th|Santosh Yadav|Bharatiya Mahila Bank'),
(38, 2, '2020-04-24 13:10:47', 'Bollywood', 5, '2|7|8|10|13|11', 'Ramesh Sippy|My Dear Kuttichathan|Mehboob Khan|Vinod Khanna|Village Rockstars|Ashutosh Gowariker'),
(39, 2, '2020-04-24 13:13:24', 'Sports', 5, '4|5|2|7|10|3', 'Vidarbha|Rohit Sharma has scored 6 centuries in this tournament|Cincinnati Masters|L. Messi|None of the above|Arun Jaitley  Stadium'),
(40, 2, '2020-04-24 13:20:50', 'Bollywood', 5, '7|1|8|13|11|5', 'My Dear Kuttichathan|Hindi Medim|K. Asif|Village Rockstars|Ashutosh Gowariker|Devika Rani Chaudhuri'),
(42, 2, '2020-04-24 13:23:16', 'Bollywood', 5, '5|12|3|1|7|14', 'Devika Rani Chaudhuri|Slumdog Millionaire|Mehboob Khan|Hindi Medim|My Dear Kuttichathan|Irrfan Khan'),
(43, 2, '2020-04-24 13:25:15', 'Bollywood', 5, '10|3|9|12|8|16', 'Vinod Khanna|Kanhaiyalal|Dadasaheb Phalke|Slumdog Millionaire|K. Asif|8'),
(44, 2, '2020-04-24 13:25:49', 'Bollywood', 5, '9|13|15|3|1|12', 'Dadasaheb Phalke|Village Rockstars|2|Mehboob Khan|Hindi Medim|Slumdog Millionaire'),
(45, 2, '2020-04-24 13:27:23', 'Politics', 6, '4|10|6|1|2|9', 'Morarji Desai|Santosh Yadav|Vijaya Lakshmi Pandit|11th|Atal Bihari Vajpayee|Chonira Belliappa Muthamma'),
(46, 2, '2020-04-24 13:30:44', 'Bollywood', 5, '8|11|9|2|6|1', 'K. Asif|Ashutosh Gowariker|Dadasaheb Phalke|Ramesh Sippy|Nargis Dutt|Hindi Medim'),
(47, 2, '2020-04-24 13:31:50', 'Bollywood', 5, '4|9|12|16|7|10', 'Sholay|Dadasaheb Phalke|Slumdog Millionaire|8|My Dear Kuttichathan|Vinod Khanna'),
(48, 2, '2020-04-24 13:33:31', 'Bollywood', 6, '13|12|11|1|2|14', 'Village Rockstars|Slumdog Millionaire|Ashutosh Gowariker|Hindi Medim|Ramesh Sippy|Irrfan Khan'),
(49, 2, '2020-04-24 13:34:05', 'Bollywood', 1, '12|8|16|6|2|1', 'Mother India|None of these|12|None of these|None of these|None of these'),
(50, 2, '2020-04-24 13:35:28', 'Bollywood', 6, '15|8|10|12|2|16', '2|K. Asif|Vinod Khanna|Slumdog Millionaire|Ramesh Sippy|12'),
(51, 4, '2020-04-24 13:45:00', 'Politics', 6, '4|6|10|3|8|5', 'Morarji Desai|Vijaya Lakshmi Pandit|Santosh Yadav|Dr. B.R. Ambedkar|Sarojini Naidu|Nathuram Godse'),
(52, 4, '2020-04-24 13:47:17', 'Bollywood', 5, '3|2|16|11|5|15', 'Mehboob Khan|Ramesh Sippy|5|Ashutosh Gowariker|Devika Rani Chaudhuri|2'),
(53, 4, '2020-05-02 12:25:24', 'Bollywood', 4, '6|7|3|16|2|8', 'Nargis Dutt||Mehboob Khan|12|Ramesh Sippy|K. Asif'),
(54, 4, '2020-05-02 12:27:28', 'Politics', 3, '6|8|1|10|2|5', 'Vijaya Lakshmi Pandit|Sarojini Naidu|10th|Santosh Yadav||'),
(55, 4, '2020-05-02 12:30:25', 'Sports', 0, '10|3|9|5|8|6', 'Sakshi Malik|Sheila Dikshit Stadium|Malaysia|It was the 12th edition of the ICC Cricket World Cup |Deepa Malik: Athletics|Syed Mushtaq Ali Trophy'),
(56, 5, '2020-05-02 16:24:41', 'Politics', 4, '4|8|2|6|9|3', 'Morarji Desai|Sarojini Naidu|Atal Bihari Vajpayee|Indira Gandhi|Chonira Belliappa Muthamma|'),
(57, 6, '2020-05-02 17:31:34', 'Politics', 2, '5|10|2|1|9|7', '|Santosh Yadav|Atal Bihari Vajpayee|||');

-- --------------------------------------------------------

--
-- Table structure for table `Registration`
--

DROP TABLE IF EXISTS `Registration`;
CREATE TABLE `Registration` (
  `registration_id` int(10) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Flag` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Registration`
--

INSERT INTO `Registration` (`registration_id`, `Name`, `Email`, `Username`, `Password`, `Flag`) VALUES
(1, 'Piyush Avinash Chincholikar', 'piyush.chincholikar@gmail.com', 'piyushac123', 'pac@123', 0),
(2, 'Parmita Avinash Chincholikar', 'parmita.chincholikar@gmail.com', 'parmitaac123', 'parmita', 0),
(3, 'Rambha Tukaram Chincholikar', 'rambha@gmail.com', 'rtchincholikar', 'rambha', 0),
(4, 'Nirmala', 'nirmala.chincholikar@gmail.com', 'nirmala', 'nimu', 0),
(5, 'Piyush', 'piyush@gmail.com', 'piyush', 'piy', 0),
(6, 'Piyush', 'piyush@gmail.com', 'piyush', 'piy@123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Participant`
--
ALTER TABLE `Participant`
  ADD PRIMARY KEY (`participant_id`),
  ADD KEY `registered_user` (`registration_id`);

--
-- Indexes for table `Registration`
--
ALTER TABLE `Registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Participant`
--
ALTER TABLE `Participant`
  MODIFY `participant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `Registration`
--
ALTER TABLE `Registration`
  MODIFY `registration_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Participant`
--
ALTER TABLE `Participant`
  ADD CONSTRAINT `registered_user` FOREIGN KEY (`registration_id`) REFERENCES `Registration` (`registration_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
