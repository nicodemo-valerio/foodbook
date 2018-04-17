-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2015 at 06:52 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
`id` int(11) NOT NULL,
  `food` varchar(25) NOT NULL,
  `carb` float NOT NULL,
  `prot` float NOT NULL,
  `fat` float NOT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food`, `carb`, `prot`, `fat`, `price`) VALUES
(1, 'Olive oil', 0, 0, 100, 0.23),
(2, 'Milk UHT', 4.9, 3.4, 1.5, 0.055),
(3, 'Cornstarch', 88, 0.3, 0.1, 0.28),
(4, 'Egg', 0.8, 12.6, 9.9, 0.23),
(5, 'Sugar', 100, 0, 0, 0.05),
(6, 'Pasta', 73, 14, 1, 0.05),
(7, 'Asiago', 0.5, 23, 32.4, 0.55),
(8, 'Apple', 12.8, 0.3, 0.1, 0.08),
(9, 'Mustard', 7.5, 6.5, 6.2, 0.23),
(11, 'Rice', 77, 8.2, 1, 0.05),
(12, 'Chicken', 2.3, 16.8, 0.4, 0.368),
(13, 'Tomato', 3.92, 0.88, 0.2, 0.01),
(14, 'Onion', 8.6, 1.2, 0.2, 0.01),
(15, 'Canned mackerel', 0, 25, 10, 0.55),
(16, 'Grana Padano', 0, 33, 28, 10),
(17, 'Beef lung', 0, 16.2, 2.5, 0.003),
(18, 'Cabbage', 5.4, 1.4, 0.3, 0.1),
(19, 'Wine', 18, 0, 0, 0.00796),
(20, 'Soy lecithin', 8, 0, 84, 0),
(21, 'Banana', 22.8, 1.1, 0.3, 0.1),
(22, 'Eggplant', 5.7, 1, 0.2, 0.1),
(23, 'Frollini', 69.2, 9.9, 14.9, 0.1),
(24, 'Cotechino', 0, 20.6, 34.1, 0),
(25, 'Persimmon', 18.6, 0.6, 0.2, 0.1),
(26, 'Cocoa powder Ristora', 14.3, 22, 21, 0),
(27, 'Bread', 52.4, 10.6, 2.6, 0.1),
(28, 'Potato', 15.7, 1.7, 0.1, 0.1),
(29, 'Butter', 0.7, 0.6, 83, 0.516),
(30, 'Flour', 72.1, 10, 1, 0.039);

-- --------------------------------------------------------

--
-- Table structure for table `food_recipe`
--

CREATE TABLE `food_recipe` (
  `food_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_recipe`
--

INSERT INTO `food_recipe` (`food_id`, `recipe_id`, `quantity`, `user_id`) VALUES
(1, 2, 6, 1),
(1, 21, 12, 1),
(1, 22, 6, 1),
(1, 23, 12, 1),
(1, 28, 6, 1),
(2, 1, 250, 1),
(2, 24, 125, 1),
(2, 29, 120, 1),
(2, 30, 50, 1),
(2, 31, 50, 1),
(3, 1, 20, 1),
(4, 1, 55, 1),
(4, 23, 200, 1),
(4, 24, 55, 1),
(4, 29, 110, 1),
(5, 1, 40, 1),
(5, 24, 10, 1),
(5, 26, 50, 1),
(5, 29, 180, 1),
(6, 2, 80, 1),
(6, 21, 150, 1),
(6, 27, 60, 1),
(8, 26, 150, 1),
(8, 27, 150, 1),
(8, 29, 400, 1),
(11, 22, 50, 1),
(11, 26, 55, 1),
(12, 27, 180, 1),
(13, 21, 400, 1),
(14, 2, 50, 1),
(14, 21, 100, 1),
(14, 22, 50, 1),
(14, 26, 50, 1),
(14, 27, 50, 1),
(14, 28, 50, 1),
(15, 2, 150, 1),
(15, 22, 50, 1),
(15, 26, 130, 1),
(15, 28, 150, 1),
(16, 21, 60, 1),
(17, 22, 100, 1),
(18, 2, 250, 1),
(18, 22, 250, 1),
(18, 27, 310, 1),
(18, 28, 300, 1),
(19, 26, 500, 1),
(20, 2, 12, 1),
(20, 26, 12, 1),
(20, 27, 12, 1),
(20, 31, 12, 1),
(21, 27, 100, 1),
(22, 26, 200, 1),
(23, 27, 500, 1),
(24, 26, 40, 1),
(25, 26, 350, 1),
(26, 26, 50, 1),
(27, 26, 300, 1),
(28, 30, 300, 1),
(28, 31, 400, 1),
(29, 24, 10, 1),
(29, 29, 100, 1),
(29, 30, 75, 1),
(30, 29, 400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `portions` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `name`, `description`, `portions`, `user_id`) VALUES
(1, 'Dinner with fish-based main course and a dessert', '', 1, 1),
(3, 'Italian lunch', 'classic', 1, 1),
(4, 'French dinner', 'Classic', 1, 1),
(5, '20151130 dinner', 'Classic one day meal', 1, 1),
(6, '20151202 dinner', 'First day of 2000 kcal a day period', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meal_food`
--

CREATE TABLE `meal_food` (
  `meal_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_food`
--

INSERT INTO `meal_food` (`meal_id`, `food_id`, `quantity`, `user_id`) VALUES
(3, 1, 9, 1),
(4, 7, 50, 1),
(1, 8, 250, 1),
(3, 8, 250, 1),
(6, 8, 250, 1),
(3, 12, 150, 1),
(3, 18, 200, 1),
(6, 19, 750, 1),
(6, 21, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meal_recipe`
--

CREATE TABLE `meal_recipe` (
  `meal_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_recipe`
--

INSERT INTO `meal_recipe` (`meal_id`, `recipe_id`, `user_id`) VALUES
(1, 1, 1),
(1, 2, 1),
(3, 21, 1),
(4, 23, 1),
(4, 30, 1),
(5, 1, 1),
(5, 27, 1),
(6, 1, 1),
(6, 28, 1),
(6, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `instructions` text,
  `portions` int(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `instructions`, `portions`, `user_id`) VALUES
(1, 'Pastry cream light', 'In a microwave proof bowl, mix egg, sugar and cornstarch until the mixture is smooth.\r\nWhisk in the milk.\r\nMicrowave for 2 minutes at maximum power. Mix again. Microwave at 30 seconds intervals until desired consistency.\r\n', 1, 1),
(2, 'Mackerel and cabbage pasta', 'Dice onion, tomatoes and asiago. Blend mackerel. Warm oil in low heat, stir in onion, cook until translucent (3 min). Add tomatoes. Bring 1 litre of water with 10 grams of salt to boil. Cook pasta until al dente. Stir pasta, mackerel and cheese on the tomato sauce for 1 minute. Serve hot.', 1, 1),
(21, 'Tomato pasta', 'Insert here the recipe', 2, 1),
(22, 'Rice meal', 'Insert here the recipe', 1, 1),
(23, 'Omelette', 'Insert here the recipe', 2, 1),
(24, 'Crepes', 'Insert here the recipe', 1, 1),
(26, '20151129', 'Insert here the recipe', 1, 1),
(27, '20151130', 'Insert here the recipe', 1, 1),
(28, 'Mackerel, braised cabbage, mashed potatoes', 'Cook', 1, 1),
(29, 'Basic fruit cake', 'Mash', 8, 1),
(30, 'Mashed potatoes', 'Insert here the recipe', 1, 1),
(31, 'Mashed potatoes light', 'Insert here the recipe', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `height`, `weight`) VALUES
(1, 'ironico', 'nicodemovalerio@gmail.com', 'valerio', 1.78, 66.6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_recipe`
--
ALTER TABLE `food_recipe`
 ADD PRIMARY KEY (`food_id`,`recipe_id`,`user_id`), ADD KEY `recipe_id` (`recipe_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `meal_food`
--
ALTER TABLE `meal_food`
 ADD PRIMARY KEY (`food_id`,`meal_id`,`user_id`), ADD KEY `meal_id` (`meal_id`);

--
-- Indexes for table `meal_recipe`
--
ALTER TABLE `meal_recipe`
 ADD PRIMARY KEY (`recipe_id`,`meal_id`,`user_id`), ADD KEY `meal_id` (`meal_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_recipe`
--
ALTER TABLE `food_recipe`
ADD CONSTRAINT `food_recipe_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `food_recipe_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `food_recipe_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meal`
--
ALTER TABLE `meal`
ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meal_food`
--
ALTER TABLE `meal_food`
ADD CONSTRAINT `meal_food_ibfk_1` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `meal_food_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meal_recipe`
--
ALTER TABLE `meal_recipe`
ADD CONSTRAINT `meal_recipe_ibfk_1` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `meal_recipe_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
