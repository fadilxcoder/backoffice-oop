-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 05:58 PM
-- Server version: 5.7.14
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop_backoffice`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `_id` int(11) NOT NULL,
  `_name` text NOT NULL,
  `_username` text NOT NULL,
  `_password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`_id`, `_name`, `_username`, `_password`) VALUES
(1, 'fadilxcoder', 'fadil@xcoder.developer', 'F5d1278e8109edd94e1e4197e04873b9'),
(2, 'Administrator', 'admin@panel.client', 'a2b689a85608597aa26f962b34e398b2'),
(3, 'fadilxcoder', 'fadil@xcoder.developer', 'f5d1278e8109edd94e1e4197e04873b9'),
(4, 'fadilxcoder', 'fadil@xcoder.developer', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'fadilxcoder', 'fadil@xcoder.developer', 'a2b689a85608597aa26f962b34e398b2');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `ordering` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `ordering`) VALUES
(1, 'Category #1', 1),
(2, 'Category #2', 2),
(3, 'Category #3', 3),
(4, 'Category #4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `main_image` text NOT NULL,
  `price` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `main_image`, `price`) VALUES
(1, 3, 'SUPER EXECUTIVE OFFICE CHAIR', 'Rocking chairs made of wood, plastic and metal.', 'pro-main-1528703680.jpg', '1500'),
(2, 3, 'TATIANA OFFICE CHAIR', 'Very comfortable executive chairs.', 'pro-main-1528703724.jpg', '2000'),
(3, 3, 'SILVIA OFFICE CHAIR', 'Very comfortable executive chair with head rest, arm rest and wheels.', 'pro-main-1528703750.jpg', '2000'),
(4, 3, 'ROAAN OFFICE CHAIR', 'Office chairs with wheels, cloth seats and arm rest. Available in several colors', 'pro-main-1528703770.jpg', '2000'),
(5, 2, 'AUGUSTINA OFFICE TABLE', 'Office table made up of wood & Iron accompanied with drawers.', 'pro-main-1528703806.jpg', '2000'),
(6, 2, 'GRACE OFFICE TABLE', 'Imported office table to accommodate cpu, keyboard, mouse and screen.', 'pro-main-1528703829.jpg', '2000'),
(7, 3, 'ERIKA OFFICE CHAIR', 'Comfortable office chairs, made up of plastic and  dress fabric of ribbed crêpe, made of silk of black color', 'pro-main-1528703859.jpg', '2000'),
(8, 2, 'ANNA OFFICE TABLE', 'Office table made up of wood and iron.', 'pro-main-1528703877.jpg', '2000'),
(9, 3, 'ANTHONY OFFICE CHAIR', 'Executive chair, specially designed for office personnel.', 'pro-main-1528703903.jpg', '2000'),
(10, 2, 'AUBREY OFFICE TABLE', 'Office table made up of wood to accommodate cpu, screen, keyboard and mouse', 'pro-main-1528703931.jpg', '2000'),
(12, 3, 'AUSTIN OFFICE CHAIR', 'This is designed and built locally. Same is specially designed for boardroom and meeting room.', 'pro-main-1528703981.jpg', '2000'),
(13, 2, 'CARTER OFFICE TABLE', 'This table was designed with selected materials to ensure the modern business world satisfaction.', 'pro-main-1528704001.jpg', '2000'),
(14, 1, 'ALONDRA SOFA', 'Very comfortable sofa imported from Vietnam. ', 'pro-main-1528704025.jpg', '2000'),
(15, 1, 'ELLA SOFA WITH SPEAKER', 'Imported sofa from China, fitted with blue fabrics and speakers on the front.\r\n', 'pro-main-1528704058.jpg', '2000'),
(16, 1, 'GHABANA SOFA', 'This is a sofa from made up of wood and dress fabric of ribbed crêpe, made of silk from Malaysia .', 'pro-main-1528704320.jpg', '2000'),
(17, 1, 'HARPER SOFA WITH LED', 'This is is ready made sofa, imported from Malaysia.\r\n\r\nThe materials in the sofa is wood and a dress fabric of ribbed crêpe, made of silk of black color. same is illuminated with blue led light', 'pro-main-1528704354.jpg', '2000'),
(18, 4, 'ELPASSO HALF FILING CABINET', 'This is a half filing cabinet, made up of the finest selected melanine wood and painted white with brown doors in front.', 'pro-main-1528704396.jpg', '2000'),
(19, 4, 'VICTORIA FILE CABINET', 'This file cabinet is made up of melanine wood. This wood is easily available on the market with different design and color to match the business corporate color and to meet the new market demand.', 'pro-main-1528704410.jpg', '2000'),
(22, 2, 'Texst', 'sgsgsgsagsgabc', 'pro-main-1561029771.jpg', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
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
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
