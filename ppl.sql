-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2022 pada 02.28
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nip_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `kode_wali` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip_dosen`, `nama_dosen`, `kode_wali`) VALUES
('23112312', 'Rachmad Akbar Ramadan', '23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `irs`
--

CREATE TABLE `irs` (
  `nim` bigint(120) NOT NULL,
  `semester_mhs` int(2) NOT NULL,
  `sks` int(2) NOT NULL,
  `status_irs` int(20) NOT NULL,
  `berkas_irs` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `irs`
--

INSERT INTO `irs` (`nim`, `semester_mhs`, `sks`, `status_irs`, `berkas_irs`) VALUES
(24060120120018, 2, 23, 0, ''),
(24060120120025, 3, 62, 0, ''),
(24060120120017, 5, 72, 0, ''),
(24060120120019, 7, 140, 0, ''),
(24060120120020, 2, 44, 0, ''),
(24060120120021, 3, 61, 1, ''),
(24060120120022, 8, 132, 0, ''),
(24060120120023, 5, 92, 0, ''),
(24060120120024, 4, 88, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabkota`
--

CREATE TABLE `kabkota` (
  `kode_kabkota` varchar(5) NOT NULL,
  `nama_kabkota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `khs`
--

CREATE TABLE `khs` (
  `nim_mhs` bigint(20) NOT NULL,
  `semester_mhs` int(11) NOT NULL,
  `sks_semester` int(11) NOT NULL,
  `ip_semester` float NOT NULL,
  `ip_kumulatif` float NOT NULL,
  `berkas_khs` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `khs`
--

INSERT INTO `khs` (`nim_mhs`, `semester_mhs`, `sks_semester`, `ip_semester`, `ip_kumulatif`, `berkas_khs`) VALUES
(24060120120017, 2, 32, 3, 4, ''),
(24060120120018, 5, 40, 3.8, 3.1, ''),
(24060120120019, 5, 99, 3.5, 3.7, ''),
(24060120120020, 5, 98, 3.7, 3.8, ''),
(24060120120021, 7, 138, 3.6, 3.5, ''),
(24060120120022, 8, 130, 3.1, 3.3, ''),
(24060120120023, 8, 135, 3.4, 3.5, ''),
(24060120120024, 4, 88, 3.4, 3.6, ''),
(24060120120025, 2, 40, 3.5, 3.55, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` bigint(200) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `no_hp_mhs` varchar(15) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `jalur_masuk` varchar(10) NOT NULL,
  `email_mhs` varchar(50) NOT NULL,
  `password_mhs` varchar(20) NOT NULL,
  `alamat_mhs` varchar(100) NOT NULL,
  `status_mhs` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `nama_mhs`, `no_hp_mhs`, `angkatan`, `jalur_masuk`, `email_mhs`, `password_mhs`, `alamat_mhs`, `status_mhs`) VALUES
(24060120120017, 'Fedro Bossini', '08282719219', '2022', 'UM', 'fedro@mahasiswa.com', '12345', 'Medan', 'aktif'),
(24060120120018, 'Fadhil', '', '2020', '', 'fadhil@mahasiswa.com', 'fadhildong', '', 'cuti'),
(24060120120019, 'Isa', '', '2017', '', 'isa@mahasiswa.com', '12345', '', 'aktif'),
(24060120120020, 'Faris', '', '2022', '', 'faris@mahasiswa.com', '12345', '', 'aktif'),
(24060120120021, 'Zeri', '', '2021', '', 'zeri@mahasiswa.com', 'zeriasoy', '', 'cuti'),
(24060120120022, 'Adril', '', '2016', '', 'adril@mahasiswa.com', '12345', '', 'aktif'),
(24060120120023, 'Ega', '', '2019', '', 'ega@mahasiswa.com', '12345', '', 'cuti'),
(24060120120024, 'Rafly', '', '2018', '', 'rafly@mahasiswa.com', '12345', '', 'aktif'),
(24060120120025, 'Adan', '08123849102912', '2020', 'SNMPTN', 'adan@mahasiswa.com', 'adanyoi', 'Pati', 'cuti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkl`
--

CREATE TABLE `pkl` (
  `nim_mhs` varchar(20) NOT NULL,
  `status_pkl` varchar(20) NOT NULL,
  `nilai_pkl` varchar(1) NOT NULL,
  `ba_pkl` varchar(102) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pkl`
--

INSERT INTO `pkl` (`nim_mhs`, `status_pkl`, `nilai_pkl`, `ba_pkl`) VALUES
('24060120120017', 'Lulus', 'A', ''),
('24060120120018', 'Belum Lulus', '-', ''),
('24060120120019', 'Belum PKL', '-', ''),
('24060120120020', 'Lulus', 'B', ''),
('24060120120021', 'Belum PKL', '-', ''),
('24060120120022', 'Belum Lulus', '-', ''),
('24060120120023', 'Belum Lulus', '-', ''),
('24060120120024', 'Lulus', 'B', ''),
('24060120120025', 'Lulus', 'A', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `kode_prov` varchar(5) NOT NULL,
  `nama_prov` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `nim_mhs` bigint(200) NOT NULL,
  `status_skripsi` varchar(20) NOT NULL,
  `nilai_skripsi` char(1) DEFAULT NULL,
  `lama_belajar` int(11) DEFAULT NULL,
  `tanggal_sidang` date DEFAULT NULL,
  `ba_skripsi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`nim_mhs`, `status_skripsi`, `nilai_skripsi`, `lama_belajar`, `tanggal_sidang`, `ba_skripsi`) VALUES
(24060120120017, 'Lulus', 'B', 2, '2022-10-11', ''),
(24060120120018, 'Belum Lulus', NULL, NULL, NULL, NULL),
(24060120120019, 'Belum Skripsi', NULL, NULL, NULL, NULL),
(24060120120020, 'Lulus', 'B', 2, '2022-10-06', NULL),
(24060120120021, 'Belum Skripsi', NULL, NULL, NULL, NULL),
(24060120120022, 'Lulus', 'B', 1, '2022-10-17', NULL),
(24060120120023, 'Lulus', 'B', 2, '2022-10-24', NULL),
(24060120120024, 'Lulus', 'A', 1, '2022-10-05', NULL),
(24060120120025, 'Lulus', 'B', 2, '2022-10-19', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `nama_user`) VALUES
(1, 'idham@operator.com', 'operator1', 'operator', 'Idham Multazam'),
(2, 'adan@dosen.com', 'dosen1', 'dosen', 'Adan Ramadhan'),
(4, 'rafly@departemen.com', 'departemen1', 'departemen', 'Rafly Yanuar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip_dosen`);

--
-- Indeks untuk tabel `irs`
--
ALTER TABLE `irs`
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `kabkota`
--
ALTER TABLE `kabkota`
  ADD PRIMARY KEY (`kode_kabkota`);

--
-- Indeks untuk tabel `khs`
--
ALTER TABLE `khs`
  ADD KEY `nim_mhs` (`nim_mhs`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD UNIQUE KEY `NIM` (`NIM`);

--
-- Indeks untuk tabel `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`nim_mhs`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD UNIQUE KEY `nim_mhs` (`nim_mhs`),
  ADD KEY `nim_mhs_2` (`nim_mhs`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `irs`
--
ALTER TABLE `irs`
  ADD CONSTRAINT `nim_fk` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`NIM`);

--
-- Ketidakleluasaan untuk tabel `khs`
--
ALTER TABLE `khs`
  ADD CONSTRAINT `fk_nim` FOREIGN KEY (`nim_mhs`) REFERENCES `mahasiswa` (`NIM`);

--
-- Ketidakleluasaan untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `nim_fkfk` FOREIGN KEY (`nim_mhs`) REFERENCES `mahasiswa` (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
