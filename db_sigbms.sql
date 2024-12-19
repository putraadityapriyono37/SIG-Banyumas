-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 02:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sigbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
('1', 'Putra Aditya Priyono', 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datawisata`
--

CREATE TABLE `tb_datawisata` (
  `id_datawisata` int(50) NOT NULL,
  `id_kategori` varchar(10) NOT NULL,
  `nama_wisata` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga_tiket` varchar(20) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_datawisata`
--

INSERT INTO `tb_datawisata` (`id_datawisata`, `id_kategori`, `nama_wisata`, `alamat`, `deskripsi`, `harga_tiket`, `latitude`, `longitude`) VALUES
(2, '1', 'Curug Telu', 'M6JR+2QP, Sawah & Hutan, Karangsalam, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah 53151', 'Air terjun ini berada di kawasan wisata Banyumas, sehingga bisa ditemukan dengan mudah.', '15000', -7.31964086, 109.24202763),
(3, '2', 'Museum Jendral Soedirman', 'Jl. Patimura No.240a, RW No.1, Dusun II, Pasir Kidul, Kec. Purwokerto Bar., Kabupaten Banyumas, Jawa Tengah 53136', 'Museum Panglima Besar TNI Jendral Soedirman atau yang biasa disebut Museum Pangsar Soedirman terletak di pinggiran kota Purwokerto sebelah barat berjarak 3 km dari pusat pemerintahan Kabupaten Banyumas. Sesuai namanya, museum ini dibangun untuk mengenang jasa-jasa Jendral Soedirman sebagai pahlawan bangsa.', '20000', -7.41948802, 109.19625100),
(5, '1', 'Telaga Sunyi', 'M6VV+474, Sawah & Hutan, Limpakuwus, Kec. Sumbang, Kabupaten Banyumas, Jawa Tengah 53183', 'Kolam renang dalam di tengah hutan dengan air terjun kecil dan fasilitas ganti pakaian.', '15000', -7.30714412, 109.24319640),
(6, '1', 'Watu Meja', 'F6J7+9RR, Jl. Raya Patikraja - Kebasen, Tumiyang Kidul, Tumiyang, Kec. Kebasen, Kabupaten Banyumas, Jawa Tengah 53172', 'Bukit Watu Meja merupakan salah satu destinasi wisata yang berada di Desa Tumiyang Kecamatan Kebasen Kabupaten Banyumas, wisata alam bukit watu meja ini menawarkan keindahan lembah Sungai Serayu', '7000', -7.51884031, 109.21449926),
(7, '1', 'Curug Bayan', 'Dusun II Ketenger, Ketenger, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah 53151', 'Curug Bayan merupakan salah satu objek wisata yang berada di desa Ketengger, kecamatan Baturaden, kabupaten Banyumas. Curug Bayan memiliki keunikan tersendiri karena terletak dibawah lereng gunung slamet dan memiliki suasana yang sejuk dan dingin.', '15000', -7.32525678, 109.21859322),
(8, '1', 'Curug Jenggala', 'Jl. Pangeran Limboro, Dusun III Kalipagu, Ketenger, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah 53152', 'Curug Jenggala adalah air terjun yang berlokasi di Ketenger, Baturaden, Banyumas. Air terjun ini memiliki ketinggian 30 meter dari permukaan tanah. Curug ini mempunyai tiga air terjun yang tingginya sejajar, dengan air terjun yang di tengah memiliki arus yang paling deras.', '10000', -7.30891496, 109.20875624),
(11, '1', 'Taman Mas Kemambang', ' Jl. Karang Kobar No.9, Glempang, Bancarkembar, Kec. Purwokerto Utara, Kabupaten Banyumas, Jawa Tengah 53115', 'Area rekreasi indah dengan mainan anak-anak warna warni, kolam ikan & jalan beraspal.', '10000', -7.41174635, 109.23806634),
(12, '1', 'Kebun Raya Baturaden', 'Jl. Pancurantujuh - Wanawisata Baturraden, Purwokerto, Dusun III Berubahan, Kemutug Lor, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah 53151', 'Kebun Raya Baturaden adalah Kebun Botani yang terdiri dari perkebunan pinus, damar, dan rasamala, serta beberapa jenis rotan sebagai sisipan.', '20000', -7.30614156, 109.23243922),
(13, '1', 'Curug Kembar Ketenger', 'M6F9+RRJ, Dusun II Ketenger, Ketenger, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah 53152', 'Curug Kembar Ketenger salah satu curug atau air terjun yang berada di Desa Ketenger, Kecamatan Baturraden, dimana merupakan sebuah desa wisata yag memiliki banyak tempat wisata hits.', '5000', -7.32519867, 109.21950920),
(15, '3', 'Masjid Nur Sulaiman', 'F7MV+968, Mruyung, Sudagaran, Kec. Banyumas, Kabupaten Banyumas, Jawa Tengah 53192', 'Masjid Agung Nur Sulaiman ini merupakan masjid peninggalan Kyai Nurdaiman Demang Gumelem I yang menjadi dai atau juru dakwah pertama kali ketika masjid ini didirikan. Masjid ini telah berusia lebih dari 400 tahun dibangun pada masa pemerintahan Bupati Banyumas Yoedanegara II.', '15000', -7.51633221, 109.29310398),
(16, '3', 'Gua Maria Kaliori', 'G834+WQ3, Jalan Gua Maria Kaliori, Kecamatan Kalibagor, Dusun V, Kaliori, Kec. Banyumas, Kabupaten Banyumas, Jawa Tengah 53191', 'Gua Maria Kaliori adalah sebuah tempat ziarah yang terletak di desa Kaliori kecamatan Kalibagor, Banyumas, Jawa Tengah, Indonesia.', '20000', -7.49504509, 109.30695518),
(17, '4', 'Masjid Saka Tunggal', 'RT.02/RW.4, Cikakak, Kec. Wangon, Kabupaten Banyumas, Jawa Tengah 53176', 'Masjid Saka Tunggal Banyumas adalah sebuah masjid yang berada di Desa Cikakak, Kecamatan Wangon, Kabupaten Banyumas, Jawa Tengah atau sekitar 30 kilometer arah barat daya Purwokerto.', '15000', -7.47362816, 109.05559665),
(18, '3', 'Makam Mbah Atas Angin', '24HC+6P5, Kejaksan, Pedagangan, Kec. Dukuhwaru, Kabupaten Tegal, Jawa Tengah 52451', 'Di sinilah terdapat sebuah bangunan kecil berbentuk pondok dengan tulisan \'Mbah Atas Angin\'. Ternyata ini adalah makam sekaligus tempat petilasan.Alkisah pada zaman dulu, ada seorang penyebar agama Islam yang berasal dari Turki bernama Syeh Maulana Magribi.', '14000', -6.97181760, 109.12186200),
(19, '2', 'Menggala ranch', 'Hutan, Tumiyang, Kec. Pekuncen, Kabupaten Banyumas, Jawa Tengah', 'Manggala Ranch Cilongok berbentuk perbukitan yang indah lengkap dengan hamparan rerumputan hijau layaknya di New Zealand. Perbukitan ini juga dikenal dengan nama Bukit Teletubbies', '15000', -7.34628799, 109.11889361),
(20, '4', 'Rumah Lengger ', 'F7PV+6VW, Banyumas, Sudagaran, Kec. Banyumas, Kabupaten Banyumas, Jawa Tengah 53192', ' kesenian tari tradisional yang merupakan warisan budaya Kabupaten Banyumas, Jawa Tengah. Kesenian ini memiliki nilai kesuburan dan religi, serta memiliki peran penting dalam kehidupan masyarakat Banyumas. ', '20000', -7.51406080, 109.29438212),
(21, '4', 'Sumur Mas', 'F7PV+CGX Taman Kota Lama, Banyumas, Sudagaran, Kec. Banyumas, Kabupaten Banyumas, Jawa Tengah 53192', 'Sumur itu disebut dengan sumur mas karena masyarakat menganggap bahwa sumur itu sumber ing urip atau dalam bahasa Indonesia disebut dengan sumber dalam hidup', '15000', -7.51399767, 109.29384135),
(22, '4', 'Museum Wayang', 'Jl. Budi Utomo No.1, Banyumas, Sudagaran, Kec. Banyumas, Kabupaten Banyumas, Jawa Tengah 53192', 'Museum Wayang Sendang Mas adalah sebuah museum yang terletak di kompleks pusat pemerintahan lama Kabupaten Banyumas, Jawa Tengah.', '5000', -7.51452691, 109.29418761),
(23, '1', 'Curug Cipendok', 'M45G+CX6, Jl. Kalipondok, Dusun 4 Karangnangka, Depok, Karangtengah, Kec. Cilongok, Kabupaten Banyumas, Jawa Tengah 53162', 'Curug Cipendok adalah air terjun dengan ketinggian 92 meter yang terletak di lereng Gunung Slamet. Kawasan ini dikelilingi oleh hutan yang masih alami. Pengunjung juga dapat mendengar suara burung langka, seperti elang jawa yang berputar-putar di atas telaga di sekitar curug.', '10000', -7.34096082, 109.12728977),
(24, '1', 'Pancuran Pitu', 'M6Q9+X5V, Dusun III Kalipagu, Ketenger, Kec. Baturaden, Kabupaten Banyumas, Jawa Tengah', 'Sesuai dengan namanya disebut Pancuran Tujuh atau dalam bahasa jawa disebut Pancuran Pitu karena mempunyai tujuh buah pancuran yang alami mengalir langsung dari gunung slamet.', '25000', -7.30979687, 109.21784084),
(25, '1', 'Mata Air Kalibacin', 'F5GW+RV3, Sawah, Tipar, Kec. Rawalo, Kabupaten Banyumas, Jawa Tengah 53173', 'Mata Air Panas Kalibacin terletak di Desa Tambaknegara, Kecamatan Rawalo, Banyumas. Lokasi ini merupakan tempat pemandian dengan kadar belerang tinggi. Belerang pada mata air ini dipercaya mampu mengobati berbagai penyakit seperti penyakit kulit, saraf, dan tulang.', '15000', -7.52071601, 109.19703577);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
('1', 'Wisata Alam'),
('2', 'Wisata Edukasi'),
('3', 'Wisata Religius'),
('4', 'Wisata Budaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_datawisata`
--
ALTER TABLE `tb_datawisata`
  ADD PRIMARY KEY (`id_datawisata`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_datawisata`
--
ALTER TABLE `tb_datawisata`
  MODIFY `id_datawisata` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_datawisata`
--
ALTER TABLE `tb_datawisata`
  ADD CONSTRAINT `tb_datawisata_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
