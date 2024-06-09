-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 11:27 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techconnectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `due_date` date DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `course_id`, `title`, `description`, `due_date`, `file_url`) VALUES
(1, 1, 'LO 1 . SETUP', 'NMDMDSFKJF', '2024-06-04', NULL),
(2, 1, 'CAT 1', 'RTTRYTRYTRYTU', '2024-06-04', NULL),
(3, 1, 'CAT 1', 'RTTRYTRYTRYTU', '2024-06-04', NULL),
(4, 1, 'CAT 1', 'RTTRYTRYTRYTU', '2024-06-04', NULL),
(5, 1, 'CAT 1', 'RTTRYTRYTRYTU', '2024-06-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_description` text,
  `course_code` varchar(20) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_description`, `course_code`, `faculty_id`) VALUES
(1, 'DevOps', 'development Operations', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `name`) VALUES
(1, 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `forum_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`forum_id`, `course_id`, `title`, `description`, `created_by`, `created_at`) VALUES
(1, 1, 'hello', 'heheheeh', 1, '2024-06-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text,
  `author_id` int(11) DEFAULT NULL,
  `published_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `content`, `author_id`, `published_at`) VALUES
(1, 'Quiz', 'rtiuiretre', 1, '2024-06-05 08:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `forum_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `forum_id`, `user_id`, `content`, `created_at`) VALUES
(26, 1, 2, 'gogo', '2024-06-09 11:02:00'),
(27, 1, 2, 'rwarwa', '2024-06-09 11:22:00');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submission_id` int(11) NOT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `file_url` varchar(255) DEFAULT NULL,
  `grade` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submission_id`, `assignment_id`, `student_id`, `submission_date`, `file_url`, `grade`) VALUES
(1, 1, 1, '2024-06-04', NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `role` enum('student','faculty') NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `email`, `first_name`, `last_name`, `role`, `profile_picture`, `date_joined`) VALUES
(1, 'IRAHARI', '81dc9bdb52d04dc20036dbd8313ed055', 'sosoweb777@gmail.com', 'Soso', 'IRAHARI', 'student', NULL, '2024-06-04'),
(2, 'Solange', '827ccb0eea8a706c4c34a16891f84e7b', 'sosomutware@gmail.com', 'Solange', 'NYIRASAMAZA', 'student', '', '2024-06-05'),
(3, 'Solange', '827ccb0eea8a706c4c34a16891f84e7b', 'sosomutware@gmail.com', 'Solange', 'NYIRASAMAZA', 'student', '', '2024-06-05'),
(4, 'Solange', '827ccb0eea8a706c4c34a16891f84e7b', 'sosomutware@gmail.com', 'Solange', 'NYIRASAMAZA', 'student', '', '2024-06-05'),
(5, 'Solange', '827ccb0eea8a706c4c34a16891f84e7b', 'sosomutware@gmail.com', 'Solange', 'NYIRASAMAZA', 'student', '', '2024-06-05'),
(6, 'Solange', '827ccb0eea8a706c4c34a16891f84e7b', 'sosomutware@gmail.com', 'Solange', 'NYIRASAMAZA', 'student', '', '2024-06-05'),
(7, 'Solange', '827ccb0eea8a706c4c34a16891f84e7b', 'sosomutware@gmail.com', 'Solange', 'NYIRASAMAZA', 'student', '', '2024-06-05'),
(8, 'Solange', '827ccb0eea8a706c4c34a16891f84e7b', 'sosomutware@gmail.com', 'Solange', 'NYIRASAMAZA', 'student', '', '2024-06-05'),
(9, 'Solange', '827ccb0eea8a706c4c34a16891f84e7b', 'sosomutware@gmail.com', 'Solange', 'NYIRASAMAZA', 'student', '', '2024-06-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`forum_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `forum_id` (`forum_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `assignment_id` (`assignment_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
