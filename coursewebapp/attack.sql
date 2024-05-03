-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230302.b5e5e07f9a
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 06:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attack`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(256) NOT NULL,
  `admin_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(256) NOT NULL,
  `p_logo` varchar(256) NOT NULL,
  `p_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_logo`, `p_status`) VALUES
(1, 'Invinsense security', '2afc633577f04c0cba692aa11c816ef9 (1).png', 'Active'),
(3, 'Linux Fundamentals', '565753868d7b47e88ea34e8eb2ceff9d.png', 'Active'),
(4, 'Windows', '85f93356b61c4b62acd0083a6c83ea9d.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sp_video`
--

CREATE TABLE `sp_video` (
  `v_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `v_name` varchar(256) NOT NULL,
  `v_video_name` varchar(256) NOT NULL,
  `v_duration` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sp_video`
--

INSERT INTO `sp_video` (`v_id`, `sp_id`, `v_name`, `v_video_name`, `v_duration`) VALUES
(1, 3, 'Angular Tutorial in Hindi', 'Angular Tutorial in Hindi.mp4', '120 Minutes');

-- --------------------------------------------------------

--
-- Table structure for table `sub_product`
--

CREATE TABLE `sub_product` (
  `sp_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `sp_name` varchar(256) NOT NULL,
  `sp_duration` int(11) NOT NULL,
  `sp_credit` varchar(256) NOT NULL,
  `sp_level` varchar(256) NOT NULL,
  `sp_logo` varchar(256) NOT NULL,
  `sp_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_product`
--

INSERT INTO `sub_product` (`sp_id`, `p_id`, `sp_name`, `sp_duration`, `sp_credit`, `sp_level`, `sp_logo`, `sp_status`) VALUES
(1, 1, 'Shuffle Automation', 60, '40', 'Easy', '27e2bb9eae10467cb082304922e56525.png', 'Active'),
(2, 1, 'Caldera', 120, '55', 'Easy', '9063afb4abb94f9f8bc2f476fc16f737.png', 'Active'),
(3, 4, 'Angular on windows', 120, '40', 'Easy', '0211ab2f84eb4f5ba8ce55d16c65eb11.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(256) NOT NULL,
  `u_email` varchar(256) NOT NULL,
  `u_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_password`) VALUES
(1, 'rushigok', 'rushigokani124@gmail.com', 'scrypt:32768:8:1$zQS6o5ieQcaIUDHX$06d7596ec4e89895bc7bfbfeeff741152eeafe593e21af356118ceba03bb1d8844308deb2462df59cbebae070dbc4d58b9223cf1bda4a21a3e10cd963b9b97bc'),
(2, 'rudra', 'rudra@gmail.com', 'scrypt:32768:8:1$wePEVZL3F6uXPp6r$4e21184662908f25758b12219588587eb6f20a209011a7a8153493d1e2829b4650f8a7bd213731a91fc14431fd069681a5134dd42cc6eb64b7484a26185819bf'),
(3, '', '', 'scrypt:32768:8:1$OZmFCobZzqinp1ZF$dea29d233579ad79ef81326bc8b70f630c958df0ec08a87190a3db860c566da604af658abbcadecfb05b38e798d6b46a83c6634d012c63f6a8adfb1badc3a670');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sp_video`
--
ALTER TABLE `sp_video`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `sub_product`
--
ALTER TABLE `sub_product`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sp_video`
--
ALTER TABLE `sp_video`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_product`
--
ALTER TABLE `sub_product`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
