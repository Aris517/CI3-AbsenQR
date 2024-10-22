-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 07:11 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absenqr`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_siswa` int(6) NOT NULL,
  `id_kursus` int(6) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `jam` time NOT NULL DEFAULT current_timestamp(),
  `status` enum('Masuk','Pulang') NOT NULL,
  `keterangan` enum('Sakit','Izin','-') NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_siswa`, `id_kursus`, `tanggal`, `jam`, `status`, `keterangan`) VALUES
(1, 3, 2, '2024-05-28', '22:13:26', 'Masuk', '-'),
(2, 3, 2, '2024-05-28', '22:17:48', 'Pulang', '-'),
(18, 13, 4, '2024-06-28', '14:18:45', 'Masuk', '-'),
(19, 18, 4, '2024-06-28', '14:20:13', 'Masuk', '-'),
(20, 11, 4, '2024-06-28', '14:20:29', 'Masuk', '-'),
(21, 8, 4, '2024-06-28', '14:20:42', 'Masuk', '-'),
(22, 27, 4, '2024-06-28', '14:21:04', 'Masuk', '-'),
(23, 26, 4, '2024-06-28', '14:21:20', 'Masuk', '-'),
(24, 14, 4, '2024-06-28', '14:21:42', 'Masuk', '-'),
(25, 24, 4, '2024-06-28', '14:21:53', 'Masuk', '-'),
(26, 15, 4, '2024-06-28', '14:22:02', 'Masuk', '-'),
(27, 17, 4, '2024-06-28', '14:22:17', 'Masuk', '-'),
(28, 12, 4, '2024-06-28', '14:23:25', 'Masuk', '-'),
(29, 6, 4, '2024-06-28', '14:23:37', 'Masuk', '-'),
(30, 20, 4, '2024-06-28', '14:23:48', 'Masuk', '-'),
(31, 3, 4, '2024-06-28', '14:24:05', 'Masuk', '-'),
(32, 9, 4, '2024-06-28', '14:24:15', 'Masuk', '-'),
(33, 5, 4, '2024-06-28', '14:24:25', 'Masuk', '-'),
(34, 22, 4, '2024-06-28', '14:24:34', 'Masuk', '-'),
(35, 23, 4, '2024-06-28', '14:24:52', 'Masuk', '-'),
(36, 4, 4, '2024-06-28', '14:25:06', 'Masuk', '-'),
(37, 19, 4, '2024-06-28', '14:25:16', 'Masuk', '-'),
(38, 7, 4, '2024-06-28', '14:25:25', 'Masuk', '-'),
(39, 21, 4, '2024-06-28', '14:25:35', 'Masuk', '-'),
(40, 1, 4, '2024-06-28', '14:25:44', 'Masuk', '-'),
(41, 10, 4, '2024-06-28', '14:25:57', 'Masuk', '-'),
(42, 25, 4, '2024-06-28', '14:26:07', 'Masuk', '-'),
(43, 16, 4, '2024-06-28', '14:26:23', 'Masuk', '-'),
(44, 13, 4, '2024-06-28', '15:40:10', 'Pulang', '-'),
(45, 18, 4, '2024-06-28', '15:40:21', 'Pulang', '-'),
(46, 11, 4, '2024-06-28', '15:40:32', 'Pulang', '-'),
(47, 8, 4, '2024-06-28', '15:40:43', 'Pulang', '-'),
(48, 27, 4, '2024-06-28', '15:40:52', 'Pulang', '-'),
(49, 26, 4, '2024-06-28', '15:41:04', 'Pulang', '-'),
(50, 14, 4, '2024-06-28', '15:41:17', 'Pulang', '-'),
(51, 24, 4, '2024-06-28', '15:41:27', 'Pulang', '-'),
(52, 15, 4, '2024-06-28', '15:41:35', 'Pulang', '-'),
(53, 17, 4, '2024-06-28', '15:41:43', 'Pulang', '-'),
(54, 12, 4, '2024-06-28', '15:41:52', 'Pulang', '-'),
(55, 6, 4, '2024-06-28', '15:42:00', 'Pulang', '-'),
(56, 20, 4, '2024-06-28', '15:42:08', 'Pulang', '-'),
(57, 3, 4, '2024-06-28', '15:42:16', 'Pulang', '-'),
(58, 9, 4, '2024-06-28', '15:42:23', 'Pulang', '-'),
(59, 5, 4, '2024-06-28', '15:42:32', 'Pulang', '-'),
(60, 22, 4, '2024-06-28', '15:42:39', 'Pulang', '-'),
(61, 23, 4, '2024-06-28', '15:42:47', 'Pulang', '-'),
(62, 4, 4, '2024-06-28', '15:42:55', 'Pulang', '-'),
(63, 19, 4, '2024-06-28', '15:43:02', 'Pulang', '-'),
(64, 7, 4, '2024-06-28', '15:43:09', 'Pulang', '-'),
(65, 21, 4, '2024-06-28', '15:43:17', 'Pulang', '-'),
(66, 1, 4, '2024-06-28', '15:43:27', 'Pulang', '-'),
(67, 10, 4, '2024-06-28', '15:43:34', 'Pulang', '-'),
(68, 25, 4, '2024-06-28', '15:43:43', 'Pulang', '-'),
(69, 16, 4, '2024-06-28', '15:43:52', 'Pulang', '-'),
(70, 13, 4, '2024-06-29', '12:58:28', 'Masuk', '-'),
(71, 18, 4, '2024-06-29', '12:58:45', 'Masuk', '-'),
(72, 11, 4, '2024-06-29', '12:58:56', 'Masuk', '-'),
(73, 8, 4, '2024-06-29', '12:59:07', 'Masuk', '-'),
(74, 27, 4, '2024-06-29', '12:59:17', 'Masuk', '-'),
(75, 26, 4, '2024-06-29', '12:59:26', 'Masuk', '-'),
(76, 14, 4, '2024-06-29', '12:59:36', 'Masuk', '-'),
(77, 24, 4, '2024-06-29', '12:59:46', 'Masuk', '-'),
(78, 15, 4, '2024-06-29', '12:59:56', 'Masuk', '-'),
(79, 17, 4, '2024-06-29', '13:00:08', 'Masuk', '-'),
(80, 12, 4, '2024-06-29', '13:00:19', 'Masuk', '-'),
(81, 6, 4, '2024-06-29', '13:00:28', 'Masuk', '-'),
(82, 20, 4, '2024-06-29', '13:00:37', 'Masuk', '-'),
(83, 3, 4, '2024-06-29', '13:00:47', 'Masuk', '-'),
(84, 9, 4, '2024-06-29', '13:00:58', 'Masuk', '-'),
(85, 5, 4, '2024-06-29', '13:01:07', 'Masuk', '-'),
(86, 22, 4, '2024-06-29', '13:01:16', 'Masuk', '-'),
(87, 23, 4, '2024-06-29', '13:01:24', 'Masuk', '-'),
(88, 4, 4, '2024-06-29', '13:01:31', 'Masuk', '-'),
(89, 19, 4, '2024-06-29', '13:01:40', 'Masuk', '-'),
(90, 7, 4, '2024-06-29', '13:01:50', 'Masuk', '-'),
(91, 21, 4, '2024-06-29', '13:02:02', 'Masuk', '-'),
(92, 1, 4, '2024-06-29', '13:02:09', 'Masuk', '-'),
(93, 10, 4, '2024-06-29', '13:02:17', 'Masuk', '-'),
(94, 25, 4, '2024-06-29', '13:02:26', 'Masuk', '-'),
(95, 16, 4, '2024-06-29', '13:02:33', 'Masuk', '-'),
(96, 13, 4, '2024-06-29', '14:04:16', 'Pulang', '-'),
(97, 18, 4, '2024-06-29', '14:04:29', 'Pulang', '-'),
(98, 11, 4, '2024-06-29', '14:04:39', 'Pulang', '-'),
(99, 8, 4, '2024-06-29', '14:04:48', 'Pulang', '-'),
(100, 27, 4, '2024-06-29', '14:04:57', 'Pulang', '-'),
(101, 26, 4, '2024-06-29', '14:05:08', 'Pulang', '-'),
(102, 14, 4, '2024-06-29', '14:05:17', 'Pulang', '-'),
(103, 24, 4, '2024-06-29', '14:05:26', 'Pulang', '-'),
(104, 15, 4, '2024-06-29', '14:05:39', 'Pulang', '-'),
(105, 17, 4, '2024-06-29', '14:05:48', 'Pulang', '-'),
(106, 12, 4, '2024-06-29', '14:05:58', 'Pulang', '-'),
(107, 6, 4, '2024-06-29', '14:06:54', 'Pulang', '-'),
(108, 20, 4, '2024-06-29', '14:07:03', 'Pulang', '-'),
(109, 3, 4, '2024-06-29', '14:07:15', 'Pulang', '-'),
(110, 9, 4, '2024-06-29', '14:07:25', 'Pulang', '-'),
(111, 5, 4, '2024-06-29', '14:07:35', 'Pulang', '-'),
(112, 22, 4, '2024-06-29', '14:07:47', 'Pulang', '-'),
(113, 23, 4, '2024-06-29', '14:07:58', 'Pulang', '-'),
(114, 4, 4, '2024-06-29', '14:08:05', 'Pulang', '-'),
(115, 19, 4, '2024-06-29', '14:08:15', 'Pulang', '-'),
(116, 7, 4, '2024-06-29', '14:08:22', 'Pulang', '-'),
(117, 21, 4, '2024-06-29', '14:08:31', 'Pulang', '-'),
(118, 1, 4, '2024-06-29', '14:08:42', 'Pulang', '-'),
(119, 10, 4, '2024-06-29', '14:08:49', 'Pulang', '-'),
(120, 25, 4, '2024-06-29', '14:09:00', 'Pulang', '-'),
(121, 16, 4, '2024-06-29', '14:09:15', 'Pulang', '-'),
(122, 13, 4, '2024-07-02', '14:28:39', 'Masuk', '-'),
(123, 18, 4, '2024-07-02', '14:28:53', 'Masuk', '-'),
(124, 11, 4, '2024-07-02', '14:29:03', 'Masuk', '-'),
(125, 8, 4, '2024-07-02', '14:29:13', 'Masuk', '-'),
(126, 27, 4, '2024-07-02', '14:29:22', 'Masuk', '-'),
(127, 26, 4, '2024-07-02', '14:29:32', 'Masuk', '-'),
(128, 14, 4, '2024-07-02', '14:29:42', 'Masuk', '-'),
(129, 24, 4, '2024-07-02', '14:29:52', 'Masuk', '-'),
(130, 15, 4, '2024-07-02', '14:30:06', 'Masuk', '-'),
(131, 17, 4, '2024-07-02', '14:30:17', 'Masuk', '-'),
(132, 12, 4, '2024-07-02', '14:30:27', 'Masuk', '-'),
(133, 6, 4, '2024-07-02', '14:30:42', 'Masuk', '-'),
(134, 20, 4, '2024-07-02', '14:30:51', 'Masuk', '-'),
(135, 3, 4, '2024-07-02', '14:31:01', 'Masuk', '-'),
(136, 9, 4, '2024-07-02', '14:31:13', 'Masuk', '-'),
(137, 5, 4, '2024-07-02', '14:31:24', 'Masuk', '-'),
(139, 22, 4, '2024-07-02', '14:32:07', 'Masuk', '-'),
(140, 23, 4, '2024-07-02', '14:32:16', 'Masuk', '-'),
(141, 4, 4, '2024-07-02', '14:32:28', 'Masuk', '-'),
(142, 19, 4, '2024-07-02', '14:32:37', 'Masuk', '-'),
(143, 7, 4, '2024-07-02', '14:32:47', 'Masuk', '-'),
(144, 21, 4, '2024-07-02', '14:33:00', 'Masuk', '-'),
(145, 1, 4, '2024-07-02', '14:33:11', 'Masuk', '-'),
(146, 10, 4, '2024-07-02', '14:33:19', 'Masuk', '-'),
(147, 25, 4, '2024-07-02', '14:33:28', 'Masuk', '-'),
(148, 16, 4, '2024-07-02', '14:33:38', 'Masuk', '-'),
(149, 13, 4, '2024-07-02', '15:50:19', 'Pulang', '-'),
(150, 18, 4, '2024-07-02', '15:50:31', 'Pulang', '-'),
(151, 11, 4, '2024-07-02', '15:50:40', 'Pulang', '-'),
(152, 8, 4, '2024-07-02', '15:50:48', 'Pulang', '-'),
(153, 27, 4, '2024-07-02', '15:50:56', 'Pulang', '-'),
(154, 26, 4, '2024-07-02', '15:51:05', 'Pulang', '-'),
(155, 14, 4, '2024-07-02', '15:51:13', 'Pulang', '-'),
(156, 24, 4, '2024-07-02', '15:51:23', 'Pulang', '-'),
(157, 15, 4, '2024-07-02', '15:51:32', 'Pulang', '-'),
(158, 17, 4, '2024-07-02', '15:51:41', 'Pulang', '-'),
(159, 12, 4, '2024-07-02', '15:51:52', 'Pulang', '-'),
(160, 6, 4, '2024-07-02', '15:52:02', 'Pulang', '-'),
(161, 20, 4, '2024-07-02', '15:52:11', 'Pulang', '-'),
(162, 3, 4, '2024-07-02', '15:52:20', 'Pulang', '-'),
(163, 9, 4, '2024-07-02', '15:52:30', 'Pulang', '-'),
(164, 5, 4, '2024-07-02', '15:52:40', 'Pulang', '-'),
(165, 22, 4, '2024-07-02', '15:52:48', 'Pulang', '-'),
(166, 23, 4, '2024-07-02', '15:52:56', 'Pulang', '-'),
(167, 4, 4, '2024-07-02', '15:53:06', 'Pulang', '-'),
(168, 19, 4, '2024-07-02', '15:53:16', 'Pulang', '-'),
(169, 7, 4, '2024-07-02', '15:53:24', 'Pulang', '-'),
(170, 21, 4, '2024-07-02', '15:53:34', 'Pulang', '-'),
(171, 1, 4, '2024-07-02', '15:53:47', 'Pulang', '-'),
(172, 10, 4, '2024-07-02', '15:53:55', 'Pulang', '-'),
(173, 25, 4, '2024-07-02', '15:54:04', 'Pulang', '-'),
(174, 16, 4, '2024-07-02', '15:54:14', 'Pulang', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(6) NOT NULL,
  `kursus` varchar(15) NOT NULL,
  `id_pengajar` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `kursus`, `id_pengajar`) VALUES
(4, 'tata rias', 4),
(5, 'Hantaran', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(3) NOT NULL,
  `id_user` int(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `id_user`, `nama`, `alamat`, `no_hp`, `jk`) VALUES
(4, 5, 'Ertin Nining', 'Pagongan', '089531931333', 'Perempuan'),
(5, 6, 'Rusitoh', 'Debong Kidul', '085640317714', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `id_qrcode` int(6) NOT NULL,
  `id_siswa` int(6) NOT NULL,
  `file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`id_qrcode`, `id_siswa`, `file`) VALUES
(2, 3, '33333238313435323035303030303035.png'),
(3, 1, '33333736303235353035303130303034.png'),
(4, 4, '33333239303836383034303230303033.png'),
(5, 5, '33333238313534363037303530303036.png'),
(6, 6, '33333238313335323132303430303031.png'),
(7, 7, '33333736303137303031393830303031.png'),
(8, 8, '33333238303736353035303630303130.png'),
(9, 9, '33333238313534313037303230303831.png'),
(10, 10, '33333736303336343032303430303032.png'),
(11, 11, '33333238313136313130393930303033.png'),
(12, 12, '33333238313335363130303130303031.png'),
(13, 13, '33333237303935383130393930303138.png'),
(14, 14, '33333238313234343039393930303031.png'),
(15, 15, '33333238313334343039303230303032.png'),
(16, 16, '33363733303635383038303130303033.png'),
(17, 17, '33333238313235383132303030303031.png'),
(18, 18, '33333237303831333038393930313032.png'),
(19, 19, '33333736303134343031303430303031.png'),
(20, 20, '33333238313335323033303230303035.png'),
(21, 21, '33333736303234313131303230303031.png'),
(22, 22, '33333238313536333034393830303034.png'),
(23, 23, '33333238313735313038303530303032.png'),
(24, 24, '33333238313137313132303030303132.png'),
(25, 25, '33353037303135353034303230303032.png'),
(26, 26, '33333238313234353130303030303031.png'),
(27, 27, '33333238303332313033303630303035.png');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(6) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nik`, `nama`, `alamat`, `no_hp`, `jk`, `kelas`) VALUES
(1, '3376025505010004', 'Cahyani', 'Sidapurna, RT. 019/003, Dukuhturi, Kab. Tegal', '081995000887', 'Perempuan', 'tata rias'),
(3, '3328145205000005', 'Binta Arifah', 'Jl. Anggrek RT. 003/001, Kejambon, Kota Tegal ', '088802849575', 'Perempuan', 'tata rias'),
(4, '3329086804020003', 'Azmi Nurfaizah', 'Jl. KH. Samanhudi, RT. 005/005, Debong Tengah, Kota Tegal', '089647821006', 'Perempuan', 'tata rias'),
(5, '3328154607050006', 'Anis Mulyana', 'Ds, Tanjungharja, Dk. Tanjung baru RT. 002/007, Kramat, Kab. Tegal', '087868074306', 'Perempuan', 'tata rias'),
(6, '3328135212040001', 'Ayu Fauziah', 'Desa Penarukan, RT. 001/001, Adiwerna, Kab. Tegal', '088227382780', 'Perempuan', 'tata rias'),
(7, '3376017001980001', 'Diah Ayu Astimah', 'Jl. Bawal Manunggal No. 7, Tegalsari, Kota Tegal', '088215158095', 'Perempuan', 'tata rias'),
(8, '3328076505060010', 'Fatimah Azzahra', 'Dk. Bangsa RT. 02/04', '085879432522', 'Perempuan', 'tata rias'),
(9, '3328154107020081', 'Himatul Aliyah', 'Debong Tengah, RT. 001/002, Tegal Selatan, Kota Tegal', '085640005670', 'Perempuan', 'tata rias'),
(10, '3376036402040002', 'Indah Febriyanti', 'Tegalwangi, RT. 016/005, Talang, Kab. Tegal', '0882006316252', 'Perempuan', 'tata rias'),
(11, '3328116110990003', 'Indina Afifah Fawajabah', 'Pagiyanten, RT. 012/003, Adiwerna, Kab. Tegal', '089525235605', 'Perempuan', 'tata rias'),
(12, '3328135610010001', 'Inna Sakinah', 'Pesayangan RT. RT. 012/003, Talang, Kab. Tegal', '082135999365', 'Perempuan', 'tata rias'),
(13, '3327095810990018', 'Intan Ciasih', 'Desa Kendalserut, Pangkah, Kab. Tegal', '085800204457', 'Perempuan', 'tata rias'),
(14, '3328124409990001', 'Izzatul Azmi', 'Harjosari Kidul, RT. 022/005, Adiwerna, Kab. Tegal', '085290542191', 'Perempuan', 'tata rias'),
(15, '3328134409020002', 'Jannatul Anggreani', 'Dawuhan, RT. 021/006, Talang, Kab. Tegal', '085867716807', 'Perempuan', 'tata rias'),
(16, '3673065808010003', 'Karlina Hamsyah', 'Kaligangsa RT. 003/002, Margadana, Kota Tegal', '089509077095', 'Perempuan', 'tata rias'),
(17, '3328125812000001', 'Laelatul Azizatun', 'Jl. Cendrawasih Gang 13, RT. 005/005, Randugunting, Kota Tegal', '085727050524', 'Perempuan', 'tata rias'),
(18, '3327081308990102', 'Mustofa', 'Dusun Catur, RT. 003/004, Tambakrejo, Kab. Pemalang', '0895392054562', 'Laki-Laki', 'tata rias'),
(19, '3376014401040001', 'Mutiara Atikha Salsabila', 'Desa Pacul, Talang, Kab. Tegal', '087895148807', 'Perempuan', 'tata rias'),
(20, '3328135203020005', 'Nisa Arifiani', 'Jl. Haji Mansyur, RT. 006/001, Kec. Dukuhturi, Kab. Tegal', '087840122111', 'Perempuan', 'tata rias'),
(21, '3376024111020001', 'Nur Riski Khoirunnisa', 'Ds, Sutapranan RT. 004/001, Dukuhturi, Kab. Tegal', '0895332358160', 'Perempuan', 'tata rias'),
(22, '3328156304980004', 'Sapuroh', 'Mejasem Timur, RT. 005/006, Kramat, Kab. Tegal', '08986561535', 'Perempuan', 'tata rias'),
(23, '3328175108050002', 'Selma Helida', 'Demangharjo, RT. 006/001, Warureja, Kab. Tegal', '085740067277', 'Perempuan', 'tata rias'),
(24, '3328117112000012', 'Sinta Nuriyah', 'Lebeteng, RT. 001/001, Tarub, Kab. Tegal', '085876399767', 'Perempuan', 'tata rias'),
(25, '3507015504020002', 'Sofy Apriliyani', 'Jl. Bawal Barat, RT. 006/031, Tegalsari, Kota Tegal ', '085747069242', 'Perempuan', 'tata rias'),
(26, '3328124510000001', 'Sri Mulyani Sejati', 'Ds. Pegirikan, RT. 013/004, Talang, Kab. Tegal', '083873603189', 'Perempuan', 'tata rias'),
(27, '3328032103060005', 'Vidy Dwi Hasny S', 'Lengkong Permata RT. 004/001, Bojong, Kab. Tegal', '082314989878', 'Perempuan', 'tata rias');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `role` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'Admin', '$2y$10$rSOQ7jey.xrLVrExfqhEJu4ZmI564u8yRhD2IPYYyyKBtkKy.Nx4u', '1'),
(5, 'tatarias', '$2y$10$g2NuBCSlkcOejfPKDXseo.VGmJIMmwJYStj94.Vxg5NCvqwZJnBHu', '2'),
(6, 'hantaran', '$2y$10$rk/3H0rGXUP4wmnw.FKsDOWo2OPN4pw3.kp6xox179wk100bdEv9G', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_kursus` (`id_kursus`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`),
  ADD KEY `id_pengajar` (`id_pengajar`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id_qrcode`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id_qrcode` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
