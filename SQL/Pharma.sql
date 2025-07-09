-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 09, 2025 lúc 01:17 PM
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
-- Cơ sở dữ liệu: `pharma`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_fname` varchar(20) NOT NULL,
  `admin_lname` varchar(20) NOT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_fname`, `admin_lname`, `admin_password`) VALUES
(16, 'nguyentai2292005@gmail.com', 'Tai', 'Nguyen', '$2y$10$YRiUFQoJR.EMOCsfxEdr6uLY6Fvbi0tdIFV1T/eIhi5N0Poil4ndG'),
(17, 'admin@gmail.com', 'Tai', 'Nguyen', '$2y$10$fHl24Lx9cOzO7DaCZkOdXeFglneJnuc8ItlO3kmfjYiKTnEbJDIoa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`id`, `email`, `token`, `expires`) VALUES
(6, 'nguyentai2292005@gmail.com', '23ceb6bd51b17ffe2b7d8cbdacfec3fe9d4968a7783f5eb6e7a292defe82bd3f', '2025-07-09 13:38:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `item`
--

CREATE TABLE `item` (
  `item_id` int(5) NOT NULL,
  `item_title` varchar(250) NOT NULL,
  `item_brand` varchar(250) NOT NULL,
  `item_cat` varchar(15) NOT NULL,
  `item_details` text NOT NULL,
  `item_tags` varchar(250) NOT NULL,
  `item_image` varchar(250) NOT NULL,
  `item_quantity` int(3) NOT NULL,
  `item_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `item`
--

INSERT INTO `item` (`item_id`, `item_title`, `item_brand`, `item_cat`, `item_details`, `item_tags`, `item_image`, `item_quantity`, `item_price`) VALUES
(15, 'Hộp 50 que thử đường huyết Accu-Chek Active', 'Accu-Chek', 'machine', 'Mức đường huyết trong cơ thể bạn có thể dễ dàng kiểm tra với que thử Accu-Chek Active. Chúng đã được kiểm chứng về độ chính xác, dễ sử dụng hàng ngày và không cần mã thủ công. Chỉ cần cắm que thử, lấy mẫu máu nhỏ, để nó thấm và đọc kết quả trên màn hình. Que thử Accu-Chek Glucometer dùng cho bệnh nhân tiểu đường tuýp 1 và 2. Không sử dụng que quá hạn ghi trên hộp. Accu-Chek Active cho phép bạn kiểm tra lại và xác minh kết quả hiển thị.', 'Accu-Chek Active Glucometer Test Strips Box Of 50, máy đo, que thử đường huyết', 'Strips.jpg', 50, 250000),
(18, 'Máy đo huyết áp Omron HEM-7121J', 'Omron', 'machine', 'Máy đo huyết áp Omron Hem-7121J tự động với công nghệ IntelliSense mang lại sự thoải mái cho người dùng. Nó báo OK khi quấn vòng bít đúng cách, đảm bảo áp suất phù hợp để cho kết quả chính xác, nhanh chóng. Dễ dàng theo dõi huyết áp tại nhà.', 'Omron Blood Pressure Monitor HEM-7121J, đo huyết áp', 'Blood Pressure.jpg', 49, 530000),
(19, 'Máy xông mũi họng Omron Ne-C106', 'Omron', 'machine', 'Hít thở dễ dàng, thoải mái với máy xông mũi họng Omron Ne-C106 giúp bạn hít thuốc. Thiết kế dễ sử dụng cho cả người lớn và trẻ em.', 'Omron Compressor Nebulizer Ne-C106', 'Omron Compressor Nebulizer Ne-C106.jpeg', 50, 450000),
(20, 'Máy đo đường huyết OneTouch Select Plus Simple (kèm 10 que thử + bút chích + 10 kim)', 'OneTouch', 'machine', 'OneTouch Select Plus Simple là hệ thống đo đường huyết dễ sử dụng, chính xác, gần như không đau. OneTouch® là thương hiệu được bác sĩ tiểu đường Việt Nam khuyên dùng nhiều nhất (theo khảo sát 2020 với 150 bác sĩ).', 'OneTouch Select Plus Simple Glucometer (kèm 10 que thử + bút chích + 10 kim)', 'OneTouch Select Plus Simple Glucometer.jpeg', 48, 265000),
(21, 'Máy đo đường huyết Accu-Chek Active (kèm 10 que thử)', 'Accu-Chek', 'machine', 'Hệ thống đo đường huyết Accu-Chek Active cho kết quả chính xác tại nhà, dễ sử dụng, nhỏ gọn, nhanh có kết quả dễ hiểu.', 'Accu-Chek Active Blood Glucose Monitoring System With 10 Free Test Strips', 'Accu-Chek Active Blood Glucose Monitoring System.jpeg', 49, 400000),
(22, 'Nhiệt kế điện tử mềm Apollo', 'Apollo', 'machine', 'Nhiệt kế Apollo phản hồi nhanh, độ chính xác cao (±0,2°F), màn hình LCD dễ đọc, pin lâu lên đến 200 giờ. Có tín hiệu báo khi đo xong, tự động tắt.', 'Apollo Pharmacy Digital Flexible Thermometer', 'Apollo Pharmacy Digital Flexible Thermometer.jpeg', 50, 30000),
(23, 'Máy tập thở Romsons SH-6082', 'ROMSONS', 'machine', 'Máy tập thở Romsons Respirometer SH-6082 giúp tập luyện phổi hiệu quả với thiết kế 3 bóng, dễ cầm, vỏ trong suốt để theo dõi quá trình tập thở.', 'Romsons Respirometer SH-6082', 'Romsons Respirometer SH-6082.jpeg', 50, 85000),
(24, 'Bộ thử thai Prega News', 'Prega', 'machine', 'Nhận kết quả thử thai chỉ sau 5 phút với bộ thử Prega News. Chỉ cần 3 giọt nước tiểu, dễ sử dụng và đọc kết quả ngay tại nhà.', 'Prega News Pregnancy Test Card', 'Prega News Pregnancy Test Card.jpeg', 48, 17000),
(26, 'Máy đo nồng độ oxy Polymed CMS50C', 'Polymed', 'machine', 'Máy đo nồng độ oxy Polymed CMS50C giúp bạn dễ dàng theo dõi chỉ số SpO2 và nhịp tim tại nhà.', 'Polymed Pulse Oximeter CMS50C', 'Polymed Pulse Oximeter CMS50C.jpeg', 49, 225000),
(27, 'Máy đo đường huyết Freestyle Libre không chích máu', 'ABBOTT', 'machine', 'Hệ thống đo đường huyết Freestyle Libre cho phép quét 1 giây không đau thay vì chích máu.', 'Freestyle Libre Reader - Flash Glucose Monitoring System', 'Freestyle Libre Reader.jpeg', 48, 1500000),
(28, 'Tã người lớn Seni Air Classic thoáng khí (size M)', 'Seni Air', 'self-care', 'Seni là thương hiệu châu Âu về sản phẩm thấm hút và chăm sóc da đã chiếm được lòng tin của hàng triệu bệnh nhân tiểu không tự chủ cũng như người chăm sóc. Kiến thức chuyên sâu và kinh nghiệm phong phú đảm bảo sự thoải mái tối đa và bảo vệ da chuyên biệt khỏi loét.', 'Seni Air Classic Breathable Adult Diapers Medium', 'Seni Air Classic Breathable Adult Diapers Medium.jpeg', 48, 160000),
(29, 'Sữa rửa mặt tạo bọt Saslic DS - 60ml', 'Cipla', 'self-care', 'Sữa rửa mặt tạo bọt Saslic DS chứa axit salicylic giúp thúc đẩy chu kỳ tái tạo tế bào da, làm sạch và giảm mụn.', 'Cipla Saslic DS Foaming Face Wash, 60 ml', 'Cipla Saslic DS Foaming Face Wash, 60 ml.jpg', 50, 130000),
(30, 'Sữa rửa mặt dịu nhẹ Cetaphil - 250ml', 'Cetaphil', 'self-care', 'Sữa rửa mặt dịu nhẹ Cetaphil không chứa xà phòng, làm sạch mà không gây kích ứng, cho da mềm mại, mịn màng.', 'Cetaphil Gentle Skin Cleanser, 250 ml', 'Cetaphil Gentle Skin Cleanser, 250 ml.jpeg', 50, 170000),
(31, 'Kem đánh răng Colgate Sensitive Plus - 70g', 'Colgate', 'self-care', 'Nhạy cảm răng xảy ra khi men bảo vệ bị mòn hoặc tụt nướu làm lộ ngà răng. Khi tiếp xúc với nóng, lạnh, ngọt, tín hiệu truyền đến dây thần kinh gây đau buốt. Colgate Sensitive Plus sử dụng công nghệ Pro-Argin™ giúp giảm đau ngay lập tức và lâu dài bằng cách bịt kín các ống ngà. Sử dụng thường xuyên để bảo vệ răng.', 'Colgate Sensitive Plus Anticavity Toothpaste, 70 gm', 'Colgate Sensitive Plus Anticavity Toothpaste, 70 gm.png', 46, 20000),
(32, 'Xà phòng nghệ & gỗ đàn hương Patanjali - 75g', 'Patanjali', 'self-care', 'Xà phòng Patanjali haldi chandan cho mặt và cơ thể, chứa nghệ, gỗ đàn hương giúp trẻ hóa, nuôi dưỡng và làm sáng da.', 'Patanjali Haldi Chandan Kanti Body Cleanser Soap, 75 gm', 'Patanjali Haldi Chandan Kanti Body Cleanser Soap, 75 gm.jpeg', 50, 6000),
(33, 'Dầu dưỡng da Sri Sri Tattva - 200ml', 'Sri Sri', 'self-care', 'Dầu dưỡng Sri Sri Tattva chứa thành phần tự nhiên và tinh dầu giúp nuôi dưỡng, phục hồi làn da hư tổn, cải thiện tình trạng da, làm mờ dấu hiệu lão hóa.', 'Sri Sri Tattva Body Oil, 200 ml', 'Sri Sri Tattva Body Oil, 200 ml.jpeg', 48, 39000),
(34, 'Dầu gội Amla Jiva - 200ml', 'Jiva Amla', 'self-care', 'Dầu gội Jiva Amla giữ da đầu mát, ngăn rụng tóc, bạc sớm, gàu. Amla có tính chất Ayurvedic cân bằng Pitta, kết hợp các thảo dược khác cho tóc khỏe đẹp.', 'Jiva Amla Shampoo, 200 ml', 'Jiva Amla Shampoo, 200 ml.jpeg', 100, 52000),
(35, 'Nước rửa tay Neem & Chanh Sri Sri - 300ml', 'Sri Sri', 'self-care', 'Nước rửa tay Sri Sri Tattva Neem & Lemon chứa Neem, Chanh, Ushira giúp diệt khuẩn, dưỡng ẩm, khử mùi, bảo vệ tay khỏi vi khuẩn nhưng vẫn dịu nhẹ cho da.', 'Sri Sri Tattva Neem & Lemon Flavoured Kleanup Handwash, 300 ml Pump Bottle', 'Sri Sri Tattva Neem & Lemon Flavoured Kleanup Handwash, 300 ml Pump Bottle.jpeg', 49, 36000),
(36, 'Dung dịch rửa tay khô hoa hồng Sri Sri - 130ml', 'Sri Sri', 'self-care', 'Dung dịch rửa tay khô Sri Sri Tattva Swaccha hương hoa hồng chứa Neem, Nha đam, Ushira giúp diệt khuẩn hiệu quả, giữ tay mềm mại, thơm mát.', 'Sri Sri Tattva Swaccha Rose Flavoured Hand Sanitizer, 130 ml', 'Sri Sri Tattva Swaccha Rose Flavoured Hand Sanitizer, 130 ml.jpeg', 48, 20000),
(37, 'Xịt khử mùi nam Kamasutra Urge - 150ml', 'Kamasutra', 'self-care', 'Xịt khử mùi Kamasutra với công thức quyến rũ giúp bạn nổi bật giữa đám đông.', 'Kamasutra Urge Men Deodorant Spray, 150 ml', 'Kamasutra Urge Men Deodorant Spray, 150 ml.jpeg', 49, 32000),
(38, 'Si-rô tăng cường sức khỏe Himalaya Geriforte 200 ml', 'Himalaya', 'medicine', 'Các thành phần tự nhiên trong Geriforte phối hợp ngăn ngừa tổn thương oxy hóa do gốc tự do ở các cơ quan.', 'Himalaya Geriforte Syrup 200 ml', 'Himalaya Geriforte Syrup 200 ml.jpeg', 49, 38000),
(43, 'Bột trị đầy hơi Eno vị truyền thống 5g', 'Eno', 'medicine', 'Eno giúp trung hòa axit trong dạ dày, bắt đầu tác dụng chỉ sau 6 giây.', 'Eno Regular Flavoured Powder, 5 gm', 'Eno Regular Flavoured Powder, 5 gm.jpeg', 46, 6000),
(44, 'Si-rô ho Benadryl 150 ml', 'Benadryl', 'medicine', 'Si-rô Benadryl điều trị ho, giảm các triệu chứng dị ứng như sổ mũi, nghẹt mũi, hắt hơi, chảy nước mắt.', 'Benadryl Cough Formula Syrup 150 ml', 'Benadryl Cough Formula Syrup 150 ml.jpeg', 50, 35000),
(45, 'Thuốc cảm ho thảo dược Zinda Tilismath 5 ml', 'Zinda', 'medicine', 'Zinda Tilismath là thuốc thảo dược 100% điều trị các bệnh thông thường như cảm, ho.', 'Zinda Tilismath Unani Medicine, 5 ml', 'Zinda Tilismath Unani Medicine, 5 ml.jpeg', 49, 36000),
(46, 'Si-rô chống ngáy Dee Snor 100 ml', 'Dee Snor', 'medicine', 'Dee Snor là si-rô chống ngáy giúp giảm ngáy, hỗ trợ giảm hen suyễn, 100% thảo dược, không tác dụng phụ.', 'Dee Snor Anti Snoring Syrup 100 ml', 'Dee Snor Anti Snoring Syrup 100 ml.jpeg', 47, 52000),
(47, 'Viên uống hỗ trợ tuyến tiền liệt Himalaya Himplasia (30 viên)', 'Himalaya', 'medicine', 'Himplasia hỗ trợ sức khỏe tuyến tiền liệt, chức năng niệu sinh dục, bàng quang, sinh sản, là công thức thảo dược không chứa hormone.', 'Himalaya Himplasia, 30 Tablets', 'Himalaya Himplasia, 30 Tablets.jpeg', 47, 48000),
(48, 'Viên uống lợi tiểu Himalaya Punarnava (60 viên)', 'Himalaya', 'medicine', 'Punarnava hỗ trợ hệ tiết niệu, bảo vệ thận, làm dịu đường tiết niệu.', 'Himalaya Punarnava, 60 Capsules', 'Himalaya Punarnava, 60 Capsules.jpeg', 47, 46000),
(49, 'Viên hỗ trợ tiểu đường Himalaya Diabecon DS (60 viên)', 'Himalaya', 'medicine', 'Diabecon DS hỗ trợ quản lý tiểu đường, là công thức Ayurvedic chứa các thành phần như Gymnema, shilajeet.', 'Himalaya Diabecon DS ,60 Tablets', 'Himalaya Diabecon DS ,60 Tablets.jpeg', 48, 46000),
(50, 'Bộ xét nghiệm nhanh COVID-19 Mylab CoviSelf', 'Mylab', 'machine', 'Bộ xét nghiệm nhanh COVID-19 Mylab CoviSelf giúp bạn tự kiểm tra an toàn, dễ dàng tại nhà chỉ trong 15 phút.', 'Mylab CoviSelf COVID-19 Rapid Antigen Self Test Kit', 'Mylab CoviSelf COVID-19 Rapid Antigen Self Test Kit.jpeg', 50, 138000),
(51, 'Viên nhai bổ sung Vitamin C Limcee 500 mg hương cam (15 viên)', 'ABBOTT', 'medicine', 'Limcee Vitamin C 500 mg cam nhai, bổ sung vitamin C, ngăn ngừa và điều trị thiếu hụt dinh dưỡng, hỗ trợ phát triển cơ thể.', 'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets', 'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets.jpeg', 48, 6000),
(52, 'Viên uống hỗ trợ giảm cân GNC L-Carnitine 500 mg (60 viên)', 'PRO', 'medicine', 'GNC L-Carnitine 500 mg giúp giảm cân, phục hồi cơ bắp, tăng trưởng cơ bắp với liều thiết yếu mỗi ngày.', 'GNC PRO Performance L-Carnitine 500 mg, 60 Capsules', 'GNC PRO Performance L-Carnitine 500 mg, 60 Capsules.jpeg', 60, 320000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_quantity` int(3) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `item_id`, `user_id`, `order_quantity`, `order_date`, `order_status`) VALUES
(238, 48, 55, 1, '2025-07-09', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `expires`) VALUES
(17, 'nguyentai229@gmail.com', 'bd4366c2ce360d861293146e38077d904a83759fb195376baae7d31e76fb21d3', '2025-07-09 13:42:11'),
(18, 'nguyentai2292005@gmail.com', 'ae006e60e668554773088a000c5164cb558d2a2a7cc82c57e74fbc4d5a6b05b6', '2025-07-09 13:49:56'),
(20, 'taint1272@ut.edu.vn', '4fcbed3f6d7c5b643ef9489c4ac87d2bd0cda6e38a6b07c110ba3036b3e37388', '2025-07-09 14:05:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_id` int(3) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_lname`, `email`, `user_password`, `user_id`, `user_fname`, `user_address`) VALUES
('Nguyen', 'user@gmail.com', '$2y$10$Awb6W8qLz.AjCsM5Wo2Q8uujiGHiUmKhOuexERVtf1mnivVh7Zwim', 55, 'Tai', 'Phú an - Đức Hiệp - Mộ Đức - Quảng Ngãi'),
('Nguyễn', 'nguyentai2292005@gmail.com', '$2y$10$EW3knMmy1lAoopyC/AtQzenQIXOWjxVgFCVT7ztSid4UHJ98TBohW', 94, 'Tài', 'quảng ngãi'),
('Nguyen', 'taint1272@ut.edu.vn', '$2y$10$nCybwu1JlASsFy5fdEl4Ke78fUPosVyMTKkXhaZYc..Zi6xuobEhS', 96, 'Tai', 'quảng ngãi');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
