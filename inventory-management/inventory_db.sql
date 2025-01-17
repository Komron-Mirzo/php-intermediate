-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 07:05 AM
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
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`, `user_id`) VALUES
(1, 'Fruits', 'Fruits Category', 1),
(20, 'Vegetables', 'Vegetablessss', 1),
(22, 'Dairy Products', 'Milks, almonds and etc', 1),
(23, 'Oils', 'Oil products', 1),
(25, 'Snacks', 'Snacks and etc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `category_id`, `user_id`) VALUES
(1, 'Apple', 'This is an apple', 15.00, 1, 1),
(2, 'Peach', 'Peach is a fruit', 12.00, 1, 2),
(3, 'Orange', 'Fresh and juicy oranges', 10.00, 1, 3),
(5, 'Strawberry', 'Sweet strawberries', 8.00, 1, 5),
(6, 'Grapes', 'Green grapes', 7.00, 1, 1),
(7, 'Pineapple', 'Fresh pineapple', 12.00, 1, 2),
(8, 'Blueberries', 'Fresh blueberries', 9.00, 1, 3),
(10, 'Avocado', 'Fresh and creamy avocado', 6.00, 1, 5),
(11, 'Tomato', 'Juicy ripe tomatoes', 2.00, 20, 1),
(12, 'Cucumber', 'Crisp cucumber', 1.50, 20, 2),
(13, 'Carrot', 'Fresh and crunchy carrots', 1.00, 20, 3),
(15, 'Spinach', 'Fresh spinach leaves', 3.00, 20, 5),
(16, 'Potato', 'Fresh potatoes', 3.50, 20, 1),
(17, 'Onion', 'Yellow onions', 2.50, 20, 2),
(18, 'Garlic', 'Garlic cloves', 4.00, 20, 3),
(20, 'Cauliflower', 'Fresh cauliflower', 5.50, 20, 5),
(21, 'Eggplant', 'Purple eggplant', 6.00, 22, 1),
(22, 'Zucchini', 'Fresh zucchini', 4.00, 22, 2),
(23, 'Bell Pepper', 'Sweet bell peppers', 2.50, 22, 3),
(25, 'Cabbage', 'Green cabbage', 4.50, 22, 5),
(26, 'Chicken Breast', 'Boneless chicken breast', 10.00, 23, 1),
(28, 'Pork Chop', 'Tender pork chops', 12.00, 23, 3),
(30, 'Salmon', 'Fresh salmon fillet', 18.00, 23, 5),
(31, 'Shrimp', 'Fresh shrimp', 20.00, 23, 1),
(32, 'Fish Fillet', 'Fresh white fish fillet', 16.00, 23, 2),
(33, 'Lamb Chops', 'Tender lamb chops', 22.00, 23, 3),
(35, 'Tofu', 'Firm tofu', 4.00, 25, 5),
(36, 'Tempeh', 'Fermented soy protein', 5.00, 25, 1),
(37, 'Soy Milk', 'Organic soy milk', 3.00, 25, 2),
(38, 'Almond Milk', 'Almond-based milk', 4.50, 25, 3),
(40, 'Rice', 'Premium quality rice', 8.00, 20, 5),
(41, 'Almonds', 'Roasted almonds', 10.00, 1, 1),
(42, 'Cashews', 'Salted cashews', 12.00, 1, 2),
(43, 'Pistachios', 'Pistachio nuts', 15.00, 1, 3),
(45, 'Oats', 'Organic oats', 5.00, 20, 5),
(46, 'Rice', 'Premium quality rice', 8.00, 20, 1),
(47, 'Wheat Flour', 'Whole wheat flour', 3.50, 20, 2),
(48, 'Sugar', 'Refined white sugar', 2.50, 20, 3),
(50, 'Honey', 'Organic honey', 7.00, 20, 5),
(51, 'Tomato Sauce', 'Fresh tomato sauce', 3.00, 22, 1),
(52, 'Mayonnaise', 'Creamy mayonnaise', 4.00, 22, 2),
(53, 'Ketchup', 'Sweet ketchup', 2.50, 22, 3),
(55, 'Olive Oil', 'Extra virgin olive oil', 10.00, 23, 5),
(56, 'Vegetable Oil', 'Refined vegetable oil', 5.00, 23, 1),
(57, 'Coconut Oil', 'Pure coconut oil', 15.00, 23, 2),
(58, 'Canola Oil', 'Cold pressed canola oil', 6.00, 23, 3),
(60, 'Balsamic Vinegar', 'Aged balsamic vinegar', 7.00, 25, 5),
(61, 'Soy Sauce', 'Fermented soy sauce', 3.50, 25, 1),
(62, 'Fish Sauce', 'Authentic fish sauce', 5.00, 25, 2),
(63, 'Frozen Peas', 'Frozen peas for cooking', 2.00, 1, 3),
(65, 'Frozen Carrots', 'Frozen carrot slices', 3.00, 1, 5),
(66, 'Frozen Broccoli', 'Frozen broccoli florets', 3.50, 1, 1),
(67, 'Frozen Spinach', 'Frozen spinach leaves', 4.00, 1, 2),
(68, 'Chicken Breast', 'Boneless chicken breast', 10.00, 20, 3),
(70, 'Pork Chops', 'Tender pork chops', 12.00, 20, 5),
(72, 'Shrimp', 'Fresh shrimp', 18.00, 22, 2),
(73, 'Tofu', 'Firm tofu', 4.00, 23, 3),
(75, 'Vegetarian Burger', 'Plant-based burger patty', 6.00, 23, 5),
(76, 'Beef Steak', 'Juicy beef steak', 20.00, 23, 1),
(78, 'Spinach', 'Fresh spinach leaves', 3.00, 25, 3),
(80, 'Cucumber', 'Crisp cucumber', 1.50, 25, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`) VALUES
(1, 'bittasi1990', '$2y$10$gz5JirrbgaFXsM/6Pzs2BeGpr1m9e/dbG1o3OQTqHmVYRjM/M5C1i', 'bittasi1990@gmail.com', 'admin'),
(2, 'Eden Jacobs', '$2y$10$RXcKNpalOaYSE5YwxvsWxeQ/u3R4ZCdiCXUNAazwWDrxbMX8Lkuq.', 'kesah@mailinator.com', 'user'),
(3, 'Lisandra Bradley', '$2y$10$370wNTjg8zEEl4fSEMaCIOIzQVW0sh8q8FX4Qv8dAcavAKLKlGMam', 'sycyduvi@mailinator.com', 'user'),
(5, 'Noel Gonzalez', '$2y$10$gz5JirrbgaFXsM/6Pzs2BeGpr1m9e/dbG1o3OQTqHmVYRjM/M5C1i', 'waxysijipu@mailinator.com', 'user'),
(10, 'ikkitasi1990', '$2y$10$Pb/85KGuA5/YmOwEBTF4eO6MmPumQNBY9Smc7wM1ACNKs7cOhoMVa', 'ikkitasi1990@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
