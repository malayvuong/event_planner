-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2018 at 12:14 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii_sukien`
--

-- --------------------------------------------------------

--
-- Table structure for table `congviec`
--

CREATE TABLE `congviec` (
  `cv_id` int(11) NOT NULL,
  `cv_name` varchar(100) DEFAULT NULL COMMENT 'Tên công việc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `congviec`
--

INSERT INTO `congviec` (`cv_id`, `cv_name`) VALUES
(1, 'Thiết kế'),
(2, 'Setup âm thanh'),
(3, 'Setup Reception');

-- --------------------------------------------------------

--
-- Table structure for table `linked`
--

CREATE TABLE `linked` (
  `lid` int(11) NOT NULL,
  `sk_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Mã sự kiện',
  `user` int(11) NOT NULL DEFAULT '0' COMMENT 'Mã user',
  `cv_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Mã công việc',
  `begin` varchar(20) DEFAULT NULL COMMENT 'Bắt đầu',
  `end` varchar(20) DEFAULT NULL COMMENT 'Kết thúc',
  `klcv` varchar(500) DEFAULT NULL COMMENT 'Khối lượng',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `linked`
--

INSERT INTO `linked` (`lid`, `sk_id`, `user`, `cv_id`, `begin`, `end`, `klcv`, `status`) VALUES
(2, 1, 2, 1, '2018-09-09T00:00', '2018-09-10T00:00', '30 phút', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `user` varchar(100) DEFAULT NULL COMMENT 'Người dùng',
  `log_name` varchar(100) DEFAULT NULL COMMENT 'Loại hành động',
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời gian ghi nhận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sukien`
--

CREATE TABLE `sukien` (
  `sk_id` int(11) NOT NULL,
  `sk_name` varchar(100) NOT NULL COMMENT 'Tên sự kiện',
  `sk_khuvuc` varchar(100) NOT NULL COMMENT 'Khu vực',
  `sk_time` date DEFAULT NULL COMMENT 'Thời gian',
  `sk_begin` time DEFAULT NULL COMMENT 'Thời gian bắt đầu',
  `sk_end` time DEFAULT NULL COMMENT 'Thời gian kết thúc',
  `sk_address` varchar(200) NOT NULL COMMENT 'Địa chỉ',
  `sk_note` mediumtext NOT NULL COMMENT 'Ghi chú',
  `sk_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái',
  `sk_view` int(11) NOT NULL DEFAULT '0' COMMENT 'Lượt xem'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sukien`
--

INSERT INTO `sukien` (`sk_id`, `sk_name`, `sk_khuvuc`, `sk_time`, `sk_begin`, `sk_end`, `sk_address`, `sk_note`, `sk_status`, `sk_view`) VALUES
(1, 'Demo 1', 'HCM', '2019-01-01', '00:00:00', '12:00:00', '55 Trương Quốc Dung', 'Không có ghi chú', 0, 0),
(2, 'Sự kiện 2', 'Hà Nội', '2018-09-30', '12:00:00', '17:00:00', '55 Hồ Hoàn Kiếm', 'Chưa có ghi chú', 0, 0),
(3, 'Ano Olagen', 'Nha Trang', '2019-01-01', '12:00:00', '17:00:00', '55 Hồ Hoàn Kiếm', '--', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL COMMENT 'Tên nhân viên',
  `phone` varchar(20) NOT NULL COMMENT 'Số điện thoại',
  `type` varchar(100) DEFAULT NULL COMMENT 'Loại nhân viên',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `type`, `status`) VALUES
(1, 'Khương Duy', '0987654321', 'Phòng IT', 0),
(2, 'Ngọc Anh', '0987654321', 'NV KD HCM', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`cv_id`);

--
-- Indexes for table `linked`
--
ALTER TABLE `linked`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `user` (`user`),
  ADD KEY `cv_id` (`cv_id`),
  ADD KEY `sk_id` (`sk_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`sk_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `congviec`
--
ALTER TABLE `congviec`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `linked`
--
ALTER TABLE `linked`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sukien`
--
ALTER TABLE `sukien`
  MODIFY `sk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `linked`
--
ALTER TABLE `linked`
  ADD CONSTRAINT `linked_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `linked_ibfk_2` FOREIGN KEY (`cv_id`) REFERENCES `congviec` (`cv_id`),
  ADD CONSTRAINT `linked_ibfk_3` FOREIGN KEY (`sk_id`) REFERENCES `sukien` (`sk_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
