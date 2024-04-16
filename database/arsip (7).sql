-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 11:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `nama`, `email`, `username`, `password`, `role`) VALUES
(1, 'superadmin', 'superadmin@gmail.com', 'superadmin', '202cb962ac59075b964b07152d234b70', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `waktu` datetime NOT NULL,
  `file` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `nomor`, `kategori`, `tujuan`, `perihal`, `tgl_keluar`, `waktu`, `file`, `status`, `keterangan`) VALUES
(34, '005Spm-Surat Proposal Dana Ortu INSAN 2024', 'Permohonan', 'Orang Tua Mahasiswa', 'Permohonan Bantuan Dana', '2024-03-04', '2024-04-02 17:53:00', '../../pdf/pdfsk/020420241753005Spm-SuratProposalDanaOrtuINSAN2024.pdf', 'acc', ''),
(35, '006/005/SPp/DEPT-RELEKAT/INFORSA/III /2024', 'Peminjaman', 'Kepala Yayasan Jendela Langit Semesta', 'Permohonan Peminjaman Tempat', '2024-03-10', '2024-04-03 11:19:00', '../../pdf/pdfsk/030420241119006Spp_Permohonan_Peminjaman_Tempat.pdf', 'acc', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tgl_terima` date NOT NULL,
  `waktu` datetime NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `nomor`, `kategori`, `asal`, `perihal`, `tgl_terima`, `waktu`, `file`) VALUES
(2, '001/SPm/INFORSA/II/2024', 'Peminjaman', 'BEM FT', 'Permohonan Pembuatan SK', '2024-03-22', '2024-03-29 22:10:00', '../../../pdf/pdfsm/290320242210010SU-UndanganRapatKerjaINFORSA(MPKO).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `departemen`, `jabatan`, `foto`) VALUES
(13, 'Nurul Vita Azizah', 'nurul@gmail.com', 'nurulvta', '202cb962ac59075b964b07152d234b70', 'bpi', 'sekretaris umum', 'uploads/IMG_20220801_083034_875.jpg'),
(14, 'Nindy Pramudita', 'nindy@gmail.com', 'nindypr', '202cb962ac59075b964b07152d234b70', 'relekat', 'sekretaris departemen', '../../../uploads/160420241135IMG_20220714_233658.jpg'),
(21, 'Salsabila Naura', 'salsa@gmail.com', 'salsabr', '202cb962ac59075b964b07152d234b70', 'biro_inkref', 'sekretaris departemen', '../../../uploads/-6159212862195739996_121.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
