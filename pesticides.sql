-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 09, 2025 lúc 01:00 PM
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
(8, 'Thuốc trừ bệnh trị nấm cây trồng', 'Thuốc trừ bệnh trị nấm cây trồng', '1730093548thuoc-tru-ray.png', 1, 'thuoc-tru-benh-tri-nam-cay-trong'),
(9, 'Thuốc diệt chuột', 'Dạng viên, chuột sẽ chết sau 1-2 ngày', '1730093623thuoc-diet-chuot.png', 1, 'thuoc-diet-chuot'),
(10, 'Thuốc diệt ốc', 'Diệt các loại ốc', '1730093653thuoc-tru-benh.png', 1, 'thuoc-diet-oc');

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
(7, 'ewgewg', 'thuan@gmail.com', 'ưqavva', 1, 73, '2024-12-06 16:59:12'),
(8, 'ewgewg', 'thuan@gmail.com', 'ưqavva', 1, 73, '2024-12-06 16:59:18'),
(9, 'tt', 'dsgẻg', 'erbẻbẻbẻ', 0, 109, '2024-12-06 22:16:10'),
(10, 'gêrfewrfwfểwrf', 'hohuuuthuan@gmail.com', 'cai con cac', 1, 73, '2025-01-09 18:50:24');

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
(59, 'QGS230595', 1, 65),
(60, 'ZEV164797', 1, 66),
(61, 'ERA006457', 1, 67),
(62, 'IEP312446', 1, 68),
(63, 'JVF958378', 4, 69);

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
(70, 'QGS230595', 73, 6, 135000, '2024-12-07', '0000-00-00', 0),
(71, 'QGS230595', 77, 7, 490000, '2024-12-07', '0000-00-00', 0),
(72, 'ZEV164797', 74, 1, 10000, '2024-12-07', NULL, 0),
(73, 'ERA006457', 76, 3, 150000, '2024-12-07', NULL, 0),
(74, 'IEP312446', 73, 6, 135000, '2025-01-09', NULL, 0),
(75, 'JVF958378', 75, 1, 22000, '2025-01-09', '2025-01-09 18:45:54', 0),
(76, 'JVF958378', 76, 1, 50000, '2025-01-09', '2025-01-09 18:45:54', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `selling_price` int(11) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `production_date` datetime DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
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

INSERT INTO `products` (`id`, `title`, `description`, `selling_price`, `unit`, `production_date`, `expiration_date`, `image`, `status`, `category_id`, `brand_id`, `slug`, `discount`) VALUES
(73, 'Selecron 500EC', 'Diệt triệt để và nhanh chóng sâu non, thành trùng và trứng. Lý tưởng làm nền phối hợp với các loại thuốc trừ sâu khác, đặc biệt là nhóm Cúc tống hợp. Mở rộng phổ phòng trị, hạ gục nhanh sâu hại, ngăn chặn dịch bộc phát, bảo vệ cây trồng tối đa. Diệt sâu kháng thuốc, tiết giảm công lao động.', 25000, 'Chai', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732888897Picture5.png', 1, 7, 8, 'selecron-500ec', 10),
(74, 'Pesieu 500SC', 'Thuốc trừ sâu rầy nhện đỏ Pesieu 500SC :đặc trị sâu, rầy, nhện đỏ khó trị và đã bị kháng thuốc trên hoa hồng, hoa lan, các loại rau và cây ăn quả', 20000, 'Hộp', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732888955Picture6.png', 1, 7, 7, 'pesieu-500sc', 50),
(75, 'NEEM NANO', 'Đặc trị sâu ăn lá, rầy, rệp, nhện đỏ, bọ trĩ, bọ nhẩy,... Sản phẩm sạch, chiết xuất 100% từ tinh dầu thảo mộc.', 22000, 'Chai', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732889455Picture7.png', 1, 7, 7, 'neem-nano', 0),
(76, 'Vidifen 40EC', 'Hỗn hợp Dimethoate và Phethoate, có tác động nội hấp, tiếp xúc và vị độc, Phòng trừ rệp sáp hại cà phê, nhện đỏ hại cam, sâu xanh da láng hại đậu phộng (lạc ), bọ xít hôi hại lúa.', 50000, 'Chai', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732889788Picture8.png', 1, 7, 7, 'vidifen-40ec', 0),
(77, 'Virtako 40 wg', 'Là dòng thuốc sâu thế hệ mới, cơ chế tác động mạnh và hiệu quả tức thì. Đặc trị sâu cuốn lá và sâu đục thân ngừng cắn phá sau 2h nhiễm thuốc, bảo vệ tối đa chồi hữu hiệu.Chuyên phòng trừ sâu cuốn lá và đục thân bằng cơ chế gây rối loạn canxi trong hệ cơ, vừa tác động lên hệ thần kinh nên diệt các loại sâu có tính kháng thuốc với hiệu quả cao. Đặc biệt với đặc tính thấm sâu và lưu dẫn ngăn ngừa đốm rong trên lá, bảo vệ cây trồng một cách toàn diện.', 70000, 'Túi', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732889836Picture9.png', 1, 7, 7, 'virtako-40-wg', 0),
(78, 'Dupont Prevathon 5SC', 'Là thuốc trừ sâu thế hệ mới. Sâu ngừng ăn ngay khi trúng thuốc. Phun 1 lần diệt cả sâu cuốn lá và sâu đục thân. Đặc trị: Sâu cuốn lá, sâu đục thân lúa.Sâu tơ trên cải bắp.Bọ nhảy cải thìa.Dòi đục lá, sâu xanh cà chua.Dòi đục lá, sâu xanh sọc trắng dưa hấu.', 40000, 'Hộp', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732889882Picture10.png', 1, 7, 7, 'dupont-prevathon-5sc', 0),
(79, 'Danitol 50EC', 'Thuốc trừ sâu Danitol 50EC chuyên trị nhện và sâu rầy gây hại cây trồng. Xông hơi mạnh, thẩm thấu nhanh xuyên qua lớp kitin hay lớp sáp.', 45000, 'Chai', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732889922Picture11.png', 1, 7, 7, 'danitol-50ec', 0),
(80, 'Reasgant 3.6EC', 'Thuốc Trừ Sâu Reasgant 3.6EC - Trị Rầy Hại Xoài; Bọ Cánh Tơ, Rầy Xanh, Nhện Đỏ Hại Chè', 50000, 'Chai', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732889966Picture12.png', 1, 7, 7, 'reasgant-36ec', 0),
(81, 'Brightin 4.0EC', 'Brightin 4.0EC là một loại thuốc trừ sâu sinh học đặc trị các loại sâu xanh, sâu tơ, sâu vẽ bùa gây hại cây trồng đặc biệt là trên các loại rau xanh.', 60000, 'Chai', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732890002Picture13.png', 1, 7, 7, 'brightin-40ec', 0),
(82, 'Dantotsu 50WG', 'Thuốc trừ sâu Dantotsu 50WG là thuốc diệt sâu rầy thế hệ mới, thuốc có tính lưu dẫn mạnh. Thuốc rất hiệu quả đối với côn trùng chích hút có cánh. Sản phẩm của Sumitomo Chemical TOKYO-JAPAN', 30000, 'Túi', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732890040Picture14.png', 1, 7, 7, 'dantotsu-50wg', 0),
(83, 'Thuốc diệt chuột Storm', 'Dùng để diệt chuột trong nhà, trại chăn nuôi, nhà máy xay xát, kho tàng, khách sạn, nhà hàng, bệnh viện… và ngoài đồng ruộng, vườn cây ăn trái.', 20000, 'Túi', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732890090Picture15.png', 1, 9, 7, 'thuoc-diet-chuot-storm', 0),
(84, 'Thuốc diệt chuột Killrat', 'Thuốc diệt chuột Killrat là thuốc trừ chuột chống đông máu thế hệ mới, diệt chuột chỉ sau một lần ăn mồi. “Can kill in one feeding”', 30000, 'Hộp', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732890140Picture16.png', 1, 9, 7, 'thuoc-diet-chuot-killrat', 0),
(85, 'Thuốc diệt chuột Kokubo', 'Thuốc diệt chuột Kokubo nội địa Nhật Bản gồm cấu tạo thành phần hóa học được làm từ Warfarin và lúa mạch có tác dụng thu hút khiến chuột tới để kiếm ăn và sau 2-3 ngày sẽ chết. Đặc biệt không hại cây trồng.', 33000, 'Hộp', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732890187Picture18.png', 1, 9, 7, 'thuoc-diet-chuot-kokubo', 0),
(86, 'Thuốc diệt chuột Forwarat', 'Thuốc diệt chuột Forwarat là loại chống đông máu rất mạnh và diệt chuột chỉ sau 1 lần ăn phải. Bởi vì thời gian chết kéo dài từ 3 đên 5 ngày nên những con khác sẽ không biết mà tiếp tục ăn.', 40000, 'Hộp', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732890241Picture19.png', 1, 9, 7, 'thuoc-diet-chuot-forwarat', 0),
(87, 'RAT-K', 'RAT-K là thuốc diệt chuột thuộc nhóm chóng đông máu gây xuất huyết nội tạng và chuột bị chết sau khi ăn mồi 2-3 ngày.\r\nkhông mùi vị và gây chết chậm nên chuột không sợ mồi. tiện dụng giá thành rẻ, dễ bảo quản, phù hợp với tập quán của nông dân.', 33000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732890276Picture20.png', 1, 9, 7, 'rat-k', 0),
(88, 'Thuốc Diệt Chuôt Racumin 0.75Tp 20G', 'Thuốc Diệt Chuôt Racumin 0.75Tp 20G KHÔNG chết gà, vịt, chó, mèo,... Chỉ chết chuột, diệt chuột thông minh, hấp dẫn chuột, diệt chuột nhanh chóng.', 60000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732890346Picture21.png', 1, 9, 7, 'thuoc-diet-chuot-racumin-075tp-20g', 0),
(89, 'Cat 0.25WP', 'Cat 0.25WP là thuốc diệt chuột nhóm Chống Đông Máu thế hệ mới gây xuất huyết nội tạng. Cat 0.25WP không mùi vị, không gây co giật nên chuột không bị ngán mồi', 25000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732890735Picture22.png', 1, 7, 7, 'cat-025wp', 0),
(90, 'Viên Diệt Chuột ARS RAT KILLER Thái Lan', 'Là loại thuốc diệt chuột đa liều, khi chuột ăn phải sẽ chết sau từ 1 đến 3 ngày.  Sau khi ăn thuốc, chuột sẽ không có biểu hiện khác thường, chuột và đồng loại kéo tới tiếp tục ăn thuốc mà không có sự đề phòng. Thuốc diệt chuột Thái chứa chất Warfarin khiến chuột xuất huyết ở mắt, do đó chuột sẽ có xu hướng tìm ra chỗ sáng, nên rất dễ cho ta xử lý xác chuột', 50000, 'Hộp', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732890824Picture23.png', 1, 7, 7, 'vien-diet-chuot-ars-rat-killer-thai-lan', 0),
(91, 'Thuốc diệt chuột hồng Dethmor Nội địa Nhật Bản', 'Thuốc diệt chuột hồng Dethmor Nội địa Nhật Bản', 30000, 'Hộp', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732890867Picture24.png', 1, 7, 7, 'thuoc-diet-chuot-hong-dethmor-noi-dia-nhat-ban', 0),
(92, 'Thuốc diệt chuột thế hệ mới Broma', 'Broma 0,005 AB là thuốc diệt chuột nhóm chống đông máu thế hệ mới gây xuất huyết nội tạng. Gói thuốc đã trộn sẵn 2 loại là hạt thóc và hạt mạch cùng phụ gia đảm bảo hấp dẫn loài chuột khiến chúng không cảnh giác.', 35000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732890938Picture25.png', 1, 7, 7, 'thuoc-diet-chuot-the-he-moi-broma', 0),
(93, 'THUỐC TRỪ ỐC Helix® 500WP', 'Helix 500WP là thuốc dạng phun, đặc trị Ốc hiệu quả cao. Đặc biệt chuyên trị ốc gây hại trên cây cảnh, lúa.', 50000, 'Túi', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732891310Picture26.png', 1, 7, 7, 'thuoc-tru-oc-helix®-500wp', 0),
(94, 'VT-DAX 700WP', 'Là thuốc trừ ốc bươu vàng hại lúa, có tác dụng xông hơi và vị độc, làm ức chế men hô hấp và trao đổi chất trong cơ thể của ốc, thuốc tiếp xúc với trứng, làm ung trứng, thối trứng, làm cho trứng không nở thành ốc con.', 50000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732891346Picture27.png', 1, 7, 7, 'vt-dax-700wp', 0),
(95, 'CLEAR700wp', 'CLEAR700wp là thuốc trừ ốc có tác dụng xông hơi và vị độc, làm ức chế hô hấp và trao đổi chất trong cơ thể của ốc , diệt trừ tận gốc tất cả các loại ốc hại lúa và rau màu thuốc có thể trộn vào cát hoặc lân đạm rắc, hoặc phun.', 40000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732891387Picture28.png', 1, 7, 7, 'clear700wp', 0),
(96, 'SACHOC TSC 850WP', 'SACHOC TSC 850WP có hàm lượng hoạt chất chính Niclosamide cao (850g / kg) có tác dụng sâu rộng đến hệ hô hấp của ốc. Kết quả là thuốc có tác dụng nhanh – ốc bươu vàng chết sau 15-20 phút. Đặc biệt, SACHOC TSC 850WP tạo ra hiệu ứng hơi nước và hương độc khi hít thở, dẫn đến ốc bươu vàng chết nhanh.', 45000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732891419Picture29.png', 1, 7, 7, 'sachoc-tsc-850wp', 0),
(97, 'Sun-fasti 700WP', 'Thuốc trừ ốc bươu vàng trên lúa nhập khẩu từ Singapore, hoạt chất Niclosamide trong Sun-fasti 700WP tác động lên cả hệ tiêu hóa và hô hấp của ốc táo vàng, cũng như khả năng tiêu diệt ốc tại chỗ do phạm vi hoạt động rộng', 50000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732891470Picture30.png', 1, 7, 7, 'sun-fasti-700wp', 0),
(98, 'Red Duck 12BR (tên quốc tế SITTO-NIN)', 'Là loại thuốc nhập khẩu từ Thái Lan hiện đang được nhiều người sử dụng để chữa bệnh ốc bươu vàng trên lúa cũng như diệt ốc trên các cây trồng khác rất hiệu quả.', 40000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732891506Picture31.png', 1, 7, 7, 'red-duck-12br-ten-quoc-te-sitto-nin', 0),
(99, 'BlackCarp 700wp', 'Là thuốc trừ ốc có tác dụng xông hơi vị độc, làm ức chế men hô hấp và trao đổi chất trong cơ thể ốc, làm ốc chết nhanh.\r\nThuốc đặc trị ốc bươu vàng hại lúa, phun một lần diệt sạch ốc to, ốc nhỏ, và trứng ốc, làm tươi xốp vỏ ốc. Thuốc an toàn với lúa.', 50000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732891542Picture32.png', 1, 10, 7, 'blackcarp-700wp', 0),
(100, 'ANTIOC 777WP', 'Là thuốc trừ ốc cao cấp được kết hợp bởi hai hoạt chất mạnh, có tác dụng xông hơi vị độc, làm ức chế men hô hấp và trao đổi chất trong cơ thể ốc, làm ốc chết nhanh.', 40000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732891575Picture33.png', 1, 10, 7, 'antioc-777wp', 0),
(101, 'DIOTO', 'Là thuốc trừ ốc bươu vàng (Golden Apple Snail). DIOTO có nghĩa là diệt ốc tốt, hoạt chất là Niclosamide', 50000, 'Chai', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732891627Picture34.png', 1, 10, 7, 'dioto', 0),
(102, 'BOLIS 12GB', 'Là thuốc đặc trị ốc bươu vàng với dạng bã mồi tiên tiến nhất hiện nay. Diệt sạch ốc lớn và ốc nhỏ. Dễ dàng trộn giống để rải. Không độc đối với cá, ít ảnh hưởng môi trường và con người.', 30000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732891687Picture35.png', 1, 10, 7, 'bolis-12gb', 0),
(103, 'Anvil 5SC', 'Phòng trị hiệu quả các bệnh hại quan trọng trên lúa (khô vằn, lem lép hạt) và các loại cây trồng khác, giữ xanh bộ lá thông qua hiệu quả trừ bệnh tuyệt hảo. Đóng góp tích cực cho tối ưu năng suất và chất lượng hạt lúa', 50000, 'Chai', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732892273Picture36.png', 1, 7, 7, 'anvil-5sc', 0),
(104, 'Isacop 65.2 WG', 'Là thuốc trừ bệnh thế hệ mới của Tập đoàn Lộc Trời. Thuốc có dụng tiếp xúc, phòng trị và ngăn chặn nấm bệnh xâm nhiễm hiệu quả. Thuốc chuyên trị bệnh ghẻ sẹo trên cây có múi và một số loại nấm bệnh khác như thán thư, sương mai, đốm lá…', 60000, 'Túi', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732892335Picture37.png', 1, 8, 7, 'isacop-652-wg', 0),
(105, 'Antracol 70WP', 'Là thuốc phòng trừ bệnh phổ rộng, dạng bột thấm nước, có độ phủ tốt và có độ bám dính cao trên bề mặt lá khi phun, còn cung cấp vi lượng kẽm(Zn++) cho cây trồng giúp phát triển xanh tốt, tăng năng suất và chất lượng nông phẩm.', 60000, 'Túi', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732892374Picture38.png', 1, 8, 7, 'antracol-70wp', 0),
(106, 'Vimonyl 72WP', 'Là hỗn hợp thuốc trừ bệnh có tác động tiếp xúc và lưu dẫn; có phổ tác dụng rộng, được đăng kí phòng trừ bệnh sương mai hại rau, loét sọc mặt cạo hại cây cao su.', 60000, 'Túi', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732892431Picture39.png', 1, 7, 7, 'vimonyl-72wp', 0),
(107, 'Filia 525SE', 'Là thuốc trừ bệnh nội hấp và lưu dẫn mạnh, đặc trị bệnh cháy lá phòng và trị bệnh đạo ôn hiệu quả trên cây lúa thông qua cơ chế tác động kép độc đáo.', 40000, 'Chai', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732892459Picture40.png', 1, 7, 7, 'filia-525se', 0),
(108, 'Score 250EC', 'Thấm sâu nhanh và lưu dẫn mạnh trong thân, lá… để tầm soát và tiêu diệt nấm bệnh. Hạn chế bị rửa trôi dù bị mưa sau khi phun vài giờ, phù hợp xử lý trong mọi điều kiện thời tiết.', 50000, 'Chai', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732892492Picture41.png', 1, 7, 7, 'score-250ec', 0),
(109, 'Thuốc trị nấm MANOZEB 80WP', 'Có phổ phòng trừ rất rộng, phòng trừ hiệu quả trên 400 loại nấm bệnh trên hơn 70 loại cây trồng khác nhau như: bệnh chết nhanh, cháy lá, đốm vằn, thán thư, sương mai, đốm lá, rỉ sắt, phấn trắng, thối rễ, thối thân thối trái… trên lúa, bắp, các loại đậu đổ, rau cải, dưa, cây công nghiệp, cây ăn quả, hoa và cây kiểng…', 60000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732892526Picture42.png', 1, 7, 7, 'thuoc-tri-nam-manozeb-80wp', 0),
(110, 'Totan 200 WP', 'Là thuốc trừ bệnh vi khuẩn có tác dụng tiếp xúc và tác động mạnh. Phòng trừ bệnh cháy bìa lá (bạc lá và lúa) và bệnh vàng lá chín sớm hại lúa.', 40000, 'Túi', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732892556Picture43.png', 1, 7, 7, 'totan-200-wp', 0),
(111, 'Cabrio Top 600WG', 'Đặc trị bệnh đốm lá, các loại côn trùng gây hại cho thực vật như rầy, sâu ăn lá, sâu đục thân,...', 40000, 'Chai', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1732892742Picture44.png', 1, 7, 7, 'cabrio-top-600wg', 0),
(112, 'Vitrobin 320SC', 'Thuốc đặc trị bệnh đốm rong, đạo ôn lá, đạo ôn cổ bông, đen lép hạt cây lúa, thán thư, phấn trắng cây Xoài, bệnh sương mai, lở cổ rễ, nứt thân xì mủ cây Cà chua.', 50000, 'Chai', '2024-12-07 00:00:00', '2025-12-07 00:00:00', '1732892782Picture45.png', 1, 7, 7, 'vitrobin-320sc', 0);

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

--
-- Đang đổ dữ liệu cho bảng `revenue`
--

INSERT INTO `revenue` (`id`, `order_code`, `subtotal`, `date_delivered`) VALUES
(5, 'RIZ835166', 4000, '2024-12-24 15:16:07'),
(6, 'THS938097', 10000, '2024-10-23 15:39:45'),
(7, 'YCH942436', 60000, '2024-11-22 17:12:24'),
(8, 'HQY286639', 326000, '2024-12-03 15:31:47'),
(9, 'JVF958378', 72000, '2025-01-09 18:45:54');

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
(60, 21, 'Hồ Hữu Thuận', '03454927511', 'địa chỉ đặt hàng', 'hohuuthuan789@gmail.com', 'COD'),
(61, 21, 'Hồ Hữu Thuận', '0345492751', 'địa chỉ của thuận', 'hohuuthuan789@gmail.com', 'COD'),
(62, 21, 'Hồ Hữu Thuận', '0345492751', 'địa chỉ của thuận', 'hohuuthuan789@gmail.com', 'COD'),
(63, 26, 'Hồ Hữu Thuận', '0345492751', 'địa chỉ đặt hàng', 'hohuuthuan789@gmail.com', 'COD'),
(64, 26, 'Thuận', '0345492751', 'địa chỉ của thuận', 'hohuuthuan789@gmail.com', 'COD'),
(65, 37, 'Hồ Hữu Thuận', '0345492751', 'đường Trần Vĩnh Kiết, phường An Bình, quận Ninh Kiều, TP Cần Thơ', 'hohuuthuan789@gmail.com', 'COD'),
(66, 37, 'Nguyen Van A', '0774463437', 'đường Trần Vĩnh Kiết, phường An Bình, quận Ninh Kiều, TP Cần Thơ', 'thuan@gmail.com', 'COD'),
(67, 37, 'Nguyen Van B', '0345492346', 'đường Trần Vĩnh Kiết, phường An Bình, quận Ninh Kiều, TP Cần Thơ', 'thuanb2107182@student.ctu.edu.vn', 'COD'),
(68, 38, 'Hồ Hữu Thuận', '0774463437', 'Ở đâu cũng được', 'hohuuthuan789@gmail.com', 'COD'),
(69, 38, 'qcscqc', '03454927511', 'qqq', 'thuan@gmail.com', 'COD');

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
(6, 'dđ', '1732892836Picture1.png', 1),
(7, 'ưdưd', '1732892843Picture2.png', 1),
(8, 'ưdưdưdư', '1732892852Picture3.png', 1),
(9, 'đwđwdư', '1732892858Picture4.png', 1);

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
(1, 'admin', 'admin@gmail.com', '$2y$10$twaTnBFtzSvzL.K9pHYp9uuOhWMnsvuUuOcE15hrg0SUCX21VQvsS', 1, 1, 'đường Trần Vĩnh Kiết, phường An Bình, quận Ninh Kiều, TP Cần Thơ', '0345492759', 'User-avatar.png', 'YDO475056', '2024-12-03 15:14:16'),
(38, 'Hồ Hữu Thuận', 'hohuuthuan789@gmail.com', '$2y$10$W/NKWzGyy4XSWFfM8LwSxOKldg1gDdR6Cvxuwgb.XgjOkeWzN6bnq', 2, 1, 'đường Trần Vĩnh Kiết, phường An Bình, quận Ninh Kiều, TP Cần Thơ', '0345492751', '1733534687-cabybara.jpg', 'AXJ541803', '2024-12-07 08:37:56');

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
(38, 73, 1008, 77000, 97616000),
(39, 74, 1000, 18000, 18000000),
(40, 75, 1000, 18000, 18000000),
(41, 76, 1000, 40000, 40000000),
(42, 77, 1000, 55000, 55000000),
(43, 78, 1000, 30000, 30000000),
(44, 79, 1000, 38000, 38000000),
(45, 80, 1000, 35000, 35000000),
(46, 81, 1000, 40000, 40000000),
(47, 82, 1000, 25000, 25000000),
(48, 83, 1000, 18000, 18000000),
(49, 84, 1000, 20000, 20000000),
(50, 85, 1000, 25000, 25000000),
(51, 86, 1000, 30000, 30000000),
(52, 87, 1000, 20000, 20000000),
(53, 88, 1000, 40000, 40000000),
(54, 89, 1000, 20000, 20000000),
(55, 90, 1000, 30000, 30000000),
(56, 91, 1000, 20000, 20000000),
(57, 92, 1000, 28000, 28000000),
(58, 93, 1000, 40000, 40000000),
(59, 94, 1000, 40000, 40000000),
(60, 95, 1000, 30000, 30000000),
(61, 96, 1000, 35000, 35000000),
(62, 97, 1000, 40000, 40000000),
(63, 98, 1000, 30000, 30000000),
(64, 99, 1000, 40000, 40000000),
(65, 100, 1000, 35000, 35000000),
(66, 101, 1000, 40000, 40000000),
(67, 102, 1000, 20000, 20000000),
(68, 103, 1000, 20000, 20000000),
(69, 104, 1000, 40000, 40000000),
(70, 105, 1000, 40000, 40000000),
(71, 106, 1000, 40000, 40000000),
(72, 107, 1000, 20000, 20000000),
(73, 108, 1000, 40000, 40000000),
(74, 109, 1000, 40000, 40000000),
(75, 110, 1000, 35000, 35000000),
(76, 111, 1000, 30000, 30000000),
(77, 112, 1000, 35000, 35000000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `revenue`
--
ALTER TABLE `revenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Các ràng buộc cho các bảng đã đổ
--

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
