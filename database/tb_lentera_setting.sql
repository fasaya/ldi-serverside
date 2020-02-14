-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2020 at 09:56 AM
-- Server version: 10.2.29-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u8877646_lenteradigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_lentera_setting`
--

CREATE TABLE `tb_lentera_setting` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lentera_setting`
--

INSERT INTO `tb_lentera_setting` (`id`, `kode`, `nama`, `nilai`, `status`) VALUES
(1, 'DEPOSITO_MIKRO_MIN', 'deposito mikro minimal', '500000', '1'),
(2, 'DEPOSITO_MIKRO_MAX', 'deposito mikro maximal', '5000000', '1'),
(3, 'DEPOSITO_MAKRO_MIN', 'deposito makro minimal', '5100000', '1'),
(4, 'DEPOSITO_MAKRO_MAX', 'deposito makro maximal', '500000000', '1'),
(5, 'DEPOSITO_PRIORITAS_MIN', 'deposito prioritas minimal', '501000000', '1'),
(6, 'DEPOSITO_PRIORITAS_MAX', 'deposito prioritas maximal', '5000000000', '1'),
(7, 'BIAYA_PENDAFTARAN', 'biaya pendaftaran', '25000', '1'),
(8, 'DEPO_MIN', 'deposit minimal', '100000', '1'),
(9, 'DEPO_MAX', 'deposit maximal', '5000000000', '1'),
(10, 'CURRENCY', 'mata uang ', 'Rp', '1'),
(11, 'DEPOSIT', 'apakah bisa deposit', '-', '1'),
(12, 'WITHDRAW', 'apakah bisa withdraw', '-', '1'),
(13, 'WD_MIN', 'minimal withdraw', '500000', '1'),
(14, 'WD_MAX', 'maximal withdraw', '500000000', '1'),
(15, 'DAFTAR_ANGGOTA', 'apakah bisa daftar anggota', '-', '1'),
(16, 'SIMPANAN_POKOK', 'simpanan pokok', '250000', '1'),
(17, 'SIMPANAN_WAJIB', 'simpanan wajib', '50000', '1'),
(18, 'DEPOSITO_MIKRO_KONTRAK', 'kontrak(bulan)', '24', '1'),
(19, 'DEPOSITO_MIKRO_DEVIDEN', 'deviden (persen) diterima langsung setelah kontrak berakhir', '100', '1'),
(20, 'DEPOSITO_MAKRO_1_KONTRAK', 'kontrak (bulan)', '3', '1'),
(21, 'DEPOSITO_MAKRO_1_DEVIDEN', 'deviden (persen)', '1', '1'),
(22, 'DEPOSITO_MAKRO_2_KONTRAK', 'kontrak (bulan)', '6', '1'),
(23, 'DEPOSITO_MAKRO_2_DEVIDEN', 'deviden (persen)', '1.5', '1'),
(24, 'DEPOSITO_MAKRO_3_KONTRAK', 'kontrak (bulan)', '12', '1'),
(25, 'DEPOSITO_MAKRO_3_DEVIDEN', 'deviden (persen)', '2.5', '1'),
(26, 'DEPOSITO_PRIORITAS_KONTRAK', 'kontrak (bulan)', '36', '1'),
(27, 'DEPOSITO_PRIORITAS_DEVIDEN', 'deviden pertahun', '50', '1'),
(28, 'DEPOSITO_PRIORITAS_ROYALTI', 'royalti perbulan', '1', '1'),
(29, 'DEPOSITO', 'apakah bisa deposito', '', '0'),
(30, 'TGL', 'tanggal refresh', '2020-02-05 11:54:11', '1'),
(31, 'REFRESH', 'apakah bisa refresh atau tidak', '', '1'),
(32, 'TIMEZONE', 'timezone tanggal', 'Asia/Makassar', '1'),
(33, 'PINJAMAN', 'apakah bisa meminjam', '', '1'),
(34, 'KEUNTUNGAN_KOPERASI', 'keuntungan secara manual', '30000000', '1'),
(35, 'LOGIN_ANGGOTA', 'apakah anggota bisa login', '', '1'),
(36, 'LOGIN_PENGURUS', 'apakah pengurus bisa login', '', '1'),
(37, 'SIMPANAN', 'apakah bisa menyimpan', '', '1'),
(38, 'CJ_SHARE_PROFIT', 'apakah bisa bagi untung', '', '1'),
(39, 'KOMISI_SPONSOR_AWAL', 'komisi sponsor awal', '5', '1'),
(40, 'KOMISI_SPONSOR_BERJALAN', 'komisi sponsor berjalan', '2.5', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_lentera_setting`
--
ALTER TABLE `tb_lentera_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_lentera_setting`
--
ALTER TABLE `tb_lentera_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
