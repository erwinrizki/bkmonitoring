-- phpMyAdmin SQL Dump
-- version 4.0.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 08, 2014 at 08:25 PM
-- Server version: 5.5.33
-- PHP Version: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bkmonitor`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_bk`
--

CREATE TABLE IF NOT EXISTS `data_bk` (
  `id_bk` int(11) NOT NULL AUTO_INCREMENT,
  `NIP_bk` varchar(50) NOT NULL,
  `nama_bk` varchar(50) NOT NULL,
  `alamat_bk` varchar(100) NOT NULL,
  `tempat_lahir_bk` varchar(50) NOT NULL,
  `tanggal_lahir_bk` date NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id_bk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `data_bk`
--

INSERT INTO `data_bk` (`id_bk`, `NIP_bk`, `nama_bk`, `alamat_bk`, `tempat_lahir_bk`, `tanggal_lahir_bk`, `password`) VALUES
(1, '19610129-198403-2-004', 'Hadiri, S.Pd', 'Pati', 'Jakarta', '1958-10-22', 'hadiri'),
(2, '19610124-198403-2-004', 'Ateng, S.Pd', 'Rembang', 'Rembang', '1952-01-01', 'ateng');

-- --------------------------------------------------------

--
-- Table structure for table `data_gurumapel`
--

CREATE TABLE IF NOT EXISTS `data_gurumapel` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `NIP_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `alamat_guru` varchar(100) NOT NULL,
  `tempat_lahir_guru` varchar(50) NOT NULL,
  `tanggal_lahir_guru` date NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `data_gurumapel`
--

INSERT INTO `data_gurumapel` (`id_guru`, `NIP_guru`, `nama_guru`, `alamat_guru`, `tempat_lahir_guru`, `tanggal_lahir_guru`, `password`) VALUES
(1, '19610130-198403-2-005', 'Drs. Slamet Riyanto', 'Rembang', 'Rembang', '1960-08-17', 'potongrambut'),
(2, '19610130-198403-2-004', 'Subagyo, S.Pd', 'Rembang', 'Rembang', '1958-11-21', 'bagyo'),
(3, '19610130-198403-2-006', 'Sri Widjayanti, S.S', 'Rembang', 'Rembang', '1976-05-12', 'buyanti'),
(4, '19610130-198403-2-007', 'Dra. Hj. Sumiyatun', 'Rembang', 'Rembang', '1960-12-23', 'busum'),
(5, '19610130-198403-2-008', 'Juhadi Ali Kusrin, S.Pd', 'Rembang', 'Rembang', '1958-07-18', 'omjuhadi'),
(6, '19610130-198403-2-021', 'Aris Riyanta, S.S', 'Rembang', 'Rembang', '1965-08-10', 'pramuka');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE IF NOT EXISTS `data_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X-A'),
(2, 'X-B'),
(3, 'X-C'),
(5, 'X-D'),
(6, 'X-E'),
(7, 'X-F'),
(8, 'X-G'),
(9, 'X-H'),
(10, 'X-I'),
(11, 'XI-IPA-1'),
(12, 'XI-IPA-2'),
(13, 'XI-IPA-3'),
(14, 'XI-IPA-4'),
(15, 'XI-IPS-1'),
(16, 'XI-IPS-2'),
(17, 'XI-IPS-3'),
(18, 'XI-IPS-4'),
(19, 'XI-BHS');

-- --------------------------------------------------------

--
-- Table structure for table `data_mapel`
--

CREATE TABLE IF NOT EXISTS `data_mapel` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `kode_mapel` varchar(10) NOT NULL,
  `nama_mapel` varchar(20) NOT NULL,
  `kkm_mapel` int(10) NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `data_mapel`
--

INSERT INTO `data_mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`, `kkm_mapel`) VALUES
(1, 'UN01', 'Bahasa Indonesia', 75),
(2, 'UN02', 'Matematika', 75),
(3, 'UN03', 'Bahasa Inggris', 80);

-- --------------------------------------------------------

--
-- Table structure for table `data_mengajar`
--

CREATE TABLE IF NOT EXISTS `data_mengajar` (
  `id_ajar` int(11) NOT NULL AUTO_INCREMENT,
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  PRIMARY KEY (`id_ajar`),
  KEY `fkajarguru` (`id_guru`),
  KEY `fkajarkelas` (`id_kelas`),
  KEY `fkajarmapel` (`id_mapel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `data_mengajar`
--

INSERT INTO `data_mengajar` (`id_ajar`, `id_guru`, `id_kelas`, `id_mapel`) VALUES
(1, 1, 1, 3),
(2, 1, 5, 3),
(8, 1, 2, 3),
(9, 4, 2, 1),
(10, 5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_nilai`
--

CREATE TABLE IF NOT EXISTS `data_nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` int(10) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `fknilaisiswa` (`id_siswa`),
  KEY `fknilaimapel` (`id_mapel`),
  KEY `fknilaiguru` (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `data_nilai`
--

INSERT INTO `data_nilai` (`id_nilai`, `nilai`, `id_siswa`, `id_mapel`, `id_kelas`, `id_guru`, `semester`) VALUES
(1, 80, 4, 3, 2, 1, 1),
(2, 85, 1, 3, 2, 1, 1),
(3, 80, 5, 3, 2, 1, 1),
(4, 90, 4, 1, 2, 4, 1),
(5, 95, 1, 1, 2, 4, 1),
(6, 85, 5, 1, 2, 4, 1),
(7, 70, 4, 2, 2, 5, 1),
(8, 75, 1, 2, 2, 5, 1),
(9, 65, 5, 2, 2, 5, 1),
(13, 78, 4, 1, 2, 4, 2),
(14, 75, 1, 1, 2, 4, 2),
(15, 87, 5, 1, 2, 4, 2),
(16, 65, 4, 3, 2, 1, 2),
(17, 77, 1, 3, 2, 1, 2),
(18, 90, 5, 3, 2, 1, 2),
(19, 85, 4, 2, 2, 5, 2),
(20, 85, 1, 2, 2, 5, 2),
(21, 85, 5, 2, 2, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE IF NOT EXISTS `data_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `no_induk_siswa` varchar(25) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `alamat_siswa` varchar(100) NOT NULL,
  `tempat_lahir_siswa` varchar(25) NOT NULL,
  `tanggal_lahir_siswa` date NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `no_hp_ortu` varchar(12) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  PRIMARY KEY (`id_siswa`),
  KEY `fkkelas` (`id_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `no_induk_siswa`, `nama_siswa`, `alamat_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `nama_ortu`, `no_hp_ortu`, `id_kelas`, `semester`) VALUES
(1, '9930892876', 'Erwin Rizki Ariyanto', 'Desa Soditan RT06 RW03 no. 2 Kecamatan Lasem', 'Rembang', '1993-07-24', 'Erwin', '081915160170', 2, 2),
(2, '9930892873', 'Aan Galih Kuncara Jati', 'Rembang', 'Rembang', '1990-08-17', 'Aan', '082334123890', 1, 2),
(3, '9930892827', 'Agustina Mayasari', 'Rembang', 'Rembang', '1989-10-22', 'Maya', '085225789123', 1, 2),
(4, '9930892829', 'Azka Ghausta', 'Rembang', 'Rembang', '2000-04-08', 'Azka', '085640799233', 2, 2),
(5, '9930892281', 'Yohanes Yantari', 'Rembang', 'Rembang', '1980-10-22', 'Yantari', '085225678987', 2, 2),
(6, '9930892899', 'Steven Supaijo', 'Rembang', 'Rembang', '1999-10-30', 'Paijo', '081915170180', 1, 2),
(7, '88', 'Adi', 'Semarang', 'Semarang', '1992-08-19', 'adi', '085640799234', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_wakasiswa`
--

CREATE TABLE IF NOT EXISTS `data_wakasiswa` (
  `id_waka` int(11) NOT NULL AUTO_INCREMENT,
  `NIP_waka` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id_waka`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `data_wakasiswa`
--

INSERT INTO `data_wakasiswa` (`id_waka`, `NIP_waka`, `password`) VALUES
(1, '19610129-198444-2-004', 'wakasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `dobos`
--

CREATE TABLE IF NOT EXISTS `dobos` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dobos`
--

INSERT INTO `dobos` (`id_adm`, `username`, `password`) VALUES
(1, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b');

-- --------------------------------------------------------

--
-- Table structure for table `log_login_admin`
--

CREATE TABLE IF NOT EXISTS `log_login_admin` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `waktu_login` datetime NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `log_login_admin`
--

INSERT INTO `log_login_admin` (`id_login`, `username`, `password`, `waktu_login`) VALUES
(1, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b', '2014-07-28 16:50:49'),
(2, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b', '2014-07-29 22:46:22'),
(3, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b', '2014-07-29 23:51:54'),
(4, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b', '2014-08-27 19:02:15'),
(5, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b', '2014-09-01 11:07:56'),
(6, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b', '2014-09-08 15:05:09'),
(7, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b', '2014-09-08 15:12:41'),
(8, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b', '2014-09-08 17:58:28'),
(9, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b', '2014-09-08 18:03:17'),
(10, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b', '2014-09-08 19:13:58'),
(11, 'admin', 'dd01ec906fd0a1fe43f61f5517bc729b', '2014-09-08 19:16:32');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_mengajar`
--
ALTER TABLE `data_mengajar`
  ADD CONSTRAINT `fkajarguru` FOREIGN KEY (`id_guru`) REFERENCES `data_gurumapel` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkajarkelas` FOREIGN KEY (`id_kelas`) REFERENCES `data_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkajarmapel` FOREIGN KEY (`id_mapel`) REFERENCES `data_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_nilai`
--
ALTER TABLE `data_nilai`
  ADD CONSTRAINT `fknilaiguru` FOREIGN KEY (`id_guru`) REFERENCES `data_gurumapel` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fknilaimapel` FOREIGN KEY (`id_mapel`) REFERENCES `data_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fknilaisiswa` FOREIGN KEY (`id_siswa`) REFERENCES `data_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD CONSTRAINT `fkkelas` FOREIGN KEY (`id_kelas`) REFERENCES `data_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
