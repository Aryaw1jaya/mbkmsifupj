-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 05:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbkm.sif.upj`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_registrasi`
-- (See below for the actual view)
--
CREATE TABLE `all_registrasi` (
`id_pendaftaran` int(11)
,`nama` varchar(40)
,`nim` varchar(20)
,`program` varchar(30)
,`semester` varchar(5)
,`no_hp` varchar(15)
,`email` varchar(40)
,`alamat` text
,`surat_rekomendasi` text
,`sptjm` text
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id_home` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `hero_section` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `nama_program` varchar(40) NOT NULL,
  `images` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `nama_program`, `images`, `deskripsi`) VALUES
(3, 'Magang', 'gambar mbkm-04.png', 'Magang Bersertifikat adalah bagian dari program Kampus Merdeka yang bertujuan untuk memberikan kesempatan kepada mahasiswa belajar dan mengembangkan diri melalui aktivitas di luar kelas perkuliahan. Di program Magang Bersertifikat, mahasiswa akan mendapatkan pengalaman kerja di industri/dunia profesi nyata selama 1-2 semester. Dengan pembelajaran langsung di tempat kerja mitra magang, mahasiswa akan mendapatkan hard skills maupun soft skills yang akan menyiapkan mahasiswa agar lebih mantab untuk memasuki dunia kerja dan karirnya.'),
(4, 'Studi Independen', 'gambar mbkm-03.png', 'Studi Independen Bersertifikat adalah bagian dari program Kampus Merdeka yang bertujuan untuk memberikan kesempatan kepada mahasiswa untuk belajar dan mengembangkan diri melalui aktivitas di luar kelas perkuliahan, namun tetap diakui sebagai bagian dari perkuliahan. Program ini diperuntukan bagi mahasiswa yang ingin memperlengkapi dirinya dengan menguasai kompetensi spesifik dan praktis yang juga dicari oleh dunia usaha dunia industri.');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `program` varchar(30) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `surat_rekomendasi` text NOT NULL,
  `sptjm` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id_pendaftaran`, `nama`, `nim`, `program`, `semester`, `no_hp`, `email`, `alamat`, `surat_rekomendasi`, `sptjm`, `status`) VALUES
(27, 'Arya Wijaya', '2020081017', 'Magang', '6', '081215327714', 'arya.wijaya@student.upj.ac.id', 'Gg. Masjid nurussalam RT 08/05 No.69', 'SR_AryaWijaya_2020081017.pdf', 'SPTJM_AryaWijaya_2020081017.pdf', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `foto` text NOT NULL,
  `prodi_angkatan` varchar(20) NOT NULL,
  `testimoni` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `foto`, `prodi_angkatan`, `testimoni`) VALUES
(7, 'Arya', 'arya.JPG', 'Sif_2020', 'Pada semester 3 saya mengikuti program MBKM yaitu Studi x Agate Academy, yang mempelajari tentang pengembangan Games dan Industrinya. Saya mendapatkan ilmu tentang menjadi Project Manager dan Games Programmer, serta situasi aslinya seperti di Industri.'),
(8, 'Richard', 'richard.jpg', 'Sif_2020', 'Saya ikut program MBKM pertukaran pelajar di USNI, senang bisa mendapatkan pengalaman baru bisa belajar di luar kampus, selain itu juga benefit nya bisa konversi SKS dan JSDP.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `level`) VALUES
('2020081017', 'upj.2020081017', 'Arya Wijaya', 'student'),
('admin', 'admin', 'admin', 'admin'),
('lecturer', 'lecturer', 'lecturer', 'lecturer'),
('student', 'student', 'student', 'student');

-- --------------------------------------------------------

--
-- Stand-in structure for view `verif_registrasi`
-- (See below for the actual view)
--
CREATE TABLE `verif_registrasi` (
`id_pendaftaran` int(11)
,`nama` varchar(40)
,`nim` varchar(20)
,`program` varchar(30)
,`semester` varchar(5)
,`no_hp` varchar(15)
,`email` varchar(40)
,`alamat` text
,`surat_rekomendasi` text
,`sptjm` text
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `all_registrasi`
--
DROP TABLE IF EXISTS `all_registrasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_registrasi`  AS SELECT `registrasi`.`id_pendaftaran` AS `id_pendaftaran`, `registrasi`.`nama` AS `nama`, `registrasi`.`nim` AS `nim`, `registrasi`.`program` AS `program`, `registrasi`.`semester` AS `semester`, `registrasi`.`no_hp` AS `no_hp`, `registrasi`.`email` AS `email`, `registrasi`.`alamat` AS `alamat`, `registrasi`.`surat_rekomendasi` AS `surat_rekomendasi`, `registrasi`.`sptjm` AS `sptjm`, `registrasi`.`status` AS `status` FROM `registrasi``registrasi`  ;

-- --------------------------------------------------------

--
-- Structure for view `verif_registrasi`
--
DROP TABLE IF EXISTS `verif_registrasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `verif_registrasi`  AS SELECT `registrasi`.`id_pendaftaran` AS `id_pendaftaran`, `registrasi`.`nama` AS `nama`, `registrasi`.`nim` AS `nim`, `registrasi`.`program` AS `program`, `registrasi`.`semester` AS `semester`, `registrasi`.`no_hp` AS `no_hp`, `registrasi`.`email` AS `email`, `registrasi`.`alamat` AS `alamat`, `registrasi`.`surat_rekomendasi` AS `surat_rekomendasi`, `registrasi`.`sptjm` AS `sptjm`, `registrasi`.`status` AS `status` FROM `registrasi` WHERE `registrasi`.`status` = 'terverifikasi''terverifikasi'  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id_home`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
