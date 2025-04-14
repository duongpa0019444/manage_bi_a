-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 08, 2025 lúc 09:42 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `manage_bi_a`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name`) VALUES
(1, 'Đồ uống'),
(2, 'Trái cây'),
(3, 'Đồ ăn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_menu`
--

CREATE TABLE `orders_menu` (
  `id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_menu`
--

INSERT INTO `orders_menu` (`id`, `session_id`, `product_id`, `quantity`) VALUES
(125, 79, 2, 3),
(126, 80, 3, 2),
(129, 81, 2, 2),
(130, 82, 4, 1),
(131, 83, 2, 4),
(132, 84, 3, 4),
(133, 84, 4, 2),
(134, 84, 8, 2),
(135, 84, 11, 2),
(136, 84, 6, 2),
(137, 84, 5, 3),
(138, 85, 4, 5),
(140, 86, 4, 5),
(143, 86, 8, 4),
(144, 86, 7, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `total_food_price` decimal(10,2) NOT NULL,
  `total_play_time` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `session_id`, `total_food_price`, `total_play_time`, `total_amount`) VALUES
(49, 79, 45000.00, 0, 45000.00),
(50, 80, 30000.00, 0, 30000.00),
(51, 81, 30000.00, 0, 30000.00),
(52, 82, 12000.00, 907, 919000.00),
(53, 83, 60000.00, 0, 60000.00),
(54, 84, 256000.00, 0, 256000.00),
(55, 85, 60000.00, 61, 121000.00),
(56, 86, 152000.00, 1089, 1241000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `image` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `image`, `category_id`) VALUES
(1, 'Nước khoáng', 10000.00, 100, '', 1),
(2, 'Coca-Cola', 15000.00, 80, '', 1),
(3, 'Pepsi', 15000.00, 90, '', 1),
(4, 'Trà xanh C2', 12000.00, 85, '', 1),
(5, 'Sting dâu', 12000.00, 70, '', 1),
(6, 'Bia Heineken', 25000.00, 60, '', 1),
(7, 'Nước cam', 20000.00, 75, '', 1),
(8, 'Sữa đậu nành', 13000.00, 95, '', 1),
(9, 'Nước tăng lực', 18000.00, 65, '', 1),
(10, 'Trà sữa Matcha', 22000.00, 50, '', 1),
(11, 'Dưa hấu', 30000.00, 100, '', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_end` timestamp NULL DEFAULT NULL,
  `status` enum('Đang chơi','Đã kết thúc') NOT NULL DEFAULT 'Đang chơi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `table_id`, `time_start`, `time_end`, `status`) VALUES
(79, 1, 1, '2025-04-02 08:56:49', '2025-04-02 08:56:49', 'Đã kết thúc'),
(80, 1, 1, '2025-04-02 08:58:37', '2025-04-02 08:57:55', 'Đã kết thúc'),
(81, 1, 1, '2025-04-02 09:06:16', '2025-04-02 09:06:41', 'Đã kết thúc'),
(82, 1, 1, '2025-04-02 16:56:14', '2025-04-03 08:03:24', 'Đã kết thúc'),
(83, 1, 1, '2025-04-03 08:03:45', '2025-04-03 08:03:50', 'Đã kết thúc'),
(84, 1, 1, '2025-04-04 17:30:22', '2025-04-04 17:30:31', 'Đã kết thúc'),
(85, 1, 1, '2025-04-04 16:36:57', '2025-04-04 17:38:46', 'Đã kết thúc'),
(86, 1, 1, '2025-04-05 13:14:17', '2025-04-07 07:23:40', 'Đã kết thúc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `table_price` decimal(10,2) NOT NULL,
  `status` enum('Còn trống','Đang sử dụng') NOT NULL DEFAULT 'Còn trống'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tables`
--

INSERT INTO `tables` (`id`, `table_name`, `table_price`, `status`) VALUES
(1, 'Bàn 1', 60000.00, 'Còn trống'),
(2, 'Bàn 2', 65000.00, 'Còn trống'),
(3, 'Bàn 3', 60000.00, 'Còn trống'),
(4, 'Bàn 4', 70000.00, 'Còn trống'),
(5, 'Bàn 5', 55000.00, 'Còn trống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`) VALUES
(1, 'tungduong', 'duongdtpa00194@gmail.com', '$2y$10$SJYRUhXstFQXFsLrlAmjCeBS3IRuD0A4XKuXeZeRbQvC5d0q3aWEO');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_menu`
--
ALTER TABLE `orders_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `menu_id` (`product_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `session_id` (`session_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `table_id` (`table_id`);

--
-- Chỉ mục cho bảng `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders_menu`
--
ALTER TABLE `orders_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders_menu`
--
ALTER TABLE `orders_menu`
  ADD CONSTRAINT `orders_menu_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_menu_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
