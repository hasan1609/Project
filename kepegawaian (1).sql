-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2021 pada 14.54
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kepegawaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(250) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `kd_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `id_karyawan`, `tgl_absen`, `keterangan`, `kd_jabatan`) VALUES
(30, 8, '2021-06-22', 'h', 'kd03'),
(34, 9, '2021-06-23', 'h', 'kd02'),
(35, 12, '2021-06-23', 'h', 'kd02'),
(36, 15, '2021-06-23', 'h', 'kd02'),
(37, 17, '2021-06-23', 'h', 'kd02'),
(39, 8, '2021-06-23', 'h', 'kd03'),
(40, 10, '2021-06-23', 'h', 'kd03'),
(41, 11, '2021-06-23', 'h', 'kd03'),
(42, 13, '2021-06-23', 'h', 'kd03'),
(43, 14, '2021-06-23', 'h', 'kd03'),
(44, 16, '2021-06-23', 'h', 'kd03'),
(46, 18, '2021-06-23', 'h', 'kd02'),
(47, 9, '2021-06-20', 'l', 'kd02'),
(48, 12, '2021-06-20', 'l', 'kd02'),
(49, 15, '2021-06-20', 'l', 'kd02'),
(50, 17, '2021-06-20', 'l', 'kd02'),
(51, 18, '2021-06-20', 'l', 'kd02'),
(52, 8, '2021-06-13', 'l', 'kd03'),
(53, 10, '2021-06-13', 'l', 'kd03'),
(54, 11, '2021-06-13', 'l', 'kd03'),
(55, 13, '2021-06-13', 'l', 'kd03'),
(56, 14, '2021-06-13', 'l', 'kd03'),
(57, 16, '2021-06-13', 'l', 'kd03'),
(58, 8, '2021-06-06', 'l', 'kd03'),
(59, 10, '2021-06-06', 'l', 'kd03'),
(60, 11, '2021-06-06', 'l', 'kd03'),
(61, 13, '2021-06-06', 'l', 'kd03'),
(62, 14, '2021-06-06', 'l', 'kd03'),
(63, 16, '2021-06-06', 'l', 'kd03'),
(64, 8, '2021-06-06', 'l', 'kd03'),
(65, 10, '2021-06-06', 'l', 'kd03'),
(66, 11, '2021-06-06', 'l', 'kd03'),
(67, 13, '2021-06-06', 'l', 'kd03'),
(68, 14, '2021-06-06', 'l', 'kd03'),
(69, 16, '2021-06-06', 'l', 'kd03'),
(70, 8, '2021-06-20', 'l', 'kd03'),
(71, 10, '2021-06-20', 'l', 'kd03'),
(72, 11, '2021-06-20', 'l', 'kd03'),
(73, 13, '2021-06-20', 'l', 'kd03'),
(74, 14, '2021-06-20', 'l', 'kd03'),
(75, 16, '2021-06-20', 'l', 'kd03'),
(76, 9, '2021-06-13', 'l', 'kd02'),
(77, 12, '2021-06-13', 'l', 'kd02'),
(78, 15, '2021-06-13', 'l', 'kd02'),
(79, 17, '2021-06-13', 'l', 'kd02'),
(80, 18, '2021-06-13', 'l', 'kd02'),
(81, 9, '2021-06-06', 'l', 'kd02'),
(82, 12, '2021-06-06', 'l', 'kd02'),
(83, 15, '2021-06-06', 'l', 'kd02'),
(84, 17, '2021-06-06', 'l', 'kd02'),
(85, 18, '2021-06-06', 'l', 'kd02'),
(86, 9, '2021-06-25', 'h', 'kd02'),
(87, 12, '2021-06-25', 'h', 'kd02'),
(88, 15, '2021-06-25', 'h', 'kd02'),
(89, 17, '2021-06-25', 'h', 'kd02'),
(90, 18, '2021-06-25', 'h', 'kd02'),
(91, 8, '2021-06-25', 'h', 'kd03'),
(92, 10, '2021-06-25', 'h', 'kd03'),
(93, 11, '2021-06-25', 'h', 'kd03'),
(94, 13, '2021-06-25', 'h', 'kd03'),
(95, 14, '2021-06-25', 'h', 'kd03'),
(96, 16, '2021-06-25', 'h', 'kd03'),
(97, 8, '2021-06-03', 'h', 'kd02'),
(98, 9, '2021-06-03', 'h', 'kd02'),
(99, 10, '2021-06-03', 'h', 'kd02'),
(100, 11, '2021-06-03', 'h', 'kd02'),
(101, 12, '2021-06-03', 'h', 'kd02'),
(102, 13, '2021-06-03', 'h', 'kd02'),
(103, 14, '2021-06-03', 'h', 'kd02'),
(104, 15, '2021-06-03', 'h', 'kd02'),
(105, 16, '2021-06-03', 'h', 'kd02'),
(106, 17, '2021-06-03', 'h', 'kd02'),
(117, 16, '2021-06-26', 'h', 'kd03'),
(118, 9, '2021-06-26', 'i', 'kd03'),
(119, 12, '2021-06-26', 'i', 'kd03'),
(120, 15, '2021-06-26', 'h', 'kd03'),
(121, 17, '2021-06-26', 'h', 'kd03'),
(122, 18, '2021-06-26', 'i', 'kd03'),
(123, 8, '2021-06-26', 'h', 'kd03'),
(124, 10, '2021-06-26', 'h', 'kd03'),
(125, 11, '2021-06-26', 'h', 'kd03'),
(126, 13, '2021-06-26', 'h', 'kd03'),
(127, 14, '2021-06-26', 'h', 'kd03'),
(128, 16, '2021-06-26', 'h', 'kd03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `kd_jabatan` varchar(100) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`kd_jabatan`, `nama_jabatan`) VALUES
('kd02', 'Packing'),
('kd03', 'HRD'),
('kd04', 'Gudang'),
('kd05', 'Admin'),
('kd06', 'SPV');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` date NOT NULL,
  `jk` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `notlp` int(11) NOT NULL,
  `kd_jabatan` varchar(100) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `agama` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nik`, `nama`, `ttl`, `jk`, `alamat`, `notlp`, `kd_jabatan`, `tgl_pendaftaran`, `agama`, `foto`) VALUES
(8, 374637848, 'wkhdewjhdk', '2002-09-30', 'Perempuan', 'whedwjkhdkwk', 2147483647, 'kd03', '2017-09-30', 'hindu', '60d0a9c96ece3.png'),
(9, 3672637, 'wjhdjwhd', '2020-11-29', 'Perempuan', 'ekfhkejhdk', 267362763, 'kd02', '2021-12-31', 'hindu', '60d3119c365a4.png'),
(10, 3947938, 'jhdjhjd', '2015-04-03', 'Laki-laki', 'jhwdjhwj', 837483748, 'kd03', '2010-04-24', 'hindu', '60d311c91519b.png'),
(11, 2147483647, 'kwjfksj', '2017-09-29', 'Laki-laki', 'ekfjkejfkej', 2147483647, 'kd03', '2015-07-26', 'buddha', '60d311ea5805c.png'),
(12, 479374398, 'ekfhejhfkj', '2018-09-29', 'Laki-laki', 'elfjkejkjw', 83748378, 'kd02', '2018-10-28', 'buddha', '60d3122c3bcf2.png'),
(13, 83478349, 'hfkjdsfk', '2018-09-28', 'Laki-laki', 'hkehrjehj', 2147483647, 'kd03', '2017-09-29', 'buddha', '60d31253a0c7c.png'),
(14, 123493, 'fnemnfcmen', '2016-09-29', 'Laki-laki', 'efnjenfkekfm', 39493898, 'kd03', '2020-10-28', 'hindu', '60d73f016d8cc.png'),
(15, 2147483647, 'jdbcjdncvjdn', '2018-09-28', 'Laki-laki', 'ejfjefnjen', 2147483647, 'kd02', '2018-10-28', 'kristen', '60d33c063f402.png'),
(16, 2147483647, 'efhjdehfjedhn', '2017-10-28', 'Laki-laki', 'ekfnkejfkjm', 2147483647, 'kd03', '2018-09-28', 'hindu', '60d33c25b505c.png'),
(17, 3848339, 'hfjefek', '2018-10-28', 'Perempuan', 'ekjikejfk', 2147483647, 'kd02', '2019-10-29', 'konghucu', '60d33c4dbd53d.png'),
(18, 2147483647, 'hwdjhwj', '2017-09-29', 'Perempuan', 'jhejdjehfjh', 87483748, 'kd02', '2016-10-28', 'hindu', '60d42b2420c27.png'),
(19, 12345, 'namaku', '2018-09-29', 'Laki-laki', 'PASSSSS', 6476372, 'kd04', '2003-10-29', 'islam', '60d73e90b770e.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `role` enum('superadmin','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `role`) VALUES
(3, 'hasan123', 'hasan', 'hasan', 'superadmin'),
(5, 'hasanb', 'hasan', 'hasan', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kd_jabatan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
