-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2019 pada 16.43
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ajar`
--

CREATE TABLE `tbl_ajar` (
  `id_ajar` int(11) NOT NULL,
  `nid` varchar(10) NOT NULL,
  `kd_matkul` varchar(10) NOT NULL,
  `th_ajar` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ajar`
--

INSERT INTO `tbl_ajar` (`id_ajar`, `nid`, `kd_matkul`, `th_ajar`) VALUES
(21, '2910845568', '2026', 2019),
(22, '2910845568', '2078', 2019),
(23, '2910845566', '2231', 2019),
(24, '2910845566', '2076', 2019),
(25, '2910845566', '2029', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_hasil_ujian`
--

CREATE TABLE `tbl_detail_hasil_ujian` (
  `id_detail_hasil` int(11) NOT NULL,
  `id_hasil_ujian` int(11) NOT NULL,
  `id_detail_soal` int(11) NOT NULL,
  `id_jawaban` int(11) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_krs`
--

CREATE TABLE `tbl_detail_krs` (
  `id_detail_krs` int(11) NOT NULL,
  `id_krs` int(11) NOT NULL,
  `kd_matkul` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_krs`
--

INSERT INTO `tbl_detail_krs` (`id_detail_krs`, `id_krs`, `kd_matkul`) VALUES
(6, 3, '2029'),
(7, 3, '2026'),
(8, 5, '2029'),
(9, 5, '2026'),
(10, 6, '2029'),
(11, 6, '2026'),
(12, 7, '2076'),
(13, 7, '2078'),
(14, 9, '2076'),
(15, 9, '2078'),
(16, 10, '2076'),
(17, 10, '2078');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_soal`
--

CREATE TABLE `tbl_detail_soal` (
  `id_detail_soal` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `soal` varchar(255) NOT NULL,
  `jenis_soal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_soal`
--

INSERT INTO `tbl_detail_soal` (`id_detail_soal`, `id_soal`, `soal`, `jenis_soal`) VALUES
(8, 5, 'Activity diagram digunakan untuk menggambarkan ?', 'Pilihan Ganda'),
(10, 5, 'Collaboration diagram lebih menekankan pada ....', 'Pilihan Ganda'),
(11, 5, 'Penghubung antara boundary dengan tabel pada sequence diagram digambarkan dengan ....', 'Pilihan Ganda'),
(12, 5, 'Aktivitas pengujian fungsionalitas satuan terkecil dari sebuah perangkat lunak adalah', 'Essay'),
(13, 6, 'Konsep perencanaan dan struktur pengoperasian dasar dari suatu sistem komputer disebut dengan apa', 'Pilihan Ganda'),
(14, 6, 'Dibawah ini yang tidak termasuk contoh aspek organisasi adalah', 'Pilihan Ganda'),
(15, 6, 'Dibawah ini yang tidak termasuk 3 subkategori pada Arsitektur Komputer adalah', 'Pilihan Ganda'),
(16, 6, 'Jelaskan apakah yang dimaksud dengan Organisasi Komputer?', 'Essay'),
(18, 6, 'Jelaskan apakah yang dimaksud dengan Arsitektur Komputer!', 'Essay'),
(19, 5, 'Sebutkan contoh perspektif proses pada perankat lunak?', 'Essay'),
(20, 7, 'I and my friends … in the library. We read some books', 'Pilihan Ganda'),
(21, 7, 'She … not work because she has the flu.', 'Pilihan Ganda'),
(22, 7, 'Alina … song every night.', 'Pilihan Ganda'),
(23, 7, 'My father … tea every morning.', 'Pilihan Ganda'),
(25, 7, 'They … a test every week.', 'Pilihan Ganda'),
(26, 7, 'She is a student. She .... at school', 'Pilihan Ganda'),
(27, 7, 'My brother rides a bike to school', 'Essay'),
(29, 7, 'Where are you ?', 'Pilihan Ganda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `nid` varchar(10) NOT NULL,
  `nama_dosen` varchar(128) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp_dosen` varchar(15) NOT NULL,
  `email_dosen` varchar(100) NOT NULL,
  `alamat_dosen` varchar(255) NOT NULL,
  `foto_dosen` varchar(100) NOT NULL,
  `status_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`nid`, `nama_dosen`, `jk`, `tempat_lahir`, `tgl_lahir`, `telp_dosen`, `email_dosen`, `alamat_dosen`, `foto_dosen`, `status_dosen`) VALUES
('2910845500', 'Andi Saputra S', 'Laki-Laki', 'Cirebon', '1996-03-18', '089689665681', 'andsptraa18@gmail.com', 'Drajat 2', 'dosen.png', 'Aktif'),
('2910845566', 'Ridho Taufiq Subagyo', 'Laki-Laki', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845567', 'Lena Magdalena', 'Perempuan', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845568', 'Viar Dwi Kartika', 'Perempuan', 'Cirebon', '1993-07-21', '089689665680', 'viar@gmail.com', 'Cirebon', 'dosen.png', 'Aktif'),
('2910845569', 'Muhammad Hatta', 'Laki-Laki', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845570', 'M.Afif Sulham', 'Laki-Laki', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845571', 'Deny Martha', 'Laki-Laki', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845572', 'Petrus Sokibi', 'Laki-Laki', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845573', 'Wiwik Nurkomaladewi', 'Perempuan', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845574', 'Kusnadi', 'Laki-Laki', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845575', 'Indra Sidabutar', 'Laki-Laki', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845576', 'Yuni Awalurrohmah', 'Perempuan', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845577', 'Rinaldi Adam', 'Laki-Laki', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845578', 'Taufik Hidayat', 'Laki-Laki', 'Cirebon', '0000-00-00', '', '', 'Cirebon', 'dosen.jpg', 'Aktif'),
('2910845580', 'Marsani Asfi', 'Laki-Laki', 'Cirebon', '1970-07-12', '089689665685', 'marsani@gmail.com', 'Cirebon', 'dosen.png', 'Aktif'),
('2910845581', 'Rinaldi Adam', 'Laki-Laki', 'Cirebon', '1970-01-01', '089689665685', 'rinaldi@gmail.com', 'Cirebon', 'dosen.png', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hasil_ujian`
--

CREATE TABLE `tbl_hasil_ujian` (
  `id_hasil_ujian` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jawaban`
--

CREATE TABLE `tbl_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_detail_soal` int(11) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `nilai_jawaban` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jawaban`
--

INSERT INTO `tbl_jawaban` (`id_jawaban`, `id_detail_soal`, `jawaban`, `nilai_jawaban`) VALUES
(0, 0, 'Tidak ada jawaban', 'Salah'),
(17, 8, 'Proses Bisnis', 'Benar'),
(18, 8, 'Aktor', 'Salah'),
(19, 8, 'Data Store', 'Salah'),
(20, 8, 'Entitas', 'Salah'),
(21, 9, 'Use Case Diagram', 'Salah'),
(22, 9, 'Activity Diagram', 'Salah'),
(23, 9, 'Class Diagram', 'Salah'),
(24, 9, 'Sequence Diagram', 'Benar'),
(25, 10, 'Perilaku objek', 'Salah'),
(26, 10, 'Atribut objek', 'Salah'),
(27, 10, 'Peran masing - masing objek', 'Benar'),
(28, 10, 'Waktu penyampaian objek', 'Salah'),
(29, 11, 'An actor', 'Salah'),
(30, 11, 'Control class', 'Benar'),
(31, 11, 'Entity class', 'Salah'),
(32, 11, 'Boundary class', 'Salah'),
(34, 13, 'Organisasi Komputer', 'Salah'),
(35, 13, 'Arsitektur Komputer', 'Benar'),
(36, 13, 'Sistem Komputer', 'Salah'),
(38, 13, 'Aplikasi Komputer', 'Salah'),
(39, 14, 'Perangkat Antarmuka', 'Salah'),
(40, 14, 'Teknologi Memori', 'Salah'),
(41, 14, 'Sinyal - Sinyal Kontrol', 'Salah'),
(43, 14, 'Mekanisme Input', 'Benar'),
(44, 15, 'Set Instruksi', 'Salah'),
(45, 15, 'Arsitektur Mikro', 'Salah'),
(46, 15, 'Sistem desain seluruh komponen dalam perangkat keras komputer', 'Salah'),
(47, 15, 'Perangkat Antar Komputer', 'Benar'),
(48, 20, 'Am', 'Salah'),
(49, 20, 'Is', 'Salah'),
(50, 20, 'Have', 'Salah'),
(52, 20, 'Are', 'Benar'),
(53, 21, 'Is', 'Salah'),
(54, 21, 'Does', 'Benar'),
(55, 21, 'Do', 'Salah'),
(56, 21, 'Be', 'Salah'),
(57, 22, 'Sings', 'Benar'),
(58, 22, 'Sing', 'Salah'),
(59, 22, 'Is', 'Salah'),
(60, 22, 'Does', 'Salah'),
(61, 23, 'Drink', 'Salah'),
(62, 23, 'Drinks', 'Benar'),
(63, 23, 'Drinking', 'Salah'),
(64, 23, 'Is', 'Salah'),
(65, 25, 'Does', 'Salah'),
(66, 25, 'Has', 'Salah'),
(67, 25, 'Are', 'Salah'),
(68, 25, 'Have', 'Benar'),
(69, 26, 'Studying', 'Salah'),
(70, 26, 'Study', 'Salah'),
(71, 26, 'Studies', 'Benar'),
(72, 26, 'Does', 'Salah'),
(73, 29, 'Home', 'Benar'),
(74, 29, 'Cafe', 'Salah'),
(75, 29, 'Hospital', 'Salah'),
(76, 29, 'School', 'Salah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `th_akademik` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `id_prodi`, `id_kelas`, `semester`, `th_akademik`) VALUES
(7, 1, 1, '2', 2019),
(8, 1, 1, '4', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, 'SE - 1'),
(5, 'SCN - 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `id_krs` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `th_akademik` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_krs`
--

INSERT INTO `tbl_krs` (`id_krs`, `nim`, `id_jurusan`, `semester`, `th_akademik`) VALUES
(3, '2017142001', 8, '4', 2019),
(5, '2017142002', 8, '4', 2019),
(6, '2017142003', 8, '4', 2019),
(7, '2018142001', 7, '2', 2019),
(9, '2018142002', 7, '2', 2019),
(10, '2018142003', 7, '2', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama_mhs` varchar(125) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp_mhs` varchar(15) NOT NULL,
  `email_mhs` varchar(100) NOT NULL,
  `alamat_mhs` varchar(150) NOT NULL,
  `foto_mhs` varchar(100) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `th_masuk` year(4) NOT NULL,
  `status_mhs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `nama_mhs`, `jk`, `tempat_lahir`, `tgl_lahir`, `telp_mhs`, `email_mhs`, `alamat_mhs`, `foto_mhs`, `id_prodi`, `th_masuk`, `status_mhs`) VALUES
('2017142001', 'Ahmad Hanafi', 'Laki-Laki', 'Cirebon', '1999-01-01', '089689665661', 'ahmadhanafi@gmail.com', 'Cirebon', 'mahasiswa.jpg', 1, 2017, 'Aktif'),
('2017142002', 'Ibnu ubaidillah', 'Laki-Laki', 'Cirebon', '1999-06-15', '089689665662', 'ibnu@gmail.com', 'Cirebon', 'mahasiswa.jpg', 1, 2017, 'Aktif'),
('2017142003', 'Andre Yohanes', 'Laki-Laki', 'Cirebon', '1999-07-19', '089689665663', 'andre@gmail.com', 'Cirebon', 'mahasiswa.jpg', 1, 2017, 'Aktif'),
('2017142004', 'Irfan Mubarok', 'Laki-Laki', 'Cirebon', '1999-01-01', '089689665664', 'irfan@gmail.com', 'Cirebon', 'mahasiswa.jpg', 1, 2017, 'Aktif'),
('2018142001', 'Farhan Nurshidik', 'Laki-Laki', 'Cirebon', '2000-06-19', '089689665771', 'farhan@gmail.com', 'Cirebon', 'mahasiswa.jpg', 1, 2018, 'Aktif'),
('2018142002', 'Suryadinata', 'Laki-Laki', 'Cirebon', '2000-02-02', '089689665772', 'surya@gmail.com', 'Cirebon', 'mahasiswa.jpg', 1, 2018, 'Aktif'),
('2018142003', 'Muhamad Rizal', 'Laki-Laki', 'Cirebon', '2000-03-05', '089689665773', 'rizal@gmail.com', 'Cirebon', 'mahasiswa.jpg', 1, 2018, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matkul`
--

CREATE TABLE `tbl_matkul` (
  `kd_matkul` varchar(5) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `jumlah_sks` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_matkul`
--

INSERT INTO `tbl_matkul` (`kd_matkul`, `nama_matkul`, `jumlah_sks`) VALUES
('2007', 'Pendidikan Agama', 2),
('2016', 'Kalkulus 2', 2),
('2026', 'Bahasa Inggris 4', 2),
('2029', 'Rekayasa Perangkat Lunak 2', 3),
('2035', 'Matematika Diskrit', 3),
('2039', 'Bahasa Inggris 6', 2),
('2076', 'Arsitektur dan Organisasi Komputer', 3),
('2078', 'Bahasa Inggris 2', 2),
('2099', 'Struktur Data', 4),
('2116', 'Kewirausahaan 2', 2),
('2134', 'Tata Tulis Karya Ilmiah / Bahasa Indonesia', 2),
('2142', 'Statistika Probabilitas', 2),
('2159', 'Perancangan Basis Data', 3),
('2188', 'Proyek Teknik Informatika', 4),
('2200', 'Pemrograman Internet', 4),
('2207', 'Algoritma dan Pemrograman 2', 4),
('2225', 'Pemrograman Berorientasi Objek Lanjut', 4),
('2227', 'Teknologi Multimedia', 2),
('2229', 'Pemrograman Jaringan ', 3),
('2231', 'Keamanan Jaringan', 3),
('2232', 'Interaksi Manusia dan Komputer', 2),
('2241', 'Jaringan Komputer 1 (Konsep Jaringan)', 3),
('2247', 'Jaringan Terdistribusi', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `ketua_prodi` varchar(100) NOT NULL,
  `jenjang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `nama_prodi`, `ketua_prodi`, `jenjang`) VALUES
(1, 'Teknik Informatika', 'Ridho Taufiq Subagjo', 'Strata 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id_soal` int(11) NOT NULL,
  `nid` varchar(10) NOT NULL,
  `kd_matkul` varchar(10) NOT NULL,
  `tipe_ujian` varchar(50) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_soal`
--

INSERT INTO `tbl_soal` (`id_soal`, `nid`, `kd_matkul`, `tipe_ujian`, `tahun`) VALUES
(5, '2910845566', '2029', 'UAS', 2019),
(6, '2910845566', '2076', 'UAS', 2019),
(7, '2910845568', '2026', 'UAS', 2019),
(9, '2910845568', '2078', 'UAS', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ujian`
--

CREATE TABLE `tbl_ujian` (
  `id_ujian` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `waktu_mulai_ujian` time NOT NULL,
  `waktu_selesai_ujian` time NOT NULL,
  `token_ujian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ujian`
--

INSERT INTO `tbl_ujian` (`id_ujian`, `id_soal`, `tgl_ujian`, `waktu_mulai_ujian`, `waktu_selesai_ujian`, `token_ujian`) VALUES
(5, 5, '2019-08-22', '00:00:00', '10:30:00', 'B8D42CE6A'),
(6, 6, '2019-08-22', '13:00:00', '14:00:00', 'DEB8A624C'),
(8, 7, '2019-10-21', '21:00:00', '23:00:00', 'CA648E2DB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(150) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama_user`, `username`, `password`, `image`, `role_id`, `date_created`) VALUES
(7, 'Ridho Taufiq Subagyo', '2910845566', '$2y$10$.HDD3ZquF6OcsWpFZNZXJ.r/UgY95W5lwg.eiwxotFQ/P1tKwIRN6', 'dosen.png', 2, 1556171933),
(8, 'Marsani Asfi', '2910845580', '$2y$10$y7Eb1bbu9jVRlRgMKyYf.ekeOlJsIUf./AQMGnePzcx84o3VcbCyK', 'dosen.png', 2, 1563161998),
(9, 'Rinaldi Adam', '2910845581', '$2y$10$7gebBa764RqNMZDZnZeS0OgccMTIbZVqotOHjFFYBCIhND45HvtlG', 'dosen.png', 2, 1563162347),
(14, 'Neneng', 'neneng', '$2y$10$XkWT7mJ578TQaBNYHJU35e2lBU0eBg/Q2nssnLtBcaqryPELF.9Dq', 'baak.jpg', 1, 1565149974),
(19, 'Ahmad Hanafi', '2017142001', '2017142001', 'mahasiswa.jpg', 3, 1566399726),
(20, 'Ibnu ubaidillah', '2017142002', '2017142002', 'mahasiswa.jpg', 3, 1566399956),
(21, 'Andre Yohanes', '2017142003', '2017142003', 'mahasiswa.jpg', 3, 1566400023),
(22, 'Farhan Nurshidik', '2018142001', '2018142001', 'mahasiswa.jpg', 3, 1566404677),
(23, 'Suryadinata', '2018142002', '2018142002', 'mahasiswa.jpg', 3, 1566405188),
(24, 'Muhamad Rizal', '2018142003', '2018142003', 'mahasiswa.jpg', 3, 1566405418),
(28, 'Viar Dwi Kartika', '2910845568', '$2y$10$/lvNUXjj3Qa1CJsvyk2jlOHhAGUa/.llSiQnh0uQ/tRjpja1.PSXi', 'dosen.png', 2, 1566430107),
(29, 'Rinaldi Adam', '2910845581', '$2y$10$1LtDBWe9ob8XcuaAFa./XuMu.zKaC2i6k3jB3bHlJu21oNHvkYhR6', 'dosen.png', 2, 1566441042),
(30, 'Irfan Mubarok', '2017142004', '2017142004', 'mahasiswa.jpg', 3, 1566441145),
(31, 'Andi Saputra', '2910845500', '$2y$10$fe9RMr1Hew.znRu2doO4TeifS/87HNSLJJ1qYsOAkXKEa1f/mYAcG', 'dosen.png', 2, 1567490573);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `role_name`) VALUES
(1, 'BAAK'),
(2, 'Dosen'),
(3, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_ajar`
--
ALTER TABLE `tbl_ajar`
  ADD PRIMARY KEY (`id_ajar`);

--
-- Indeks untuk tabel `tbl_detail_hasil_ujian`
--
ALTER TABLE `tbl_detail_hasil_ujian`
  ADD PRIMARY KEY (`id_detail_hasil`);

--
-- Indeks untuk tabel `tbl_detail_krs`
--
ALTER TABLE `tbl_detail_krs`
  ADD PRIMARY KEY (`id_detail_krs`);

--
-- Indeks untuk tabel `tbl_detail_soal`
--
ALTER TABLE `tbl_detail_soal`
  ADD PRIMARY KEY (`id_detail_soal`);

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`nid`);

--
-- Indeks untuk tabel `tbl_hasil_ujian`
--
ALTER TABLE `tbl_hasil_ujian`
  ADD PRIMARY KEY (`id_hasil_ujian`);

--
-- Indeks untuk tabel `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tbl_matkul`
--
ALTER TABLE `tbl_matkul`
  ADD PRIMARY KEY (`kd_matkul`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_ajar`
--
ALTER TABLE `tbl_ajar`
  MODIFY `id_ajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_hasil_ujian`
--
ALTER TABLE `tbl_detail_hasil_ujian`
  MODIFY `id_detail_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_krs`
--
ALTER TABLE `tbl_detail_krs`
  MODIFY `id_detail_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_soal`
--
ALTER TABLE `tbl_detail_soal`
  MODIFY `id_detail_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tbl_hasil_ujian`
--
ALTER TABLE `tbl_hasil_ujian`
  MODIFY `id_hasil_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_jawaban`
--
ALTER TABLE `tbl_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  MODIFY `id_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
