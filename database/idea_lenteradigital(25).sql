-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 12:01 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idea_lenteradigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `cj_bagi_untung`
--

CREATE TABLE `cj_bagi_untung` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `isi_web`
--

CREATE TABLE `isi_web` (
  `id` int(11) NOT NULL,
  `kode` varchar(200) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_web`
--

INSERT INTO `isi_web` (`id`, `kode`, `isi`) VALUES
(1, 'home_4_title1a', 'LENTERA DIGITAL INDONESIA'),
(2, 'home_4_title1b', 'KOPERASI'),
(3, 'home_4_title1c', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(4, 'home_4_img1', 'isi_5df060127048b5_54578535.png'),
(5, 'home_5a_judul1', 'The fastest way to grow your business with the leader in'),
(6, 'home_5a_judul2', 'Technology'),
(7, 'home_5a_judul3', 'Check out our options and features included'),
(8, 'home_5b_judul1', 'Porto is'),
(9, 'home_5b_judul2a', 'extremely'),
(10, 'home_5b_judul2b', 'incredibly'),
(11, 'home_5b_judul2c', 'especially'),
(12, 'home_5b_judul3', 'beautiful and fully responsive.'),
(13, 'home_5b_keterangan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.'),
(14, 'home_5c_1a', 'icon-support'),
(15, 'home_5c_1b', 'CUSTOMER SUPPORT'),
(16, 'home_5c_1c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.'),
(17, 'home_5c_2a', 'icon-layers'),
(18, 'home_5c_2b', 'SLIDERS'),
(19, 'home_5c_2c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.'),
(20, 'home_5c_3a', 'icon-menu'),
(21, 'home_5c_3b', 'BUTTONS'),
(22, 'home_5c_3c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.'),
(23, 'home_5c_4a', 'icon-doc'),
(24, 'home_5c_4b', 'HTML5 / CSS3 / JS'),
(25, 'home_5c_4c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.'),
(26, 'home_5c_5a', 'icon-user'),
(27, 'home_5c_5b', 'ICONS'),
(28, 'home_5c_5c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.'),
(29, 'home_5c_6a', 'icon-screen-desktop'),
(30, 'home_5c_6b', 'LIGHTBOX'),
(31, 'home_5c_6c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dignissim ante eleifend.'),
(32, 'home_1_img', 'isi_5de75361ad8789_44840037.jpeg'),
(33, 'home_1_judul1', 'Who'),
(34, 'home_1_judul2', 'We Are'),
(35, 'home_1_isi1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id valorem ipsum dolor sit amet, consectetur adipiscinorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(36, 'home_1_isi2', 'Phasellus blandit massa enim. Nullam id varius elit. blandit massa enimariusius.'),
(40, 'home_5d_1a', 'icon-people'),
(41, 'home_5d_1b', 'LOVED BY CUSTOMERS'),
(42, 'home_5d_1c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(43, 'home_5d_2a', 'icon-docs'),
(44, 'home_5d_2b', 'WELL DOCUMENTED'),
(45, 'home_5d_2c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(46, 'home_5d_3a', 'icon-trophy'),
(47, 'home_5d_3b', 'WINNER'),
(48, 'home_5d_3c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(49, 'home_5d_4a', 'icon-equalizer'),
(50, 'home_5d_4b', 'CUSTOMIZABLE'),
(51, 'home_5d_4c', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(52, 'tentang_1_img', 'isi_5de772e8131e47_38176086.jpeg'),
(53, 'tentang_1_judul1', 'Lentera Digital Indonesia'),
(54, 'tentang_1_judul2', 'KOPERASI'),
(55, 'tentang_1_isi1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vehicula sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam. Donec ante risus, dapibus sed lectus non, lacinia vestibulum nisi. Morbi vitae augue quam. Nullam ac laoreet libero.'),
(56, 'tentang_1_isi2', 'Consectetur adipiscing elit. Aliquam iaculis sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam.'),
(57, 'visimisi_1_title1', 'Visi dan Misi'),
(58, 'visimisi_1_title2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna.'),
(59, 'visimisi_1_visi', '<span xss=removed>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna. Phasellus semper scelerisque purus, et semper nisl lacinia sit amet. Praesent venenatis turpis vitae purus semper...</span>'),
(60, 'visimisi_1_misi', '<span xss=removed>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna. Phasellus semper scelerisque purus, et semper nisl lacinia sit amet. Praesent venenatis turpis vitae purus semper...</span>'),
(61, 'visimisi_1_quotes1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna.'),
(62, 'visimisi_1_quotes2', 'CEO'),
(63, 'visimisi_2_img2a', 'isi_5de77bcf142e34_97390963.jpeg'),
(64, 'visimisi_2_img2b', 'isi_5de77ca6979bb9_62710837.jpeg'),
(65, 'visimisi_2_img2c', 'isi_5de77cb7752d06_87640798.jpeg'),
(66, 'visimisi_2_img2d', 'isi_5de77cbe481ad1_27180750.jpeg'),
(67, 'header_1', ''),
(68, 'adrt', '                                <div xss=removed>ADRT</div>                                '),
(69, 'adrt_title1', 'AD/ART'),
(70, 'adrt_title2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna.'),
(71, 'blog_title', 'Program Kami'),
(72, 'blog_subtitle', 'Program Kami'),
(73, 'struktur_a1', 'Pembina'),
(74, 'struktur_b1', 'Pengawas'),
(75, 'struktur_c1', 'Ketua'),
(76, 'struktur_d1', 'Sekretaris'),
(77, 'struktur_e1', 'Bendahara'),
(78, 'struktur_a2', 'isi_5de78e978e82b5_84122161.jpeg'),
(79, 'struktur_b2', ''),
(80, 'struktur_c2', ''),
(81, 'struktur_d2', ''),
(82, 'struktur_e2', ''),
(83, 'lain_header', 'isi_5df063b40813b8_59977310.png'),
(84, 'lain_footer_img', 'isi_5df0a1189d91a9_66742409.png'),
(85, 'lain_footer_ket', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna. Phasellus semper scelerisque purus, et semper nisl lacinia sit amet. Praesent venenatis turpis vitae purus semper'),
(86, 'pengurus_adrt', '<p class="MsoNormal" align="center" xss=removed><b><span xss=removed>ANGGARAN\r\nDASAR (AD)<o></o></span></b></p><p class="MsoNormal" align="center" xss=removed><b><span xss=removed>KOPERASI\r\nLENTERA DIGITAL INDONESIA<o></o></span></b></p><p class="MsoNormal"><span xss=removed> <o></o></span></p><p class="MsoNormal" align="center" xss=removed><b><span xss=removed>BAB\r\nI<o></o></span></b></p><p class="MsoNormal" align="center" xss=removed><b><span xss=removed>NAMA\r\nDAN TEMPAT KEDUDUKAN<o></o></span></b></p><p class="MsoNormal" align="center" xss=removed><span xss=removed><o> </o></span></p><p class="MsoNormal" align="center" xss=removed><span xss=removed>Pasal\r\n1<o></o></span></p><p class="MsoListParagraphCxSpFirst" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>1.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi ini bernama Koperasi LENTERA\r\nDIGITAL INDONESIA dan selanjutnya dalam Anggaran Dasar ini disebut Koperasi. <o></o></span></p><p class="MsoNormal" align="center" xss="removed">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class="MsoListParagraphCxSpLast" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>2.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi ini berkedudukan di Jl.\r\nToddopuli X Blok A1 No. 1F, Makassar, Sulawesi – Selatan.  <o></o></span></p>'),
(87, 'pengurus_aturan', 'Aturan dan Sanksi');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id_log` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`id_log`, `id_user`, `ip_address`, `user_agent`, `keterangan`, `date`) VALUES
(1, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-02 23:12:41'),
(2, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-03 11:14:30'),
(3, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-03 11:19:32'),
(4, 16, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'pengurus', '2020-01-03 11:22:10'),
(5, 16, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'pengurus', '2020-01-03 14:31:40'),
(6, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-04 14:29:09'),
(7, 16, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'pengurus', '2020-01-04 15:36:20'),
(8, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-05 20:59:09'),
(9, 16, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'pengurus', '2020-01-05 21:06:55'),
(10, 3, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-05 21:50:38'),
(11, 16, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'pengurus', '2020-01-05 21:51:25'),
(12, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-05 21:58:46'),
(13, 3, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-05 22:26:31'),
(14, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-05 22:28:24'),
(15, 3, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-05 22:29:37'),
(16, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-05 22:30:26'),
(17, 16, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'pengurus', '2020-01-06 11:44:15'),
(18, 16, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'pengurus', '2020-01-06 12:19:40'),
(19, 1, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'anggota', '2020-01-06 15:38:20'),
(20, 16, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'pengurus', '2020-01-06 16:06:56'),
(21, 16, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'pengurus', '2020-01-06 18:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `persen_share_profit`
--

CREATE TABLE `persen_share_profit` (
  `id_persen` int(11) NOT NULL,
  `kode` varchar(2) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `profit` decimal(3,2) NOT NULL COMMENT 'persen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persen_share_profit`
--

INSERT INTO `persen_share_profit` (`id_persen`, `kode`, `bulan`, `profit`) VALUES
(1, '01', '01', '1.00'),
(2, '02', '02', '1.00'),
(3, '03', '03', '1.20'),
(4, '04', '04', '1.00'),
(5, '05', '05', '1.00'),
(6, '06', '06', '1.00'),
(7, '07', '07', '1.00'),
(8, '08', '08', '1.00'),
(9, '09', '09', '1.00'),
(10, '10', '10', '1.00'),
(11, '11', '11', '1.00'),
(12, '12', '12', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_setting_pinjaman` int(11) NOT NULL,
  `jangka_waktu` int(11) NOT NULL COMMENT 'bulan',
  `bunga` decimal(5,2) NOT NULL,
  `status` enum('0','1','9') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_setting_pinjaman`, `jangka_waktu`, `bunga`, `status`) VALUES
(1, 3, '1.00', '1'),
(2, 6, '2.00', '1'),
(3, 12, '3.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `id_reset` int(11) NOT NULL,
  `resetEmail` text NOT NULL,
  `resetSelector` text NOT NULL,
  `resetToken` longtext NOT NULL,
  `resetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `no_anggota` varchar(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(14) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL,
  `kota_perusahaan` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pass_tr` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL,
  `bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_parent`, `no_anggota`, `username`, `password`, `nama`, `email`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `no_hp`, `alamat`, `kecamatan`, `kelurahan`, `kota`, `pekerjaan`, `jabatan`, `perusahaan`, `alamat_perusahaan`, `kota_perusahaan`, `pendidikan`, `pass_tr`, `join_date`, `status`, `bank`, `no_rekening`) VALUES
(1, 0, '0000001', 'user1', '$2y$10$.3/i7AqXoyTCG/Np/TPx4OVlexVYIYFhA/xqWO2L5s.1as5Gbmjn2', 'Fasaya', 'andifasaya@gmail.com', 'Makassar', '12/04/2019', '123456', '0811415779', 'gdew', 'brae', 'rbea', 'bre', 'dd', '', '', '', '', 'S1', '$2y$10$2SMU29G1BAULRC..fu913e.yfYGNYSl/EDDOVTnCI75BX2Df8.vSq', '2019-12-20 10:54:48', '1', 'BCA', '1234'),
(2, 1, '0000002', 'dsv', '', 'fgtn', 'aya_maruf@yahoo.com', '', '', '', '0811443599', '', '', '', '', '', '', '', '', '', '', '', '2020-01-03 11:18:11', '0', '', ''),
(3, 1, '0000003', 'aminah', '$2y$10$z.JvPDXHcWCMMdoqJro/HOltVly/P1o93uDUkSskjqfwGct.5qady', 'sac', 'fasayaa@yahoo.com', 'sss', '01/21/2020', '12345678', '098721', 's', 'sd', 'vds', 'vd', 'vsd', '', '', '', '', 'vsd', '$2y$10$z.JvPDXHcWCMMdoqJro/HOltVly/P1o93uDUkSskjqfwGct.5qady', '2020-01-05 21:48:59', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagi_untung`
--

CREATE TABLE `tb_bagi_untung` (
  `id_bagi_untung` int(11) NOT NULL,
  `kode_tr` varchar(12) NOT NULL,
  `id_simp_sukarela` int(11) NOT NULL,
  `persen` decimal(3,2) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_pendaftaran`
--

CREATE TABLE `tb_biaya_pendaftaran` (
  `id_biaya_daftar` int(11) NOT NULL,
  `kode_tr` varchar(12) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `id_child` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_withdraw`
--

CREATE TABLE `tb_biaya_withdraw` (
  `id_biaya_withdraw` int(11) NOT NULL,
  `kode_tr` varchar(12) NOT NULL,
  `id_withdrawal` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id_blog` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `date` datetime NOT NULL,
  `is_deleted` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`id_blog`, `slug`, `img`, `judul`, `isi`, `date`, `is_deleted`) VALUES
(7, 'maknal-logo-lentera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(9, 'maknal-logo-lentera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(12, 'maknal-logo-lentera-digsital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(13, 'maknal-logo-lentersaa-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(14, 'madknal-logo-lentera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(15, 'maknal-logo-lntera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(16, 'maknal-logo-lentera-disital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(17, 'maknal-logo-lentrsaa-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(18, 'maknal-logo-lenytera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(19, 'maknal-ldogo-lentera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(20, 'maknal-logo-lentera-diwgsital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(21, 'maknal-logo-lenterswaa-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(22, 'madknal-logo-lenteera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(23, 'maknal-logo-lfntera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(24, 'maknal-lobgo-lentera-disital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0'),
(25, 'maknal-logo-lentrsaa-digsital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bonus_sponsor`
--

CREATE TABLE `tb_bonus_sponsor` (
  `id_royalti` int(11) NOT NULL,
  `kode_tr` varchar(12) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_child` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_deposit`
--

CREATE TABLE `tb_deposit` (
  `id_deposit` int(255) NOT NULL,
  `kode_tr` varchar(10) NOT NULL,
  `id_anggota` int(255) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `last_code` varchar(255) NOT NULL,
  `id_gateway` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('0','1','2','9') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_deposito`
--

CREATE TABLE `tb_deposito` (
  `id_deposito` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `kode_tr` varchar(12) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `deviden` decimal(5,1) NOT NULL,
  `royalti` decimal(5,1) NOT NULL,
  `bulan` int(11) NOT NULL,
  `kali` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL,
  `tipe` enum('mikro','makro','prioritas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_deviden`
--

CREATE TABLE `tb_deviden` (
  `id_deviden` int(11) NOT NULL,
  `kode_tr` varchar(12) NOT NULL,
  `id_deposito` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gateway`
--

CREATE TABLE `tb_gateway` (
  `id_gateway` int(11) NOT NULL,
  `gateway` varchar(200) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `status` enum('1','0','9') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gateway`
--

INSERT INTO `tb_gateway` (`id_gateway`, `gateway`, `no_rekening`, `atas_nama`, `status`) VALUES
(1, 'BCA', '12345689', 'Lentera Digital Indonesia', '1'),
(2, 'BNI', '11111111111111', 'Koperasi Lentera Digital Indonesia', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komisi_sponsor`
--

CREATE TABLE `tb_komisi_sponsor` (
  `id_komisi_sponsor` int(11) NOT NULL,
  `kode_tr` varchar(12) NOT NULL,
  `id_simp_sukarela` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_child` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 'WITHDRAW', 'apakah bisa withdraw', '-', '0'),
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
(30, 'TGL', 'tanggal refresh', '2019-12-30 19:52:57', '0'),
(31, 'REFRESH', 'apakah bisa refresh atau tidak', '', '1'),
(32, 'TIMEZONE', 'timezone tanggal', 'Asia/Makassar', '1'),
(33, 'PINJAMAN', 'apakah bisa meminjam', '', '1'),
(34, 'KEUNTUNGAN_KOPERASI', 'keuntungan secara manual', '3', '1'),
(35, 'LOGIN_ANGGOTA', 'apakah anggota bisa login', '', '1'),
(36, 'LOGIN_PENGURUS', 'apakah pengurus bisa login', '', '1'),
(37, 'SIMPANAN', 'apakah bisa menyimpan', '', '1'),
(38, 'CJ_SHARE_PROFIT', 'apakah bisa bagi untung', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `keterangan` enum('admin') NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_user`, `username`, `password`, `keterangan`, `email`) VALUES
(1, 'admin', '$2y$10$uU3FUHwq6JDhTAUqx39FIeHEQJDe2y5v3vBtndkTS.MbzorWTZQDW', 'admin', 'adminweb@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengurus`
--

CREATE TABLE `tb_pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `no_pengurus` varchar(12) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(14) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL,
  `kota_perusahaan` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pass_tr` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengurus`
--

INSERT INTO `tb_pengurus` (`id_pengurus`, `no_pengurus`, `username`, `password`, `nama`, `email`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `no_hp`, `alamat`, `kecamatan`, `kelurahan`, `kota`, `pekerjaan`, `jabatan`, `perusahaan`, `alamat_perusahaan`, `kota_perusahaan`, `pendidikan`, `pass_tr`, `join_date`, `status`) VALUES
(16, '', 'fasaya', '$2y$10$nHtKtIpTwczrKEoY5A2E2.MS4tomy3kgAhAFbByO6q9xToRv4DzRi', 'Andi Fasaya Yaqhsya', 'aya_maruf@yahoo.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$2y$10$V5LfneQmlCgMfItcnWzEUOEsPsyYWUqM.sQSJaKlka8oZtpN0Dzye', '2019-12-24 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `kode_tr` varchar(12) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `bunga` decimal(5,0) NOT NULL COMMENT 'persen',
  `jumlah_bunga` decimal(20,0) NOT NULL,
  `periode` int(11) NOT NULL COMMENT 'bulan',
  `angsuran` int(11) NOT NULL COMMENT 'berapa kali',
  `keterangan` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `start_date` datetime NOT NULL,
  `status` enum('0','1','9') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman_bayar`
--

CREATE TABLE `tb_pinjaman_bayar` (
  `id_bayar` int(11) NOT NULL,
  `kode_tr` varchar(12) NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `id_report` int(11) NOT NULL,
  `kode_tr` varchar(10) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `debit` decimal(20,0) NOT NULL,
  `credit` decimal(20,0) NOT NULL,
  `saldo` decimal(20,0) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_report_activity`
--

CREATE TABLE `tb_report_activity` (
  `id_activity` int(11) NOT NULL,
  `id_user` varchar(10) DEFAULT NULL,
  `user` enum('anggota','pengurus') NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_royalti`
--

CREATE TABLE `tb_royalti` (
  `id_royalti` int(11) NOT NULL,
  `kode_tr` varchar(12) NOT NULL,
  `id_deposito` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `nomor` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id_setting` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`id_setting`, `kode`, `nama`, `nilai`) VALUES
(3, 'NOHP', 'No. Handphone', '62811444333'),
(4, 'NOWA', 'No. Whatsapp', '62811444333'),
(5, 'EMAIL', 'E-mail', 'contohemail@gmail.com'),
(6, 'ALAMAT', 'Alamat', 'Jalan Toddopuli X'),
(7, 'CS', 'email cs', 'cs@lenteradigitalindonesia.com'),
(8, 'WEBSITE', 'link website', 'www.lenteradigitalindonesia.com'),
(9, 'NOTLP', 'nomor tlp', '0411'),
(10, 'WEBNAME', 'nama website', 'Koperasi Lentera Digital Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_simpanan_pokok`
--

CREATE TABLE `tb_simpanan_pokok` (
  `id_simpanan` int(11) NOT NULL,
  `kode_tr` varchar(10) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_simpanan_sukarela`
--

CREATE TABLE `tb_simpanan_sukarela` (
  `id_simpanan` int(11) NOT NULL,
  `kode_tr` varchar(10) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_simpanan_wajib`
--

CREATE TABLE `tb_simpanan_wajib` (
  `id_simpanan` int(11) NOT NULL,
  `kode_tr` varchar(10) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `bulan_tahun` date NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_withdrawal`
--

CREATE TABLE `tb_withdrawal` (
  `id_withdrawal` int(11) NOT NULL,
  `kode_tr` varchar(12) NOT NULL,
  `id_anggota` int(255) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `amount_request` decimal(20,0) NOT NULL,
  `gateway` varchar(255) NOT NULL,
  `no_rek` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('0','1','9') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cj_bagi_untung`
--
ALTER TABLE `cj_bagi_untung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isi_web`
--
ALTER TABLE `isi_web`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_member` (`id_user`);

--
-- Indexes for table `persen_share_profit`
--
ALTER TABLE `persen_share_profit`
  ADD PRIMARY KEY (`id_persen`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_setting_pinjaman`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`id_reset`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `no_anggota` (`no_anggota`);

--
-- Indexes for table `tb_bagi_untung`
--
ALTER TABLE `tb_bagi_untung`
  ADD PRIMARY KEY (`id_bagi_untung`),
  ADD KEY `id_simp_sukarela` (`id_simp_sukarela`);

--
-- Indexes for table `tb_biaya_pendaftaran`
--
ALTER TABLE `tb_biaya_pendaftaran`
  ADD PRIMARY KEY (`id_biaya_daftar`),
  ADD UNIQUE KEY `kode_tr` (`kode_tr`),
  ADD KEY `id_child` (`id_child`);

--
-- Indexes for table `tb_biaya_withdraw`
--
ALTER TABLE `tb_biaya_withdraw`
  ADD PRIMARY KEY (`id_biaya_withdraw`),
  ADD UNIQUE KEY `kode_tr` (`kode_tr`),
  ADD KEY `id_anggota` (`id_withdrawal`);

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id_blog`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `tb_bonus_sponsor`
--
ALTER TABLE `tb_bonus_sponsor`
  ADD PRIMARY KEY (`id_royalti`),
  ADD UNIQUE KEY `kode_tr` (`kode_tr`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_child` (`id_child`),
  ADD KEY `id_anggota_2` (`id_anggota`),
  ADD KEY `id_anggota_3` (`id_anggota`);

--
-- Indexes for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  ADD PRIMARY KEY (`id_deposit`),
  ADD UNIQUE KEY `kode_tr` (`kode_tr`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tb_deposito`
--
ALTER TABLE `tb_deposito`
  ADD PRIMARY KEY (`id_deposito`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tb_deviden`
--
ALTER TABLE `tb_deviden`
  ADD PRIMARY KEY (`id_deviden`),
  ADD UNIQUE KEY `kode_tr` (`kode_tr`),
  ADD KEY `id_deposito` (`id_deposito`);

--
-- Indexes for table `tb_gateway`
--
ALTER TABLE `tb_gateway`
  ADD PRIMARY KEY (`id_gateway`);

--
-- Indexes for table `tb_komisi_sponsor`
--
ALTER TABLE `tb_komisi_sponsor`
  ADD PRIMARY KEY (`id_komisi_sponsor`),
  ADD KEY `id_simp_sukarela` (`id_simp_sukarela`),
  ADD KEY `id_parent` (`id_parent`),
  ADD KEY `id_child` (`id_child`);

--
-- Indexes for table `tb_lentera_setting`
--
ALTER TABLE `tb_lentera_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_pengurus`
--
ALTER TABLE `tb_pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD UNIQUE KEY `no_pengurus` (`no_pengurus`);

--
-- Indexes for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD UNIQUE KEY `kode_tr` (`kode_tr`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tb_pinjaman_bayar`
--
ALTER TABLE `tb_pinjaman_bayar`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `id_pinjaman` (`id_pinjaman`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tb_report_activity`
--
ALTER TABLE `tb_report_activity`
  ADD PRIMARY KEY (`id_activity`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_royalti`
--
ALTER TABLE `tb_royalti`
  ADD PRIMARY KEY (`id_royalti`),
  ADD UNIQUE KEY `kode_tr` (`kode_tr`),
  ADD KEY `id_deposito` (`id_deposito`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tb_simpanan_pokok`
--
ALTER TABLE `tb_simpanan_pokok`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD UNIQUE KEY `kode_tr` (`kode_tr`),
  ADD UNIQUE KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_anggota_2` (`id_anggota`),
  ADD KEY `id_anggota_3` (`id_anggota`);

--
-- Indexes for table `tb_simpanan_sukarela`
--
ALTER TABLE `tb_simpanan_sukarela`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD UNIQUE KEY `kode_tr` (`kode_tr`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tb_simpanan_wajib`
--
ALTER TABLE `tb_simpanan_wajib`
  ADD PRIMARY KEY (`id_simpanan`),
  ADD UNIQUE KEY `kode_tr` (`kode_tr`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tb_withdrawal`
--
ALTER TABLE `tb_withdrawal`
  ADD PRIMARY KEY (`id_withdrawal`),
  ADD UNIQUE KEY `kode_tr` (`kode_tr`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cj_bagi_untung`
--
ALTER TABLE `cj_bagi_untung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `isi_web`
--
ALTER TABLE `isi_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id_log` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `persen_share_profit`
--
ALTER TABLE `persen_share_profit`
  MODIFY `id_persen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_setting_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `id_reset` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_bagi_untung`
--
ALTER TABLE `tb_bagi_untung`
  MODIFY `id_bagi_untung` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_biaya_pendaftaran`
--
ALTER TABLE `tb_biaya_pendaftaran`
  MODIFY `id_biaya_daftar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_biaya_withdraw`
--
ALTER TABLE `tb_biaya_withdraw`
  MODIFY `id_biaya_withdraw` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_bonus_sponsor`
--
ALTER TABLE `tb_bonus_sponsor`
  MODIFY `id_royalti` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  MODIFY `id_deposit` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_deposito`
--
ALTER TABLE `tb_deposito`
  MODIFY `id_deposito` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_deviden`
--
ALTER TABLE `tb_deviden`
  MODIFY `id_deviden` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_gateway`
--
ALTER TABLE `tb_gateway`
  MODIFY `id_gateway` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_komisi_sponsor`
--
ALTER TABLE `tb_komisi_sponsor`
  MODIFY `id_komisi_sponsor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_lentera_setting`
--
ALTER TABLE `tb_lentera_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_pengurus`
--
ALTER TABLE `tb_pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_pinjaman_bayar`
--
ALTER TABLE `tb_pinjaman_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_report_activity`
--
ALTER TABLE `tb_report_activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_royalti`
--
ALTER TABLE `tb_royalti`
  MODIFY `id_royalti` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_simpanan_pokok`
--
ALTER TABLE `tb_simpanan_pokok`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_simpanan_sukarela`
--
ALTER TABLE `tb_simpanan_sukarela`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_simpanan_wajib`
--
ALTER TABLE `tb_simpanan_wajib`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_withdrawal`
--
ALTER TABLE `tb_withdrawal`
  MODIFY `id_withdrawal` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bagi_untung`
--
ALTER TABLE `tb_bagi_untung`
  ADD CONSTRAINT `tb_bagi_untung_ibfk_1` FOREIGN KEY (`id_simp_sukarela`) REFERENCES `tb_simpanan_sukarela` (`id_simpanan`);

--
-- Constraints for table `tb_biaya_pendaftaran`
--
ALTER TABLE `tb_biaya_pendaftaran`
  ADD CONSTRAINT `tb_biaya_pendaftaran_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `tb_anggota` (`id_anggota`);

--
-- Constraints for table `tb_biaya_withdraw`
--
ALTER TABLE `tb_biaya_withdraw`
  ADD CONSTRAINT `tb_biaya_withdraw_ibfk_1` FOREIGN KEY (`id_withdrawal`) REFERENCES `tb_withdrawal` (`id_withdrawal`);

--
-- Constraints for table `tb_bonus_sponsor`
--
ALTER TABLE `tb_bonus_sponsor`
  ADD CONSTRAINT `tb_bonus_sponsor_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`);

--
-- Constraints for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  ADD CONSTRAINT `tb_deposit_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`);

--
-- Constraints for table `tb_deposito`
--
ALTER TABLE `tb_deposito`
  ADD CONSTRAINT `tb_deposito_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_deviden`
--
ALTER TABLE `tb_deviden`
  ADD CONSTRAINT `tb_deviden_ibfk_1` FOREIGN KEY (`id_deposito`) REFERENCES `tb_deposito` (`id_deposito`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_komisi_sponsor`
--
ALTER TABLE `tb_komisi_sponsor`
  ADD CONSTRAINT `tb_komisi_sponsor_ibfk_1` FOREIGN KEY (`id_simp_sukarela`) REFERENCES `tb_simpanan_sukarela` (`id_simpanan`),
  ADD CONSTRAINT `tb_komisi_sponsor_ibfk_2` FOREIGN KEY (`id_parent`) REFERENCES `tb_anggota` (`id_anggota`),
  ADD CONSTRAINT `tb_komisi_sponsor_ibfk_3` FOREIGN KEY (`id_child`) REFERENCES `tb_anggota` (`id_anggota`);

--
-- Constraints for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD CONSTRAINT `tb_pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`);

--
-- Constraints for table `tb_pinjaman_bayar`
--
ALTER TABLE `tb_pinjaman_bayar`
  ADD CONSTRAINT `tb_pinjaman_bayar_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `tb_pinjaman` (`id_pinjaman`);

--
-- Constraints for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD CONSTRAINT `tb_report_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`);

--
-- Constraints for table `tb_royalti`
--
ALTER TABLE `tb_royalti`
  ADD CONSTRAINT `tb_royalti_ibfk_1` FOREIGN KEY (`id_deposito`) REFERENCES `tb_deposito` (`id_deposito`);

--
-- Constraints for table `tb_simpanan_pokok`
--
ALTER TABLE `tb_simpanan_pokok`
  ADD CONSTRAINT `tb_simpanan_pokok_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`);

--
-- Constraints for table `tb_simpanan_sukarela`
--
ALTER TABLE `tb_simpanan_sukarela`
  ADD CONSTRAINT `tb_simpanan_sukarela_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`);

--
-- Constraints for table `tb_simpanan_wajib`
--
ALTER TABLE `tb_simpanan_wajib`
  ADD CONSTRAINT `tb_simpanan_wajib_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`);

--
-- Constraints for table `tb_withdrawal`
--
ALTER TABLE `tb_withdrawal`
  ADD CONSTRAINT `tb_withdrawal_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
