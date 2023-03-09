-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 02:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `sex` char(1) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_entry` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(12) NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `username`, `password`, `sex`, `telp`, `alamat`, `email`, `tgl_entry`, `role`) VALUES
(6, 'Bagus', 'bagus', 'bagus', 'L', '0827379111', 'Sarijadi, Bandung', 'bagus@gmail.com\r\n', '2022-01-19 06:10:23', 'USER'),
(7, 'Mahendra', 'mahendra', 'mahendra', 'P', '08772191811', 'Sariwangi, Bandung', 'mahendra@gmail.com', '2022-01-19 06:10:23', 'USER'),
(9, 'Putri', 'putri', 'putri', 'P', '0827191811', 'Cimahi', 'putri@gmail.com', '2022-01-19 06:10:23', 'USER'),
(11, 'Feby', 'feby', 'feby', 'P', '08991717711', 'Sukajadi, Bandung', 'feby@gmail.com\r\n', '2022-01-19 06:10:23', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `isbn` varchar(25) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `id_penerbit` varchar(8) DEFAULT NULL,
  `id_pengarang` varchar(8) DEFAULT NULL,
  `id_katalog` varchar(8) DEFAULT NULL,
  `qty_stok` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`) VALUES
('0000-987', 'KIKI', 2020, 'PN03', 'PG02', 'KG3', 88),
('002-291', 'Lancar Javascript', 2018, 'PN02', 'PG05', 'KG2', 8),
('009-281', 'Basic PHP', 2021, 'PN04', 'PG01', 'KG1', 19),
('012-098', 'QQQ', 2121, 'PN03', 'PG01', 'KG0', 1111),
('092-111', 'Belajar PHP', 2010, 'PN01', 'PG01', 'KG0', 12),
('122-122', 'MYSQL', 2020, 'PN01', 'PG07', 'KG2', 313),
('3300-987', 'KOKO', 2020, 'PN03', 'PG06', 'KG0', 4),
('377-482', 'MySQL Dasar', 2020, 'PN04', 'PG04', 'KG0', 20),
('381-561', 'Basic Vue.js', 2014, 'PN03', 'PG01', 'KG2', 5),
('774-210', 'Laravel Master', 2021, 'PN03', 'PG05', 'KG1', 7),
('774-211', 'Laravel Part 1', 2018, 'PN03', 'PG05', 'KG1', 5),
('777-380', 'Mongo DB Lanjut', 2020, 'PN01', 'PG03', 'KG2', 7),
('777-381', 'MySQL Lanjut', 2021, 'PN01', 'PG04', 'KG0', 9),
('882-191', 'Belajar CSS', 2020, 'PN03', 'PG05', 'KG0', 8),
('882-291', 'Belajar Laravel', 2020, 'PN03', 'PG05', 'KG1', 3),
('902-191', 'CSS Part 2', 2020, 'PN04', 'PG05', 'KG0', 8),
('929-181', 'Basic JQuery', 2019, NULL, 'PG05', 'KG0', 11),
('977-381', 'CSS Part 1', 2018, 'PN01', 'PG01', 'KG0', 9),
('999-281', 'Laravel Part 2', 2020, 'PN04', 'PG05', 'KG1', 11);

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` varchar(8) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES
('KG0', 'Buku Dewasa'),
('KG1', 'Buku Anak'),
('KG2', 'Buku Belajar'),
('KG3', 'Buku Belajar Agama'),
('KG4', 'Buku Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(8) NOT NULL,
  `nama_penerbit` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES
('PN01', 'Penerbit 01', 'penerbit@perpus.co.id', '0219999333', 'Surabaya'),
('PN02', 'Penerbit 02', 'penerbit2@gmail.com', '08765158111', 'Bandung'),
('PN03', 'Penerbit 03', 'penerbit3@gmail.com', NULL, 'Jakarta Barat'),
('PN04', 'Penerbit 04', 'penerbit4@gmail.com', '08972017209', 'Jakarta Selatan'),
('PN05', 'Penerbit 05', 'penerbit5@gmail.com', '08972187209', 'Jakarta Selatan'),
('PN06', 'Penerbit 06', 'penerbit6@gmail.com', '08112187209', 'Jakarta Barat');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` varchar(8) NOT NULL,
  `nama_pengarang` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `email`, `telp`, `alamat`) VALUES
('PG01', 'Pengarang 01', 'pengarang1@perpus.co.id', '0929211', 'Bandung'),
('PG02', 'Pengarang 02', 'pengarang2@perpus.co.id', '0929211222', 'Yogyakarta'),
('PG03', 'Pengarang 03', 'pengarang3@perpus.co.id', '092921199', 'Banten'),
('PG04', 'Pengarang 04', 'pengarang4@perpus.co.id', '93938199', 'Jakarta'),
('PG05', 'Pengarang 05', 'pengarang5@perpus.co.id', '93938199', 'Cimahi'),
('PG06', 'Pengarang 06', 'pengarang6@perpus.co.id', '0818176111', 'Cimahi'),
('PG07', 'Pengarang 07', 'pengarang7@perpus.co.id', '08181762291', 'Semarang');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_buku`
-- (See below for the actual view)
--
CREATE TABLE `view_buku` (
`isbn` varchar(25)
,`judul` varchar(255)
,`tahun` int(11)
,`id_penerbit` varchar(8)
,`id_pengarang` varchar(8)
,`id_katalog` varchar(3)
,`qty_stok` int(11)
,`nama_katalog` varchar(255)
,`nama_penerbit` varchar(255)
,`nama_pengarang` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_buku`
--
DROP TABLE IF EXISTS `view_buku`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_buku`  AS SELECT `buku`.`isbn` AS `isbn`, `buku`.`judul` AS `judul`, `buku`.`tahun` AS `tahun`, `buku`.`id_penerbit` AS `id_penerbit`, `buku`.`id_pengarang` AS `id_pengarang`, `buku`.`id_katalog` AS `id_katalog`, `buku`.`qty_stok` AS `qty_stok`, `katalog`.`nama` AS `nama_katalog`, `penerbit`.`nama_penerbit` AS `nama_penerbit`, `pengarang`.`nama_pengarang` AS `nama_pengarang` FROM (((`buku` left join `katalog` on(`katalog`.`id_katalog` = `buku`.`id_katalog`)) left join `penerbit` on(`penerbit`.`id_penerbit` = `buku`.`id_penerbit`)) left join `pengarang` on(`pengarang`.`id_pengarang` = `buku`.`id_pengarang`)) ORDER BY `buku`.`judul` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `penerbit` (`id_penerbit`),
  ADD KEY `pengarang` (`id_pengarang`),
  ADD KEY `katalog` (`id_katalog`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `katalog` FOREIGN KEY (`id_katalog`) REFERENCES `katalog` (`id_katalog`),
  ADD CONSTRAINT `penerbit` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`),
  ADD CONSTRAINT `pengarang` FOREIGN KEY (`id_pengarang`) REFERENCES `pengarang` (`id_pengarang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
