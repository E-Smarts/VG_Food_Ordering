-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 11:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category`) VALUES
('Veg'),
('Non-Veg'),
('Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `category` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `calories` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `f_order`
--

CREATE TABLE `f_order` (
  `food_id` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `card_type` varchar(20) NOT NULL,
  `cvv` int(10) NOT NULL,
  `expiration_date` date NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `products` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `state` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `username`, `products`, `phone`, `email`, `city`, `zip`, `state`, `address`, `payment`, `amount`, `status`) VALUES
(1, 'ghansham_2005', 'sham', '1 2', '11112', 'irashettig@gmail.com', 'Solapur', '12121', 'option1', 'Solapur City', 'Cash on Delivery', '285', 'completed'),
(5, 'ghansham_2005', 'Ghanasham', '1', '1212', 'sham@gmail.com', 'Solapur', '12341', 'South Solapur', 'Shelgi Solapur', 'Cash on Delivery', '140', 'completed'),
(7, 'ghansham_2005', 'Ghanasham', '1', '981212', 'irashetshaml@gmail.com', 'Solapur', '121212', 'South Solapur', 'Shelgi Solapur', 'Cash on Delivery', '140', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `price` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `category`, `quantity`, `image`) VALUES
(1, 'Gulab Jamun Cheesecake Tub', '140', 'Desserts', '10', 'desserts/Gulab_Jamun.jpg'),
(2, 'Tiramisu Tub 300ml', '145', 'Desserts', '15', 'desserts/Tiramisu_Tub.jpeg'),
(6, 'Red Velvet Cheesecake', '200', 'Desserts', '12', '20230418074824.jpeg'),
(7, 'Assorted-Eclairs', '150', 'Desserts', '10', '20230428091820.jpg'),
(8, 'Banoffee_Tub', '170', 'Desserts', '10', '20230428091849.jpg'),
(9, 'Blueberry-Oatmea-Cake', '160', 'Desserts', '10', '20230428091919.jpg'),
(10, 'Choco_Fudge_Cake', '150', 'Desserts', '10', '20230428091943.jpg'),
(11, 'Crumble-Cake', '270', 'Desserts', '20', '20230428092207.jpg'),
(12, 'Truffle_Cake', '180', 'Desserts', '10', '20230428092242.jpg'),
(13, 'Chocolate-Mousse-Jar', '190', 'Desserts', '10', '20230428092339.jpg'),
(14, 'Badshahi Paneer Bowl', '180', 'Veg', '10', '20230428092911.jpeg'),
(15, 'Citrus BBQ Paneer Bowl', '170', 'Veg', '20', '20230428092933.jpg'),
(16, 'Penne Alfredo', '200', 'Veg', '10', '20230428092956.jpg'),
(17, 'Penne Alfredo', '190', 'Veg', '10', '20230428093022.jpg'),
(18, 'Peri Paneer Tikka ', '220', 'Veg', '10', '20230428093050.jpg'),
(19, 'Pesto Paneer Pasta', '200', 'Veg', '10', '20230428093107.jpg'),
(20, 'Tofu Me Goreng', '140', 'Veg', '10', '20230428093126.jpg'),
(21, 'Birmingham Chicken Phall', '200', 'Non-Veg', '10', '20230428093501.jpg'),
(22, 'Chicken Chasseur Bowl', '240', 'Non-Veg', '10', '20230428093523.jpg'),
(23, 'Chicken Curry Noodle', '230', 'Non-Veg', '12', '20230428093543.jpg'),
(24, 'Child Cheesy Chicken', '256', 'Non-Veg', '13', '20230428093603.jpg'),
(25, 'Golden Laksa Bowl', '300', 'Non-Veg', '23', '20230428093635.jpg'),
(26, 'Kai Yang Bowl', '245', 'Non-Veg', '12', '20230428093709.jpg'),
(27, 'Murgh Kalimirch Bowl', '235', 'Non-Veg', '12', '20230428093734.jpg'),
(28, 'The Mafias Meal', '238', 'Non-Veg', '10', '20230428112641.jpg'),
(29, 'Chicken Tikka Rice Bowl', '200', 'Non-Veg', '10', '20230928100929.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `pincode` int(10) NOT NULL,
  `cart` varchar(500) NOT NULL,
  `myorder` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`username`, `password`, `phone`, `address`, `pincode`, `cart`, `myorder`) VALUES
('ghansham_2004', '$2y$10$UYB', 1234, 'Solapur City', 413006, '1', ''),
('ghansham_2001', '81dc9bdb52', 1234, 'Solapur City', 413006, '', ''),
('ghansham_2002', '', 22222, '22', 2222, '', ''),
('ghansham_2005', 'sham123', 12345, 'Solapur City', 413006, '', '1'),
('viresh212', 'viresh212', 12345678, 'Bhavani peth ,Solapur City', 413006, 'b:0;', '2'),
('sham143', 'sham123', 2147483647, 'Dahitne South Solapur', 413006, '', '6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
