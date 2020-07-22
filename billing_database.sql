-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 07:03 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `customer_id`, `name`, `address_line_1`, `address_line_2`, `state_id`, `city`, `pincode`, `phone`, `created`, `modified`) VALUES
(1, 1, 'mathtech', 'hubli', 'Nehru Nagar', 7, 'hubli', '590031', '8884943898', '2017-12-13 10:16:37', '2017-12-13 10:16:37'),
(2, 2, 'home', 'Nehru Nagar', 'fdsafds', 7, 'Belagavi', '590010', '9879879870', '2017-12-22 09:35:04', '2017-12-22 09:35:04'),
(3, 1, 'mathtech', 'hubli', 'Nehru Nagar', 7, 'hubli', '590031', '8884943898', '2017-12-29 10:48:31', '2017-12-29 10:48:31'),
(4, 1, 'mathtech', 'hubli', 'Nehru Nagar', 7, 'hubli', '590031', '8884943898', '2017-12-29 10:50:01', '2017-12-29 10:50:01'),
(5, 2, 'home', 'Nehru Nagar', 'fdsafds', 7, 'Belagavi', '590010', '9879879870', '2017-12-29 10:54:10', '2017-12-29 10:54:10'),
(6, 3, 'cust', 'cust', 'cust', 1, 'ananthapuram', 'whoknows', '96879646379', '2017-12-29 11:04:23', '2017-12-29 11:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_type_id`, `name`, `email`, `gstin`, `active`, `created`, `modified`) VALUES
(1, 2, 'mathtech', 'mathtech@gmail.com', '888888888888', 1, '2017-12-13 09:17:10', '2017-12-29 10:50:01'),
(2, 1, 'shiv', 'shivarajsk@gmail.com', '342423452', 0, '2017-12-22 09:35:04', '2017-12-29 10:54:09'),
(3, 1, 'cust', 'cust@gmail.com', '87697646374', 1, '2017-12-29 11:04:23', '2017-12-29 11:04:23');

-- --------------------------------------------------------

--
-- Table structure for table `customer_types`
--

CREATE TABLE `customer_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_types`
--

INSERT INTO `customer_types` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Customer', '2017-12-01 10:29:05', '2017-12-01 10:29:05'),
(2, 'Distributor', '2017-12-01 10:29:21', '2017-12-01 10:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_status_id` int(11) NOT NULL,
  `payment_status_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `shipped_date` date DEFAULT NULL,
  `delievery_date` date DEFAULT NULL,
  `shipping_cost` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `due_date` date NOT NULL,
  `order_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_status_id`, `payment_status_id`, `order_date`, `shipped_date`, `delievery_date`, `shipping_cost`, `total_amount`, `due_date`, `order_number`, `notes`, `created`, `modified`) VALUES
(1, 1, 1, 3, '2018-01-11', NULL, NULL, '500.00', '3692.00', '2018-02-10', '0001', '', '2018-01-11 09:50:21', '2018-01-11 09:51:25'),
(2, 3, 1, 3, '2018-01-11', NULL, NULL, '0.00', '2536.00', '2018-02-10', '0002', '', '2018-01-11 09:50:48', '2018-01-11 09:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT '0.00',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `discount`, `created`, `modified`) VALUES
(1, 1, 2, 3, '1000.00', '5.00', '2018-01-11 09:50:21', '2018-01-11 09:50:21'),
(2, 2, 2, 1, '1000.00', '0.00', '2018-01-11 09:50:48', '2018-01-11 09:50:48'),
(3, 2, 3, 1, '1200.00', '0.00', '2018-01-11 09:50:48', '2018-01-11 09:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_items_tax_rules`
--

CREATE TABLE `order_items_tax_rules` (
  `id` int(11) NOT NULL,
  `order_item_id` int(11) NOT NULL,
  `tax_rule_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items_tax_rules`
--

INSERT INTO `order_items_tax_rules` (`id`, `order_item_id`, `tax_rule_id`, `created`, `modified`) VALUES
(1, 1, 1, '2018-01-11 09:50:21', '2018-01-11 09:50:21'),
(2, 2, 2, '2018-01-11 09:50:48', '2018-01-11 09:50:48'),
(3, 2, 3, '2018-01-11 09:50:48', '2018-01-11 09:50:48'),
(4, 3, 5, '2018-01-11 09:50:48', '2018-01-11 09:50:48'),
(5, 3, 6, '2018-01-11 09:50:48', '2018-01-11 09:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Under Process', '2017-12-17 07:18:15', '2017-12-28 10:08:01'),
(2, 'Shipped', '2017-12-20 07:48:44', '2017-12-20 07:48:44'),
(3, 'Delivered', '2017-12-20 07:48:52', '2017-12-20 07:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_method_id`, `amount`, `payment_date`, `created`, `modified`) VALUES
(1, 1, 1, '2000.00', '2018-01-11', '2018-01-11 09:50:21', '2018-01-11 09:50:21'),
(2, 1, 1, '1000.00', '2018-01-11', '2018-01-11 09:51:25', '2018-01-11 09:51:25'),
(3, 2, 1, '1000.00', '2018-01-11', '2018-01-11 09:58:12', '2018-01-11 09:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Cash', '2017-12-13 10:56:35', '2017-12-20 07:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `payment_statuses`
--

CREATE TABLE `payment_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_statuses`
--

INSERT INTO `payment_statuses` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Unpaid', '2018-01-03 06:56:30', '2018-01-03 06:56:30'),
(2, 'Paid', '2018-01-03 06:56:39', '2018-01-03 06:56:39'),
(3, 'Partially Paid', '2018-01-03 06:56:48', '2018-01-03 06:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `tax_group_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `tax_group_id`, `name`, `sku`, `price`, `unit`, `active`, `created`, `modified`) VALUES
(2, 1, 'wall care', 'wcp001', '1000.00', 'kg', 1, '2017-12-12 07:54:49', '2017-12-28 07:31:29'),
(3, 2, 'wall care putty', 'wcp002', '1200.00', 'kg', 1, '2017-12-12 08:00:44', '2017-12-25 07:42:01'),
(4, 1, 'wall', 'w003', '6546.00', 'kg', 1, '2017-12-28 07:54:08', '2017-12-28 07:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `products_stocks`
--

CREATE TABLE `products_stocks` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `balance_product` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created`, `modified`) VALUES
(1, 'order_num_padding', '4', '2017-12-29 07:36:33', '2017-12-29 07:36:33'),
(2, 'order_num_current', '3', '2017-12-29 07:37:06', '2018-01-11 09:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Andhra Pradesh', '2017-12-01 10:00:33', '2017-12-01 10:00:33'),
(2, 'Arunachal Pradesh', '2017-12-01 10:00:51', '2017-12-01 10:00:51'),
(3, 'Assam', '2017-12-01 10:01:05', '2017-12-01 10:01:05'),
(4, 'Bihar', '2017-12-01 10:01:20', '2017-12-01 10:01:20'),
(5, 'Chandigarh', '2017-12-01 10:01:35', '2017-12-01 10:01:35'),
(6, 'Chhattisgarh', '2017-12-01 10:01:55', '2017-12-01 10:01:55'),
(7, 'Karnataka', '2017-12-01 10:02:18', '2017-12-01 10:02:18'),
(10, 'Goa', '2017-12-25 06:45:55', '2017-12-25 06:45:55'),
(11, 'Gujarat', '2017-12-25 06:46:12', '2017-12-25 06:46:12'),
(12, 'Haryana', '2017-12-25 06:46:21', '2017-12-25 06:46:21'),
(13, 'Himachal Pradesh', '2017-12-25 06:46:37', '2017-12-25 06:46:44'),
(14, 'Jammu and Kashmir', '2017-12-25 06:46:58', '2017-12-25 06:46:58'),
(16, 'Jharkhand', '2017-12-25 06:47:19', '2017-12-25 06:47:19'),
(17, 'Kerala', '2017-12-25 06:47:30', '2017-12-25 06:47:38'),
(18, 'Madhya Pradesh', '2017-12-25 06:47:51', '2017-12-25 06:47:51'),
(19, 'Maharashtra', '2017-12-25 06:48:02', '2017-12-25 06:48:14'),
(20, 'Manipur', '2017-12-25 06:48:21', '2017-12-25 06:48:21'),
(21, 'Meghalaya', '2017-12-25 06:48:35', '2017-12-25 06:48:35'),
(22, 'Mizoram', '2017-12-25 06:48:44', '2017-12-25 06:48:44'),
(23, 'Nagaland', '2017-12-25 06:49:00', '2017-12-25 06:49:00'),
(24, 'Odisha', '2017-12-25 06:49:08', '2017-12-25 06:49:08'),
(25, 'Punjab', '2017-12-25 06:49:18', '2017-12-25 06:49:18'),
(26, 'Rajasthan', '2017-12-25 06:49:30', '2017-12-25 06:49:30'),
(27, 'Sikkim', '2017-12-25 06:49:41', '2017-12-25 06:49:41'),
(28, 'Tamil Nadu', '2017-12-25 06:49:50', '2017-12-25 06:49:50'),
(29, 'Telangana', '2017-12-25 06:50:01', '2017-12-25 06:50:01'),
(30, 'Tripura', '2017-12-25 06:50:08', '2017-12-25 06:50:08'),
(31, 'Uttar Pradesh', '2017-12-25 06:50:18', '2017-12-25 06:50:18'),
(32, 'Uttarakhand', '2017-12-25 06:50:27', '2017-12-25 06:50:27'),
(33, 'West Bengal', '2017-12-25 06:50:37', '2017-12-25 06:50:37'),
(35, 'Delhi', '2017-12-25 06:52:21', '2017-12-25 06:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `tax_groups`
--

CREATE TABLE `tax_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_groups`
--

INSERT INTO `tax_groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'GST 12%', '2017-12-04 09:31:57', '2017-12-04 09:31:57'),
(2, 'GST 18%', '2017-12-04 09:32:56', '2017-12-04 09:32:56'),
(3, 'lk', '2017-12-17 07:09:35', '2017-12-17 07:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `tax_rules`
--

CREATE TABLE `tax_rules` (
  `id` int(11) NOT NULL,
  `tax_group_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_rules`
--

INSERT INTO `tax_rules` (`id`, `tax_group_id`, `name`, `percentage`, `created`, `modified`) VALUES
(1, 1, 'IGST (12%)', 12, '2017-12-04 09:32:19', '2017-12-23 09:42:37'),
(2, 1, 'SGST (6%)', 6, '2017-12-04 09:32:28', '2017-12-25 07:36:22'),
(3, 1, 'CGST (6%)', 6, '2017-12-04 09:32:37', '2017-12-25 07:36:34'),
(4, 2, 'IGST (18%)', 18, '2017-12-04 09:33:11', '2017-12-25 07:36:48'),
(5, 2, 'CGST (9%)', 9, '2017-12-04 09:33:22', '2017-12-25 07:37:13'),
(6, 2, 'SGST (9%)', 9, '2017-12-04 09:33:35', '2017-12-25 07:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gstin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `gstin`, `address_line_1`, `address_line_2`, `state_id`, `city`, `pincode`, `phone`, `created`, `modified`) VALUES
(2, 'mathtech', 'mathtech', '$2y$10$mVlqpNhbSY/jAkKCU9qgvukoNKjBKYjLC0pdDtFiww9C/Hheunyo2', 'mathtech@gmail.com', '123123', 'hubli', 'Nehru Nagar', 7, 'hubli', '590031', '8884943898', '2017-12-07 10:42:45', '2017-12-07 10:42:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_types`
--
ALTER TABLE `customer_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items_tax_rules`
--
ALTER TABLE `order_items_tax_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_groups`
--
ALTER TABLE `tax_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_rules`
--
ALTER TABLE `tax_rules`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_types`
--
ALTER TABLE `customer_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items_tax_rules`
--
ALTER TABLE `order_items_tax_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tax_groups`
--
ALTER TABLE `tax_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tax_rules`
--
ALTER TABLE `tax_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
