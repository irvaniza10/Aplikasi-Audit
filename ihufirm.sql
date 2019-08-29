-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 04:39 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ihufirm`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `audit_id` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `audit_name` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `year` int(5) NOT NULL,
  `path` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`audit_id`, `tanggal`, `audit_name`, `company`, `year`, `path`, `file_name`) VALUES
(1, '2018-07-19', 'Audit Tahunan', 'sinarmas', 2018, 'data/audit/2018/sinarmas/', 'sinarmas.xlsx'),
(2, '2019-02-05', 'Audit Tahunan', 'lippo group', 2019, 'data/audit/2019/lippo group/', 'lippo group.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `clientdata`
--

CREATE TABLE `clientdata` (
  `client_id` int(5) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientdata`
--

INSERT INTO `clientdata` (`client_id`, `company_name`, `no_hp`, `status`, `email`, `alamat`) VALUES
(1, 'sinarmas', '089645367655 (Pak A)', 'Complete', 'care@sinarmas.org', 'Sinar Mas Land Plaza Tower I, Jl. MH Thamrin No. 51, Jakarta Pusat 10350'),
(2, 'lippo group', '087759067899 (Ibu B)', 'Pre-Engagement', 'corsec@lippokarawaci.co.id', '7 Boulevard Palem Raya #22-00 Menara Matahari, Lippo Karawaci Central, Tangerang 15811, Banten - Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `staffdata`
--

CREATE TABLE `staffdata` (
  `staff_id` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pengalaman` varchar(255) NOT NULL,
  `sertifikasi` varchar(255) NOT NULL,
  `path` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffdata`
--

INSERT INTO `staffdata` (`staff_id`, `nama`, `alamat`, `no_hp`, `pendidikan`, `pengalaman`, `sertifikasi`, `path`, `file_name`) VALUES
(1, 'contoh1', 'bekasi selatan', '087786759807', 'S1 Akuntansi (2011-2015)', 'Bank Mandiri (2015-2018)', 'CPA', 'data/pegawai/contoh1/', 'contoh1.rar'),
(2, 'contoh2', 'bekasi timur', '089678342561', 'S2 Akuntansi (2015-2017)', 'Kantor Pajak', 'CPA', 'data/pegawai/contoh2/', 'contoh2.rar');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(5) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `uname`, `pass`, `foto`) VALUES
(1, 'admin', '495154450004940fcc65b4c9f74dc29c', 'logo-ihu-removebg.png'),
(2, 'tamu', 'f8829935a87192f3f9fab79856122c0f', '9gag2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `clientdata`
--
ALTER TABLE `clientdata`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `staffdata`
--
ALTER TABLE `staffdata`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `audit_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientdata`
--
ALTER TABLE `clientdata`
  MODIFY `client_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffdata`
--
ALTER TABLE `staffdata`
  MODIFY `staff_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
