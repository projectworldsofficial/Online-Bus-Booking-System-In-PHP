-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 04:24 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(3, 'Daily Buses'),
(4, 'Weekly Buses'),
(5, 'Night Buses');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `start` varchar(255) NOT NULL,
  `stopage` varchar(255) NOT NULL,
  `category` int(3) NOT NULL,
  `cost` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`start`, `stopage`, `category`, `cost`) VALUES
('Kanpur', 'Unnao', 5, 100),
('Unnao', 'Lucknow', 5, 152);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) NOT NULL,
  `bus_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_age` int(3) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `cost` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `bus_id`, `user_id`, `user_name`, `user_age`, `source`, `destination`, `date`, `cost`) VALUES
(5, 2, 2, 'dheeraj', 20, 'kanpur', 'lucknow', '2018-03-29', 0),
(6, 2, 2, 'manish', 52, 'kanpur', 'lucknow', '2018-03-29', 0),
(7, 2, 2, 'Pratyush', 10, 'kanpur', 'Lucknow', '2018-04-14', 0),
(10, 2, 2, 'Pratyush', 10, 'Kanpur', 'Lucknow', '2018-04-14', 0),
(11, 4, 3, 'Vikas', 52, 'Chennai', 'Chittor', '2018-04-17', 0),
(14, 4, 3, 'Hemant', 45, 'Chennai', 'Chittor', '2018-04-17', 0),
(15, 6, 2, 'Ankit', 45, 'Agra', 'Mathura', '2018-04-17', 0),
(16, 6, 2, 'Pratyush', 12, 'Agra', 'Mathura', '2018-04-17', 0),
(17, 3, 2, 'Prateek', 20, 'Delhi', 'Surat', '2018-04-17', 0),
(21, 7, 3, 'Prateek', 20, 'Tundla', 'Allahabad', '2018-04-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_source` varchar(255) NOT NULL,
  `post_destination` varchar(255) NOT NULL,
  `post_via` varchar(255) NOT NULL,
  `post_via_time` varchar(255) NOT NULL,
  `post_query_count` int(3) NOT NULL,
  `max_seats` int(3) NOT NULL,
  `available_seats` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_source`, `post_destination`, `post_via`, `post_via_time`, `post_query_count`, `max_seats`, `available_seats`) VALUES
(2, 3, 'Kanpur to Lucknow', 'Prateek Saraswat', '2018-04-26', 'bus2.jpg', 'Runs daily except Tuesday\r\nA/C Bus', 'Kanpur', 'Lucknow', 'Kanpur Unnao Lucknow', '6:00 8:00 11:00', 2, 20, 10),
(3, 3, 'Delhi to Mumbai', 'Prateek', '2018-04-26', 'bus3.jpg', 'Runs daily \r\nLowest fare among all', 'Delhi', 'Mumbai', 'Delhi Jaipur Udaipur Naidad Surat Mumbai', '3:00 5:00 7:00 12:00 18:00 20:00', 1, 30, 17),
(4, 5, 'Chennai to Bangolore', 'Prateek', '2018-05-18', 'bus4.jpg', 'Runs only on Tuesday', 'Chennai', 'Bangolore', 'Chennai Kanchipuram Chittor Bangolore', '12:00 2:00 5:00 7:00', 6, 0, -2),
(5, 3, 'Chandigarh to Manali', 'Prateek', '2019-06-03', 'bus5.jpg', 'Runs daily', 'Chandigarh', 'Manali', 'Chandigarh Panchkula Mandi Kullu Manali', '12:00 2:00 5:00 7:00 8:00', 0, 0, 0),
(6, 4, 'Agra to Mathura', 'Prateek', '2018-04-26', 'bus1.jpg', 'Weekly', 'Agra', 'Mathura', 'Agra Mathura', '5:00 7:00', 0, 0, 0),
(7, 4, 'Delhi to Allahabad', 'Prateek Saraswat', '2018-04-26', 'bus2.jpg', 'Runs Weekly', 'Delhi', 'Allahabad', 'Delhi Ghaziabad Aligarh Tundla Kanpur Fatehpur Allahabad', '12:00 2:00 5:00 7:00 8:00 9:00 10:00 11:00', 0, 10, 9),
(8, 3, 'Kanpur to Lucknow', 'Prateek Saraswat', '2018-04-30', 'bus2.jpg', 'Runs daily except Tuesday\r\nA/C Bus', 'Kanpur', 'Lucknow', 'Kanpur Unnao Lucknow', '6:00 8:00 11:00', 0, 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `query_id` int(3) NOT NULL,
  `query_bus_id` int(3) NOT NULL,
  `query_user` varchar(255) NOT NULL,
  `query_email` varchar(255) NOT NULL,
  `query_date` date NOT NULL,
  `query_content` text NOT NULL,
  `query_replied` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`query_id`, `query_bus_id`, `query_user`, `query_email`, `query_date`, `query_content`, `query_replied`) VALUES
(6, 2, 'Vikas', 'iit2016058@iiita.ac.in', '2018-03-17', 'Great Services', 'no'),
(7, 3, 'Prateek', 'saraswat@gmail.com', '2018-03-19', 'Great Services', 'no'),
(8, 4, 'Saraswat', 'prateek@gmail.com', '2018-03-23', 'Good', 'no'),
(9, 2, 'Parteek', 'saraswat.prateek100@gmail.com', '2018-03-17', 'Good', 'no'),
(10, 2, 'vikas', 'iit2016058@iiita.ac.in', '2018-03-18', 'Keep Going', 'no'),
(11, 3, 'Prateek', 'iit2016058@iiita.ac.in', '2018-03-18', 'Good', 'no'),
(13, 4, '(unknown)', 'iit2016054@iiita.ac.in', '2018-03-18', 'Hello', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `bus_id` int(3) NOT NULL,
  `max_seats` int(3) NOT NULL,
  `available_seats` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phoneno` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_phoneno`, `user_image`, `user_role`) VALUES
(2, 'prateek', 'saraswat', 'prateek', 'saraswat', 'saraswat.prateek100@gmail.com', '9457507662', 'user_default.jpg', 'admin'),
(3, 'vikas', 'vikas', 'vikas', 'kumar', 'iit2016058@iiita.ac.in', '9457862135', 'user_default.jpg', 'subscriber'),
(4, 'manish', 'manish', 'manish', 'ranjan', 'iit2016059@iiita.ac.in', '6475896232', 'user_default_girl.jpg', 'subscriber'),
(5, 'amit', 'amit', 'Amit', 'Gomi', 'lit2016011@iiila.ac.in', '9784512659', 'user_default.jpg', 'admin'),
(26, 'owner', 'saaru', 'Owner', 'Old', 'iit2016054@iiita.ac.in', '9784584566', 'user_default.jpg', 'subscriber'),
(28, 'Hemu', 'heamnt', 'Hemant', 'Singh', 'iit2016070@iiita.ac.in', '9456213654', 'user_default.jpg', 'subscriber'),
(29, 'vipul', 'vipul', 'Vipul', 'Singhal', 'iit2016049@iiita.ac.in', '9456213654', 'user_default_girl.jpg', 'subscriber'),
(30, 'Pratyush', 'pratysh', 'Pratyush', 'Garg', 'pg@gmail.com', '9457865214', 'user_default.jpg', 'subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `query_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
