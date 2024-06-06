-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 06:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(7) NOT NULL,
  `book_title` varchar(63) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `author` varchar(31) DEFAULT NULL,
  `book_copies` int(11) DEFAULT NULL,
  `book_pub` varchar(30) DEFAULT NULL,
  `publisher_name` varchar(55) DEFAULT NULL,
  `isbn` varchar(17) DEFAULT NULL,
  `copyright_year` year(4) DEFAULT NULL,
  `date_added` datetime DEFAULT current_timestamp(),
  `status` enum('New','Old','Lost','Damage','Archive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `category_id`, `author`, `book_copies`, `book_pub`, `publisher_name`, `isbn`, `copyright_year`, `date_added`, `status`) VALUES
(15, 'Natural Resources', 8, 'Robin Kerrod', 18, 'Marshall Cavendish Corporation', 'Marshall', '1-85435-628-3', 1997, '2013-12-11 06:34:27', 'New'),
(16, 'Encyclopedia Americana', 5, 'Grolier', 23, 'Connecticut', 'Grolier Incorporation', '0-7172-0119-8', 1988, '2013-12-11 06:36:23', 'Archive'),
(17, 'Algebra 1', 3, 'Carolyn Bradshaw, Michael Seals', 38, 'Pearson Education, Inc', 'Prentice Hall, New Jersey', '0-13-125087-6', 2004, '2013-12-11 06:39:17', 'Damage'),
(18, 'The Philippine Daily Inquirer', 7, '..', 6, 'Pasay City', '..', '..', 2013, '2013-12-11 06:41:53', 'New'),
(19, 'Science in our World', 4, 'Brian Knapp', 28, 'Regency Publishing Group', 'Prentice Hall, Inc', '0-13-050841-1', 1996, '2013-12-11 06:44:44', 'Lost'),
(20, 'Literature', 9, 'Greg Glowka', 23, 'Regency Publishing Group', 'Prentice Hall, Inc', '0-13-050841-1', 2001, '2013-12-11 06:47:44', 'Old'),
(21, 'Lexicon Universal Encyclopedia', 5, 'Lexicon', 13, 'Lexicon Publication', 'Pulication Inc., Lexicon', '0-7172-2043-5', 1993, '2013-12-11 06:49:53', 'Old'),
(22, 'Science and Invention Encyclopedia', 5, 'Clarke Donald, Dartford Mark', 19, 'H.S. Stuttman inc. Publishing', 'Publisher , Westport Connecticut', '0-87475-450-x', 1992, '2013-12-11 06:52:58', 'New'),
(23, 'Integrated Science Textbook ', 4, 'Merde C. Tan', 18, 'Vibal Publishing House Inc.', '12536. Araneta Avenue Corner Ma. Clara St., Quezon City', '971-570-124-8', 2009, '2013-12-11 06:55:27', 'New'),
(24, 'Algebra 2', 3, 'Glencoe McGraw Hill', 18, 'The McGrawHill Companies Inc.', 'McGrawhill', '978-0-07-873830-2', 2008, '2013-12-11 06:57:35', 'New'),
(25, 'Wiki at Panitikan ', 7, 'Lorenza P. Avera', 31, 'JGM & S Corporation', 'JGM & S Corporation', '971-07-1574-7', 2000, '2013-12-11 06:59:24', 'Damage'),
(26, 'English Expressways TextBook for 4th year', 9, 'Virginia Bermudez Ed. O. et al', 26, 'SD Publications, Inc.', 'Gregorio Araneta Avenue, Quezon City', '978-971-0315-33-8', 2007, '2013-12-11 07:01:25', 'New'),
(27, 'Asya Pag-usbong Ng Kabihasnan ', 8, 'Ricardo T. Jose, Ph . D.', 24, 'Vibal Publishing House Inc.', 'Araneta Avenue . Cor. Maria Clara St., Quezon City', '971-07-2324-3', 2008, '2013-12-11 07:02:56', 'New'),
(28, 'Literature (the readers choice)', 9, 'Glencoe McGraw Hill', 23, '..', 'the McGrawHill Companies Inc', '0-02-817934-x', 2001, '2013-12-11 07:05:25', 'Damage'),
(29, 'Beloved a Novel', 9, 'Toni Morrison', 16, '..', 'Alfred A. Knoff, Inc', '0-394-53597-9', 1987, '2013-12-11 07:07:02', 'Old'),
(30, 'Silver Burdett Engish', 2, 'Judy Brim', 15, 'Silver Burdett Company', 'Silver', '0-382-03575-5', 1985, '2013-12-11 09:22:50', 'Old'),
(31, 'The Corporate Warriors (Six Classic Cases in American Business)', 8, 'Douglas K. Ramsey', 11, 'Houghton Miffin Company', '..', '0-395-35487-0', 1987, '2013-12-11 09:25:32', 'Old'),
(32, 'Introduction to Information System', 9, 'Cristine Redoblo', 13, 'CHMSC', 'Brian INC', '123-132', 2013, '2014-01-17 19:00:10', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(9) NOT NULL,
  `member_id` int(9) DEFAULT NULL,
  `date_borrow` datetime DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `book_id` int(3) NOT NULL,
  `borrow_status` enum('returned','pending') NOT NULL,
  `date_return` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `member_id`, `date_borrow`, `due_date`, `book_id`, `borrow_status`, `date_return`) VALUES
(482, 52, '2014-03-20 23:38:22', '2014-03-01', 15, 'pending', '0000-00-00 00:00:00'),
(483, 55, '2014-03-20 23:49:34', '2014-03-21', 15, 'returned', '2014-03-21 03:27:19'),
(484, 55, '2014-03-20 23:50:27', '2014-03-21', 16, 'pending', '0000-00-00 00:00:00'),
(508, 62, '2022-04-23 01:17:14', '1970-01-08', 20, 'returned', '2022-04-23 01:17:55'),
(510, 62, '2022-04-23 17:13:16', '1970-01-08', 20, 'returned', '2022-04-23 17:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `classname` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `classname`) VALUES
(1, 'Periodical'),
(2, 'English'),
(3, 'Math'),
(4, 'Science'),
(5, 'Encyclopedia'),
(6, 'Filipiniana'),
(7, 'Newspaper'),
(8, 'General'),
(9, 'References');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(3) NOT NULL,
  `firstname` varchar(12) DEFAULT NULL,
  `lastname` varchar(9) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `contact` varchar(18) DEFAULT NULL,
  `type_id` int(2) DEFAULT NULL,
  `year_level` enum('First Year','Second Year','Third Year','Fourth Year','Faculty') DEFAULT NULL,
  `status` enum('Active','Banned') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `firstname`, `lastname`, `gender`, `address`, `contact`, `type_id`, `year_level`, `status`) VALUES
(52, 'Mark', 'Sanchez', 'Male', 'Talisay', '212010', 1, 'Faculty', 'Active'),
(53, 'April Joy', 'Aguilar', 'Female', 'E.B. Magalona', '00', 4, 'Second Year', 'Banned'),
(54, 'Alfonso', 'Pancho', 'Male', 'E.B. Magalona', '009', 4, 'First Year', 'Active'),
(55, 'Jonathan ', 'Antanilla', 'Male', 'E.B. Magalona', '0032', 4, 'Fourth Year', 'Active'),
(56, 'Renzo Bryan', 'Pedroso', 'Male', 'Silay City', '03030', 4, 'Third Year', 'Active'),
(57, 'Eleazar', 'Duterte', 'Male', 'E.B. Magalona', '90902', 4, 'Second Year', 'Active'),
(58, 'Ellen Mae', 'Espino', 'Female', 'E.B. Magalona', '123', 4, 'First Year', 'Active'),
(59, 'Ruth', 'Magbanua', 'Female', 'E.B. Magalona', '9340', 4, 'Second Year', 'Active'),
(60, 'Shaina Marie', 'Gabino', 'Female', 'Silay City', '132134', 4, 'Second Year', 'Active'),
(62, 'Chairty Joy', 'Punzalan', 'Female', 'E.B. Magalona', '12423', 1, 'Faculty', 'Active'),
(63, 'Kristine May', 'Dela Rosa', 'Female', 'Silay City', '1321', 4, 'Second Year', 'Active'),
(64, 'Chinie marie', 'Laborosa', 'Female', 'E.B. Magalona', '902101', 4, 'Second Year', 'Active'),
(65, 'Ruby', 'Morante', 'Female', 'E.B. Magalona', '', 1, 'Faculty', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(2) NOT NULL,
  `borrowertype` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `borrowertype`) VALUES
(1, 'Teacher'),
(2, 'Employee'),
(3, 'Non-Teaching'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(2) NOT NULL,
  `username` varchar(8) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `firstname` varchar(9) DEFAULT NULL,
  `lastname` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(2, 'admin', 'admin', 'john', 'smith');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
