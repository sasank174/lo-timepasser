-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2021 at 02:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osp`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_body` text NOT NULL,
  `posted_by` varchar(60) NOT NULL,
  `posted_to` varchar(60) NOT NULL,
  `date_added` datetime NOT NULL,
  `removed` varchar(3) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_body`, `posted_by`, `posted_to`, `date_added`, `removed`, `post_id`) VALUES
(22, 'sas', 'sasank1', 'sasank2', '2021-05-03 13:52:38', 'no', 44),
(23, 'sasaas', 'sasank1', 'sasank2', '2021-05-03 13:52:44', 'no', 43),
(24, 'saaa', 'sasank1', 'sasank1', '2021-05-03 13:52:49', 'no', 42),
(25, 'sa', 'sasank1', 'sasank2', '2021-05-03 14:05:49', 'no', 43),
(26, 'saasas', 'sasank1', 'sasank2', '2021-05-03 14:14:03', 'no', 43);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `feedback` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `post` varchar(225) NOT NULL,
  `text` varchar(225) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `username`, `post`, `text`, `time`) VALUES
(42, 'sasank1', 'public/images/posts/4.jpg', 'sa', '2021-05-03 08:30:53'),
(43, 'sasank2', 'public/images/posts/11.jpg', 'sa', '2021-05-03 10:31:17'),
(44, 'sasank2', 'public/images/posts/6.jpg', 'sa', '2021-05-03 11:31:41'),
(45, 'sasank3', 'public/images/posts/7.jpg', 'pic', '2021-05-03 11:51:35'),
(46, 'sasank4', 'public/images/posts/15.jpg', 'wonderful', '2021-05-07 14:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `username`, `date`, `time`) VALUES
(4, 'sasank1', 'May/2/2021', 9),
(5, 'sasank1', 'May/3/2021', 23),
(6, 'sasank2', 'May/3/2021', 1),
(7, 'sasank3', 'May/3/2021', 34),
(8, 'sasank1', 'May/4/2021', 2),
(9, 'sasank2', 'May/4/2021', 5),
(10, 'sasank3', 'May/6/2021', 0),
(11, 'sasank1', 'May/6/2021', 0),
(12, 'sasank1', 'May/7/2021', 0),
(13, 'sasank4', 'May/7/2021', 12);

-- --------------------------------------------------------

--
-- Table structure for table `trends`
--

CREATE TABLE `trends` (
  `title` varchar(50) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trends`
--

INSERT INTO `trends` (`title`, `hits`) VALUES
('Sa', 3),
('Pic', 1),
('Wonderful', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `profilepic` varchar(225) NOT NULL,
  `nopost` int(11) NOT NULL,
  `friends` text NOT NULL,
  `tpass` varchar(255) NOT NULL,
  `temp` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `profilepic`, `nopost`, `friends`, `tpass`, `temp`) VALUES
(26, 'sasank2', 'sasank2@gmail.com', 'dbd0b327dd211b8759438a067ff19266', '2021-05-03', 'public/images/default/profilepics/head11.png', 2, 'sasank2,sasank3', ',', 'yes'),
(27, 'sasank3', 'sasank3@gmail.com', 'f5605ae4fb08dde3ff690ed67a94eb40', '2021-05-03', 'public/images/default/profilepics/head14.png', 1, 'sasank3', ',', 'yes'),
(28, 'sasank1', 'sasank1@gmail.com', 'f74a67bd9d482344b6e6067612a9c30f', '2021-05-03', 'public/images/default/profilepics/head1.png', 0, 'sasank1,sasank2,sasank3', ',', 'yes'),
(37, 'sasank4', 'perumallasasank123@gmail.com', 'ebf0d3d1f151ef25c97c3254e692e676', '2021-05-07', 'public/images/default/profilepics/head14.png', 1, 'sasank4,sasank2,sasank3', ',', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
