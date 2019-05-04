-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2019 pada 20.27
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `createInventaris` (IN `id_inventaris` VARCHAR(6), IN `nama` VARCHAR(30), IN `kondisi` TEXT, IN `keterangan` TEXT, IN `jumlah` INT, IN `id_jenis` VARCHAR(6), IN `id_ruang` VARCHAR(6), IN `kode_inventaris` VARCHAR(100), IN `id_petugas` VARCHAR(6))  NO SQL
INSERT INTO `inventaris`(`id_inventaris`, `nama`, `kondisi`, `keterangan`, `jumlah`, `id_jenis`,`id_ruang`, `kode_inventaris`, `id_petugas`) VALUES (id_inventaris,nama,kondisi,keterangan,jumlah,id_jenis,id_ruang,kode_inventaris,id_petugas)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_inventaris` varchar(6) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail_pinjam`, `id_inventaris`, `jumlah`) VALUES
(1, 'INV001', 1),
(2, 'INV003', 1),
(4, 'INV003', 1),
(5, 'INV004', 1),
(6, 'INV004', 1),
(7, 'INV003', 1),
(8, 'INV004', 1),
(9, 'INV004', 1),
(10, 'INV003', 1),
(11, 'INV003', 1),
(12, 'INV003', 10),
(13, 'INV003', 1),
(14, 'INV003', 10),
(15, 'INV003', 10),
(16, 'INV001', 2),
(17, 'INV004', 1),
(18, 'INV003', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` varchar(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kondisi` text NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_jenis` varchar(6) NOT NULL,
  `tanggal_register` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_ruang` varchar(6) NOT NULL,
  `kode_inventaris` varchar(100) NOT NULL,
  `id_petugas` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama`, `kondisi`, `keterangan`, `jumlah`, `id_jenis`, `tanggal_register`, `id_ruang`, `kode_inventaris`, `id_petugas`) VALUES
('INV001', 'sapu', 'bagus', 'buat nyapu', 50, 'JN001', '2019-04-15 07:21:00', 'RG001', 'INV/001/2019', 'USR001'),
('INV003', 'Speaker', 'Bagus', 'untuk mendengar', 10, 'JN002', '2019-05-04 13:10:10', 'RG002', 'INV/003/2019', 'USR002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(6) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL,
  `kode_jenis` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan`) VALUES
('JN001', 'Peralatan Kebersihan', 'JN/001/2019', 'alat untuk kebersihan'),
('JN002', 'Peralatan Penting', 'JN/002/2019', 'alat yang sangat penting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` varchar(6) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
('1', 'admin'),
('2', 'operator'),
('3', 'peminjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(6) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `alamat`) VALUES
('PG001', 'dummy1', '100100002001', 'Jakarta'),
('PG002', 'dummy2', '0901919101', 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(6) NOT NULL,
  `id_detail_pinjam` int(11) NOT NULL,
  `tanggal_pinjam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_kembali` date NOT NULL,
  `status_peminjaman` int(11) NOT NULL,
  `id_pegawai` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_detail_pinjam`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `id_pegawai`) VALUES
('PM001', 1, '2019-04-19 03:16:36', '2019-04-28', 0, 'PG002'),
('PM002', 13, '2019-04-19 02:46:17', '2019-04-04', 0, 'PG001'),
('PM003', 14, '2019-04-19 03:17:50', '2019-04-27', 0, 'PG002'),
('PM004', 15, '2019-05-04 08:27:01', '2019-04-27', 0, 'PG001'),
('PM005', 16, '2019-05-04 09:59:37', '2019-05-11', 1, 'PG001'),
('PM006', 18, '2019-05-04 09:31:03', '2019-05-16', 0, 'PG002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `email`, `password`, `nama_petugas`, `remember_token`, `id_level`) VALUES
('USR001', 'admin', 'admin@gmail.com', '$2y$10$Tddhz0L7PYnGlyF5BivqT.ohBDE9VRk6ldiEUaCr3P1fSI8zWdk8y', 'admin', 'copstCosfRoiR5yddzWadPSu17wC7GIrYppkhmwCbfDuG0XgfZd1UP8DyDqb', 1),
('USR002', 'operator', '', '$2y$10$pBKU9UlEbZ9MFmp3jY94yuvX.ptpLfvpoumnE7qAyV5UX7.mkzhD6', 'operator', '60gNNThL04WhYMjc7SsA3B5WfWKXv42arZJI8cAly9NxZ4opK6tBRUYHZT7z', 2),
('USR003', 'peminjam', '', '$2y$10$7y8I6p3h5ZpATExoRw9cquwyAfBxHVuDnUmbEx8g842glP66QUHkK', 'peminjam', 'RNoQHwt9ndaLpZaD3HiQ2xsNag3yYaMuW6iRenu7D6LdMTHoEycwjFnlRrTB', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` varchar(6) NOT NULL,
  `nama_ruang` varchar(30) NOT NULL,
  `kode_ruang` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `keterangan`) VALUES
('RG001', 'Ruang Kebersihan', 'RG/001/2019', 'menyimpan alat kebersihan'),
('RG002', 'Tata Usaha', 'RG/002/2019', 'menympan alat penting');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_detail_pinjam` (`id_detail_pinjam`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `detail_pinjam_ibfk_1` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`);

--
-- Ketidakleluasaan untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`),
  ADD CONSTRAINT `inventaris_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_detail_pinjam`) REFERENCES `detail_pinjam` (`id_detail_pinjam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
