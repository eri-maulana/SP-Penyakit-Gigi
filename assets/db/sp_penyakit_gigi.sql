-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Nov 2024 pada 05.53
-- Versi server: 8.0.30
-- Versi PHP: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_penyakit_gigi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `basis_aturan`
--

CREATE TABLE `basis_aturan` (
  `idaturan` int NOT NULL,
  `idpenyakit` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `basis_aturan`
--

INSERT INTO `basis_aturan` (`idaturan`, `idpenyakit`) VALUES
(1, 19),
(2, 20),
(3, 22),
(4, 23),
(5, 24),
(6, 25),
(7, 26),
(8, 27),
(9, 28),
(10, 29),
(11, 30),
(12, 31),
(13, 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_basis_aturan`
--

CREATE TABLE `detail_basis_aturan` (
  `idaturan` int DEFAULT NULL,
  `idgejala` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `detail_basis_aturan`
--

INSERT INTO `detail_basis_aturan` (`idaturan`, `idgejala`) VALUES
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 52),
(1, 40),
(1, 41),
(1, 53),
(1, 54),
(1, 59),
(1, 42),
(1, 43),
(1, 44),
(2, 36),
(2, 37),
(2, 38),
(2, 52),
(2, 45),
(2, 46),
(2, 47),
(3, 36),
(3, 51),
(3, 40),
(3, 54),
(3, 66),
(3, 67),
(4, 36),
(4, 51),
(4, 52),
(4, 54),
(4, 77),
(5, 36),
(5, 37),
(5, 64),
(5, 39),
(5, 56),
(5, 57),
(6, 36),
(6, 38),
(6, 51),
(6, 40),
(6, 54),
(6, 55),
(6, 68),
(6, 69),
(6, 70),
(7, 36),
(7, 37),
(7, 64),
(7, 51),
(7, 60),
(7, 61),
(7, 62),
(7, 63),
(7, 72),
(8, 36),
(8, 37),
(8, 38),
(8, 51),
(8, 41),
(8, 53),
(8, 55),
(8, 79),
(8, 80),
(8, 81),
(8, 82),
(9, 36),
(9, 37),
(9, 38),
(9, 51),
(9, 70),
(9, 75),
(9, 78),
(10, 36),
(10, 37),
(10, 64),
(10, 51),
(10, 65),
(10, 72),
(11, 36),
(11, 37),
(11, 64),
(11, 51),
(11, 58),
(12, 36),
(12, 54),
(12, 71),
(12, 72),
(12, 73),
(12, 74),
(13, 36),
(13, 54),
(13, 71),
(13, 75),
(13, 76);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `idkonsultasi` int DEFAULT NULL,
  `idgejala` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `detail_konsultasi`
--

INSERT INTO `detail_konsultasi` (`idkonsultasi`, `idgejala`) VALUES
(1, 36),
(1, 64),
(1, 40),
(1, 54),
(1, 57),
(1, 61),
(1, 62),
(1, 69),
(1, 76),
(1, 81);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `idkonsultasi` int DEFAULT NULL,
  `idpenyakit` int DEFAULT NULL,
  `persentase` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `detail_penyakit`
--

INSERT INTO `detail_penyakit` (`idkonsultasi`, `idpenyakit`, `persentase`) VALUES
(1, 19, 23),
(1, 20, 14),
(1, 22, 50),
(1, 23, 40),
(1, 24, 50),
(1, 25, 44),
(1, 26, 44),
(1, 27, 18),
(1, 28, 14),
(1, 29, 33),
(1, 30, 40),
(1, 31, 33),
(1, 32, 60);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` int NOT NULL,
  `kode_gejala` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nmgejala` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`idgejala`, `kode_gejala`, `nmgejala`) VALUES
(36, 'G01', 'Bau mulut'),
(37, 'G02', 'Pembengkakan pada gusi'),
(38, 'G03', 'Rasa tidak enak pada mulut '),
(39, 'G05', 'Kesulitan membuka mulut'),
(40, 'G08', 'Demam '),
(41, 'G09', 'Sakit pada gigi saat di sentu / \r\nmengunya'),
(42, 'G17', 'Pembengkakan pada wajah'),
(43, 'G18', 'Pembengkakan kelenjar getah benih \r\npada leher/ rahang bawah'),
(44, 'G19', 'Susah menelan'),
(45, 'G20', 'Nyeri yang muncul setelah 1-3 hari \r\nsetelah pencabutan '),
(46, 'G21', 'Adanya tulang pada lubang bekas \r\npencabutan '),
(47, 'G22', 'Soket kering (kehilangan sebagian/ \r\nseluru gumpalan pada lubang gigi '),
(51, 'G06', ' Gigi sensitive'),
(52, 'G07', 'Sakit / nyeri pada gigi yang  menyebar ke telinga dan rahang'),
(53, 'G10', 'Gigi goyang'),
(54, 'G11', ' Sakit kepala'),
(55, 'G12', ' Nyeri makan/minum'),
(56, 'G13', 'Pipi sering sariawan'),
(57, 'G14', ' Rahang bengkak'),
(58, 'G15', ' Keluar nanah tanpa ada lubang  pada gigi'),
(59, 'G16', ' Bernanah pada gusi'),
(60, 'G23', 'Ditengah lubang gigi ada daging'),
(61, 'G24', 'Gigi berlubang tapi tidak sakit'),
(62, 'G25', 'Gigi sedikit demi sedikit rontok'),
(63, 'G26', ' Lubang gigi kehitaman'),
(64, 'G04', 'Nyeri'),
(65, 'G27', ' Gigi sisa akar'),
(66, 'G28', 'Ngilu'),
(67, 'G29', ' Bentuk gigi tanpa terkikis'),
(68, 'G30', 'Sakit gigi yang muncul tiba-tiba'),
(69, 'G31', 'Muncul lubang pada gigi'),
(70, 'G32', 'Ada noda coklat, hitam, putih pada  permukaan gigi'),
(71, 'G33', 'Rasa sakit pada mulut'),
(72, 'G34', 'Nyeri spontan'),
(73, 'G35', 'Gigi terasa sakit saat di tekuk'),
(74, 'G36', 'Sulit menemukan gigi yang  menyebabkan rasa sakit'),
(75, 'G37', 'Sensitiv saat terpapar makanan  panas, dingin dan manis'),
(76, 'G38', 'Gigi tidak sakit pada saat di tekuk'),
(77, 'G39', 'Permukaan gigi menjadi rata (tidak  bergerigi) dan retak'),
(78, 'G40', 'Gigi berlubang dan sakit'),
(79, 'G41', 'Penumpukan plat dan karang gigi'),
(80, 'G42', 'Berbentuk rongga/ celah di antara  gigi'),
(81, 'G43', 'Gusi mudah berdarah'),
(82, 'G44', 'Penyusutan gusi membuat gigi  terlihat lebih panjang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `idkonsultasi` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`idkonsultasi`, `tanggal`, `nama`) VALUES
(1, '2024-11-08', 'Opet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `idpenyakit` int NOT NULL,
  `kode_penyakit` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nmpenyakit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `solusi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`idpenyakit`, `kode_penyakit`, `nmpenyakit`, `keterangan`, `solusi`) VALUES
(18, 'P0', 'Tidak  Terdefinisi ', 'Gejala penyakit  yang tidak masuk  dalam aturan', '-'),
(19, 'P01', 'Abses Gigi ', 'Benjolan yang  berisi nanah pada  gigi disebabkan  oleh infeksi  bakteri ', 'Segerahlah ke dokter untuk  melakukan pengeluran nanah  pada benjolan, meminum obat  antinyeri, perawatan saluran  akar. Jika abses sudah para  solusi akhir yakni pencabutan.  Pencegahan sakit gigi  selanjutnya setidaknya sikat gigi  2x sehari dengan pasta gig  mengandung  fluoride, hindari  menggunakan obat kumur  setelah menyikat gigi karena  dapat menghilangkan manfaat  pasta gigi '),
(20, 'P02', 'Alveolar  Osteiting ', 'Sakit pasca  pencabutan ', 'Dengan meminum obat  antibiotik/antinyeri berupa  ibuprofen dan asam fenamat,  pemberian obat hipertensi sesuai  anjuran dokter, pemberian obat  kumur (gel anti biotik),  meminum banyak air putih,  menggosok gigi secara berlahan '),
(22, 'P03', 'Abrasi  Gigi', 'Hilangnnya  struktur gigi atau  biasa disebut  dengan Kondisi  gigi yang terkikis', 'Dengan melakukan penambalan,  pembuatan mahkota gigi  (crown). Serta lakukan  pencegahan dengan  menghentikan kebiasaan buruk ,  menjaga kebersihan mulut,  mengganti sikat gigi setiap 3 bulan sekali dengan memili sikat  gigi yang mengandung fluoride'),
(23, 'P04', 'Bruxism', 'Gigi Gemertak', 'Dengan menggunakan pelindung  gigi saat tidur, pemasangan crow  gigi, pemberian obat pereda  nyeri serta menggunkan suntik  botox agar rahang tidak kaku'),
(24, 'P05', 'Impaksi', 'Gigi bungsu', 'Kompres dengan air dingin  untuk mengurangi  pembengkakan, dengan  mengonsumsi makanan ynag  lembut/cair, meminum obat  pereda nyeri seperti  paracetamol, ibuproten,  Pencegahan sakit gigi  selanjutnya setidaknya lakukan  pemeriksaan rutin setiap 6 bulan  sekali. '),
(25, 'P06', ' Karies  Gig', 'Gigi berlubang', 'Pencabutan gigi, penambalan,  pemasangan mahkota gigi.  Pencegahan dengan konsumsi  sayur dan buah, menyikat gigi  dengan pasta yang mengandung  fluoride, berkumur dengan air  garam jika flouride tidak ada,  sikat gigi 2x sehari dan rutin  memeriksa gigi.'),
(26, 'P07', 'Nekrosis  Pulpa', 'Kematian  jaringan gigi  (gigi mati)', 'Dengan pencabutan dan  mengurangi mengonsumsi  makanan manis serta lakukan  pencegahan dengan rajin  menggosok gigi dan melakukan  perawatan saluran akar'),
(27, 'P08', 'Perodintitis', 'Infeksi gusi yang  merusak gigi,  jaringan lunak,  dan tulang  penyangga gigi', 'Melakukan scaling untuk  menghilangkan karang gigi,  pencabutan gigi, bersikan sela  gigi menggunakan benang gigi  (dental floss), pemberian  antibiotik, obat kumur atau gel'),
(28, 'P09', ' Gigi Busuk', 'Kerusakan pada  email gigi yang  bisa menjalar ke  dentin bahkan  pulpa gigi', 'Pembusukan tingkat awal  dengan melakukan perawatan  fluoride treatmen, tahap lanjut  dengan menghilangkan bagian  gigi yang busuk dan tahap parah  dengan solusi akhir yakni  pencabutan'),
(29, 'P10', 'Gangreng  Radix', 'Tertinggalnya  sebagian akar  gigi (sisa akar)', 'Segeralah ke dokter untuk  melakukan fotorogen (x-ray)  setelah itu dilakukan pencabutan'),
(30, 'P11', 'Dental  Cyst', 'Kista gigi', 'Pencabutan gigi dan pemberian  obat antibiotik. Pencegahan sakit  gigi selanjutnya setidaknya  dengan mengurangi  mengomsumsi mak/min yang  manis dan rutin menyikat gigi  setidaknya 2x sehari'),
(31, 'P12', 'Pulpitis  Ireversibel', 'Peradangan pada  pulpa sudah  dalam dan makin  parah', 'Cabut gigi, Hindari makanan  yang terlalu panas dan terlalu  dingin, meminum obat antinyeri  dan anti radang'),
(32, 'P13', 'Pulpitis  Reversibel', 'Peradangan pada  pulpa atau saraf  gigi pada tahap  awal (yang masih  tergolong ringan)', 'Cabut gigi, Hindari makanan  yang terlalu panas dan terlalu  dingin, meminum obat antinyeri  dan anti radang dan menyikat  gigi setelah makan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `idusers` int NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`idusers`, `username`, `password`, `role`) VALUES
(8, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Petugas'),
(9, 'pasien', 'f5c25a0082eb0748faedca1ecdcfb131', 'Pasien'),
(10, 'dokter', 'd22af4180eee4bd95072eb90f94930e5', 'Dokter');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD PRIMARY KEY (`idaturan`) USING BTREE;

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`) USING BTREE;

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`idkonsultasi`) USING BTREE;

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`idpenyakit`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  MODIFY `idaturan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `idgejala` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `idkonsultasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `idpenyakit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
