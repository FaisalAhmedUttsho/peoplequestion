-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 12:12 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peoplequestion`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(2, 'tareqmunawar1@gmail.com', '4567');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(1, 25, 1, 'Hlw there', 'tareq', '2018-12-01 13:12:26'),
(2, 25, 1, 'hi there', 'tareq', '2018-12-01 13:12:41'),
(3, 25, 1, 'programming is very easy to learn', 'tareq', '2018-12-01 13:24:17'),
(4, 25, 1, 'programming is very easy to learn', 'tareq', '2018-12-01 13:24:25'),
(5, 25, 1, 'programming is very easy to learn', 'tareq', '2018-12-01 13:27:01'),
(6, 25, 1, 'programming is very easy to learn', 'tareq', '2018-12-01 17:51:27'),
(7, 26, 9, 'HHH', 'fosal', '2018-12-02 05:46:04'),
(8, 26, 9, 'HHH', 'fosal', '2018-12-02 05:46:16'),
(9, 27, 12, 'xc', 'foisal', '2018-12-02 07:31:31'),
(10, 27, 12, 'xc', 'foisal', '2018-12-02 07:31:41'),
(11, 27, 12, 'df', 'Taeq', '2018-12-02 07:32:21'),
(12, 27, 12, 'df', 'Taeq', '2018-12-02 07:32:28'),
(13, 1, 13, 'This is absoutely great to work with that.', ' Tareq Munawar ', '2018-12-04 11:01:06'),
(14, 1, 13, 'This is absoutely great to work with that.', ' Tareq Munawar ', '2018-12-04 11:01:15'),
(15, 16, 13, 'Where is the reply.Where is the reply.Where is the reply.Where is the reply.', 'Engine Altan', '2018-12-07 20:47:00'),
(16, 16, 13, 'Where is the reply.Where is the reply.Where is the reply.Where is the reply.', 'Engine Altan', '2018-12-07 20:47:06'),
(17, 16, 13, 'Where is the reply.Where is the reply.Where is the reply.Where is the reply.', 'Engine Altan', '2018-12-07 20:48:51'),
(18, 16, 13, 'Where is the reply.Where is the reply.Where is the reply.Where is the reply.', 'Engine Altan', '2018-12-07 20:49:49'),
(19, 15, 14, 'I wanna reply this.', 'Engine Altan', '2018-12-07 20:51:22'),
(20, 15, 14, 'This is another reply.', 'Engine Altan', '2018-12-07 20:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `msg_sub` text NOT NULL,
  `msg_topic` text NOT NULL,
  `reply` text NOT NULL,
  `status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `sender`, `receiver`, `msg_sub`, `msg_topic`, `reply`, `status`, `msg_date`) VALUES
(12, '13', '14', 'Hlw Engine', 'Introduction', 'Hlw Tareq', 'read', '2018-12-07 20:24:40'),
(13, '14', '13', 'Hi Tareq', '', 'no_reply', 'read', '2018-12-08 14:49:05'),
(14, '13', '15', 'Hi', 'How are you?', 'Yes how are you?', 'read', '2018-12-09 08:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_title` text NOT NULL,
  `post_content` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `topic_id`, `post_title`, `post_content`, `post_date`) VALUES
(17, 15, 2, 'How  does the $_SESSION work in php?', 'The superglobal variable $_SESSION is very important in php programming.I want to know how the $_SESSION works in php.I have studied a little about that but that is not enough for me to learn $_SESSION.The superglobal variable $_SESSION is very important in php programming.I want to know how the $_SESSION works in php.I have studied a little about that but that is not enough for me to learn $_SESSION.', '2018-12-08 14:23:54'),
(18, 15, 4, 'How to eliminates hair fall?', 'Hair fall is a serious problem nowadays.I want to get rid of hair fall.Is the Castor oil works well to get rid of hair-fall?', '2018-12-08 14:31:47'),
(19, 13, 1, 'What is the newest technology for software testing?', 'Software testing is very important topic.I want to be a tester.Please suggest me what I should learn to be a professional software tester.', '2018-12-08 14:41:02'),
(20, 13, 3, 'What are the usages of conditional in English grammar? ', 'As is typical for many languages, full conditional sentences in English consist of a condition clause or protasis specifying a condition or hypothesis, and a consequence clause or apodosis specifying what follows from that condition.', '2018-12-08 14:44:47'),
(21, 13, 4, 'What is the natural remedy of cough?', 'I have been suffering from cough.I want to get rid of this diseases naturally.What are the natural remedy for cough??  ', '2018-12-08 14:48:08'),
(22, 13, 1, 'Aaa', 'bbbb', '2018-12-09 09:47:46'),
(23, 13, 1, 'Aaa', 'bbbb', '2018-12-09 09:53:32'),
(24, 13, 1, 'Aaa', 'bbbb', '0000-00-00 00:00:00'),
(25, 13, 1, 'Aaa', 'bbbb', '0000-00-00 00:00:00'),
(26, 13, 1, 'Aaa', 'bbbb', '2018-12-09 10:03:26'),
(27, 13, 1, 'Aaa', 'bbbb', '2018-12-09 10:07:47'),
(28, 13, 1, 'Aaa', 'bbbb', '2018-12-09 10:07:57'),
(29, 13, 1, 'Aaa', 'bbbb', '2018-12-09 10:08:30'),
(30, 13, 1, 'Aaa', 'bbbb', '2018-12-09 10:09:37'),
(31, 13, 1, 'Aaa', 'bbbb', '2018-12-09 10:10:23'),
(32, 13, 1, 'Aaa', 'bbbb', '2018-12-09 10:12:55'),
(33, 13, 2, 'aa', 'bb', '2018-12-09 10:13:13'),
(34, 13, 1, 'aa', 'vvv', '2018-12-09 10:14:17'),
(35, 13, 1, 'now', 'bbbb', '2018-12-09 10:24:59'),
(36, 13, 1, 'now', 'bbbb', '2018-12-09 10:25:28'),
(37, 13, 1, 'new', 'bbb', '2018-12-09 10:25:59'),
(38, 13, 1, 'new', 'nnnn', '2018-12-09 10:26:15'),
(39, 13, 1, 'new', 'gggg', '2018-12-09 10:31:58'),
(40, 13, 1, 'ax', 'hhbd', '2018-12-09 10:50:49'),
(41, 13, 1, 'ax', 'hhbd', '2018-12-09 10:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`) VALUES
(1, 'Technology'),
(2, 'Programming'),
(3, 'Language'),
(4, 'Medicine');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_image` text NOT NULL,
  `user_reg_date` text NOT NULL,
  `user_last_login` text NOT NULL,
  `status` text NOT NULL,
  `ver_code` int(100) NOT NULL,
  `posts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_reg_date`, `user_last_login`, `status`, `ver_code`, `posts`) VALUES
(13, ' Tareq Munawar ', '4567', 'tareqmunawar1@gmail.com', 'Bangladesh', 'Male', '2018-12-28', '13422321_780127985463426_7424708966966970567_o.jpg', '2018-12-03 02:00:08', '', 'verified', 691746578, 'yes'),
(14, 'Engine Altan', '4567', 'engine@gmail.com', 'China', 'Male', '1989-01-01', 'DirilisÌ§-ErtugÌ†rul.jpg', '2018-12-05 00:28:20', '', 'verified', 16700338, 'yes'),
(15, 'Faisal', '4567', 'faisal@gmail.com', 'Bangladesh', 'Male', '2018-12-16', '16251906_1096793857113258_1680870374139823504_o.jpg', '2018-12-07 19:35:39', '', 'verified', 1477412889, 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
