-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2024 lúc 02:24 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pesticides`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `title`, `description`, `image`, `status`, `slug`) VALUES
(7, 'Công ty cổ phần bảo vệ thực vật Sài Gòn (SPC)', 'Công ty cổ phần bảo vệ thực vật Sài Gòn (SPC) ra đời từ năm 1989, với 30 nhân viên kinh doanh 03 sản phẩm thuốc bảo vệ thực vật chủ yếu tại TP.HCM. Ngày nay, SPC là doanh nghiệp lớn với hơn 500 nhân viên làm việc tại 18 Chi nhánh trong và ngoài nước.', '1729920180SPC.png', 1, 'cong-ty-co-phan-bao-ve-thuc-vat-sai-gon-spc'),
(8, 'Công ty Cổ phần Nông dược HAI', 'Công ty Cổ phần Nông dược HAI được thành lập từ năm 1985, ban đầu chỉ là một chi nhánh vật tư Bảo vệ thực vật (BVTV) phía Nam trực thuộc Cục Trồng Trọt và BVTV.', '1729920248HAI.png', 1, 'cong-ty-co-phan-nong-duoc-hai'),
(9, 'Công ty Cổ phần bảo vệ thực vật 1 Trung Ương (PSC.1)', 'Công ty Cổ phần bảo vệ thực vật 1 Trung Ương (PSC.1) là một trong những doanh nghiệp hàng đầu về sản xuất và cung ứng thuốc bảo vệ thực vật tại Việt Nam, đóng góp vào tăng năng suất và chất lượng nông sản. PSC.1 cam kết tạo ra nông sản và thực phẩm an toàn, phù hợp với nền nông nghiệp sạch, an toàn', '1729920372PSC_1.png', 1, 'cong-ty-co-phan-bao-ve-thuc-vat-1-trung-uong-psc1'),
(10, 'Công ty cổ phần đầu tư Hợp Trí', 'Công ty Cổ phần Đầu tư Hợp Trí được thành lập vào năm 2003 bởi những người có nhiều năm kinh nghiệm trong lĩnh vực nghiên cứu và ứng dụng tiến bộ khoa học kỹ thuật vào phát triển nông nghiệp Việt Nam. Với mục tiêu đi đầu trong lĩnh vực thuốc bảo vệ thực vật, đảm bảo dinh dưỡng cao cho cây trồng, sản', '1729920441HopTri.jpg', 1, 'cong-ty-co-phan-dau-tu-hop-tri'),
(11, 'Tập đoàn Lộc Trời', 'Tập đoàn Lộc Trời là một doanh nghiệp lãnh đạo có trụ sở chính tại Việt Nam, thành lập từ năm 1993 và đã có hơn 28 năm hành trình phát triển. Với cam kết chặt chẽ đối với nông dân và sự hỗ trợ cho sự phát triển bền vững của nền nông nghiệp Việt Nam, Tập đoàn Lộc Trời hiện đang có mạng lưới 25 chi nh', '1729920515LocTroi.jpg', 1, 'tap-doan-loc-troi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `order_code` varchar(5) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_order` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `image`, `status`, `slug`) VALUES
(7, 'Thuốc trừ Sâu - Rầy - Nhện', 'Đặc trị các bệnh liên quan đến Sâu, Rầy và Nhện', '1730366933thuoc-tru-sau-ray-nhen.png', 1, 'thuoc-tru-sau-ray-nhen'),
(8, 'Thuốc trừ Rầy', 'Đặc trị các bệnh liên quan đến Rầy', '1730093548thuoc-tru-ray.png', 1, 'thuoc-tru-ray'),
(9, 'Thuốc diệt chuột', 'Dạng viên, chuột sẽ chết sau 1-2 ngày', '1730093623thuoc-diet-chuot.png', 1, 'thuoc-diet-chuot'),
(10, 'Thuốc trừ bệnh', 'Các bệnh khác', '1730093653thuoc-tru-benh.png', 1, 'thuoc-tru-benh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  `product_id_comment` int(11) NOT NULL,
  `date_cmt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `name`, `email`, `comment`, `status`, `product_id_comment`, `date_cmt`) VALUES
(1, 'Thuận', 'hohuuthuan789@gmail.com', 'Đây là phần đánh giá', 1, 0, ''),
(2, 'Thuận', 'thuan@gmail.com', 'Đánh giá chi tiết', 1, 24, ''),
(3, 'Thuận', 'thuan@gmail.com', 'Đánh giá chi tiết', 1, 24, '2024-10-30 22:31:08'),
(4, 'vvvvv', 'vvv', 'cccc', 1, 24, '2024-10-30 22:40:15'),
(5, 'hhjhj', 'hohuuuthuan789@gmail.com', 'scscqcqcqqcq', 1, 28, '2024-11-01 20:54:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `form_of_payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `status`, `form_of_payment_id`) VALUES
(53, 'RIZ835166', 1, 59),
(54, 'THS938097', 1, 60);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int(11) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `date_order` varchar(50) DEFAULT NULL,
  `date_delivered` varchar(50) DEFAULT NULL,
  `payment_status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_code`, `product_id`, `quantity`, `subtotal`, `date_order`, `date_delivered`, `payment_status`) VALUES
(61, 'RIZ835166', 64, 1, 2000, '2024-11-17', NULL, 0),
(62, 'RIZ835166', 68, 1, 2000, '2024-11-17', NULL, 0),
(63, 'THS938097', 65, 5, 10000, '2024-11-17', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `selling_price`, `image`, `status`, `category_id`, `brand_id`, `slug`, `discount`) VALUES
(64, 'Sản phẩm 1', 'Mô tả sản phẩm 1', 2000, '1731848031ctu.png', 1, 7, 7, 'san-pham-1', 0),
(65, 'Sản phẩm 2', 'Mô tả sản phẩm 2', 2000, '1731848041ctu.png', 1, 7, 7, 'san-pham-2', 0),
(66, 'Sản phẩm 3', 'Mô tả sản phẩm 3', 2000, '1731848049ctu.png', 1, 7, 7, 'san-pham-3', 0),
(67, 'Sản phẩm 4', 'Mô tả sản phẩm 4', 2000, '1731848058ctu.png', 1, 7, 7, 'san-pham-4', 0),
(68, 'Sản phẩm 5', 'Mô tả sản phẩm 5', 2000, '1731848066ctu.png', 1, 7, 7, 'san-pham-5', 0),
(69, 'Sản phẩm 6', 'Mô tả sản phẩm 6', 2000, '1731848074ctu.png', 1, 7, 7, 'san-pham-6', 0),
(70, 'Sản phẩm 7', 'Mô tả sản phẩm 7', 2000, '1731848083ctu.png', 1, 7, 7, 'san-pham-7', 0),
(71, 'Sản phẩm 8', 'Mô tả sản phẩm 8', 2000, '1731848090ctu.png', 1, 7, 7, 'san-pham-8', 0),
(72, 'Sản phẩm 9', 'Mô tả sản phẩm 9', 2000, '1731848100ctu.png', 1, 7, 7, 'san-pham-9', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `revenue`
--

CREATE TABLE `revenue` (
  `id` int(11) NOT NULL,
  `order_code` varchar(20) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `date_delivered` varchar(20) NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(2) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `form_of_payment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping`
--

INSERT INTO `shipping` (`id`, `user_id`, `name`, `phone`, `address`, `email`, `form_of_payment`) VALUES
(59, 21, 'Hồ Hữu Thuận', '0774463437', 'địa chỉ của thuận', 'hohuuthuan789@gmail.com', 'COD'),
(60, 21, 'Hồ Hữu Thuận', '03454927511', 'địa chỉ đặt hàng', 'hohuuthuan789@gmail.com', 'COD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `status`) VALUES
(6, 'dđ', '1730270050máy-học-ứng-dụngg.png', 1),
(7, 'ưdưd', '1730270723nềnnn.jpg', 1),
(8, 'ưdưdưdư', '1730270733Nền.jpg', 1),
(9, 'đwđwdư', '1730270745anh-nenn.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(2) NOT NULL,
  `status` int(2) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `date_created` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `status`, `address`, `phone`, `avatar`, `token`, `date_created`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$twaTnBFtzSvzL.K9pHYp9uuOhWMnsvuUuOcE15hrg0SUCX21VQvsS', 1, 1, '', '0345492759', 'User-avatar.png', 'MIN688922', '2024-11-08 22:27:50'),
(21, 'B2107182', 'hohuuthuan789@gmail.com', '$2y$10$twaTnBFtzSvzL.K9pHYp9uuOhWMnsvuUuOcE15hrg0SUCX21VQvsS', 2, 1, 'đâu', '0345492751', '1731152480-cabybara.jpg', 'TIY385766', '2024-11-10 03:24:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `import_price_one_product` int(11) NOT NULL,
  `total_import_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouses`
--

INSERT INTO `warehouses` (`id`, `product_id`, `quantity`, `import_price_one_product`, `total_import_price`) VALUES
(29, 64, 1000, 1000, 1000000),
(30, 65, 1000, 1000, 1000000),
(31, 66, 1000, 1000, 1000000),
(32, 67, 1000, 1000, 1000000),
(33, 68, 1000, 1000, 1000000),
(34, 69, 1000, 1000, 1000000),
(35, 70, 1000, 1000, 1000000),
(36, 71, 1000, 1000, 1000000),
(37, 72, 1000, 1000, 1000000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD KEY `fk_product_id-cart` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_form-of-payment` (`form_of_payment_id`);

--
-- Chỉ mục cho bảng `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product-order_detail` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_brand` (`brand_id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Chỉ mục cho bảng `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role` (`role_id`);

--
-- Chỉ mục cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quantity` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `revenue`
--
ALTER TABLE `revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_product_id-cart` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_form-of-payment` FOREIGN KEY (`form_of_payment_id`) REFERENCES `shipping` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  ADD CONSTRAINT `fk_quantity` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
