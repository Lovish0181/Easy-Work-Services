-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 08:13 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2020web`
--

-- --------------------------------------------------------

--
-- Table structure for table `citizens`
--

CREATE TABLE `citizens` (
  `uid` varchar(20) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(70) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `orgname` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citizens`
--

INSERT INTO `citizens` (`uid`, `cname`, `phone`, `address`, `city`, `state`, `email`, `orgname`) VALUES
('kavya', 'kavya jindal', '9501141536', 'goniana mandi', 'Bathinda', 'Punjab', 'kavya2002@gmail.com', ''),
('lovish', 'lovish jindal', '7087309381', 'goniana mandi', 'Bathinda', 'Punjab', 'lovishjindal98@gmail.com', '20200210_171834.jpg'),
('manish', 'manish jindal', '9041986147', 'goniana mandi', 'jalandhar', 'Punjab', 'manish78@gmail.com', '20200209_223239.jpg'),
('pankaj', 'pankaj kalra', '9041274851', 'goniana mandi', 'Chandigarh', 'Chandigarh', 'pankajkalra6@gmail.com', '20200209_220318.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rid` int(11) NOT NULL,
  `cid` varchar(30) NOT NULL,
  `wid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rid`, `cid`, `wid`) VALUES
(1, 'lovish', 'pankaj'),
(2, 'manish', 'pankaj'),
(3, '1', 'lovish');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `rid` int(11) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `problem` varchar(80) NOT NULL,
  `location` varchar(40) NOT NULL,
  `city` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`rid`, `uid`, `category`, `date`, `problem`, `location`, `city`) VALUES
(2, 'pankaj', 'AC Repair', '2020-07-20', 'ac not working properly', 'street bhondu mal', 'jalandhar'),
(3, 'manish', 'Plumber', '2020-07-20', 'taps leaking', 'street kc hotel', 'bathinda'),
(4, 'kavya', 'AC Repair', '2020-07-20', 'ac not working properly', 'street kc hotel', 'Chandigarh'),
(5, 'lovish', 'Plumber', '2020-07-20', 'PIPE LEAKAGE', 'street mandir wali', 'Bathinda');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` varchar(30) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `mob` varchar(12) NOT NULL,
  `dos` date NOT NULL,
  `category` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `pwd`, `mob`, `dos`, `category`, `status`) VALUES
('aman', 'amanamanA!1', '7087309381', '2020-08-09', 'Citizen', 1),
('kavya', 'kavyaJ!1', '9501141536', '2020-07-17', 'Worker', 1),
('lovish', '123', '7087309381', '2020-07-17', 'Worker', 1),
('lovish jindal', 'lovishL!1', '7087309381', '2020-07-17', 'Citizen', 1),
('manish', 'mansihJ!1', '9041986147', '2020-07-17', 'Worker', 1),
('manish jindal', 'manishM!1', '9041986147', '2020-07-17', 'Citizen', 1),
('pankaj', 'pankajK!1', '9041274851', '2020-07-17', 'Worker', 1),
('pankaj kalra', 'pankajP!1', '9041274851', '2020-07-17', 'Citizen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `rid` int(11) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `wname` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `firm` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  `category` varchar(25) NOT NULL,
  `spl` varchar(100) NOT NULL,
  `exp` varchar(10) NOT NULL,
  `orgnameaadhar` varchar(50) NOT NULL,
  `orgnameprofile` varchar(50) NOT NULL,
  `info` varchar(300) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `ratecount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`rid`, `uid`, `email`, `wname`, `phone`, `firm`, `city`, `address`, `state`, `category`, `spl`, `exp`, `orgnameaadhar`, `orgnameprofile`, `info`, `rating`, `ratecount`) VALUES
(1, '1', 'lovishjindal98@gmail.com', 'lovish jindal', '7087309381', 'M/s Lovish jindal & Co.', 'Bathinda', 'goniana mandi', 'Punjab', 'Dry Cleaning', '', '5', '20200209_204415.jpg', '20200204_201020.jpg', '..................', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
