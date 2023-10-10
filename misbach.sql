-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 11:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `misbach`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `publication_date` date DEFAULT current_timestamp(),
  `content` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `user_id`, `title`, `publication_date`, `content`) VALUES
(58, 2, 'Web Design', '2023-09-28', 'Design Responsive Web'),
(59, 3, 'Landing Page', '2023-09-28', 'Make a landing page '),
(60, 1, 'Login Register', '2023-09-28', 'Making web page'),
(61, 1, 'Write Article', '2023-09-28', 'About HTML CSS'),
(62, 2, 'Animated on Scroll', '2023-09-28', 'using Javascript'),
(70, 1, 'NEw', '2023-10-02', 'write OPO'),
(74, NULL, NULL, '2023-10-04', NULL),
(75, NULL, NULL, '2023-10-04', NULL),
(76, NULL, NULL, '2023-10-04', NULL),
(77, 2, 'ANYAR', '2023-10-04', 'sdf'),
(78, NULL, NULL, '2023-10-04', NULL),
(79, NULL, NULL, '2023-10-04', NULL),
(80, NULL, NULL, '2023-10-04', NULL),
(81, NULL, NULL, '2023-10-04', NULL),
(82, NULL, NULL, '2023-10-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone_number` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `phone_number`) VALUES
(1, 'Anya Forger', 'anya.forger@gmail.com', '984cefd6d27eb0471fc401a493a4fdff', '0882322206520'),
(2, 'Hida Hidayat', 'hihida@gmail.com', '152034dd63de0fc60d026c9b49d51e64', '0882322212348'),
(3, 'Koro Poro', 'koro.p@gmail.com', '403719905290ad1ebe95c3e01572f60e', '0882322212323');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
