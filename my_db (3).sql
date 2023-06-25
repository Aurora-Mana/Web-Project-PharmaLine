-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 08:51 PM
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
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
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
(2, 794242, 50, '2023-06-23', '2023-07-07'),
(4, 770633, 50, '2023-06-15', '2023-07-06'),
(5, 889720, 25, '2023-06-22', '2023-07-06'),
(8, 762037, 25, '2023-06-30', '2023-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(30, 'How To Use Cicaplast Baume B5', '   Created for dry, irritated, weakened, and sensitive skin, La Roche-Posay Cicaplast Baume B5 is a multi-repairing, fragrance-free balm that works quickly to soothe and nourish the skin. It’s a must-try for anyone with sensitive skin as the rich yet lightweight formula quickly reinforces the skin barrier and protects the epidermis from water loss and further irritation. \r\n\r\nAll skin types and people of all ages can use Cicaplast Baume B5. It is a great addition to any skincare routine for sensitive skin and safe for the whole family, including babies as young as six months old, as the formula has been tested under dermatological and pediatric control. The quick-absorbing and non-sticky balm can be used as a moisturizer for any skin type or as a spot treatment for eczema or irritated skin. There is no wrong way to use this safe and allergy-tested balm!\r\n\r\nCicaplast Baume B5 can be used once or twice a day, day or night, on cleansed skin. Apply a generous layer to the face, body, hands, or lips. It can also be applied to rough, cracked skin, diaper rash, or sensitive skin that’s prone to irritation and redness.', 'image/1687713367CICAPLAST_BAUME.jpg', '2023-06-25 16:01:52', 'PharmaLine', 1),
(31, 'Geek & Gorgeous 101 C-Glow Serum | Doctors Review', '  The Geek & Gorgeous 101 C-Glow Serum is a super-light, water-like 15% Vitamin C + extra antioxidants (Ferulic Acid & a smaller amount of Vitamin E) formula to give the skin environmental protection, boost collagen, and even the skin tone.\r\nWhat differentiates this serum from most is the color. It is absolutely clear, while other Vitamin C products often have a slight yellow tint. As background: Ascorbic Acid is pretty unstable, and when it oxidizes, it turns yellow. This is how you can tell that it is losing its efficacy, a product that has turned a deep yellow probably no longer has a lot of Vitamin C still active.\r\nAs the Geek and Gorgeous C-Glow Serum is made fresh on order, there is minimal oxidation once the product arrives as opposed to a product that has been sitting in store for a little while already.\r\nVitamin C serums are preferred to be used in the mornings, to get the most out of the antioxidant effects, but using it at night is of course possible as well. Against common belief, it can be paired with most other substances, which is a great detail when considering adding this serum to your routine.\r\n', 'image/1687713385GREEK&GORGEOUS_CGLOW.jpg', '2023-06-25 16:14:32', 'PharmaLine', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image`) VALUES
(11, 'CarA', 'Embrace elegance and sophistication with CarA, a luxurious vehicle that combines sleek design, advanced technology, and a smooth, comfortable ride.', 10000, 'A.jpg'),
(12, 'CarB', 'Unleash your inner thrill-seeker with CarB, a high-performance  car that offers lightning-fast acceleration, agile handling, and head-turning style.\r\n', 11000, 'B.jpg'),
(13, 'CarC', 'Stay eco-conscious and stylish on the road with CarC, an environmentally friendly compact car that features an electric motor, impressive fuel efficiency, and a modern, compact design.', 12000, 'C.jpg'),
(14, 'CarF', 'Discover versatility and ruggedness with CarI, a versatile vehicle that is built to tackle any adventure. With its all-terrain capabilities, spacious interior, and advanced safety features, it\'s ready for the great outdoors.\r\n', 13000, 'D.jpg'),
(15, 'CarI', 'Experience the perfect fusion of power and luxury with CarF, a premium vehicle that combines a powerful engine, refined craftsmanship, and cutting-edge technology for a truly immersive driving experience.\r\n', 14000, 'E.jpg'),
(16, 'CarM', 'Get ready to turn heads with CarM, a sleek and stylish vehicle that embodies elegance and performance. With its aerodynamic design, responsive handling, and luxurious interior, it\'s a true statement on wheels.\r\n', 15000, 'F.jpg'),
(17, 'CarN', 'Embrace practicality and reliability with CarN, a versatile car that offers ample space, fuel efficiency, and a host of safety features. It\'s designed to make your daily commutes and family trips comfortable and worry-free.', 16000, 'G.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_type` varchar(225) NOT NULL DEFAULT 'Admin, Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(4, 'Tea', 'tea@gmail.com', '$2y$10$yaGTTYCTkemJSjF0bW3PeOqukj2Lh/4ROiEcOxCLDKGwuWCIOZPya', 'custumer'),
(5, 'admin', 'admin@gmail.com', '$2y$10$DXie.M8u6zmCzFmwks5vhO6uTxHzVJLIRbp1HjzWvIYjoHk9lG8h2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
