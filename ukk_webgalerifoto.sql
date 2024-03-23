-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2024 pada 01.04
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_webgalerifoto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggaldibuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggaldibuat`, `userid`) VALUES
(1, 'Building ', 'Foto seputar bangunan yang bagus                                                                                                       ', '2024-03-21', 1),
(3, 'Animal', 'Foto Seputar Hewan                                                 ', '2024-03-21', 1),
(4, 'Vehichle', 'Foto Seputar Kendaraan', '2024-03-03', 1),
(5, 'Nature', 'Foto Seputar keindahan alam                                                                                         ', '2024-03-23', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(18, 'Panda', 'Panda adalah mamalia yang terkenal dengan bulu hitam-putihnya yang khas. Mereka herbivora, memakan sebagian besar bambu. Habitat alaminya di pegunungan Cina tengah. Panda merupakan simbol konservasi satwa liar dan rentan terhadap kepunahan karena deforestasi dan perubahan iklim.', '2024-03-21', '1533417927-panda.jpg', 3, 1),
(19, 'Badak', 'Badak adalah mamalia herbivora dengan tubuh besar dan tanduk tunggal. Mereka hidup di savana dan hutan di Afrika dan Asia. Populasi mereka terancam oleh perburuan ilegal dan hilangnya habitat. Perlindungan dan konservasi menjadi fokus utama untuk mempertahankan spesies badak.', '2024-03-21', '798548341-badak.png', 3, 1),
(20, 'Kangguru', 'Kanguru adalah mamalia marsupial yang terkenal dengan kantong di perutnya, tempat mereka membawa anak-anak mereka. Mereka memiliki kaki belakang yang kuat untuk melompat jauh. Kanguru biasanya ditemukan di Australia dan Papua Nugini, dan mereka umumnya hidup di padang rumput dan hutan terbuka. Sebagai hewan herbivora, kanguru memakan rumput dan tumbuhan lainnya. Mereka juga memiliki cakar yang kuat untuk merobek makanan mereka.', '2024-03-21', '2022364150-kangguru.jpg', 3, 1),
(22, 'Harimau', 'Harimau adalah kucing besar dengan corak belang-strip hitam-orenji. Mereka pemangsa utama di Asia, biasanya ditemukan di hutan tropis dan sabana. Harimau memiliki tubuh besar dan kuat, dengan cakar tajam. Mereka berburu sendirian, memakan berbagai mangsa, dan terancam punah karena perburuan ilegal dan hilangnya habitat.', '2024-03-21', '472421425-Harimau.jpg', 3, 1),
(23, 'Ferrari Hybrid 296 GTB', 'Ferrari Hybrid 296 GTB adalah mobil sport dengan sistem hibrida, menggabungkan mesin V6 twin-turbo dengan motor listrik untuk performa dan efisiensi bahan bakar. Desainnya mencakup aerodinamika tinggi dan estetika khas Ferrari.', '2024-03-21', '1701710282-Ferrari Hybrid 296 GTB.jpg', 4, 1),
(24, 'BMW I8', 'BMW i8 adalah mobil sport plug-in hybrid dengan mesin bensin turbocharged dan motor listrik. Memiliki desain futuristik dengan bahan ringan dan emisi karbon rendah.', '2024-03-21', '1722782302-BMW I8.jpg', 4, 1),
(25, 'Toyota Supra', 'Toyota Supra adalah mobil sport yang terkenal dengan desain agresif dan performa tinggi. Ditenagai oleh mesin bensin turbocharged, Supra menawarkan akselerasi cepat dan penanganan responsif. Desainnya aerodinamis dengan fitur-fitur modern di dalamnya.', '2024-03-21', '552957449-Toyota Supra.jpg', 4, 1),
(26, 'Lamborghini Aventador', 'Lamborghini Aventador adalah mobil supercar dengan mesin V12 kuat dan desain futuristik. Menawarkan akselerasi yang mengagumkan dan interior mewah dengan teknologi terkini.', '2024-03-21', '822575638-Lamborghini Aventador.jpg', 4, 1),
(27, 'Istana Maimun', 'Istana Maimun, berlokasi di Medan, Sumatera Utara, adalah bangunan megah yang dibangun pada abad ke-19 oleh Sultan Deli. Memadukan gaya arsitektur Melayu, Eropa, Persia, dan India, istana ini menawarkan keindahan dan sejarah yang menarik bagi pengunjung.', '2024-03-23', '930120953-istana maimun.jpg', 1, 1),
(28, 'Masjid AL-Aqsa', 'Masjid Al-Aqsa, di Kota Lama Yerusalem, adalah tempat ibadah tertua kedua dalam Islam setelah Masjidil Haram. Bangunannya mencakup Masjid Al-Qibli dan Kubah Batu. Selain sebagai tempat ibadah, Al-Aqsa juga memiliki nilai politik penting dalam konflik Palestina-Israel.', '2024-03-23', '842296531-masjid al-aqsa.jpg', 1, 1),
(29, 'Kabah', 'Kabah adalah bangunan kubus suci di dalam Masjidil Haram di Makkah, Arab Saudi. Sebagai kiblat bagi umat Islam, Kabah menjadi pusat spiritual yang dihormati dan dimuliakan dalam ibadah haji dan umrah.', '2024-03-23', '1946535750-Kabah.jpg', 1, 1),
(30, 'Candi Borobudur', 'Candi Borobudur adalah kompleks candi Buddha terbesar di dunia, terletak di Magelang, Jawa Tengah, Indonesia. Dibangun pada abad ke-9 M, candi ini menggambarkan arsitektur Mahayana yang megah dengan relief-relief yang menceritakan kehidupan Buddha. Sebagai situs warisan dunia UNESCO, Borobudur menjadi tujuan wisata utama yang menarik pengunjung dari seluruh dunia.', '2024-03-23', '1848628693-candi borobudur.jpg', 1, 1),
(31, 'Danau Toba', 'Danau Toba adalah danau vulkanik terbesar di dunia, terletak di Sumatera Utara, Indonesia. Terbentuk dari letusan gunung api purba, dan dikelilingi oleh pegunungan hijau. Pulau Samosir di tengah danau merupakan destinasi wisata dengan budaya Batak yang kaya dan panorama matahari terbenam yang menakjubkan.', '2024-03-23', '725074434-danau toba.jpg', 5, 1),
(32, 'Benua Antartika', 'Antartika adalah benua terdingin dan terkering di Bumi, tertutup oleh es tebal. Terkenal dengan kehidupan uniknya seperti penguin dan anjing laut. Benua ini juga menjadi pusat penelitian ilmiah tentang perubahan iklim.', '2024-03-23', '1906047292-benua antartika.jpg', 5, 1),
(33, 'Gunung Bromo', 'Gunung Bromo adalah gunung berapi aktif di Jawa Timur, Indonesia, terkenal dengan kawahnya yang spektakuler. Terletak di Taman Nasional Bromo Tengger Semeru, sering dikunjungi oleh wisatawan untuk menikmati pemandangan matahari terbit dari Bukit Penanjakan.', '2024-03-23', '765782026-gunung bromo.jpg', 5, 1),
(34, 'Laut Mati', 'Laut Mati adalah danau asin di perbatasan Yordania, Israel, dan wilayah Palestina. Terkenal karena konsentrasi garamnya yang tinggi, menjadikannya tempat dengan air terasin di dunia. Laut Mati menjadi destinasi wisata populer karena pengalaman unik mengapung di permukaannya yang tinggi kadar garamnya.', '2024-03-23', '941089878-laut mati.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(3, 18, 1, 'tes', '2024-03-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(29, 18, 1, '2024-03-21'),
(31, 22, 1, '2024-03-21'),
(32, 23, 1, '2024-03-21'),
(33, 24, 1, '2024-03-21'),
(34, 26, 1, '2024-03-21'),
(35, 27, 1, '2024-03-23'),
(36, 28, 1, '2024-03-23'),
(37, 29, 1, '2024-03-23'),
(38, 30, 1, '2024-03-23'),
(39, 31, 1, '2024-03-23'),
(40, 32, 1, '2024-03-23'),
(41, 33, 1, '2024-03-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`) VALUES
(1, 'boy', '202cb962ac59075b964b07152d234b70', 'boypradhana196@gmail.com', 'Boy Pradhana Wafa', 'Medan'),
(2, 'user', '900150983cd24fb0d6963f7d28e17f72', 'boypradhana1926@gmail.com', 'Boy Pradhana Wafa', 'Medan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
