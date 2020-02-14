-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2020 at 01:48 PM
-- Server version: 10.2.30-MariaDB
-- PHP Version: 7.3.6

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
(2, 'home_4_title1b', 'KOPERASI SIMPAN PINJAM'),
(3, 'home_4_title1c', 'Bersama membangun ekonomi gotong royong'),
(4, 'home_4_img1', 'isi_5df060127048b5_54578535.png'),
(5, 'home_5a_judul1', 'Koperasi Digital yang'),
(6, 'home_5a_judul2', 'Tansparan'),
(7, 'home_5a_judul3', 'dan memudahkan anggota untuk mengakses segala aktivitas usaha koperasi'),
(8, 'home_5b_judul1', 'Koperasi Lentera Digital Indonesia, koperasi'),
(9, 'home_5b_judul2a', 'transparan'),
(10, 'home_5b_judul2b', 'digital'),
(11, 'home_5b_judul2c', 'terpercaya'),
(12, 'home_5b_judul3', '.'),
(13, 'home_5b_keterangan', 'Membangun professionalisme dan kemandirian'),
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
(33, 'home_1_judul1', 'KSP'),
(34, 'home_1_judul2', 'Lentera Digital Indonesia'),
(35, 'home_1_isi1', 'Koperasi Simpan Pinjam yang berbasis digital untuk menyahuti kebutuhan efisiensi dan transparansi dalam pengelolaannya. Koperasi Simpan Pinjam berskala Provinsi yang didirikan pada tanggal 30 Desember 2019 di Makassar tepatnya di Jalan Toddopuli X Baru Blok A1 No. 1F.'),
(36, 'home_1_isi2', 'Digital dan Transparan'),
(40, 'home_5d_1a', 'icon-people'),
(41, 'home_5d_1b', 'TERPERCAYA'),
(42, 'home_5d_1c', 'Terpercaya'),
(43, 'home_5d_2a', 'icon-globe'),
(44, 'home_5d_2b', 'DIGITAL'),
(45, 'home_5d_2c', 'Secara Digital'),
(46, 'home_5d_3a', 'icon-docs'),
(47, 'home_5d_3b', 'TRANSPARAN'),
(48, 'home_5d_3c', 'Transparan dalam pengelolaannya'),
(49, 'home_5d_4a', 'icon-energy'),
(50, 'home_5d_4b', 'MUDAH'),
(51, 'home_5d_4c', 'Mudah'),
(52, 'tentang_1_img', ''),
(53, 'tentang_1_judul1', 'Lentera Digital Indonesia'),
(54, 'tentang_1_judul2', 'Koperasi Simpan Pinjam'),
(55, 'tentang_1_isi1', 'Koperasi Simpan Pinjam berskala Provinsi yang didirikan pada tanggal 30 Desember 2019 di Makassar tepatnya di Jalan Toddopuli X Baru Blok A1 No. 1F. Koperasi Simpan Pinjam yang berbasis digital untuk menyahuti kebutuhan efisiensi dan transparansi dalam pengelolaannya.'),
(56, 'tentang_1_isi2', 'Beranggotakan 29 orang awal.'),
(57, 'visimisi_1_title1', 'Visi dan Misi'),
(58, 'visimisi_1_title2', 'Visi dan Misi Koperasi Simpan Pinjam Lentera Digital Indonesia'),
(59, 'visimisi_1_visi', '<ul><li>Membangun professionalisme dan kemandirian</li><li>Membangun semangat berkoperasi bagi generasi muda</li><li>Mengenalkan koperasi yang bisa mengikuti perkembangan jaman</li></ul>'),
(60, 'visimisi_1_misi', '<ul><li>Meningkatkan Kesejahteraan Anggota</li><li>Transparansi dalam pengelolaan kegiatan koperasi</li><li>Melayani anggota dengan professional berdasarkan prinsip-prinsip koperasi</li></ul>'),
(61, 'visimisi_1_quotes1', 'Ayo berkoperasi!'),
(62, 'visimisi_1_quotes2', 'Kasim (Ketua KSP Lentera Digital Indonesia)'),
(63, 'visimisi_2_img2a', 'isi_5de77bcf142e34_97390963.jpeg'),
(64, 'visimisi_2_img2b', 'isi_5de77ca6979bb9_62710837.jpeg'),
(65, 'visimisi_2_img2c', 'isi_5de77cb7752d06_87640798.jpeg'),
(66, 'visimisi_2_img2d', 'isi_5de77cbe481ad1_27180750.jpeg'),
(67, 'header_1', ''),
(68, 'adrt', '<p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>BAB I<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>NAMA DAN TEMPAT KEDUDUKAN<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed><o> </o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 1<o></o></span></p><p class=\"MsoListParagraphCxSpFirst\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>1.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nini bernama Koperasi LENTERA DIGITAL INDONESIA dan selanjutnya dalam Anggaran\r\nDasar ini disebut Koperasi. <o></o></span></p><p class=\"MsoListParagraphCxSpLast\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>2.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nini berkedudukan di Jl. Toddopuli X Blok A1 No. 1F, Makassar, Sulawesi –\r\nSelatan.  <o></o></span></p><p class=\"MsoNormal\"><span xss=removed><o> </o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>BAB II<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>LANDASAN, AZAS DAN PRINSIP<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 2<o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Koperasi\r\nberdasarkan Pancasila dan Undang-Undang Dasar 1945 serta berdasarkan atas azas\r\ngotong royong. <o></o></span></p><p class=\"MsoNormal\"><span xss=removed> <o></o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 3<o></o></span></p><p class=\"MsoListParagraphCxSpFirst\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>1.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nmelakukan kegiatannya berdasarkan prinsip-prinsip Koperasi yaitu : <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>a)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Keanggotaan\r\nbersifat sukarela dan terbuka; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>b)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pengelolaan\r\ndilakukan secara demokratis; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>c)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pembagian\r\nSHU dilakukan secara adil sebanding dengan besarnya jasa usaha masing–masing\r\nanggota; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>d)<span xss=removed>    \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pemberian\r\nbalas jasa yang terbatas terhadap modal; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>e)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Kemandirian;\r\n<o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>f)<span xss=removed>      \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Melaksanakan\r\npendidikan perkoperasian bagi anggota; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>g)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Kerjasama\r\nantar Koperasi. <o></o></span></p><p class=\"MsoListParagraphCxSpLast\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>2.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nsebagai badan usaha dalam melaksanakan kegiatannya mengorganisir pemanfaatan\r\ndan pendayagunaan sumber daya ekonomi para anggotanya atas dasar\r\nprinsip-prinsip Koperasi seperti tersebut pada ayat (1) di atas dan sesuai\r\ndengan kaidah-kaidah usaha ekonomi. <o></o></span></p><p class=\"MsoNormal\" align=\"center\" xss=\"removed\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o> </o></p>'),
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
(85, 'lain_footer_ket', 'Koperasi Digital yang Tansparan dan memudahkan anggota untuk mengakses segala aktivitas usaha koperasi'),
(86, 'pengurus_adrt', '<p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>BAB I<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>NAMA DAN TEMPAT KEDUDUKAN<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed><o> </o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 1<o></o></span></p><p class=\"MsoListParagraphCxSpFirst\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>1.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nini bernama Koperasi LENTERA DIGITAL INDONESIA dan selanjutnya dalam Anggaran\r\nDasar ini disebut Koperasi. <o></o></span></p><p class=\"MsoListParagraphCxSpLast\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>2.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nini berkedudukan di Jl. Toddopuli X Blok A1 No. 1F, Makassar, Sulawesi –\r\nSelatan.  <o></o></span></p><p class=\"MsoNormal\"><span xss=removed><o> </o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>BAB II<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><b><span xss=removed>LANDASAN, AZAS DAN PRINSIP<o></o></span></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 2<o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Koperasi\r\nberdasarkan Pancasila dan Undang-Undang Dasar 1945 serta berdasarkan atas azas\r\ngotong royong. <o></o></span></p><p class=\"MsoNormal\"><span xss=removed> <o></o></span></p><p class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>Pasal 3<o></o></span></p><p class=\"MsoListParagraphCxSpFirst\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>1.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nmelakukan kegiatannya berdasarkan prinsip-prinsip Koperasi yaitu : <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>a)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Keanggotaan\r\nbersifat sukarela dan terbuka; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>b)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pengelolaan\r\ndilakukan secara demokratis; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>c)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pembagian\r\nSHU dilakukan secara adil sebanding dengan besarnya jasa usaha masing–masing\r\nanggota; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>d)<span xss=removed>    \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Pemberian\r\nbalas jasa yang terbatas terhadap modal; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>e)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Kemandirian;\r\n<o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>f)<span xss=removed>      \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Melaksanakan\r\npendidikan perkoperasian bagi anggota; <o></o></span></p><p class=\"MsoListParagraphCxSpMiddle\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>g)<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Kerjasama\r\nantar Koperasi. <o></o></span></p><p class=\"MsoListParagraphCxSpLast\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>2.<span xss=removed>     \r\n</span></span>&lt;!--[endif]--&gt;<span xss=removed>Koperasi\r\nsebagai badan usaha dalam melaksanakan kegiatannya mengorganisir pemanfaatan\r\ndan pendayagunaan sumber daya ekonomi para anggotanya atas dasar\r\nprinsip-prinsip Koperasi seperti tersebut pada ayat (1) di atas dan sesuai\r\ndengan kaidah-kaidah usaha ekonomi. <o></o></span></p><p class=\"MsoNormal\" align=\"center\" xss=\"removed\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o> </o></p>'),
(87, 'pengurus_aturan', '<p>                                    Seperti yang tertera pada AD/ART, berikut sanksi:</p><p>1.Apabila Anggota, Pengurus dan Pengawas melanggar ketentuan Anggaran Dasar/\r\nAnggaran Rumah Tangga dan Peraturan lainnya yang berlaku di Koperasi dikenakan\r\nsanksi oleh Rapat Anggota berupa:\r\n</p><p xss=removed>a) peringatan lisan;\r\n</p><p xss=removed>b) peringatan tertulis;\r\n</p><p xss=removed>c) dipecat dari keanggotaan atau jabatannya;\r\n</p><p xss=removed>d) diberhentikan bukan atas kemauannya sendiri;</p><p xss=removed>\r\ne) diajukan ke Pengadilan.</p><p>2. Ketentuan mengenai sanksi diatur lebih lanjut dalam Anggaran Rumah Tangga. </p><p><br></p>'),
(88, 'adrt_pdf', 'pdf_5e1e8e94d25682_60697144.pdf');

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
(1, 16, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'pengurus', '2020-01-15 11:47:43'),
(2, 16, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'pengurus', '2020-01-15 11:50:45'),
(3, 16, '36.79.141.40', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36', 'pengurus', '2020-01-15 11:54:27'),
(4, 1, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'backoffice', '2020-01-15 12:09:19'),
(5, 1, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'backoffice', '2020-01-15 12:11:39'),
(6, 1, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'backoffice', '2020-01-15 13:24:48'),
(7, 16, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'pengurus', '2020-01-15 15:25:52'),
(8, 1, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.3; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4021.2 Safari/537.36', 'anggota', '2020-01-15 16:01:35'),
(9, 1, '182.0.207.183', 'Mozilla/5.0 (Linux; Android 9; MI 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.116 Mobile Safari/537.36', 'anggota', '2020-01-15 16:02:41'),
(10, 1, '180.245.74.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'anggota', '2020-01-15 22:47:30'),
(11, 1, '114.124.179.49', 'Mozilla/5.0 (Linux; Android 9; MI 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.116 Mobile Safari/537.36', 'anggota', '2020-01-16 15:25:35'),
(12, 1, '36.79.141.40', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', 'backoffice', '2020-01-16 18:00:05'),
(13, 1, '182.1.189.168', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.116 Mobile Safari/537.36', 'anggota', '2020-01-17 10:10:37'),
(14, 1, '182.0.214.236', 'Mozilla/5.0 (Linux; Android 9; MI 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.116 Mobile Safari/537.36', 'anggota', '2020-01-17 20:16:14'),
(15, 1, '114.124.149.10', 'Mozilla/5.0 (Linux; Android 9; MI 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.116 Mobile Safari/537.36', 'anggota', '2020-01-20 19:20:31'),
(16, 1, '114.124.138.190', 'Mozilla/5.0 (Linux; Android 9; MI 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.116 Mobile Safari/537.36', 'anggota', '2020-01-23 01:24:24'),
(17, 16, '36.79.141.174', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.136 Mobile Safari/537.36', 'pengurus', '2020-01-25 14:52:52'),
(18, 2, '114.124.182.52', 'Mozilla/5.0 (Linux; Android 9; MI 8) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.116 Mobile Safari/537.36', 'anggota', '2020-01-25 14:59:31'),
(19, 16, '36.75.140.41', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'pengurus', '2020-01-27 11:56:00'),
(20, 16, '36.75.140.41', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'pengurus', '2020-01-28 11:51:46'),
(21, 30, '36.75.140.41', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-01-28 20:54:29'),
(22, 30, '202.67.36.211', 'Mozilla/5.0 (Linux; Android 10; Android SDK built for x86 Build/QSR1.191030.002; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.185 Mobile Safari/537.36', 'anggota', '2020-01-28 22:00:59'),
(23, 30, '202.67.36.211', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-01-28 22:05:34'),
(24, 30, '202.67.36.211', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-01-28 22:10:57'),
(25, 30, '36.75.140.41', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-01-29 10:17:36'),
(26, 30, '202.67.36.192', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-01-29 10:36:48'),
(27, 30, '202.67.36.192', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-01-29 10:49:41'),
(28, 1, '36.75.141.245', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.136 Mobile Safari/537.36', 'backoffice', '2020-02-06 14:19:51'),
(29, 16, '36.75.141.245', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.136 Mobile Safari/537.36', 'pengurus', '2020-02-06 14:21:54'),
(30, 16, '36.75.141.245', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'pengurus', '2020-02-07 10:38:07'),
(31, 34, '202.67.36.213', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 10:54:56'),
(32, 35, '36.75.141.245', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 10:55:13'),
(33, 36, '112.215.173.188', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 11:15:07'),
(34, 34, '202.67.36.26', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 11:15:57'),
(35, 16, '36.75.141.245', 'Mozilla/5.0 (Windows NT 6.3; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.9 Safari/537.36', 'pengurus', '2020-02-07 14:27:52'),
(36, 16, '182.1.182.184', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.136 Mobile Safari/537.36', 'pengurus', '2020-02-07 14:32:20'),
(37, 36, '112.215.244.77', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 14:34:43'),
(38, 26, '182.0.235.156', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-07 14:46:14');

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
(1, '01', '01', 1.00),
(2, '02', '02', 1.00),
(3, '03', '03', 1.20),
(4, '04', '04', 1.00),
(5, '05', '05', 1.00),
(6, '06', '06', 1.00),
(7, '07', '07', 1.00),
(8, '08', '08', 1.00),
(9, '09', '09', 1.00),
(10, '10', '10', 1.00),
(11, '11', '11', 1.00),
(12, '12', '12', 1.00);

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
(1, 3, 12.00, '1'),
(2, 6, 11.00, '1'),
(3, 12, 10.00, '1');

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
  `provinsi` varchar(100) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `alamat_perusahaan` varchar(255) NOT NULL,
  `kota_perusahaan` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pass_tr` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  `bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_parent`, `no_anggota`, `username`, `password`, `nama`, `email`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `no_hp`, `alamat`, `kecamatan`, `kelurahan`, `kota`, `provinsi`, `kode_pos`, `pekerjaan`, `jabatan`, `perusahaan`, `alamat_perusahaan`, `kota_perusahaan`, `pendidikan`, `pass_tr`, `join_date`, `status`, `is_active`, `bank`, `no_rekening`) VALUES
(26, 0, '0000026', 'Hatta001', '$2y$10$qmmMBz6OZJvZiBvY2.nap.xC1RdMgG9jR8864TzgGMoEf0TQVzkVa', 'Akbar Ali', 'barly.bisnis@gmail.com', 'Makassar', '08/25/1988', '7371072408880001', '08114440241', 'Jalan Butta Butta Caddi', 'Tallo', 'Kaluko Bodoa', 'Makassar', 'Sulawesi Selatan', 90212, 'Wiraswasta', '', '', '', '', 'S1', '$2y$10$W6p4qEh5erKvJLGEYzCFN.dCO1KqpDqmDjV3AekKQcIKKGS5WKQkC', '2020-01-25 14:57:40', '1', '1', '', ''),
(31, 26, '0000031', 'vian88', '', 'Muh Haady Firmansyah', 'fhaady9@gmail.com', '', '', '', '08114490090', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-01-25 15:05:16', '0', '1', '', ''),
(32, 26, '0000032', 'Doyandolan', '', 'Galih', 'Galihbinsunarto@gmail.com', '', '', '', '082250414857', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-01-25 16:35:44', '0', '1', '', ''),
(37, 0, '0000037', 'Esafernanda', '', 'Esa', 'esafernanda3114@gmail.com', '', '', '', '0812278944', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-07 14:21:46', '0', '1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagi_untung`
--

CREATE TABLE `tb_bagi_untung` (
  `id_bagi_untung` int(11) NOT NULL,
  `kode_tr` varchar(15) NOT NULL,
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
  `kode_tr` varchar(15) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `id_child` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_biaya_pendaftaran`
--

INSERT INTO `tb_biaya_pendaftaran` (`id_biaya_daftar`, `kode_tr`, `id_anggota`, `id_child`, `amount`, `date`) VALUES
(2, 'BP-0000002', NULL, 26, 25000, '2020-01-25 14:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_biaya_withdraw`
--

CREATE TABLE `tb_biaya_withdraw` (
  `id_biaya_withdraw` int(11) NOT NULL,
  `kode_tr` varchar(15) NOT NULL,
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
(7, 'maknal-logo-lentera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(9, 'maknal-logo-lentera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(12, 'maknal-logo-lentera-digsital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(13, 'maknal-logo-lentersaa-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(14, 'madknal-logo-lentera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(15, 'maknal-logo-lntera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(16, 'maknal-logo-lentera-disital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(17, 'maknal-logo-lentrsaa-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(18, 'maknal-logo-lenytera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(19, 'maknal-ldogo-lentera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(20, 'maknal-logo-lentera-diwgsital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(21, 'maknal-logo-lenterswaa-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(22, 'madknal-logo-lenteera-digital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(23, 'maknal-logo-lfntera-digital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(24, 'maknal-lobgo-lentera-disital-indonesia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1'),
(25, 'maknal-logo-lentrsaa-digsital-indonessia', 'blog_5df061474e05d1_45973677.png', 'Maknal Logo Lentera Digital Indonesia', '<strong xss=removed>Lorem Ipsum</strong><span xss=removed> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2019-06-04 11:23:08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bonus_sponsor`
--

CREATE TABLE `tb_bonus_sponsor` (
  `id_royalti` int(11) NOT NULL,
  `kode_tr` varchar(15) NOT NULL,
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
  `kode_tr` varchar(15) NOT NULL,
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
  `kode_tr` varchar(15) NOT NULL,
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
  `kode_tr` varchar(15) NOT NULL,
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
(1, 'MANDIRI', '152-05-5524477-7', 'Koperasi Lentera Digital Indonesia', '1'),
(2, 'BNI', '11111111111111', 'Koperasi Lentera Digital Indonesia', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komisi_sponsor`
--

CREATE TABLE `tb_komisi_sponsor` (
  `id_komisi_sponsor` int(11) NOT NULL,
  `kode_tr` varchar(15) NOT NULL,
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
(30, 'TGL', 'tanggal refresh', '2020-02-05 11:54:11', '0'),
(31, 'REFRESH', 'apakah bisa refresh atau tidak', '', '1'),
(32, 'TIMEZONE', 'timezone tanggal', 'Asia/Makassar', '1'),
(33, 'PINJAMAN', 'apakah bisa meminjam', '', '1'),
(34, 'KEUNTUNGAN_KOPERASI', 'keuntungan secara manual', '0', '1'),
(35, 'LOGIN_ANGGOTA', 'apakah anggota bisa login', '', '1'),
(36, 'LOGIN_PENGURUS', 'apakah pengurus bisa login', '', '1'),
(37, 'SIMPANAN', 'apakah bisa menyimpan', '', '1'),
(38, 'CJ_SHARE_PROFIT', 'apakah bisa bagi untung', '', '1'),
(39, 'KOMISI_SPONSOR_AWAL', 'komisi sponsor awal', '5', '1'),
(40, 'KOMISI_SPONSOR_BERJALAN', 'komisi sponsor berjalan', '2.5', '1'),
(41, 'BIAYA_WD', 'biaya admin pada saat withdraw', '15', '1');

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
(16, '', 'pengurus', '$2y$10$gxIfxQ2Titwwg0ueGMnNN.FGbnKWKhZ6mK2D6iHoYdWH.IqrRER1i', 'Pengurus', 'aya_maruf@yahoo.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$2y$10$V5LfneQmlCgMfItcnWzEUOEsPsyYWUqM.sQSJaKlka8oZtpN0Dzye', '2019-12-24 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `kode_tr` varchar(15) NOT NULL,
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
  `kode_tr` varchar(15) NOT NULL,
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
  `kode_tr` varchar(15) NOT NULL,
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

--
-- Dumping data for table `tb_report_activity`
--

INSERT INTO `tb_report_activity` (`id_activity`, `id_user`, `user`, `keterangan`, `date`) VALUES
(1, '16', 'pengurus', 'Update pengaturan waktu', '2020-01-15 11:48:20'),
(2, '16', 'pengurus', 'Update pengaturan gateway', '2020-01-15 11:49:39'),
(3, '16', 'pengurus', 'Update password', '2020-01-15 11:51:00'),
(4, '16', 'pengurus', 'Update pengaturan lain', '2020-01-15 11:55:02'),
(5, '16', 'pengurus', 'Update pengaturan pinjaman', '2020-01-15 11:55:27'),
(6, '16', 'pengurus', 'Update pengaturan pinjaman', '2020-01-15 11:55:39'),
(7, '16', 'pengurus', 'Update pengaturan pinjaman', '2020-01-15 11:55:50'),
(8, '16', 'pengurus', 'Mendaftarkan anggota [0000030]', '2020-01-15 11:57:44'),
(9, '16', 'pengurus', 'Update ad/art', '2020-01-15 12:01:24'),
(10, '30', 'anggota', 'Update data rekening', '2020-01-15 16:01:53'),
(11, '30', 'anggota', 'Update password', '2020-01-15 16:02:03'),
(12, '30', 'anggota', 'Update password transaksi', '2020-01-15 16:02:10'),
(13, '16', 'pengurus', 'Mendaftarkan anggota [0000026]', '2020-01-25 14:57:40'),
(14, '31', 'anggota', 'Buat akun dengan kode referral [Hatta001]', '2020-01-25 15:05:16'),
(15, '32', 'anggota', 'Buat akun dengan kode referral [Hatta001]', '2020-01-25 16:35:44'),
(16, '30', 'anggota', 'Update data rekening', '2020-01-28 20:59:43'),
(17, '30', 'anggota', 'Permintaan deposit [DP-0000001] senilai Rp 500.000', '2020-01-29 10:22:32'),
(18, '16', 'pengurus', 'Mendaftarkan anggota [0000033]', '2020-02-06 13:21:27'),
(19, '16', 'pengurus', 'Update pengaturan status', '2020-02-07 10:38:41'),
(20, '16', 'pengurus', 'Mendaftarkan anggota [0000034]', '2020-02-07 10:48:40'),
(21, '16', 'pengurus', 'Mendaftarkan anggota [0000035]', '2020-02-07 10:52:50'),
(22, '35', 'anggota', 'Update password', '2020-02-07 10:55:52'),
(23, '35', 'anggota', 'Update password transaksi', '2020-02-07 10:56:26'),
(24, '16', 'pengurus', 'Mendaftarkan anggota [0000036]', '2020-02-07 11:08:22'),
(25, '37', 'anggota', 'Buat akun baru', '2020-02-07 14:21:46'),
(26, NULL, 'pengurus', 'Deposit [DP-0000001] dibatalkan', '2020-02-07 14:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_royalti`
--

CREATE TABLE `tb_royalti` (
  `id_royalti` int(11) NOT NULL,
  `kode_tr` varchar(15) NOT NULL,
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
(3, 'NOHP', 'No. Handphone', '6282348399955'),
(4, 'NOWA', 'No. Whatsapp', '6282348399955'),
(5, 'EMAIL', 'E-mail', 'koperasilenteradigital@gmail.com'),
(6, 'ALAMAT', 'Alamat', 'Jalan Toddopuli X Blok A1 No. 1F'),
(7, 'CS', 'email cs', 'cs@lenteradigitalindonesia.com'),
(8, 'WEBSITE', 'link website', 'www.lenteradigitalindonesia.com'),
(9, 'NOTLP', 'nomor tlp', '0411 409 8547'),
(10, 'WEBNAME', 'nama website', 'Koperasi Lentera Digital Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_simpanan_pokok`
--

CREATE TABLE `tb_simpanan_pokok` (
  `id_simpanan` int(11) NOT NULL,
  `kode_tr` varchar(15) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL,
  `is_in_saldo` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_simpanan_sukarela`
--

CREATE TABLE `tb_simpanan_sukarela` (
  `id_simpanan` int(11) NOT NULL,
  `kode_tr` varchar(15) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL,
  `is_in_saldo` enum('0','1') NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_simpanan_wajib`
--

CREATE TABLE `tb_simpanan_wajib` (
  `id_simpanan` int(11) NOT NULL,
  `kode_tr` varchar(15) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `bulan_tahun` date NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `date` datetime NOT NULL,
  `is_in_saldo` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_simp_bisa_diambil`
--

CREATE TABLE `tb_simp_bisa_diambil` (
  `id_simp_diambil` int(11) NOT NULL,
  `kode_tr` varchar(15) NOT NULL,
  `id_simpanan` int(11) NOT NULL,
  `kode_tr_simp` varchar(15) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `tipe` enum('SP','SW','SS') NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_withdrawal`
--

CREATE TABLE `tb_withdrawal` (
  `id_withdrawal` int(11) NOT NULL,
  `kode_tr` varchar(15) NOT NULL,
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
-- Indexes for table `tb_simp_bisa_diambil`
--
ALTER TABLE `tb_simp_bisa_diambil`
  ADD PRIMARY KEY (`id_simp_diambil`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id_log` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_bagi_untung`
--
ALTER TABLE `tb_bagi_untung`
  MODIFY `id_bagi_untung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_biaya_pendaftaran`
--
ALTER TABLE `tb_biaya_pendaftaran`
  MODIFY `id_biaya_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id_deposit` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- AUTO_INCREMENT for table `tb_simp_bisa_diambil`
--
ALTER TABLE `tb_simp_bisa_diambil`
  MODIFY `id_simp_diambil` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `tb_bagi_untung_ibfk_1` FOREIGN KEY (`id_simp_sukarela`) REFERENCES `tb_simpanan_sukarela` (`id_simpanan`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_biaya_pendaftaran`
--
ALTER TABLE `tb_biaya_pendaftaran`
  ADD CONSTRAINT `tb_biaya_pendaftaran_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_biaya_withdraw`
--
ALTER TABLE `tb_biaya_withdraw`
  ADD CONSTRAINT `tb_biaya_withdraw_ibfk_1` FOREIGN KEY (`id_withdrawal`) REFERENCES `tb_withdrawal` (`id_withdrawal`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_bonus_sponsor`
--
ALTER TABLE `tb_bonus_sponsor`
  ADD CONSTRAINT `tb_bonus_sponsor_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  ADD CONSTRAINT `tb_deposit_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tb_komisi_sponsor_ibfk_1` FOREIGN KEY (`id_simp_sukarela`) REFERENCES `tb_simpanan_sukarela` (`id_simpanan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_komisi_sponsor_ibfk_2` FOREIGN KEY (`id_parent`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_komisi_sponsor_ibfk_3` FOREIGN KEY (`id_child`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD CONSTRAINT `tb_pinjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_pinjaman_bayar`
--
ALTER TABLE `tb_pinjaman_bayar`
  ADD CONSTRAINT `tb_pinjaman_bayar_ibfk_1` FOREIGN KEY (`id_pinjaman`) REFERENCES `tb_pinjaman` (`id_pinjaman`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD CONSTRAINT `tb_report_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_royalti`
--
ALTER TABLE `tb_royalti`
  ADD CONSTRAINT `tb_royalti_ibfk_1` FOREIGN KEY (`id_deposito`) REFERENCES `tb_deposito` (`id_deposito`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_simpanan_pokok`
--
ALTER TABLE `tb_simpanan_pokok`
  ADD CONSTRAINT `tb_simpanan_pokok_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_simpanan_sukarela`
--
ALTER TABLE `tb_simpanan_sukarela`
  ADD CONSTRAINT `tb_simpanan_sukarela_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_simpanan_wajib`
--
ALTER TABLE `tb_simpanan_wajib`
  ADD CONSTRAINT `tb_simpanan_wajib_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_simp_bisa_diambil`
--
ALTER TABLE `tb_simp_bisa_diambil`
  ADD CONSTRAINT `tb_simp_bisa_diambil_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_withdrawal`
--
ALTER TABLE `tb_withdrawal`
  ADD CONSTRAINT `tb_withdrawal_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tb_anggota` (`id_anggota`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
