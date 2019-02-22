-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 22, 2019 lúc 03:27 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `e_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `amount` float NOT NULL,
  `status_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `cart_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_status`
--

CREATE TABLE `cart_status` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
('1', 'Nhông - Sên - Dĩa', 1, '2019-02-17 20:57:39', '2019-02-18 13:23:45'),
('2', 'Mâm - Lốp', 1, '2019-02-17 20:57:39', '2019-02-17 20:57:39'),
('CLjNUgGnmMY', 'Phuộc', 1, '2019-02-18 13:09:57', '2019-02-18 13:09:57'),
('dBdzURtCDNB', 'Cùm côn - Cùm thắng', 1, '2019-02-18 13:50:29', '2019-02-18 13:51:11'),
('jSXiwMW8cKA', 'Dĩa thắng trước, sau', 0, '2019-02-21 12:10:05', '2019-02-21 12:10:25'),
('pUwt2pWz1Jm', 'Dĩa thắng trước, sau', 1, '2019-02-21 12:10:43', '2019-02-21 12:10:43'),
('qtGMzmvHDJX', 'Trợ lực', 1, '2019-02-18 13:10:35', '2019-02-18 13:10:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gallery`
--

CREATE TABLE `gallery` (
  `product_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `image_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
('1', 'Brembo', 0, '2019-02-21 20:25:36', '2019-02-21 14:00:50'),
('2', 'Ohlins', 0, '2019-02-21 20:25:36', '2019-02-21 14:01:26'),
('DJ1NqoTwpHg', 'Brembo', 0, '2019-02-21 14:04:05', '2019-02-21 14:04:26'),
('dKoZ72jKeHb', 'Ohlins', 1, '2019-02-21 14:04:10', '2019-02-21 14:04:10'),
('Sz2tFUb6fR0', 'Accossato', 1, '2019-02-21 13:42:41', '2019-02-21 13:42:41'),
('tgKMRfiRSHA', 'Brembo', 1, '2019-02-21 14:04:49', '2019-02-21 14:04:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_02_12_074354_create_cart_table', 0),
(2, '2019_02_12_074354_create_cart_detail_table', 0),
(3, '2019_02_12_074354_create_cart_status_table', 0),
(4, '2019_02_12_074354_create_category_table', 0),
(5, '2019_02_12_074354_create_comment_table', 0),
(6, '2019_02_12_074354_create_image_table', 0),
(7, '2019_02_12_074354_create_manufacturer_table', 0),
(8, '2019_02_12_074354_create_product_table', 0),
(9, '2019_02_12_074354_create_product_image_table', 0),
(10, '2019_02_12_074354_create_reply_table', 0),
(11, '2019_02_12_074354_create_role_table', 0),
(12, '2019_02_12_074354_create_sub_category_table', 0),
(13, '2019_02_12_074354_create_transaction_table', 0),
(14, '2019_02_12_074354_create_user_table', 0),
(15, '2019_02_12_074356_add_foreign_keys_to_cart_table', 0),
(16, '2019_02_12_074356_add_foreign_keys_to_cart_detail_table', 0),
(17, '2019_02_12_074356_add_foreign_keys_to_comment_table', 0),
(18, '2019_02_12_074356_add_foreign_keys_to_product_table', 0),
(19, '2019_02_12_074356_add_foreign_keys_to_product_image_table', 0),
(20, '2019_02_12_074356_add_foreign_keys_to_reply_table', 0),
(21, '2019_02_12_074356_add_foreign_keys_to_sub_category_table', 0),
(22, '2019_02_12_074356_add_foreign_keys_to_transaction_table', 0),
(23, '2019_02_12_074356_add_foreign_keys_to_user_table', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `buyed` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `sub_category_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `manufacturer_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `thumbnail`, `price`, `buyed`, `views`, `rate`, `sub_category_id`, `is_active`, `created_at`, `updated_at`, `manufacturer_id`) VALUES
('1', 'Sên RK 520KRX Phốt Cao Su X-Ring ', 'Sên RK 520KRO phốt cao su X-ring (Chính hãng Nhật Bản) \r\nSên RK 520KRO phốt cao su X-ring (Chính hãng Nhật Bản) là sản phẩm của RK chain, hãng sên đồng hành cùng những chiến thắng của đội đua Honda, HRC. RK Chain là một hãng sên có xuất phát điểm tại Nhật Bản được thành lập từ những năm 1932 nhưng hoạt động mạnh nhất tại Mỹ và luôn được anh em Biker Mỹ ưu ái lựa chọn.\r\nSên RK 520KRO phốt cao su X-ring (Chính hãng Nhật Bản) là dòng cao cấp, với thiết kế phốt cao su cải tiến, có dạng chữ O, giúp giữ được nhiều dầu bôi trơn, từ đó sên xe sẽ được bôi trơn liên tục. Êm hơn là sên không có phốt cao su nhiều lần.', '', 2500000, 123, 123, 4, '1', 1, '2019-02-22 21:06:03', '2019-02-22 14:21:31', 'DJ1NqoTwpHg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reply`
--

CREATE TABLE `reply` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `comment_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
('1', 'Admin', '2019-02-13 20:56:13', '2019-02-13 20:56:13'),
('2', 'Customer', '2019-02-13 20:56:13', '2019-02-13 20:56:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `address_number` int(100) NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ward` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `address_number`, `street`, `ward`, `district`, `city`, `nation`, `is_active`, `created_at`, `updated_at`) VALUES
('1', 119, 'Phan Anh', 'Bình Trị Đông', 'Bình Tân', 'Hồ Chí Minh', 'Việt Nam', 1, '2019-02-15 20:26:23', '2019-02-15 20:26:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_category`
--

CREATE TABLE `sub_category` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `category_id`, `is_active`, `created_at`, `updated_at`) VALUES
('1', 'Cùm côn Brembo', 'dBdzURtCDNB', 0, '2019-02-18 21:25:37', '2019-02-21 13:20:14'),
('2', 'Dĩa', '1', 1, '2019-02-18 21:25:37', '2019-02-18 21:25:37'),
('2ZHAulQz0PN', 'Sên', '1', 1, '2019-02-21 12:46:26', '2019-02-21 13:20:36'),
('3ZA7o1MqdBS', 'Nhông', '1', 0, '2019-02-21 12:41:52', '2019-02-21 13:19:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `user_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `cart_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `full_name`, `role_id`, `phone`, `dob`, `is_active`, `created_at`, `updated_at`, `point`) VALUES
('1', 'admin1', 'admin1@etcc.com', '123', 'admin 1', '1', '1231231233', '2019-01-28', 1, '2019-02-15 20:32:41', '2019-02-17 07:07:33', 123),
('2', 'admin2', 'admin2@etcc.com', '123', 'admin 2', '1', '123123123', '2019-02-11', 1, '2019-02-15 20:32:41', '2019-02-17 05:55:50', 123),
('3', 'client1', 'client1@etcc.com', '123', 'client 1', '2', '1231231233', '2019-01-01', 1, '2019-02-17 12:06:10', '2019-02-17 05:11:52', 123),
('KEKgPH3CYCF', 'client2', 'client2@etcc.com', '$2y$10$1vtiZGtnLEU6zoqc7yLJou.8AqciyQz2v5m7txB/PlWXC0qwpM236', 'client 2', '2', '1231231231', '2019-01-08', 1, '2019-02-17 07:11:46', '2019-02-17 07:11:46', 0),
('lcqwakMquu6', 'admin4', 'admin4@etcc.com', '$2y$10$.cqJYQkZN3tQigqqnQJDXeRaBQ5l5gzhvA70edluiB0iFWFJLlqXu', 'admin 4', '1', '1231231233', '2019-01-01', 1, '2019-02-17 07:22:18', '2019-02-17 07:22:18', 0),
('OLIdUi67Pbc', 'client6', 'client6@etcc.com', '$2y$10$BBMcQGI/ow3O0tCw.Fh/x.yM6ZLwlJPadbXYv15bU.I49jNDXdStO', 'client 6', '2', '1231231233', '2019-01-29', 1, '2019-02-17 07:32:44', '2019-02-17 07:32:44', 0),
('uKRds4Y0807', 'client5', 'client5@etcc.com', '$2y$10$JQrYj3HSmfQhAIVybz19v.LOQ.N7eGkj8gUAdDoea/Q4khskAiq.u', 'client 5', '2', '1231231233', '2019-01-29', 1, '2019-02-17 07:26:22', '2019-02-17 07:26:22', 0),
('wLcaxZsIkwh', 'admin3', 'admin3@etcc.com', '$2y$10$uz903hzmP6kH2GlTd4AQYuTkhi1nSit8uJgofZDK/tzekG7/vPzM.', 'admin 3', '1', '1231231231', '2019-02-13', 1, '2019-02-17 07:19:45', '2019-02-17 07:19:45', 0),
('ZUKd67Wj9Bn', 'client4', 'client4@etcc.com', '$2y$10$vDSDpDTWWRGQj1xT3yhPRuZ64p/FnjwhwTVyCjyCkCPoiN1CSxqSm', 'client 4', '2', '1231231233', '2019-01-28', 1, '2019-02-17 07:23:59', '2019-02-17 07:23:59', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_shipping_address`
--

CREATE TABLE `user_shipping_address` (
  `user_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_shipping_address`
--

INSERT INTO `user_shipping_address` (`user_id`, `shipping_address_id`) VALUES
('1', '1'),
('2', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `fk_cart__cart_status` (`status_id`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`cart_id`,`product_id`),
  ADD KEY `fk_cart_detail__product` (`product_id`);

--
-- Chỉ mục cho bảng `cart_status`
--
ALTER TABLE `cart_status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment__user` (`user_id`),
  ADD KEY `fk_comment__product` (`product_id`);

--
-- Chỉ mục cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`product_id`,`image_id`),
  ADD KEY `fk_gallery__image` (`image_id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product__sub_category` (`sub_category_id`),
  ADD KEY `fk_product__manufaturer` (`manufacturer_id`);

--
-- Chỉ mục cho bảng `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reply__comment` (`comment_id`),
  ADD KEY `fk_reply__user` (`user_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sub_category__category` (`category_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`user_id`,`cart_id`),
  ADD KEY `fk_transaction__cart` (`cart_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user__role` (`role_id`);

--
-- Chỉ mục cho bảng `user_shipping_address`
--
ALTER TABLE `user_shipping_address`
  ADD PRIMARY KEY (`user_id`,`shipping_address_id`),
  ADD KEY `fk_user_shipping_address__shipping_address` (`shipping_address_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart__cart_status` FOREIGN KEY (`status_id`) REFERENCES `cart_status` (`id`);

--
-- Các ràng buộc cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `fk_cart_detail__cart` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `fk_cart_detail__product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment__product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_comment__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_gallery__image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `fk_gallery__product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product__manufaturer` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`id`),
  ADD CONSTRAINT `fk_product__sub_category` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`);

--
-- Các ràng buộc cho bảng `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `fk_reply__comment` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`),
  ADD CONSTRAINT `fk_reply__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `fk_sub_category__category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_transaction__cart` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `fk_transaction__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user__role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `user_shipping_address`
--
ALTER TABLE `user_shipping_address`
  ADD CONSTRAINT `fk_user_shipping_address__shipping_address` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_address` (`id`),
  ADD CONSTRAINT `fk_user_shipping_address__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
