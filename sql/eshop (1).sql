-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2020 at 07:23 PM
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
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
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
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
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
(56, '898887657.png', 3, 0),
(57, '213299694.png', 4, 1),
(58, '1431758568.png', 4, 0),
(59, '648865184.png', 4, 0),
(60, '2100803385.png', 4, 0),
(61, '1802301685.png', 4, 0),
(62, '406063038.png', 5, 1),
(63, '1332623109.jpg', 5, 0),
(64, '2043799463.jpg', 5, 0),
(65, '320126740.jpg', 5, 0),
(66, '931020540.jpg', 5, 0),
(67, '642796508.png', 6, 1),
(68, '1655550227.png', 6, 0),
(69, '981666564.png', 7, 1),
(70, '854424864.jpg', 7, 0),
(72, '351114305.jpg', 8, 0),
(73, '980740357.jpg', 8, 0),
(74, '2030359646.jpg', 8, 0),
(75, '1142064446.png', 8, 1),
(77, '1256835863.jpeg', 9, 0),
(78, '1320902936.png', 9, 1),
(79, '1975631716.png', 10, 1),
(80, '2007031139.jpeg', 10, 0),
(81, '1497294164.jpeg', 11, 0),
(82, '1134953632.png', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `date`, `email`) VALUES
(28, 12, 'Lubasinski', '2020-06-24 18:54:46', 'admin@admin.com'),
(29, 12, 'Lubasinski', '2020-06-27 21:54:24', 'admin@admin.com'),
(30, 12, 'Lubasinski', '2020-06-27 21:56:29', 'admin@admin.com'),
(31, 12, 'Lubasinski', '2020-06-27 21:56:42', 'admin@admin.com'),
(32, 12, 'Lubasinski', '2020-06-27 21:57:12', 'admin@admin.com'),
(33, 12, 'Lubasinski', '2020-06-27 21:58:20', 'admin@admin.com'),
(34, 12, 'Lubasinski', '2020-06-27 21:58:48', 'admin@admin.com'),
(35, 12, 'Lubasinski', '2020-06-27 21:59:22', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `quantity`, `price`, `name`, `order_id`) VALUES
(7, 3, 150, 'Compte niveau 142', 28),
(8, 2, 100, 'Compte niveau 142', 29),
(9, 2, 100, 'Compte niveau 142', 30),
(10, 2, 100, 'Compte niveau 142', 31),
(11, 2, 100, 'Compte niveau 142', 32),
(12, 2, 100, 'Compte niveau 142', 33),
(13, 2, 100, 'Compte niveau 142', 34),
(14, 4, 200, 'Compte niveau 142', 35);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `short_description` tinytext CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `short_description`, `description`, `price`, `quantity`) VALUES
(1, 'Compte niveau 121', 'Niveau 121\r\nTous les agents', '-52 agents débloqués (3 agents élite)\r\n-niveau 121  \r\n-2 black ice (Fmg-9, Aug)  \r\n-Classé diamant année 4 ', 50, 10),
(2, 'Compte niveau 142', '-classé OR année 4\r\n-4 Skin black ice\r\n', '-niveau 142\r\n-classé OR année 4\r\n-4 Skin black ice\r\n-tous les agents années 2,3', 50, 6),
(3, 'Compte niveau 42', 'Classé diamant en année 4', '-niveau 42\r\n-tous les agents année 3\r\n- 3 skins élites (sledge, IQ, valky)', 70, 200),
(4, 'Compte Fortnite', '-19 skins (dont 3 rares)\r\n-2 pioches rares', '-Palier 100\r\n-19 skins (dont 3 rares)\r\n-2 pioches rares\r\n-2 planeurs très rares', 30, 1),
(5, 'Compte Fortnite', '-palier 100 (toutes les saisons du chapitre 1)', '-palier 100 \r\n(toutes les saisons du chapitre 1)\r\n-5 pioches rares\r\n-20 skins très rares', 100, 2),
(6, 'Compte Beta Valorant', '', '-compte venant de la beta', 10, 10),
(7, 'Compte niveau 172', '-tous les agents', '-compte niveau 172\r\n-tous les agents\r\n-50000 de renomée', 60, 1),
(8, 'Compte fifa', '\r\n-1 million de crédit\r\n-4 légendes', '-1 million de crédit\r\n-4 légendes\r\n-walker rouge\r\n-pogba invendable', 100, 2),
(9, 'Compte fifa', '-équipe a 1 million', '-5 millions de crédits\r\n-équipe a 1 million', 100, 2),
(10, 'Compte fifa', '-500000 crédits', '-500000 crédits\r\n-équipe à 1 million', 50, 10),
(11, 'Compte fifa', '-équipe à 300 000', '-10 cartes rouges\r\n-2 cartes screams', 30, 5);

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
(3, 3, 3),
(4, 22, 4),
(5, 22, 5),
(6, 21, 6),
(7, 3, 7),
(8, 25, 8),
(9, 25, 9),
(10, 25, 10),
(11, 25, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `address`, `is_admin`, `created_at`) VALUES
(11, 'DON', 'niglO', 'don.niglo@cartel.fr', '202cb962ac59075b964b07152d234b70', '2 rue de la chasse', 1, '2020-06-17 10:56:05'),
(12, 'Lucas', 'Lubasinski', 'admin@admin.com', '202cb962ac59075b964b07152d234b70', '5 rue de la chasse', 1, '2020-06-17 14:57:26'),
(13, '123', '123', '123@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 0, '2020-06-29 14:15:24'),
(14, '134', '134', '1234@gmail.com', '202cb962ac59075b964b07152d234b70', '134', 0, '2020-06-29 14:18:13'),
(15, 'aze', 'aze', '12345@aze', '0a5b3913cbc9a9092311630e869b4442', 'aze', 0, '2020-06-29 14:18:53');

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
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
