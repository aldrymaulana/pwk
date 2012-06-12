-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2012 at 12:24 AM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pwk`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id_artikel` int(11) NOT NULL auto_increment,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(2500) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY  (`id_artikel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `status`) VALUES
(8, 'Makan Malam', '<p>makdmaskjdklasdasndas</p>\r\n<p>asd</p>\r\n<p>asdasjdaskjdlasd</p>\r\n<p>asdasdkasdmkasdas</p>\r\n<p>asd</p>\r\n<p>asd</p>\r\n<p>as</p>\r\n<p>das</p>\r\n<p>d</p>\r\n<p>asdas</p>', '1'),
(10, 'ayu', '<p>foto</p>\r\n<p><img src="../../../file/Windows-8-wallpaper21.jpg" alt="" width="200" height="200" /></p>\r\n<p>end foto</p>', '1'),
(3, 'Update Penambahan Gambar Pada Artikel', '<h1 style="text-align: left;">Selamat pagi teman-teman</h1>\r\n<p>Salam sejahtera semua</p>', '2'),
(11, 'Berita Terbaru', '<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../../file/Windows_8_wallpaper_11.jpg%20" alt="" width="500" height="500" /></p>', '0'),
(12, 'artikel bergambar', '<p><img src="../../../file/windows-7-fish-wallpaper.jpg" alt="" width="200" height="200" /></p>', '2');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL auto_increment,
  `nama_dosen` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bidang_ilmu` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL,
  `foto` varchar(150) NOT NULL,
  PRIMARY KEY  (`id_dosen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `email`, `bidang_ilmu`, `link`, `foto`) VALUES
(3, 'Ir. Heru Purwadio, MSP.', 'heru@urplan.its.ac.id', 'Perencanaan dan Perancangan Kota', '', 'gallery/dosen/img2.jpg'),
(2, 'Dr. Ir. Nanang Setiawan, SE., MS. (Purna Tugas)', 'rekapola94@yahoo.com', 'Ilmu Fisika', 'www.its.ac.id', 'gallery/dosen/img1.jpg'),
(4, 'Dr. Ir. Rimadewi Supriharjo, MIP.', 'rimadewi54@yahoo.com', '', '', 'gallery/dosen/img3.jpg'),
(5, 'Dr. Ing. Ir. Haryo Sulistyarso', 'tenggilis44@gmail.com', '', '', 'gallery/dosen/img4.jpg'),
(6, 'Ir. Sardjito, MT.', 'sarjito@urplan.its.ac.id', '', '', 'gallery/dosen/img5.jpg'),
(7, 'Ir. Putu Rudy Setiawan, M.Sc.', 'puturudy@yahoo.com', '', '', 'gallery/dosen/img6.jpg'),
(8, 'Ir. Eko Budi Santoso, Lic.Rer.Reg.', 'eko_budi@urplan.its.ac.id', '', '', 'gallery/dosen/img7.jpg'),
(9, 'Adjie Pamungkas, ST. M.Dev.Plg.', 'a_pamungkas2000@yahoo.com', '', '', 'gallery/dosen/img8.jpg'),
(12, 'Ahmad', 'ahmad@its.ac.id', 'Perkotaan', '', 'gallery/dosen/pai.bmp');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(11) NOT NULL auto_increment,
  `nama_foto` varchar(50) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `link_deskripsi` varchar(100) NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `status_slide` int(1) NOT NULL,
  PRIMARY KEY  (`id_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `nama_foto`, `deskripsi`, `link_deskripsi`, `lokasi`, `status_slide`) VALUES
(11, 'Foto yang aneh', '', '', 'file/Windows_8_wallpaper_11.jpg', 0),
(10, 'foto ikan windows 8', '', '', 'file/windows-7-fish-wallpaper.jpg', 0),
(17, 'adasd', 'Link Google', '', 'file/nemo1.jpg', 1),
(18, 'up', '', '', 'file/up1.jpg', 0),
(14, 'Yamaha', '', '', 'file/08J7F594932680AA.jpeg', 0),
(16, 'Foto baru', '', '', 'file/Rossis_YZR_M1_sideview.jpg', 0),
(19, 'a', 'Makan', 'http://localhost/pwk/index.php/artikel/index/8', 'file/pai.bmp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'rofiq', '412e17dc011ab47d95f7efc264b3fb49', 1),
(3, 'fathur', 'da358a1216cf11bd724c0aa17441a5d2', 1);
