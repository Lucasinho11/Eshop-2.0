-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2020 at 10:07 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `parent_id`) VALUES
(1, 'FPS', NULL, NULL),
(2, 'SPORT', NULL, NULL),
(3, 'Rainbow Six: Siege', 'R6.jpeg', 1),
(21, 'Valorant', '21.jpg', 1),
(22, 'Fortnite', '22.jpg', 1),
(23, 'Apex Legends', '23.jpg', 1),
(24, 'NBA 2K20', '24.png', 2),
(25, 'FIFA 20', '25.jpg', 2),
(26, 'DIVERS', NULL, NULL),
(27, 'Hearthstone', '27.jpg', 26);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `product_id`, `is_main`) VALUES
(42, '2129132112.png', 1, 1),
(43, '754164731.png', 1, 0),
(44, '25200321.png', 1, 0),
(45, '1619656774.png', 1, 0),
(46, '783651715.png', 1, 0),
(47, '562318767.png', 2, 1),
(48, '721926500.png', 2, 0),
(49, '1938790093.png', 2, 0),
(50, '1180672857.png', 2, 0),
(51, '1563231252.png', 2, 0),
(52, '1451831866.png', 3, 1),
(53, '1827751352.jpg', 3, 0),
(54, '1135828285.jpg', 3, 0),
(55, '858581195.jpg', 3, 0),
(56, '898887657.png', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `total_price`, `email`) VALUES
(1, 'Lubasinski', 420, 'admin@admin.com'),
(2, 'Lubasinski', 420, 'admin@admin.com'),
(3, 'Lubasinski', 420, 'admin@admin.com'),
(4, 'Lubasinski', 420, 'admin@admin.com'),
(5, 'Lubasinski', 420, 'admin@admin.com'),
(6, 'Lubasinski', 420, 'admin@admin.com'),
(7, 'Lubasinski', 420, 'admin@admin.com'),
(8, 'Lubasinski', 200, 'admin@admin.com'),
(9, 'Lubasinski', 200, 'admin@admin.com'),
(10, 'Lubasinski', 200, 'admin@admin.com'),
(11, 'Lubasinski', 200, 'admin@admin.com'),
(12, 'Lubasinski', 200, 'admin@admin.com'),
(13, 'Lubasinski', 200, 'admin@admin.com'),
(14, 'Lubasinski', 100, 'admin@admin.com'),
(15, 'Lubasinski', 100, 'admin@admin.com'),
(16, 'Lubasinski', 100, 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` tinytext NOT NULL,
  `description` text,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `short_description`, `description`, `price`, `quantity`) VALUES
(1, 'Compte niveau 121', 'Niveau 121\r\nTous les agents', '-52 agents débloqués (3 agents élite)\r\n-niveau 121  \r\n-2 black ice (Fmg-9, Aug)  \r\n-Classé diamant année 4 ', 50, 10),
(2, 'Compte niveau 142', '-classé OR année 4\r\n-4 Skin black ice\r\n', '-niveau 142\r\n-classé OR année 4\r\n-4 Skin black ice\r\n-tous les agents années 2,3', 50, 5),
(3, 'Compte niveau 42', 'Classé diamant en année 4', '-niveau 42\r\n-tous les agents année 3\r\n- 3 skins élites (sledge, IQ, valky)', 70, 200);

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `category_id`, `product_id`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `is_admin`, `created_at`) VALUES
(11, 'DON', 'niglO', 'don.niglo@cartel.fr', '202cb962ac59075b964b07152d234b70', '2 rue de la chasse', 0, '2020-06-17 10:56:05'),
(12, 'Lucas', 'Lubasinski', 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', '5 rue de la chasse', 1, '2020-06-17 14:57:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id_category_id` (`parent_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_product_id` (`product_id`) USING BTREE;

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
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categories_category_id` (`category_id`) USING BTREE,
  ADD KEY `products_categories_products_id` (`product_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `parent_id_category_id` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD CONSTRAINT `categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
