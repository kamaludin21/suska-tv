-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 07:17 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_berry`
-

-- --------------------------------------------------------

--
-- Table structure for table `infoprogram`
--

CREATE TABLE `infoprogram` (
  `id` int(11) NOT NULL,
  `program` varchar(30) NOT NULL,
  `eps` varchar(4) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `editor` varchar(50) NOT NULL,
  `kreatif` varchar(50) NOT NULL,
  `video` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infoprogram`
--

INSERT INTO `infoprogram` (`id`, `program`, `eps`, `tema`, `editor`, `kreatif`, `video`) VALUES
(1, 'Highlight', '1', 'Science Rewind', 'Akun Produksi', 'Akun Produksi', '5a57a05d83225.mkv');

-- --------------------------------------------------------

--
-- Table structure for table `jadwalproduksi`
--

CREATE TABLE `jadwalproduksi` (
  `id` int(11) NOT NULL,
  `program` varchar(30) NOT NULL,
  `kreatif` varchar(50) NOT NULL,
  `editor` varchar(50) NOT NULL,
  `tglTap` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwalproduksi`
--

INSERT INTO `jadwalproduksi` (`id`, `program`, `kreatif`, `editor`, `tglTap`, `ket`) VALUES
(3, 'Highlight', 'Kamaludin', 'Kamaludin', '2018-01-25', 'Test'),
(4, 'Highlight', 'Akun Humas', 'Akun Kru', '2018-01-28', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `kegliputan`
--

CREATE TABLE `kegliputan` (
  `id` int(11) NOT NULL,
  `acara` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `reporter` varchar(50) NOT NULL,
  `kamper` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegliputan`
--

INSERT INTO `kegliputan` (`id`, `acara`, `tanggal`, `reporter`, `kamper`) VALUES
(2, 'Acara Amal', '2018-01-31', 'Akun Produksi', 'Akun Produksi');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `program` varchar(30) NOT NULL,
  `pj` varchar(50) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `program`, `pj`, `ket`) VALUES
(3, 'Highlight', 'Akun Produksi', 'Bola');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `id` int(11) NOT NULL,
  `agenda` varchar(30) NOT NULL,
  `isu` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`id`, `agenda`, `isu`, `tgl`, `tempat`, `file`) VALUES
(2, 'Ada', 'ada', '2018-01-26', 'Ada', '5a578cc5dc8f6.txt');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nohp` varchar(14) NOT NULL,
  `kegiatan` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `nama`, `nohp`, `kegiatan`, `tgl`, `tempat`, `ket`) VALUES
(2, 'Admin', '09218236', 'Cerita', '2018-01-26', 'UIN', 'Keterangan');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `divisi` enum('admin','produksi','humas') NOT NULL,
  `tanggal` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `nama`, `divisi`, `tanggal`, `ket`) VALUES
(6, 'Akun Produksi', 'produksi', '2018-01-24', 'Cek tugas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `divisi` enum('admin','produksi','humas','kru') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` enum('lk','pr') NOT NULL,
  `tgl` date NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`, `divisi`, `nama`, `nohp`, `email`, `jk`, `tgl`, `gambar`) VALUES
(1, 'kamal', '$2y$10$KqX1UM7A9OH18iGA1OOCLOkEYBxjny/BMGeolEmaqdnesdVS2/NdG', 'Y', 'admin', 'Kamaludin', '085220278856', 'kamal.zyel@gmail.com', 'lk', '1997-06-21', 'default.png'),
(33, 'produksi', '$2y$10$s.s2GaeLWlwyOHCBrsjU0.k2DfSflw061uKPpbsJmafGkGHZfnxJ2', 'Y', 'produksi', 'Akun Produksi', '0987654321', 'akun.produksi@mail.co', 'lk', '2018-01-24', 'default.png'),
(34, 'humas', '$2y$10$JkOgaLsWpu3CJ2MZW6M2puBYGp0YZ86i2KWZVT2cxH8cj4SvlLhtm', 'Y', 'humas', 'Akun Humas', '123456789', 'humas@mail.co', 'pr', '2018-01-31', 'default.png'),
(35, 'kru123', '$2y$10$q8Q8Pv52h8Ddl.WIMPuCxOJ0nOrWgoZPZ5BAujaCQt76d0EzCAvyG', 'Y', 'kru', 'Akun Kru', '1234567890', 'Kru@mail.co', 'lk', '2018-01-10', 'default.png');

--
-- Indexes for dumped tables
--
