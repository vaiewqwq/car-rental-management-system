-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 12:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `body_types`
--

CREATE TABLE `body_types` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=shown,1=hide',
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `body_types`
--

INSERT INTO `body_types` (`id`, `name`, `slug`, `image`, `status`, `created_at`) VALUES
(1, 'Sedan', 'sedan', 'assets/uploads/bodytypes/17541687343844.jpeg', 0, '2023-06-21'),
(2, 'Hatchback', 'hatchback', '', 0, '2023-06-22'),
(3, 'SUV', 'suv', '', 0, '2023-06-22'),
(8, 'Compact SUV', 'compact-suv', '', 0, '2023-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_no` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `total_price` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `payment_mode` varchar(191) NOT NULL COMMENT 'cash payment, upi,card',
  `payment_status` varchar(191) NOT NULL COMMENT 'completed, refunded, pending',
  `payment_id` varchar(191) DEFAULT NULL,
  `cancel_status` tinyint(1) NOT NULL DEFAULT 0,
  `cancel_reason` varchar(500) DEFAULT NULL COMMENT 'user cancelled, car not available',
  `booking_status` varchar(50) NOT NULL DEFAULT 'booked' COMMENT 'booked, live, completed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=show,1=hide',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `status`, `created_at`) VALUES
(1, 'Honda', 'honda', '', 0, '2023-06-21'),
(2, 'Nissan', 'nissan', 'assets/uploads/brands/66191687335693.png', 0, '2023-06-21'),
(5, 'Hyundai', 'hyundai', '', 0, '2023-06-22'),
(6, 'TOYOTA', 'toyota', '', 0, '2023-06-22'),
(7, 'Kia', 'kia', '', 0, '2023-06-22'),
(8, 'TATA', 'tata', '', 0, '2023-06-22'),
(9, 'Maruti Suzuki', 'maruti-suzuki', '', 0, '2023-06-22'),
(10, 'Volkswagen', 'volkswagen', '', 0, '2023-06-22'),
(11, 'Audi', 'audi', '', 1, '2023-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `body_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `car_cid` varchar(20) NOT NULL COMMENT 'car custom id',
  `car_reg_no` varchar(50) DEFAULT NULL,
  `model` date NOT NULL,
  `transmission` varchar(100) DEFAULT NULL,
  `fuel` varchar(100) DEFAULT NULL,
  `seating_capacity` varchar(50) DEFAULT NULL,
  `fastag` tinyint(1) DEFAULT 0,
  `kms_driven` varchar(100) DEFAULT NULL,
  `sun_roof` tinyint(1) NOT NULL,
  `cruise_control` tinyint(1) NOT NULL,
  `360_camera` tinyint(1) NOT NULL,
  `price_per_hour` varchar(100) DEFAULT NULL,
  `home_delivery` tinyint(1) NOT NULL,
  `airbags` tinyint(1) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=show,1=hide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand_id`, `body_type_id`, `name`, `car_cid`, `car_reg_no`, `model`, `transmission`, `fuel`, `seating_capacity`, `fastag`, `kms_driven`, `sun_roof`, `cruise_control`, `360_camera`, `price_per_hour`, `home_delivery`, `airbags`, `description`, `image`, `status`) VALUES
(1, 6, 2, 'TOYOTA XYZ', '74715916', 'KA03K8987', '2023-01-29', 'Automatic', 'Petrol', '5', 1, '10000', 0, 1, 1, '225', 0, 1, 'My toyota comes fully loaded with a base music system The smooth driving Experience and powerful engine ensure you have a great ride. Comforable cushioned leather seats ensure supreme comfort while driving.', 'assets/uploads/cars/30401688544321.png', 0),
(2, 9, 2, 'Maruti Suzuki SWIFTT', '39172701', 'KA03EA5698', '2013-01-22', 'Manual', 'Diesel', '5', 0, '10000', 1, 0, 1, '155', 0, 1, 'test description', 'assets/uploads/cars/92261688544367.jpg', 0),
(4, 9, 2, 'Maruti Baleno', '89991597', 'DL56EE523X', '2021-07-27', 'Automatic', 'Petrol', '5', 1, '12032', 1, 1, 1, '455', 0, 1, 'Maruti Suzuki Baleno is a perfect car for comfort and premium features.', 'assets/uploads/cars/29511688544566.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `car_images`
--

CREATE TABLE `car_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `car_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `is_thumbnail` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_images`
--

INSERT INTO `car_images` (`id`, `car_id`, `image`, `is_thumbnail`, `status`) VALUES
(1, 2, 'assets/uploads/cars/19821688544386.jpg', 1, 0),
(2, 2, 'assets/uploads/cars/77701688544400.jpg', 0, 0),
(4, 2, 'assets/uploads/cars/24131688544410.jpg', 0, 0),
(5, 3, 'assets/uploads/cars/01.png', 0, 0),
(6, 3, 'assets/uploads/cars/02.png', 0, 0),
(7, 3, 'assets/uploads/cars/03.png', 0, 0),
(9, 1, 'assets/uploads/cars/12.png', 0, 0),
(10, 1, 'assets/uploads/cars/21.png', 0, 0),
(11, 1, 'assets/uploads/cars/29.png', 0, 0),
(12, 1, 'assets/uploads/cars/36.png', 0, 0),
(14, 4, 'assets/uploads/cars/03.png', 0, 0),
(15, 4, 'assets/uploads/cars/06.png', 0, 0),
(16, 4, 'assets/uploads/cars/13.png', 0, 0),
(17, 4, 'assets/uploads/cars/20.png', 0, 0),
(18, 4, 'assets/uploads/cars/27.png', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `social_medias`
--

CREATE TABLE `social_medias` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=show,1=hide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_medias`
--

INSERT INTO `social_medias` (`id`, `name`, `slug`, `status`) VALUES
(1, 'Facebook', 'www.facebook.com/sharmacoder', 0),
(3, 'Instagram', 'www.instagram.com/sharmacoder', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alt_phone` varchar(20) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'user' COMMENT 'user,admin,etc',
  `is_ban` tinyint(1) DEFAULT 0 COMMENT '0=active,1=ban',
  `is_verified` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=un-verified,1=verified',
  `remarks` varchar(500) DEFAULT NULL COMMENT 'eg: DL not clear, fake dl, missing documents,etc',
  `dl_number` varchar(100) DEFAULT NULL,
  `dl_image_front` varchar(100) DEFAULT NULL,
  `dl_image_back` varchar(100) DEFAULT NULL,
  `id_proof_type` varchar(100) DEFAULT NULL COMMENT 'aadhar, PAN, Voter',
  `id_proof_number` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `alt_phone`, `address`, `role`, `is_ban`, `is_verified`, `remarks`, `dl_number`, `dl_image_front`, `dl_image_back`, `id_proof_type`, `id_proof_number`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456', NULL, NULL, NULL, 'admin', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-20'),
(2, 'ved', 'ved@gmail.com', '123456', '9876549878', '', 'asd asd asd', 'user', 0, 0, NULL, 'KA036569982', 'assets/uploads/dl-docs/1687276921.png', 'assets/uploads/dl-docs/1687276921.jpg', 'aadhar', '12312313213', '2023-06-20'),
(6, 'User ', 'user@gmail.com', '123456', '6362565656', '', '1st main roadn, 3rd cros, bangalore , india', 'user', 0, 1, 'Please fill address to get your profile verified! If updated, We will verify it within 1-2 working days.', 'KA5309808', 'assets/uploads/dl-docs/89851688539344.JPG', 'assets/uploads/dl-docs/42561688539344.jpg', 'Aadhar', '65465798132798', '2023-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `phone1` varchar(15) DEFAULT NULL,
  `phone2` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `title`, `url`, `description`, `logo`, `address`, `email1`, `email2`, `phone1`, `phone2`) VALUES
(1, 'Car Rental Services', 'www.carrentalservices.com', 'Car Rental Services Car Rental Services Car Rental Services', 'assets/uploads/28201687333597.png', 'asd', 'carrentalservices@gmail.com', 'asd@asd.com', '9786549878', '9876545');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `body_types`
--
ALTER TABLE `body_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_medias`
--
ALTER TABLE `social_medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `body_types`
--
ALTER TABLE `body_types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
