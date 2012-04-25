-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2012 at 10:26 PM
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
  PRIMARY KEY  (`id_artikel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`) VALUES
(8, 'Makan', '<p>makdmaskjdklasdasndas</p>\r\n<p>asd</p>\r\n<p>asdasjdaskjdlasd</p>\r\n<p>asdasdkasdmkasdas</p>\r\n<p>asd</p>\r\n<p>asd</p>\r\n<p>as</p>\r\n<p>das</p>\r\n<p>d</p>\r\n<p>asdas</p>'),
(3, 'Update Penambahan Gambar Pada Artikel', '<p>cara tambah gambar y gini...</p>\r\n<p><img src="../../../../images/images/slide3.jpg" alt="" width="495" height="329" /></p>'),
(4, 'Rofiq Ganteng', '<p>cara tambah gambar y gini...</p>\r\n<p><img src="../../../../images/images/slide3.jpg" alt="" width="495" height="329" /></p>');

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
-- Table structure for table `foto_slide`
--

CREATE TABLE IF NOT EXISTS `foto_slide` (
  `id_foto` int(11) NOT NULL auto_increment,
  `nama_foto` varchar(50) NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  PRIMARY KEY  (`id_foto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `foto_slide`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--

