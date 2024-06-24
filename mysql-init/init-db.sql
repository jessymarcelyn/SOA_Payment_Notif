-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 04:34 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soa_payment_notif`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankbca`
--

CREATE TABLE `bankbca` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_rek` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `saldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankbca`
--

INSERT INTO `bankbca` (`id`, `nama`, `no_rek`, `pin`, `no_telp`, `saldo`) VALUES
(1, 'Nathalia Devita', '8630320624', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2147483647', 5680009),
(2, 'Jessys Marcelyn', '127566092', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2147483647', 7654100),
(4, 'Nathalia', '8630320333', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '081211366021', 5680009),
(5, 'Rina', '5379412348874917', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '08123123', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `bankmandiri`
--

CREATE TABLE `bankmandiri` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_rek` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `saldo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gopay`
--

CREATE TABLE `gopay` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `saldo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gopay`
--

INSERT INTO `gopay` (`id`, `nama`, `nomor_telepon`, `email`, `pin`, `saldo`) VALUES
(1, 'ninu', '08123456789', 'n@gmail.com', '714327DF6D36BCC6DA5431A0B797594805FFB3277ACC1DEFD36C5E88626C4428', '50000'),
(2, 'beno', '08112233445', 'be@gmail.com', '96CAE35CE8A9B0244178BF28E4966C2CE1B8385723A96A6B838858CDD6CA0A1E', '20000'),
(5, 'sasa', '08585858585', 'sa@gmail.com', '96CAE35CE8A9B0244178BF28E4966C2CE1B8385723A96A6B838858CDD6CA0A1E', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `kartu`
--

CREATE TABLE `kartu` (
  `id_kartu` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `nomer_kartu` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `expired_year` int(4) NOT NULL,
  `expired_month` int(2) NOT NULL,
  `limit_maks` decimal(10,0) NOT NULL,
  `limit_terpakai` decimal(10,0) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kartu`
--

INSERT INTO `kartu` (`id_kartu`, `nama`, `nomer_kartu`, `cvv`, `expired_year`, `expired_month`, `limit_maks`, `limit_terpakai`, `status`) VALUES
(25, 'Jessy', '85df00411f072d601b21fc2e6db9e83e01d04d11169bc7f306e13d6b4c57e99b', '114bd151f8fb0c58642d2170da4ae7d7c57977260ac2cc8905306cab6b2acabc', 2029, 6, '5000000', '400000', 1),
(26, 'Rina', 'e85acad0a469f9166744a79a1c9d33a11f735abca10f328b48ebbce3c10e75a8', 'f747870ae666c39b589f577856a0f7198b3b81269cb0326de86d8046f2cf72db', 2026, 5, '2000000', '0', 1),
(28, 'Hendra', '6993cf0cc46026086a561a3feba3dc8a6a593d32ab31d1e8b802ca51b4f3de19', '8ede6b26343305e05c3c0029f4e830d4e8c2016869a9d1cd97b100b2a16dfd1c', 2022, 3, '2000000', '0', 0),
(29, 'Santi', '855229ffcc832335b086c46feb926e6f4e013759a199c9d777ac51bb38a2533a', '793733573a1dfd14a2e889a11b2ad7b6981de29df813863b528dc1ae99416eeb', 2025, 2, '1000000', '0', 0),
(30, 'Andi', 'd688838fa7ab493a5e310dc529cdb4206da5edf97dafed3d297c8ff86ba64164', '30e26cef13a6dbbf0e3035f8c16f55670f4e468e97ac7dad43798621da636abf', 2025, 2, '1000000', '1000000', 1),
(31, 'Ariel', 'cd269b73fc92a164d9ae60ff2678db03c0eb21b597f3ebd20ecb4266ef720556', '182dc6b90f1c9cd913c39a6b5506f582caba9ddeadafe32f5bdbac25efd705ac', 2027, 1, '1000000', '800000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notif` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `tipe_notif` varchar(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `timestamp_masuk` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `timestamp_announce` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `link` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ovo`
--

CREATE TABLE `ovo` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `saldo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ovo`
--

INSERT INTO `ovo` (`id`, `nama`, `nomor_telepon`, `email`, `pin`, `saldo`) VALUES
(1, 'ninu', '08123456789', 'n@gmail.com', '714327DF6D36BCC6DA5431A0B797594805FFB3277ACC1DEFD36C5E88626C4428', '50000'),
(2, 'beno', '08112233445', 'be@gmail.com', '96CAE35CE8A9B0244178BF28E4966C2CE1B8385723A96A6B838858CDD6CA0A1E', '20000'),
(5, 'sasa', '08585858585', 'sa@gmail.com', '96CAE35CE8A9B0244178BF28E4966C2CE1B8385723A96A6B838858CDD6CA0A1E', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksigopay`
--

CREATE TABLE `transaksigopay` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `nomor_telepon` varchar(15) NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksiovo`
--

CREATE TABLE `transaksiovo` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `nomor_telepon` varchar(15) NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_kartu`
--

CREATE TABLE `transaksi_kartu` (
  `id_transaksi` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `nomer_kartu` varchar(255) NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `status` varchar(10) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `otp_timestamp` datetime NOT NULL,
  `attempt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transbca`
--

CREATE TABLE `transbca` (
  `id` int(11) NOT NULL,
  `timestamp_trans` datetime NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `nominal` double NOT NULL,
  `status` varchar(25) NOT NULL,
  `va` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transmandiri`
--

CREATE TABLE `transmandiri` (
  `id_trans` int(11) NOT NULL,
  `timestamp_trans` datetime NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `nominal` double NOT NULL,
  `status` varchar(25) NOT NULL,
  `va` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trans_pembayaran`
--

CREATE TABLE `trans_pembayaran` (
  `id_pembayaran` int(100) NOT NULL,
  `id_pesanan` int(100) NOT NULL,
  `id_pesanan2` int(100) DEFAULT NULL,
  `id_transaksi` int(100) NOT NULL,
  `total_transaksi` double NOT NULL,
  `timestamp` datetime NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `nama_penyedia` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankbca`
--
ALTER TABLE `bankbca`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_rek` (`no_rek`);

--
-- Indexes for table `bankmandiri`
--
ALTER TABLE `bankmandiri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_rek` (`no_rek`);

--
-- Indexes for table `gopay`
--
ALTER TABLE `gopay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kartu`
--
ALTER TABLE `kartu`
  ADD PRIMARY KEY (`id_kartu`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `ovo`
--
ALTER TABLE `ovo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksigopay`
--
ALTER TABLE `transaksigopay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksiovo`
--
ALTER TABLE `transaksiovo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_kartu`
--
ALTER TABLE `transaksi_kartu`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transbca`
--
ALTER TABLE `transbca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transmandiri`
--
ALTER TABLE `transmandiri`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `trans_pembayaran`
--
ALTER TABLE `trans_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankbca`
--
ALTER TABLE `bankbca`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bankmandiri`
--
ALTER TABLE `bankmandiri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gopay`
--
ALTER TABLE `gopay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kartu`
--
ALTER TABLE `kartu`
  MODIFY `id_kartu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `ovo`
--
ALTER TABLE `ovo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksigopay`
--
ALTER TABLE `transaksigopay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksiovo`
--
ALTER TABLE `transaksiovo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaksi_kartu`
--
ALTER TABLE `transaksi_kartu`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `transbca`
--
ALTER TABLE `transbca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transmandiri`
--
ALTER TABLE `transmandiri`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trans_pembayaran`
--
ALTER TABLE `trans_pembayaran`
  MODIFY `id_pembayaran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
