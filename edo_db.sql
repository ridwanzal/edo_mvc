-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 14, 2019 at 04:44 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edo`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `max_length` text NOT NULL,
  `image_path` text NOT NULL,
  `content` text NOT NULL,
  `category` varchar(128) NOT NULL,
  `tag` varchar(128) NOT NULL,
  `bookmark` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `type` int(2) NOT NULL COMMENT '1 post; 2 draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='blog data';

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `subtitle`, `author_id`, `date_created`, `max_length`, `image_path`, `content`, `category`, `tag`, `bookmark`, `likes`, `type`) VALUES
(13, 'Mengenal OJS untuk Publikasi Jurnal Ilmiah', 'Platform CMS untuk publikasi Ilmiah', 1, '2019-10-14', '', '', '<p>Bagi seorang yang berkarir dalam bidang akademik(akademisi) suatu e<em>lectronic journal </em>sudah menjadi hal yang tidak asing, karena untuk urusan publikasi makalah penelitian atau riset menjadi suatu keharusan untuk tahu, mengerti, termasuk dalam hal mengelola secara teknik. OJS menjadi pilihan yang paling tepat bagi institusi seperti, Universitas, Institut, Sekolah Tinggi untuk mempublikasi Jurnal mereka agar dapat terindeks oleh lembaga indeksasi seperti Scopus, Scholar(Google), dan ISI web of Knowledge.<br>\r\n<br>\r\n<strong>Mengapa harus OJS ?</strong><br>\r\nDi Indonesia sendiri, OJS merupakan Journal System yang paling banyak digunakan, setidaknya tiap perguruan tinggi memiliki ejournal atua journal online yang memakai OJS sebagai sistem mereka. Alasan utama memilih OJS dikarenakan jurnal sistem ini berbasis open source, robust dan dipakai oleh banyak pihak di seluruh dunia, dan disertai dukungan komunitas. OJS juga dinaungi oleh lembaga atau Public Knowledge Project.<br>\r\n </p>\r\n\r\n<h2><em>\"PKP is a multi-university initiative developing (free) open source software and conducting research to improve the quality and reach of scholarly publishing\"</em></h2>\r\n\r\n<p><br>\r\n<strong>OJS merupakan CMS</strong><br>\r\nTahukah anda bahwa OJS merupakan Content Management System, berbasis PHP dan kombinasi dari beberapa DBMS seprti MySQL dan PostgreSQL. Sampai saat ini sudah mencapai versi 3, alpha dan beta version, dengan stable version pada versi 2.4.x.<br>\r\n<br>\r\n<strong>Mudahkah ?</strong><br>\r\nMudah atau tidak untuk mempelajari suatu sistem juga bergantung pada latar belakang keilmuan, bagi orang sosial khususnya penggunaan ejournal mungkin dirasa cukup sulit, karena melibatkan pengetahuan teknis bagaimana cara memakai dan mengelola sesuatu dengan perangkat IT.<br>\r\n<br>\r\n<br>\r\nSekian</p>\r\n', '5', 'Sharing, OJS, publication', 0, 0, 1),
(14, 'Smart Home Kontrol Berbasis Arduino', 'Smart Home with Arduino Uno', 1, '2019-10-14', '', '', '<p>Sudah lama gak nulis, jadi kepengen nulis dan bagi-bagi pengetahuan kepada semua, kali ini mengenai smart home, ya projek tugas besar sistem embedded semester 7 dengan sks yang gede 4sks, jadi ngeri kalo gak jadi hhe. Oh ia, gak lupa kasih tau kalo penulis jurusan \"sistem komputer\" jadi ya tugasnya pasti ada alat, ada ngoding. Oke baca lanjutannya ya .... <br>\r\n<br>\r\nSmart home, secara sepintas mungkin sistem yang dibangun terlihat sangat kompleks, padahal sebenarnya bisa dibilang sistem yang dibuat ini cukup sederhana dengan memanfaatkan beberapa komponen seperti board controller, laptop dan juga Access point kita sudah dapat membangun rumah pintar sederhana, ditambah dengan pengetahuan web programming, karena sistem yang dibuat berbasis web setidaknya memiliki pengethuan mengenai HTML, CSS, JS, PHP dan Jquery. Oke, jadi yang jadi pertanyaan adalah perangkat-perangkat apa saja yang digunakan untuk membuat sistem seperti ini ? Berikut adalah jawabannya . .<br>\r\n<br>\r\n- Maket rumah (dapat dibuat dengan akrilik/triplek)<br>\r\n- 3 buah LED yang telah disolder dalam PCB bolong dan dibuat kabel jumpernya<br>\r\n- Laptop ( Disarankan menggunakan linux)</p>\r\n\r\n<ul>\r\n <li>  Debian distros </li>\r\n</ul>\r\n\r\n<ul>\r\n <li>  Web Server Installed (Apache2)</li>\r\n</ul>\r\n\r\n<ul>\r\n <li>  PHP 5 Installed</li>\r\n</ul>\r\n\r\n<p>- Arduino UNO - Board Controller</p>\r\n\r\n<ul>\r\n <li> Full package Board + USB-Serial cable</li>\r\n</ul>\r\n\r\n<ul>\r\n <li> Arduino IDE (IDE Compiler nya arduino jg harus terinstal)</li>\r\n</ul>\r\n\r\n<p>- Access Point atau Wireless Router</p>\r\n\r\n<ul>\r\n <li>Merk apapun bisa digunakan, dalam percobaan menggunakan LINKSYS  WRTG54G</li>\r\n</ul>\r\n\r\n<ul>\r\n <li>Atau bisa juga menggunakan hostapd (ap-hotspot) di linux yang bisa jalandi distro berbasis debian seperti ubuntu, mint dan varian lain.</li>\r\n</ul>\r\n\r\n<p>- Ethernet Cable (AP to PC)<br>\r\n- Mobile Phone ( Android, iOS, WindowsPhone)<br>\r\n<br>\r\nBerikut merupakan skematik perancangan smart home - kontrol lampu berbasis web</p>\r\n', '5', 'smarthome, programming', 0, 0, 1),
(15, 'Implementasi Voice Over IP dengan Ekiga dan Asterisk', 'Membangun aplikasi VoIP sederhana dengan menggunakan sistem operasi Linux', 1, '2019-10-14', '', '', '<p>Voice over Internet Protocol(VoIP) merupakan bentuk komunkasi yang memungkinkan pengguna untuk melakukan panggilan melalui koneksi broadband (internet) sebagai ganti dari penggunaan telepon konvensional(PSTN). Terminal atau end device yang digunakan sebagai media komunikasi VoIP meliputi IP-Phone, Softphone dan bahkan penggunaan Smartphone, dapat digunakan sebagai Terminal VoIP. Dengan bertelepon menggunakan VoIP, terdapat banyak keuntungan yang dapat diambil, diantaranya adalah dari sisi biaya, jelas lebih murah dari tarif telepon konvensional. Karena penggunaan jaringan berbasis IP bersifat global, maka hubungan atau panggilan internasional pun dapat dilakukan dan penghematan mencapai 70%. Selain itu, biaya perawatan(maintain) juga dapat ditekan karena dari sisi deployment sistem data dan voice terpisah, sehingga Terminal(IP-Phone) dapat ditambah, dipindah dan diubah. Hal ini dikarenakan VoIP dapat dipasang disembarang ethernet, tidak seperti teknologi telepon konvensional yang harus memiliki port tersendiri di sentral atau Private Branch Exchange(PBX).</p>\r\n', '5', 'networking, voip, tools', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(2, 'asdsad', 'asdad', 'asdsad'),
(3, 'asdadsa', 'adasds', 'asdsad'),
(4, 'adad', 'adsadsa', 'adasdsad'),
(5, '2121asdad', 'asdsadas2', '1212'),
(6, 'asdada', 'adsad', 'asdad12'),
(7, 'asdada', 'adsad', 'asdad12'),
(8, 'asdada', 'adsad', 'asdad12asdsad'),
(9, 'adad', 'daasda', 'dadad'),
(10, 'sadasd121', '121', '1212r'),
(11, '123454asdas', 'dasdad', 'asda'),
(12, '', '', ''),
(13, 'asda', 'ada', 'adssds'),
(14, '', '', ''),
(15, '', '', ''),
(16, '', '', ''),
(17, '', '', ''),
(18, '', '', ''),
(19, 'M. Ridwan Zalbina', 'zalbinaridwan@gmail.com', 'IHDSAIFDSAH*[removed]   asDSADAS  ASDSAD  asDSAD'),
(20, 'Reko', 'reko@gmail.com', '1212121212'),
(21, 'Reksaosa', 'rekosa@gmail.com', 'asdsadadsadasd'),
(22, 'Rezako', 'adasd@mail.com', 'asdadsadsa'),
(23, 'REKAZA', 'rekaza@gmail.com', 'rekaza'),
(24, 'sad', 'asda', 'asdsa'),
(25, 'Dr. Deris Stiawan', 'Deris@unsri.ac.id', 'Ada banyak assets yang saya percayakan pembuatannya dengan Ridwan Z a.k.a Edo. Besutan hasil karyanya sesuai dengan keinginan. Mulai dari semua assets design untuk konfrensi internasional : EECSI 2015 sd 2017, ICECOS 2017-2019,ARS 2016-2017.\r\n\r\nOfficial Logo indexing dan repository nasional RISTEKDIKTI : SINTA, GARUDA dan ANJANI, termasuk bemper slider footer websitenya. Termasuk juga cover jurnal ilmiah FASILKOM UNSRI dan beberpa logo riset group di dalamnya.\r\n\r\nSentuhan tone, degradasi dan warna sangat tepat yang dihasilkan dalam sebuah art yang arstristik. Nilai tambah lainnya dari sudut pandang akademisi adalah semua tools yang  digunakan menggunalan platform open source.\r\n\r\nGood Job and high satisfaction guys\r\n\r\nSalam\r\n\r\nDeris Stiawan. Ph.D\r\nAssociate Professor\r\nUniversitas Sriwijaya\r\n\r\n\r\n\r\n'),
(26, 'Dr. Deris Stiawan', 'Deris@unsri.ac.id', 'Ada banyak assets yang saya percayakan pembuatannya dengan Ridwan Z a.k.a Edo. Besutan hasil karyanya sesuai dengan keinginan. Mulai dari semua assets design untuk konfrensi internasional : EECSI 2015 sd 2017, ICECOS 2017-2019,ARS 2016-2017.\r\n\r\nOfficial Logo indexing dan repository nasional RISTEKDIKTI : SINTA, GARUDA dan ANJANI, termasuk bemper slider footer websitenya. Termasuk juga cover jurnal ilmiah FASILKOM UNSRI dan beberpa logo riset group di dalamnya.\r\n\r\nSentuhan tone, degradasi dan warna sangat tepat yang dihasilkan dalam sebuah art yang arstristik. Nilai tambah lainnya dari sudut pandang akademisi adalah semua tools yang  digunakan menggunalan platform open source.\r\n\r\nGood Job and high satisfaction guys\r\n\r\nSalam\r\n\r\nDeris Stiawan. Ph.D\r\nAssociate Professor\r\nUniversitas Sriwijaya\r\n\r\n\r\n\r\n'),
(27, 'asasdadasdd', 'adasd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `fullname`, `password`) VALUES
(1, 'ridwanzal', 'mridwanzalbina@gmail.com', 'M. Ridwan Zalbina', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
