-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2025 pada 16.19
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dvd_store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`) VALUES
(1, 1, 'Jl. Gajah'),
(4, 1, 'alun alun sidoarjo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(13, 1, 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `address`, `created_at`, `user_id`, `total`, `payment_method`, `product_id`) VALUES
(1, 'seno', 'Jl. Gajah', '2025-01-18 13:39:59', 0, '0.00', '', 0),
(2, '', '', '2025-01-18 15:09:48', 1, '80000.00', '', 0),
(3, '', '', '2025-01-18 15:10:16', 1, '80000.00', '', 0),
(4, '', 'jl.gajah', '2025-01-19 04:56:32', 1, '0.00', 'cash_on_delivery', 0),
(5, 'seno', 'jl.gajah', '2025-01-19 04:59:52', 1, '0.00', 'cash_on_delivery', 0),
(6, 'seno', 'jl.gajah', '2025-01-19 05:01:58', 1, '0.00', 'cash_on_delivery', 0),
(7, 'seno', 'jl.gajah', '2025-01-19 05:02:35', 1, '40000.00', 'cash_on_delivery', 0),
(8, 'seno', 'jl.gajah', '2025-01-19 05:04:04', 1, '40000.00', 'cash_on_delivery', 0),
(9, 'seno', 'jl.gajah', '2025-01-19 05:04:33', 1, '40000.00', 'cash_on_delivery', 0),
(10, 'seno', 'jl.gajah', '2025-01-19 05:06:25', 1, '0.00', 'cash_on_delivery', 0),
(11, 'seno', 'jl.guh', '2025-01-19 05:07:35', 1, '40000.00', 'cash_on_delivery', 0),
(12, 'seno', 'jl.guh', '2025-01-19 05:09:17', 1, '40000.00', 'cash_on_delivery', 0),
(15, 'seno', 'jl dj', '2025-01-19 07:04:26', 1, '40000.00', 'cash_on_delivery', 0),
(16, 'seno', 'Jl. Gajah', '2025-01-20 10:28:29', 1, '40000.00', 'cash_on_delivery', 0),
(17, 'seno', 'jl. gajah magersari', '2025-01-20 11:21:53', 1, '40000.00', 'cash_on_delivery', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 2, 1, '0.00'),
(2, 12, 3, 1, '40000.00'),
(5, 15, 2, 1, '40000.00'),
(6, 16, 4, 1, '40000.00'),
(7, 17, 4, 1, '40000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `trailer_link` varchar(255) DEFAULT NULL,
  `synopsis` text,
  `release_year` year(4) NOT NULL,
  `duration` int(11) NOT NULL,
  `director` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `total_rating` decimal(3,2) DEFAULT '0.00',
  `rating_count` int(11) DEFAULT '0',
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `image`, `trailer_link`, `synopsis`, `release_year`, `duration`, `director`, `stock`, `total_rating`, `rating_count`, `category`) VALUES
(2, 'Yuni Indo Ver', NULL, '40000.00', 'yuni.jpg', 'https://www.youtube.com/embed/4BN63e5CnaQ', 'Pada tahun terakhirnya di sekolah menengah, seorang siswa Indonesia yang cerdas bertekad untuk melanjutkan pendidikannya dan menolak menikah, meskipun ada harapan dari masyarakatnya.', 2021, 95, 'Kamila Andini', 35, '9.99', 4, 'festival_film_indonesia'),
(3, '24 Jam Bersama Gaspar', NULL, '40000.00', '24 jam bersama gaspar.jpg', 'https://www.youtube.com/embed/txnx6itJBOY', 'Dengan hanya 24 jam tersisa untuk hidup, seorang detektif swasta mengikuti jejak petunjuk yang membingungkan untuk mengungkap hilangnya teman masa kecilnya.', 2024, 98, 'Yosep Anggi Noen', 40, '8.00', 2, 'festival_film_indonesia'),
(4, 'Jatuh Cinta Seperti di Film-Film', NULL, '40000.00', 'jatuh cinta seperti di film film.jpg', 'https://www.youtube.com/embed/F6jPobzz-ag', 'Bagus, seorang penulis skenario, bertemu kembali dengan teman SMA sekaligus pujaan hatinya, Hana, yang masih berduka atas kematian suaminya. Ia ingin meyakinkan Hana untuk jatuh cinta lagi, seperti dalam film-film.', 2023, 118, 'Yandy Laurens', 25, '5.00', 1, 'festival_film_indonesia'),
(5, 'Penyalin Cahaya', NULL, '40000.00', 'penyalin cahaya.jpg', 'https://www.youtube.com/embed/mjhGJ2g1NCQ', 'Setelah kehilangan beasiswanya ketika foto-foto dirinya di sebuah pesta muncul secara daring, seorang mahasiswi bekerja sama dengan seorang pekerja fotokopi untuk menyusun apa yang terjadi.', 2021, 130, 'Wregas Bhanuteja', 20, '0.00', 0, 'festival_film_indonesia'),
(6, 'Pemukiman Setan', NULL, '35000.00', 'ps.jpg', 'https://www.youtube.com/embed/tNyCo3WtmzY', 'Seorang wanita, korban trauma akibat kekerasan dalam rumah tangga dan kesulitan ekonomi, terpaksa bergabung dengan tiga temannya untuk merampok sebuah rumah antik.', 2023, 95, 'Charles Gozali', 50, '0.00', 0, 'horror'),
(7, 'Agak Laen', NULL, '45000.00', 'Agak Laen.jpg', 'https://www.youtube.com/embed/0YLSPyGA4h0', 'Seorang lelaki tua meninggal dalam wahana rumah hantu yang gagal. Operator mengubur jasadnya di lokasi, menjadikannya objek wisata populer.', 2024, 119, 'Muhadkly Acho', 50, '0.00', 0, 'drama'),
(8, 'Mencuri Raden Saleh', NULL, '45000.00', 'mencuri raden saleh.jpg', 'https://www.youtube.com/embed/DN3sRz_veBU', 'Untuk menyelamatkan ayahnya, seorang pemalsu ulung berusaha mencuri lukisan yang tak ternilai harganya dengan bantuan sekelompok spesialis.', 2022, 153, 'Angga Dwimas Sasongko', 50, '0.00', 0, 'action');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`) VALUES
(1, 2, 1, 4, 'baik', '2025-01-19 05:27:06'),
(3, 2, 1, 5, 'keren', '2025-01-19 08:04:50'),
(4, 3, 1, 5, 'bagus banget keren', '2025-01-19 08:05:35'),
(5, 3, 1, 3, 'kerenlah', '2025-01-19 08:59:06'),
(6, 2, 1, 3, 'oke', '2025-01-19 10:20:06'),
(7, 2, 1, 5, 'BAGUS', '2025-01-20 10:17:04'),
(8, 4, 1, 5, 'FILMNYA BAGUS', '2025-01-20 10:28:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) DEFAULT '0',
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `is_admin`, `profile_picture`) VALUES
(1, 'halosemua2', '$2y$10$bdqsQtXsE3P5vLVQEhEUWe695dm8hx3L7aoTR4CUbLz31HpCaz.GS', '2025-01-18 13:03:41', 0, '678e238a66149.jpg'),
(2, 'SENO', '$2y$10$KY1Gd3cly6OBxAeZureG7OQHIEPp03Z52cT4F7YqgaXGnoCVGhFha', '2025-01-20 10:12:05', 0, '678e222ec42b5.jpg'),
(3, 'admin_123', 'admindvd', '2025-01-20 11:36:47', 1, NULL),
(5, 'baru', '$2y$10$vxRspkkkj6OAXQUir4VINuociBMTmQNqfTHvPiQbZz.XrSXCakzYK', '2025-01-20 06:54:27', 1, '678e559b6dd85.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
