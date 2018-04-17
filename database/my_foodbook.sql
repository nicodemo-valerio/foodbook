-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 17, 2018 at 11:57 PM
-- Server version: 5.6.33-log
-- PHP Version: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_foodbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `food` varchar(25) NOT NULL,
  `carb` float NOT NULL,
  `prot` float NOT NULL,
  `fat` float NOT NULL,
  `alcohol` float NOT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food`, `carb`, `prot`, `fat`, `alcohol`, `price`) VALUES
(1, 'Olive oil', 0, 0, 100, 0, 0.23),
(2, 'Milk UHT', 4.9, 3.4, 1.5, 0, 0.055),
(3, 'Cornstarch', 88, 0.3, 0.1, 0, 0.28),
(4, 'Egg', 0.8, 12.6, 9.9, 0, 0.431667),
(5, 'Sugar', 100, 0, 0, 0, 0.075),
(6, 'Pasta', 73, 14, 1, 0, 0.05),
(7, 'Asiago', 0.5, 23, 32.4, 0, 1.055),
(8, 'Apple', 12.8, 0.3, 0.1, 0, 0.1),
(9, 'Mustard', 7.5, 6.5, 6.2, 0, 0.23),
(11, 'Rice', 77, 8.2, 1, 0, 0.1),
(12, 'Chicken', 2.3, 16.8, 0.4, 0, 0.368),
(13, 'Tomato', 3.92, 0.88, 0.2, 0, 0.01),
(14, 'Onion', 8.6, 1.2, 0.2, 0, 0.01),
(15, 'Canned mackerel', 0, 25, 10, 0, 0.55),
(16, 'Grana Padano', 0, 33, 28, 0, 1.995),
(17, 'Beef lung', 0, 16.2, 2.5, 0, 0.003),
(18, 'Cabbage', 5.4, 1.4, 0.3, 0, 0.1),
(19, 'Wine 10.5%', 0, 0, 0, 10.5, 0.0796),
(20, 'Soy lecithin', 8, 0, 84, 0, 0),
(21, 'Banana', 22.8, 1.1, 0.3, 0, 0.1),
(22, 'Eggplant', 5.7, 1, 0.2, 0, 0.1),
(23, 'Frollini', 69.2, 9.9, 14.9, 0, 0.1),
(25, 'Persimmon', 18.6, 0.6, 0.2, 0, 0.1),
(26, 'Cocoa powder Ristora', 14.3, 22, 21, 0, 1.572),
(27, 'Bread', 52.4, 10.6, 2.6, 0, 0.1),
(28, 'Potato', 15.7, 1.7, 0.1, 0, 0.1),
(29, 'Butter', 0.7, 0.6, 83, 0, 0.516),
(30, 'Flour 00', 72.1, 10, 1, 0, 0.039),
(31, 'Chocolate Alpensi', 52, 6.8, 29, 0, 0.55),
(32, 'Chicken spring rolls', 11.12, 4.73, 4.07, 0, 0),
(33, 'Leek', 14.2, 1.5, 0.3, 0, 0.1),
(34, 'Radicchio', 1.6, 1.4, 0.1, 0, 0.1),
(35, 'Chayote', 6, 1.1, 0.2, 0, 0.1),
(36, 'Avocado', 9, 2, 15, 0, 0.1),
(37, 'Lemon', 9, 1.1, 0.3, 0, 0.4),
(38, 'Pumpkin', 6.5, 1, 0.1, 0, 0.2),
(39, 'Shallot', 16.8, 2.5, 0.1, 0, 0.1),
(40, 'Liver', 2.9, 19.9, 4.9, 0, 0.36),
(41, 'Mortadella', 5.49, 15.2, 24.59, 0, 0),
(42, 'Cream', 3, 2.3, 36, 0, 0.45),
(43, 'Wine 12%', 0, 0, 0, 12, 0.5),
(44, 'Canned tuna natural', 0, 25, 0.8, 0, 0.651316),
(45, 'Tramezzini bread', 45.5, 8.4, 3.6, 0, 0.396),
(46, 'Wurstel', 0, 15, 20, 0, 0.29),
(47, 'Rice Carnaroli Roncaia', 80.4, 6.7, 0.4, 0, 0.189),
(48, 'Vegetable stock', 0.4, 0.4, 0, 0, 0.129),
(49, 'Salt', 0, 0, 0, 0, 0.017),
(50, 'Ricotta', 5.1, 11.4, 7.9, 0, 0.22),
(51, 'Pear', 15.5, 0.4, 0.1, 0, 0.1),
(52, 'Nut', 13.71, 15.23, 65.21, 0, 0.5),
(53, 'Canned tuna in EVO', 0.8, 25, 0.65, 0, 0.61875),
(54, 'Pickled small onions', 0, 0, 0, 0, 0.237931),
(55, 'Salted peanuts prix', 20.6, 21.5, 44.3, 0, 0.359),
(56, 'Mozzarella for pizza', 1.4, 20.9, 17.6, 0, 0.4975),
(57, 'Water', 0, 0, 0, 0, 0.005),
(58, 'Dry yeast', 14.4, 41, 2.5, 0, 0.01),
(59, 'Lievito di birra', 38.2, 38.3, 4.6, 0, 0.1),
(60, 'Biscotti integrali Prix', 70, 7.3, 14.5, 0, 0.12),
(61, 'Jam Prix', 59, 0.4, 0.2, 0, 0.319),
(62, 'Self raising flour', 69.3, 10.4, 1.2, 0, 0.075),
(63, 'Sugar Homebrand', 100, 0, 0, 0, 0.09),
(64, 'Butter Homebrand', 1, 1, 83, 0, 0.6),
(65, 'Plain flour Homebrand', 70, 11, 1, 0, 0.075),
(66, 'Milk full cream powder', 5.2, 3.5, 3.9, 0, 0.0814286),
(67, 'Black beans dried', 38.4, 21.3, 0, 0, 0.6),
(68, 'Carrot', 9.58, 0.93, 0.24, 0, 0.049),
(69, 'Dark choc choceur', 33, 10.5, 39, 0, 1.145),
(70, 'Couscous Remano', 29.3, 5.4, 1.1, 0, 0.318),
(71, 'Corn kernels', 13.6, 2.4, 1.8, 0, 0.2),
(72, 'Arachidi fritte', 20.6, 21.5, 44.3, 0, 0.372),
(73, 'Zucchero di canna', 100, 0, 0, 0, 0.179),
(74, 'Farina 00', 72.1, 10, 1, 0, 0.035),
(75, 'Zucchero', 100, 0, 0, 0, 0.055),
(76, 'Burro', 0.7, 0.6, 83, 0, 0.756),
(77, 'Uova', 0.8, 12.6, 9.9, 0, 0.308),
(78, 'Roasted salted peanuts', 11, 26, 49, 0, 0.24),
(79, 'Ginger nut biscuits Aldi', 72, 5.7, 16, 0, 0.0833333),
(80, 'Cider', 0, 0, 0, 5, 0.199),
(81, 'Mozzarella', 2, 18, 20, 0, 0.46),
(82, 'Pomodori pelati', 5.5, 1.3, 0.1, 0, 0.1025),
(83, 'Farina manitoba', 71.8, 13.5, 1.4, 0, 0.069),
(84, 'Farina integrale', 55, 12, 3, 0, 0.089),
(85, 'Olio di semi', 0, 0, 100, 0, 0.169),
(86, 'Strutto', 0, 0, 100, 0, 0.632),
(87, 'Arancia candita', 71, 0.5, 0.5, 0, 1.22),
(88, 'Grano cotto', 12, 1.3, 0.5, 0, 0),
(89, 'Limone fresco', 9.32, 1.1, 0.3, 0, 0.168),
(90, 'Aroma fiori arancio', 0, 0, 0, 0, 24.25),
(91, 'Fegato pollo', 0.73, 16.92, 4.83, 0, 0.47),
(92, 'Mela', 12.8, 0.3, 0.1, 0, 0.139),
(93, 'Lievito chimico', 10.3, 0, 0, 0, 0.44),
(94, 'Panna UHT', 3.5, 2.5, 21, 0, 0.345),
(95, 'Cioccolato fondente 50', 52, 52, 29, 0, 0.49);

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE IF NOT EXISTS `meal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `portions` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `name`, `description`, `portions`, `user_id`) VALUES
(5, '20151130 dinner', 'Classic one day meal', 1, 1),
(6, '20151202 dinner', 'First day of 2000 kcal a day period', 1, 1),
(7, '20151203 dinner', 'None', 1, 1),
(8, '20151205 dinner', '2000k', 1, 1),
(9, '20151206 dinner', '2000k', 1, 1),
(11, '20151210 dinner', 'none', 1, 1),
(17, '20160713 dinner', '', 1, 1),
(13, 'Lunch', 'Italian lunch', 2, 3),
(14, 'Dinner', '', 2, 3),
(15, '20151214', '', 1, 1),
(16, '20151215 dinner', 'after swim', 1, 1),
(18, '20161003 dinner', '', 1, 1),
(19, '20161012 birthday dinner', '', 3, 1),
(20, '20161227', '', 1, 1),
(21, '2010111 dinner', '', 1, 1),
(22, '20170429 dinner', '', 1, 1),
(23, '20170907 dinner', 'At hotel', 1, 1),
(24, '20171010 dinner', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meal_food`
--

CREATE TABLE IF NOT EXISTS `meal_food` (
  `meal_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`food_id`,`meal_id`,`user_id`),
  KEY `meal_id` (`meal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_food`
--

INSERT INTO `meal_food` (`meal_id`, `food_id`, `quantity`, `user_id`) VALUES
(11, 1, 20, 1),
(6, 8, 150, 1),
(7, 8, 170, 1),
(8, 8, 150, 1),
(9, 8, 150, 1),
(11, 8, 150, 1),
(13, 8, 150, 0),
(6, 19, 900, 1),
(7, 19, 750, 1),
(8, 19, 1000, 1),
(11, 19, 1000, 1),
(15, 19, 1000, 1),
(6, 21, 50, 1),
(8, 21, 50, 1),
(9, 23, 200, 1),
(11, 23, 120, 1),
(15, 23, 150, 1),
(6, 25, 100, 1),
(7, 25, 150, 1),
(8, 25, 150, 1),
(9, 25, 150, 1),
(11, 25, 150, 1),
(11, 27, 200, 1),
(11, 28, 150, 1),
(6, 31, 150, 1),
(6, 32, 150, 1),
(11, 41, 150, 1),
(12, 43, 750, 1),
(17, 8, 150, 1),
(16, 19, 1000, 1),
(16, 25, 190, 1),
(16, 21, 40, 1),
(16, 23, 300, 1),
(17, 21, 100, 1),
(17, 19, 500, 1),
(18, 1, 6, 1),
(18, 14, 50, 1),
(18, 22, 150, 1),
(18, 13, 150, 1),
(18, 19, 1000, 1),
(18, 12, 100, 1),
(18, 15, 70, 1),
(18, 8, 50, 1),
(18, 21, 50, 1),
(20, 67, 180, 1),
(20, 17, 145, 1),
(20, 1, 10, 1),
(20, 14, 50, 1),
(20, 38, 150, 1),
(20, 18, 100, 1),
(20, 19, 500, 1),
(20, 8, 150, 1),
(20, 68, 100, 1),
(21, 8, 100, 1),
(21, 0, 0, 1),
(21, 21, 50, 1),
(21, 19, 1000, 1),
(22, 72, 107, 1),
(22, 7, 30, 1),
(22, 21, 50, 1),
(22, 8, 100, 1),
(22, 68, 200, 1),
(22, 18, 200, 1),
(22, 47, 80, 1),
(22, 1, 6, 1),
(22, 19, 1000, 1),
(22, 23, 142, 1),
(22, 17, 150, 1),
(23, 80, 1000, 1),
(23, 78, 200, 1),
(23, 79, 300, 1),
(24, 38, 400, 1),
(24, 11, 80, 1),
(24, 1, 10, 1),
(24, 12, 180, 1),
(24, 7, 30, 1),
(24, 21, 100, 1),
(24, 8, 60, 1),
(24, 19, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meal_recipe`
--

CREATE TABLE IF NOT EXISTS `meal_recipe` (
  `meal_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`recipe_id`,`meal_id`,`user_id`),
  KEY `meal_id` (`meal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_recipe`
--

INSERT INTO `meal_recipe` (`meal_id`, `recipe_id`, `user_id`) VALUES
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(8, 1, 1),
(9, 1, 1),
(11, 1, 1),
(17, 1, 1),
(18, 1, 1),
(20, 1, 1),
(21, 1, 1),
(22, 1, 1),
(24, 1, 1),
(6, 28, 1),
(6, 31, 1),
(7, 32, 1),
(8, 33, 1),
(9, 35, 1),
(11, 44, 1),
(12, 45, 1),
(14, 45, 3),
(12, 46, 1),
(14, 46, 3),
(12, 47, 1),
(13, 53, 3),
(13, 54, 3),
(15, 55, 1),
(15, 57, 1),
(16, 58, 1),
(17, 61, 1),
(18, 64, 1),
(18, 65, 1),
(19, 65, 1),
(19, 68, 1),
(20, 74, 1),
(21, 74, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) NOT NULL,
  `description` text,
  `date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`, `description`, `date`, `user_id`) VALUES
(1, '2015-11-30', '2015-11-30', '2015-11-30', 1),
(2, '2015-12-05', '2015-12-05', '2015-12-05', 1),
(3, '2015-12-08', '', '2015-12-08', 1),
(4, '2015-12-07', '', '2015-12-07', 1),
(7, 'Sample menu', '', '2015-12-14', 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu_meal`
--

CREATE TABLE IF NOT EXISTS `menu_meal` (
  `menu_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`,`meal_id`),
  KEY `fk_meal_id` (`meal_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_meal`
--

INSERT INTO `menu_meal` (`menu_id`, `meal_id`) VALUES
(1, 5),
(2, 8),
(3, 9),
(4, 9),
(6, 12),
(7, 13),
(7, 14);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `instructions` text,
  `portions` int(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `instructions`, `portions`, `user_id`, `weight`) VALUES
(1, 'Pastry cream light', 'In a microwave proof bowl, mix egg, sugar and cornstarch until the mixture is smooth.\r\nWhisk in the milk.\r\nMicrowave for 2 minutes at maximum power. Mix again. Microwave at 30 seconds intervals until desired consistency.\r\n', 1, 1, 350),
(2, 'Mackerel and cabbage pasta', 'Dice onion, tomatoes and asiago. Blend mackerel. Warm oil in low heat, stir in onion, cook until translucent (3 min). Add tomatoes. Bring 1 litre of water with 10 grams of salt to boil. Cook pasta until al dente. Stir pasta, mackerel and cheese on the tomato sauce for 1 minute. Serve hot.', 1, 1, 1),
(28, 'Mackerel, braised cabbage', 'None', 1, 1, 1),
(29, 'Basic fruit cake', 'Mash', 8, 1, 1100),
(30, 'Mashed potatoes', 'Insert here the recipe', 1, 1, 380),
(31, 'Mashed potatoes light', 'Insert here the recipe', 1, 1, 1),
(32, 'Beef lung, mackerel, leek, salad, rice, noodles, lecithin', 'Insert here the recipe', 1, 1, 1),
(33, 'Beef lung, mackerel, chayote, avocado pasta', 'Insert here the recipe', 1, 1, 675),
(34, 'Avocado puree', 'Insert here the recipe', 1, 1, 1),
(35, 'Pumpkin risotto, beef lung', 'Insert here the recipe', 1, 1, 1),
(44, 'Liver radicchio risotto', 'Insert here the recipe', 1, 1, 486),
(45, 'Pumpkin risotto for 12', '', 12, 3, 4500),
(46, 'Lemon tart (Heston Blumenthal)', 'Using a mixer fitted with a paddle attachment, mix the flour, butter (150 g) and salt on low speed until it becomes a sand like texture (approximately 2-3 minutes).<br>\r\n2. In the meantime, in a tall container blitz together the icing sugar(190 g)  and 3 egg yolks with a hand blender.<br>\r\n3. Add the vanilla seeds and lemon zest to the egg yolk mixture and then add to the bowl in the mixer and continue to mix on low speed until fully combined and a very soft dough has formed (approximately 3-5 minutes).<br>\r\n4. Mould the dough into a flat rectangle and wrap it in clingfilm before placing in the fridge for at least 1 hour.<br>\r\n5. Roll the pastry between two sheets of baking paper to a thickness of 2mm, using two stacked 2 pence coins as guides, then place in the freezer for 30 minutes.<br>\r\n6. Pre-heat the oven to 190oC/gas mark 5. Line a 26cm tart tin (2.5cm deep) with the pastry making sure to press it into the edges and leaving the pastry hanging over the edge.<br>\r\n7. Take a sheet of baking paper and scrunch it up several times to eliminate any sharp edges. Prick the dough with a fork all over the surface. Place the baking paper on top and add enough coins (or baking beans) to fill the casing 1?4 of the way up. Place in the preheated oven to bake for approximately 20 minutes or until fully cooked.<br>\r\n8. In the meantime, mix some of the leftover dough with an egg using a hand blender.<br>\r\n9. After 20 minutes, remove the baking paper and coins and, using a pastry brush, brush the entire surface of the tart with the dough and egg mixture. This ‘liquid pastry’ will ensure that any holes will be sealed. Return the tart to the oven for an additional 10 minutes.<br>\r\n10. Remove the tart from the oven and allow to cool completely.<br>\r\n11. When ready to bake, preheat the oven to 120oC/gas mark 1?2. Place the baked pastry case in the oven to warm up.<br>\r\n12. Put all the filling ingredients into a bowl and mix together using a spatula. Place the bowl over a saucepan of simmering water and allow to warm up until the temperature reaches 60oC. At this point, strain the mixture through a fine sieve into a jug. With a spoon, remove the bubbles from the surface of the liquid.<br>\r\n13. Slide the oven rack out a bit, then pour the mixture into the warm pastry case inside the oven. Fill the case to the top, slide the rack carefully back in, and bake the tart for approximately 25 minutes or until the temperature of the filling reaches 70oC. Allow to cool completely at room temperature.<br>\r\n14. Just before serving, trim the overhanging pastry by running a sharp knife round the top of the tart tin and discard.', 12, 3, 2000),
(47, 'Tramezzini', 'Insert here the recipe', 12, 1, 1255),
(53, 'Tomato pasta', 'Bring 1 litre of water with 10 grams of salt to a boil. Dice the onion and the tomatoes. In a sautee pan, sweat the onion in the oil. Stir in the tomatoes and season. Cook pasta al dente. Stir the pasta in the sauce and cook for another minute. Stir in the Grana. Serve.', 2, 3, 750),
(54, 'Chicken with roasted potatoes', '', 2, 3, 610),
(55, 'Pasta chicken cabbage', '', 1, 1, 598),
(56, 'Pumpkin risotto for 12', '', 12, 1, 4500),
(60, 'Apple muffins', 'Preheat the oven to 180C. Prepare muffin tray or cake tin. Melt butter and milk. Dice apples. Blend 200 g of apples and 3 eggs. Sift sugar, baking soda, flour and a pinch of salt in a bowl. Mix liquids into dry ingredients with remaining 200 g of apples. Fill muffin trays or cake tin. Bake for about 30 minutes until golden. Cool on a rack. Enjoy. :)\r\nVideo recipe <a href="https://youtu.be/9zIe5QYXqTc">here</a>', 18, 3, 1100),
(61, 'Gnocchi with fish and veggies', '', 1, 1, 800),
(62, 'Potato gnocchi', '', 2, 1, 400),
(63, 'Peanut butter cake', 'All ingredient in a mixer. Bake 180C 30 min.', 1, 1, 300),
(64, 'Cocoa cake ASI', '', 16, 1, 680),
(65, 'Pizza for 6', '', 6, 1, 1200),
(66, 'Cocoa cake', '', 16, 1, 1310),
(67, 'Sponge cake', '', 8, 1, 595),
(68, 'Layer cake ver 1', '', 12, 1, 1510),
(69, 'Cocoa salami', 'Melt butter. Crush biscotti. Mix egg and sugar. Mix in butter, cocoa and biscotti. Shape and freeze.', 12, 1, 600),
(70, 'Layer cake ver 2', '', 12, 1, 2400),
(71, 'Banana bread', 'Preheat oven to 180°C. Grease 8 x 1/2 cup (125ml) mini loaf pans. Combine the flour and sugar in a large bowl.\r\n\r\nWhisk the butter and eggs together. Add to the flour mixture with the banana and mix until well combined.\r\n\r\nSpoon the cake batter evenly among the greased pans. Use the back of a spoon to smooth the surface. Bake for 18-20 minutes or until a skewer inserted into the centre comes out clean. Set aside for 5 minutes before turning out onto a wire rack to cool completely.\r\n<br/>\r\nOnce cooled completely, mix the icing sugar with enough water to make an icing thin enough to pour. Drizzle the icing over the cakes and set aside to set.', 8, 1, 700),
(72, 'Vanilla butter cookies', '', 50, 1, 800),
(77, 'Corn mini loaves', '', 12, 1, 1089),
(78, 'Besciamella', '', 1, 1, 260),
(79, 'Choc chip cookies chefsteps', '', 30, 1, 1200),
(80, 'Choc chip cookies tasty', '', 20, 1, 807),
(81, 'Choc chip cookies fast', '', 15, 1, 750),
(82, 'Pizza', '', 4, 1, 1181),
(83, 'Pizza Renato Bosco short', '', 6, 1, 1400),
(84, 'Pane integrale', '', 9, 1, 1000),
(85, 'Pane bianco', '', 9, 1, 1000),
(86, 'Pasta frolla olio', '', 10, 1, 500),
(87, 'Biscotti integrali', '', 6, 1, 500),
(88, 'Biscotti integrali 1 kg', '', 21, 1, 1060),
(89, 'Pastiera napoletana GZ', '', 12, 1, 1850),
(90, 'Pate fegato pollo', '', 20, 1, 842),
(91, 'Pasta frolla 1 uovo', '', 12, 1, 500),
(92, 'Dinner rolls ita', '', 10, 1, 831),
(58, 'Potatoes chicken salad', '', 1, 1, 581),
(59, 'Salame di cioccopere', '', 4, 1, 400),
(73, 'Apple loaves', '', 8, 1, 690),
(74, 'Pancakes', '', 1, 1, 235),
(75, 'Banana choc loaves', '', 12, 1, 1000),
(76, 'Corn choc loaves', '', 12, 1, 1000),
(93, 'Torta di mele', '', 8, 1, 850),
(94, 'Mou', '', 16, 1, 190),
(95, 'Torta Giulio Knam', '', 16, 1, 1435),
(96, 'Torta Antica Knam', '', 16, 1, 1666),
(97, 'Pancakes 4 eggs', '', 8, 1, 960),
(98, 'Torta cacao', '', 12, 1, 700),
(99, 'Pizza impasto', '', 4, 1, 815),
(100, 'Torta all acqua', '', 8, 1, 850),
(101, 'Impasto pizza Civitiello', '', 6, 1, 1412),
(102, 'Torta cacao all acqua', '', 8, 1, 440),
(103, 'Torta al vapore', '', 8, 1, 440),
(104, 'Torta carote', '', 16, 1, 840);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_food`
--

CREATE TABLE IF NOT EXISTS `recipe_food` (
  `food_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`food_id`,`recipe_id`,`user_id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_food`
--

INSERT INTO `recipe_food` (`food_id`, `recipe_id`, `quantity`, `user_id`) VALUES
(1, 2, 6, 1),
(1, 28, 6, 1),
(1, 34, 6, 1),
(1, 35, 6, 1),
(1, 44, 6, 1),
(1, 45, 72, 3),
(1, 47, 300, 1),
(1, 53, 12, 3),
(1, 54, 10, 3),
(1, 55, 6, 1),
(2, 1, 250, 1),
(2, 29, 120, 1),
(2, 30, 50, 1),
(2, 31, 50, 1),
(3, 1, 20, 1),
(4, 1, 55, 1),
(4, 29, 120, 1),
(4, 46, 715, 1),
(4, 47, 55, 1),
(5, 1, 40, 1),
(5, 29, 180, 1),
(5, 34, 6, 1),
(5, 46, 510, 1),
(6, 2, 80, 1),
(6, 33, 80, 1),
(6, 53, 150, 3),
(6, 55, 75, 1),
(8, 29, 400, 1),
(11, 32, 80, 1),
(11, 35, 80, 1),
(11, 44, 80, 1),
(12, 54, 300, 3),
(12, 55, 160, 1),
(13, 53, 400, 3),
(14, 2, 50, 1),
(14, 28, 50, 1),
(14, 33, 50, 1),
(14, 45, 360, 3),
(14, 53, 60, 3),
(14, 55, 50, 1),
(15, 2, 150, 1),
(15, 28, 150, 1),
(15, 32, 50, 1),
(15, 33, 75, 1),
(16, 45, 250, 3),
(16, 53, 60, 3),
(17, 32, 100, 1),
(17, 33, 75, 1),
(17, 35, 150, 1),
(18, 2, 250, 1),
(18, 28, 350, 1),
(18, 55, 200, 1),
(19, 45, 180, 3),
(20, 2, 12, 1),
(20, 31, 12, 1),
(20, 32, 12, 1),
(20, 35, 12, 1),
(20, 44, 12, 1),
(20, 55, 7, 1),
(28, 30, 300, 1),
(28, 31, 400, 1),
(28, 54, 300, 3),
(29, 29, 100, 1),
(29, 30, 75, 1),
(29, 45, 150, 3),
(29, 46, 150, 1),
(30, 29, 400, 1),
(30, 46, 300, 1),
(33, 32, 160, 1),
(34, 32, 120, 1),
(34, 33, 70, 1),
(34, 44, 200, 1),
(35, 33, 275, 1),
(36, 33, 50, 1),
(36, 34, 176, 1),
(37, 46, 300, 1),
(38, 35, 350, 1),
(38, 45, 1200, 3),
(39, 35, 50, 1),
(39, 44, 50, 1),
(40, 44, 150, 1),
(42, 46, 300, 1),
(42, 55, 100, 1),
(44, 47, 300, 1),
(45, 47, 500, 1),
(46, 47, 100, 1),
(47, 45, 1000, 3),
(48, 45, 1000, 3),
(1, 58, 6, 1),
(14, 58, 50, 1),
(28, 58, 185, 1),
(34, 58, 200, 1),
(12, 58, 140, 1),
(42, 58, 40, 1),
(20, 58, 10, 1),
(5, 59, 40, 1),
(52, 59, 50, 1),
(26, 59, 10, 1),
(50, 59, 80, 1),
(31, 59, 120, 1),
(51, 59, 100, 1),
(8, 60, 400, 3),
(29, 60, 80, 3),
(2, 60, 100, 3),
(4, 60, 135, 3),
(30, 60, 400, 3),
(5, 60, 180, 3),
(18, 61, 350, 1),
(1, 61, 6, 1),
(14, 61, 50, 1),
(15, 61, 150, 1),
(7, 61, 30, 1),
(28, 62, 300, 1),
(30, 62, 100, 1),
(28, 61, 150, 1),
(30, 61, 50, 1),
(4, 63, 55, 1),
(29, 63, 66, 1),
(30, 63, 66, 1),
(5, 63, 66, 1),
(55, 63, 66, 1),
(30, 64, 250, 1),
(26, 64, 10, 1),
(4, 64, 165, 1),
(5, 64, 130, 1),
(50, 64, 250, 1),
(30, 65, 480, 1),
(57, 65, 278, 1),
(1, 65, 10, 1),
(59, 65, 9.6, 1),
(58, 65, 4.2, 1),
(13, 65, 300, 1),
(56, 65, 300, 1),
(29, 66, 250, 1),
(5, 66, 260, 1),
(0, 66, 0, 1),
(50, 66, 250, 1),
(30, 66, 450, 1),
(26, 66, 50, 1),
(4, 66, 300, 1),
(4, 67, 250, 1),
(5, 67, 175, 1),
(3, 67, 50, 1),
(30, 67, 150, 1),
(4, 68, 250, 1),
(5, 68, 220, 1),
(30, 68, 150, 1),
(3, 68, 50, 1),
(2, 68, 100, 1),
(50, 68, 400, 1),
(55, 68, 40, 1),
(60, 68, 40, 1),
(61, 68, 360, 1),
(29, 69, 100, 1),
(4, 69, 100, 1),
(5, 69, 100, 1),
(26, 69, 50, 1),
(60, 69, 250, 1),
(4, 70, 350, 1),
(5, 70, 340, 1),
(29, 70, 250, 1),
(50, 70, 250, 1),
(26, 70, 50, 1),
(30, 70, 450, 1),
(8, 70, 300, 1),
(3, 70, 40, 1),
(2, 70, 500, 1),
(62, 71, 190, 1),
(63, 71, 115, 1),
(4, 71, 110, 1),
(64, 71, 125, 1),
(21, 71, 200, 1),
(64, 72, 250, 1),
(63, 72, 160, 1),
(62, 72, 230, 1),
(65, 72, 200, 1),
(8, 73, 200, 1),
(62, 73, 200, 1),
(5, 73, 85, 1),
(29, 73, 100, 1),
(59, 73, 1, 1),
(4, 73, 110, 1),
(66, 73, 50, 1),
(62, 74, 80, 1),
(4, 74, 55, 1),
(66, 74, 17, 1),
(57, 74, 100, 1),
(5, 74, 2, 1),
(62, 75, 285, 1),
(64, 75, 150, 1),
(63, 75, 173, 1),
(66, 75, 6, 1),
(57, 75, 40, 1),
(4, 75, 150, 1),
(21, 75, 200, 1),
(69, 75, 100, 1),
(62, 76, 285, 1),
(64, 76, 150, 1),
(63, 76, 173, 1),
(66, 76, 6, 1),
(57, 76, 40, 1),
(4, 76, 150, 1),
(71, 76, 200, 1),
(69, 76, 100, 1),
(62, 77, 285, 1),
(63, 77, 173, 1),
(64, 77, 150, 1),
(66, 77, 6, 1),
(57, 77, 40, 1),
(71, 77, 285, 1),
(4, 77, 150, 1),
(29, 78, 20, 1),
(30, 78, 20, 1),
(2, 78, 250, 1),
(29, 79, 220, 1),
(5, 79, 180, 1),
(0, 79, 0, 1),
(4, 79, 100, 1),
(31, 79, 300, 1),
(30, 79, 400, 1),
(73, 79, 200, 1),
(5, 80, 112, 1),
(73, 80, 150, 1),
(29, 80, 113, 1),
(30, 80, 156, 1),
(4, 80, 50, 1),
(31, 80, 226, 1),
(75, 81, 100, 1),
(73, 81, 100, 1),
(77, 81, 50, 1),
(74, 81, 200, 1),
(76, 81, 100, 1),
(31, 81, 200, 1),
(74, 82, 480, 1),
(57, 82, 288, 1),
(5, 82, 5, 1),
(59, 82, 8, 1),
(82, 82, 200, 1),
(81, 82, 200, 1),
(74, 83, 500, 1),
(57, 83, 300, 1),
(1, 83, 12, 1),
(49, 83, 12, 1),
(59, 83, 5, 1),
(81, 83, 300, 1),
(82, 83, 400, 1),
(84, 84, 360, 1),
(83, 84, 360, 1),
(57, 84, 432, 1),
(49, 84, 14, 1),
(59, 84, 5, 1),
(74, 85, 720, 1),
(57, 85, 432, 1),
(59, 85, 5, 1),
(49, 85, 14, 1),
(4, 86, 70, 1),
(74, 86, 300, 1),
(75, 86, 100, 1),
(85, 86, 100, 1),
(4, 87, 70, 1),
(75, 87, 100, 1),
(84, 87, 100, 1),
(74, 87, 200, 1),
(85, 87, 100, 1),
(75, 88, 200, 1),
(77, 88, 150, 1),
(74, 88, 400, 1),
(84, 88, 200, 1),
(85, 88, 200, 1),
(74, 89, 315, 1),
(86, 89, 210, 1),
(75, 89, 485, 1),
(77, 89, 210, 1),
(88, 89, 350, 1),
(2, 89, 250, 1),
(89, 89, 10, 1),
(87, 89, 100, 1),
(90, 89, 2, 1),
(91, 90, 357, 1),
(14, 90, 50, 1),
(39, 90, 140, 1),
(43, 90, 50, 1),
(4, 90, 100, 1),
(76, 90, 145, 1),
(76, 91, 125, 1),
(75, 91, 100, 1),
(77, 91, 45, 1),
(74, 91, 250, 1),
(76, 92, 74, 1),
(2, 92, 250, 1),
(75, 92, 50, 1),
(59, 92, 7, 1),
(83, 92, 450, 1),
(77, 92, 55, 1),
(92, 93, 250, 1),
(76, 93, 125, 1),
(74, 93, 250, 1),
(75, 93, 130, 1),
(77, 93, 150, 1),
(93, 93, 16, 1),
(76, 94, 90, 1),
(75, 94, 100, 1),
(94, 94, 100, 1),
(95, 95, 300, 1),
(94, 95, 300, 1),
(75, 95, 250, 1),
(76, 95, 240, 1),
(77, 95, 45, 1),
(74, 95, 270, 1),
(26, 95, 30, 1),
(76, 96, 200, 1),
(75, 96, 200, 1),
(77, 96, 75, 1),
(49, 96, 3, 1),
(93, 96, 8, 1),
(74, 96, 200, 1),
(84, 96, 200, 1),
(61, 96, 280, 1),
(95, 96, 300, 1),
(94, 96, 200, 1),
(30, 97, 320, 1),
(77, 97, 200, 1),
(2, 97, 400, 1),
(75, 97, 20, 1),
(93, 97, 16, 1),
(49, 97, 4, 1),
(77, 98, 100, 1),
(2, 98, 100, 1),
(50, 98, 250, 1),
(85, 98, 60, 1),
(26, 98, 25, 1),
(74, 98, 225, 1),
(93, 98, 15, 1),
(74, 99, 500, 1),
(59, 99, 5, 1),
(57, 99, 300, 1),
(49, 99, 10, 1),
(74, 100, 300, 1),
(93, 100, 16, 1),
(75, 100, 200, 1),
(57, 100, 330, 1),
(85, 100, 90, 1),
(57, 101, 500, 1),
(74, 101, 850, 1),
(49, 101, 25, 1),
(59, 101, 2, 1),
(75, 101, 10, 1),
(1, 101, 25, 1),
(75, 102, 100, 1),
(57, 102, 165, 1),
(85, 102, 45, 1),
(26, 102, 20, 1),
(74, 102, 130, 1),
(93, 102, 8, 1),
(75, 103, 100, 1),
(57, 103, 165, 1),
(85, 103, 45, 1),
(30, 103, 150, 1),
(93, 103, 8, 1),
(77, 104, 110, 1),
(85, 104, 60, 1),
(2, 104, 90, 1),
(68, 104, 250, 1),
(75, 104, 130, 1),
(74, 104, 250, 1),
(93, 104, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `weight_goal` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `height`, `weight`, `weight_goal`) VALUES
(1, 'ironico', 'nicodemovalerio@gmail.com', 'valerio', 178, 66.6, 66.6),
(2, 'publicuser', 'pu@gmail.com', 'pupwd', 1.78, 69, NULL),
(3, 'Guest', 'guest@foodbook.com', 'guest', 178, 75, 67),
(4, 'servosterzo', 'fabio.servi.78@gmail.com', 'nicodemo2015', 193, 81, 79),
(5, 'btn', 'btn@gmail.com', 'btn', 1.78, 69, 69);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
