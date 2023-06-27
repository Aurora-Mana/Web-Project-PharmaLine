-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 10:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `code` int(6) NOT NULL,
  `percentage` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `code`, `percentage`, `start_date`, `end_date`) VALUES
(1, 386614, 50, '2023-06-25', '2023-07-01'),
(2, 227698, 25, '2023-06-27', '2023-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `address2` varchar(225) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `order_status` varchar(112) NOT NULL,
  `order_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `address2`, `total_products`, `total_price`, `order_status`, `order_date`) VALUES
(65, 0, 'Ana', '323242342', 'an66@gmail.com', 'credit card', '1234 Main', '', 'Clean (1) , Smth (1) ', '124', 'on_hold', '2023-06-27 14: 31:56'),
(66, 6, 'Ana', '1243546', 'an66@gmail.com', 'cash', '1234 Main', '', 'Clean (1) , Smth (1) ', '124', 'on_hold', '2023-06-27 15:25:01'),
(67, 6, 'Ana', '34567u8i', 'an66@gmail.com', 'cash', '1234 Main', '', 'Smth (2) , dfg (2) ', '68', 'on_hold', '2023-06-27 19:32:51'),
(68, 6, 'Ana', '123456678', 'an66@gmail.com', 'cash', '1234 Main', '', 'Carrot (1) , A-GAME 5 (1) , DESTINATION DREAM SKIN (1) ', '109', 'on_hold', '2023-06-27 22:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NULL DEFAULT current_timestamp(),
  `author_id` varchar(11) NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `author_id`, `is_featured`) VALUES
(37, 'How To Use Cicaplast Baume B5', '  Created for dry, irritated, weakened, and sensitive skin, La Roche-Posay Cicaplast Baume B5 is a multi-repairing, fragrance-free balm that works quickly to soothe and nourish the skin. It’s a must-try for anyone with sensitive skin as the rich yet lightweight formula quickly reinforces the skin barrier and protects the epidermis from water loss and further irritation. \r\nAll skin types and people of all ages can use Cicaplast Baume B5. It is a great addition to any skincare routine for sensitive skin and safe for the whole family, including babies as young as six months old, as the formula has been tested under dermatological and pediatric control. The quick-absorbing and non-sticky balm can be used as a moisturizer for any skin type or as a spot treatment for eczema or irritated skin. There is no wrong way to use this safe and allergy-tested balm!\r\nCicaplast Baume B5 can be used once or twice a day, day or night, on cleansed skin. Apply a generous layer to the face, body, hands, or lips. It can also be applied to rough, cracked skin, diaper rash, or sensitive skin that’s prone to irritation and redness.', 'image/1687820513CICAPLAST_BAUME.jpg', '2023-06-26 22:53:46', 'PharmaLine', 1),
(38, 'Geek & Gorgeous 101 C-Glow Serum | Doctors Review', 'The Geek & Gorgeous 101 C-Glow Serum is a super-light, water-like 15% Vitamin C + extra antioxidants (Ferulic Acid & a smaller amount of Vitamin E) formula to give the skin environmental protection, boost collagen, and even the skin tone.\r\nWhat differentiates this serum from most is the color. It is absolutely clear, while other Vitamin C products often have a slight yellow tint. As background: Ascorbic Acid is pretty unstable, and when it oxidizes, it turns yellow. This is how you can tell that it is losing its efficacy, a product that has turned a deep yellow probably no longer has a lot of Vitamin C still active.\r\nAs the Geek and Gorgeous C-Glow Serum is made fresh on order, there is minimal oxidation once the product arrives as opposed to a product that has been sitting in store for a little while already.\r\nVitamin C serums are preferred to be used in the mornings, to get the most out of the antioxidant effects, but using it at night is of course possible as well. Against common belief, it can be paired with most other substances, which is a great detail when considering adding this serum to your routine.', 'image/1687820817GREEK&GORGEOUS_CGLOW.jpg', '2023-06-26 22:58:57', 'PharmaLine', 0),
(39, 'Tester post', 'Delete later', 'image/Kelly Hill - Free Instagram Highlights Template.png', '2023-06-26 23:07:30', 'PharmaLine', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` varchar(2225) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(224) NOT NULL,
  `brand` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_keyword`, `description`, `price`, `quantity`, `image`, `category`, `brand`) VALUES
(86, 'Purifying cleansing gel ', 'gel', 'A Water-Activated Cleansing Foaming Gel To Gently Regulate Surface Oil.', '$37', 1, '1535096295_front.webp.png', 'skincare', 'skincode'),
(87, 'FIRMING EYE ZONE GEL', 'Eye gel', 'A Velvety Eye Cream To Help Brighten, Smooth And Detoxify The Eye Contour Area.', '$37', 1, '8.SKINCODE-Firming-Eye-Zone-Gel.webp.png', 'skincare', 'skincode'),
(88, 'CELLULAR ANTI AGING CREAM', 'cream', 'A Deeply Nourishing Moisturizer That Amplifies The Collagen Production, While Repairing And Strengthening The Skin.', '43', 1, 'Cellular-Anti-Aging-Cream.png', 'skincare', 'skincode'),
(89, 'DESTINATION DREAM SKIN', 'set', 'Reveal Your Most Healthy, Beautiful Skin With This Skincode Essentials Kit Featuring The Bestselling Purifying Cleansing Gel', '54', 1, 'Skincode_Essentials_Kits_dream-destination-kit_1-1-300x300.png', 'skincare', 'skincode'),
(90, 'SWISS SKINCARE JEWELS ANTI-AGING COLLECTION', 'set', 'A Precious, Limited-Edition Collection Of Results-Driven Cellular Anti-Aging Products To Treat And Prevent All Signs Of Aging.', '$124', 1, 'Skincode_Exclusive_Kits_1283-Swiss-Skincare-Jewels-300x300.png', 'skincare', 'skincode'),
(100, 'Hydro Cloud Oil-Free Water Gel', 'water gel', 'Intense Hydration: It Gives Immediate And Long-Lasting Hydration To All Skin Levels. Thanks To The Natural Prebiotic, With Action Similar To Vitamin D', '18.80', 1, 'hydro-cloud-serum_a.png', 'skincare', 'youthlab'),
(102, 'C-Glow', 'serum', 'A Super-Light, Water-Like 15% Vitamin C + Extra Antioxidants (Ferulic Acid & A Smaller Amount Of Vitamin E) Formula To Give The Skin Environmental Protection, Boost Collagen & Even The Skin Tone.', '12.50', 1, 'CGlow-square-2023_360x.webp.png', 'skincare', 'geekandgorgeus'),
(103, 'B-BOMB', 'serum', 'Our Medium-Strong, Combination Skin Focused Exfoliant With 6% Mandelic Acid + BHA Works Both On The Surface Of The Skin And Inside The Pores To Clear & Balance The Complexion.', '8.50', 1, 'BBomb-square-2023_360x.webp.png', 'skincare', 'geekandgorgeus'),
(104, 'A-GAME 5', 'cream', 'A Silky, Light Emulsion Containing A Medium-Strength Amount Of Retinal To Help Against All Signs Of Aging, While Being Gentle On The Skin.', '13.8', 1, 'A-GAME-5-square_360x.webp.png', 'skincare', 'geekandgorgeus'),
(105, 'CHEER UP', 'cream', 'Our Medium-Strong, Combination Skin Focused Exfoliant With 6% Mandelic Acid + BHA Works Both On The Surface Of The Skin And Inside The Pores To Clear & Balance The Complexion.', '28.50', 1, 'cheer-up-square-2023_360x.webp.png', 'skincare', 'geekandgorgeus'),
(106, 'KEEP CALM KIT', 'set', 'A Universal Trio, Including A Gentle Cleanser, A Soothing Toner Spray, And A Skin-Plumping Hyaluronic Acid Serum, Suitable For All Skin Types And Skin Concerns. The Perfect Gift, If You Do Not Know The Skin Type Or Skincare Habits Of The Lucky Receiver.', '49', 1, 'Keep-Calm-Kit_360x.webp.PNG', 'skincare', 'geekandgorgeus'),
(107, 'Brightening Vit-C Gel Cream', 'Gel Cream', 'Brightening Vit-C Gel Cream Is A Non-Oily, Hydrating Cream Gel, With Stabilized L-Ascorbic Acid (Vitamin C) And “Water Gel” Technology', '23', 1, 'Brightening_vitC_gel-cream_Site-2.png', 'skincare', 'youthlab'),
(108, 'Retinol Reboot Mask – 1 Pc', 'Mask', 'A Tissue Mask For Immediate Tightening & Smoothing Of Deep-Set Wrinkles, While Moisturizing And Revealing An Even Skin Tone.', '8.50', 1, '5200142100506_1.png', 'skincare', 'youthlab'),
(109, 'Hydra-Gel Eye Patches – 60 Pcs.', ' eye Patches', 'This Serum Combines Concentrated 10% Pure Vitamin C, Salicylic Acid And Neurosensine For Optimal Effectiveness While Also Being Suitable For Sensitive Skin.	', '20', 1, 'eye-Patches-peptides_Site-award-3.png', 'skincare', 'youthlab');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `user_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_type` varchar(225) NOT NULL DEFAULT 'Admin, Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`user_id`, `name`, `email`, `password`, `user_type`) VALUES
(4, 'Tea', 'tea@gmail.com', '$2y$10$yaGTTYCTkemJSjF0bW3PeOqukj2Lh/4ROiEcOxCLDKGwuWCIOZPya', 'custumer'),
(5, 'admin', 'admin@gmail.com', '$2y$10$DXie.M8u6zmCzFmwks5vhO6uTxHzVJLIRbp1HjzWvIYjoHk9lG8h2', 'admin'),
(6, 'Ana', 'an66@gmail.com', '$2y$10$NVMRvQ9LxFWNJHx4PVmiU.5Hkjf0c2Cf73OHT55FCbMWwe8eu2W1i', 'user'),
(7, 'kl', 'kl@gmail.com', '$2y$10$2Cu971d3MJWvIykoqZYDhuXs5.vGEL1qJTllBMqS3MqSDiLEr4gjW', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`product_name`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`name`,`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
