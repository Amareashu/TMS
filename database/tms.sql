-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 01:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(15) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `role` varchar(15) CHARACTER SET latin1 NOT NULL,
  `user_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `role`, `user_id`, `status`) VALUES
(1, 'MNG1234', 'MTIzMTIz', 'Manager', '001', 'Active'),
(2, 'TKR1234', 'MTIzMTIz', 'Ticket officer', '002', 'Active'),
(3, 'SYA1234', 'MTIzNDEy', 'System admin', '003', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `assign_buss`
--

CREATE TABLE `assign_buss` (
  `id` int(11) NOT NULL,
  `buss_id` varchar(50) NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `payment_amount` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  `j_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_buss`
--

INSERT INTO `assign_buss` (`id`, `buss_id`, `source`, `destination`, `payment_amount`, `status`, `j_date`) VALUES
(5, 'ET-1010425', 'Bahir Dar', 'Gonder', '150', 'Active', '2022-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `buss`
--

CREATE TABLE `buss` (
  `id` int(11) NOT NULL,
  `plate_no` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `holding_capacity` text NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buss`
--

INSERT INTO `buss` (`id`, `plate_no`, `level`, `holding_capacity`, `status`) VALUES
(7, 'ET-1010425', 'Level I', '50', 'reserved');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'un_view'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `date`, `email`, `message`, `status`) VALUES
(4, '2022-08-10', 'mengestu123@gmail.com', 'hello how are you', 'View'),
(5, '2022-08-10', 'mengestu123@gmail.com', 'hello how are you', 'View'),
(8, '2022-08-17', 'mengestu123@gmail.com', '123311132213312', 'un_view'),
(9, '2022-08-17', 'hongkonge21@gmailcom', '1331312', 'un_view');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) CHARACTER SET latin1 NOT NULL,
  `message` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date` varchar(10) CHARACTER SET latin1 NOT NULL,
  `status` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'un_view'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `sender`, `message`, `date`, `status`) VALUES
(3, 'pawlose@gmail.com', 'hello this is pawlose', '11-06-22', 'View'),
(4, 'hongkonge21@gmailcom', 'hello how are you?', '11-08-22', 'View'),
(5, 'hongkonge21@gmailcom', 'hello how are you?', '11-08-22', 'un_view');

-- --------------------------------------------------------

--
-- Table structure for table `journy-list`
--

CREATE TABLE `journy-list` (
  `id` int(11) NOT NULL,
  `sourse` varchar(50) NOT NULL,
  `desti` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journy-list`
--

INSERT INTO `journy-list` (`id`, `sourse`, `desti`, `payment`, `status`) VALUES
(1, 'Bahir Dar', 'Gonder', '150', 'Active'),
(2, 'Bahir Dar', 'Addis Abeba', '1300', 'Active'),
(3, 'Bahir Dar', 'Wolidia', '800', 'Active'),
(4, 'Bahir Dar', 'Debere Markos', '250', 'Active'),
(5, 'Bahir Dar', 'Markos', '200', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `recever` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'un_view'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `recever`, `message`, `date`, `status`) VALUES
(7, 'Ticket officer', 'System admin', 'selam selama', '2022-08-13', 'View'),
(9, 'Ticket officer', 'Ticket officer', 'three', '2022-08-13', 'un_view'),
(10, 'Ticket officer', 'Ticket officer', 'Foure', '2022-08-13', 'un_view'),
(11, 'Ticket officer', 'Ticket officer', 'five', '2022-08-13', 'un_view'),
(12, 'System admin', 'Manager', 'HI', '2022-08-16', 'View'),
(13, 'System admin', 'System admin', 'hellom im a tickt officer can you healp me?', '2022-08-16', 'un_view');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'un_view'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `subject`, `message`, `date`, `status`) VALUES
(2, 'የመኪና ለውጥ', 'ክቡራን አና ክብራት ባጋጠመን የቴክኒክ ችግር ምክንያት በET-1010425 መኪና ወደ ET-1010658 የተቀየረ መሆኑን በትህትና እናሳውቃለን', '2022-08-16', 'View');

-- --------------------------------------------------------

--
-- Table structure for table `reserved_journey`
--

CREATE TABLE `reserved_journey` (
  `id` int(11) NOT NULL,
  `buss_id` varchar(50) NOT NULL,
  `pass_id` varchar(50) NOT NULL,
  `full-name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `journey_date` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `tickt_no` varchar(15) NOT NULL,
  `seat_no` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'unconfirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tele-birr-wallet`
--

CREATE TABLE `tele-birr-wallet` (
  `id` int(11) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tele-birr-wallet`
--

INSERT INTO `tele-birr-wallet` (`id`, `owner`, `phone`, `amount`) VALUES
(1, 'ABTS', 'ABTS', '3050'),
(19, 'Beley N', '0910557846', '50'),
(20, 'Amare W', '0963030962', '2417');

-- --------------------------------------------------------

--
-- Table structure for table `tickt_update`
--

CREATE TABLE `tickt_update` (
  `id` int(11) NOT NULL,
  `full-name` varchar(50) NOT NULL,
  `tickt_no` varchar(50) NOT NULL,
  `old_date` varchar(50) NOT NULL,
  `new_date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickt_update`
--

INSERT INTO `tickt_update` (`id`, `full-name`, `tickt_no`, `old_date`, `new_date`, `time`) VALUES
(1, 'Mengestu Lema', '1034', '2022-08-12', '2022-08-12', '08:20:26pm'),
(2, 'Mengestu Lema', '1034', '2022-08-12', '2022-09-09', '10:05:21pm'),
(4, 'Mengestu Lema', '2569', '2022-08-17', '2022-08-17', '04:34:59pm'),
(5, 'Haylu', '2826', '2022-08-18', '2022-08-18', '08:52:12am'),
(6, 'Mengestu Lema', '2569', '2022-08-17', '2022-08-18', '09:04:52am'),
(7, 'Solomn M', '2871', '2022-08-19', '2022-08-18', '09:44:50am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_buss`
--
ALTER TABLE `assign_buss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buss`
--
ALTER TABLE `buss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journy-list`
--
ALTER TABLE `journy-list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserved_journey`
--
ALTER TABLE `reserved_journey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tele-birr-wallet`
--
ALTER TABLE `tele-birr-wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickt_update`
--
ALTER TABLE `tickt_update`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `assign_buss`
--
ALTER TABLE `assign_buss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buss`
--
ALTER TABLE `buss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `journy-list`
--
ALTER TABLE `journy-list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reserved_journey`
--
ALTER TABLE `reserved_journey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tele-birr-wallet`
--
ALTER TABLE `tele-birr-wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tickt_update`
--
ALTER TABLE `tickt_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
