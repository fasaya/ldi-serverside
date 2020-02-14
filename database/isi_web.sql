-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2020 at 09:55 AM
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
(3, 'home_4_title1c', 'Bersama membangun ekonomi gotong royong'),
(4, 'home_4_img1', 'isi_5df060127048b5_54578535.png'),
(5, 'home_5a_judul1', 'Koperasi Digital yang'),
(6, 'home_5a_judul2', 'Tansparan'),
(7, 'home_5a_judul3', 'dan memudahkan anggota untuk mengakses segala aktivitas usaha koperasi'),
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
(87, 'pengurus_aturan', 'Aturan dan Sanksi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `isi_web`
--
ALTER TABLE `isi_web`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `isi_web`
--
ALTER TABLE `isi_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
