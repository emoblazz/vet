-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 01:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `owner_id` int(11) NOT NULL,
  `appointment_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `appointment_date`, `owner_id`, `appointment_status`) VALUES
(1, '2022-06-01', 7, '0'),
(2, '2022-05-28', 8, '0'),
(3, '2022-05-04', 9, '0'),
(4, '2022-06-09', 10, '0'),
(5, '2022-06-09', 11, '0'),
(6, '2022-06-09', 12, '0'),
(7, '2022-06-09', 13, '0'),
(8, '2022-06-03', 14, '0'),
(9, '2022-06-03', 15, '0'),
(10, '2022-06-03', 16, '0'),
(11, '2022-06-02', 17, '0'),
(12, '2022-06-02', 18, 'Pending'),
(13, '2022-05-24', 19, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_details`
--

CREATE TABLE `appointment_details` (
  `appointment_details_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_details`
--

INSERT INTO `appointment_details` (`appointment_details_id`, `appointment_id`, `prod_id`) VALUES
(5, 10, 2),
(6, 10, 8),
(7, 11, 2),
(8, 11, 8),
(9, 12, 2),
(10, 12, 8),
(11, 13, 2),
(12, 13, 8);

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

CREATE TABLE `breed` (
  `breed_id` int(11) NOT NULL,
  `breed_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breed`
--

INSERT INTO `breed` (`breed_id`, `breed_name`) VALUES
(1, 'Labrador'),
(2, 'Persian Cat');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(11) NOT NULL,
  `owner_last` varchar(30) NOT NULL,
  `owner_first` varchar(30) NOT NULL,
  `owner_address` varchar(200) NOT NULL,
  `owner_contact` varchar(30) NOT NULL,
  `owner_occupation` varchar(100) NOT NULL,
  `owner_email` varchar(50) NOT NULL,
  `owner_password` varchar(50) NOT NULL,
  `date_registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `owner_last`, `owner_first`, `owner_address`, `owner_contact`, `owner_occupation`, `owner_email`, `owner_password`, `date_registered`) VALUES
(1, 'Dalisay', 'Julius', 'La Granja', '09263562814', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-20 00:00:00'),
(2, 'Dalisay', 'Julius', 'La Granja', '09263562814', 'Teacher', 'emoblazz@gmail.com', '123', '0000-00-00 00:00:00'),
(3, 'Dalisay', 'Julius', 'La Granja', '09263562814', 'Teacher', 'emoblazz', '123', '2022-05-20 00:05:36'),
(4, 'Dalisay', 'Julius', 'La Granja', '09256565', 'Teacher', 'emoblazz', '123', '2022-05-20 00:05:24'),
(5, 'Dalisay', 'Julius', 'La Granja', '09256565', 'Teacher', 'emoblazz', '123', '2022-05-20 00:00:00'),
(6, 'Dalisay', 'Julius', 'La Granja', '09256565', 'Teacher', 'emoblazz', '123', '2022-05-20 00:00:00'),
(7, 'Dalisay', 'Julius', 'La Granja', '09307730273', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-20 00:00:00'),
(8, 'Dalisay', 'Julius', 'La Granja', '09256565', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-20 00:00:00'),
(9, 'Dalisay', 'Julius', 'La Granja', '09256565', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-20 00:00:00'),
(10, 'Dalisay', 'Julius', 'La Granja', '09263562814', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-20 00:00:00'),
(11, 'Dalisay', 'Julius', 'La Granja', '09263562814', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-20 00:00:00'),
(12, 'Dalisay', 'Julius', 'La Granja', '09263562814', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-20 00:00:00'),
(13, 'Dalisay', 'Julius', 'La Granja', '09263562814', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-20 00:00:00'),
(14, 'Dalisay', 'Julius', 'La Granja', 'na', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-20 00:00:00'),
(15, 'Dalisay', 'Julius', 'La Granja', 'na', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-20 00:00:00'),
(16, 'Dalisay', 'Julius', 'La Granja', 'na', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-20 00:00:00'),
(17, 'Dalisay', 'Julius', 'La Granja', '09263562814', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-24 00:00:00'),
(18, 'Dalisay', 'Julius', 'La Granja', '09263562814', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-24 00:00:00'),
(19, 'Dalisay', 'Julius', 'La Granja', '09263562814', 'Teacher', 'emoblazz@gmail.com', '123', '2022-05-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(50) NOT NULL,
  `species_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `pet_gender` varchar(10) NOT NULL,
  `pet_bday` date NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`pet_id`, `pet_name`, `species_id`, `breed_id`, `pet_gender`, `pet_bday`, `owner_id`) VALUES
(1, 'Khen', 1, 1, 'Male', '2022-05-03', 19),
(2, 'Pache', 5, 1, 'Male', '2021-02-03', 1),
(3, 'hjh', 2, 1, 'Male', '2022-05-17', 1),
(4, 'Heiress', 3, 2, 'Female', '2022-01-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_price` decimal(6,2) NOT NULL,
  `prod_type` varchar(20) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_pic` varchar(100) NOT NULL,
  `prod_reorder` int(11) NOT NULL,
  `prod_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_price`, `prod_type`, `prod_qty`, `prod_pic`, `prod_reorder`, `prod_desc`) VALUES
(1, 'Grooming', '300.00', 'Product', 0, 'marie5.jpg', 5, ''),
(2, 'Deworming', '150.00', 'Service', 0, '275861014_2704101126401382_311880207826867070_n.jpg', 0, 'Giving of an anthelmintic drug (a wormer, dewormer, or drench) to a human or animals to rid them of helminths parasites, such as roundworm, flukes and tapeworm'),
(4, 'Feeds', '50.00', 'Product', 38, 'marie5.jpg', 0, ''),
(5, 'gfgf', '150.00', 'Product', 0, 'default.png', 0, ''),
(7, 'gfgf', '5.00', 'Service', 0, '273217779_7851091288250226_7433030264887765644_n.jpg', 0, 'Giving of an anthelmintic drug (a wormer, dewormer, or drench) to a human or animals to rid them of helminths parasites, such as roundworm, flukes and tapeworm'),
(8, 'Consultation', '350.00', 'Service', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `sales_date` datetime NOT NULL,
  `sales_total` decimal(6,2) NOT NULL,
  `sales_tendered` decimal(6,2) NOT NULL,
  `sales_change` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sales_details_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `sales_price` decimal(6,2) NOT NULL,
  `sales_qty` int(11) NOT NULL,
  `sales_subtotal` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `species_id` int(11) NOT NULL,
  `species_name` varchar(50) NOT NULL,
  `species_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`species_id`, `species_name`, `species_pic`) VALUES
(1, 'Dog', ''),
(2, 'Cat', 'cat.jpg'),
(3, 'Rabbit', 'rabbit.jpg'),
(5, 'Hamster', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `stockin_id` int(11) NOT NULL,
  `stockin_date` date NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stockin_qty` decimal(6,2) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`stockin_id`, `stockin_date`, `prod_id`, `stockin_qty`, `user_id`) VALUES
(1, '2022-05-15', 4, '10.00', 1),
(2, '2022-05-15', 4, '20.00', 1),
(3, '2022-05-20', 4, '1.00', 1),
(4, '2022-05-20', 4, '4.00', 0),
(5, '2022-05-20', 4, '1.00', 0),
(6, '2022-05-20', 4, '1.00', 0),
(7, '2022-05-20', 4, '1.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `stockout_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stockout_qty` decimal(6,2) NOT NULL,
  `stockout_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(20) NOT NULL,
  `user_last` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first`, `user_last`, `username`, `user_pass`, `user_type`, `user_pic`) VALUES
(1, 'John', 'Doe', 'admin', '202cb962ac59075b964b07152d234b70', 'Admin', '../dist/img/avatar3.png');

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `vax_id` int(11) NOT NULL,
  `vax_date` date NOT NULL,
  `vax_due` date NOT NULL,
  `vaccine_id` int(11) NOT NULL,
  `pet_weight` decimal(6,2) NOT NULL,
  `pet_temp` decimal(6,2) NOT NULL,
  `pet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `vaccine_id` int(11) NOT NULL,
  `vaccine_name` varchar(100) NOT NULL,
  `vaccine_price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`vaccine_id`, `vaccine_name`, `vaccine_price`) VALUES
(1, 'ANtititanus', '160.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `appointment_details`
--
ALTER TABLE `appointment_details`
  ADD PRIMARY KEY (`appointment_details_id`);

--
-- Indexes for table `breed`
--
ALTER TABLE `breed`
  ADD PRIMARY KEY (`breed_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_details_id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`species_id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`stockin_id`);

--
-- Indexes for table `stockout`
--
ALTER TABLE `stockout`
  ADD PRIMARY KEY (`stockout_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`vax_id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`vaccine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `appointment_details`
--
ALTER TABLE `appointment_details`
  MODIFY `appointment_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `breed`
--
ALTER TABLE `breed`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `species_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `stockin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stockout`
--
ALTER TABLE `stockout`
  MODIFY `stockout_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `vax_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `vaccine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
