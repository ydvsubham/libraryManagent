-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 01:11 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `author` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `type`) VALUES
(1, 'mega Tech', 'C G Ghupta', 'Electronic'),
(2, 'Analog electronic', 'J B Gupta', 'Electronic'),
(3, 'The Algorithimic leader', 'Mike wash', 'Computer_Science'),
(4, 'Design pattern ', 'Eric Gama', 'Computer_Science'),
(5, 'Vlad The Impalar', 'M J Trow', 'Maths'),
(6, 'Begining PHP and MySql', 'Frank M kroamnan', 'Computer_Science'),
(8, 'The fault in our star', 'Jhon green', 'Maths'),
(9, 'Engineer Practical Databook', 'John Mike', 'Computer_Science'),
(10, 'The Hacker PlayBook 3', 'Kim Peter', 'Computer_Science'),
(11, 'Mechanics (Lecture on theoritical Physics)', 'SommerFeild', 'Physics'),
(12, 'The Flying circus of Physics', 'Jearl Walker', 'Physics'),
(13, 'Penetration Testing', 'George Wiedman', 'Computer_Science'),
(14, 'Pilgrim\\\'s Progress', 'John Bunyan', 'Maths'),
(15, 'Sons and Lovers ', 'D H Lawrence', 'Maths'),
(16, 'Hate to want you', 'Alisha Rai', 'Maths');

-- --------------------------------------------------------

--
-- Table structure for table `book_map`
--

CREATE TABLE `book_map` (
  `id` int(11) NOT NULL,
  `isbn` int(11) NOT NULL,
  `book_type` int(4) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `STATUS` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_map`
--

INSERT INTO `book_map` (`id`, `isbn`, `book_type`, `price`, `STATUS`) VALUES
(16, 1233444, 1, 555, 1),
(17, 999999, 1, 222, 1),
(18, 56789, 3, 889, 1),
(19, 56790, 10, 999, 1),
(20, 56791, 13, 300, 1),
(21, 56792, 4, 111, 1),
(22, 56793, 12, 149, 1),
(23, 56794, 5, 100, 1),
(24, 56795, 16, 59, 1),
(25, 56781, 2, 399, 1),
(26, 56782, 2, 399, 1),
(27, 56783, 2, 399, 1),
(28, 56784, 3, 399, 1),
(29, 56785, 3, 399, 1),
(30, 56786, 4, 399, 1),
(31, 56787, 4, 399, 1),
(32, 56788, 5, 399, 1),
(33, 56789, 5, 399, 1),
(34, 56681, 5, 399, 1),
(35, 56682, 6, 399, 1),
(36, 56683, 8, 399, 1),
(37, 56684, 9, 399, 1),
(38, 56685, 9, 399, 1),
(39, 56686, 9, 399, 1),
(40, 56687, 10, 399, 1),
(41, 56688, 10, 399, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_c` int(11) NOT NULL,
  `u_id` varchar(20) NOT NULL,
  `isbn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `u_id` varchar(256) NOT NULL,
  `reg_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_status` int(11) NOT NULL,
  `isbn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `u_id`, `reg_date`, `return_date`, `return_status`, `isbn`) VALUES
(42, 'ravan123', '2021-10-12', '2021-10-13', 1, 1233444),
(44, 'ravan123', '2021-10-14', '2021-10-14', 1, 1233444),
(45, 'admin', '2021-10-14', '2021-10-14', 1, 56781),
(49, '2018ucp1436', '2021-10-14', '2021-10-14', 1, 1233444),
(50, '2018ucp1436', '2021-10-14', '2021-10-14', 1, 999999),
(53, 'ravan123', '2021-11-10', '2021-11-10', 1, 56781);

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pwd` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `name`, `user_id`, `email`, `pwd`, `status`) VALUES
(15, 'ravan', 'ravan123', 'ravan@gmail.com', '$2y$10$G4K5ZnLFAifXS9mSE.jldu0/d/5JsSSlCfc9XJODrHl8sxcGziEwy', 1),
(16, 'shubham', 'shubham123', 'sub@gmail.com', '$2y$10$5/XooeP39dGG6TRTqKXZb.0eIkAdO60z8.T7tHk4b9kk2lH3MsaEm', 1),
(17, 'anuj', 'anuj123', 'anuj123@gmail.com', '$2y$10$MfusZLvJBnlnfiUYCWSv7OFwATgWuXFae3wuEZQ3R85IjYId7JDYa', 0),
(18, 'devta', 'dev123', 'dev@gmail.com', '$2y$10$IGNS/YyuY08KgOg78NveyeEkJODDI86XkwgzqIQRImU0Kge9TVl.S', 1),
(19, 'admin', 'admin', 'admin@gamil.com', '$2y$10$F5RjJfFL8oU5kyufcCbWiOJUeBbimF/bAnXVCLVlvcd/I8k6Ksvwa', 1),
(20, 'ashu', 'ashu123', 'ashu@gmail.com', '$2y$10$kCm6hfmDvpOVOxQZwW3hBOdthXVbijn4omxVJEbY3r3WsDRLm005e', 0),
(21, 'shubham', 'shubham123', 'shubham@gmail.com', '$2y$10$FnlZpVrLdIXkNXNwMJIbkuQpKn7yI9X0zuqtg2sqzh/zI5y6tPuhG', 1),
(22, 'Shubham', '2018', 'abc@gmail.com', '$2y$10$k2uYBYK5IfJwYZKitHgAk.Jh0zSqHGBnbzo8d7fWjMdNpNNBbo9Jq', 1),
(23, 'devyadav', 'devydv', 'ash@dcj.com', '$2y$10$bAwgvzcgP9WYVbdnam9mOOlqAeGu0kAARegUINkF/FvBa/RAgaSrq', 0),
(24, 'shubham yadav', '2018ucp1436', 'thelibertyofgod@gmail.com', '$2y$10$g0KQ1a5uSHxtFcoT4nWB4eSCxu.XzEwbgdugfrM03bvkEluEiBCYe', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_map`
--
ALTER TABLE `book_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_c`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `book_map`
--
ALTER TABLE `book_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
