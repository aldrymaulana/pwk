-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2012 at 01:23 PM
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
(10, 'ayu', '<p>foto</p>\r\n<p><img src="../../../file/Windows-8-wallpaper21.jpg" alt="" width="200" height="200" /></p>\r\n<p>end foto</p>', '0'),
(3, 'Update Penambahan Gambar Pada Artikel', '<p>cara tambah gambar y gini...</p>\r\n<p><img src="../../../../images/images/slide3.jpg" alt="" width="495" height="329" /></p>', '0'),
(11, 'aselole', '<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../../file/Windows_8_wallpaper_11.jpg%20" alt="" width="500" height="500" /></p>', '0'),
(12, 'artikel bergambar', '<p><img src="../../../file/windows-7-fish-wallpaper.jpg" alt="" width="200" height="200" /></p>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL auto_increment,
  `nama_dosen` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bidang_ilmu` varchar(50) NOT NULL,
  `foto` varchar(150) NOT NULL,
  PRIMARY KEY  (`id_dosen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dosen`
--


-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(11) NOT NULL auto_increment,
  `nama_foto` varchar(50) NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `status_slide` int(1) NOT NULL,
  PRIMARY KEY  (`id_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `nama_foto`, `lokasi`, `status_slide`) VALUES
(11, 'Foto yang aneh', 'file/Windows_8_wallpaper_11.jpg', 1),
(10, 'foto ikan windows 8', 'file/windows-7-fish-wallpaper.jpg', 1),
(14, 'Yamaha', 'file/08J7F594932680AA.jpeg', 1),
(16, 'Foto baru', 'file/Rossis_YZR_M1_sideview.jpg', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'rofiq', '412e17dc011ab47d95f7efc264b3fb49', 1);
