-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 03:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `o_id` int(11) NOT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `o_date` date DEFAULT current_timestamp(),
  `p_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `detail` text DEFAULT NULL,
  `description` text NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_date` date DEFAULT current_timestamp(),
  `p_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`p_id`, `p_name`, `detail`, `description`, `p_price`, `p_date`, `p_num`) VALUES
(1, 'มหาเวทย์ผนึกมาร 2', 'uploads/Screenshot 2024-02-18 123440.png', 'มหาเวทย์ผนึกมาร 2', 125, '2024-02-19', 10),
(3, 'มหาศึกคนชนเทพ', 'uploads/Screenshot 2024-02-18 123250.png', 'มหาศึกคนชนเทพ', 140, '2024-02-19', 12),
(4, 'เอาชีวิตรอดในหุบเขาเขย่าขวัญ : ชุด เอาชีวิตรอด	', 'uploads/Screenshot 2024-02-19 104125.png', 'เอาชีวิตรอดในหุบเขาเขย่าขวัญ : ชุด เอาชีวิตรอด', 125, NULL, 2),
(5, 'เอาชีวิตรอดจากปรสิต เล่ม 1', 'uploads/Screenshot 2024-02-19 104420.png', 'เอาชีวิตรอดจากปรสิต เล่ม 1 นะจ๊ะ\r\n', 142, '2024-02-19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `u_pass` varchar(15) NOT NULL,
  `u_fname` varchar(30) NOT NULL,
  `u_lname` varchar(30) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_address` text DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`u_id`, `u_name`, `u_pass`, `u_fname`, `u_lname`, `u_email`, `u_address`, `role`) VALUES
(1, 'a', 'a', 'a', 'a', 'aaaa@aaa.com', 'aaaaaaa', 'admin'),
(2, 'b', 'b', 'b', 'b', 'bbb@ggg.com', 'bbbb', 'user'),
(3, 'f', 'f', 'f', 'f', 'fffffffffffff@gff.com', 'fffffffffff', 'user'),
(4, 'i', 'i', 'i', 'i', 'iiii@kff.com', 'i', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`u_id`,`u_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
