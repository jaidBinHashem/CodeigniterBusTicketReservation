-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 12:03 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `coachnumber`
--

CREATE TABLE `coachnumber` (
  `id` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `fare` int(11) NOT NULL,
  `totalseat` int(11) NOT NULL,
  `departuretime` time NOT NULL,
  `arrivaltime` time NOT NULL,
  `routeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coachnumber`
--

INSERT INTO `coachnumber` (`id`, `type`, `fare`, `totalseat`, `departuretime`, `arrivaltime`, `routeid`) VALUES
('DHK-COX-001', 'AC', 2000, 28, '20:00:00', '06:00:00', 2),
('DHK-COX-002', 'AC', 2000, 27, '12:00:00', '09:00:00', 2),
('DHK-CTG-001', 'AC', 1250, 28, '09:00:00', '15:00:00', 1),
('DHK-CTG-002', 'NON-AC', 480, 36, '09:00:00', '15:00:00', 1),
('DHK-CTG-003', 'NON-AC', 480, 36, '09:00:00', '12:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `coachid` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `seat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `userid`, `coachid`, `date`, `seat`) VALUES
(1, 2, 'DHK-CTG-001', '2017-03-07', 'A1'),
(2, 2, 'DHK-COX-001', '2017-03-07', 'B1'),
(7, 2, 'DHK-CTG-001', '2017-03-12', 'C2'),
(8, 2, 'DHK-CTG-001', '2017-03-12', 'B2'),
(9, 2, 'DHK-COX-001', '2017-03-12', 'A1'),
(11, 2, 'DHK-CTG-001', '2017-03-13', 'A2'),
(12, 2, 'DHK-COX-001', '2017-03-13', 'A1'),
(13, 2, 'DHK-COX-001', '2017-03-13', 'A2'),
(14, 2, 'DHK-COX-001', '2017-03-13', 'B2'),
(15, 2, 'DHK-COX-001', '2017-03-13', 'B3');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `routeid` int(11) NOT NULL,
  `origin` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`routeid`, `origin`, `destination`) VALUES
(1, 'Dhaka', 'Chittagong'),
(2, 'Dhaka', 'Cox''s Bazar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`, `name`, `email`, `mobile`) VALUES
(1, 'admin', 'admin', 'admin', 'Md. Jaid Bin Hashem', 'mdjaidbinhashem34@gmail.com', '01621370573'),
(2, 'user', 'user', 'user', 'Md. Jaid Bin Hashem', 'mdjaidbinhashem34@gmail.com', '01621370573');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coachnumber`
--
ALTER TABLE `coachnumber`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `routeid` (`routeid`);

--
-- Indexes for table `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `coachid` (`coachid`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`routeid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `routeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `coachnumber`
--
ALTER TABLE `coachnumber`
  ADD CONSTRAINT `coachnumber_ibfk_1` FOREIGN KEY (`routeid`) REFERENCES `route` (`routeid`);

--
-- Constraints for table `reserve`
--
ALTER TABLE `reserve`
  ADD CONSTRAINT `reserve_ibfk_1` FOREIGN KEY (`coachid`) REFERENCES `coachnumber` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
