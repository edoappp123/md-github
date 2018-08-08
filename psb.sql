-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 08, 2018 at 03:19 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '19aaea98cb3c2b4ffafeacc805a7001c', '2018-08-08 13:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE IF NOT EXISTS `pendaftar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(100) NOT NULL,
  `Nik` int(11) NOT NULL DEFAULT '1',
  `Hp` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Email` text NOT NULL,
  `Skema_Sertf` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Tempat_uji_kmp` varchar(100) NOT NULL,
  `rekomend` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Tgl_terbit` date NOT NULL,
  `Tgl_lahir` date NOT NULL,
  `Org` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `Nama`, `Nik`, `Hp`, `Email`, `Skema_Sertf`, `Tempat_uji_kmp`, `rekomend`, `Tgl_terbit`, `Tgl_lahir`, `Org`) VALUES
(1, 'Edo Parulian', 2147483647, '08521021718', 'edo@gmail.com', 'PEMROGRAMAN MADYA', 'JAMBI', 'SOCIAL MEDIA', '2018-08-08', '2018-08-08', 'STMIK NH JAMBI'),
(2, 'Edo Ambarita', 2147483647, '08521021718', 'edo1@gmail.com', 'PEMROGRAMAN MADYA', 'JAMBI', 'SOCIAL MEDIA', '2018-08-08', '2018-08-08', 'STMIK NH JAMBI');
