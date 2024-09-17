-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2024 at 11:44 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `food_delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bill_food`
--

CREATE TABLE `bill_food` (
  `id` int(11) NOT NULL,
  `bid` varchar(60) NOT NULL,
  `customer` varchar(30) NOT NULL,
  `amount` varchar(60) NOT NULL,
  `rdate` varchar(15) NOT NULL,
  `d_status` varchar(11) NOT NULL,
  `latitude` varchar(60) NOT NULL,
  `longitude` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_food`
--

INSERT INTO `bill_food` (`id`, `bid`, `customer`, `amount`, `rdate`, `d_status`, `latitude`, `longitude`) VALUES
(2, '1', 'jebin', '5000', '08-06-2024', '1', '10.836235', '78.689142'),
(3, '2', 'kkk', '5000', '08-06-2024', '1', '10.835713', '78.688812'),
(4, '3', 'jebin', '1000', '08-06-2024', '0', '', ''),
(5, '1', 'jebin', '500', '08-06-2024', '1', '10.836278597114495', '78.689209605224'),
(6, '2', 'kkk', '100', '08-06-2024', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `rdate` varchar(40) NOT NULL,
  `latitude` varchar(40) NOT NULL,
  `longitude` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `mobile`, `email`, `city`, `username`, `password`, `rdate`, `latitude`, `longitude`) VALUES
(1, 'rajan', 8989898989, 'rajan@gmail.com', 'trichy', 'rajan', 'rajan', '10-06-2024', '10.836222', '78.689124');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `feed` varchar(500) NOT NULL,
  `city` varchar(60) NOT NULL,
  `rdate` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--


-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `id` int(60) NOT NULL,
  `food_id` varchar(40) NOT NULL,
  `foodname` varchar(40) NOT NULL,
  `price` varchar(40) NOT NULL,
  `quantity` varchar(40) NOT NULL,
  `total` varchar(40) NOT NULL,
  `pickup` varchar(60) NOT NULL,
  `contact` varchar(60) NOT NULL,
  `location` varchar(60) NOT NULL,
  `description` varchar(500) NOT NULL,
  `latitude` varchar(60) NOT NULL,
  `longitude` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `rdate` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`id`, `food_id`, `foodname`, `price`, `quantity`, `total`, `pickup`, `contact`, `location`, `description`, `latitude`, `longitude`, `status`, `username`, `rdate`) VALUES
(1, '1', 'idly', '10', '50', '500', 'trichy', '08989898989', 'trichy', '10 members eating worth idly quantity.', '10.836278929801518', '78.68920928375447', '2', 'jebin', '08-06-2024'),
(2, '10', 'mutton gravy', '100', '1', '100', 'trichy', '9894918800', 'trichy', 'tricht', '10.836222', '78.689122', '2', 'kkk', '08-06-2024');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `package` varchar(40) NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `price` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `rdate` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `package`, `foodname`, `price`, `status`, `pic`, `rdate`) VALUES
(1, 'Breakfast', 'doosa', '20', 0, 'upload/pongal.jpg', '10-06-2024'),
(2, 'Breakfast', 'dosa', '15', 0, 'upload/dosa.jpg', '10-06-2024'),
(3, 'Breakfast', 'pongal', '20', 0, 'upload/pongal.jpg', '10-06-2024'),
(4, 'Breakfast', 'puri', '20', 0, 'upload/puri.jpg', '10-06-2024'),
(5, 'Breakfast', 'vada', '5', 0, 'upload/vada.jpg', '10-06-2024'),
(6, 'Lunch', 'chicken briyani', '100', 0, 'upload/hyderabadi briyani.jpg', '10-06-2024'),
(7, 'Lunch', 'mutton briyani', '120', 0, 'upload/Biryani_of_Lahore.jpg', '10-06-2024'),
(8, 'Lunch', 'rice', '100', 0, 'upload/rice.jpg', '10-06-2024'),
(9, 'Lunch', 'chicken gravy', '60', 0, 'upload/chicken gravey.jpg', '10-06-2024');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `rdate` varchar(40) NOT NULL,
  `latitude` varchar(40) NOT NULL,
  `longitude` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `mobile`, `email`, `city`, `username`, `password`, `rdate`, `latitude`, `longitude`) VALUES
(1, 'jebin', 8989898989, 'selva@gmail.com', 'trichy', 'jebin', '1234', '08-06-2024', '13.064722', '80.168198'),
(2, 'kkk', 44444, 'kk@gmail.com', 'trichy', 'kkk', 'kkk', '08-06-2024', '10.8364267', '78.6891474');
