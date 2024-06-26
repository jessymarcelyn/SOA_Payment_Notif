-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 05:43 AM
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

--
-- Dumping data for table `bankmandiri`
--

INSERT INTO `bankmandiri` (`id`, `nama`, `no_rek`, `pin`, `no_telp`, `saldo`) VALUES
(1, 'Neni', '1231231', '123', '88888', 10000);

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
(25, 'Jessy', '85df00411f072d601b21fc2e6db9e83e01d04d11169bc7f306e13d6b4c57e99b', '114bd151f8fb0c58642d2170da4ae7d7c57977260ac2cc8905306cab6b2acabc', 2029, 6, '5000000', '0', 1),
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

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notif`, `id_user`, `id_pesanan`, `tipe_notif`, `judul`, `deskripsi`, `timestamp_masuk`, `timestamp_announce`, `status`, `link`) VALUES
(135, 1, 3, 'pembayaran', 'VA', 'Silahkan lakukan pembayaran untuk pesanan 3 dengan VA ini 122081211366', '2024-06-26 09:32:15', '2024-06-26 09:32:15', 1, '../../inputVA.php'),
(136, 1, 4, 'pembayaran', 'VA', 'Silahkan lakukan pembayaran untuk pesanan 4 dengan VA ini 2147483647', '2024-06-24 05:51:19', '2024-06-24 10:51:19', 0, '../../inputVA.php'),
(137, 1, 7, 'pembayaran', 'OTP', 'Silahkan lakukan pembayaran dengan OTP ini 789010', '2024-06-26 04:13:58', '2024-06-26 09:13:58', 0, NULL),
(138, 1, 7, 'pembayaran', 'Lakukan Pembayaran', 'Silahkan lakukan pembayaran untuk pesanan 7', '2024-06-26 09:15:12', '2024-06-26 09:15:12', 1, NULL),
(139, 1, 7, 'pembayaran', 'Pembayaran Berhasil', 'Pembayaran untuk pesanan 7 berhasil', '2024-06-26 09:15:12', '2024-06-26 09:15:12', 0, NULL),
(140, 1, 8, 'pembayaran', 'OTP', 'Silahkan lakukan pembayaran dengan OTP ini 498473', '2024-06-26 04:16:48', '2024-06-26 09:16:48', 0, NULL),
(141, 1, 8, 'pembayaran', 'Lakukan Pembayaran', 'Silahkan lakukan pembayaran untuk pesanan 8', '2024-06-26 09:17:39', '2024-06-26 09:17:39', 1, NULL),
(142, 1, 8, 'pembayaran', 'Pembayaran Berhasil', 'Pembayaran untuk pesanan 8 berhasil', '2024-06-26 09:17:38', '2024-06-26 09:17:38', 0, NULL),
(143, 1, 11, 'keuangan', 'VA', 'Silahkan lakukan pembayaran untuk pesanan 11 dengan VA ini 122081211366', '2024-06-26 04:28:40', '2024-06-26 09:28:40', 0, '../../inputVA.php'),
(144, 1, 12, 'keuangan', 'VA', 'Silahkan lakukan pembayaran untuk pesanan 12 dengan VA ini 122081211366', '2024-06-26 04:29:03', '2024-06-26 09:29:03', 0, '../../inputVA.php'),
(145, 1, 13, 'keuangan', 'VA', 'Silahkan lakukan pembayaran untuk pesanan 13 dengan VA ini 122081211366', '2024-06-26 04:33:45', '2024-06-26 09:33:45', 0, '../../inputVA.php'),
(146, 1, 14, 'keuangan', 'VA', 'Silahkan lakukan pembayaran untuk pesanan 14 dengan VA ini 122081211366', '2024-06-26 04:35:11', '2024-06-26 09:35:12', 0, '../../inputVA.php'),
(147, 1, 15, 'pembayaran', 'VA', 'Silahkan lakukan pembayaran untuk pesanan 15 dengan VA ini 122081211366', '2024-06-26 09:37:51', '2024-06-26 09:37:51', 1, '../../inputVA.php'),
(148, 1, 16, 'pembayaran', 'VA', 'Silahkan lakukan pembayaran untuk pesanan 16 dengan VA ini 122081211366', '2024-06-26 04:43:17', '2024-06-26 09:43:17', 0, '../../inputVA.php'),
(149, 1, 17, 'keuangan', 'VA', 'Silahkan lakukan pembayaran untuk pesanan 17 dengan VA ini 122081211366', '2024-06-26 04:47:19', '2024-06-26 09:47:20', 0, '../../inputVA.php'),
(150, 1, 16, 'pembayaran', 'OTP', 'Silahkan lakukan pembayaran dengan OTP ini 600275', '2024-06-26 04:51:09', '2024-06-26 09:51:09', 0, NULL),
(151, 1, 16, 'pembayaran', 'Lakukan Pembayaran', 'Silahkan lakukan pembayaran untuk pesanan 16', '2024-06-26 09:51:55', '2024-06-26 09:51:55', 1, NULL),
(152, 1, 16, 'pembayaran', 'OTP', 'Silahkan lakukan pembayaran dengan OTP ini 539236', '2024-06-26 05:11:23', '2024-06-26 10:11:23', 0, NULL),
(153, 1, 16, 'pembayaran', 'Lakukan Pembayaran', 'Silahkan lakukan pembayaran untuk pesanan 16', '2024-06-26 10:14:04', '2024-06-26 10:14:04', 1, 'asdasda'),
(154, 1, 16, 'pembayaran', 'Pembayaran Berhasil', 'Pembayaran untuk pesanan 16 berhasil', '2024-06-26 10:12:33', '2024-06-26 10:12:33', 0, NULL);

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

--
-- Dumping data for table `transaksiovo`
--

INSERT INTO `transaksiovo` (`id`, `timestamp`, `nomor_telepon`, `nominal`, `status`) VALUES
(18, '2024-06-25 17:36:32', '08123456789', '10000', 0);

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

--
-- Dumping data for table `transaksi_kartu`
--

INSERT INTO `transaksi_kartu` (`id_transaksi`, `timestamp`, `nomer_kartu`, `nominal`, `status`, `otp`, `otp_timestamp`, `attempt`) VALUES
(123, '2024-06-25 17:06:18', '85df00411f072d601b21fc2e6db9e83e01d04d11169bc7f306e13d6b4c57e99b', '100000', 'ongoing', '7osux7ZGEvc+oF8o5gfpyEZiREvZ/w==', '2024-06-25 17:06:18', 0),
(124, '2024-06-25 17:10:44', '85df00411f072d601b21fc2e6db9e83e01d04d11169bc7f306e13d6b4c57e99b', '100000', 'ongoing', 'YHb4cR7y2eRgQWXBysTyzDkVeb11hw==', '2024-06-25 17:10:44', 0),
(125, '2024-06-26 09:04:15', '85df00411f072d601b21fc2e6db9e83e01d04d11169bc7f306e13d6b4c57e99b', '200000', 'ongoing', '5mpc7OTQhiUOvedCavHvzQ7C93xsYg==', '2024-06-26 09:04:15', 0),
(126, '2024-06-26 09:04:37', '85df00411f072d601b21fc2e6db9e83e01d04d11169bc7f306e13d6b4c57e99b', '200000', 'ongoing', 'sN7fYou+uVilXZpEEThSem0xOkpcLQ==', '2024-06-26 09:04:37', 0),
(127, '2024-06-26 09:11:59', '85df00411f072d601b21fc2e6db9e83e01d04d11169bc7f306e13d6b4c57e99b', '200000', 'ongoing', 'ETV8kku0uAmiLglJrRmh1Os6/mvh7Q==', '2024-06-26 09:11:59', 0),
(128, '2024-06-26 09:13:58', '85df00411f072d601b21fc2e6db9e83e01d04d11169bc7f306e13d6b4c57e99b', '200000', 'success', 'lttV358Mj7Ut+Fl01PFJud1AAEGR9w==', '2024-06-26 09:13:58', 1),
(129, '2024-06-26 09:16:47', '85df00411f072d601b21fc2e6db9e83e01d04d11169bc7f306e13d6b4c57e99b', '200000', 'success', 'guz/Y+qUTjSMWwgMct+wnRN5dkW93g==', '2024-06-26 09:16:47', 2),
(130, '2024-06-26 09:51:09', '85df00411f072d601b21fc2e6db9e83e01d04d11169bc7f306e13d6b4c57e99b', '200000', 'ongoing', 'ahxZ8SzN9NnZzajLYOijuDQ2VOLgAA==', '2024-06-26 09:51:09', 3),
(131, '2024-06-26 10:11:23', '85df00411f072d601b21fc2e6db9e83e01d04d11169bc7f306e13d6b4c57e99b', '200000', 'success', 'w1XtXF/pp5tpyZeTpRD6IGfWWmQ6uQ==', '2024-06-26 10:11:23', 1);

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

--
-- Dumping data for table `transbca`
--

INSERT INTO `transbca` (`id`, `timestamp_trans`, `no_telp`, `nominal`, `status`, `va`) VALUES
(27, '2024-06-24 10:48:18', '081211366021', 500000, 'ongoing', '122081211366'),
(28, '2024-06-26 09:28:40', '081211366021', 500000, 'ongoing', '122081211366'),
(29, '2024-06-26 09:28:56', '081211366021', 500000, 'ongoing', '122081211366'),
(30, '2024-06-26 09:33:45', '081211366021', 500000, 'ongoing', '122081211366'),
(31, '2024-06-26 09:35:11', '081211366021', 500000, 'ongoing', '122081211366'),
(32, '2024-06-26 09:37:40', '081211366021', 500000, 'ongoing', '122081211366'),
(33, '2024-06-26 09:43:16', '081211366021', 500000, 'ongoing', '122081211366'),
(34, '2024-06-26 09:47:11', '081211366021', 500000, 'ongoing', '122081211366');

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

--
-- Dumping data for table `transmandiri`
--

INSERT INTO `transmandiri` (`id_trans`, `timestamp_trans`, `no_telp`, `nominal`, `status`, `va`) VALUES
(11, '2024-06-24 10:51:19', '081211366021', 500000, 'ongoing', 2147483647);

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
-- Dumping data for table `trans_pembayaran`
--

INSERT INTO `trans_pembayaran` (`id_pembayaran`, `id_pesanan`, `id_pesanan2`, `id_transaksi`, `total_transaksi`, `timestamp`, `jenis_pembayaran`, `nama_penyedia`, `status`) VALUES
(267, 1, NULL, 0, 100000, '2024-06-24 10:44:41', '', '', 'initial'),
(268, 2, NULL, 0, 100000, '2024-06-24 10:46:27', '', '', 'initial'),
(269, 3, NULL, 27, 100000, '2024-06-24 10:48:19', 'TransferBank', 'BCA', 'ongoing'),
(270, 4, NULL, 11, 100000, '2024-06-24 10:51:19', 'TransferBank', 'Mandiri', 'ongoing'),
(271, 1, NULL, 0, 269, '2024-06-24 21:31:11', '', '', 'initial'),
(272, 19, NULL, 0, 10000, '2024-06-25 17:44:39', '', '', 'initial'),
(273, 20, NULL, 0, 100000, '2024-06-26 00:38:37', '', '', 'initial'),
(274, 4, NULL, 0, 100000, '2024-06-26 00:40:55', '', '', 'initial'),
(275, 4, NULL, 0, 100000, '2024-06-26 00:41:38', '', '', 'initial'),
(276, 4, NULL, 0, 100000, '2024-06-26 00:46:16', '', '', 'initial'),
(277, 4, NULL, 0, 100000, '2024-06-26 00:46:40', '', '', 'initial'),
(278, 4, NULL, 0, 100000, '2024-06-26 00:54:02', '', '', 'initial'),
(279, 5, NULL, 0, 100000, '2024-06-26 09:03:15', '', '', 'initial'),
(280, 6, NULL, 0, 100000, '2024-06-26 09:11:40', '', '', 'initial'),
(281, 7, NULL, 128, 100000, '2024-06-26 09:13:58', 'kartukredit', 'mastercard', 'success'),
(283, 8, NULL, 129, 100000, '2024-06-26 09:16:48', 'kartukredit', 'mastercard', 'success'),
(284, 18, NULL, 0, 100000, '2024-06-26 09:21:16', '', '', 'initial'),
(285, 9, NULL, 0, 100000, '2024-06-26 09:21:31', 'Digital Payment', 'ovo', 'ongoing'),
(286, 10, NULL, 0, 100000, '2024-06-26 09:22:56', 'Digital Payment', 'ovo', 'ongoing'),
(287, 11, NULL, 28, 100000, '2024-06-26 09:28:40', 'TransferBank', 'BCA', 'ongoing'),
(288, 12, NULL, 29, 100000, '2024-06-26 09:29:03', 'TransferBank', 'BCA', 'ongoing'),
(289, 13, NULL, 30, 100000, '2024-06-26 09:33:45', 'TransferBank', 'BCA', 'ongoing'),
(290, 14, NULL, 31, 100000, '2024-06-26 09:35:11', 'TransferBank', 'BCA', 'ongoing'),
(291, 15, NULL, 32, 100000, '2024-06-26 09:37:41', 'TransferBank', 'BCA', 'ongoing'),
(292, 16, NULL, 131, 100000, '2024-06-26 10:11:23', 'kartukredit', 'mastercard', 'success'),
(293, 17, NULL, 34, 100000, '2024-06-26 09:47:19', 'TransferBank', 'BCA', 'ongoing'),
(294, 16, NULL, 131, 100000, '2024-06-26 10:11:23', 'kartukredit', 'mastercard', 'success');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksi_kartu`
--
ALTER TABLE `transaksi_kartu`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `transbca`
--
ALTER TABLE `transbca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transmandiri`
--
ALTER TABLE `transmandiri`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trans_pembayaran`
--
ALTER TABLE `trans_pembayaran`
  MODIFY `id_pembayaran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
