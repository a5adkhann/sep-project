-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 07:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sep_dism`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(256) NOT NULL,
  `category_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`) VALUES
(2, 'Women', 'womenCategory.jpg'),
(4, 'Accessories ', 'accessoriesCategory.jpg'),
(5, 'Men', 'manUpdateCategory.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_generated_id` varchar(256) NOT NULL,
  `order_amount` int(11) NOT NULL,
  `order_status` varchar(256) NOT NULL DEFAULT 'pending',
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(256) NOT NULL,
  `customer_number` varchar(256) NOT NULL,
  `order_shipping_address` varchar(256) NOT NULL,
  `order_placed_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_description` varchar(256) NOT NULL,
  `product_price` varchar(256) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_stock_quantity` int(11) NOT NULL,
  `product_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_category_id`, `product_stock_quantity`, `product_image`) VALUES
(2, 'Esprit Ruffle Shirt', 'Elevate your wardrobe with the timeless elegance of the Esprit Ruffle Shirt. Crafted from soft, breathable fabric, this shirt combines comfort with a touch of sophistication. ', '900', 2, 47, 'product-01.jpg'),
(3, 'Herschel supply', 'Herschel Supply is renowned for its timeless blend of classic style and modern functionality. Crafted with high-quality materials and attention to detail, Herschel backpacks and accessories offer both durability and a sleek, minimalist design that suits ev', '1299', 2, 19, 'product-02.jpg'),
(4, 'Vintage Inspired Classic', 'Vintage Inspired Classic pieces bring a timeless charm that merges nostalgic design with modern-day quality. These products capture the essence of past eras with carefully crafted details, muted tones, and durable materials that stand the test of time. ', '1799', 5, 9, 'product-06.jpg'),
(5, 'Checked Shirt', 'The Checked Shirt is a timeless wardrobe staple that effortlessly blends casual comfort with classic style. Featuring a versatile checkered pattern, it adds a touch of rustic charm to any outfit. Made from soft, breathable fabric, this shirt is perfect for', '1799', 5, -1, 'product-11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`) VALUES
(1, 'Admin', 'admin@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 0),
(2, 'Asad Khan', 'asadklm30@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
