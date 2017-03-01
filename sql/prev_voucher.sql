-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2017 at 04:01 PM
-- Server version: 5.6.16-1~exp1
-- PHP Version: 5.6.29-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek24`
--

-- --------------------------------------------------------

--
-- Table structure for table `prev_voucher`
--

CREATE TABLE `prev_voucher` (
  `id` int(11) NOT NULL,
  `voucher_name` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `image_voucher` varchar(256) NOT NULL,
  `coor_x` int(11) NOT NULL,
  `coor_y` int(11) NOT NULL,
  `font_color` varchar(15) NOT NULL,
  `font_size` int(11) NOT NULL,
  `font_style` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prev_voucher`
--

INSERT INTO `prev_voucher` (`id`, `voucher_name`, `image`, `image_voucher`, `coor_x`, `coor_y`, `font_color`, `font_size`, `font_style`) VALUES
(1, 'test', '213070643320170228021413voucher.jpg', '56TEST4792cjT4720170228021413', 600, 700, 'black', 30, 'LemonMilk'),
(2, 'test2', '213070643320170228022506voucher.jpg', '56TEST4792cjT4720170228022506.jpg', 800, 900, 'black', 30, 'noodle_oblique'),
(3, 'test3', '', '56TEST4792cjT47320170228032904.jpg', 800, 700, 'white', 30, 'LemonMilk'),
(4, 'test3', '213070643320170228035647voucher.jpg', '56TEST4792cjT4720170228035647.jpg', 900, 900, 'black', 30, 'LemonMilk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prev_voucher`
--
ALTER TABLE `prev_voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prev_voucher`
--
ALTER TABLE `prev_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
