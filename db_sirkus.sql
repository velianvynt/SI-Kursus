-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 03:10 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sirkus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id` int(11) NOT NULL,
  `id_stud` int(11) NOT NULL,
  `attend` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `id_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id`, `id_stud`, `attend`, `date`, `id_class`) VALUES
(24, 10, 'present', '2020-10-12', 4),
(26, 10, 'present', '2020-10-11', 4),
(30, 9, 'absent', '2020-10-12', 11),
(31, 10, 'absent', '2020-10-13', 4),
(33, 10, 'present', '2020-10-14', 4),
(34, 9, 'present', '2020-11-05', 11),
(36, 7, 'present', '2020-11-05', 11),
(37, 9, 'present', '2020-11-14', 11),
(38, 10, 'absent', '2020-11-14', 11),
(40, 7, 'absent', '2020-11-14', 11),
(41, 8, 'present', '2020-11-21', 7),
(42, 10, 'absent', '2020-12-02', 4),
(43, 2, 'present', '2020-12-05', 1),
(44, 8, 'absent', '2021-01-04', 7),
(45, 9, 'present', '2021-01-04', 4),
(46, 10, 'present', '2021-01-04', 4),
(47, 9, 'present', '2021-01-05', 4),
(48, 10, 'present', '2021-01-05', 4),
(49, 9, 'present', '2021-01-17', 11),
(50, 10, 'present', '2021-01-17', 11),
(51, 7, 'absent', '2021-01-17', 11),
(52, 2, 'absent', '2021-01-17', 11),
(53, 9, 'present', '2021-01-18', 11),
(54, 10, 'present', '2021-01-18', 11),
(55, 7, 'absent', '2021-01-18', 11),
(56, 2, 'absent', '2021-01-18', 11),
(57, 9, 'present', '2021-01-18', 4),
(58, 10, 'absent', '2021-01-18', 4),
(59, 7, 'present', '2021-01-18', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(11) NOT NULL,
  `class` varchar(50) NOT NULL,
  `day` varchar(15) NOT NULL,
  `time` time NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `class`, `day`, `time`, `id_teacher`) VALUES
(1, 'English A', 'Monday', '09:00:00', 1),
(4, 'Arab A', 'Monday', '13:00:00', 2),
(7, 'English C', 'Tueday', '09:00:00', 2),
(8, 'Mandarin A', 'Wednesday', '16:00:00', 5),
(11, 'English D', 'Tueday', '04:34:00', 2),
(13, 'Thailand A', 'Wednesday', '17:00:00', 2),
(14, 'German A', 'Monday', '18:30:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int(11) NOT NULL,
  `task1` int(11) NOT NULL,
  `task2` int(11) NOT NULL,
  `task3` int(11) NOT NULL,
  `test1` int(11) NOT NULL,
  `test2` int(11) NOT NULL,
  `id_stud` int(11) NOT NULL,
  `id_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id`, `task1`, `task2`, `task3`, `test1`, `test2`, `id_stud`, `id_class`) VALUES
(1, 100, 70, 60, 100, 80, 9, 11),
(2, 21, 65, 52, 100, 62, 10, 11),
(3, 56, 79, 44, 66, 67, 7, 11),
(4, 0, 0, 0, 0, 0, 2, 11),
(5, 0, 0, 0, 0, 0, 2, 1),
(6, 78, 97, 65, 87, 87, 10, 4),
(7, 0, 0, 0, 0, 0, 8, 7),
(9, 78, 10, 93, 56, 78, 9, 4),
(10, 0, 0, 0, 0, 0, 16, 14),
(11, 0, 0, 0, 0, 0, 16, 11),
(12, 0, 0, 0, 0, 0, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembagian_kelas`
--

CREATE TABLE `tb_pembagian_kelas` (
  `id` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembagian_kelas`
--

INSERT INTO `tb_pembagian_kelas` (`id`, `id_class`, `id_student`) VALUES
(12, 1, 2),
(13, 4, 10),
(15, 7, 8),
(20, 11, 9),
(21, 11, 7),
(22, 11, 10),
(23, 11, 2),
(26, 4, 9),
(27, 14, 16),
(28, 11, 16),
(29, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `school` varchar(50) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(128) NOT NULL,
  `father_name` varchar(128) NOT NULL,
  `father_occup` varchar(50) NOT NULL,
  `father_phone` varchar(15) NOT NULL,
  `mother_name` varchar(128) NOT NULL,
  `mother_occup` varchar(50) NOT NULL,
  `mother_phone` varchar(15) NOT NULL,
  `parent_add` varchar(128) NOT NULL,
  `date_of_register` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nik`, `name`, `date_of_birth`, `gender`, `school`, `address`, `phone`, `email`, `image`, `father_name`, `father_occup`, `father_phone`, `mother_name`, `mother_occup`, `mother_phone`, `parent_add`, `date_of_register`) VALUES
(2, '1771024411999999', 'Velia Noviyanti Ali', '2000-11-04', 'F', 'University of Bengkulu', 'Unib', '0827364916', 'velia@gmail.com', 'student-201122-d9e6b46563.jpg', 'Roni', 'Governour', '082736491694', 'Rena', 'Massager', '082736491694', 'Unib', '2020-08-30'),
(7, '1771024411999910', 'Silvia Sanda', '1999-04-04', 'F', 'SMAN 1 Bengkulu', 'Lingkar Barat', '0844762944', 'silvia@gmail.com', 'student-201122-be041b21f6.jpg', 'Joko', 'Dustman', '083748293744', 'Tri', 'House Wife', '083726495733', 'Lingkar Barat', '2020-10-05'),
(8, '1771024411999911', 'Rimayang Licia Arneta', '1998-04-30', 'F', 'SMAN 3 Bengkulu', 'Sawah Lebar', '08293746292', 'mayang@gmail.com', 'student-201122-1037457860.jpg', 'Budi', 'Teacher', '08293746292', 'Yeti', 'Secretary', '08293746292', 'Sawah Lebar', '2020-10-05'),
(9, '1771024411999997', 'Demia Thiani', '2000-10-23', 'F', 'University of Bengkulu', 'Jl. Semangka', '08361937452', 'demia@gmail.com', 'student-201122-c5fe17b7a8.jpg', 'Hadi', 'Farmer', '08361937452', 'Desi', 'Tailor', '8361937444', 'Jl. Semangka', '2020-10-05'),
(10, '17710244119999986', 'Dwika Januarti', '2000-03-23', 'F', 'SMKN 1 Bengkulu', 'Padang Harapan', '08273640172', 'dwika@gmail.com', 'student-201122-615299acbb.jpg', 'Fadly', 'Business Man', '08273640172', 'Lisa', 'Midwife', '08273640172', 'Padang Harapan', '2020-10-06'),
(11, '17710377294827', 'Pebry Ajhy', '2000-02-06', 'M', 'University of Bengkulu', 'Gang UNIB', '08384729176', 'ajhy@gmail.com', 'student-201219-cd9015a609.jpg', 'Budi', 'Unemployment', '08293745299', 'Susi', 'Florist', '08293745299', 'Gang unib  ', '2020-11-03'),
(12, '17719277119283628', 'Martina Setra Umbara', '1999-04-04', 'F', 'UNIB', 'Bengkulu Tengah', '0892736273622', 'tina@gmail.com', 'student-201122-c6ea07fd9b.jpg', 'Adit', 'Sailor', '08473847322', 'Katrin', 'Journalist', '', 'Bengkulu Tengah', '2020-11-22'),
(13, '2773928311029382', 'Tini A.P. Pasaribu', '2000-02-02', 'F', 'UNIB', 'Gang Melati', '08272638177', 'tini@gmail.com', 'student-201122-c940ec3829.jpg', 'Bayu', 'Governour', '02937381827', 'Desi', 'Trainer', '02937381827', 'Gang Melati', '2020-11-22'),
(14, '399381003811117', 'Roudatul Jannah', '1999-02-23', 'F', 'UNIB', 'Bumi Ayu', '08274662836', 'jannah@gmail.com', 'student-201122-da8bc789c7.jpg', '', '', '', '', '', '', '', '2020-11-22'),
(15, '377273611637272', 'Kiki Yuliani', '2000-11-17', 'F', 'UNIB', 'Jl. Semangka', '02838172626', 'kiki@gmail.com', 'student-201219-fcac695db0.jpg', '', '', '', '', '', '', '', '2020-11-22'),
(16, '1771024411047294', 'Mira Juwita', '2003-06-04', 'M', 'SHS 4', 'Salak', '089722821', 'mira@gmail.com', 'student-210104-53e232bcc4.jpg', '', '', '', '', '', '', '', '2021-01-04'),
(17, '177102663312', 'Budi Santoso', '2000-11-04', 'M', 'unib', 'unib', '123', 'budi@gmail.com', 'student-210105-c480540d4e.jpg', '', '', '', '', '', '', '', '2021-01-05'),
(18, '11133434323', 'Aji', '2000-12-05', 'M', 'unib', 'unib', '1237890', 'aji@gmail.com', 'student-210118-8db9264228.jpg', '', '', '', '', '', '', '', '2021-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE `tb_staff` (
  `id` int(11) NOT NULL,
  `nik` int(20) NOT NULL,
  `name` varchar(125) NOT NULL,
  `code` varchar(10) NOT NULL,
  `address` varchar(125) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`id`, `nik`, `name`, `code`, `address`, `phone`, `image`) VALUES
(1, 1922838443, 'Melati', 'STF001', 'Jl. Melati no. 12', '23343111', 'staff-210120-a1a609f1ac.jpg'),
(2, 343535, 'Lola', 'STF002', 'jalan raya', '438423743', 'staff-210120-01428ca0e4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teacher`
--

CREATE TABLE `tb_teacher` (
  `id` int(11) NOT NULL,
  `nik` int(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `code` varchar(10) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_teacher`
--

INSERT INTO `tb_teacher` (`id`, `nik`, `name`, `code`, `address`, `phone`, `image`) VALUES
(1, 2147483647, 'Desi', 'TCH001', 'Bengkulu \r\n', '08970028499', 'teacher-210120-ecc55a04fb.jpg'),
(2, 2147483647, 'Rika', 'TCH002', 'Bengkulu', '08970028499', 'teacher-210120-d9eca0697c.jpg'),
(5, 2147483647, 'Lala', 'TCH004', 'Jl. Semangka 5 ', '085832640806', 'teacher-210120-38d6cbc90e.jpg'),
(6, 123098, 'Cila', 'TCH005', 'Timur Indah 7', '08362947299', 'teacher-210120-f34c1c12d4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `code` varchar(10) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`code`, `username`, `password`, `role_id`) VALUES
('ADM', 'admin', 'admin', 3),
('STF001', 'melati', 'melatii', 1),
('STF002', 'lola', 'lola', 1),
('TCH001', 'desi', 'desii', 2),
('TCH002', 'rika', 'rika', 2),
('TCH004', 'lala', 'lala', 2),
('TCH005', 'cila', 'cila', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stud` (`id_stud`),
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stud` (`id_stud`),
  ADD KEY `id_class` (`id_class`);

--
-- Indexes for table `tb_pembagian_kelas`
--
ALTER TABLE `tb_pembagian_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_class` (`id_class`),
  ADD KEY `id_student` (`id_student`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `code` (`code`);

--
-- Indexes for table `tb_teacher`
--
ALTER TABLE `tb_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`code`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_pembagian_kelas`
--
ALTER TABLE `tb_pembagian_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_staff`
--
ALTER TABLE `tb_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_teacher`
--
ALTER TABLE `tb_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD CONSTRAINT `tb_absen_ibfk_1` FOREIGN KEY (`id_stud`) REFERENCES `tb_siswa` (`id`),
  ADD CONSTRAINT `tb_absen_ibfk_2` FOREIGN KEY (`id_class`) REFERENCES `tb_jadwal` (`id`);

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `tb_teacher` (`id`);

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`id_stud`) REFERENCES `tb_siswa` (`id`),
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`id_class`) REFERENCES `tb_jadwal` (`id`);

--
-- Constraints for table `tb_pembagian_kelas`
--
ALTER TABLE `tb_pembagian_kelas`
  ADD CONSTRAINT `tb_pembagian_kelas_ibfk_1` FOREIGN KEY (`id_class`) REFERENCES `tb_jadwal` (`id`),
  ADD CONSTRAINT `tb_pembagian_kelas_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `tb_siswa` (`id`);

--
-- Constraints for table `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD CONSTRAINT `tb_staff_ibfk_1` FOREIGN KEY (`code`) REFERENCES `tb_user` (`code`);

--
-- Constraints for table `tb_teacher`
--
ALTER TABLE `tb_teacher`
  ADD CONSTRAINT `tb_teacher_ibfk_1` FOREIGN KEY (`code`) REFERENCES `tb_user` (`code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
