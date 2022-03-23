-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 04:50 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_potmefarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbartikel`
--

CREATE TABLE `tbartikel` (
  `KodeArtikel` int(30) NOT NULL,
  `JudulArtikel` varchar(32) NOT NULL,
  `Uploader` varchar(100) NOT NULL,
  `Kategori` varchar(50) NOT NULL,
  `TglPost` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsiArtikel` text NOT NULL,
  `Foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbartikel`
--

INSERT INTO `tbartikel` (`KodeArtikel`, `JudulArtikel`, `Uploader`, `Kategori`, `TglPost`, `IsiArtikel`, `Foto`) VALUES
(2, 'Cara Menanam Bunga', '11', '1', '2019-06-19 19:15:54', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n', 'Cara Menanam Bunga.jpg'),
(3, 'Mari berkebun', '11', '2', '2019-06-19 19:58:59', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n', 'Mari berkebun.jpg'),
(4, 'Cara Merawat Tanaman', '11', '1', '2019-06-19 20:10:54', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n', 'Cara Merawat Tanaman.jpg'),
(5, 'Merawat Bunga Matahari', '11', '3', '2019-06-20 10:54:16', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit possimus velit dicta ex, esse suscipit amet ratione cum rerum aperiam laudantium sint a explicabo earum pariatur dolores doloribus dolorum sapiente.</p>\r\n', 'Merawat Bunga Matahari.jpg'),
(6, 'Penanaman di luar negeri', '11', '2', '2019-06-21 08:09:52', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ipsam possimus, ipsa vitae minima suscipit, repellat ab officiis laboriosam atque illum, accusantium saepe, distinctio perferendis nulla quos qui asperiores nemo.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ipsam possimus, ipsa vitae minima suscipit, repellat ab officiis laboriosam atque illum, accusantium saepe, distinctio perferendis nulla quos qui asperiores nemo.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ipsam possimus, ipsa vitae minima suscipit, repellat ab officiis laboriosam atque illum, accusantium saepe, distinctio perferendis nulla quos qui asperiores nemo.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ipsam possimus, ipsa vitae minima suscipit, repellat ab officiis laboriosam atque illum, accusantium saepe, distinctio perferendis nulla quos qui asperiores nemo.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ipsam possimus, ipsa vitae minima suscipit, repellat ab officiis laboriosam atque illum, accusantium saepe, distinctio perferendis nulla quos qui asperiores nemo.</p>\r\n', 'Penanaman di luar negri.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbexpedisi`
--

CREATE TABLE `tbexpedisi` (
  `KodeExpedisi` int(10) NOT NULL,
  `NamaExpedisi` varchar(255) NOT NULL,
  `Wilayah` varchar(255) NOT NULL,
  `Harga` int(30) NOT NULL,
  `EstimasiWaktu` varchar(100) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbexpedisi`
--

INSERT INTO `tbexpedisi` (`KodeExpedisi`, `NamaExpedisi`, `Wilayah`, `Harga`, `EstimasiWaktu`, `Keterangan`) VALUES
(1, 'JNE', 'Denpasar', 19000, '3-4 Hari', 'JNE'),
(2, 'J&T Express', 'Denpasar', 18000, '3-4 Hari', 'J&T Express');

-- --------------------------------------------------------

--
-- Table structure for table `tbjenisproduk`
--

CREATE TABLE `tbjenisproduk` (
  `KodeJenis` int(100) NOT NULL,
  `NamaJenis` varchar(25) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbjenisproduk`
--

INSERT INTO `tbjenisproduk` (`KodeJenis`, `NamaJenis`, `Keterangan`) VALUES
(1, 'Pot tanaman', 'Tempat Tinggal Tanaman'),
(2, 'Tanaman', 'tanaman'),
(3, 'Pupuk tanaman', 'Untuk Tanaman'),
(4, 'Media Tanam', 'media tanam'),
(5, 'Benih', 'Untuk ditanam'),
(6, 'Hidroponik', 'hidroponik'),
(7, 'Kit Berkebun Mini', 'kit berkebun mini'),
(8, 'Kit Berkebun Large', 'kit berkebun large'),
(9, 'Lainnya', 'lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tbpaketkursus`
--

CREATE TABLE `tbpaketkursus` (
  `KodePaket` int(100) NOT NULL,
  `NamaPaket` varchar(100) NOT NULL,
  `Harga` varchar(100) NOT NULL,
  `Durasi` int(30) NOT NULL,
  `Keterangan` text NOT NULL,
  `Foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpaketkursus`
--

INSERT INTO `tbpaketkursus` (`KodePaket`, `NamaPaket`, `Harga`, `Durasi`, `Keterangan`, `Foto`) VALUES
(2, 'Paket 2', '120000', 4, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora eligendi totam cum itaque obcaecati quasi labore illum, omnis porro deleniti odio adipisci fuga quaerat impedit aperiam quo, facilis atque consectetur.</p>\r\n', 'Paket 2.jpg'),
(3, 'Paket 3', '300000', 8, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora eligendi totam cum itaque obcaecati quasi labore illum, omnis porro deleniti odio adipisci fuga quaerat impedit aperiam quo, facilis atque consectetur.</p>\r\n', 'Paket 3.jpg'),
(4, 'Paket 4', '130000', 2, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora eligendi totam cum itaque obcaecati quasi labore illum, omnis porro deleniti odio adipisci fuga quaerat impedit aperiam quo, facilis atque consectetur.</p>\r\n', 'Paket 4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbpembayaran`
--

CREATE TABLE `tbpembayaran` (
  `KodePembayaran` int(11) NOT NULL,
  `NoTransaksi` varchar(30) NOT NULL,
  `NoRek` varchar(40) NOT NULL,
  `AtasNama` varchar(100) NOT NULL,
  `NamaBank` varchar(30) NOT NULL,
  `JumlahPembayaran` int(30) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `TglPembayaran` date NOT NULL,
  `StatusPembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpembayarankursus`
--

CREATE TABLE `tbpembayarankursus` (
  `KodePembayaran` int(11) NOT NULL,
  `NoTransaksi` varchar(30) NOT NULL,
  `NoRek` varchar(40) NOT NULL,
  `AtasNama` varchar(100) NOT NULL,
  `NamaBank` varchar(30) NOT NULL,
  `JumlahPembayaran` int(30) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `TglPembayaran` date NOT NULL,
  `StatusPembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpesankursus`
--

CREATE TABLE `tbpesankursus` (
  `KodePesanKursus` int(30) NOT NULL,
  `KodePelanggan` int(30) NOT NULL,
  `NoTransaksi` varchar(30) NOT NULL,
  `KodePaket` int(30) NOT NULL,
  `Lokasi` varchar(40) NOT NULL,
  `Durasi` varchar(30) NOT NULL,
  `TotalHarga` int(30) NOT NULL,
  `TglOrder` date NOT NULL,
  `StatusKursus` varchar(30) NOT NULL,
  `KodeInstruktor` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbproduk`
--

CREATE TABLE `tbproduk` (
  `KodeProduk` int(100) NOT NULL,
  `KodeJenis` varchar(100) NOT NULL,
  `NamaProduk` varchar(100) NOT NULL,
  `Satuan` varchar(100) NOT NULL,
  `Harga` int(30) NOT NULL,
  `Stok` int(30) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbproduk`
--

INSERT INTO `tbproduk` (`KodeProduk`, `KodeJenis`, `NamaProduk`, `Satuan`, `Harga`, `Stok`, `Foto`, `Keterangan`) VALUES
(2, '1', 'Pot Bunga Gantung Rotan Sintesis', 'buah', 45000, 2, 'Pot Bunga Gantung Rotan Sintesis.jpg', '<p>Pot Gantung Tanaman atau Pot Gantung Bunga yang terbuat dari Rotan Sintetis dengan bentuk dan warna yang sangat menarik, membuat tanaman atau bungan yang di taruh di dalam pot bisa semakin cantik untuk di Gantung di mana saja. bahan sintetis membuat pot tahan lama dan tidak mudah lapuk,<br />\r\n<br />\r\nuntuk dekorasi rumah, kantor, kafe, dan lainnya<br />\r\n<br />\r\nPot gantung rotan sintetis cocok untuk tanaman merambat ukuran :<br />\r\nDiameter luar: 17cm<br />\r\nDiameter dlam:16cm<br />\r\nTinggi :13cm<br />\r\n<br />\r\nBerat: 300 gr</p>\r\n'),
(5, '1', 'Pot Batok Kelapa Gantung Untuk Tanaman Bunga', 'buah', 50000, 10, 'Pot Batok Kelapa Gantung Untuk Tanaman Bunga.jpg', '<p>Pot gantung yang cocok untuk tanaman anggrek, sirih gading, krokot, dan tanaman gantung lainnya.<br />\r\n<br />\r\nKelebihan:<br />\r\n-Ramah lingkungan<br />\r\n-Unik<br />\r\n-Cocok untuk diletakan di teras rumah<br />\r\n<br />\r\nBerat: 500 gr</p>\r\n'),
(6, '5', 'Benih Bunga Matahari Gajah ( Potme Farm )', 'pcs', 20000, 7, 'Benih Bunga Matahari Gajah.jpg', '<p>Benih bunga matahari merek Potme Farm adalah benih yang dikembangkan di Bali. Sangat tahan terhadap panas dan berbunga besar dan banyak.<br />\r\n<br />\r\nApa yang didapat:<br />\r\n-Benih 20++ buah<br />\r\n-Kemasan aluminium foil<br />\r\n-Exp 2020<br />\r\n<br />\r\nCara menanam:<br />\r\n1. Letakkan 1 pack growing media ke dalam pot. Tuangkan air 200ml dan aduk sampai merata.<br />\r\n2. Tanam biji kedalam growing media (kedalaman 1 cm dari permukaan). Disarankan maks 5 biji pada 1 pot untuk Large Grow Kit dan 3 biji untuk Mini Grow Kit. Beri jarak 1,5 cm antar biji. Disarankan untuk merendam benih di dalam air hangat selama 24 jam.<br />\r\n3. Letakkan pot pada area terbuka. Pot yang berisi biji disarankan mendapat sinar matahari tidak langsung dan bukan matahari langsung.<br />\r\n4. Siram biji tanaman dengan sprayer 2 kali sehari. Pertahankan media tanam tetap lembab.<br />\r\n5. Tunggu sampai tumbuh 4 helai daun dan pindahkan ke tempat yang lebih luas (pot besar atau halaman) dan kaya sinar matahari langsung.<br />\r\n6. Jangan lupa diberi pupuk (Kira-kira setelah umur 1 bulan).<br />\r\n7. Rawat tumbuhan hingga tumbuh besar, estimasi 3 bulan sudah berbuah/berbunga.</p>\r\n'),
(7, '5', 'Potme Farm Benih Bunga Matahari', 'pcs', 20000, 1, 'Potme Farm Benih Bunga Matahari.jpg', '<p>Benih bunga matahari merek Potme Farm adalah benih yang dikembangkan di Bali. Sangat tahan terhadap panas dan berbunga besar dan banyak.<br />\r\n<br />\r\nApa yang didapat:<br />\r\n-Benih 20++ buah<br />\r\n-Kemasan aluminium foil<br />\r\n-Exp 2020<br />\r\n<br />\r\nCara menanam:<br />\r\n1. Letakkan 1 pack growing media ke dalam pot. Tuangkan air 200ml dan aduk sampai merata.<br />\r\n2. Tanam biji kedalam growing media (kedalaman 1 cm dari permukaan). Disarankan maks 5 biji pada 1 pot untuk Large Grow Kit dan 3 biji untuk Mini Grow Kit. Beri jarak 1,5 cm antar biji. Disarankan untuk merendam benih di dalam air hangat selama 24 jam.<br />\r\n3. Letakkan pot pada area terbuka. Pot yang berisi biji disarankan mendapat sinar matahari tidak langsung dan bukan matahari langsung.<br />\r\n4. Siram biji tanaman dengan sprayer 2 kali sehari. Pertahankan media tanam tetap lembab.<br />\r\n5. Tunggu sampai tumbuh 4 helai daun dan pindahkan ke tempat yang lebih luas (pot besar atau halaman) dan kaya sinar matahari langsung.<br />\r\n6. Jangan lupa diberi pupuk (Kira-kira setelah umur 1 bulan).<br />\r\n7. Rawat tumbuhan hingga tumbuh besar, estimasi 3 bulan sudah berbuah/berbunga.</p>\r\n'),
(8, '5', 'Benih Bunga Kenop Kancing Gomphrena Ungu ', 'pcs', 20000, 10, 'Benih Bunga Kenop Kancing Gomphrena Ungu .jpg', '<p>Benih bunga matahari merek Potme Farm adalah benih yang dikembangkan di Bali. Sangat tahan terhadap panas dan berbunga besar dan banyak.<br />\r\n<br />\r\nApa yang didapat:<br />\r\n-Benih 20 buah<br />\r\n-Kemasan aluminium foil<br />\r\n-Exp 2021<br />\r\n<br />\r\nCara menanam:<br />\r\n1. Letakkan 1 pack growing media ke dalam pot. Tuangkan air 200ml dan aduk sampai merata.<br />\r\n2. Tanam biji kedalam growing media (kedalaman 1 cm dari permukaan). Disarankan maks 5 biji pada 1 pot untuk Large Grow Kit dan 3 biji untuk Mini Grow Kit. Beri jarak 1,5 cm antar biji. Disarankan untuk merendam benih di dalam air hangat selama 24 jam.<br />\r\n3. Letakkan pot pada area terbuka. Pot yang berisi biji disarankan mendapat sinar matahari tidak langsung dan bukan matahari langsung.<br />\r\n4. Siram biji tanaman dengan sprayer 2 kali sehari. Pertahankan media tanam tetap lembab.<br />\r\n5. Tunggu sampai tumbuh 4 helai daun dan pindahkan ke tempat yang lebih luas (pot besar atau halaman) dan kaya sinar matahari langsung.<br />\r\n6. Jangan lupa diberi pupuk (Kira-kira setelah umur 1 bulan).<br />\r\n7. Rawat tumbuhan hingga tumbuh besar, estimasi 3 bulan sudah berbuah/berbunga.</p>\r\n'),
(9, '5', 'Benih Bunga Pacar Air Rose Balsam Mix', 'pcs', 20000, 9, 'Benih Bunga Pacar Air Rose Balsam Mix.jpg', '<p>Benih bunga matahari merek Potme Farm adalah benih yang dikembangkan di Bali. Sangat tahan terhadap panas dan berbunga besar dan banyak.<br />\r\n<br />\r\nApa yang didapat:<br />\r\n-Benih 20 buah<br />\r\n-Kemasan aluminium foil<br />\r\n-Exp 2021<br />\r\n<br />\r\nCara menanam:<br />\r\n1. Letakkan 1 pack growing media ke dalam pot. Tuangkan air 200ml dan aduk sampai merata.<br />\r\n2. Tanam biji kedalam growing media (kedalaman 1 cm dari permukaan). Disarankan maks 5 biji pada 1 pot untuk Large Grow Kit dan 3 biji untuk Mini Grow Kit. Beri jarak 1,5 cm antar biji. Disarankan untuk merendam benih di dalam air hangat selama 24 jam.<br />\r\n3. Letakkan pot pada area terbuka. Pot yang berisi biji disarankan mendapat sinar matahari tidak langsung dan bukan matahari langsung.<br />\r\n4. Siram biji tanaman dengan sprayer 2 kali sehari. Pertahankan media tanam tetap lembab.<br />\r\n5. Tunggu sampai tumbuh 4 helai daun dan pindahkan ke tempat yang lebih luas (pot besar atau halaman) dan kaya sinar matahari langsung.<br />\r\n6. Jangan lupa diberi pupuk (Kira-kira setelah umur 1 bulan).<br />\r\n7. Rawat tumbuhan hingga tumbuh besar, estimasi 3 bulan sudah berbuah/berbunga.</p>\r\n'),
(10, '5', 'Benih-Bibit Bunga Kenikir Pink Cosmos', 'pcs', 20000, 5, 'Benih-Bibit Bunga Kenikir Pink Cosmos.png', '<p>Benih bunga merek Potme Farm adalah benih yang dikembangkan di Bali. Sangat tahan terhadap panas dan berbunga besar dan banyak.<br />\r\n<br />\r\nApa yang didapat:<br />\r\n-Benih 20++ buah<br />\r\n-Kemasan aluminium foil<br />\r\n-Exp 2021<br />\r\n<br />\r\nCara menanam:<br />\r\n1. Letakkan 1 pack growing media ke dalam pot. Tuangkan air 200ml dan aduk sampai merata.<br />\r\n2. Tanam biji kedalam growing media (kedalaman 1 cm dari permukaan). Disarankan maks 5 biji pada 1 pot untuk Large Grow Kit dan 3 biji untuk Mini Grow Kit. Beri jarak 1,5 cm antar biji. Disarankan untuk merendam benih di dalam air hangat selama 24 jam.<br />\r\n3. Letakkan pot pada area terbuka. Pot yang berisi biji disarankan mendapat sinar matahari tidak langsung dan bukan matahari langsung.<br />\r\n4. Siram biji tanaman dengan sprayer 2 kali sehari. Pertahankan media tanam tetap lembab.<br />\r\n5. Tunggu sampai tumbuh 4 helai daun dan pindahkan ke tempat yang lebih luas (pot besar atau halaman) dan kaya sinar matahari langsung.<br />\r\n6. Jangan lupa diberi pupuk (Kira-kira setelah umur 1 bulan).<br />\r\n7. Rawat tumbuhan hingga tumbuh besar, estimasi 3 bulan sudah berbuah/berbunga.</p>\r\n'),
(11, '7', 'Benih-Bibit Bunga Zinnia Grow Kit (Potme Farm)', 'pcs', 30000, 3, 'Benih-Bibit Bunga Zinnia Grow Kit (Potme Farm).jpg', '<p>Zinnia Mini Grow Kit sangat cocok untuk anda yang ingin berkebun dengan mudah dan praktis. Selain itu, juga bisa sebagai media edukasi anak-anak untuk mengembangkan rasa cinta terhadap tanaman dan lingkungan. Satu pcs Zinnia Mini Grow Kit terdiri atas: 1 buah pot dengan writable sticker, 1 pack media tanam, 10 butir biji Zinnia, dan 1 paket pupuk. Pot dengan writable sticker adalah pot yang ditempel dengan sticker yang lucu dan dapat ditulis dengan spidol. Media tanam mengandung unsur-unsur yang dibutuhkan oleh tumbuhan. Benih yang dapat bertahan pada dataran rendah dan tinggi. Perpaduan dari semua kelebihan itu ada dalam Zinnia Grow Kit. Ayo berkebun sekarang.<br />\r\n<br />\r\nDetail Produk<br />\r\n-Pot dengan warna yang lucu<br />\r\n-Media tanam yang mengandung unsur-unsur yang dibutuhkan oleh tumbuhan<br />\r\n-Benih cocok ditanam pada dataran rendah sampai tinggi<br />\r\n-Writable sticker, tulis namamu di pot<br />\r\n-Pupuk, membuat tanamanmu cepat tumbuh<br />\r\n<br />\r\nCara menanam:<br />\r\n1. Letakkan 1 pack growing media ke dalam pot. Tuangkan air 200ml dan aduk sampai merata.<br />\r\n2. Tanam biji kedalam growing media (kedalaman 1 cm dari permukaan). Disarankan maks 5 biji pada 1 pot untuk Large Grow Kit dan 3 biji untuk Mini Grow Kit. Beri jarak 1,5 cm antar biji. Disarankan untuk merendam benih di dalam air hangat selama 24 jam.<br />\r\n3. Letakkan pot pada area terbuka. Pot yang berisi biji disarankan mendapat sinar matahari tidak langsung dan bukan matahari langsung.<br />\r\n4. Siram biji tanaman dengan sprayer 2 kali sehari. Pertahankan media tanam tetap lembab.<br />\r\n5. Tunggu sampai tumbuh 4 helai daun dan pindahkan ke tempat yang lebih luas (pot besar atau halaman) dan kaya sinar matahari langsung.<br />\r\n6. Jangan lupa diberi pupuk (Kira-kira setelah umur 1 bulan).<br />\r\n7. Rawat tumbuhan hingga tumbuh besar, estimasi 3 bulan sudah berbuah/berbunga.<br />\r\n<br />\r\nDimensi<br />\r\nDiameter: 8 cm<br />\r\nTinggi: 7 cm<br />\r\nBerat: 120 gr<br />\r\n1 kg bisa 8 pot</p>\r\n'),
(12, '7', 'Benih-Bibit Bunga Cosmos Pink Grow Kit (Potme Farm)', 'pcs', 30000, 12, 'Benih-Bibit Bunga Cosmos Pink Grow Kit (Potme Farm).jpg', '<p>Cosmos Mini Grow Kit sangat cocok untuk anda yang ingin berkebun dengan mudah dan praktis. Selain itu, juga bisa sebagai media edukasi anak-anak untuk mengembangkan rasa cinta terhadap tanaman dan lingkungan. Satu pcs Cosmos Mini Grow Kit terdiri atas: 1 buah pot dengan writable sticker, 1 pack media tanam, 10 butir biji Cosmos, dan 1 paket pupuk. Pot dengan writable sticker adalah pot yang ditempel dengan sticker yang lucu dan dapat ditulis dengan spidol. Media tanam mengandung unsur-unsur yang dibutuhkan oleh tumbuhan. Benih yang dapat bertahan pada dataran rendah dan tinggi. Perpaduan dari semua kelebihan itu ada dalam Cosmos Grow Kit. Ayo berkebun sekarang.<br />\r\n<br />\r\nDetail Produk<br />\r\n-Pot dengan warna yang lucu<br />\r\n-Media tanam yang mengandung unsur-unsur yang dibutuhkan oleh tumbuhan<br />\r\n-Benih cocok ditanam pada dataran rendah sampai tinggi<br />\r\n-Writable sticker, tulis namamu di pot<br />\r\n-Pupuk, membuat tanamanmu cepat tumbuh<br />\r\n<br />\r\nDimensi<br />\r\nDiameter: 8 cm<br />\r\nTinggi: 7 cm<br />\r\nBerat: 120 gr<br />\r\n1 kg bisa 8 pot</p>\r\n'),
(13, '7', 'Tomato Mini Grow Kit Writable Sticker Benih Tomat', 'pcs', 25000, 15, 'Tomato Mini Grow Kit Writable Sticker Benih Tomat.png', '<p>Tomato Mini Grow Kit sangat cocok untuk anda yang ingin berkebun dengan mudah dan praktis. Selain itu, juga bisa sebagai media edukasi anak-anak untuk mengembangkan rasa cinta terhadap tanaman dan lingkungan. Satu pcs Tomato Mini Grow Kit terdiri atas: 1 buah pot dengan writable sticker, 1 pack media tanam, dan 10 butir biji tomat. Pot dengan writable sticker adalah pot yang ditempel dengan sticker yang lucu dan dapat ditulis dengan spidol. Media tanam mengandung unsur-unsur yang dibutuhkan oleh tumbuhan. Benih yang dapat bertahan pada dataran rendah dan tinggi. Perpaduan dari semua kelebihan itu ada dalam Tomato Grow Kit. Ayo berkebun sekarang.<br />\r\n<br />\r\nDetail Produk<br />\r\n-Pot daur ulang ramah lingkungan<br />\r\n-Media tanam yang mengandung unsur-unsur yang dibutuhkan oleh tumbuhan<br />\r\n-Benih cocok ditanam pada dataran rendah sampai tinggi<br />\r\n-Writable sticker, tulis namamu di pot<br />\r\n-Pupuk, membuat tanamanmu cepat tumbuh<br />\r\n<br />\r\nDimensi<br />\r\nDiameter: 8 cm<br />\r\nTinggi: 7 cm</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksiproduk`
--

CREATE TABLE `tbtransaksiproduk` (
  `KodeTransaksi` int(30) NOT NULL,
  `NoTransaksi` varchar(30) NOT NULL,
  `KodePelanggan` int(30) NOT NULL,
  `KodeProduk` int(30) NOT NULL,
  `KodeExpedisi` int(11) NOT NULL,
  `Jumlah` int(30) NOT NULL,
  `TotalHarga` int(30) NOT NULL,
  `TglOrder` date NOT NULL,
  `JenisTransaksi` varchar(30) NOT NULL,
  `StatusTransaksi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `KodeUser` int(155) NOT NULL,
  `Username` varchar(155) NOT NULL,
  `Password` varchar(155) NOT NULL,
  `NamaLengkap` varchar(155) NOT NULL,
  `Alamat` varchar(155) NOT NULL,
  `Telp` varchar(155) NOT NULL,
  `Email` varchar(155) NOT NULL,
  `Foto` varchar(155) NOT NULL DEFAULT 'unknown.png',
  `Level` varchar(155) NOT NULL,
  `StatusUser` varchar(155) NOT NULL,
  `SecurityQuestion` int(10) NOT NULL,
  `SecurityAnswer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`KodeUser`, `Username`, `Password`, `NamaLengkap`, `Alamat`, `Telp`, `Email`, `Foto`, `Level`, `StatusUser`, `SecurityQuestion`, `SecurityAnswer`) VALUES
(11, 'admin', '2e0aca891f2a8aedf265edf533a6d9a8', 'admin', 'awdawd', '98798798', 'admin@gmail.com', 'admin.png', '1', '', 2, '123123'),
(12, 'Gede', '13ad65cc032d4b04927943c33673a65d', 'Gede', 'Gede', '08618181818', 'gede@gmail.com', 'unknown.png', '3', '', 1, 'Gede'),
(13, 'cagie', '2e0aca891f2a8aedf265edf533a6d9a8', 'Cagie Mustika', 'Jalan Diponegoro no 11', '0898073355', 'cagieeeee@gmail.com', 'unknown.png', '3', '', 3, '081337047828'),
(14, 'jordan', 'd16d377af76c99d27093abc22244b342', 'Jordan', 'Jalan Sesetan no 112', '08981209821', 'jordan@gmail.com', 'unknown.png', '2', 'Ready', 0, ''),
(15, 'adrian', '8c4205ec33d8f6caeaaaa0c10a14138c', 'Adrian', 'Jalan Tukad Pakerisan no 88', '08182394949', 'adrian@gmail.com', 'adrian.jpeg', '3', '', 5, 'On My Way');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbartikel`
--
ALTER TABLE `tbartikel`
  ADD PRIMARY KEY (`KodeArtikel`);

--
-- Indexes for table `tbexpedisi`
--
ALTER TABLE `tbexpedisi`
  ADD PRIMARY KEY (`KodeExpedisi`);

--
-- Indexes for table `tbjenisproduk`
--
ALTER TABLE `tbjenisproduk`
  ADD PRIMARY KEY (`KodeJenis`);

--
-- Indexes for table `tbpaketkursus`
--
ALTER TABLE `tbpaketkursus`
  ADD PRIMARY KEY (`KodePaket`);

--
-- Indexes for table `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD PRIMARY KEY (`KodePembayaran`);

--
-- Indexes for table `tbpembayarankursus`
--
ALTER TABLE `tbpembayarankursus`
  ADD PRIMARY KEY (`KodePembayaran`);

--
-- Indexes for table `tbpesankursus`
--
ALTER TABLE `tbpesankursus`
  ADD PRIMARY KEY (`KodePesanKursus`);

--
-- Indexes for table `tbproduk`
--
ALTER TABLE `tbproduk`
  ADD PRIMARY KEY (`KodeProduk`);

--
-- Indexes for table `tbtransaksiproduk`
--
ALTER TABLE `tbtransaksiproduk`
  ADD PRIMARY KEY (`KodeTransaksi`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`KodeUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbartikel`
--
ALTER TABLE `tbartikel`
  MODIFY `KodeArtikel` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbexpedisi`
--
ALTER TABLE `tbexpedisi`
  MODIFY `KodeExpedisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbjenisproduk`
--
ALTER TABLE `tbjenisproduk`
  MODIFY `KodeJenis` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbpaketkursus`
--
ALTER TABLE `tbpaketkursus`
  MODIFY `KodePaket` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  MODIFY `KodePembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbpembayarankursus`
--
ALTER TABLE `tbpembayarankursus`
  MODIFY `KodePembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbpesankursus`
--
ALTER TABLE `tbpesankursus`
  MODIFY `KodePesanKursus` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbproduk`
--
ALTER TABLE `tbproduk`
  MODIFY `KodeProduk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbtransaksiproduk`
--
ALTER TABLE `tbtransaksiproduk`
  MODIFY `KodeTransaksi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `KodeUser` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
