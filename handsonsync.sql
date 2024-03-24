-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2024 at 10:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handsonsync`
--

-- --------------------------------------------------------

--
-- Table structure for table `learntwords`
--

CREATE TABLE `learntwords` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `word` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learntwords`
--

INSERT INTO `learntwords` (`id`, `user_id`, `word`, `timestamp`) VALUES
(1, 10736, 'parking', '2024-02-04 05:54:19'),
(2, 10736, 'driver', '2024-02-04 05:55:24'),
(3, 10736, 'cite', '2024-02-04 05:55:27'),
(4, 10735, 'whats', '2024-02-04 07:45:19'),
(5, 10735, 'duck', '2024-02-04 07:45:35'),
(6, 10735, 'biography', '2024-02-05 14:20:08'),
(7, 10735, 'shame', '2024-02-05 14:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `token` varchar(65) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `bio` varchar(200) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `highscore` int(14) NOT NULL DEFAULT 0,
  `time_spent` bigint(20) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `registration_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `token`, `full_name`, `bio`, `image`, `highscore`, `time_spent`, `status`, `registration_datetime`, `last_login`) VALUES
(10735, 'anan', 'khandokeranan@gmail.com', '$2y$10$2MjY/57PIIBivSw49NyLjeSOH2dJ4YdU7lBTauWv.2tvxc7OFckaG', 'Khandoker Kafi Anan', ' I develop tech products that inspire, market, and portray your imaginations to your desired audience!', '1707016567_c0abd4ef6a32889f2967.jpeg', 6, 0, 'active', '2024-02-04 03:16:07', '2024-02-04 03:16:07'),
(10736, 'anwholesquare', 'anwholesquare@gmail.com', '$2y$10$DCnUAQdP5CN/F3kzJYnvBOWg2PGfwJYeR6k3Qr34XrgAZ90w.utjK', 'Khandoker Kafi Anan', 'Learning something new is my passion.', '1707023290_da3e664ac35c17797087.png', 7, 0, 'active', '2024-02-04 05:08:11', '2024-02-04 05:08:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `learntwords`
--
ALTER TABLE `learntwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `learntwords`
--
ALTER TABLE `learntwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10737;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
