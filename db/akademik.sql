-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2021 pada 09.14
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `Nip` varchar(12) NOT NULL,
  `Nama_Dosen` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`Nip`, `Nama_Dosen`) VALUES
('201587642609', 'Bambang Setiawan'),
('201862029026', 'Rissa Hariyanti'),
('201906247890', 'Alia Hasanah'),
('201924059500', 'Andri Saputra'),
('202030099853', 'Aulia Ulfah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nim` varchar(9) NOT NULL,
  `Nama_Mhs` varchar(25) NOT NULL,
  `Tgl_Lahir` date NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Jenis_Kelamin` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`Nim`, `Nama_Mhs`, `Tgl_Lahir`, `Alamat`, `Jenis_Kelamin`) VALUES
('13045323', 'Ahmad Maulana', '1998-07-13', 'Banjarmasin Kalimantan Selatan', 'Laki-laki'),
('13045346', 'Nimatul Izati Caem', '1996-01-02', 'Banua Kepayang', 'Perempuan'),
('13045348', 'Novian Hidayat', '1995-05-24', 'Banjarmasin', 'Laki-laki'),
('13045350', 'Taufik Rahman', '1995-07-19', 'Barabai', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `Kode_MK` varchar(6) NOT NULL,
  `Nama_MK` varchar(20) NOT NULL,
  `Sks` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`Kode_MK`, `Nama_MK`, `Sks`) VALUES
('01', 'Pemprograman Web', 6),
('02', 'Jaringan Komputer', 6),
('03', 'Desain Grafis', 12),
('04', 'Teknisi Komputer', 6),
('05', 'Pemprograman Visual ', 4),
('06', 'Struktur Data', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkuliahan`
--

CREATE TABLE `perkuliahan` (
  `Nim` varchar(9) NOT NULL,
  `Kode_MK` varchar(7) NOT NULL,
  `Nip` varchar(12) NOT NULL,
  `Nilai` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perkuliahan`
--

INSERT INTO `perkuliahan` (`Nim`, `Kode_MK`, `Nip`, `Nilai`) VALUES
('13045348', '01', '201862029026', '9'),
('13045346', '02', '201924059500', '7'),
('13045323', '06', '201906247890', '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(8, 'Taufik Rahman', 'taufikrahman', '$2y$10$T9V8vo50GmEhmSjmNrxK.OunVaRxFwsH/4/wS7OJ8/SwIp3i6pE/a', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`Nip`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`Nim`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`Kode_MK`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
