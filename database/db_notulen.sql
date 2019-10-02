-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 08:37 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_notulen`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id` int(11) NOT NULL,
  `pengaju` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `pukul` varchar(10) NOT NULL,
  `acara` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id`, `pengaju`, `tempat`, `tanggal`, `pukul`, `acara`, `status`) VALUES
(26, 'Adang Stallone', 'Aula STMIK Bandung', '2018-09-30', '07:30', '<ol><li>A</li><li>B</li><li>C</li></ol>', 'Notulen Dibuat'),
(27, 'Ikin Monroe', 'Ruang Rapat STMIK Bandung', '2018-10-01', '08:30', '<ul><li>Contoh 1</li><li>Contoh 2</li><li>Contoh 3</li></ul>', 'Notulen Dibuat');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(11) NOT NULL,
  `kode_notulen` varchar(15) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `kode_notulen`, `gambar`) VALUES
(19, 'NT0001', '3c3668368d8162be254218235392c86d.jpg'),
(20, 'NT0001', '3c5465601d1e33cd5ea2c5b484c9a65f.jpg'),
(21, 'NT0001', '4da58e5fdc28dd8d53a60541a1c26830.jpg'),
(22, 'NT0001', 'b4c298f251b73085bbb02d44a6cd052c.jpg'),
(23, 'NT0002', 'bf50b1dc8a1a34b8a6fd2e105e6dfc4c.jpg'),
(24, 'NT0002', '85971cb12ca26cef14a9e21a282c32f1.jpg'),
(25, 'NT0002', '59bbcc4effcf8720c2198c32fbbf717d.jpg'),
(26, 'NT0002', '3a5dee8bacc5473704a29acc92b6e4a4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `kode_notulen` varchar(20) NOT NULL,
  `email_peserta` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `kode_notulen`, `email_peserta`, `status`) VALUES
(3, 'NT0001', 'cangdislave@gmail.com', 'Hadir'),
(4, 'NT0001', 'biksugame@gmail.com', 'Hadir'),
(5, 'NT0002', 'cangdislave@gmail.com', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `notulen`
--

CREATE TABLE `notulen` (
  `kode` varchar(15) NOT NULL,
  `id_notulis` int(15) NOT NULL,
  `id_acara` int(15) NOT NULL,
  `isi` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notulen`
--

INSERT INTO `notulen` (`kode`, `id_notulis`, `id_acara`, `isi`, `status`) VALUES
('NT0001', 2, 26, 'Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et lectus id ipsum porttitor scelerisque non eu sem. Maecenas gravida urna at est condimentum, vitae pretium sem venenatis. Praesent et sapien at neque aliquet tempus vel non tortor. Pellentesque lacus enim, pellentesque in luctus sed, accumsan in dui. Praesent mattis libero massa, quis ultricies libero iaculis vitae. Maecenas ullamcorper placerat ex. Maecenas finibus elit elit, sit amet vestibulum lacus viverra at. Sed mattis posuere diam eget pulvinar. Morbi efficitur lectus a metus tempor, id vestibulum tellus convallis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Praesent luctus ligula eleifend augue faucibus, sed maximus lorem ornare. Duis sit amet convallis risus, eget faucibus ipsum. Etiam gravida lectus eget elit rutrum pulvinar. Donec porttitor sed purus sed condimentum. Integer aliquam metus lorem, sed mollis augue pellentesque ut. Curabitur ut nisl dictum, maximus lectus a, iaculis dolor. Nullam egestas porta pellentesque. Ut cursus libero volutpat, pretium metus nec, finibus nibh. Etiam auctor iaculis turpis, id suscipit dolor volutpat et. Sed massa tellus, pulvinar eget erat eget, sagittis suscipit leo. Proin tempor sapien dolor, vitae tincidunt risus pretium vitae. In consequat ante nisi, in fermentum ex porttitor id. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque viverra gravida neque, vitae efficitur sem gravida vel. Sed vestibulum mattis vehicula.', 'Dibuat'),
('NT0002', 5, 27, '<span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.<br><br></span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'Dibuat');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `alamat`, `no_telp`, `email`, `bagian`) VALUES
(1, 'Udung Toretto', 'Jl. Georgopol 10', '+6285650150220', 'cangdislave@gmail.com', 'Dosen'),
(2, 'Jonathan Solihin', 'Jl. Ferry Pier 30', '+6289550220330', 'biksugame@gmail.com', 'Umum'),
(3, 'Pakih Schwarzenegger', 'Jl. Mylta Power 10', '+6295405100325', 'schwarzenegger@gmail.com', 'Akademik'),
(5, 'Asep Washington', 'Jl. Sosnovka 30', '+6289101045305', 'asepwashington@gmail.com', 'BEM');

-- --------------------------------------------------------

--
-- Table structure for table `undangan`
--

CREATE TABLE `undangan` (
  `id` int(11) NOT NULL,
  `id_acara` int(20) NOT NULL,
  `email_peserta` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `undangan`
--

INSERT INTO `undangan` (`id`, `id_acara`, `email_peserta`, `status`) VALUES
(21, 26, 'biksugame@gmail.com', 'Diundang'),
(22, 26, 'cangdislave@gmail.com', 'Diundang'),
(32, 27, 'cangdislave@gmail.com', 'Diundang');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama`, `alamat`, `no_telp`, `role`) VALUES
(2, 'admin@stmikbandung.ac.id', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Admin STMIK Bandung', 'Jl. Jalan 100', '+620000000000', 'Admin'),
(4, 'cangdislave@gmail.com', '284d80a779beef03a4e0ccfc8c4d90f5c572e710', 'Duleh DiCaprio', 'Jl. Gatka 20', '+6285105205305', 'General'),
(5, 'rzkyirmwn@gmail.com', 'dcddbbfbecf490d79e8758c290ddb27b01837f53', 'Atang Mendes', 'Jl. Pochinki 30', '+6281305107105', 'BEM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notulen`
--
ALTER TABLE `notulen`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `undangan`
--
ALTER TABLE `undangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `undangan`
--
ALTER TABLE `undangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
