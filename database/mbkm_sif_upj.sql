-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 09:06 AM
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
-- Database: `mbkm.sif.upj`
--

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id_home` int(11) NOT NULL,
  `img` text NOT NULL,
  `heading` varchar(50) NOT NULL,
  `summary` text NOT NULL,
  `sptjm` text NOT NULL,
  `sr` text NOT NULL,
  `nama_penanggungjawab` varchar(50) NOT NULL,
  `no_penanggungjawab` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id_home`, `img`, `heading`, `summary`, `sptjm`, `sr`, `nama_penanggungjawab`, `no_penanggungjawab`) VALUES
(1, 'home.jpg', 'Merdeka Belajar Kampus Merdeka', 'Sistem Informasi khususnya di Universitas Pembangunan Jaya telah berusaha terus bersinergi dalam mempersiapkan lulusan yang siap terjun di dalam dunia kerja, khususnya di bidang Sistem Informasi.\r\n<br/>\r\nUntuk itu Program Merdeka Belajar yang merupakan bagian dari kebijakan Merdeka Belajar oleh Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Republik Indonesia yang memberikan kesempaatan bagi mahasiswa/i untuk mengasah kemampuan sesuai bakat dan minat dengan terjun langsung ke dunia kerja sebagai persiapan karier masa depan.', 'https://universitaspembangu286-my.sharepoint.com/:w:/g/personal/ardan_mahpudin_upj_ac_id/EfpG4v8PPC1MvMFZxYrTmGwBQvmMH0eOJnK1cdO3sXjXQw?e=Bcvz2r', 'https://universitaspembangu286-my.sharepoint.com/:w:/g/personal/ardan_mahpudin_upj_ac_id/Ebp_4i4nEklIhITg6cHHMsIBw_LT3iGB8oUNBZtv0pnrLA?e=bkTRv7', 'Agus Setiawan', '6287887883177');

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
(6, 'Magang', 'gambar mbkm-04.png', 'Magang Bersertifikat adalah bagian dari program Kampus Merdeka yang bertujuan untuk memberikan kesempatan kepada mahasiswa belajar dan mengembangkan diri melalui aktivitas di luar kelas perkuliahan. Di program Magang Bersertifikat, mahasiswa akan mendapatkan pengalaman kerja di industri/dunia profesi nyata selama 1-2 semester. Dengan pembelajaran langsung di tempat kerja mitra magang, mahasiswa akan mendapatkan hard skills maupun soft skills yang akan menyiapkan mahasiswa agar lebih mantab untuk memasuki dunia kerja dan karirnya.'),
(7, 'Studi Independen', 'gambar mbkm-03.png', 'Magang Bersertifikat adalah bagian dari program Kampus Merdeka yang bertujuan untuk memberikan kesempatan kepada mahasiswa belajar dan mengembangkan diri melalui aktivitas di luar kelas perkuliahan. Di program Magang Bersertifikat, mahasiswa akan mendapatkan pengalaman kerja di industri/dunia profesi nyata selama 1-2 semester. Dengan pembelajaran langsung di tempat kerja mitra magang, mahasiswa akan mendapatkan hard skills maupun soft skills yang akan menyiapkan mahasiswa agar lebih mantab untuk memasuki dunia kerja dan karirnya.');

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
  `status` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(35, 'Arya Wijaya', 'arya.JPG', 'SIF 2020', 'Saya Mengikuti Program Studi independen pada tahun 2021 dengan mitra AGATE Academy. Dengan mendalami Studi tentang Game Programmer dan Product Manager. Serta mendapat teman-teman baru dari berbagai daerah di Indonesia.');

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
('2020081017', 'Upj.2020081017', 'Arya Wijaya', 'student'),
('20230000', '1234', 'Dosen Dimas', 'lecturer'),
('20232023', 'admin', 'Admin', 'admin');

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
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
