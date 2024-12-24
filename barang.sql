-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 07:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `harga_jual` decimal(10,2) DEFAULT NULL,
  `harga_beli` decimal(10,2) DEFAULT NULL,
  `stok_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori`, `harga_jual`, `harga_beli`, `stok_barang`) VALUES
(1, 'iPhone 15 Pro Max', 'Handphone', 21000000.00, 22000000.00, 33),
(2, 'AC Daikin 1/2 PK', 'AC', 3000000.00, 2500000.00, 10),
(3, 'Samsung S23 Ultra', 'HP', 20000000.00, 17000000.00, 5),
(4, 'TV 60\" LG Smart TV', 'TV', 5000000.00, 4500000.00, 18),
(5, 'Vivo V29 5g', 'HP', 6000000.00, 4000000.00, 18),
(6, 'Meja Belajar', 'Furniture', 3000000.00, 2000000.00, 9),
(7, 'Meja Makan', 'Furniture', 6000000.00, 4000000.00, 4),
(8, 'AC Daikin 3/4 PK', 'AC', 3000000.00, 2500000.00, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
