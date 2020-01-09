-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 12:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adid` int(10) NOT NULL,
  `adname` varchar(255) NOT NULL,
  `aduser` varchar(255) NOT NULL,
  `ademail` varchar(255) NOT NULL,
  `adpass` varchar(255) NOT NULL,
  `level` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adid`, `adname`, `aduser`, `ademail`, `adpass`, `level`) VALUES
(1, 'Ashadozzaman Shvou', 'ashadozzaman', 'admin@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'China'),
(2, 'Indian'),
(4, 'Bershka'),
(5, 'ASOS'),
(6, 'Bangladeshi'),
(7, 'ASOS');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `ses_id` varchar(255) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `ses_id`, `pro_id`, `pro_name`, `quantity`, `price`, `image`) VALUES
(1, '3ub9vqjk0nsq4bhu4p6r716gsr', 20, 'Glabs', 1, 180, 'upload/c73f4c6cf7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(2, 'Tools'),
(3, 'Hoodies &amp; Sweats'),
(4, 'Jeans'),
(5, 'Pants &amp; Leggings'),
(6, 'Soil &amp; Alternative'),
(7, 'Pots'),
(9, 'Fertilizers'),
(15, 'Seeds');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--
-- Error reading structure for table ecommerce.chat: #1932 - Table 'ecommerce.chat' doesn't exist in engine
-- Error reading data for table ecommerce.chat: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `ecommerce`.`chat`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `Chat_Id` int(11) NOT NULL,
  `Msg` text NOT NULL,
  `Msg_By` int(11) NOT NULL,
  `Msg_To` int(11) NOT NULL,
  `Owner` varchar(10) NOT NULL,
  `Added_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatting`
--

INSERT INTO `chatting` (`Chat_Id`, `Msg`, `Msg_By`, `Msg_To`, `Owner`, `Added_At`, `status`) VALUES
(1, 'hi mam', 1, 1, 'Admin', '2019-09-09 07:46:01', ''),
(2, 'hlw sir kmn asen?', 1, 1, 'Customer', '2019-09-09 07:46:36', ''),
(3, 'Ami valo aci apni kmn asen/', 1, 1, 'Admin', '2019-09-09 07:47:04', ''),
(4, 'Yea i m also fine', 1, 1, 'Customer', '2019-09-09 07:47:20', ''),
(5, 'sir ami akti order disecci but akhnu paini ki phm hoise plz janben aktu,amr product ti aktu check korben plz.', 1, 1, 'Customer', '2019-09-09 08:05:30', ''),
(6, 'Ok mam we try our best quicky supply yr product', 1, 1, 'Admin', '2019-09-09 08:11:56', ''),
(7, 'ok sir thanks', 1, 1, 'Customer', '2019-09-09 08:12:43', ''),
(8, 'Hlw mem, how r u?', 1, 1, 'Admin', '2019-09-09 08:36:34', ''),
(9, 'Yea sir i m fine.u?', 1, 1, 'Customer', '2019-09-09 08:39:35', ''),
(10, 'Hlw mem, how r u? mem', 1, 1, 'Admin', '2019-09-09 08:39:53', ''),
(11, 'hellow sir how are you?', 2, 1, 'Customer', '2019-09-09 16:05:53', ''),
(12, 'yea i m Fine. you?', 2, 1, 'Admin', '2019-09-09 16:07:03', ''),
(13, 'ki help lahbe bolen?', 2, 1, 'Admin', '2019-09-09 16:30:57', ''),
(14, 'tor miya kj korse nah apni asen help niye\n', 2, 1, 'Customer', '2019-09-09 16:31:22', ''),
(15, 'Hlw mam kisu janalen nah tu', 1, 1, 'Admin', '2019-09-09 21:11:02', 'unread'),
(16, 'Koi mam koi asen apnki', 1, 1, 'Admin', '2019-09-09 21:12:21', 'unread'),
(17, 'Ha mam kmn asen', 2, 1, 'Admin', '2019-09-10 10:48:43', 'unread'),
(18, 'ohu sir Sorry 4 late', 1, 1, 'Customer', '2019-09-11 21:00:46', 'unread'),
(19, 'its ok no problem', 1, 1, 'Admin', '2019-09-11 21:02:21', 'unread'),
(20, 'ki korsen mam', 1, 1, 'Customer', '2019-09-11 21:02:40', 'unread'),
(21, 'Hellow sir', 2, 1, 'Customer', '2019-09-14 10:35:35', 'unread'),
(22, 'Yea sir plz', 2, 1, 'Admin', '2019-09-14 10:38:43', 'unread'),
(23, 'Yea sir plz', 2, 1, 'Admin', '2019-09-14 15:16:29', 'unread'),
(24, 'Hellow sir', 2, 1, 'Customer', '2019-09-14 15:16:36', 'unread'),
(25, 'yes!!!! mam kmn asen?', 2, 1, 'Admin', '2019-09-24 07:43:32', 'unread'),
(26, 'hi sir kmn asen?', 1, 1, 'Customer', '2019-09-29 09:01:14', 'unread'),
(27, 'kibe kmn asos', 2, 1, 'Admin', '2019-10-12 11:27:57', 'unread'),
(28, 'aci valoi..anne', 2, 1, 'Customer', '2019-10-12 11:28:31', 'unread'),
(29, 'hellow kmn aso', 2, 1, 'Admin', '2019-11-18 11:25:59', 'unread'),
(30, 'valo tmi kmn aso', 2, 1, 'Customer', '2019-11-18 11:26:28', 'unread'),
(31, 'hellow sir,...', 6, 1, 'Customer', '2019-12-02 06:48:07', 'unread'),
(32, 'yes sir i m fine', 6, 1, 'Admin', '2019-12-02 06:48:46', 'unread'),
(33, 'hellow sir', 7, 1, 'Customer', '2019-12-02 13:22:30', 'unread'),
(34, 'hellow sir', 2, 1, 'Customer', '2019-12-02 13:23:00', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `customepackage`
--

CREATE TABLE `customepackage` (
  `CPID` int(10) NOT NULL,
  `cus_pkg_id` varchar(255) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `town` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `duration` int(10) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customepackage`
--

INSERT INTO `customepackage` (`CPID`, `cus_pkg_id`, `cus_id`, `name`, `cname`, `address`, `postcode`, `town`, `phone`, `email`, `date`, `startDate`, `endDate`, `duration`, `total_price`, `status`) VALUES
(1, '5d97aaa14d891', 2, 'Shvou', 'Bangladesh', 'West Raza Bazar, 51/a/1, Dhaka', '1218', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-10-04 20:25:05', '0000-00-00', '0000-00-00', 10, 0.00, 'confirm'),
(2, '5d97acf25a8d5', 2, 'Shvou', 'Bangladesh', 'westRaza bazar', '1218', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-10-04 20:34:58', '2019-10-07', '2019-10-02', 7, 0.00, 'complete'),
(3, '5d97af1bd7f3d', 2, 'Shvou', 'Bangladesh', 'Panthapoth,Dhaka,Bangladesh', '1218', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-10-04 20:44:11', '0000-00-00', '0000-00-00', 6, 0.00, 'Pending'),
(4, '5d97b06c6e6cd', 2, 'Shvou', 'Bangladesh', 'westRaza bazar', '1218', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-10-04 20:49:48', '2019-10-15', '2019-10-25', 10, 0.00, 'complete'),
(5, '5d9993383e4da', 2, 'Shvou', 'Bangladesh', 'Panthapoth,Dhaka,Bangladesh', '1215', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-10-06 07:09:44', '2019-10-07', '2020-01-15', 7, 800.00, 'running'),
(6, '5d9adf3fc3a0a', 2, 'Ashadozzaman', 'DIA', 'westRaza bazar', '1215', 'Dhaka', '01762662171', 'ashadozzamanashadozzaman@gmail.com', '2019-10-07 06:46:23', '2019-10-07', '2020-01-15', 100, 23000.00, 'running'),
(7, '5da1b23965ec8', 2, 'Shvou', 'Bangladesh', 'West Raza Bazar, 51/a/1, Dhaka', '1218', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-10-12 11:00:09', '2019-10-12', '2019-10-24', 12, 2212.00, 'complete'),
(12, '5de4b7968d341', 6, 'Shvou', 'DIA', 'Panthapoth,Dhaka,Bangladesh', '1218', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-12-02 07:04:54', '2019-12-02', '2019-12-12', 10, 856.00, 'running'),
(13, '5de50799a7915', 7, 'Shvou', 'DIA', 'Panthapoth,Dhaka,Bangladesh', '1218', 'Dhaka', '01762662171', 'rafi@daffodil.ac', '2019-12-02 12:46:17', '2019-12-02', '2019-11-20', 8, 787.20, 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `customepackagedetails`
--

CREATE TABLE `customepackagedetails` (
  `cpd_id` int(11) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `plant_id` int(10) NOT NULL,
  `plant_name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `cus_pkg_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customepackagedetails`
--

INSERT INTO `customepackagedetails` (`cpd_id`, `cus_id`, `plant_id`, `plant_name`, `price`, `quantity`, `duration`, `image`, `total_price`, `cus_pkg_id`) VALUES
(1, 2, 4, 'Polyscias Fruticosa Florida Ming Aralia', 5.00, 10, 10, 'upload/37b78a3782.png', 500.00, '5d97aaa14d891'),
(2, 2, 5, 'Aglaonema', 5.00, 10, 10, 'upload/983fd68fbc.jpg', 500.00, '5d97aaa14d891'),
(3, 2, 6, 'Caryota Fishtail Palm', 8.00, 100, 10, 'upload/3da6df7615.png', 8000.00, '5d97aaa14d891'),
(4, 2, 4, 'Polyscias Fruticosa Florida Ming Aralia', 5.00, 4, 7, 'upload/37b78a3782.png', 140.00, '5d97acf25a8d5'),
(5, 2, 5, 'Aglaonema', 5.00, 5, 7, 'upload/983fd68fbc.jpg', 175.00, '5d97acf25a8d5'),
(6, 2, 7, 'ChamaedoreaMetallic', 5.00, 4, 7, 'upload/4a10501479.png', 140.00, '5d97acf25a8d5'),
(7, 2, 4, 'Polyscias Fruticosa Florida Ming Aralia', 5.00, 15, 6, 'upload/37b78a3782.png', 450.00, '5d97af1bd7f3d'),
(8, 2, 6, 'Caryota Fishtail Palm', 8.00, 5, 6, 'upload/3da6df7615.png', 240.00, '5d97af1bd7f3d'),
(9, 2, 4, 'Polyscias Fruticosa Florida Ming Aralia', 5.00, 9, 7, 'upload/37b78a3782.png', 315.00, '5d97b06c6e6cd'),
(10, 2, 5, 'Aglaonema', 5.00, 3, 7, 'upload/983fd68fbc.jpg', 105.00, '5d97b06c6e6cd'),
(11, 2, 4, 'Polyscias Fruticosa Florida Ming Aralia', 5.00, 6, 10, 'upload/37b78a3782.png', 300.00, '5d9993383e4da'),
(12, 2, 5, 'Aglaonema', 5.00, 10, 10, 'upload/983fd68fbc.jpg', 500.00, '5d9993383e4da'),
(13, 2, 4, 'Polyscias Fruticosa Florida Ming Aralia', 5.00, 20, 100, 'upload/37b78a3782.png', 10000.00, '5d9adf3fc3a0a'),
(14, 2, 5, 'Aglaonema', 5.00, 10, 100, 'upload/983fd68fbc.jpg', 5000.00, '5d9adf3fc3a0a'),
(15, 2, 6, 'Caryota Fishtail Palm', 8.00, 10, 100, 'upload/3da6df7615.png', 8000.00, '5d9adf3fc3a0a'),
(16, 2, 22, 'Pothos Marble Queen-Plant', 5.00, 25, 12, 'upload/20c198065d.png', 1500.00, '5da1b23965ec8'),
(17, 2, 21, 'Trichilia Dregeana Natal Mahogany', 5.00, 10, 12, 'upload/e172f9491e.png', 600.00, '5da1b23965ec8'),
(18, 2, 22, 'Pothos Marble Queen-Plant', 5.00, 7, 6, 'upload/20c198065d.png', 210.00, '5dd1663f42d3b'),
(19, 2, 21, 'Trichilia Dregeana Natal Mahogany', 5.00, 6, 6, 'upload/e172f9491e.png', 180.00, '5dd1663f42d3b'),
(20, 2, 22, 'Pothos Marble Queen-Plant', 5.00, 10, 10, 'upload/20c198065d.png', 500.00, '5dd300a322111'),
(21, 2, 21, 'Trichilia Dregeana Natal Mahogany', 5.00, 6, 10, 'upload/e172f9491e.png', 300.00, '5dd300a322111'),
(22, 2, 18, 'Trichilia Dregeana', 5.00, 3, 10, 'upload/0731ee62d9.png', 150.00, '5dd300a322111'),
(23, 2, 22, 'Pothos Marble Queen-Plant', 5.00, 4, 4, 'upload/20c198065d.png', 80.00, '5dd301a38b6bd'),
(24, 2, 21, 'Trichilia Dregeana Natal Mahogany', 5.00, 5, 4, 'upload/e172f9491e.png', 100.00, '5dd301a38b6bd'),
(25, 2, 22, 'Pothos Marble Queen-Plant', 5.00, 5, 5, 'upload/20c198065d.png', 125.00, '5dd55c7b926a4'),
(26, 2, 21, 'Trichilia Dregeana Natal Mahogany', 5.00, 6, 5, 'upload/e172f9491e.png', 150.00, '5dd55c7b926a4'),
(27, 6, 12, 'Cycas Revoluta Sago Palm Plant', 5.00, 15, 5, 'upload/1f3ca80623.png', 375.00, '5de4b7968d341'),
(28, 6, 7, 'ChamaedoreaMetallic', 5.00, 3, 5, 'upload/4a10501479.png', 75.00, '5de4b7968d341'),
(29, 6, 5, 'Aglaonema', 5.00, 12, 5, 'upload/983fd68fbc.jpg', 300.00, '5de4b7968d341'),
(30, 7, 21, 'Trichilia Dregeana Natal Mahogany', 5.00, 8, 8, 'upload/e172f9491e.png', 320.00, '5de50799a7915'),
(31, 7, 10, 'Cissus GrapeIvy Plant', 5.00, 9, 8, 'upload/4285f86d6e.png', 360.00, '5de50799a7915');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` varchar(15) NOT NULL,
  `town` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(5) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `fname`, `lname`, `cname`, `address`, `postcode`, `town`, `dob`, `phone`, `email`, `password`, `status`, `image`) VALUES
(1, 'Md.Aminul Islam', 'Islam', 'Bangladesh', 'westRaza bazar', '1218', 'Dhaka', '2019-07-02', '01762662171', 'user@gmail.com', '123', 0, 'upload/520c317389.jpg'),
(2, 'Md. Islam', 'Islam', 'Bangladesh', 'West Raza Bazar, 51/a/1, Dhaka', '1215', 'Dhaka', '0000-00-00', '01762662171', 'shovoua@gmail.com', '123', 0, 'upload/ab83b5ad74.jpg'),
(3, 'Ashadozzaman', 'Shvou', 'Bangladesh', 'West Raza Bazar, 51/a/1, Dhaka', '1218', 'Dhaka', '2019-09-16', '01762662171', 'ashadozzamanshovoua@gmail.com', '123', 0, 'upload/3114e47092.jpg'),
(4, 'Ashadozzaman', 'Shvou', 'Bangladesh', 'West Raza Bazar, 51/a/1, Dhaka', '1218', 'Dhaka', '2009-01-12', '01762662171', 'ashadozzaman@gmail.com', '123', 0, 'upload/4aecca0ad5.png'),
(5, 'Shvou', 'Shvou', 'Bangladesh', 'West Raza Bazar, 51/a/1, Dhaka', '1215', 'Dhaka', '2019-12-25', '01762662171', '1000258@daffodil.ac', '123', 0, 'upload/927fc6781d.jpg'),
(6, 'Shvou', 'Islam', 'Bangladesh', 'Panthapoth,Dhaka,Bangladesh', '1218', 'Dhaka', '1995-08-08', '01762662171', 'shovouaa@gmail.com', '123', 0, 'upload/6c388e561c.png'),
(7, 'Test', 'Tset', 'Bangladesh', 'Panthapoth,Dhaka,Bangladesh', '1218', 'Dhaka', '2019-05-11', '01762662171', '123@gmail.com', '12345', 0, 'upload/3c74f817e1.png');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `dis_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `startdate` date NOT NULL,
  `endDate` date NOT NULL,
  `percentage` int(10) NOT NULL,
  `duration` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`dis_id`, `pro_id`, `startdate`, `endDate`, `percentage`, `duration`) VALUES
(2, 27, '2019-10-08', '2019-10-18', 10, 2),
(3, 28, '2019-10-09', '2019-10-14', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fixed_packages`
--

CREATE TABLE `fixed_packages` (
  `pkg_id` int(11) NOT NULL,
  `pkg_name` varchar(255) NOT NULL,
  `pkg_service` text NOT NULL,
  `pkg_description` text NOT NULL,
  `plant_quantity` int(10) NOT NULL,
  `Initial_cost` double(10,2) NOT NULL,
  `monthly_cost` double(10,2) NOT NULL,
  `yearly_cost` double(10,2) NOT NULL,
  `max_plant` int(10) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixed_packages`
--

INSERT INTO `fixed_packages` (`pkg_id`, `pkg_name`, `pkg_service`, `pkg_description`, `plant_quantity`, `Initial_cost`, `monthly_cost`, `yearly_cost`, `max_plant`, `image`) VALUES
(1, '100 Pic Package', 'Per week Our gardener go to your place and water plants. Cutting, soiling, replacement and reporting', 'Universal Floral Office Plants offers a dedicated office plant maintenance service, in order to preserve the beauty and quality of your plant displays. Our professional plant maintenance team, convenient service provides specialist plant care to businesses throughout Bangladesh.\r\n\r\nWhen you take out our Office Plants Rental contract with us, a dedicated member of our team will visit you on a weekly basis to ensure your office plants are maintained with our service. Smartly dressed in the Universal Floral Office Plants uniform, the same highly trained horticulturist will be responsible for the upkeep of your plants and displays. Seeing the same friendly face every week breeds familiarity in the office, and ensures you are receiving a truly personal service.\r\n\r\nOur horticulturists are passionate about plants and take pride in maintaining the health and vibrancy of your displays. To achieve this, our office plant maintenance service comprises of plant watering, cleaning, and pruning. Additionally, if any displays fall beneath our high standards, then they will be replaced as part of the contract! Whether you have one plant or 100 plants, we are dedicated to providing the same high-quality service.', 100, 1000.00, 4000.00, 45000.00, 10, 'upload/a0fb14b837.png'),
(2, '1000 pic Package', 'Per week Our gardener go to your place and water plants. Cutting, soiling, replacement and reporting', 'Universal Floral Office Plants offers a dedicated office plant maintenance service, in order to preserve the beauty and quality of your plant displays. Our professional plant maintenance team, convenient service provides specialist plant care to businesses throughout Bangladesh.\r\n\r\nWhen you take out our Office Plants Rental contract with us, a dedicated member of our team will visit you on a weekly basis to ensure your office plants are maintained with our service. Smartly dressed in the Universal Floral Office Plants uniform, the same highly trained horticulturist will be responsible for the upkeep of your plants and displays. Seeing the same friendly face every week breeds familiarity in the office, and ensures you are receiving a truly personal service.\r\n\r\nOur horticulturists are passionate about plants and take pride in maintaining the health and vibrancy of your displays. To achieve this, our office plant maintenance service comprises of plant watering, cleaning, and pruning. Additionally, if any displays fall beneath our high standards, then they will be replaced as part of the contract! Whether you have one plant or 100 plants, we are dedicated to providing the same high-quality service.', 1000, 2000.00, 10000.00, 100000.00, 100, 'upload/b95d431776.jpg'),
(4, '500 Pic Package', 'Per week Our gardener go to your place and water plants. Cutting, soiling, replacement and reporting', 'Per week Our gardener go to your place and water plants. Cutting, soiling, replacement and reportingPer week Our gardener go to your place and water plants. Cutting, soiling, replacement and reportingPer week Our gardener go to your place and water plants. Cutting, soiling, replacement and reportingPer week Our gardener go to your place and water plants. Cutting, soiling, replacement and reportingPer week Our gardener go to your place and water plants. Cutting, soiling, replacement and reportingPer week Our gardener go to your place and water plants. Cutting, soiling, replacement and reporting\r\nPer week Our gardener go to your place and water plants. Cutting, soiling, replacement and reportingPer week Our gardener go to your place and water plants. Cutting, soiling, replacement and reportingPer week Our gardener go to your place and water plants. Cutting, soiling, replacement and reportingPer week Our gardener go to your place and water plants. Cutting, soiling, replacement and reportingPer week Our gardener go to your place and water plants. Cutting, soiling, replacement and reporting', 500, 1000.00, 6000.00, 65000.00, 50, 'upload/d044050799.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_details_id` int(10) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `or_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_details_id`, `cus_id`, `pro_id`, `pro_name`, `price`, `quantity`, `date`, `image`, `status`, `or_id`) VALUES
(17, 2, 15, 'Knot Front Mini Dress', 360, 2, '2019-08-10 21:23:14', 'upload/678356016c.jpg', 1, '5d4ee162c7733'),
(18, 2, 13, 'Knot Front Mini Dress', 884, 4, '2019-08-10 21:23:14', 'upload/cda72f834d.jpg', 1, '5d4ee162c7733'),
(19, 2, 16, 'Knot Front Mini Dress this 3', 123, 1, '2019-08-11 02:10:11', 'upload/a81f2b80c4.jpg', 0, '5d4f24a33518f'),
(20, 2, 14, 'Knot Front Mini Dress this', 442, 2, '2019-08-11 02:10:11', 'upload/b515a21f77.jpg', 0, '5d4f24a33518f'),
(21, 2, 14, 'Knot Front Mini Dress this', 442, 2, '2019-08-11 02:17:11', 'upload/b515a21f77.jpg', 0, '5d4f26474f66e'),
(22, 2, 13, 'Knot Front Mini Dress', 442, 2, '2019-08-11 02:17:11', 'upload/cda72f834d.jpg', 0, '5d4f26474f66e'),
(23, 1, 15, 'Knot Front Mini Dress', 180, 1, '2019-08-11 02:18:56', 'upload/678356016c.jpg', 0, '5d4f26b023542'),
(24, 1, 13, 'Knot Front Mini Dress', 221, 1, '2019-08-11 02:18:56', 'upload/cda72f834d.jpg', 0, '5d4f26b023542'),
(25, 2, 15, 'Knot Front Mini Dress', 360, 2, '2019-08-11 23:45:30', 'upload/678356016c.jpg', 0, '5d505439e442d'),
(26, 2, 16, 'Knot Front Mini Dress this 3', 369, 3, '2019-08-12 23:12:15', 'upload/a81f2b80c4.jpg', 0, '5d519deed651e'),
(27, 2, 14, 'Knot Front Mini Dress this', 1105, 5, '2019-08-12 23:12:15', 'upload/b515a21f77.jpg', 0, '5d519deed651e'),
(28, 2, 13, 'Knot Front Mini Dress', 663, 3, '2019-08-12 23:12:15', 'upload/cda72f834d.jpg', 0, '5d519deed651e'),
(29, 2, 16, 'Knot Front Mini Dress this 3', 123, 1, '2019-08-13 23:21:31', 'upload/a81f2b80c4.jpg', 0, '5d52f19b13daf'),
(30, 2, 13, 'Knot Front Mini Dress', 663, 3, '2019-08-14 21:10:19', 'upload/cda72f834d.jpg', 0, '5d54245b75ac3'),
(31, 2, 15, 'Knot Front Mini Dress', 360, 2, '2019-08-14 21:10:19', 'upload/678356016c.jpg', 0, '5d54245b75ac3'),
(32, 2, 16, 'Knot Front Mini Dress this 3', 615, 5, '2019-08-14 22:21:53', 'upload/a81f2b80c4.jpg', 0, '5d543520eea2b'),
(33, 2, 15, 'Knot Front Mini Dress', 360, 2, '2019-08-14 22:21:53', 'upload/678356016c.jpg', 0, '5d543520eea2b'),
(34, 2, 19, 'tree', 500, 1, '2019-08-15 13:19:41', 'upload/6cc71ee701.jpg', 0, '5d55078d81e32'),
(35, 2, 18, 'Sar', 180, 1, '2019-08-15 13:19:41', 'upload/3925181aae.jpg', 0, '5d55078d81e32'),
(36, 2, 20, 'Glabs', 360, 2, '2019-08-15 13:19:41', 'upload/c73f4c6cf7.jpg', 0, '5d55078d81e32'),
(37, 2, 21, 'Mini-Vintage', 1000, 2, '2019-08-15 13:19:42', 'upload/0dcbf05727.jpg', 0, '5d55078d81e32'),
(38, 2, 18, 'Sar', 360, 2, '2019-08-16 19:53:32', 'upload/3925181aae.jpg', 0, '5d56b55c128a9'),
(39, 2, 19, 'tree', 500, 1, '2019-08-16 19:53:32', 'upload/6cc71ee701.jpg', 0, '5d56b55c128a9'),
(40, 2, 18, 'Sar', 180, 1, '2019-08-22 00:08:44', 'upload/3925181aae.jpg', 0, '5d5d88ac6c789'),
(41, 2, 26, 'Flower Trop4', 180, 1, '2019-08-30 12:40:00', 'upload/45bfeadd42.jpg', 0, '5d68c4c06591e'),
(42, 2, 26, 'Flower Trop4', 720, 4, '2019-08-30 19:23:24', 'upload/45bfeadd42.jpg', 0, '5d69234cb690f'),
(43, 2, 24, 'Flower Trop2', 360, 2, '2019-08-30 19:23:24', 'upload/912d3e5956.jpg', 0, '5d69234cb690f'),
(44, 2, 22, 'Mini_cutter', 280, 2, '2019-08-30 19:23:25', 'upload/0762a8a2c1.jpg', 0, '5d69234cb690f'),
(46, 2, 27, 'Knot Front Mini Dress', 220, 1, '2019-08-30 20:02:10', 'upload/12567b41ec.jpg', 0, '5d692c620b88d'),
(47, 2, 27, 'Knot Front Mini Dress', 220, 1, '2019-08-30 20:48:34', 'upload/12567b41ec.jpg', 0, '5d6937426b772'),
(48, 2, 26, 'Flower Trop4', 180, 1, '2019-08-30 20:50:55', 'upload/45bfeadd42.jpg', 0, '5d6937cf26328'),
(51, 2, 27, 'Knot Front Mini Dress', 220, 1, '2019-08-30 21:01:26', 'upload/12567b41ec.jpg', 0, '5d693a4619b45'),
(53, 1, 26, 'Flower Trop4', 180, 1, '2019-09-07 12:48:35', 'upload/45bfeadd42.jpg', 0, '5d7352c394840'),
(54, 1, 27, 'Knot Front Mini Dress', 660, 3, '2019-09-12 02:40:34', 'upload/12567b41ec.jpg', 0, '5d795bc28dee3'),
(55, 2, 28, 'Water Pipe', 720, 4, '2019-09-14 16:32:47', 'upload/6f201c38c9.jpg', 0, '5d7cc1cf2ab9f'),
(56, 2, 26, 'Flower Trop4', 180, 1, '2019-09-14 16:32:47', 'upload/45bfeadd42.jpg', 0, '5d7cc1cf2ab9f'),
(57, 1, 26, 'Flower Trop4', 180, 1, '2019-10-04 18:15:00', 'upload/45bfeadd42.jpg', 0, '5d9737c476f87'),
(58, 1, 27, 'Knot Front Mini Dress', 220, 1, '2019-10-04 18:20:38', 'upload/12567b41ec.jpg', 0, '5d9739161896a'),
(59, 2, 28, 'Water Pipe', 180, 1, '2019-10-04 21:42:11', 'upload/6f201c38c9.jpg', 0, '5d97685317e21'),
(60, 2, 28, 'Water Pipe', 180, 1, '2019-10-04 21:54:08', 'upload/6f201c38c9.jpg', 0, '5d976b207f006'),
(61, 2, 25, 'Flower Trop3', 100, 1, '2019-10-07 21:52:53', 'upload/b9176d3474.jpg', 0, '5d9b5f554a126'),
(62, 2, 19, 'tree', 500, 1, '2019-10-07 21:52:53', 'upload/6cc71ee701.jpg', 0, '5d9b5f554a126'),
(63, 2, 23, 'Flower Trop', 1200, 3, '2019-11-18 05:23:58', 'upload/ee207a44f2.jpg', 0, '5dd1d68e57a31'),
(64, 2, 28, 'Water Pipe', 180, 1, '2019-11-19 02:33:33', 'upload/6f201c38c9.jpg', 0, '5dd3001dd7b25'),
(65, 2, 26, 'Flower Trop4', 180, 1, '2019-11-19 02:33:34', 'upload/45bfeadd42.jpg', 0, '5dd3001dd7b25'),
(66, 2, 26, 'Flower Trop4', 180, 1, '2019-11-21 04:40:17', 'upload/45bfeadd42.jpg', 0, '5dd5c0d1543b6'),
(67, 2, 29, 'Cabe Kopay Chili Seed', 200, 4, '2019-11-21 04:40:18', 'upload/73d1fc6909.jpg', 0, '5dd5c0d1543b6'),
(68, 2, 34, 'Seed Planter Tray', 2200, 10, '2019-12-01 12:06:08', 'upload/3b3220ca63.jpg', 0, '5de35850a41ad'),
(69, 2, 33, 'Osmocote (13-13-13) 20g', 720, 9, '2019-12-01 12:06:09', 'upload/bf1b361d44.jpg', 0, '5de35850a41ad'),
(70, 7, 35, 'Quot; Grill Planter', 2400, 50, '2019-12-02 19:16:22', 'upload/34eb4e2f99.jpg', 0, '5de50ea6675f8'),
(71, 7, 33, 'Osmocote (13-13-13) 20g', 320, 4, '2019-12-02 19:16:22', 'upload/bf1b361d44.jpg', 0, '5de50ea6675f8');

-- --------------------------------------------------------

--
-- Table structure for table `package_cart`
--

CREATE TABLE `package_cart` (
  `pkg_cart_id` int(10) NOT NULL,
  `ses_id` varchar(255) NOT NULL,
  `plant_id` int(10) NOT NULL,
  `plant_name` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `duration` int(10) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_cart`
--

INSERT INTO `package_cart` (`pkg_cart_id`, `ses_id`, `plant_id`, `plant_name`, `quantity`, `duration`, `price`, `image`) VALUES
(5, 'sclf2qbpfmj4j4p4m5mvh28svg', 4, 'Polyscias Fruticosa Florida Ming Aralia', 3, 10, 5.00, 'upload/37b78a3782.png'),
(6, 'sclf2qbpfmj4j4p4m5mvh28svg', 5, 'Aglaonema', 5, 10, 5.00, 'upload/983fd68fbc.jpg'),
(8, 'aekh5186tjqbfhonqu2068jcec', 5, 'Aglaonema', 11, 10, 5.00, 'upload/983fd68fbc.jpg'),
(9, 'aekh5186tjqbfhonqu2068jcec', 6, 'Caryota Fishtail Palm', 10, 10, 8.00, 'upload/3da6df7615.png'),
(10, 'aekh5186tjqbfhonqu2068jcec', 7, 'ChamaedoreaMetallic', 7, 10, 5.00, 'upload/4a10501479.png'),
(13, '3ub9vqjk0nsq4bhu4p6r716gsr', 22, 'Pothos Marble Queen-Plant', 8, 6, 5.00, 'upload/20c198065d.png'),
(17, '6nsk4n6qd1k0li8g68bh3kmlar', 12, 'Cycas Revoluta Sago Palm Plant', 2, 3, 5.00, 'upload/1f3ca80623.png');

-- --------------------------------------------------------

--
-- Table structure for table `plants`
--

CREATE TABLE `plants` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(255) NOT NULL,
  `rate` int(10) NOT NULL COMMENT 'Per day',
  `stock` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plants`
--

INSERT INTO `plants` (`plant_id`, `plant_name`, `rate`, `stock`, `image`, `date`) VALUES
(4, 'Polyscias Fruticosa Florida Ming Aralia', 5, 758, 'upload/37b78a3782.png', '2019-09-19 22:29:04'),
(5, 'Aglaonema', 5, 885, 'upload/983fd68fbc.jpg', '2019-09-19 22:29:32'),
(6, 'Caryota Fishtail Palm', 8, 843, 'upload/3da6df7615.png', '2019-09-19 22:29:42'),
(7, 'ChamaedoreaMetallic', 5, 1008, 'upload/4a10501479.png', '2019-09-19 22:33:40'),
(10, 'Cissus GrapeIvy Plant', 5, 825, 'upload/4285f86d6e.png', '2019-09-19 22:39:00'),
(11, 'Coffea Arabica Coffee Plant', 5, 712, 'upload/97f3ac35e5.png', '2019-09-19 22:39:53'),
(12, 'Cycas Revoluta Sago Palm Plant', 5, 1005, 'upload/1f3ca80623.png', '2019-09-19 22:45:08'),
(13, 'Ficus Benjamina Tree-Plant', 5, 1130, 'upload/1477c71a87.png', '2019-09-19 22:45:59'),
(14, 'Ficus Gem-Plant', 15, 1020, 'upload/76a16b8e0c.png', '2019-09-19 22:47:07'),
(15, 'Dracaena Marginata-Plant', 5, 742, 'upload/b0abdd5bb5.png', '2019-09-19 22:48:56'),
(16, 'Yucca Elephantipes-Plant', 10, 35, 'upload/8872e4af44.png', '2019-09-19 22:49:27'),
(18, 'Trichilia Dregeana', 5, 569, 'upload/0731ee62d9.png', '2019-09-19 22:50:33'),
(21, 'Trichilia Dregeana Natal Mahogany', 5, 687, 'upload/e172f9491e.png', '2019-09-20 15:31:42'),
(22, 'Pothos Marble Queen-Plant', 5, 818, 'upload/20c198065d.png', '2019-09-20 15:32:15'),
(23, 'Beaucarnea recurvata â€œPonytail Palmâ€', 5, 9, 'upload/a21a6527ab.png', '2019-11-20 22:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `plants_package`
--

CREATE TABLE `plants_package` (
  `pp_id` int(10) NOT NULL,
  `plant_id` int(10) NOT NULL,
  `pkg_id` int(10) NOT NULL,
  `pb_id` int(10) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plants_package`
--

INSERT INTO `plants_package` (`pp_id`, `plant_id`, `pkg_id`, `pb_id`, `cus_id`, `quantity`, `date`) VALUES
(5, 18, 3, 2, 1, 50, '2019-12-01 17:19:24'),
(6, 21, 3, 2, 1, 50, '2019-12-01 17:19:24'),
(7, 22, 3, 2, 1, 50, '2019-12-01 17:19:24'),
(15, 10, 3, 2, 1, 50, '2019-12-01 17:19:24'),
(16, 11, 3, 2, 1, 50, '2019-12-01 17:19:24'),
(17, 12, 3, 2, 1, 50, '2019-12-01 17:19:24'),
(18, 13, 3, 2, 1, 50, '2019-12-01 17:19:24'),
(19, 14, 3, 2, 1, 50, '2019-12-01 17:19:24'),
(20, 15, 3, 2, 1, 50, '2019-12-01 17:19:24'),
(21, 16, 3, 2, 1, 50, '2019-12-01 17:19:24'),
(32, 22, 2, 3, 1, 100, '2019-12-01 17:19:24'),
(53, 22, 4, 8, 2, 50, '2019-12-01 17:19:24'),
(54, 11, 4, 8, 2, 50, '2019-12-01 17:19:24'),
(55, 12, 4, 8, 2, 50, '2019-12-01 17:19:24'),
(56, 13, 4, 8, 2, 50, '2019-12-01 17:19:24'),
(57, 14, 4, 8, 2, 50, '2019-12-01 17:19:24'),
(58, 15, 4, 8, 2, 50, '2019-12-01 17:19:24'),
(59, 18, 4, 8, 2, 50, '2019-12-01 17:19:24'),
(60, 21, 4, 8, 2, 50, '2019-12-01 17:19:24'),
(61, 4, 4, 8, 2, 50, '2019-12-01 17:19:24'),
(62, 5, 4, 8, 2, 50, '2019-12-01 17:19:24'),
(63, 23, 2, 9, 2, 13, '2019-12-01 17:19:24'),
(64, 5, 2, 9, 2, 100, '2019-12-01 17:19:24'),
(65, 4, 2, 9, 2, 100, '2019-12-01 21:02:35'),
(66, 6, 2, 9, 2, 100, '2019-12-01 21:02:35'),
(67, 15, 2, 9, 2, 100, '2019-12-01 21:03:02'),
(68, 18, 2, 9, 2, 100, '2019-12-01 21:03:02'),
(69, 21, 2, 9, 2, 100, '2019-12-01 21:03:02'),
(70, 10, 2, 9, 2, 100, '2019-12-01 21:03:51'),
(71, 11, 2, 9, 2, 100, '2019-12-01 21:03:51'),
(72, 12, 2, 9, 2, 100, '2019-12-01 21:03:51'),
(73, 23, 1, 10, 2, 10, '2019-12-01 21:21:08'),
(74, 10, 1, 10, 2, 10, '2019-12-01 21:21:49'),
(75, 11, 1, 10, 2, 10, '2019-12-01 21:21:50'),
(76, 6, 1, 10, 2, 10, '2019-12-01 21:22:39'),
(77, 7, 1, 10, 2, 10, '2019-12-01 21:22:39'),
(78, 7, 2, 9, 2, 87, '2019-12-02 03:36:58'),
(83, 23, 4, 11, 1, 50, '2019-12-02 04:48:51'),
(84, 22, 4, 11, 1, 50, '2019-12-02 04:49:08'),
(85, 11, 4, 11, 1, 50, '2019-12-02 04:49:40'),
(86, 12, 4, 11, 1, 50, '2019-12-02 04:49:40'),
(87, 13, 4, 11, 1, 50, '2019-12-02 04:49:40'),
(88, 14, 4, 11, 1, 50, '2019-12-02 04:49:40'),
(89, 15, 4, 11, 1, 50, '2019-12-02 04:49:41'),
(90, 18, 4, 11, 1, 50, '2019-12-02 04:49:41'),
(91, 21, 4, 11, 1, 50, '2019-12-02 04:49:41'),
(95, 4, 4, 11, 1, 50, '2019-12-02 04:59:48'),
(96, 5, 1, 12, 6, 10, '2019-12-02 07:28:17'),
(97, 4, 1, 12, 6, 10, '2019-12-02 07:29:55'),
(98, 6, 1, 12, 6, 10, '2019-12-02 07:29:55'),
(99, 7, 1, 12, 6, 10, '2019-12-02 07:29:55'),
(100, 10, 1, 12, 6, 10, '2019-12-02 07:29:55'),
(101, 11, 1, 12, 6, 10, '2019-12-02 07:29:56'),
(102, 12, 1, 12, 6, 10, '2019-12-02 07:29:56'),
(103, 13, 1, 12, 6, 10, '2019-12-02 07:29:56'),
(104, 14, 1, 12, 6, 10, '2019-12-02 07:29:56'),
(105, 15, 1, 12, 6, 10, '2019-12-02 07:29:56'),
(107, 12, 1, 13, 7, 10, '2019-12-02 13:03:06'),
(108, 13, 1, 13, 7, 10, '2019-12-02 13:03:06'),
(109, 14, 1, 13, 7, 10, '2019-12-02 13:03:06'),
(110, 15, 1, 13, 7, 10, '2019-12-02 13:03:06'),
(111, 16, 1, 13, 7, 10, '2019-12-02 13:03:06'),
(112, 18, 1, 13, 7, 10, '2019-12-02 13:03:07'),
(113, 21, 1, 13, 7, 10, '2019-12-02 13:03:07'),
(114, 22, 1, 13, 7, 10, '2019-12-02 13:03:07'),
(115, 23, 1, 13, 7, 10, '2019-12-02 13:03:07'),
(116, 4, 1, 13, 7, 10, '2019-12-02 13:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `stock` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` text NOT NULL,
  `duration` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `cat_id`, `brand_id`, `body`, `price`, `image`, `type`, `stock`, `discount`, `startDate`, `endDate`, `duration`) VALUES
(17, 'Platilature', 9, 6, 'this is very good for any thing', 140.00, 'upload/52df437f50.jpg', 1, 50, 0, '0000-00-00', '0000-00-00', 0),
(18, 'Sar', 9, 5, '&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&lt;/span&gt;', 180.00, 'upload/3925181aae.jpg', 1, 36, 0, '0000-00-00', '0', 0),
(20, 'Glabs', 9, 4, '&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&amp;nbsp;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&lt;/span&gt;&lt;/span&gt;', 180.00, 'upload/c73f4c6cf7.jpg', 1, 10, 0, '0000-00-00', '0', 0),
(21, 'Mini-Vintage', 8, 5, '&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&amp;nbsp;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&lt;/span&gt;&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis fringilla tortor. Phasellus purus dignissim convallis.&lt;/span&gt;&lt;/span&gt;', 500.00, 'upload/0dcbf05727.jpg', 1, 10, 0, '0000-00-00', '0', 0),
(23, 'Flower Trop', 15, 4, 'Flower are also called the bloom or blossom of a plant. Flowers have petals. Inside the part of the flower that has petals are the parts which produce pollen and seeds. ... We say the plant \'flowers\', \'is flowering\' or \'is in flower\' when this colourful part begins to grow bigger and open out.Flowers are also called the bloom or blossom of a plant. Flowers have petals. Inside the part of the flower that has petals are the parts which produce pollen and seeds. ... We say the plant \'flowers\', \'is flowering\' or \'is in flower\' when this colourful part begins to grow bigger and open out.Flowers are also called the bloom or blossom of a plant. Flowers have petals. Inside the part of the flower that has petals are the parts which produce pollen and seeds. ... We say the plant \'flowers\', \'is flowering\' or \'is in flower\' when this colourful part begins to grow bigger and open out.', 500.00, 'upload/ee207a44f2.jpg', 1, 30, 0, '0000-00-00', '0000-00-00', 0),
(24, 'Flower Trop2', 9, 6, 'Flower Trop Flower TropFlower TropFlower TropFlower TropFlower TropFlower TropFlower TropFlower TropFlower Trop', 180.00, 'upload/912d3e5956.jpg', 1, 8, 0, '0000-00-00', '0000-00-00', 0),
(25, 'Flower Trop3', 5, 4, 'Spirit Airlines wants customers to text them on WhatsApp. Starting September 1, customers can directly text the budget airline for flight reservations, travel modifications, or basic questions in English and Spanish', 100.00, 'upload/b9176d3474.jpg', 1, 10, 0, '0000-00-00', '0000-00-00', 0),
(26, 'Flower Trop4', 4, 2, 'Spirit Airlines wants customers to text them on WhatsApp. Starting September 1, customers can directly text the budget airline for flight reservations, travel modifications, or basic questions in English and Spanish', 180.00, 'upload/45bfeadd42.jpg', 1, 1, 0, '0000-00-00', '0000-00-00', 0),
(27, 'Flower Tops 2', 9, 2, 'Spirit Airlines wants customers to text them on WhatsApp. Starting September 1, customers can directly text the budget airline for flight reservations, travel modifications, or basic questions in English and Spanish', 220.00, 'upload/12567b41ec.jpg', 1, 4, 10, '2019-12-02', '2019-12-05', 3),
(28, 'Water Pipe', 15, 6, 'This is very importent every garden.', 180.00, 'upload/6f201c38c9.jpg', 1, 3, 0, '0000-00-00', '0000-00-00', 0),
(29, 'Cabe Kopay Chili Seed', 15, 2, 'Cabe Kopay is long chilli which is known as Chapai Kobai in Bangladesh.\r\n\r\nSeeds Origin: China\r\nGermination rate: 80%\r\nChili size: Up to 30 CM', 50.00, 'upload/73d1fc6909.jpg', 1, 46, 0, '0000-00-00', '', 0),
(30, 'Weeding Tool', 2, 6, 'This is very Nice....................', 120.00, 'upload/d55e56aa5e.jpg', 0, 50, 0, '0000-00-00', '', 0),
(31, 'quot; Garden Tools Set (3Pcs)', 2, 1, 'important Equipment', 300.00, 'upload/d3f059a67d.jpg', 0, 50, 0, '0000-00-00', '', 0),
(32, 'Vegimax + (4 CPA - Plant Growth Regulator)', 9, 6, 'Vegimax + (4 CPA - Plant Growth Regulator)Vegimax + (4 CPA - Plant Growth Regulator)Vegimax + (4 CPA - Plant Growth Regulator)', 105.00, 'upload/a0ecf0188f.jpg', 0, 20, 0, '0000-00-00', '', 0),
(33, 'Osmocote (13-13-13) 20g', 9, 2, 'Osmocote (13-13-13) 20gOsmocote (13-13-13) 20g', 80.00, 'upload/bf1b361d44.jpg', 0, 27, 0, '0000-00-00', '', 0),
(34, 'Seed Planter Tray', 7, 1, 'it is so much necessary for gardening.', 220.00, 'upload/3b3220ca63.jpg', 0, 40, 0, '0000-00-00', '', 0),
(35, 'Quot; Grill Planter', 7, 6, 'Necessary for gardening', 50.00, 'upload/34eb4e2f99.jpg', 0, 0, 5, '2019-11-30', '2019-12-02', 2),
(36, 'Quot; Grill Planter', 7, 6, 'Text', 220.00, 'upload/811841964f.jpg', 1, 12, 5, '2019-12-02', '2019-12-12', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pro_ratings`
--

CREATE TABLE `pro_ratings` (
  `pro_rat_id` int(10) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `ratings` double(10,2) NOT NULL,
  `ratingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pro_id` int(10) NOT NULL,
  `cus_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_ratings`
--

INSERT INTO `pro_ratings` (`pro_rat_id`, `cus_name`, `cus_email`, `review`, `ratings`, `ratingDate`, `pro_id`, `cus_id`) VALUES
(1, 'Md. Islam', 'shovoua@gmail.com', 'nice', 2.50, '2019-09-09 23:01:45', 27, 2),
(2, 'Md. Islam', 'shovoua@gmail.com', 'Nice Product', 4.00, '2019-09-09 23:11:55', 26, 2),
(3, 'Md. Islam', 'shovoua@gmail.com', 'wow', 5.00, '2019-09-10 07:09:08', 25, 2),
(14, 'Md. Islam', 'shovoua@gmail.com', 'update 24', 4.50, '2019-09-10 08:01:58', 24, 2),
(15, 'Md.Aminul Islam', 'user@gmail.com', 'Owo nice', 5.00, '2019-09-10 17:25:48', 24, 1),
(16, 'Md.Aminul Islam', 'user@gmail.com', 'Not gd', 3.00, '2019-09-11 07:09:46', 25, 1),
(17, 'Md. Islam', 'shovoua@gmail.com', 'nice', 3.50, '2019-09-14 07:17:27', 20, 2),
(18, 'Md. Islam', 'shovoua@gmail.com', 'nice', 3.50, '2019-09-14 08:08:51', 28, 2),
(20, 'Md.Aminul Islam', 'user@gmail.com', 'Wow what s trop', 4.50, '2019-10-03 20:26:54', 27, 1),
(21, 'Test', '123@gmail.com', '1', 0.50, '2019-12-02 13:14:45', 31, 7);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `sub_id` int(10) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `submission_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`sub_id`, `cus_id`, `email`, `submission_date`) VALUES
(4, 2, 'ashadozzamanashadozzaman@gmail.com', '2019-10-10 16:21:04'),
(5, 2, 'shovoua@gmail.com', '2019-10-10 16:28:22'),
(6, 2, 'rafi@daffodil.ac', '2019-12-02 19:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `or_id` varchar(255) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_price` double(10,2) NOT NULL,
  `total_quantity` int(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`or_id`, `cus_id`, `name`, `cname`, `town`, `postcode`, `address`, `phone`, `email`, `date`, `total_price`, `total_quantity`, `status`) VALUES
('5d4ee162c7733', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'system@admin.com', '2019-08-10 21:23:14', 1318.88, 6, 3),
('5d4f24a33518f', 2, 'Ashadozzaman', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'kamrul@islam.com', '2019-08-11 02:10:11', 626.30, 3, 3),
('5d4f26474f66e', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'kamrul@islam.com', '2019-08-11 02:17:11', 951.68, 4, 3),
('5d4f26b023542', 1, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'shovoua@gmail.com', '2019-08-11 02:18:56', 459.02, 2, 3),
('5d505439e442d', 2, 'Ashadozzaman', 'Bangladesh', 'Dhaka', '1215', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'ashadozzamanashadozzaman@gmail.com', '2019-08-11 23:45:29', 417.20, 2, 3),
('5d519deed651e', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'ashadozzamanshovoua@gmail.com', '2019-08-12 23:12:14', 2229.74, 11, 3),
('5d52f19b13daf', 2, 'Md. Ashadozzaman Shovoua', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'user@gmail.com', '2019-08-13 23:21:31', 175.46, 1, 3),
('5d54245b75ac3', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'ashadozzamanshovoua@gmail.com', '2019-08-14 21:10:19', 1093.46, 5, 3),
('5d543520eea2b', 2, 'Ashadozzaman', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'user@gmail.com', '2019-08-14 22:21:52', 1044.50, 7, 3),
('5d55078d81e32', 2, 'Ashadozzaman', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'shovoua@gmail.com', '2018-08-15 13:19:41', 2130.80, 6, 3),
('5d56b55c128a9', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'kamrul@islam.com', '2019-08-16 19:53:32', 927.20, 3, 3),
('5d5d88ac6c789', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'kamrul@islam.com', '2019-08-22 00:08:44', 233.60, 1, 3),
('5d68c4c06591e', 2, 'Ashadozzaman', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'ashadozzamanashadozzaman@gmail.com', '2019-08-30 12:40:00', 233.60, 1, 3),
('5d69234cb690f', 2, 'Ashadozzaman', 'Bangladesh', 'Dhaka', '1215', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'user@gmail.com', '2018-08-30 19:23:24', 1437.20, 8, 3),
('5d692c620b88d', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'ashadozzamanashadozzaman@gmail.com', '2019-11-30 20:02:10', 274.40, 1, 3),
('5d6937426b772', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'ashadozzamanashadozzaman@gmail.com', '2019-11-30 20:48:34', 274.40, 1, 3),
('5d6937cf26328', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'shovoua@gmail.com', '2019-08-30 20:50:55', 233.60, 1, 1),
('5d693a4619b45', 2, 'Md. Ashadozzaman Shovoua', 'Bangladesh', 'Dhaka', '1215', 'westRaza bazar', '01762662171', 'ashadozzamanashadozzaman@gmail.com', '2019-08-30 21:01:26', 274.40, 1, 3),
('5d7352c394840', 1, 'Md. Ashadozzaman Shovoua', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'shovoua@gmail.com', '2019-09-07 12:48:35', 233.60, 1, 3),
('5d795bc28dee3', 1, 'Md. Ashadozzaman Shovoua', 'Bangladesh', 'Dhaka', '1215', 'westRaza bazar', '01762662171', 'shovoua@gmail.com', '2019-09-12 02:40:34', 723.20, 3, 3),
('5d7cc1cf2ab9f', 2, 'Md. Ashadozzaman Shovoua', 'Bangladesh', 'Dhaka', '1209', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'shovoua@gmail.com', '2019-09-14 16:32:47', 968.00, 5, 3),
('5d9737c476f87', 1, 'Shvou', 'Bangladesh', 'Dhaka', '1218', '1218', '01762662171', 'shovoua@gmail.com', '2019-10-04 18:15:00', 233.60, 1, 3),
('5d9739161896a', 1, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'ashadozzamanashadozzaman@gmail.com', '2019-10-04 18:20:38', 274.40, 1, 0),
('5d97685317e21', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'Panthapoth,Dhaka,Bangladesh', '01762662171', 'shovoua@gmail.com', '2019-10-04 21:42:11', 233.60, 1, 0),
('5d976b207f006', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'shovoua@gmail.com', '2019-10-04 21:54:08', 233.60, 1, 0),
('5d9b5f554a126', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'shovoua@gmail.com', '2019-10-07 21:52:53', 662.00, 2, 1),
('5dd1d68e57a31', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'shovoua@gmail.com', '2019-11-18 05:23:58', 1274.00, 3, 0),
('5dd3001dd7b25', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'westRaza bazar', '01762662171', 'shovoua@gmail.com', '2019-11-19 02:33:33', 417.20, 2, 0),
('5dd5c0d1543b6', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'shovoua@gmail.com', '2019-11-21 04:40:17', 437.60, 5, 0),
('5de35850a41ad', 2, 'Shvou', 'Bangladesh', 'Dhaka', '1218', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'shovoua@gmail.com', '2019-12-01 12:06:08', 3028.40, 19, 3),
('5de50ea6675f8', 7, 'Shvou', 'DIA', 'Dhaka', '1218', 'West Raza Bazar, 51/a/1, Dhaka', '01762662171', 'shovoua@gmail.com', '2019-12-02 19:16:22', 2824.40, 54, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package_booking`
--

CREATE TABLE `tbl_package_booking` (
  `package_book_id` int(10) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `pkg_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `town` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duration` int(10) NOT NULL COMMENT 'month',
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `start_reminder` date NOT NULL,
  `end_reminder` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package_booking`
--

INSERT INTO `tbl_package_booking` (`package_book_id`, `cus_id`, `pkg_id`, `name`, `cname`, `address`, `town`, `phone`, `email`, `date`, `duration`, `startDate`, `endDate`, `status`, `start_reminder`, `end_reminder`) VALUES
(1, 1, 1, 'Ashadozzaman', 'DIA', 'West Raza Bazar, 51/a/1, Dhaka', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-09-30 16:48:42', 1, '2019-10-01', '2019-09-27', 'complete', '0000-00-00', '0000-00-00'),
(3, 1, 2, 'Shvou', 'Ban', 'West Raza Bazar, 51/a/1, Dhaka', 'Dhaka', '01762662171', 'ashadozzamanshovoua@gmail.com', '2019-09-30 17:02:58', 1, '2019-10-02', '2019-11-02', 'complete', '0000-00-00', '0000-00-00'),
(4, 2, 1, 'Ashadozzaman', 'DIA', 'West Raza Bazar, 51/a/1, Dhaka', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-10-12 10:28:03', 1, '2019-10-12', '2019-11-12', 'complete', '0000-00-00', '0000-00-00'),
(7, 2, 1, 'Shvou', 'Bangladesh', 'West Raza Bazar, 51/a/1, Dhaka', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-11-18 11:36:20', 1, '2019-12-02', '2019-11-28', 'complete', '0000-00-00', '0000-00-00'),
(8, 2, 4, 'Shvou', 'Bangladesh', 'West Raza Bazar, 51/a/1, Dhaka', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-11-18 12:12:20', 12, '2019-11-18', '2020-11-18', 'running', '2019-12-02', '2019-12-17'),
(9, 2, 2, 'Md. Ashadozzaman Shovoua', 'Bangladesh', 'westRaza bazar', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-11-18 12:27:36', 1, '2019-12-02', '2020-01-02', 'running', '2019-12-02', '2019-12-17'),
(11, 1, 4, 'Shvou', 'DIA', 'Panthapoth,Dhaka,Bangladesh', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-12-02 04:32:18', 2, '2019-12-02', '2020-02-02', 'running', '2019-12-02', '2019-12-17'),
(12, 6, 1, 'Shvou', 'DIA', 'Panthapoth,Dhaka', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-12-02 07:27:44', 2, '2019-12-02', '2020-02-02', 'running', '2019-12-02', '2019-12-17'),
(13, 7, 1, 'Shvou', 'DIA', 'West Raza Bazar, 51/a/1, Dhaka', 'Dhaka', '01762662171', 'shovoua@gmail.com', '2019-12-02 12:58:00', 1, '2019-12-02', '2019-12-30', 'running', '2019-12-02', '2019-12-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adid`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`Chat_Id`);

--
-- Indexes for table `customepackage`
--
ALTER TABLE `customepackage`
  ADD PRIMARY KEY (`CPID`);

--
-- Indexes for table `customepackagedetails`
--
ALTER TABLE `customepackagedetails`
  ADD PRIMARY KEY (`cpd_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `fixed_packages`
--
ALTER TABLE `fixed_packages`
  ADD PRIMARY KEY (`pkg_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `orderdetails_ibfk_1` (`or_id`);

--
-- Indexes for table `package_cart`
--
ALTER TABLE `package_cart`
  ADD PRIMARY KEY (`pkg_cart_id`);

--
-- Indexes for table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`plant_id`);

--
-- Indexes for table `plants_package`
--
ALTER TABLE `plants_package`
  ADD PRIMARY KEY (`pp_id`),
  ADD KEY `plant_id` (`plant_id`),
  ADD KEY `plants_package_ibfk_1` (`pkg_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `pro_ratings`
--
ALTER TABLE `pro_ratings`
  ADD PRIMARY KEY (`pro_rat_id`),
  ADD KEY `pro_ratings_ibfk_1` (`cus_id`),
  ADD KEY `pro_ratings_ibfk_2` (`pro_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `tbl_package_booking`
--
ALTER TABLE `tbl_package_booking`
  ADD PRIMARY KEY (`package_book_id`),
  ADD KEY `tbl_package_booking_ibfk_1` (`cus_id`),
  ADD KEY `tbl_package_booking_ibfk_2` (`pkg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `Chat_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customepackage`
--
ALTER TABLE `customepackage`
  MODIFY `CPID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customepackagedetails`
--
ALTER TABLE `customepackagedetails`
  MODIFY `cpd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `dis_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fixed_packages`
--
ALTER TABLE `fixed_packages`
  MODIFY `pkg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_details_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `package_cart`
--
ALTER TABLE `package_cart`
  MODIFY `pkg_cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `plants`
--
ALTER TABLE `plants`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `plants_package`
--
ALTER TABLE `plants_package`
  MODIFY `pp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pro_ratings`
--
ALTER TABLE `pro_ratings`
  MODIFY `pro_rat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_package_booking`
--
ALTER TABLE `tbl_package_booking`
  MODIFY `package_book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`or_id`) REFERENCES `tbl_order` (`or_id`) ON DELETE CASCADE;

--
-- Constraints for table `plants_package`
--
ALTER TABLE `plants_package`
  ADD CONSTRAINT `plants_package_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`plant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pro_ratings`
--
ALTER TABLE `pro_ratings`
  ADD CONSTRAINT `pro_ratings_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pro_ratings_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_package_booking`
--
ALTER TABLE `tbl_package_booking`
  ADD CONSTRAINT `tbl_package_booking_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_package_booking_ibfk_2` FOREIGN KEY (`pkg_id`) REFERENCES `fixed_packages` (`pkg_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
