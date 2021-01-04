-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2021 at 11:49 AM
-- Server version: 10.3.25-MariaDB
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

--
-- Dumping data for table `cj_bagi_untung`
--

INSERT INTO `cj_bagi_untung` (`id`, `date`) VALUES
(1, '2020-03-05 01:00:02'),
(2, '2020-04-05 01:00:02'),
(3, '2020-05-05 01:00:02'),
(4, '2020-06-05 01:00:01'),
(5, '2020-07-05 01:00:02'),
(6, '2020-08-05 01:00:02'),
(7, '2020-09-05 01:00:01'),
(8, '2020-10-05 01:00:02'),
(9, '2020-11-05 01:00:02'),
(10, '2020-12-05 01:00:02');

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
(38, 26, '182.0.235.156', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-07 14:46:14'),
(39, 26, '36.75.141.245', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 14:52:09'),
(40, 26, '114.125.180.213', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 16:13:11'),
(41, 26, '114.125.180.213', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 16:14:03'),
(42, 26, '114.125.180.213', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 16:17:01'),
(43, 26, '114.125.180.213', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 16:23:26'),
(44, 26, '114.125.180.213', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 16:27:24'),
(45, 26, '36.75.141.245', 'Mozilla/5.0 (Windows NT 6.3; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.9 Safari/537.36', 'anggota', '2020-02-07 16:28:01'),
(46, 16, '36.75.141.245', 'Mozilla/5.0 (Windows NT 6.3; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.9 Safari/537.36', 'pengurus', '2020-02-07 19:19:54'),
(47, 26, '114.124.246.82', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-07 21:19:25'),
(48, 16, '36.75.141.245', 'Mozilla/5.0 (Windows NT 6.3; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.9 Safari/537.36', 'pengurus', '2020-02-07 22:09:29'),
(49, 16, '202.67.36.197', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-07 23:13:45'),
(50, 16, '202.67.36.193', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-08 01:59:45'),
(51, 16, '202.67.36.193', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-08 02:02:20'),
(52, 16, '36.75.253.202', 'Mozilla/5.0 (Windows NT 6.3; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.9 Safari/537.36', 'pengurus', '2020-02-08 02:02:59'),
(53, 26, '114.124.214.211', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-09 00:16:41'),
(54, 16, '202.67.37.41', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-09 21:49:17'),
(55, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-10 10:16:39'),
(56, 16, '202.67.37.6', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-10 10:16:57'),
(57, 16, '182.1.194.197', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Mobile Safari/537.36', 'pengurus', '2020-02-10 10:18:05'),
(58, 23, '202.67.37.6', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-10 10:21:03'),
(59, 16, '36.75.253.202', 'Mozilla/5.0 (Windows NT 6.3; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.9 Safari/537.36', 'pengurus', '2020-02-10 10:28:13'),
(60, 23, '36.75.253.202', 'Mozilla/5.0 (Windows NT 6.3; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.9 Safari/537.36', 'anggota', '2020-02-10 10:29:46'),
(61, 16, '202.67.37.6', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-10 10:32:32'),
(62, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-10 10:37:57'),
(63, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-10 11:04:55'),
(64, 16, '36.75.253.202', 'Mozilla/5.0 (Windows NT 6.3; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.9 Safari/537.36', 'pengurus', '2020-02-10 11:28:46'),
(65, 25, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-10 11:29:33'),
(66, 25, '36.75.253.202', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'anggota', '2020-02-10 11:29:53'),
(67, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-10 11:58:09'),
(68, 16, '202.67.37.44', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-10 12:24:15'),
(69, 16, '36.72.64.164', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1', 'pengurus', '2020-02-10 14:23:12'),
(70, 16, '182.1.177.132', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Mobile Safari/537.36', 'pengurus', '2020-02-10 22:41:31'),
(71, 25, '36.75.253.202', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'anggota', '2020-02-11 08:55:40'),
(72, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-11 11:48:39'),
(73, 23, '36.75.253.202', 'Mozilla/5.0 (Windows NT 6.3; ) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.9 Safari/537.36', 'anggota', '2020-02-11 11:49:34'),
(74, 25, '180.254.186.83', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-11 12:39:25'),
(75, 25, '180.254.186.83', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-11 12:40:30'),
(76, 24, '112.215.173.105', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-11 13:39:23'),
(77, 25, '180.254.186.83', 'Mozilla/5.0 (Linux; Android 7.1.1; MI MAX 2 Build/NMF26F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-11 13:40:28'),
(78, 24, '112.215.173.105', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-11 14:20:07'),
(79, 25, '180.254.186.83', 'Mozilla/5.0 (Linux; Android 7.1.1; MI MAX 2 Build/NMF26F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-11 14:21:57'),
(80, 24, '112.215.173.105', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-11 14:25:43'),
(81, 16, '114.125.189.98', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Mobile Safari/537.36', 'pengurus', '2020-02-11 15:59:21'),
(82, 26, '114.125.189.98', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-11 16:00:01'),
(83, 30, '114.125.172.59', 'Mozilla/5.0 (Linux; Android 8.0.0; SM-G935F Build/R16NW; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-11 18:03:33'),
(84, 26, '114.124.215.85', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-11 22:25:06'),
(85, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 10:21:50'),
(86, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 11:03:52'),
(87, 26, '182.1.192.252', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-12 11:04:01'),
(88, 16, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Mobile Safari/537.36', 'pengurus', '2020-02-12 14:08:18'),
(89, 24, '112.215.173.95', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 15:10:06'),
(90, 25, '202.67.36.193', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 15:11:19'),
(91, 16, '36.75.253.202', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'pengurus', '2020-02-12 15:17:47'),
(92, 16, '36.75.253.202', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'pengurus', '2020-02-12 15:32:59'),
(93, 26, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-12 15:35:32'),
(94, 24, '112.215.173.95', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 15:36:32'),
(95, 26, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-12 15:38:36'),
(96, 26, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-12 15:39:35'),
(97, 16, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Mobile Safari/537.36', 'pengurus', '2020-02-12 15:39:49'),
(98, 30, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-12 15:44:49'),
(99, 30, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-12 15:54:03'),
(100, 16, '202.67.37.46', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 17:14:27'),
(101, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 17:21:26'),
(102, 16, '202.67.37.46', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 17:40:06'),
(103, 16, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 17:40:35'),
(104, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 17:46:30'),
(105, 25, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 17:57:14'),
(106, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 18:02:30'),
(107, 49, '180.249.56.216', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 18:29:40'),
(108, 49, '180.249.56.216', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 18:32:34'),
(109, 49, '180.249.56.216', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 18:37:58'),
(110, 25, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-12 20:37:38'),
(111, 16, '182.1.211.143', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-13 10:09:27'),
(112, 13, '120.188.93.80', 'Mozilla/5.0 (Linux; Android 9; vivo 1904 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.108 Mobile Safari/537.36', 'anggota', '2020-02-13 10:28:16'),
(113, 13, '120.188.93.80', 'Mozilla/5.0 (Linux; Android 9; vivo 1904 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.108 Mobile Safari/537.36', 'anggota', '2020-02-13 10:33:55'),
(114, 24, '140.213.59.102', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-13 14:13:48'),
(115, 24, '140.213.59.102', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-13 14:18:00'),
(116, 13, '120.188.93.80', 'Mozilla/5.0 (Linux; Android 9; vivo 1904 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.108 Mobile Safari/537.36', 'anggota', '2020-02-13 14:24:35'),
(117, 25, '202.67.36.3', 'Mozilla/5.0 (Linux; Android 7.1.1; MI MAX 2 Build/NMF26F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-13 16:55:29'),
(118, 16, '36.75.253.202', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'pengurus', '2020-02-13 17:45:22'),
(119, 24, '112.215.240.219', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-13 19:17:16'),
(120, 26, '36.75.253.202', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'anggota', '2020-02-13 19:41:02'),
(121, 24, '112.215.240.65', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-14 11:18:55'),
(122, 26, '114.124.204.139', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-14 14:34:10'),
(123, 16, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-14 14:54:19'),
(124, 25, '202.67.37.41', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/79.0.3945.136 Mobile Safari/537.36', 'anggota', '2020-02-14 15:34:02'),
(125, 16, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-14 17:53:42'),
(126, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-14 18:14:40'),
(127, 26, '114.124.205.138', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-14 19:44:10'),
(128, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-14 20:36:24'),
(129, 24, '36.75.253.202', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-15 00:20:16'),
(130, 16, '36.83.100.49', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-15 11:44:53'),
(131, 24, '112.215.220.230', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-15 13:25:44'),
(132, 16, '36.83.100.49', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-15 14:25:43'),
(133, 16, '36.83.100.49', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-15 17:49:25'),
(134, 24, '112.215.220.230', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-15 17:52:23'),
(135, 24, '112.215.220.230', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-15 17:56:38'),
(136, 16, '192.241.229.185', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-15 20:39:36'),
(137, 26, '114.124.141.23', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-15 21:51:10'),
(138, 24, '112.215.220.208', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-16 11:11:11'),
(139, 54, '182.1.194.95', 'Mozilla/5.0 (Linux; Android 9; CPH1823 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-16 11:14:14'),
(140, 24, '112.215.220.208', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-16 11:17:35'),
(141, 26, '114.124.202.169', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.87 Mobile Safari/537.36', 'anggota', '2020-02-17 09:56:04'),
(142, 16, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-17 10:06:39'),
(143, 16, '36.80.8.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'pengurus', '2020-02-17 10:44:27'),
(144, 13, '120.188.93.80', 'Mozilla/5.0 (Linux; Android 9; vivo 1904 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.108 Mobile Safari/537.36', 'anggota', '2020-02-17 10:45:34'),
(145, 24, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-17 11:00:21'),
(146, 26, '114.125.218.30', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-17 11:58:51'),
(147, 57, '112.215.219.173', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-17 12:25:37'),
(148, 57, '112.215.219.173', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-17 12:34:59'),
(149, 16, '114.125.197.111', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Safari/537.36', 'pengurus', '2020-02-17 16:39:56'),
(150, 24, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-17 18:00:51'),
(151, 24, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-17 22:25:55'),
(152, 25, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 7.1.1; MI MAX 2 Build/NMF26F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-18 08:47:40'),
(153, 16, '114.125.202.135', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Safari/537.36', 'pengurus', '2020-02-18 09:08:33'),
(154, 24, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-18 09:34:06'),
(155, 24, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-18 13:40:01'),
(156, 16, '36.80.8.225', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'pengurus', '2020-02-18 13:44:20'),
(157, 60, '182.1.178.178', 'Mozilla/5.0 (Linux; Android 9; CPH1937 Build/PKQ1.190714.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.136 Mobile Safari/537.36', 'anggota', '2020-02-18 14:13:46'),
(158, 59, '180.249.201.95', 'Mozilla/5.0 (Linux; Android 9; RMX1921 Build/PKQ1.190414.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-18 15:57:24'),
(159, 57, '203.78.114.12', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-18 17:41:32'),
(160, 57, '203.78.114.12', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-18 19:41:03'),
(161, 16, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-18 19:42:31'),
(162, 57, '36.83.86.191', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-18 21:25:47'),
(163, 57, '103.3.222.29', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-18 22:59:36'),
(164, 24, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-19 08:33:36'),
(165, 24, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-19 09:35:41'),
(166, 57, '112.215.173.183', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-19 10:53:16'),
(167, 26, '114.125.175.199', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-19 15:45:32'),
(168, 16, '114.125.180.83', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-19 15:46:13'),
(169, 25, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 7.1.1; MI MAX 2 Build/NMF26F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-20 09:20:54'),
(170, 57, '112.215.219.114', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-20 17:20:08'),
(171, 16, '182.1.195.200', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-20 21:32:06'),
(172, 24, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-21 09:18:25'),
(173, 24, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-21 10:17:31'),
(174, 16, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-21 11:00:48'),
(175, 56, '182.1.194.18', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 6 Pro Build/PKQ1.180904.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.157 Mobile Safari/537.36', 'anggota', '2020-02-21 11:16:41'),
(176, 56, '182.1.208.59', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 6 Pro Build/PKQ1.180904.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.157 Mobile Safari/537.36', 'anggota', '2020-02-21 14:14:41'),
(177, 57, '140.213.57.82', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-21 14:27:57'),
(178, 16, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36', 'pengurus', '2020-02-21 15:03:47'),
(179, 26, '114.125.219.94', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.99 Mobile Safari/537.36', 'anggota', '2020-02-21 15:57:39'),
(180, 56, '176.9.29.186', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 6 Pro Build/PKQ1.180904.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.157 Mobile Safari/537.36', 'anggota', '2020-02-21 17:28:15'),
(181, 60, '182.1.215.170', 'Mozilla/5.0 (Linux; Android 9; CPH1937 Build/PKQ1.190714.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.136 Mobile Safari/537.36', 'anggota', '2020-02-21 19:42:24'),
(182, 24, '36.80.8.225', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-21 21:35:58'),
(183, 16, '202.67.36.26', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-22 21:31:44'),
(184, 57, '203.78.121.105', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-24 08:46:19'),
(185, 24, '36.79.128.132', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-24 11:12:23'),
(186, 24, '36.79.128.132', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-24 11:14:41'),
(187, 25, '110.136.242.32', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-24 11:42:31'),
(188, 16, '114.125.217.200', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.117 Mobile Safari/537.36', 'pengurus', '2020-02-24 12:45:42'),
(189, 26, '114.124.142.183', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-24 14:53:14'),
(190, 13, '114.5.245.26', 'Mozilla/5.0 (Linux; Android 9; vivo 1904 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.108 Mobile Safari/537.36', 'anggota', '2020-02-24 22:28:29'),
(191, 24, '203.78.121.23', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-25 14:04:56'),
(192, 24, '203.78.121.23', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-25 14:33:02'),
(193, 16, '36.83.102.179', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-25 16:06:12'),
(194, 25, '36.83.102.179', 'Mozilla/5.0 (Linux; Android 7.1.1; MI MAX 2 Build/NMF26F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-25 22:16:48'),
(195, 60, '114.125.174.35', 'Mozilla/5.0 (Linux; Android 9; CPH1937 Build/PKQ1.190714.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.136 Mobile Safari/537.36', 'anggota', '2020-02-26 10:33:29'),
(196, 60, '114.125.174.35', 'Mozilla/5.0 (Linux; Android 9; CPH1937 Build/PKQ1.190714.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.136 Mobile Safari/537.36', 'anggota', '2020-02-26 10:40:08'),
(197, 60, '114.125.174.35', 'Mozilla/5.0 (Linux; Android 9; CPH1937 Build/PKQ1.190714.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.136 Mobile Safari/537.36', 'anggota', '2020-02-26 11:01:37'),
(198, 60, '114.125.174.35', 'Mozilla/5.0 (Linux; Android 9; CPH1937 Build/PKQ1.190714.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.136 Mobile Safari/537.36', 'anggota', '2020-02-26 12:14:39'),
(199, 57, '112.215.219.75', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-26 12:22:56'),
(200, 25, '202.67.36.59', 'Mozilla/5.0 (Linux; Android 7.1.1; MI MAX 2 Build/NMF26F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-26 14:20:26'),
(201, 26, '182.0.213.68', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-26 14:22:38'),
(202, 60, '114.125.174.35', 'Mozilla/5.0 (Linux; Android 9; CPH1937 Build/PKQ1.190714.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.136 Mobile Safari/537.36', 'anggota', '2020-02-26 19:20:37'),
(203, 26, '114.125.217.54', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-02-27 19:51:21'),
(204, 25, '180.254.182.72', 'Mozilla/5.0 (Linux; Android 7.1.1; MI MAX 2 Build/NMF26F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-27 20:13:12'),
(205, 26, '182.0.233.120', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-27 21:35:27'),
(206, 60, '182.1.212.180', 'Mozilla/5.0 (Linux; Android 9; CPH1937 Build/PKQ1.190714.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.136 Mobile Safari/537.36', 'anggota', '2020-02-28 08:44:30'),
(207, 25, '180.254.182.72', 'Mozilla/5.0 (Linux; Android 7.1.1; MI MAX 2 Build/NMF26F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-28 10:44:07'),
(208, 25, '202.67.36.24', 'Mozilla/5.0 (Linux; Android 7.1.1; MI MAX 2 Build/NMF26F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-28 11:01:38'),
(209, 16, '180.254.182.72', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'pengurus', '2020-02-28 11:17:45'),
(210, 16, '114.125.217.204', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.119 Mobile Safari/537.36', 'pengurus', '2020-02-28 15:25:23'),
(211, 26, '182.0.202.78', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-28 22:05:54'),
(212, 24, '112.215.154.155', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-02-29 13:54:11'),
(213, 16, '180.244.238.50', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'pengurus', '2020-02-29 14:12:01'),
(214, 24, '112.215.153.230', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-02-29 14:46:51'),
(215, 16, '36.80.13.59', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1', 'pengurus', '2020-02-29 14:57:11'),
(216, 49, '120.188.84.151', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-29 15:00:37'),
(217, 49, '120.188.84.151', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-29 15:01:38'),
(218, 49, '120.188.84.151', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-29 15:06:55'),
(219, 26, '182.1.67.245', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-02-29 22:44:13'),
(220, 49, '120.188.84.151', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-01 07:58:06'),
(221, 57, '112.215.219.172', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-03-01 12:27:01'),
(222, 13, '120.188.79.196', 'Mozilla/5.0 (Linux; Android 9; vivo 1904 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/78.0.3904.108 Mobile Safari/537.36', 'anggota', '2020-03-01 18:09:55'),
(223, 24, '36.75.141.208', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-03-02 10:04:32'),
(224, 71, '180.245.173.7', 'Mozilla/5.0 (Linux; Android 7.0; i10 Build/NRD90M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Safari/537.36', 'anggota', '2020-03-02 11:24:58'),
(225, 26, '114.124.205.10', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-03 01:07:15'),
(226, 57, '112.215.244.157', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-03-03 11:12:00'),
(227, 23, '36.75.141.208', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'anggota', '2020-03-03 11:20:31'),
(228, 26, '36.75.141.208', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-03-03 11:59:50'),
(229, 16, '36.75.141.208', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'pengurus', '2020-03-03 14:25:39'),
(230, 16, '36.75.141.208', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'pengurus', '2020-03-03 14:28:37'),
(231, 16, '202.67.37.9', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-03-03 14:32:58'),
(232, 25, '36.75.141.208', 'Mozilla/5.0 (Linux; Android 7.1.1; MI MAX 2 Build/NMF26F; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-03-03 14:33:27'),
(233, 23, '36.75.141.208', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1', 'anggota', '2020-03-03 14:34:05'),
(234, 16, '36.75.141.208', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36', 'anggota', '2020-03-03 14:36:18'),
(235, 59, '180.249.202.158', 'Mozilla/5.0 (Linux; Android 10; RMX1921 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-03-04 01:55:15'),
(236, 57, '140.213.57.171', 'Mozilla/5.0 (Linux; Android 9; SM-A507FN Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-03-04 10:52:31'),
(237, 16, '114.125.172.220', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.119 Mobile Safari/537.36', 'pengurus', '2020-03-04 23:07:46');
INSERT INTO `login_history` (`id_log`, `id_user`, `ip_address`, `user_agent`, `keterangan`, `date`) VALUES
(238, 49, '120.188.75.224', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-07 13:16:06'),
(239, 24, '36.75.242.189', 'Mozilla/5.0 (Linux; Android 9; RMX1971 Build/PKQ1.190101.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-03-10 10:03:03'),
(240, 49, '114.5.213.98', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-10 12:10:57'),
(241, 49, '114.5.213.98', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-10 12:23:52'),
(242, 49, '114.5.213.98', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-10 12:32:05'),
(243, 16, '36.75.242.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'pengurus', '2020-03-10 13:24:29'),
(244, 49, '180.251.175.42', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-10 14:51:04'),
(245, 16, '36.75.242.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'pengurus', '2020-03-10 16:25:02'),
(246, 16, '36.75.242.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'pengurus', '2020-03-10 16:26:13'),
(247, 25, '36.75.242.189', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-03-10 16:27:33'),
(248, 49, '114.5.213.98', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-10 16:29:10'),
(249, 49, '114.5.213.98', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-10 16:30:06'),
(250, 49, '36.75.242.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'anggota', '2020-03-10 16:30:37'),
(251, 16, '36.75.242.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'pengurus', '2020-03-10 16:31:49'),
(252, 49, '36.75.242.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'anggota', '2020-03-10 16:32:20'),
(253, 16, '36.75.242.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'pengurus', '2020-03-10 16:33:20'),
(254, 49, '36.75.242.189', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'anggota', '2020-03-10 16:34:06'),
(255, 49, '114.5.213.98', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-10 16:35:48'),
(256, 49, '114.5.213.98', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-10 16:43:10'),
(257, 26, '114.125.181.251', 'Mozilla/5.0 (Linux; Android 9; MI 8 Build/PKQ1.180729.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-03-10 17:18:17'),
(258, 49, '180.251.175.42', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-11 08:34:24'),
(259, 49, '120.188.82.174', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-11 10:10:20'),
(260, 49, '180.251.175.42', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.117 Mobile Safari/537.36', 'anggota', '2020-03-11 16:17:17'),
(261, 49, '180.251.175.42', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-03-11 22:51:26'),
(262, 23, '114.125.168.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1', 'anggota', '2020-03-12 10:05:17'),
(263, 23, '114.125.168.53', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1', 'anggota', '2020-03-12 10:07:24'),
(264, 16, '110.136.245.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'pengurus', '2020-03-12 17:04:28'),
(265, 57, '103.3.222.252', 'Mozilla/5.0 (Linux; Android 10; SM-A507FN Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-03-14 23:44:58'),
(266, 49, '180.244.32.245', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-03-16 11:25:38'),
(267, 16, '182.1.162.5', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Mobile Safari/537.36', 'pengurus', '2020-03-17 11:42:55'),
(268, 25, '36.75.143.61', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36', 'anggota', '2020-03-18 11:01:33'),
(269, 24, '36.75.143.61', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.149 Mobile Safari/537.36', 'anggota', '2020-03-18 14:06:46'),
(270, 59, '36.75.142.137', 'Mozilla/5.0 (Linux; Android 10; RMX1921 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-03-18 16:52:25'),
(271, 59, '36.75.141.154', 'Mozilla/5.0 (Linux; Android 10; RMX1921 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-03-21 02:22:39'),
(272, 16, '202.67.37.15', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-03-23 00:11:31'),
(273, 26, '180.244.113.84', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.149 Mobile Safari/537.36', 'anggota', '2020-03-26 12:33:02'),
(274, 26, '114.125.175.138', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.149 Mobile Safari/537.36', 'anggota', '2020-03-26 12:42:58'),
(275, 26, '182.1.201.178', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.149 Mobile Safari/537.36', 'anggota', '2020-03-27 11:03:47'),
(276, 24, '140.213.56.173', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.149 Mobile Safari/537.36', 'anggota', '2020-03-28 02:44:45'),
(277, 59, '36.75.143.139', 'Mozilla/5.0 (Linux; Android 10; RMX1921 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.162 Mobile Safari/537.36', 'anggota', '2020-04-04 10:17:08'),
(278, 57, '103.3.220.135', 'Mozilla/5.0 (Linux; Android 10; SM-A507FN Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.149 Mobile Safari/537.36', 'anggota', '2020-04-04 18:43:15'),
(279, 49, '120.188.38.61', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-04-05 22:21:08'),
(280, 49, '120.188.38.61', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-04-05 22:22:48'),
(281, 49, '120.188.38.61', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-04-05 22:30:18'),
(282, 24, '36.75.142.16', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.162 Mobile Safari/537.36', 'anggota', '2020-04-05 22:34:02'),
(283, 16, '36.75.142.16', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Mobile Safari/537.36', 'pengurus', '2020-04-05 22:35:09'),
(284, 16, '36.75.142.16', 'Mozilla/5.0 (Linux; U; Android 6.0; id-id; Redmi Note 4 Build/MRA58K) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/71.0.3578.141 Mobile Safari/537.36 XiaoMi/MiuiBrowser/11.4.3-g', 'pengurus', '2020-04-05 22:35:58'),
(285, 25, '36.75.142.16', 'Mozilla/5.0 (Linux; Android 6.0; Redmi Note 4 Build/MRA58K; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-04-05 22:43:30'),
(286, 24, '36.75.142.16', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.162 Mobile Safari/537.36', 'anggota', '2020-04-05 23:05:13'),
(287, 49, '114.5.146.244', 'Mozilla/5.0 (Linux; Android 9; CPH1911 Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.132 Mobile Safari/537.36', 'anggota', '2020-04-06 16:37:19'),
(288, 16, '36.75.142.16', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Mobile Safari/537.36', 'pengurus', '2020-04-07 10:32:50'),
(289, 16, '36.75.142.16', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.162 Mobile Safari/537.36', 'pengurus', '2020-04-07 13:39:35'),
(290, 30, '36.75.142.16', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Pro Build/PPR1.180610.011; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.162 Mobile Safari/537.36', 'anggota', '2020-04-07 13:40:25'),
(291, 26, '36.83.66.249', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.162 Mobile Safari/537.36', 'anggota', '2020-04-07 23:23:07'),
(292, 26, '36.83.66.249', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.162 Mobile Safari/537.36', 'anggota', '2020-04-08 12:10:33'),
(293, 24, '182.1.207.45', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.162 Mobile Safari/537.36', 'anggota', '2020-04-08 19:15:46'),
(294, 16, '36.75.140.98', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-04-08 19:22:02'),
(295, 59, '180.249.201.7', 'Mozilla/5.0 (Linux; Android 10; RMX1921 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/81.0.4044.96 Mobile Safari/537.36', 'anggota', '2020-04-12 01:48:01'),
(296, 16, '202.67.36.200', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-04-12 02:39:48'),
(297, 16, '202.67.36.216', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-04-12 04:10:01'),
(298, 26, '36.80.5.59', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.162 Mobile Safari/537.36', 'anggota', '2020-04-12 14:58:56'),
(299, 16, '36.75.141.169', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-04-13 12:06:45'),
(300, 16, '36.75.141.169', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A Build/N2G47H; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.119 Mobile Safari/537.36', 'anggota', '2020-04-13 13:28:57'),
(301, 26, '36.75.140.146', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/80.0.3987.162 Mobile Safari/537.36', 'anggota', '2020-04-20 18:30:47'),
(302, 24, '36.75.140.205', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/81.0.4044.117 Mobile Safari/537.36', 'anggota', '2020-05-03 05:31:49'),
(303, 26, '36.80.5.148', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/81.0.4044.117 Mobile Safari/537.36', 'anggota', '2020-05-10 20:39:17'),
(304, 24, '180.249.174.47', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/81.0.4044.138 Mobile Safari/537.36', 'anggota', '2020-05-15 20:29:46'),
(305, 26, '180.251.171.249', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/81.0.4044.117 Mobile Safari/537.36', 'anggota', '2020-05-17 22:54:31'),
(306, 26, '36.75.140.251', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/81.0.4044.117 Mobile Safari/537.36', 'anggota', '2020-05-19 21:42:53'),
(307, 24, '36.75.140.136', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.83 Mobile Safari/537.36', 'anggota', '2020-06-03 21:04:39'),
(308, 26, '114.125.181.158', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.96 Mobile Safari/537.36', 'anggota', '2020-06-06 20:18:13'),
(309, 26, '140.213.54.216', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.96 Mobile Safari/537.36', 'anggota', '2020-06-06 22:57:27'),
(310, 30, '36.75.140.244', 'Mozilla/5.0 (Linux; Android 10; Redmi Note 8 Pro Build/QP1A.190711.020; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.96 Mobile Safari/537.36', 'anggota', '2020-06-10 12:14:00'),
(311, 16, '36.75.140.244', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'pengurus', '2020-06-10 13:05:39'),
(312, 24, '180.244.33.221', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.106 Mobile Safari/537.36', 'anggota', '2020-06-23 12:59:36'),
(313, 26, '114.125.170.155', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.106 Mobile Safari/537.36', 'anggota', '2020-06-25 15:00:48'),
(314, 24, '36.85.179.163', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/84.0.4147.89 Mobile Safari/537.36', 'anggota', '2020-07-23 22:16:05'),
(315, 49, '202.67.36.28', 'Mozilla/5.0 (Linux; U; Android 8.1.0; in-id; CPH1901 Build/OPM1.171019.026) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/70.0.3538.80 Mobile Safari/537.36 HeyTapBrowser/15.7.2.5', 'anggota', '2020-07-23 22:17:32'),
(316, 24, '36.85.179.163', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/84.0.4147.89 Mobile Safari/537.36', 'anggota', '2020-07-23 22:22:02'),
(317, 49, '202.67.36.28', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1901 Build/OPM1.171019.026; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.106 Mobile Safari/537.36', 'anggota', '2020-07-23 22:29:47'),
(318, 49, '202.67.36.20', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1901 Build/OPM1.171019.026; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.106 Mobile Safari/537.36', 'anggota', '2020-07-23 23:07:38'),
(319, 24, '110.136.239.188', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/84.0.4147.89 Mobile Safari/537.36', 'anggota', '2020-07-24 10:00:43'),
(320, 49, '202.67.36.57', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1901 Build/OPM1.171019.026; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.106 Mobile Safari/537.36', 'anggota', '2020-07-24 20:11:33'),
(321, 16, '125.162.215.38', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1', 'pengurus', '2020-07-24 20:23:56'),
(322, 49, '103.108.28.90', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1901 Build/OPM1.171019.026; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.106 Mobile Safari/537.36', 'anggota', '2020-07-25 12:52:54'),
(323, 49, '202.67.37.9', 'Mozilla/5.0 (Linux; Android 8.1.0; CPH1901 Build/OPM1.171019.026; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/83.0.4103.106 Mobile Safari/537.36', 'anggota', '2020-07-25 19:45:50'),
(324, 16, '182.1.220.247', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1', 'pengurus', '2020-07-25 20:08:11'),
(325, 16, '202.67.37.229', 'Mozilla/5.0 (Linux; Android 7.1.2; Redmi Note 5A) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.83 Mobile Safari/537.36', 'anggota', '2020-07-28 01:11:00'),
(326, 26, '114.125.183.109', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/85.0.4183.127 Mobile Safari/537.36', 'anggota', '2020-10-04 00:36:47'),
(327, 24, '140.213.180.144', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/84.0.4147.111 Mobile Safari/537.36', 'anggota', '2020-11-06 22:48:38'),
(328, 24, '36.83.111.42', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/86.0.4240.185 Mobile Safari/537.36', 'anggota', '2020-11-12 22:50:22'),
(329, 24, '125.162.210.81', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/86.0.4240.198 Mobile Safari/537.36', 'anggota', '2020-11-27 10:54:02'),
(330, 26, '110.138.21.209', 'Mozilla/5.0 (Linux; Android 9; Redmi Note 8 Build/PKQ1.190616.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/87.0.4280.66 Mobile Safari/537.36', 'anggota', '2020-11-29 13:19:06'),
(331, 24, '125.162.214.227', 'Mozilla/5.0 (Linux; Android 10; RMX1971 Build/QKQ1.190918.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/87.0.4280.101 Mobile Safari/537.36', 'anggota', '2020-12-10 13:47:10');

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

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`id_reset`, `resetEmail`, `resetSelector`, `resetToken`, `resetExpires`) VALUES
(16, 'ressijuli.a7@gmail.com', '32303034303833313434', '$2y$10$p1e0XmcMNeKicQLpbXug9ef09a6S4E3nLg0BPYrFsTX31dVniAibS', '1589052770'),
(33, 'a876473@gmail.com', '31343734313735343235', '$2y$10$Jl.FHutNW4Q1mQicO8Mzh.T5Da1Aaoq1y/LnLlwP32r.r6Wym2Z/2', '1599758643');

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
(13, 24, '0000013', 'Ryan', '$2y$10$e/jAKvdh82Ubwy4SFPonQeygOUoVyAvG8nCMvbeqWVxpb0xNGAMji', 'Sugiran', 'muhsugiran01@gmail.com', 'Ujung pandang', '1973-07-03', '7371010307730001', '085693662931', 'Paraikatte bajeng gowa', 'Bajeng', 'Desa paraikatte', 'Gowa', 'Sulawesi selatan', 0, 'Wiraswasta', '', '', '', '', 'Sma', '$2y$10$esp8o6s/H6JKF6ubyKRhuekIN11aBLLJFRHgtDeAveftF22Dp0csi', '2020-02-12 17:08:58', '1', '1', '', ''),
(16, 26, '0000016', 'irfan8888', '$2y$10$SE3ZAiWXwHhgjhlw.ssvTOsKk4rxU1QMPTtPl/4w6ZfpTQVGrHhba', 'Muhammad Irfan Ibnu', 'mpampam5@gmail.com', 'Bulukumba', '11/10/1994', '7302021011940001', '085288882994', 'Jl mannuruki 1', 'tamalate', 'mannuruki', 'makassar', 'sulawesi selatan', 0, 'Pegawai Swasta', '', '', '', '', 'SMA', '$2y$10$VWtAUTKeDm6Ay78Aan3xOOmbsHIevp3.dsGaD.Cs9D2beXSvbtWuW', '2020-02-07 16:42:56', '1', '1', '', ''),
(23, 26, '0000023', 'fasaya', '$2y$10$iEM84w5l1X4KV.AY/4E0yepw0aT17O.wO8AZIv94DEaHA3kdz0HG.', 'Andi Fasaya Yaqhsya', 'andifasaya@gmail.com', 'Ujung Pandang', '12/12/1997', '7371135212970004', '0811415779', 'Jl Monumen Emmy Saelan 3D No. 8', 'Rappocini', 'Tidung', 'Makassar', 'sulawesi selatan', 90222, 'Pegawai Swasta', '', '', '', '', 'S1', '$2y$10$c3l5NjjvF.mp0Xql0O8ByuwkHHlWHWxIghK/cGGxLC.ta9vDoA1lK', '2020-02-07 16:34:22', '1', '1', '', ''),
(24, 26, '0000024', 'kasim', '$2y$10$jgjFCSz03WmnIcQ6Fmb6Hu9VFxM.WFp/Pfh3XKqlDEkoJ2ptzPqY2', 'Kasim', 'kasimnawawi69@gmail.com', 'makassar', '07/17/1969', '7371071707690002', '082348399955', 'jl sabutung baru 2 no 17', 'ujunt tanah', 'camba berua', 'makassar', 'sulawesi selatan', 90233, 'Pegawai Swasta', '', '', '', '', 'SMA', '$2y$10$jgjFCSz03WmnIcQ6Fmb6Hu9VFxM.WFp/Pfh3XKqlDEkoJ2ptzPqY2', '2020-02-07 16:32:41', '1', '1', '', ''),
(25, 26, '0000025', 'munir', '$2y$10$0UnmpVwE3gbaHZxez52w7euc9ozmWcyoa6W5ODT8bgnsqmWLJVu8C', 'Abdul Munir', 'abd.munhier@gmail.com', 'Ujung Pandang', '10/09/1986', '7310040910460004', '085242199090', 'Baru baru towa', 'pangkajene', 'bonto perak', 'pangkep', 'sulawesi selatan', 90617, 'Pegawai Swasta', '', '', '', '', 'D3', '$2y$10$J/rBslW2hHJoUZIV9iUFYORI2rXWMhVF7XcxRbHHeb4GJKzIgCS0G', '2020-02-07 16:37:09', '1', '1', '', ''),
(26, 0, '0000026', 'Hatta001', '$2y$10$qmmMBz6OZJvZiBvY2.nap.xC1RdMgG9jR8864TzgGMoEf0TQVzkVa', 'Akbar Ali', 'barly.bisnis@gmail.com', 'Makassar', '08/25/1988', '7371072408880001', '08114440241', 'Jalan Butta Butta Caddi', 'Tallo', 'Kaluko Bodoa', 'Makassar', 'Sulawesi Selatan', 90212, 'Wiraswasta', '', '', '', '', 'S1', '$2y$10$W6p4qEh5erKvJLGEYzCFN.dCO1KqpDqmDjV3AekKQcIKKGS5WKQkC', '2020-01-25 14:57:40', '1', '1', '', ''),
(30, 26, '0000046', 'pakar03', '$2y$10$k8e64cvwD3GuX0fWQjM0U.HTVdlUnExPF9iFjPrZw7fYvdo1IHShG', 'Muhammad Fadhil Fauzan', 'fadhilfauzan.bisnis@gmail.com', 'Ujung Pandang', '1995-01-03', '7371130301950005', '08114174707', 'Jalan Veteran Selatan No 292 I', 'Bontolebang', 'Mamajang', 'Makassar', 'Sulawesi Selatan', 0, 'Wiraswasta', '', '', '', '', 'S1', '$2y$10$H0qSNlgVg9JYjow1w3Bzr.a8vWZzEfU6a28y4BM5vWW4kVABuVttC', '2020-02-11 16:01:18', '1', '1', '', ''),
(31, 26, '0000031', 'vian88', '', 'Muh Haady Firmansyah', 'fhaady9@gmail.com', '', '', '', '08114490090', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-01-25 15:05:16', '0', '1', '', ''),
(32, 26, '0000032', 'Doyandolan', '', 'Galih', 'Galihbinsunarto@gmail.com', '', '', '', '082250414857', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-01-25 16:35:44', '0', '1', '', ''),
(37, 0, '0000037', 'Esafernanda', '', 'Esa', 'esafernanda3114@gmail.com', '', '', '', '0812278944', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-07 14:21:46', '0', '1', '', ''),
(43, 26, '0000043', 'asrul89', '', 'Andi Asrullah Palaguna', 'asl.photographer89@gmail.com', '', '', '', '082242898989', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-07 21:22:37', '0', '1', '', ''),
(44, 26, '0000044', 'Rachma', '', 'Rachmawaty A', 'rachmawaty.a@gmail.com', '', '', '', '085242211273', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-09 14:07:47', '0', '1', '', ''),
(45, 26, '0000045', 'riniendah26', '', 'Rini Endah Rahayu Ningtias', 'kiranihapsari2834@gmail.com', '', '', '', '082282856990', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-10 12:15:17', '0', '1', '', ''),
(47, 26, '0000047', 'HAERUDIN', '', 'HAERUDIN', 'hhaerudin879@gmail.com', '', '', '', '082115213810', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-12 12:18:32', '0', '1', '', ''),
(49, 24, '0000049', 'Wirainkado', '$2y$10$/6vCU9yagnuo2HVs0Y.jxeBhpaxHLHyo4NmMZZhasx22QQCvGWQXm', 'Kasim kubo', 'wirainkado@gmail.com', 'Tatakalae', '1970-12-08', '7309130812700001', '085396984783', 'BTN Asabri blokb7 no.22', 'Moncongloe', 'Moncongloe lappara', 'Maros', 'Sulawesi selatan', 0, 'TNI AD', '', '', '', '', 'S1', '$2y$10$9c4cGRkgETLmkiAukVZ3ROiQ.wDrstAruqsK4aTxQOd10.I3r8qta', '2020-02-12 18:07:55', '1', '1', '', ''),
(50, 26, '0000050', 'iwan', '$2y$10$TCtABhEEAe1SjjQqrjbTEOH1azTlTtvH4OnNa9mVzjpmCEcJWfyS.', 'irawan', 'irawaniwan721@gmail.com', '', '', '', '081340711209', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-12 18:15:18', '0', '1', '', ''),
(51, 26, '0000051', 'ArIs123', '$2y$10$u9O54j2jCeZ9DQuQVSqyY.JeH3A0XvCJRVwGvksKYqi/sMKZ7HAIq', 'Aris', 'farisnaufal92@gmail.com', '', '', '', '081807561586', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-13 04:34:48', '0', '1', '', ''),
(52, 26, '0000052', 'gislampratama', '', 'Gislam Pratama', 'gislampratama31@gmail.com', '', '', '', '081241415700', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-13 19:20:01', '0', '1', '', ''),
(53, 24, '0000053', 'Rahmawaty', '$2y$10$xnKR9A4iIf6Tlu66Z81DVew49TalC2PEAUqyHW7NATSolncTmMgMW', 'Rahmawaty A', 'Rachmawaty.a@gmail.com', 'Ujung pandang', '12/31/1987', '7371067112870001', '085242211273', 'Jl. Langgau lrg7 no.18', 'Bontoala', 'Timungan lompoa', 'Makassar', 'Sulawesi selatan', 0, 'Karyawan', '', '', '', '', 'S1', '$2y$10$dF809Apakrtu05nQgJQuTecUWx3F9dRbsUeUAjHumPy94JL2fHqYW', '2020-02-14 18:35:45', '1', '1', '', ''),
(54, 24, '0000054', 'Gislam', '$2y$10$ahagWot1WgyHSaIEA/J4S.g/UmxWjSsUjs3IUNPxdTosZ7GcDoivK', 'Guslam pratama', 'gislampratama31@gmail.com', 'Makassar', '07/11/1988', '737111107880002', '081241415700', 'Komp. TNI AU PAI II Mandai', 'Biringkanaya', 'Sudiang', 'Makassar', 'Sulawesi selatan', 0, 'Karyawan', '', '', '', '', 'S1', '$2y$10$F8cC.pEsOPCRMLQv86WzKuRdQY1rKW1SJeco7JA9YPey2NT4FldxW', '2020-02-14 18:47:57', '1', '1', '', ''),
(55, 24, '0000055', 'Hadijahnawawi', '$2y$10$upsV1kY8jYIOb7wC2EMheuxDErFeEjE8yGRuEtPlsho66xbPSYW9W', 'Sitti Hadijah Nawawi', 'hadijahnawawi07@gmail.com', 'Ujung pandang', '05/08/1969', '7371075805690004', '085298744470', 'Jl. Sabutung baru 3 no 17', 'Ujung tanah', 'Camba berua', 'Makassar', 'Sulawesi selatan', 0, 'Wiraswata', '', '', '', '', 'Sma', '$2y$10$upsV1kY8jYIOb7wC2EMheuxDErFeEjE8yGRuEtPlsho66xbPSYW9W', '2020-02-15 00:39:09', '1', '1', '', ''),
(56, 24, '0000056', 'Masterandre', '$2y$10$6nneJkg1UqnUy46JYmGhy.AJo8wKKRth.eX.XlZqDBllIGSRbhtu6', 'Bachtiar Hi baco', 'bachtiarst1010@gmail.com', 'Falabisahaya', '10/10/1989', '737114101090010', '082349885551', 'BTP', 'Tamalanrea', 'Buntusu', 'Makassar', 'Sulawesi selatan', 0, 'Wiraswasta', '', '', '', '', 'S1', '$2y$10$Nt9s4WfJeVPzIvCMRmDsruyaSAA6AG4dDqCRxumcFgArKRbNe9wfq', '2020-02-15 18:08:25', '1', '1', '', ''),
(57, 26, '0000057', 'fariyadi66', '$2y$10$orVxuqAWPeYcU6LGfQRIluneZSMofilNvG7xyJ8hj7F81zMku4ag6', 'Fariyadi Dwi Apriyanto Thahir', 'adhifariyadi@gmail.com', 'Makassar', '04/23/1995', '7371092304950004', '082292449058', 'Abdullah dg Sirua no 194G', 'Panakukkang', 'Pandang', 'Makassar', 'Sulawesi Selatan', 0, 'Pegawai Swasta', '', '', '', '', 'S1', '$2y$10$orVxuqAWPeYcU6LGfQRIluneZSMofilNvG7xyJ8hj7F81zMku4ag6', '2020-02-17 12:01:56', '1', '1', 'MANDIRI', '1520016486363'),
(58, 26, '0000058', 'Pinjam123', '', 'Irawan', 'irawangepeng60@gmail.com', '', '', '', '08203267598', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-17 14:02:59', '0', '1', '', ''),
(59, 24, '0000059', 'Riswan', '$2y$10$auY0hQiq07W3Duww.AndJuTEPbBBW6h/s8Tg5I5ZvlDD/mbgAM6ny', 'Ahmad riswan', 'achmad.riswan@gmail.com', 'Bulukumba', '01/05/1988', '7371140501880011', '082187777289', 'Jl. Kejayaan Utara 9/269 blok L', 'Tamalanrea', 'Tamalanrea', 'Makassar', 'Sulawesi selatan', 0, 'Wiraswasta', '', '', '', '', 'D3', '$2y$10$ZZwMazUj7799Gm6s.uEDvOwKBgVL1SP4WRYocGZTEyrYuz4/SCEve', '2020-02-17 22:39:20', '1', '1', 'BNI', '0189109241'),
(60, 24, '0000060', 'dewariradjab', '$2y$10$qTWMWu86FOwMi7lSniIEcOTKOA0jLWmA5XS3koHcxUcUvo5Qeu/5C', 'Dewari Radjab Eppe', 'dewariradjab1975@gmail.com', 'Makassar', '10/07/1977', '7306080710770007', '081245232247', 'Perumahan Indhyra Residen blok E no. 1', 'Sombaopu', 'Batangkaluku', 'Gowa', 'Sulawesi selatan', 0, 'Wiraswasta', '', '', '', '', 'S1', '$2y$10$Z.WzEhmqC5lhmDaAJIEe6uYWnmJ9MDXXkC0hHDMkrIKDCFYOiRIVm', '2020-02-18 14:00:47', '1', '1', 'BNI', '7100007773'),
(61, 26, '0000061', 'episopya', '', 'epi sopya', 'epi.sopya.88@gmail.com', '', '', '', '083803555253', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-19 05:20:55', '0', '1', '', ''),
(62, 26, '0000062', 'Ari123', '$2y$10$WlR.TsPyT9wRxAavsEqpsernglu1DHFl4xDtigZuElsa8vG4FSCR6', 'Andi', 'widoyo82@gmail.com', '', '', '', '082377057776', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-19 09:59:16', '0', '1', '', ''),
(63, 26, '0000063', 'Rizky2811', '', 'Rizky Dwicahyono', 'rizkydwicahyono823@gmail.com', '', '', '', '08973131357', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-19 11:51:03', '0', '1', '', ''),
(64, 26, '0000064', 'adyogant90', '', 'wardiyanto', 'adyogant90@gmail.com', '', '', '', '085833253969', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-22 18:47:46', '0', '1', '', ''),
(65, 26, '0000065', 'adyogant', '', 'wardiyanto', 'mobile.legion90@gmail.com', '', '', '', '085833253969', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-22 18:49:44', '0', '1', '', ''),
(66, 26, '0000066', 'Leo74', '', 'Alex pakaya', 'leopakaya74@gmail.com', '', '', '', '082193069874', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-24 14:08:05', '0', '1', '', ''),
(67, 26, '0000067', 'Lewo123', '', 'Alex pakaya', 'leopakaya1974@gmail.com', '', '', '', '082193069874', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-24 14:10:55', '0', '1', '', ''),
(68, 26, '0000068', 'Alex123', '', 'Alex pakaya', 'leoskil@gmail.com', '', '', '', '082193069874', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-24 14:12:39', '0', '1', '', ''),
(69, 26, '0000069', 'episopya123', '', 'Epi sopya', 'ukit175@gmail.com', '', '', '', '082195957735', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-24 15:25:46', '0', '1', '', ''),
(70, 26, '0000070', '123456', '', 'Epi sopya', 'honda.berjaya@yahoo.com', '', '', '', '081253718529', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-02-24 17:30:21', '0', '1', '', ''),
(71, 25, '0000071', 'Atik', '$2y$10$.4UoPv/I8uEimF84GuFAuuCmsQ1VlLyi.QwK3c6vFFe/DlaFglKvi', 'Mardaniati afriana', 'mardaniaty84@gmail.com', 'Sinjai', '04/16/1984', '7371125604840002', '082121318846', 'Jl T Puli VI Perum KTR Hub B/2', 'Manggala', 'Borong', 'Makassar', 'Sulawesi Selatan', 0, 'Karyawan swasta', '', '', '', '', 'Sarjana', '$2y$10$.4UoPv/I8uEimF84GuFAuuCmsQ1VlLyi.QwK3c6vFFe/DlaFglKvi', '2020-02-28 11:19:48', '1', '1', '', ''),
(72, 24, '0000072', 'Roykusuma', '$2y$10$RpgezEjlAjNMUIHcmquci.zmdKUj4VgmC6UOEPlXpsFTmDF/pxnEu', 'Roy Suryo kusumawardana', 'Roykusuma88@gmail.com', 'Bojonegoro', '05/06/1994', '3522040605940002', '082230554510', 'Jl. Kalimantan no 93 Aspom Gatot Subroto', 'Wajo', 'Mampu', 'Makassar', 'Sulawesi selatan', 0, 'Tentara nasional indonesia', '', '', '', '', 'Sma', '$2y$10$RpgezEjlAjNMUIHcmquci.zmdKUj4VgmC6UOEPlXpsFTmDF/pxnEu', '2020-03-02 10:16:46', '1', '1', '', ''),
(73, 26, '0000073', 'asuna1000', '', 'asuna', 'asuna1000@mailnesia.com', '', '', '', '087798187285', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-03-12 13:26:28', '0', '1', '', ''),
(74, 26, '0000074', 'Supri4321', '$2y$10$KoGSFxrkmMyjjzSPx.JMuO.6H14sKYKtEVsXsFbDpY1I1LbPJFSy6', 'Supriatna', 'us3111538@gmail.com', '', '', '', '083806449370', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-03-12 16:04:53', '0', '1', '', ''),
(75, 26, '0000075', 'Utta', '', 'Mustar', 'mustarutta3@gmail.com', '', '', '', '082322091111', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-03-15 23:22:12', '0', '1', '', ''),
(76, 26, '0000076', 'Ari', '', 'Muh.arief Ariyanto Ahmad', 'muhariefariyanto@gmail.com', '', '', '', '081527260703', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-03-17 01:37:55', '0', '1', '', ''),
(77, 26, '0000077', '60600119019', '', 'Satriani', 'satriani.andu28@gmail.com', '', '', '', '082238220377', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-03-17 21:09:48', '0', '1', '', ''),
(78, 26, '0000078', 'teti', '', 'teti wiyarti', 'radyaazha003@gmail.com', '', '', '', '081295763656', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-03-21 04:55:44', '0', '1', '', ''),
(79, 26, '0000079', '083812986924', '', 'Sunariyah', 'sunaryahdoni6@gmail.com', '', '', '', '083812986924', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-03-24 18:10:07', '0', '1', '', ''),
(80, 26, '0000080', 'Sherly1234', '$2y$10$cEucWAMRM//cYocKYuhykO.7Mg.M.tKhs0cMZ09Av8peyfiB2aAkm', 'Sherly novita puspa dewi', 'Sherlybaby83@gmail.com', '', '', '', '085802681581', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-03-25 16:37:12', '0', '1', '', ''),
(81, 26, '0000081', 'Nia', '$2y$10$CetWpKzdGak7Qp6rCDgTEutW3htRRzYfFqcshTWmC/QfFj5CLLFd.', 'Niawati', 'niafitria595@gmail.com', '', '', '', '081315980178', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-01 01:12:57', '0', '1', '', ''),
(82, 26, '0000082', 'NIAWATI', '', 'NIAWATI', 'pkeyla336@gmail.com', '', '', '', '081315980178', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-01 01:14:54', '0', '1', '', ''),
(83, 26, '0000083', 'Herman', '', 'Herman', 'alanaditia9980@gmail.com', '', '', '', '083873916478', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-02 13:51:16', '0', '1', '', ''),
(84, 26, '0000084', 'Pristi1234', '', 'Pristi ramadhani siregar', 'pristiramadhanisiregar@gmail.com', '', '', '', '081262996580', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-02 17:18:06', '0', '1', '', ''),
(85, 26, '0000085', 'AndiSriHardianti96', '$2y$10$daU6UCp.o73AvNBjQN1n7e1MSNrnNMGKnsdwyRpq5qzh8DU6l12/W', 'Andi Sri Hardianti', 'andisrhyhardianthy96@gmail.com', '', '', '', '082347481396', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-06 10:18:54', '0', '1', '', ''),
(86, 26, '0000086', 'Aditya85', '$2y$10$NHlntXnxt4k8i5yqXlhYz.kCYNG0.Y7/C7zcRF6QxGsVAODv4pHPm', 'Aditya Sulung', 'adityask71@gmail.com', '', '', '', '0816758068', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-06 21:17:22', '0', '1', '', ''),
(87, 26, '0000087', '123rose', '', 'Rosmayanti', 'mayantiros32@gmail.com', '', '', '', '089630006116', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-07 12:15:46', '0', '1', '', ''),
(88, 26, '0000088', 'Rosmayanti', '', 'Rosmayanti', 'caesarexsel09@gmail.com', '', '', '', '089630006116', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-07 12:17:16', '0', '1', '', ''),
(89, 26, '0000089', 'Ahmad', '', 'Ahmad saehh', 'ahmadsaehu59@gmail.com', '', '', '', '08872749096', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-07 14:39:21', '0', '1', '', ''),
(90, 26, '0000090', 'Delfi', '', 'Delfi banunaek', 'delfibaninaek97@gmail.com', '', '', '', '082236351255', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-10 12:46:58', '0', '1', '', ''),
(91, 26, '0000091', 'Adell', '', 'Delfi banunaek', 'delfibanunaek97@gmail.com', '', '', '', '082236351255', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-10 12:48:13', '0', '1', '', ''),
(92, 26, '0000092', 'NurAuliaUsman27', '$2y$10$X9Ep/wHWN.BiLkuNw25uiemOEA0Yr8PhjS5PFX/5krhmw2GOChwQC', 'Nur Aulia Usman', 'auliausman21712@gmail.com', '', '', '', '085342535136', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-10 22:38:21', '0', '1', '', ''),
(93, 26, '0000093', 'Dadidarmadi123', '', 'Dadi Darmadi', 'dadidarmadi53@gmail.com', '', '', '', '082320268425', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-15 15:27:21', '0', '1', '', ''),
(94, 26, '0000094', 'eva', '', 'Eva chandra kusumawati', 'echandrakusumawati@gmail.com', '', '', '', '085320148354', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-25 11:45:27', '0', '1', '', ''),
(95, 26, '0000095', 'Adidam123', '', 'adnan hatala', 'adnanhatala1970@gmail.com', '', '', '', '081241581401', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-27 15:39:26', '0', '1', '', ''),
(96, 26, '0000096', 'Nursyamsi', '', 'Nursyamsi', 'putra.ndutz@yahoo.com', '', '', '', '081241927343', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-28 22:49:36', '0', '1', '', ''),
(97, 26, '0000097', 'Waone0505', '', 'Muh. Kurniawan. F', 'waone.usti@gmail.com', '', '', '', '089610168855', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-04-29 08:29:09', '0', '1', '', ''),
(98, 26, '0000098', 'umam', '', 'mamp', 'imam@gmail.com', '', '', '', '082223092756', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-03 02:46:22', '0', '1', '', ''),
(99, 26, '0000099', 'rossa', '', 'Rossa', 'rossajulia7@gmail.com', '', '', '', '085219343846', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-03 02:47:07', '0', '1', '', ''),
(100, 26, '0000100', 'ressi', '$2y$10$FYn5v0Ass17W7r5l05wT3Ol60GTUq7a/099EM4rR8BLHM7zueFLV6', 'Ressi', 'ressijulia7@gmail.com', '', '', '', '085219343846', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-03 02:47:46', '0', '1', '', ''),
(101, 26, '0000101', 'rossass', '', 'woms', 'imamss@gmail.com', '', '', '', '082223092759', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-03 02:49:11', '0', '1', '', ''),
(102, 26, '0000102', 'yahya', '$2y$10$.YqslUvyoPKBsgK/5QJO0u90QbfYFdBSuVFsK/a1PKy3MPVQno6jm', 'Yahya', 'ressi.julia7@gmail.com', '', '', '', '082223098165', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-03 02:52:35', '0', '1', '', ''),
(103, 26, '0000103', 'Kaimuddin', '', 'Kaimuddin Nawawi', 'kaikainawawi@gmail.com', '', '', '', '085824558884', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-09 03:34:11', '0', '1', '', ''),
(104, 26, '0000104', 'Ruslan', '', 'Ruslan abdul gani', 'chandraadityaa00@gmail.com', '', '', '', '089529404225', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-10 01:18:25', '0', '1', '', ''),
(105, 26, '0000105', 'chandra', '', 'Ruslan abdul gani', 'abdulganiruslan350@gmail.com', '', '', '', '089529404225', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-10 01:20:27', '0', '1', '', ''),
(106, 26, '0000106', 'omamas', '', 'Omamas', 'omamas281@gmail.com', '', '', '', '082223092756', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-10 03:01:44', '0', '1', '', ''),
(107, 26, '0000107', 'santoka', '', 'Santoka', 'ressijuli.a7@gmail.com', '', '', '', '082241307810', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-10 03:02:38', '0', '1', '', ''),
(108, 26, '0000108', 'hundari21', '', 'Hundari Asnan', 'hundari21asnan@gmail.com', '', '', '', '081260524566', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-13 19:07:13', '0', '1', '', ''),
(109, 26, '0000109', 'Hundari26', '', 'Hundari Asnan', 'asnanhundari@gmail.com', '', '', '', '081260524566', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-13 19:08:26', '0', '1', '', ''),
(110, 26, '0000110', 'Andika12', '', 'Andik sutrisno', 'auliaandiniputri516@gmail.com', '', '', '', '081918091951', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-19 21:57:15', '0', '1', '', ''),
(111, 26, '0000111', 'Ahaay', '', 'Agung', 'suharto.agung75@gmail.com', '', '', '', '087889846414', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-30 17:01:39', '0', '1', '', ''),
(112, 26, '0000112', 'episopya1234', '$2y$10$Ho26jEj.gFL48Z.F.rKYOeoD8El7/1sgkD9zxjDYyG2I9x7W92DrG', 'epi sopya', 'mail.kupunya123@gmail.com', '', '', '', '081253718529', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-05-31 20:57:35', '0', '1', '', ''),
(113, 26, '0000113', 'Menatahidup01', '$2y$10$OHGVc34CedDZgfvdztOjwOuXjXuSMC7838VXydAC14n8XlOsouSSi', 'Muh akbar', 'akbarputerajaya@gmail.com', '', '', '', '082293541402', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-06-02 04:15:15', '0', '1', '', ''),
(114, 26, '0000114', 'Gemini98', '', 'Alam', 'sgemini432@gmail.com', '', '', '', '082195966227', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-06-03 15:33:09', '0', '1', '', ''),
(115, 26, '0000115', 'Gemini', '', 'Alam', 'tanklolita152@gmail.com', '', '', '', '082195956227', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-06-03 15:35:09', '0', '1', '', ''),
(116, 26, '0000116', 'Adryan1707', '', 'Adrianus Bannepadang', 'adrian170785@gmail.com', '', '', '', '081337173917', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-06-04 11:49:07', '0', '1', '', ''),
(117, 26, '0000117', 'DjalilDahsyat', '', 'H.Abd Jalil Muqoddas,SH', 'jalildahsyat@gmail.com', '', '', '', '081259832005', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-06-07 01:01:18', '0', '1', '', ''),
(118, 26, '0000118', 'Martin88', '$2y$10$nRNEuR3KxCoV2Iz8yyxag.crNWft.ZMtTuu1/PgNA2.P9rGyi5YLu', 'Martinus fadli andika', 'martin.benzema11@gmail.com', '', '', '', '081329558502', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-06-13 01:03:14', '0', '1', '', ''),
(119, 26, '0000119', 'Nagib', '$2y$10$hp1Gs2KGSV.KgcY42nK/k.iblMxRzECBOQdd1nmG.M4M9aIm7QoNy', 'M nagib', 'sukses102030@gmail.com', '', '', '', '08174921095', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-06-14 16:06:03', '0', '1', '', ''),
(120, 26, '0000120', 'Albertius', '$2y$10$Cw0.4gnkycHRC/qxbdqKvOHN1h7.1Zbzo9zifzNxx2i6JKsMbSJM2', 'Albertius Guntur Setiawan', 'albertiussetiawan@gmail.com', '', '', '', '085866588392', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-07-07 23:54:42', '0', '1', '', ''),
(121, 26, '0000121', 'HILLTON888', '$2y$10$cDLgDsexExIN8YUY/BVobO0t/ZURuyvQyrB1bEWXtYqAzXdm1v4Z6', 'IMAM SUJITO', 'isujito96@gmail.com', '', '', '', '081329602807', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-08-28 13:59:23', '0', '1', '', ''),
(122, 26, '0000122', 'HILLTON808', '', 'IMAM SUJITO', 'imamsujito6953@gmail.com', '', '', '', '081329602807', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-08-28 14:05:47', '0', '1', '', ''),
(123, 26, '0000123', 'Munawwarah', '', 'Munawwarah', 'munawwarah1002@gmail.com', '', '', '', '082192705481', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-09-03 16:34:06', '0', '1', '', ''),
(124, 26, '0000124', 'Amir1997', '', 'Amirullah', 'a876473@gmail.com', '', '', '', '082231943820', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-09-11 00:49:53', '0', '1', '', ''),
(125, 26, '0000125', '22juni87', '', 'NANA NASUTION', 'nasutionnana36@gmail.com', '', '', '', '085883535002', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-10-13 00:01:12', '0', '1', '', ''),
(126, 26, '0000126', 'Elang666', '', 'Mandala Said', 'mandalasaid@gmail.com', '', '', '', '081355008181', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-10-16 01:20:51', '0', '1', '', ''),
(127, 26, '0000127', 'Jhonny', '', 'Mark James Ristendi Setia', 'mark.james.ristendi@gmail.com', '', '', '', '0821907456', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-11-04 17:25:37', '0', '1', '', ''),
(128, 26, '0000128', 'Cecepsonjaya', '', 'Cecep Sonjaya nyata', 'cecepsonjaya676@gmail.com', '', '', '', '082118327716', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-11-07 02:41:56', '0', '1', '', ''),
(129, 26, '0000129', 'Rachman', '', 'Rachman', 'rachmann225@gmail.com', '', '', '', '089613173325', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-11-08 23:11:05', '0', '1', '', ''),
(130, 26, '0000130', 'echa22', '', 'Reza mulya pratama', 'rimamelati22101989@gmail.com', '', '', '', '082394213900', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-11-13 04:48:52', '0', '1', '', ''),
(131, 26, '0000131', '60300120062', '', 'Nurhasanah', 'nurh07266@gmail.com', '', '', '', '085249894218', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-11-13 07:53:55', '0', '1', '', ''),
(132, 26, '0000132', 'Solah', '', 'Solah', 'solahsolah703@gmail.com', '', '', '', '083872949249', '', '', '', '', '', 0, '', '', '', '', '', '', '', '2020-11-19 08:35:39', '0', '1', '', '');

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
(2, 'BP-0000002', NULL, 26, 25000, '2020-01-25 14:57:40'),
(7, 'BP-0000007', 26, 24, 25000, '2020-02-07 16:32:41'),
(8, 'BP-0000008', 26, 23, 25000, '2020-02-07 16:34:22'),
(9, 'BP-0000009', 26, 25, 25000, '2020-02-07 16:37:09'),
(10, 'BP-0000010', 26, 16, 25000, '2020-02-07 16:42:56'),
(11, 'BP-0000011', 26, 30, 25000, '2020-02-11 16:01:18'),
(12, 'BP-0000012', 24, 13, 25000, '2020-02-12 17:08:58'),
(13, 'BP-0000013', 24, 49, 25000, '2020-02-12 18:07:55'),
(14, 'BP-0000014', 24, 53, 25000, '2020-02-14 18:35:45'),
(15, 'BP-0000015', 24, 54, 25000, '2020-02-14 18:47:57'),
(16, 'BP-0000016', 24, 55, 25000, '2020-02-15 00:39:09'),
(17, 'BP-0000017', 24, 56, 25000, '2020-02-15 18:08:25'),
(18, 'BP-0000018', 26, 57, 25000, '2020-02-17 12:01:56'),
(19, 'BP-0000019', 24, 59, 25000, '2020-02-17 22:39:20'),
(20, 'BP-0000020', 24, 60, 25000, '2020-02-18 14:00:47'),
(21, 'BP-0000021', 25, 71, 25000, '2020-02-28 11:19:48'),
(22, 'BP-0000022', 24, 72, 25000, '2020-03-02 10:16:46');

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

--
-- Dumping data for table `tb_bonus_sponsor`
--

INSERT INTO `tb_bonus_sponsor` (`id_royalti`, `kode_tr`, `id_anggota`, `id_child`, `amount`, `date`) VALUES
(1, 'BS-0000001', 26, 24, 12500, '2020-02-07 16:32:41'),
(2, 'BS-0000002', 26, 23, 12500, '2020-02-07 16:34:22'),
(3, 'BS-0000003', 26, 25, 12500, '2020-02-07 16:37:09'),
(4, 'BS-0000004', 26, 16, 12500, '2020-02-07 16:42:56'),
(5, 'BS-0000005', 26, 30, 12500, '2020-02-11 16:01:18'),
(6, 'BS-0000006', 24, 13, 12500, '2020-02-12 17:08:58'),
(7, 'BS-0000007', 24, 49, 12500, '2020-02-12 18:07:55'),
(8, 'BS-0000008', 24, 53, 12500, '2020-02-14 18:35:45'),
(9, 'BS-0000009', 24, 54, 12500, '2020-02-14 18:47:57'),
(10, 'BS-0000010', 24, 55, 12500, '2020-02-15 00:39:09'),
(11, 'BS-0000011', 24, 56, 12500, '2020-02-15 18:08:25'),
(12, 'BS-0000012', 26, 57, 12500, '2020-02-17 12:01:56'),
(13, 'BS-0000013', 24, 59, 12500, '2020-02-17 22:39:20'),
(14, 'BS-0000014', 24, 60, 12500, '2020-02-18 14:00:47'),
(15, 'BS-0000015', 25, 71, 12500, '2020-02-28 11:19:48'),
(16, 'BS-0000016', 24, 72, 12500, '2020-03-02 10:16:46');

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

--
-- Dumping data for table `tb_deposit`
--

INSERT INTO `tb_deposit` (`id_deposit`, `kode_tr`, `id_anggota`, `amount`, `last_code`, `id_gateway`, `code`, `date`, `status`) VALUES
(2, 'DP-0000002', 26, 5000000, '651', 1, 'HOARNU', '2020-02-07 16:14:17', '1'),
(3, 'DP-0000003', 16, 3000000, '229', 1, 'VWRAIQ', '2020-02-10 10:32:49', '9'),
(4, 'DP-0000004', 16, 300000, '273', 1, 'IFTUOA', '2020-02-10 10:33:58', '1'),
(5, 'DP-0000005', 23, 300000, '326', 1, 'QYNIBC', '2020-02-10 10:34:08', '1'),
(6, 'DP-0000006', 24, 300009, '931', 1, 'IMUVEJ', '2020-02-10 10:38:31', '1'),
(7, 'DP-0000007', 25, 300000, '836', 1, 'FUCRAH', '2020-02-10 11:32:44', '1'),
(8, 'DP-0000008', 24, 100000, '991', 1, 'AHGKEC', '2020-02-12 11:05:21', '9'),
(9, 'DP-0000009', 24, 25000, '826', 1, 'CAEFBK', '2020-02-12 15:37:16', '1'),
(10, 'DP-0000010', 24, 25000, '557', 1, 'SBAFDG', '2020-02-12 17:11:25', '1'),
(11, 'DP-0000011', 13, 300000, '333', 1, 'VFYDWK', '2020-02-13 10:32:40', '1'),
(12, 'DP-0000012', 24, 50000, '720', 1, 'WDCGQP', '2020-02-14 18:15:31', '1'),
(13, 'DP-0000013', 24, 25000, '716', 1, 'AMELIT', '2020-02-18 13:45:11', '1'),
(14, 'DP-0000014', 57, 300000, '726', 1, 'LZMEIY', '2020-02-18 17:42:01', '1'),
(15, 'DP-0000015', 56, 50000, '356', 1, 'VWMOPE', '2020-02-21 11:18:32', '0'),
(16, 'DP-0000016', 25, 50000, '290', 1, 'YNHXIF', '2020-02-28 10:44:57', '1'),
(17, 'DP-0000017', 49, 50000, '153', 1, 'OFRBNV', '2020-03-10 12:33:45', '1'),
(18, 'DP-0000018', 49, 400000, '446', 1, 'CKBOYZ', '2020-03-10 16:31:36', '1'),
(19, 'DP-0000019', 49, 100000, '883', 1, 'QWOFXB', '2020-04-05 22:52:16', '1'),
(20, 'DP-0000020', 16, 10000000, '490', 1, 'TWEAMX', '2020-04-13 12:07:21', '0'),
(21, 'DP-0000021', 49, 100000, '609', 1, 'DGKJLW', '2020-07-24 20:12:39', '1');

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
(8, 'DEPO_MIN', 'deposit minimal', '50000', '1'),
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

--
-- Dumping data for table `tb_report`
--

INSERT INTO `tb_report` (`id_report`, `kode_tr`, `id_anggota`, `id`, `debit`, `credit`, `saldo`, `deskripsi`, `tipe`, `date`) VALUES
(1, 'DP-0000002', 26, 2, 0, 5000000, 5000000, 'Deposit [DP-0000002] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-07 16:16:50'),
(2, 'SP-0000001', 26, 1, 250000, 0, 4750000, 'Membayar simpanan pokok', 'simpanan_pokok', '2020-02-07 16:27:33'),
(3, 'SW-0000001', 26, 1, 50000, 0, 4700000, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-02-07 16:27:44'),
(4, 'BP-0000007', 26, 7, 25000, 0, 4675000, 'Membayar biaya pendaftaran [0000024]', 'biaya_pendaftaran', '2020-02-07 16:32:41'),
(5, 'BS-0000001', 26, 1, 0, 12500, 4687500, 'Mendapatkan royalti referral dari anggota [0000024]', 'royalti_pendaftaran', '2020-02-07 16:32:41'),
(6, 'BP-0000008', 26, 8, 25000, 0, 4662500, 'Membayar biaya pendaftaran [0000023]', 'biaya_pendaftaran', '2020-02-07 16:34:22'),
(7, 'BS-0000002', 26, 2, 0, 12500, 4675000, 'Mendapatkan royalti referral dari anggota [0000023]', 'royalti_pendaftaran', '2020-02-07 16:34:22'),
(8, 'BP-0000009', 26, 9, 25000, 0, 4650000, 'Membayar biaya pendaftaran [0000025]', 'biaya_pendaftaran', '2020-02-07 16:37:09'),
(9, 'BS-0000003', 26, 3, 0, 12500, 4662500, 'Mendapatkan royalti referral dari anggota [0000025]', 'royalti_pendaftaran', '2020-02-07 16:37:09'),
(10, 'BP-0000010', 26, 10, 25000, 0, 4637500, 'Membayar biaya pendaftaran [0000016]', 'biaya_pendaftaran', '2020-02-07 16:42:56'),
(11, 'BS-0000004', 26, 4, 0, 12500, 4650000, 'Mendapatkan royalti referral dari anggota [0000016]', 'royalti_pendaftaran', '2020-02-07 16:42:56'),
(12, 'DP-0000004', 16, 4, 0, 300000, 300000, 'Deposit [DP-0000004] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-10 10:34:09'),
(13, 'DP-0000005', 23, 5, 0, 300000, 300000, 'Deposit [DP-0000005] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-10 10:34:34'),
(14, 'SP-0000002', 16, 2, 250000, 0, 50000, 'Membayar simpanan pokok', 'simpanan_pokok', '2020-02-10 10:35:59'),
(15, 'SW-0000002', 16, 2, 50000, 0, 0, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-02-10 10:36:17'),
(16, 'SP-0000003', 23, 3, 250000, 0, 50000, 'Membayar simpanan pokok', 'simpanan_pokok', '2020-02-10 10:37:20'),
(17, 'SW-0000003', 23, 3, 50000, 0, 0, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-02-10 10:37:35'),
(18, 'DP-0000006', 24, 6, 0, 300009, 300009, 'Deposit [DP-0000006] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-10 10:39:02'),
(19, 'SP-0000004', 24, 4, 250000, 0, 50009, 'Membayar simpanan pokok', 'simpanan_pokok', '2020-02-10 10:56:29'),
(20, 'SW-0000004', 24, 4, 50000, 0, 9, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-02-10 10:58:13'),
(21, 'DP-0000007', 25, 7, 0, 300000, 300000, 'Deposit [DP-0000007] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-10 11:33:51'),
(22, 'SP-0000005', 25, 5, 250000, 0, 50000, 'Membayar simpanan pokok', 'simpanan_pokok', '2020-02-10 11:35:09'),
(23, 'SW-0000005', 25, 5, 50000, 0, 0, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-02-10 11:35:53'),
(24, 'BP-0000011', 26, 11, 25000, 0, 4625000, 'Membayar biaya pendaftaran [0000046]', 'biaya_pendaftaran', '2020-02-11 16:01:18'),
(25, 'BS-0000005', 26, 5, 0, 12500, 4637500, 'Mendapatkan royalti referral dari anggota [0000046]', 'royalti_pendaftaran', '2020-02-11 16:01:18'),
(26, 'DP-0000009', 24, 9, 0, 25000, 25009, 'Deposit [DP-0000009] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-12 17:07:32'),
(27, 'BP-0000012', 24, 12, 25000, 0, 9, 'Membayar biaya pendaftaran [0000013]', 'biaya_pendaftaran', '2020-02-12 17:08:58'),
(28, 'BS-0000006', 24, 6, 0, 12500, 12509, 'Mendapatkan royalti referral dari anggota [0000013]', 'royalti_pendaftaran', '2020-02-12 17:08:58'),
(29, 'DP-0000010', 24, 10, 0, 25000, 37509, 'Deposit [DP-0000010] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-12 18:04:56'),
(30, 'BP-0000013', 24, 13, 25000, 0, 12509, 'Membayar biaya pendaftaran [0000049]', 'biaya_pendaftaran', '2020-02-12 18:07:55'),
(31, 'BS-0000007', 24, 7, 0, 12500, 25009, 'Mendapatkan royalti referral dari anggota [0000049]', 'royalti_pendaftaran', '2020-02-12 18:07:55'),
(32, 'DP-0000011', 13, 11, 0, 300000, 300000, 'Deposit [DP-0000011] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-14 14:55:48'),
(33, 'DP-0000012', 24, 12, 0, 50000, 75009, 'Deposit [DP-0000012] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-14 18:21:10'),
(34, 'BP-0000014', 24, 14, 25000, 0, 50009, 'Membayar biaya pendaftaran [0000053]', 'biaya_pendaftaran', '2020-02-14 18:35:45'),
(35, 'BS-0000008', 24, 8, 0, 12500, 62509, 'Mendapatkan royalti referral dari anggota [0000053]', 'royalti_pendaftaran', '2020-02-14 18:35:45'),
(36, 'BP-0000015', 24, 15, 25000, 0, 37509, 'Membayar biaya pendaftaran [0000054]', 'biaya_pendaftaran', '2020-02-14 18:47:57'),
(37, 'BS-0000009', 24, 9, 0, 12500, 50009, 'Mendapatkan royalti referral dari anggota [0000054]', 'royalti_pendaftaran', '2020-02-14 18:47:57'),
(38, 'BP-0000016', 24, 16, 25000, 0, 25009, 'Membayar biaya pendaftaran [0000055]', 'biaya_pendaftaran', '2020-02-15 00:39:09'),
(39, 'BS-0000010', 24, 10, 0, 12500, 37509, 'Mendapatkan royalti referral dari anggota [0000055]', 'royalti_pendaftaran', '2020-02-15 00:39:09'),
(40, 'BP-0000017', 24, 17, 25000, 0, 12509, 'Membayar biaya pendaftaran [0000056]', 'biaya_pendaftaran', '2020-02-15 18:08:25'),
(41, 'BS-0000011', 24, 11, 0, 12500, 25009, 'Mendapatkan royalti referral dari anggota [0000056]', 'royalti_pendaftaran', '2020-02-15 18:08:25'),
(42, 'SP-0000006', 13, 6, 250000, 0, 50000, 'Membayar simpanan pokok', 'simpanan_pokok', '2020-02-17 10:46:26'),
(43, 'SW-0000006', 13, 6, 50000, 0, 0, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-02-17 10:47:06'),
(44, 'BP-0000018', 26, 18, 25000, 0, 4612500, 'Membayar biaya pendaftaran [0000057]', 'biaya_pendaftaran', '2020-02-17 12:01:56'),
(45, 'BS-0000012', 26, 12, 0, 12500, 4625000, 'Mendapatkan royalti referral dari anggota [0000057]', 'royalti_pendaftaran', '2020-02-17 12:01:56'),
(46, 'BP-0000019', 24, 19, 25000, 0, 9, 'Membayar biaya pendaftaran [0000059]', 'biaya_pendaftaran', '2020-02-17 22:39:20'),
(47, 'BS-0000013', 24, 13, 0, 12500, 12509, 'Mendapatkan royalti referral dari anggota [0000059]', 'royalti_pendaftaran', '2020-02-17 22:39:20'),
(48, 'DP-0000013', 24, 13, 0, 25000, 37509, 'Deposit [DP-0000013] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-18 13:47:52'),
(49, 'BP-0000020', 24, 20, 25000, 0, 12509, 'Membayar biaya pendaftaran [0000060]', 'biaya_pendaftaran', '2020-02-18 14:00:47'),
(50, 'BS-0000014', 24, 14, 0, 12500, 25009, 'Mendapatkan royalti referral dari anggota [0000060]', 'royalti_pendaftaran', '2020-02-18 14:00:47'),
(51, 'DP-0000014', 57, 14, 0, 300000, 300000, 'Deposit [DP-0000014] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-18 21:28:40'),
(52, 'SP-0000007', 57, 7, 250000, 0, 50000, 'Membayar simpanan pokok', 'simpanan_pokok', '2020-02-18 22:59:57'),
(53, 'SW-0000007', 57, 7, 50000, 0, 0, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-02-18 23:00:07'),
(54, 'DP-0000016', 25, 16, 0, 50000, 50000, 'Deposit [DP-0000016] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-02-28 11:18:45'),
(55, 'BP-0000021', 25, 21, 25000, 0, 25000, 'Membayar biaya pendaftaran [0000071]', 'biaya_pendaftaran', '2020-02-28 11:19:48'),
(56, 'BS-0000015', 25, 15, 0, 12500, 37500, 'Mendapatkan royalti referral dari anggota [0000071]', 'royalti_pendaftaran', '2020-02-28 11:19:48'),
(57, 'BP-0000022', 24, 22, 25000, 0, 9, 'Membayar biaya pendaftaran [0000072]', 'biaya_pendaftaran', '2020-03-02 10:16:46'),
(58, 'BS-0000016', 24, 16, 0, 12500, 12509, 'Mendapatkan royalti referral dari anggota [0000072]', 'royalti_pendaftaran', '2020-03-02 10:16:46'),
(59, 'DP-0000018', 49, 18, 0, 400000, 400000, 'Deposit [DP-0000018] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-03-10 16:32:08'),
(60, 'SP-0000008', 49, 8, 250000, 0, 150000, 'Membayar simpanan pokok', 'simpanan_pokok', '2020-03-10 16:38:04'),
(61, 'SW-0000008', 49, 8, 50000, 0, 100000, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-03-10 16:38:14'),
(62, 'SW-0000009', 49, 9, 50000, 0, 50000, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-03-10 16:38:14'),
(63, 'SW-0000010', 49, 10, 50000, 0, 0, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-03-10 16:38:14'),
(64, 'DP-0000019', 49, 19, 0, 100000, 100000, 'Deposit [DP-0000019] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-04-05 22:54:22'),
(65, 'DP-0000017', 49, 17, 0, 50000, 150000, 'Deposit [DP-0000017] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-04-05 22:58:04'),
(66, 'SW-0000011', 49, 11, 50000, 0, 100000, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-04-05 23:04:52'),
(67, 'SW-0000012', 49, 12, 50000, 0, 50000, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-04-05 23:04:52'),
(68, 'DP-0000021', 49, 21, 0, 100000, 150000, 'Deposit [DP-0000021] ke MANDIRI - 152-05-5524477-7', 'depo_sukses', '2020-07-24 20:24:17'),
(69, 'SW-0000013', 49, 13, 50000, 0, 100000, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-07-25 20:12:10'),
(70, 'SW-0000014', 49, 14, 50000, 0, 50000, 'Membayar simpanan wajib', 'simpanan_wajib', '2020-07-25 20:12:10');

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
(26, NULL, 'pengurus', 'Deposit [DP-0000001] dibatalkan', '2020-02-07 14:46:55'),
(27, '26', 'anggota', 'Permintaan deposit [DP-0000002] senilai Rp 5.000.000', '2020-02-07 16:14:17'),
(28, '16', 'pengurus', 'Deposit [DP-0000002] ke MANDIRI - 152-05-5524477-7', '2020-02-07 16:16:50'),
(29, '26', 'anggota', 'Membayar simpanan pokok [SP-0000001]  senilai Rp 250.000', '2020-02-07 16:27:33'),
(30, '26', 'anggota', 'Membayar simpanan wajib 1 bulan senilai Rp 50.000', '2020-02-07 16:27:44'),
(31, '30', 'anggota', 'Buat akun baru', '2020-02-07 16:28:33'),
(32, '26', 'anggota', 'Mendaftarkan anggota [0000024]', '2020-02-07 16:32:41'),
(33, '26', 'anggota', 'Mendaftarkan anggota [0000023]', '2020-02-07 16:34:22'),
(34, '26', 'anggota', 'Mendaftarkan anggota [0000025]', '2020-02-07 16:37:09'),
(35, '26', 'anggota', 'Mendaftarkan anggota [0000016]', '2020-02-07 16:42:56'),
(36, '43', 'anggota', 'Buat akun dengan kode referral [Hatta001]', '2020-02-07 21:22:37'),
(37, '16', 'anggota', 'Update password', '2020-02-08 02:00:28'),
(38, '16', 'anggota', 'Update password transaksi', '2020-02-08 02:00:56'),
(39, '44', 'anggota', 'Buat akun dengan kode referral [Hatta001]', '2020-02-09 14:07:47'),
(40, '23', 'anggota', 'Update password', '2020-02-10 10:30:00'),
(41, '23', 'anggota', 'Update password transaksi', '2020-02-10 10:30:07'),
(42, '16', 'anggota', 'Permintaan deposit [DP-0000003] senilai Rp 3.000.000', '2020-02-10 10:32:49'),
(43, '16', 'anggota', 'Permintaan deposit [DP-0000004] senilai Rp 300.000', '2020-02-10 10:33:58'),
(44, '23', 'anggota', 'Permintaan deposit [DP-0000005] senilai Rp 300.000', '2020-02-10 10:34:08'),
(45, '16', 'pengurus', 'Deposit [DP-0000004] ke MANDIRI - 152-05-5524477-7', '2020-02-10 10:34:09'),
(46, '16', 'pengurus', 'Deposit [DP-0000005] ke MANDIRI - 152-05-5524477-7', '2020-02-10 10:34:34'),
(47, NULL, 'pengurus', 'Deposit [DP-0000003] dibatalkan', '2020-02-10 10:34:46'),
(48, '16', 'anggota', 'Membayar simpanan pokok [SP-0000002]  senilai Rp 250.000', '2020-02-10 10:35:59'),
(49, '16', 'anggota', 'Membayar simpanan wajib 1 bulan senilai Rp 50.000', '2020-02-10 10:36:17'),
(50, '23', 'anggota', 'Update password transaksi', '2020-02-10 10:36:20'),
(51, '23', 'anggota', 'Update password', '2020-02-10 10:36:41'),
(52, '23', 'anggota', 'Membayar simpanan pokok [SP-0000003]  senilai Rp 250.000', '2020-02-10 10:37:20'),
(53, '23', 'anggota', 'Membayar simpanan wajib 1 bulan senilai Rp 50.000', '2020-02-10 10:37:35'),
(54, '24', 'anggota', 'Permintaan deposit [DP-0000006] senilai Rp 300.009', '2020-02-10 10:38:31'),
(55, '16', 'pengurus', 'Deposit [DP-0000006] ke MANDIRI - 152-05-5524477-7', '2020-02-10 10:39:02'),
(56, '24', 'anggota', 'Membayar simpanan pokok [SP-0000004]  senilai Rp 250.000', '2020-02-10 10:56:29'),
(57, '24', 'anggota', 'Membayar simpanan wajib 1 bulan senilai Rp 50.000', '2020-02-10 10:58:13'),
(58, '25', 'anggota', 'Permintaan deposit [DP-0000007] senilai Rp 300.000', '2020-02-10 11:32:44'),
(59, '16', 'pengurus', 'Deposit [DP-0000007] ke MANDIRI - 152-05-5524477-7', '2020-02-10 11:33:51'),
(60, '25', 'anggota', 'Membayar simpanan pokok [SP-0000005]  senilai Rp 250.000', '2020-02-10 11:35:09'),
(61, '25', 'anggota', 'Membayar simpanan wajib 1 bulan senilai Rp 50.000', '2020-02-10 11:35:53'),
(62, '45', 'anggota', 'Buat akun baru', '2020-02-10 12:15:17'),
(63, '16', 'pengurus', 'Update pengaturan status', '2020-02-10 14:23:37'),
(64, '26', 'anggota', 'Mendaftarkan anggota [0000046]', '2020-02-11 16:01:18'),
(65, '24', 'anggota', 'Permintaan deposit [DP-0000008] senilai Rp 100.000', '2020-02-12 11:05:21'),
(66, '47', 'anggota', 'Buat akun baru', '2020-02-12 12:18:32'),
(67, '16', 'pengurus', 'Update pengaturan deposit', '2020-02-12 15:34:24'),
(68, '24', 'anggota', 'Permintaan deposit [DP-0000009] senilai Rp 25.000', '2020-02-12 15:37:16'),
(69, '16', 'pengurus', 'Update pengaturan status', '2020-02-12 15:45:42'),
(70, '16', 'pengurus', 'Deposit [DP-0000009] ke MANDIRI - 152-05-5524477-7', '2020-02-12 17:07:32'),
(71, '24', 'anggota', 'Mendaftarkan anggota [0000013]', '2020-02-12 17:08:58'),
(72, NULL, 'pengurus', 'Deposit [DP-0000008] dibatalkan', '2020-02-12 17:10:32'),
(73, '24', 'anggota', 'Permintaan deposit [DP-0000010] senilai Rp 25.000', '2020-02-12 17:11:25'),
(74, '16', 'pengurus', 'Update pengaturan deposit', '2020-02-12 17:54:44'),
(75, '16', 'pengurus', 'Deposit [DP-0000010] ke MANDIRI - 152-05-5524477-7', '2020-02-12 18:04:56'),
(76, '24', 'anggota', 'Mendaftarkan anggota [0000049]', '2020-02-12 18:07:55'),
(77, '50', 'anggota', 'Buat akun baru', '2020-02-12 18:15:18'),
(78, '16', 'pengurus', 'Update data anggota [0000049]', '2020-02-12 20:15:25'),
(79, '51', 'anggota', 'Buat akun baru', '2020-02-13 04:34:48'),
(80, '13', 'anggota', 'Update password', '2020-02-13 10:30:29'),
(81, '13', 'anggota', 'Update password transaksi', '2020-02-13 10:31:36'),
(82, '13', 'anggota', 'Permintaan deposit [DP-0000011] senilai Rp 300.000', '2020-02-13 10:32:40'),
(83, '52', 'anggota', 'Buat akun baru', '2020-02-13 19:20:01'),
(84, '16', 'pengurus', 'Deposit [DP-0000011] ke MANDIRI - 152-05-5524477-7', '2020-02-14 14:55:48'),
(85, '24', 'anggota', 'Permintaan deposit [DP-0000012] senilai Rp 50.000', '2020-02-14 18:15:31'),
(86, '16', 'pengurus', 'Deposit [DP-0000012] ke MANDIRI - 152-05-5524477-7', '2020-02-14 18:21:10'),
(87, '24', 'anggota', 'Mendaftarkan anggota [0000053]', '2020-02-14 18:35:45'),
(88, '24', 'anggota', 'Mendaftarkan anggota [0000054]', '2020-02-14 18:47:57'),
(89, '24', 'anggota', 'Mendaftarkan anggota [0000055]', '2020-02-15 00:39:09'),
(90, '16', 'pengurus', 'Update data anggota [0000053]', '2020-02-15 11:46:15'),
(91, '16', 'pengurus', 'Update data anggota [0000054]', '2020-02-15 17:54:57'),
(92, '24', 'anggota', 'Mendaftarkan anggota [0000056]', '2020-02-15 18:08:25'),
(93, '13', 'anggota', 'Membayar simpanan pokok [SP-0000006]  senilai Rp 250.000', '2020-02-17 10:46:26'),
(94, '13', 'anggota', 'Membayar simpanan wajib 1 bulan senilai Rp 50.000', '2020-02-17 10:47:06'),
(95, '26', 'anggota', 'Mendaftarkan anggota [0000057]', '2020-02-17 12:01:56'),
(96, '58', 'anggota', 'Buat akun baru', '2020-02-17 14:02:59'),
(97, '24', 'anggota', 'Mendaftarkan anggota [0000059]', '2020-02-17 22:39:20'),
(98, '16', 'pengurus', 'Update data anggota [0000059]', '2020-02-18 09:09:26'),
(99, '16', 'pengurus', 'Update pengaturan deposit', '2020-02-18 13:44:43'),
(100, '24', 'anggota', 'Permintaan deposit [DP-0000013] senilai Rp 25.000', '2020-02-18 13:45:11'),
(101, '16', 'pengurus', 'Update pengaturan deposit', '2020-02-18 13:45:49'),
(102, '16', 'pengurus', 'Deposit [DP-0000013] ke MANDIRI - 152-05-5524477-7', '2020-02-18 13:47:52'),
(103, '24', 'anggota', 'Mendaftarkan anggota [0000060]', '2020-02-18 14:00:47'),
(104, '60', 'anggota', 'Update data rekening', '2020-02-18 14:15:19'),
(105, '60', 'anggota', 'Update password', '2020-02-18 14:16:00'),
(106, '60', 'anggota', 'Update password transaksi', '2020-02-18 14:16:40'),
(107, '59', 'anggota', 'Update password', '2020-02-18 15:58:53'),
(108, '59', 'anggota', 'Update data rekening', '2020-02-18 15:59:09'),
(109, '57', 'anggota', 'Permintaan deposit [DP-0000014] senilai Rp 300.000', '2020-02-18 17:42:01'),
(110, '16', 'pengurus', 'Deposit [DP-0000014] ke MANDIRI - 152-05-5524477-7', '2020-02-18 21:28:40'),
(111, '57', 'anggota', 'Membayar simpanan pokok [SP-0000007]  senilai Rp 250.000', '2020-02-18 22:59:57'),
(112, '57', 'anggota', 'Membayar simpanan wajib 1 bulan senilai Rp 50.000', '2020-02-18 23:00:07'),
(113, '61', 'anggota', 'Buat akun baru', '2020-02-19 05:20:55'),
(114, '62', 'anggota', 'Buat akun baru', '2020-02-19 09:59:16'),
(115, '63', 'anggota', 'Buat akun baru', '2020-02-19 11:51:03'),
(116, '56', 'anggota', 'Permintaan deposit [DP-0000015] senilai Rp 50.000', '2020-02-21 11:18:32'),
(117, '64', 'anggota', 'Buat akun baru', '2020-02-22 18:47:46'),
(118, '65', 'anggota', 'Buat akun baru', '2020-02-22 18:49:44'),
(119, '66', 'anggota', 'Buat akun baru', '2020-02-24 14:08:05'),
(120, '67', 'anggota', 'Buat akun baru', '2020-02-24 14:10:55'),
(121, '68', 'anggota', 'Buat akun baru', '2020-02-24 14:12:39'),
(122, '69', 'anggota', 'Buat akun baru', '2020-02-24 15:25:46'),
(123, '70', 'anggota', 'Buat akun baru', '2020-02-24 17:30:21'),
(124, '25', 'anggota', 'Permintaan deposit [DP-0000016] senilai Rp 50.000', '2020-02-28 10:44:57'),
(125, '16', 'pengurus', 'Deposit [DP-0000016] ke MANDIRI - 152-05-5524477-7', '2020-02-28 11:18:45'),
(126, '25', 'anggota', 'Mendaftarkan anggota [0000071]', '2020-02-28 11:19:48'),
(127, '16', 'pengurus', 'Update data anggota [0000049]', '2020-02-29 14:13:12'),
(128, '24', 'anggota', 'Mendaftarkan anggota [0000072]', '2020-03-02 10:16:46'),
(129, '57', 'anggota', 'Update data rekening', '2020-03-03 11:12:50'),
(130, '49', 'anggota', 'Permintaan deposit [DP-0000017] senilai Rp 50.000', '2020-03-10 12:33:45'),
(131, '49', 'anggota', 'Permintaan deposit [DP-0000018] senilai Rp 400.000', '2020-03-10 16:31:36'),
(132, '16', 'pengurus', 'Deposit [DP-0000018] ke MANDIRI - 152-05-5524477-7', '2020-03-10 16:32:08'),
(133, '49', 'anggota', 'Membayar simpanan pokok [SP-0000008]  senilai Rp 250.000', '2020-03-10 16:38:04'),
(134, '49', 'anggota', 'Membayar simpanan wajib 3 bulan senilai Rp 150.000', '2020-03-10 16:38:14'),
(135, '73', 'anggota', 'Buat akun baru', '2020-03-12 13:26:28'),
(136, '74', 'anggota', 'Buat akun baru', '2020-03-12 16:04:53'),
(137, '75', 'anggota', 'Buat akun baru', '2020-03-15 23:22:12'),
(138, '76', 'anggota', 'Buat akun baru', '2020-03-17 01:37:55'),
(139, '77', 'anggota', 'Buat akun baru', '2020-03-17 21:09:48'),
(140, '78', 'anggota', 'Buat akun baru', '2020-03-21 04:55:44'),
(141, '79', 'anggota', 'Buat akun baru', '2020-03-24 18:10:07'),
(142, '80', 'anggota', 'Buat akun baru', '2020-03-25 16:37:12'),
(143, '81', 'anggota', 'Buat akun baru', '2020-04-01 01:12:57'),
(144, '82', 'anggota', 'Buat akun baru', '2020-04-01 01:14:54'),
(145, '83', 'anggota', 'Buat akun baru', '2020-04-02 13:51:16'),
(146, '84', 'anggota', 'Buat akun baru', '2020-04-02 17:18:06'),
(147, '49', 'anggota', 'Permintaan deposit [DP-0000019] senilai Rp 100.000', '2020-04-05 22:52:16'),
(148, '16', 'pengurus', 'Deposit [DP-0000019] ke MANDIRI - 152-05-5524477-7', '2020-04-05 22:54:22'),
(149, '16', 'pengurus', 'Deposit [DP-0000017] ke MANDIRI - 152-05-5524477-7', '2020-04-05 22:58:04'),
(150, '49', 'anggota', 'Membayar simpanan wajib 2 bulan senilai Rp 100.000', '2020-04-05 23:04:52'),
(151, '85', 'anggota', 'Buat akun baru', '2020-04-06 10:18:54'),
(152, '86', 'anggota', 'Buat akun baru', '2020-04-06 21:17:22'),
(153, '87', 'anggota', 'Buat akun baru', '2020-04-07 12:15:46'),
(154, '88', 'anggota', 'Buat akun baru', '2020-04-07 12:17:16'),
(155, '89', 'anggota', 'Buat akun baru', '2020-04-07 14:39:21'),
(156, '90', 'anggota', 'Buat akun baru', '2020-04-10 12:46:58'),
(157, '91', 'anggota', 'Buat akun baru', '2020-04-10 12:48:13'),
(158, '92', 'anggota', 'Buat akun baru', '2020-04-10 22:38:21'),
(159, '16', 'anggota', 'Permintaan deposit [DP-0000020] senilai Rp 10.000.000', '2020-04-13 12:07:21'),
(160, '93', 'anggota', 'Buat akun baru', '2020-04-15 15:27:21'),
(161, '94', 'anggota', 'Buat akun baru', '2020-04-25 11:45:27'),
(162, '95', 'anggota', 'Buat akun baru', '2020-04-27 15:39:26'),
(163, '96', 'anggota', 'Buat akun baru', '2020-04-28 22:49:36'),
(164, '97', 'anggota', 'Buat akun baru', '2020-04-29 08:29:09'),
(165, '98', 'anggota', 'Buat akun baru', '2020-05-03 02:46:22'),
(166, '99', 'anggota', 'Buat akun baru', '2020-05-03 02:47:07'),
(167, '100', 'anggota', 'Buat akun baru', '2020-05-03 02:47:46'),
(168, '101', 'anggota', 'Buat akun baru', '2020-05-03 02:49:11'),
(169, '102', 'anggota', 'Buat akun baru', '2020-05-03 02:52:35'),
(170, '103', 'anggota', 'Buat akun baru', '2020-05-09 03:34:11'),
(171, '104', 'anggota', 'Buat akun baru', '2020-05-10 01:18:25'),
(172, '105', 'anggota', 'Buat akun baru', '2020-05-10 01:20:27'),
(173, '106', 'anggota', 'Buat akun baru', '2020-05-10 03:01:44'),
(174, '107', 'anggota', 'Buat akun baru', '2020-05-10 03:02:38'),
(175, '108', 'anggota', 'Buat akun baru', '2020-05-13 19:07:13'),
(176, '109', 'anggota', 'Buat akun baru', '2020-05-13 19:08:26'),
(177, '110', 'anggota', 'Buat akun baru', '2020-05-19 21:57:15'),
(178, '111', 'anggota', 'Buat akun baru', '2020-05-30 17:01:39'),
(179, '112', 'anggota', 'Buat akun baru', '2020-05-31 20:57:35'),
(180, '113', 'anggota', 'Buat akun baru', '2020-06-02 04:15:15'),
(181, '114', 'anggota', 'Buat akun baru', '2020-06-03 15:33:09'),
(182, '115', 'anggota', 'Buat akun baru', '2020-06-03 15:35:09'),
(183, '116', 'anggota', 'Buat akun baru', '2020-06-04 11:49:07'),
(184, '117', 'anggota', 'Buat akun baru', '2020-06-07 01:01:18'),
(185, '118', 'anggota', 'Buat akun baru', '2020-06-13 01:03:14'),
(186, '119', 'anggota', 'Buat akun baru', '2020-06-14 16:06:03'),
(187, '120', 'anggota', 'Buat akun baru', '2020-07-07 23:54:42'),
(188, '49', 'anggota', 'Permintaan deposit [DP-0000021] senilai Rp 100.000', '2020-07-24 20:12:39'),
(189, '16', 'pengurus', 'Deposit [DP-0000021] ke MANDIRI - 152-05-5524477-7', '2020-07-24 20:24:17'),
(190, '49', 'anggota', 'Membayar simpanan wajib 2 bulan senilai Rp 100.000', '2020-07-25 20:12:10'),
(191, '121', 'anggota', 'Buat akun baru', '2020-08-28 13:59:23'),
(192, '122', 'anggota', 'Buat akun baru', '2020-08-28 14:05:47'),
(193, '123', 'anggota', 'Buat akun baru', '2020-09-03 16:34:06'),
(194, '124', 'anggota', 'Buat akun baru', '2020-09-11 00:49:53'),
(195, '125', 'anggota', 'Buat akun baru', '2020-10-13 00:01:12'),
(196, '126', 'anggota', 'Buat akun baru', '2020-10-16 01:20:51'),
(197, '127', 'anggota', 'Buat akun baru', '2020-11-04 17:25:37'),
(198, '128', 'anggota', 'Buat akun baru', '2020-11-07 02:41:56'),
(199, '129', 'anggota', 'Buat akun baru', '2020-11-08 23:11:05'),
(200, '130', 'anggota', 'Buat akun baru', '2020-11-13 04:48:52'),
(201, '131', 'anggota', 'Buat akun baru', '2020-11-13 07:53:55'),
(202, '132', 'anggota', 'Buat akun baru', '2020-11-19 08:35:39');

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

--
-- Dumping data for table `tb_simpanan_pokok`
--

INSERT INTO `tb_simpanan_pokok` (`id_simpanan`, `kode_tr`, `id_anggota`, `amount`, `date`, `is_in_saldo`) VALUES
(1, 'SP-0000001', 26, 250000, '2020-02-07 16:27:33', '0'),
(2, 'SP-0000002', 16, 250000, '2020-02-10 10:35:59', '0'),
(3, 'SP-0000003', 23, 250000, '2020-02-10 10:37:20', '0'),
(4, 'SP-0000004', 24, 250000, '2020-02-10 10:56:29', '0'),
(5, 'SP-0000005', 25, 250000, '2020-02-10 11:35:09', '0'),
(6, 'SP-0000006', 13, 250000, '2020-02-17 10:46:26', '0'),
(7, 'SP-0000007', 57, 250000, '2020-02-18 22:59:57', '0'),
(8, 'SP-0000008', 49, 250000, '2020-03-10 16:38:04', '0');

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

--
-- Dumping data for table `tb_simpanan_wajib`
--

INSERT INTO `tb_simpanan_wajib` (`id_simpanan`, `kode_tr`, `id_anggota`, `bulan_tahun`, `amount`, `date`, `is_in_saldo`) VALUES
(1, 'SW-0000001', 26, '2020-01-01', 50000, '2020-02-07 16:27:44', '0'),
(2, 'SW-0000002', 16, '2020-02-01', 50000, '2020-02-10 10:36:17', '0'),
(3, 'SW-0000003', 23, '2020-02-01', 50000, '2020-02-10 10:37:35', '0'),
(4, 'SW-0000004', 24, '2020-02-01', 50000, '2020-02-10 10:58:13', '0'),
(5, 'SW-0000005', 25, '2020-02-01', 50000, '2020-02-10 11:35:53', '0'),
(6, 'SW-0000006', 13, '2020-02-01', 50000, '2020-02-17 10:47:06', '0'),
(7, 'SW-0000007', 57, '2020-02-01', 50000, '2020-02-18 23:00:07', '0'),
(8, 'SW-0000008', 49, '2020-02-01', 50000, '2020-03-10 16:38:14', '0'),
(9, 'SW-0000009', 49, '2020-03-01', 50000, '2020-03-10 16:38:14', '0'),
(10, 'SW-0000010', 49, '2020-04-01', 50000, '2020-03-10 16:38:14', '0'),
(11, 'SW-0000011', 49, '2020-05-01', 50000, '2020-04-05 23:04:52', '0'),
(12, 'SW-0000012', 49, '2020-06-01', 50000, '2020-04-05 23:04:52', '0'),
(13, 'SW-0000013', 49, '2020-07-01', 50000, '2020-07-25 20:12:10', '0'),
(14, 'SW-0000014', 49, '2020-08-01', 50000, '2020-07-25 20:12:10', '0');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `isi_web`
--
ALTER TABLE `isi_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id_log` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

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
  MODIFY `id_reset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tb_bagi_untung`
--
ALTER TABLE `tb_bagi_untung`
  MODIFY `id_bagi_untung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_biaya_pendaftaran`
--
ALTER TABLE `tb_biaya_pendaftaran`
  MODIFY `id_biaya_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id_royalti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  MODIFY `id_deposit` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tb_report_activity`
--
ALTER TABLE `tb_report_activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

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
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_simpanan_sukarela`
--
ALTER TABLE `tb_simpanan_sukarela`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_simpanan_wajib`
--
ALTER TABLE `tb_simpanan_wajib`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
