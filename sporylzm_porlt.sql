-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2021 at 12:23 PM
-- Server version: 5.7.34-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphavi1_porlt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fulname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_t` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fulname`, `username`, `level`, `password`, `date_t`) VALUES
(1, 'Admin', 'admin@admin.com', '1', 'd033e22ae348aeb5660fc2140aec35850c4da997', ''),
(2, 'Admin Test', 'admin@test.com', '1', '8cb2237d0679ca88db6464eac60da96345513964', '25-Jun-2021');

-- --------------------------------------------------------

--
-- Table structure for table `des_area`
--

CREATE TABLE `des_area` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `des_area`
--

INSERT INTO `des_area` (`id`, `state_id`, `area`, `post_code`, `created_at`) VALUES
(1, 2, 'Ikeja', '10011', '2021-06-29 10:24:11'),
(2, 2, 'Berger', '10012', '2021-06-29 10:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `des_cities`
--

CREATE TABLE `des_cities` (
  `id` int(11) NOT NULL,
  `cities` varchar(250) NOT NULL,
  `date_t` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `des_cities`
--

INSERT INTO `des_cities` (`id`, `cities`, `date_t`) VALUES
(2, 'Lagos', '12-Apr-2021'),
(3, 'Abuja', '22-Apr-2021'),
(4, 'Port Harcourt', '22-Apr-2021'),
(5, 'Benin City', '22-Apr-2021'),
(6, 'Asaba', '22-Apr-2021'),
(7, 'Warri', '22-Apr-2021'),
(8, 'Onitsha', '22-Apr-2021'),
(9, 'Aba', '25-Apr-2021'),
(10, 'Abakaliki', '25-Apr-2021'),
(11, 'Abeokuta', '25-Apr-2021'),
(12, 'Agbor', '25-Apr-2021'),
(13, 'Akure', '25-Apr-2021'),
(14, 'Awka', '25-Apr-2021'),
(15, 'Bauchi', '25-Apr-2021'),
(16, 'Enugu', '25-Apr-2021'),
(17, 'Calabar', '25-Apr-2021'),
(18, 'Ibadan', '25-Apr-2021'),
(19, 'Ikot Ekpene', '25-Apr-2021'),
(20, 'Ilorin', '25-Apr-2021'),
(21, 'Jos', '25-Apr-2021'),
(22, 'Kaduna', '25-Apr-2021'),
(23, 'Kano', '25-Apr-2021'),
(24, 'Maiduguri', '25-Apr-2021'),
(25, 'Nsukka', '25-Apr-2021'),
(26, 'Okigwe', '25-Apr-2021'),
(27, 'Osogbo', '25-Apr-2021'),
(28, 'Sokoto', '25-Apr-2021'),
(29, 'Umuahia', '25-Apr-2021'),
(30, 'Uyo', '25-Apr-2021'),
(31, 'Zaria', '25-Apr-2021');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `discount` varchar(250) NOT NULL,
  `insurance` varchar(250) NOT NULL,
  `date_t` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `discount`, `insurance`, `date_t`) VALUES
(1, '50', '100', '18-Apr-2021');

-- --------------------------------------------------------

--
-- Table structure for table `drop_offs`
--

CREATE TABLE `drop_offs` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `parcel_id` varchar(250) NOT NULL,
  `parcel_code` varchar(250) NOT NULL,
  `delivery` varchar(250) NOT NULL,
  `parcel_type` varchar(250) NOT NULL,
  `parcel_weight` varchar(250) NOT NULL,
  `parcel_size` varchar(250) NOT NULL,
  `package_photo` varchar(250) NOT NULL,
  `origin_city` varchar(250) NOT NULL,
  `origin_terminal_address` varchar(250) NOT NULL,
  `des_city` varchar(250) NOT NULL,
  `des_terminal_address` varchar(250) NOT NULL,
  `pickup_date` varchar(250) NOT NULL,
  `pickup_time` varchar(250) NOT NULL,
  `sender` varchar(250) NOT NULL,
  `sender_phone` varchar(250) NOT NULL,
  `receiver` varchar(250) NOT NULL,
  `receiver_phone` varchar(250) NOT NULL,
  `courier` varchar(250) NOT NULL,
  `final_des` varchar(250) NOT NULL,
  `final_des_name` varchar(250) NOT NULL,
  `carrier` varchar(250) NOT NULL DEFAULT 'none',
  `carrier_id` varchar(250) NOT NULL,
  `carrier_phone` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `discount` varchar(250) NOT NULL,
  `insurance` varchar(250) NOT NULL,
  `earned` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `payment_status` varchar(250) NOT NULL,
  `date_t` varchar(250) NOT NULL,
  `time_t` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drop_offs`
--

INSERT INTO `drop_offs` (`id`, `user`, `parcel_id`, `parcel_code`, `delivery`, `parcel_type`, `parcel_weight`, `parcel_size`, `package_photo`, `origin_city`, `origin_terminal_address`, `des_city`, `des_terminal_address`, `pickup_date`, `pickup_time`, `sender`, `sender_phone`, `receiver`, `receiver_phone`, `courier`, `final_des`, `final_des_name`, `carrier`, `carrier_id`, `carrier_phone`, `location`, `amount`, `discount`, `insurance`, `earned`, `status`, `payment_status`, `date_t`, `time_t`) VALUES
(58, 'cjpounds@hotmail.com', '970174', '65551', 'Inter', 'Letter', '0.5-5 kg', '37*36*60', '', 'Abuja', 'PMT Gwagwalada', 'Lagos', 'PMT Jibowu', '2021-05-12', '06:00', 'Chuks', '08066899920', 'Wisdom Ugo', '080668099920', '[object HTMLInputElement]', '', '', 'none', '', '', '', '', '', '', '', 'Pending', 'Pending', '11-May-2021', ''),
(59, 'cjpounds@hotmail.com', '768238', '23327', 'Inter', 'Letter', '0.5-5 kg', '3*25*40', '', 'Lagos', 'PMT-Jibowu', 'Abuja', 'PMT-Gwagwalada', '2021-05-12', '06:15', 'Justice', '08066899920', 'Wisdom Ugo', '080668099920', '[object HTMLInputElement]', '', '', 'Justice ', 'cjpounds@hotmail.com', '08066899920', '', '2500', '0.00', '0.00', '2000', 'Picked Up', 'Successful', '11-May-2021', ''),
(60, 'cjpounds@hotmail.com', '521155', '22560', 'Inter', 'Package S-L', '11-15 kg', '3*25*40', '', 'Lagos', 'GIG Jibowu', 'Abuja', 'GOG UTAKO', '2021-05-12', '06:15', '', '08066899920', 'James O', '08066899920', '[object HTMLInputElement]', '', '', 'none', '', '', '', '3306', '0.00', '0.00', '2644.75', 'Pending', 'Pending', '11-May-2021', ''),
(61, 'daviscool567@gmail.com', '750822', '69284', 'Inter', 'Package S-L', '16-20 kg', '37*36*60', '', 'Lagos', 'GIG Iyana Ipaja', 'Calabar', 'GIG calabar', '2021-05-12', '11:00', 'Micheal', '07067879261', 'Dave', '07067879261', '[object HTMLInputElement]', '', '', 'none', '', '', '', '', '', '', '', 'Pending', 'Pending', '12-May-2021', ''),
(62, 'daviscool567@gmail.com', '852756', '59553', 'Inter', 'Letter', '0.5-5 kg', '3*25*40', '', 'Lagos', 'GIG Iyana Ipaja', 'Abuja', 'GIG Abuja', '2021-05-12', '11:02', 'Micheal', '07067879261', 'OBINNA NGAIKEDI', '07067879261', '[object HTMLInputElement]', '', '', 'Davis', 'daviscool567@gmail.com', '07067879261', '', '2500', '0.00', '0.00', '2000', 'Picked Up', 'Successful', '12-May-2021', ''),
(63, 'cjpounds@hotmail.com', '570978', '53102', 'Inter', 'Package S-L', '0.5-5 kg', '37*36*60', '', 'Lagos', 'God is good motors - Maza maza', 'Abuja', 'God is good motors -Utako', '2021-05-14', '06:00', 'Justice Okereke', '08066899920', 'Romiwa Umoru', '09016852715', '[object HTMLInputElement]', '', '', 'Justice ', 'cjpounds@hotmail.com', '08066899920', '', '2500', '0.00', '0.00', '2000', 'Accepted', 'Successful', '13-May-2021', ''),
(64, 'weverifind@gmail.com', '373955', '61490', 'Inter', 'Letter', '0.5-5 kg', '3*25*40', '', 'Lagos', 'God is good motors maza maza', 'Abuja', 'God is good motors', '2021-05-28', '03:25', 'Ndubuisi Obasi', '08068239574', 'Ete Obasi', '08068239574', '[object HTMLInputElement]', '', '', 'Ndubuisi Obasi', 'weverifind@gmail.com', '08068239574', '', '2500', '0.00', '0.00', '2000', 'Delivered', 'Successful', '13-May-2021', ''),
(65, 'cjpounds@hotmail.com', '143072', '41375', 'Inter', 'Letter', '0.5-5 kg', '3*25*40', '', 'Lagos', 'GIG', 'Abuja', 'GIG', '2021-05-17', '06:15', 'Nill', '08066899920', 'Humphrey ', '08900011112', '[object HTMLInputElement]', '', '', 'none', '', '', '', '2500', '0.00', '0.00', '2000', 'Pending', 'Successful', '16-May-2021', ''),
(66, 'cjpounds@hotmail.com', '529644', '51175', 'Inter', 'Package S-L', '0.5-5 kg', '3*25*40', '', 'Lagos', 'Peace Mass Transport- Jibowu', 'Abuja', 'Peace Mass Transport - Utako', '2021-05-24', '12:30', 'Giovanny Jahkasi ', '08066899920', 'Adadiche Kaela', '08067859043', '[object HTMLInputElement]', '', '', 'none', '', '', '', '2500', '0.00', '0.00', '2000', 'Pending', 'Pending', '23-May-2021', ''),
(67, 'cjpounds@hotmail.com', '575814', '35535', 'Inter', 'Package S-L', '0.5-5 kg', '3*25*40', '', 'Lagos', 'Peace Mass Transport- Jibowu', 'Abuja', 'Peace Mass Transport - Utako', '2021-05-24', '12:30', 'Giovanny Jahkasi ', '08066899920', 'Adadiche Kaela', '08067859043', '[object HTMLInputElement]', '', '', 'none', '', '', '', '2500', '0.00', '0.00', '2000', 'Pending', 'Pending', '23-May-2021', ''),
(68, 'cjpounds@hotmail.com', '548236', '50331', 'Inter', 'Package S-L', '0.5-5 kg', '3*25*40', '', 'Lagos', 'Peace Mass Transport- Jibowu', 'Abuja', 'Peace Mass Transport - Utako', '2021-05-24', '12:30', 'Giovanny Jahkasi ', '08066899920', 'Adadiche Kaela', '08067859043', '[object HTMLInputElement]', '', '', 'none', '', '', '', '2500', '0.00', '0.00', '2000', 'Pending', 'Pending', '23-May-2021', ''),
(69, 'cjpounds@hotmail.com', '598087', '62526', 'Inter', 'Package S-L', '0.5-5 kg', '3*25*40', '', 'Lagos', 'Peace Mass Transport- Jibowu', 'Abuja', 'Peace Mass Transport - Utako', '2021-05-24', '12:30', 'Giovanny Jahkasi ', '08066899920', 'Adadiche Kaela', '08067859043', '[object HTMLInputElement]', '', '', 'none', '', '', '', '2500', '0.00', '0.00', '2000', 'Pending', 'Pending', '23-May-2021', ''),
(70, 'cjpounds@hotmail.com', '287857', '22174', 'Inter', 'Package S-L', '0.5-5 kg', '3*25*40', '', 'Lagos', 'Peace Mass Transport- Jibowu', 'Abuja', 'Peace Mass Transport - Utako', '2021-05-24', '12:30', 'Giovanny Jahkasi ', '08066899920', 'Adadiche Kaela', '08067859043', '[object HTMLInputElement]', '', '', 'none', '', '', '', '2500', '0.00', '0.00', '2000', 'Pending', 'Pending', '23-May-2021', ''),
(71, 'cjpounds@hotmail.com', '718013', '46211', 'Inter', 'Package S-L', '0.5-5 kg', '3*25*40', '', 'Lagos', 'Peace Mass Transport- Jibowu', 'Abuja', 'Peace Mass Transport - Utako', '2021-05-24', '12:30', 'Giovanny Jahkasi ', '08066899920', 'Adadiche Kaela', '08067859043', '[object HTMLInputElement]', '', '', 'none', '', '', '', '2500', '0.00', '0.00', '2000', 'Pending', 'Pending', '23-May-2021', ''),
(72, 'cjpounds@hotmail.com', '711368', '74138', 'Inter', 'Package S-L', '0.5-5 kg', '3*25*40', '', 'Lagos', 'Peace Mass Transport- Jibowu', 'Abuja', 'Peace Mass Transport - Utako', '2021-05-24', '12:30', 'Giovanny Jahkasi ', '08066899920', 'Adadiche Kaela', '08067859043', '[object HTMLInputElement]', '', '', 'none', '', '', '', '2500', '0.00', '0.00', '2000', 'Pending', 'Pending', '23-May-2021', ''),
(73, 'cjpounds@hotmail.com', '664090', '72582', 'Inter', 'Package S-L', '0.5-5 kg', '3*25*40', '', 'Lagos', 'Peace Mass Transport- Jibowu', 'Abuja', 'Peace Mass Transport - Utako', '2021-05-24', '12:30', 'Giovanny Jahkasi ', '08066899920', 'Adadiche Kaela', '08067859043', '[object HTMLInputElement]', '', '', 'none', '', '', '', '2500', '0.00', '0.00', '2000', 'Pending', 'Pending', '23-May-2021', ''),
(74, 'cjpounds@hotmail.com', '865367', '23536', 'Inter', 'Package S-L', '0.5-5 kg', '3*25*40', '', 'Lagos', 'Peace Mass Transport- Jibowu', 'Abuja', 'Peace Mass Transport - Utako', '2021-05-24', '12:30', 'Giovanny Jahkasi ', '08066899920', 'Adadiche Kaela', '08067859043', '[object HTMLInputElement]', '', '', 'none', '', '', '', '2500', '0.00', '0.00', '2000', 'Pending', 'Pending', '23-May-2021', ''),
(75, 'cjpounds@hotmail.com', '647762', '29699', 'Inter', 'Package S-L', '0.5-5 kg', '3*25*40', '', 'Lagos', 'Peace Mass Transport- Jibowu', 'Abuja', 'Peace Mass Transport - Utako', '2021-05-24', '12:30', 'Giovanny Jahkasi ', '08066899920', 'Adadiche Kaela', '08067859043', '[object HTMLInputElement]', '', '', 'none', '', '', '', '2500', '0.00', '0.00', '2000', 'Pending', 'Pending', '23-May-2021', ''),
(76, 'daviscool567@gmail.com', '396270', '37482', 'Inter', 'Letter', '11-15 kg', '3*25*40', '', 'Lagos', '615 W Santa Gertrudis St', 'Abeokuta', '5, Oremeji st, Akinde, Alakuko, Lagos', '2021-05-23', '09:09', 'Micheal', '07067879261', 'OBINNA NGAIKEDI', '07067879261', '[object HTMLInputElement]', '', '', 'none', '', '', '', '', '', '', '', 'Pending', 'Pending', '23-May-2021', ''),
(77, 'daviscool567@gmail.com', '960939', '17640', 'Inter', 'Letter', '11-15 kg', '3*25*40', '', 'Lagos', '615 W Santa Gertrudis St', 'Abeokuta', '5, Oremeji st, Akinde, Alakuko, Lagos', '2021-05-23', '09:09', 'Micheal', '07067879261', 'OBINNA NGAIKEDI', '07067879261', '[object HTMLInputElement]', '', '', 'none', '', '', '', '', '', '', '', 'Pending', 'Pending', '23-May-2021', ''),
(78, 'daviscool567@gmail.com', '335950', '45463', 'Inter', 'Letter', '0.5-5 kg', '3*25*40', '', 'Onitsha', '5, Oremeji st, Akinde, Alakuko, Lagos', 'Aba', '5, Oremeji st, Akinde, Alakuko, Lagos', '2021-05-23', '09:08', 'Davis', '07067879261', 'OBINNA NGAIKEDI', '07067879261', '', '', '', 'none', '', '', '', '', '', '', '', 'Pending', 'Pending', '23-May-2021', ''),
(79, 'daviscool567@gmail.com', '134072', '67452', 'Inter', '', '', '', '', '', '', '', '', '2021-05-23', '', '', '07067879261', '', '', '', '', '', 'none', '', '', '', '', '', '', '', 'Pending', 'Pending', '23-May-2021', ''),
(80, '', '573788', '20879', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'none', '', '', '', '', '', '', '', 'Pending', 'Pending', '23-May-2021', ''),
(81, '', '281183', '47504', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'none', '', '', '', '', '', '', '', 'Pending', 'Pending', '23-May-2021', ''),
(82, 'daviscool567@gmail.com', '735582', '32249', 'Inter', 'Letter', '16-20 kg', '37*36*60', '', 'Lagos', '5, Oremeji st, Akinde, Alakuko, Lagos', 'Kaduna', '59, Oduduwa way,', '2021-05-23', '00:30', '', '07067879261', 'OBINNA NGAIKEDI', '07067879261', '', '', '', 'none', '', '', '', '', '', '', '', 'Pending', 'Pending', '23-May-2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `inter_cost`
--

CREATE TABLE `inter_cost` (
  `id` int(11) NOT NULL,
  `state1` varchar(250) NOT NULL,
  `state2` varchar(250) NOT NULL,
  `kg` varchar(250) NOT NULL,
  `cost` varchar(250) NOT NULL,
  `discount` varchar(250) NOT NULL,
  `multiplier` varchar(250) NOT NULL,
  `earned` varchar(250) NOT NULL,
  `insurance` varchar(250) NOT NULL,
  `date_t` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inter_cost`
--

INSERT INTO `inter_cost` (`id`, `state1`, `state2`, `kg`, `cost`, `discount`, `multiplier`, `earned`, `insurance`, `date_t`) VALUES
(14, 'Lagos', 'Abuja', '0.5-5 kg', '2500', '0.00', '', '2000', '0.00', '06-May-2021'),
(15, 'Lagos', 'Abuja', '6-10 kg', '2875', '0.00', '', '2300', '0.00', '06-May-2021'),
(16, 'Lagos', 'Abuja', '11-15 kg', '3306', '0.00', '', '2644.75', '0.00', '09-May-2021'),
(17, 'Lagos', 'Abuja', '16-20 kg', '3802', '0.00', '', '3042', '0.00', '06-May-2021'),
(18, 'Lagos', 'Abuja', '21-25 kg', '4372.19', '0.00', '', '3497.75', '0.00', '09-May-2021'),
(19, 'Abuja', 'Lagos', '0.5-5 kg', '2500', '00.00', '', '2000', '00.00', '18-May-2021'),
(20, 'Abuja', 'Lagos', '6-10 kg', '2875', '00.00', '', '2300', '00.00', '18-May-2021'),
(21, 'Abuja', 'Lagos', '11-15 kg', '3306', '00.00', '', '2645', '00.00', '18-May-2021'),
(22, 'Abuja', 'Lagos', '16-20 kg', '3802', '00.00', '', '3042', '00.00', '18-May-2021'),
(23, 'Abuja', 'Lagos', '21-25 kg', '4372', '00.00', '', '3498', '00.00', '18-May-2021');

-- --------------------------------------------------------

--
-- Table structure for table `intra_cost`
--

CREATE TABLE `intra_cost` (
  `id` int(11) NOT NULL,
  `state` varchar(250) NOT NULL,
  `kg` varchar(250) NOT NULL,
  `cost` varchar(250) NOT NULL,
  `discount` varchar(250) NOT NULL,
  `multiplier` varchar(250) NOT NULL,
  `earned` varchar(250) NOT NULL,
  `insurance` varchar(250) NOT NULL,
  `date_t` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `intra_cost`
--

INSERT INTO `intra_cost` (`id`, `state`, `kg`, `cost`, `discount`, `multiplier`, `earned`, `insurance`, `date_t`) VALUES
(2, 'Lagos', '0.5-5 kg', '1500', '0', '', '', '0', '27-Apr-2021');

-- --------------------------------------------------------

--
-- Table structure for table `kg_range`
--

CREATE TABLE `kg_range` (
  `id` int(11) NOT NULL,
  `kg` varchar(250) NOT NULL,
  `date_t` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kg_range`
--

INSERT INTO `kg_range` (`id`, `kg`, `date_t`) VALUES
(15, '11-15 kg', '26-Apr-2021'),
(16, '6-10 kg', '26-Apr-2021'),
(17, '16-20 kg', '26-Apr-2021'),
(18, '21-25 kg', '26-Apr-2021'),
(19, '26-30 kg', '26-Apr-2021'),
(20, '0.5-5 kg', '26-Apr-2021');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `sender` varchar(250) NOT NULL,
  `msg` mediumtext NOT NULL,
  `data_type` text NOT NULL,
  `msg_type` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date_t` varchar(250) NOT NULL,
  `time_t` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user`, `sender`, `msg`, `data_type`, `msg_type`, `role`, `status`, `date_t`, `time_t`) VALUES
(40, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Ok. Nice', '', 'Sender', 'Sender', 'Read', '22-04-2021', '04:44 pm'),
(41, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Cool', '', 'Sender', 'Sender', 'Read', '22-04-2021', '04:55 pm'),
(42, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'holy', '', 'Sender', 'Sender', 'Read', '22-04-2021', '04:56 pm'),
(43, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'glory', '', 'Sender', 'Sender', 'Read', '22-04-2021', '04:56 pm'),
(44, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'hi', '', 'Sender', 'Sender', 'Read', '22-04-2021', '06:03 pm'),
(45, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'hi', '', 'Sender', 'Sender', 'Read', '22-04-2021', '06:03 pm'),
(46, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'hi', '', 'Sender', 'Sender', 'Read', '22-04-2021', '06:28 pm'),
(47, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Good ', '', 'Sender', 'Sender', 'Read', '22-04-2021', '06:39 pm'),
(48, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'OK ooo', '', 'Sender', 'Sender', 'Read', '22-04-2021', '06:39 pm'),
(49, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hello', '', 'Sender', 'Sender', 'Read', '22-04-2021', '06:39 pm'),
(50, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Oi', '', 'Sender', 'Sender', 'Read', '23-04-2021', '03:44 am'),
(51, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'I\'m trying to reach the Carrier ', '', 'Sender', 'Sender', 'Read', '24-04-2021', '09:28 am'),
(52, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'I\'m ', '', 'Sender', 'Sender', 'Read', '24-04-2021', '09:28 am'),
(53, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'I\'ve ', '', 'Sender', 'Sender', 'Read', '24-04-2021', '09:29 am'),
(54, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'We\'re ', '', 'Sender', 'Sender', 'Read', '24-04-2021', '09:29 am'),
(55, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'There\'s ', '', 'Sender', 'Sender', 'Read', '24-04-2021', '09:29 am'),
(56, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hello ', '', 'Sender', 'Sender', 'Read', '24-04-2021', '05:05 pm'),
(57, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'I\'m there', '', 'Sender', 'Sender', 'Read', '24-04-2021', '05:06 pm'),
(58, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Aren\'t you?', '', 'Sender', 'Sender', 'Read', '24-04-2021', '05:06 pm'),
(59, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'We\'re there?', '', 'Sender', 'Sender', 'Read', '24-04-2021', '05:06 pm'),
(60, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'He\'s there', '', 'Sender', 'Sender', 'Read', '24-04-2021', '05:06 pm'),
(61, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Aren\'t ', '', 'Sender', 'Sender', 'Read', '24-04-2021', '05:32 pm'),
(62, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Ok... We getting there', '', 'Sender', 'Sender', 'Read', '02-05-2021', '10:55 pm'),
(63, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'He\'s cool', '', 'Sender', 'Sender', 'Read', '02-05-2021', '10:55 pm'),
(64, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'I\'m ', '', 'Sender', 'Sender', 'Read', '03-05-2021', '03:30 am'),
(65, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'hi', '', 'Carrier', 'Sender', 'Read', '03-05-2021', '01:43 pm'),
(66, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Great', '', 'Carrier', 'Sender', 'Read', '03-05-2021', '01:43 pm'),
(67, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Hi', '', 'Carrier', 'Sender', 'Read', '04-05-2021', '08:53 am'),
(68, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Oi', '', 'Carrier', 'Sender', 'Read', '04-05-2021', '08:55 am'),
(69, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'I\'m going ', '', 'Carrier', 'Sender', 'Read', '04-05-2021', '08:57 am'),
(70, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'I\'m good', '', 'Carrier', 'Sender', 'Read', '11-05-2021', '06:06 am'),
(71, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'I\'m ', '', 'Sender', 'Sender', 'Read', '11-05-2021', '08:39 am'),
(72, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Hi bro', '', 'Carrier', 'Sender', 'Read', '12-05-2021', '01:58 pm'),
(73, 'cjpounds@hotmail.com', 'daviscool567@gmail.com', 'Hi testing admin', '', 'Sender', 'Admin', 'Read', '12-05-2021', '04:27 pm'),
(74, 'cjpounds@hotmail.com', 'daviscool567@gmail.com', 'Hi testing admin', '', 'Sender', 'Admin', 'Read', '12-05-2021', '04:27 pm'),
(75, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Admin', '', 'Sender', 'Admin', 'Read', '12-05-2021', '04:31 pm'),
(76, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Admin', '', 'Sender', 'Admin', 'Read', '12-05-2021', '04:31 pm'),
(77, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Admin22', '', 'Sender', 'Admin', 'Read', '12-05-2021', '04:31 pm'),
(78, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hi', '', 'Sender', 'Sender', 'Read', '12-05-2021', '11:01 pm'),
(79, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'I\'m ', '', 'Sender', 'Sender', 'Read', '12-05-2021', '11:01 pm'),
(80, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hello', '', 'Carrier', 'Sender', 'Read', '12-05-2021', '11:05 pm'),
(81, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Oi', '', 'Carrier', 'Sender', 'Read', '12-05-2021', '11:05 pm'),
(82, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Oi', '', 'Carrier', 'Sender', 'Read', '12-05-2021', '11:06 pm'),
(83, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Nice one ', '', 'Carrier', 'Sender', 'Read', '13-05-2021', '07:10 am'),
(84, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Checking', '', 'Carrier', 'Sender', 'Read', '13-05-2021', '07:11 am'),
(85, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Ohh i see why now ', '', 'Sender', 'Sender', 'Read', '13-05-2021', '07:12 am'),
(86, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Nice though', '', 'Sender', 'Sender', 'Read', '13-05-2021', '07:12 am'),
(87, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'I\'m good ', '', 'Sender', 'Sender', 'Read', '13-05-2021', '07:12 am'),
(88, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Oi', '', 'Sender', 'Sender', 'Read', '13-05-2021', '07:34 am'),
(89, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'I\'m going ', '', 'Sender', 'Sender', 'Read', '13-05-2021', '07:35 am'),
(90, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Okay', '', 'Sender', 'Sender', 'Read', '13-05-2021', '08:52 am'),
(91, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hi', '', 'Sender', 'Sender', 'Read', '13-05-2021', '09:04 am'),
(92, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hello', '', 'Carrier', 'Admin', 'Read', '13-05-2021', '09:04 am'),
(93, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hi', '', 'Carrier', 'Sender', 'Read', '13-05-2021', '09:04 am'),
(94, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Testing ', '', 'Carrier', 'Sender', 'Read', '13-05-2021', '09:04 am'),
(95, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hi', '', 'Carrier', 'Sender', 'Read', '13-05-2021', '09:05 am'),
(96, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hello', '', 'Sender', 'Admin', 'Read', '13-05-2021', '09:05 am'),
(97, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hello', '', 'Carrier', 'Admin', 'Read', '13-05-2021', '09:06 am'),
(98, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hello ', '', 'Carrier', 'Sender', 'Read', '13-05-2021', '09:11 am'),
(99, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Hi', '', 'Sender', 'Sender', 'Read', '13-05-2021', '09:27 am'),
(100, 'daviscool567@gmail.com', 'cjpounds@hotmail.com', 'hi', '', 'Sender', 'Admin', 'New', '13-05-2021', '09:28 am'),
(101, 'daviscool567@gmail.com', 'cjpounds@hotmail.com', 'How may we help you?', '', 'Sender', 'Admin', 'New', '13-05-2021', '09:28 am'),
(102, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Ok cool', '', 'Sender', 'Sender', 'New', '13-05-2021', '09:28 am'),
(103, 'daviscool567@gmail.com', 'cjpounds@hotmail.com', 'I want to check by typing a long massage to determine how it works. ', '', 'Sender', 'Admin', 'New', '13-05-2021', '09:31 am'),
(104, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Good', '', 'Carrier', 'Sender', 'Read', '13-05-2021', '09:34 am'),
(105, 'weverifind@gmail.com', 'weverifind@gmail.com', 'Hi Porlt, i will be traveling tomorrow', '', 'Carrier', 'Sender', 'Read', '13-05-2021', '11:20 am'),
(106, 'weverifind@gmail.com', 'cjpounds@hotmail.com', 'Hello Ndubuisi', '', 'Carrier', 'Admin', 'New', '13-05-2021', '11:21 am'),
(107, 'weverifind@gmail.com', 'cjpounds@hotmail.com', 'Have you created a delivery request on the App?', '', 'Carrier', 'Admin', 'New', '13-05-2021', '11:25 am'),
(108, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Oi', '', 'Carrier', 'Sender', 'Read', '16-05-2021', '06:36 am'),
(109, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hello', '', 'Carrier', 'Sender', 'Read', '16-05-2021', '04:24 pm'),
(110, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Please I\'m waiting for the sender and bus is about to move', '', 'Carrier', 'Sender', 'Read', '16-05-2021', '04:24 pm'),
(111, 'cjpounds@hotmail.com', 'weverifind@gmail.com', 'Hi', '', 'Carrier', 'Admin', 'Read', '16-05-2021', '04:25 pm'),
(112, 'cjpounds@hotmail.com', 'weverifind@gmail.com', 'Hello', '', 'Carrier', 'Admin', 'Read', '16-05-2021', '04:26 pm'),
(113, 'cjpounds@hotmail.com', 'weverifind@gmail.com', 'Hello', '', 'Carrier', 'Admin', 'Read', '16-05-2021', '04:26 pm'),
(114, 'cjpounds@hotmail.com', 'weverifind@gmail.com', 'Hello', '', 'Carrier', 'Admin', 'Read', '16-05-2021', '04:26 pm'),
(115, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hello', '', 'Carrier', 'Sender', 'Read', '16-05-2021', '04:26 pm'),
(116, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'Hello', '', 'Sender', 'Sender', 'Read', '16-05-2021', '05:09 pm'),
(117, 'cjpounds@hotmail.com', 'cjpounds@hotmail.com', 'hi', '', 'Sender', 'Admin', 'Read', '22-05-2021', '05:44 pm'),
(118, 'weverifind@gmail.com', 'weverifind@gmail.com', 'Checking if take photo is working', '', 'Sender', 'Sender', 'New', '24-05-2021', '08:23 am'),
(119, 'weverifind@gmail.com', 'weverifind@gmail.com', 'Take photo is not working ', '', 'Sender', 'Sender', 'New', '24-05-2021', '08:24 am'),
(120, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Hi', '', 'Carrier', 'Sender', 'New', '24-05-2021', '02:22 pm'),
(121, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'go', '', 'Carrier', 'Sender', 'New', '24-05-2021', '05:40 pm'),
(122, 'daviscool567@gmail.com', 'daviscool567@gmail.com', 'Hi', '', 'Carrier', 'Sender', 'New', '24-05-2021', '05:41 pm');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_area`
--

CREATE TABLE `pickup_area` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `area` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pickup_area`
--

INSERT INTO `pickup_area` (`id`, `state_id`, `area`, `post_code`, `created_at`) VALUES
(1, 2, 'Ikeja', '10011', '2021-06-29 09:53:29'),
(2, 2, 'Berger', '10012', '2021-06-29 14:13:48'),
(4, 3, 'Area 12', '304976', '2021-06-29 14:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_cities`
--

CREATE TABLE `pickup_cities` (
  `id` int(11) NOT NULL,
  `cities` varchar(250) NOT NULL,
  `date_t` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pickup_cities`
--

INSERT INTO `pickup_cities` (`id`, `cities`, `date_t`) VALUES
(2, 'Lagos', '12-Apr-2021'),
(3, 'Abuja', '13-Apr-2021'),
(4, 'Port Harcourt', '13-Apr-2021'),
(5, 'Asaba', '13-Apr-2021'),
(6, 'Benin City', '13-Apr-2021'),
(7, 'Warri', '22-Apr-2021'),
(8, 'Onitsha', '22-Apr-2021'),
(9, 'Aba', '24-Apr-2021'),
(10, 'Abakaliki', '24-Apr-2021'),
(11, 'Abeokuta', '24-Apr-2021'),
(12, 'Akure', '24-Apr-2021'),
(13, 'Agbor', '24-Apr-2021'),
(14, 'Awka', '24-Apr-2021'),
(15, 'Bauchi', '24-Apr-2021'),
(16, 'Calabar', '24-Apr-2021'),
(17, 'Enugu', '24-Apr-2021'),
(18, 'Ibadan', '24-Apr-2021'),
(19, 'Ikot Ekpene', '24-Apr-2021'),
(20, 'Ilorin', '24-Apr-2021'),
(21, 'Jos', '24-Apr-2021'),
(22, 'Kaduna', '24-Apr-2021'),
(23, 'Kano', '24-Apr-2021'),
(24, 'Maiduguri', '24-Apr-2021'),
(25, 'Nsukka', '24-Apr-2021'),
(26, 'Okigwe', '24-Apr-2021'),
(27, 'Osogbo', '24-Apr-2021'),
(28, 'Sokoto', '24-Apr-2021'),
(29, 'Uyo', '24-Apr-2021'),
(30, 'Umuahia', '24-Apr-2021'),
(31, 'Zaria', '24-Apr-2021');

-- --------------------------------------------------------

--
-- Table structure for table `porlt_users`
--

CREATE TABLE `porlt_users` (
  `id` int(11) NOT NULL,
  `fulname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `pic` text NOT NULL,
  `govt_id` varchar(250) NOT NULL,
  `wallet` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `reset_code` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date_t` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `porlt_users`
--

INSERT INTO `porlt_users` (`id`, `fulname`, `email`, `phone`, `address`, `password`, `pic`, `govt_id`, `wallet`, `code`, `reset_code`, `status`, `date_t`) VALUES
(13, 'Justice ', 'cjpounds@hotmail.com', '08066899920', '', '9f976a8155f10839d72a5a0ab7d047add55244be', '', '', '0', '97375', '42698', 'Verified', '25-Nov-2020'),
(15, 'Justice', 'cjpounds1st@gmail.com', '08027865723', '', '9f976a8155f10839d72a5a0ab7d047add55244be', '', '', '0', '', '', 'Verified', '25-Nov-2020'),
(16, 'Patience', 'roomipat@yahoo.com', '08145363801', '', '9f976a8155f10839d72a5a0ab7d047add55244be', '531423653047roomipat@yahoo.com.jpg', '270814600213roomipat@yahoo.com.jpg', '0', '', '', 'Verified', '25-Nov-2020'),
(19, 'John Godspower', 'godspowerj7@gmail.com', '08102362015', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '0', '84874', '', '', '11-Dec-2020'),
(22, 'Samson', 'mariaokeke1994@gmail.com', '08155708258', '', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', '', '', '0', '88945', '', '', '23-Dec-2020'),
(23, 'Oluwafemi Samson', 'oluwafemi5656@gmail.com', '08155708285', '', '3310dd35c016294e02855ba40c713a1c88997f8e', '', '', '0', '99792', '', '', '05-Jan-2021'),
(25, 'Philr Kress ', 'philkress02@gmail.com', '08104093502', '', '28b1115d4fdb56818e5ec4ed4283ad7686d7b60c', '', '', '0', '', '', '', '30-Jan-2021'),
(29, 'Wisdom Obasi', 'wisdomlager@outlook.com', '09048481709', '', '83b54ed301b050089bfa42fa8203ea49b916ff0f', '', '', '0', '', '', '', '23-Feb-2021'),
(31, 'Udo Imma', 'keavanny@yahoo.com', '08099920668', '', '9f976a8155f10839d72a5a0ab7d047add55244be', '', '', '0', '79733', '', '', '23-Mar-2021'),
(35, 'Davis', 'daviscool567@gmail.com', '07067879261', '', '41420049dc9ed35cb063660175e812fab4b61af0', '467001787008daviscool567@gmail.com.jpg', '275061771628daviscool567@gmail.com.jpg', '50000', '', '56352', 'Verified', '24-Mar-2021'),
(36, 'Victor', 'victornwadinobi@gmail.com', '08063786241', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '0', '', '', 'Verified', '25-Mar-2021'),
(37, 'joan chidimma', 'chidimmaoguegbu@gmail.com', '08160080698', '', 'b0e2dec9f0c58ae8857d2cd1dc2b5525cc519958', '', '', '0', '', '', 'Verified', '25-Mar-2021'),
(38, 'Vixtor', 'Info@greenmousetech.com', '08177235762', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '637100841319Info@greenmousetech.com.jpg', '436550821453Info@greenmousetech.com.jpg', '0', '', '', 'Verified', '24-Apr-2021'),
(40, 'Chukwuma Okereke ', 'cj47_2010@yahoo.ie', '08066899921', '', '9f976a8155f10839d72a5a0ab7d047add55244be', '544477060864cj47_2010@yahoo.ie.jpg', '550321506991cj47_2010@yahoo.ie.jpg', '0', '', '', 'Review', '25-Apr-2021'),
(43, 'Ndubuisi Obasi', 'weverifind@gmail.com', '08068239574', '', '83b54ed301b050089bfa42fa8203ea49b916ff0f', '765964587809weverifind@gmail.com.jpg', '495896212345weverifind@gmail.com.jpg', '', '', '87252', 'Verified', '13-May-2021'),
(45, 'Tester Tester', 'tobins4u@gmail.com', '07065872509', '', 'ec3e3e202b03faf938441079bcc7698dc885cf60', '308331770259tobins4u@gmail.com.jpg', '465330439841tobins4u@gmail.com.jpg', '', '', '', 'Review', '26-May-2021');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `account_num` varchar(250) NOT NULL,
  `account_name` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `date_t` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `user`, `amount`, `bank`, `account_num`, `account_name`, `status`, `date_t`) VALUES
(10, 'cjpounds@hotmail.com', '', 'Choose', '', '', 'New', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `des_area`
--
ALTER TABLE `des_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `des_cities`
--
ALTER TABLE `des_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drop_offs`
--
ALTER TABLE `drop_offs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inter_cost`
--
ALTER TABLE `inter_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intra_cost`
--
ALTER TABLE `intra_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kg_range`
--
ALTER TABLE `kg_range`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_area`
--
ALTER TABLE `pickup_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `pickup_cities`
--
ALTER TABLE `pickup_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `porlt_users`
--
ALTER TABLE `porlt_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `des_area`
--
ALTER TABLE `des_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `des_cities`
--
ALTER TABLE `des_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drop_offs`
--
ALTER TABLE `drop_offs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
