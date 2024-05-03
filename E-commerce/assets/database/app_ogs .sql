-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 04:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_ogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_detail`
--

CREATE TABLE `admin_user_detail` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `admin_name` varchar(256) NOT NULL,
  `admin_phone.` bigint(20) NOT NULL,
  `admin_country` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user_detail`
--

INSERT INTO `admin_user_detail` (`user_id`, `user_name`, `user_password`, `admin_name`, `admin_phone.`, `admin_country`) VALUES
(1, 'rushi', 'Rushi', 'Rushi ', 7016031546, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `category_detail`
--

CREATE TABLE `category_detail` (
  `cat_id` bigint(20) NOT NULL,
  `cat_name` varchar(256) NOT NULL,
  `cat_alias` varchar(256) NOT NULL,
  `cat_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_cart`
--

CREATE TABLE `customer_cart` (
  `cart_id` bigint(20) NOT NULL,
  `cust_id` bigint(20) NOT NULL,
  `pr_id` bigint(20) NOT NULL,
  `added_date` datetime NOT NULL,
  `pr_status` tinyint(4) NOT NULL,
  `Total_price` double NOT NULL,
  `pr_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `cust_name` varchar(256) NOT NULL,
  `cust_email` varchar(256) NOT NULL,
  `cust_phone` varchar(20) NOT NULL,
  `cust_password` varchar(256) NOT NULL,
  `cust_address` text NOT NULL,
  `cust_city` varchar(256) NOT NULL,
  `cust_state` varchar(256) NOT NULL,
  `cust_country` varchar(256) NOT NULL,
  `cust_zip_code` varchar(32) NOT NULL,
  `cust_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`cust_name`, `cust_email`, `cust_phone`, `cust_password`, `cust_address`, `cust_city`, `cust_state`, `cust_country`, `cust_zip_code`, `cust_status`) VALUES
('rrushi', 'rgoka1ni851@rku.ac.in', '1234567890', 'Rushi123@#', 'nathsnnaosdg', 'Dwarka', 'gujarat', 'india', '1234567', 'Active'),
('rushi', 'rgokan1i851@rku.ac.in', '7016031546', 'Rushi123@#', 'nathsnnaosdg', 'dwarka', 'gujarat', 'India', '1234567', 'Active'),
('rushi', 'rgokani851@rku.ac.in', '7016031546', 'Rushi123@', 'nathsnnaosdg', 'dwarka', 'gujarat', 'India', '1234567', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `ord_id` bigint(20) NOT NULL,
  `cust_id` bigint(20) NOT NULL,
  `pr_id` bigint(20) NOT NULL,
  `added_date` datetime NOT NULL,
  `ord_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `pr_id` bigint(20) NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `sub_cat_id` bigint(20) NOT NULL,
  `pr_name` varchar(256) NOT NULL,
  `pr_price` double NOT NULL,
  `pr_image` varchar(256) NOT NULL,
  `pr_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`pr_id`, `cat_id`, `sub_cat_id`, `pr_name`, `pr_price`, `pr_image`, `pr_details`) VALUES
(1, 0, 0, 'Personalised Hamper', 900, '1.jpg', 'gfdgfdgfdgfdgfdgfd');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_detail`
--

CREATE TABLE `sub_category_detail` (
  `sub_cat_id` bigint(20) NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `sub_cat_name` varchar(256) NOT NULL,
  `sub_cat_alias` varchar(256) NOT NULL,
  `sub_cat_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user_detail`
--
ALTER TABLE `admin_user_detail`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `category_detail`
--
ALTER TABLE `category_detail`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer_cart`
--
ALTER TABLE `customer_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`cust_email`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `sub_category_detail`
--
ALTER TABLE `sub_category_detail`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user_detail`
--
ALTER TABLE `admin_user_detail`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_detail`
--
ALTER TABLE `category_detail`
  MODIFY `cat_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_cart`
--
ALTER TABLE `customer_cart`
  MODIFY `cart_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `ord_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `pr_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category_detail`
--
ALTER TABLE `sub_category_detail`
  MODIFY `sub_cat_id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
