-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 09:05 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warung_wahyu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `level`) VALUES
(1, 'Wahyu Rahayu', 'admin', '21232f297a57a5a743894a0e4a801fc3', '+6289514121147', 'wahyurahayu82@gmail.com', 'Kp. Bulak Kunyit RT.004/RW.003, Desa Muktiwari, Kecamatan Cibitung, Kabupaten Bekasi, Jawa Barat', 'admin'),
(2, 'Wahyu Rahayu', 'wahyu', '32c9e71e866ecdbc93e497482aa6779f', '089514123345', 'wahyurahayu92@gmail.com', 'Jl. HS. Ronggo Waluyo Blok A', 'user'),
(3, 'Nama Pengguna', 'rahayu', 'c6e515af5a6de23c1c258be31fca01c8', 'No.Telp', 'Email', 'Alamat Lengkap', 'user'),
(4, 'Rio Sahputra', 'rioo', 'd5ed38fdbf28bc4e58be142cf5a17cf5', '089514121123', 'Rio@gmail.com', 'Kp. Bulak Kunyit RT.004/RW.003, Desa Muktiwari, Kecamatan Cibitung, Kabupaten Bekasi, Jawa Barat', 'user'),
(5, 'Nama Pengguna', 'windy', '202cb962ac59075b964b07152d234b70', 'No.Telp', 'Email', 'Alamat Lengkap', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(7, 'Buku'),
(8, 'Figure'),
(10, 'Cosplay');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `via_id` int(11) NOT NULL,
  `via_name` varchar(50) NOT NULL,
  `via_no` varchar(20) NOT NULL,
  `via_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`via_id`, `via_name`, `via_no`, `via_image`) VALUES
(1, 'bca', '19304847578443', 'via/bca.png'),
(2, 'bni', '19443355764444', 'via/bni.png'),
(3, 'bri', '19669877754333', 'via/bri.png'),
(4, 'cimb', '19220988766664', 'via/cimb.png'),
(5, 'mandiri', '19559988776655', 'via/mandiri.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `pesanan_id` int(11) NOT NULL,
  `pemesan_id` int(11) NOT NULL,
  `pesanan_nama` varchar(255) NOT NULL,
  `pesanan_harga` varchar(255) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `telp_pemesan` varchar(20) NOT NULL,
  `alamat_pemesan` varchar(255) NOT NULL,
  `catatan_pemesan` varchar(255) NOT NULL,
  `status_pengiriman` tinyint(1) NOT NULL,
  `status_pembayaran` tinyint(1) NOT NULL,
  `ongkir` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`pesanan_id`, `pemesan_id`, `pesanan_nama`, `pesanan_harga`, `nama_pemesan`, `telp_pemesan`, `alamat_pemesan`, `catatan_pemesan`, `status_pengiriman`, `status_pembayaran`, `ongkir`, `product_id`) VALUES
(6, 2, 'The Seven Habits Highly Effective People', '210000', 'Wahyu Rahayu', '089514123345', 'Jl. HS. Ronggo Waluyo Blok A', 'Bismillah', 1, 1, '10000', 21),
(7, 2, 'Buku Jiraiya', '60000', 'Wahyu Rahayu', '089514123345', 'Jl. HS. Ronggo Waluyo Blok A', 'Narutoooo', 0, 0, '15000', 22),
(8, 4, 'Komik Kimetsu no Yaiba vol 1', '65000', 'Nama Pengguna', 'No.Telp', 'Alamat Lengkap', 'Asiiik', 0, 0, '10000', 15),
(9, 2, 'The Seven Habits Highly Effective People', '210000', 'Wahyu Rahayu', '089514123345', 'Jl. HS. Ronggo Waluyo Blok A', 'asdf', 0, 0, '10000', 21),
(10, 4, 'Buku Jiraiya', '55000', 'Rio Sahputra', '0987734434', 'Kp. Bulak Kunyit RT.004/RW.003, Desa Muktiwari, Kecamatan Cibitung, Kabupaten Bekasi, Jawa Barat', 'asdf', 0, 0, '10000', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `jasa_id` int(11) NOT NULL,
  `jasa_nama` varchar(50) NOT NULL,
  `jasa_harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengiriman`
--

INSERT INTO `tb_pengiriman` (`jasa_id`, `jasa_nama`, `jasa_harga`) VALUES
(1, 'JNE', 10000),
(2, 'J&T', 11000),
(3, 'SiCepat', 13000),
(4, 'NinjaExpress', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_desc`, `product_image`, `product_status`, `date_created`) VALUES
(5, 10, 'Cosplay Tanjiro', 500000, '<p>Bahan Bagus dan lembut</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624422840.jpg', 1, '2021-06-23 04:34:00'),
(6, 10, 'Cosplay Nezuko', 500000, '<p>Bahan Bagus dan lembut</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624422878.jpg', 1, '2021-06-23 04:34:38'),
(7, 10, 'Cosplay Saitama', 500000, '<p>Bahan Bagus dan lembut</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624422906.jpg', 1, '2021-06-23 04:35:06'),
(8, 10, 'Cosplay Naruto', 300000, '<p>Bahan Bagus dan lembut</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624422940.jpg', 1, '2021-06-23 04:35:40'),
(9, 10, 'Cosplaly Sasuke', 400000, '<p>Bahan Bagus dan lembut</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624422967.jpg', 1, '2021-06-23 04:36:07'),
(10, 8, 'Figure Naruto Ekor 9', 150000, '<p>Barang Bagus dijamin!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624423038.jpg', 1, '2021-06-23 04:37:18'),
(11, 8, 'Figure Hatsume Miku', 150000, '<p>Barang Bagus dijamin!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624423076.jpg', 1, '2021-06-23 04:37:56'),
(12, 8, 'Figure Nezuko', 150000, '<p>Barang Bagus dijamin!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624423103.jpg', 1, '2021-06-23 04:38:23'),
(13, 8, 'Figure Saitama', 200000, '<p>Barang Bagus dijamin!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624423140.jpg', 1, '2021-06-23 04:39:00'),
(14, 7, 'Buku Ikigai', 99000, '<p>Buku cara hidup orang jepang</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624443227.jpeg', 1, '2021-06-23 04:39:52'),
(15, 7, 'Komik Kimetsu no Yaiba vol 1', 55000, '<p>Buku Sangat Berkualitas!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624443213.jpeg', 1, '2021-06-23 04:40:32'),
(16, 7, 'Buku N1', 200000, '<p>Buku Sangat Berkualitas!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624423267.jpg', 1, '2021-06-23 04:41:07'),
(17, 7, 'Buku N2', 99000, '<p>Buku Sangat Berkualitas!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624423293.jpg', 1, '2021-06-23 04:41:33'),
(18, 7, 'Buku N3', 88000, '<p>Buku Sangat Berkualitas!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624423322.jpg', 1, '2021-06-23 04:42:02'),
(19, 7, 'Buku N4', 77000, '<p>Buku Sangat Berkualitas!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624423350.jpg', 1, '2021-06-23 04:42:30'),
(20, 7, 'Buku N5', 66000, '<p>Buku Sangat Berkualitas!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624423377.jpg', 1, '2021-06-23 04:42:57'),
(21, 7, 'The Seven Habits Highly Effective People', 200000, '<p>Buku Sangat Berkualitas!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624443193.jpeg', 1, '2021-06-23 04:43:54'),
(22, 7, 'Buku Jiraiya', 45000, '<p>Buku Sangat Berkualitas!</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'produk1624423466.jpg', 1, '2021-06-23 04:44:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`via_id`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`pesanan_id`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`jasa_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `pesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
