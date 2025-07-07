-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 23, 2022 at 10:35 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_fname` varchar(20) NOT NULL,
  `admin_lname` varchar(20) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_fname`, `admin_lname`, `admin_password`) VALUES
(4, 'admin@gmail.com', 'Nguyen', 'Tai', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `item`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_title`, `item_brand`, `item_cat`, `item_details`, `item_tags`, `item_image`, `item_quantity`, `item_price`) VALUES
(15, 'Accu-Chek Active Glucometer Test Strips Box Of 50', 'Accu-Chek', 'machine', 'Mức đường huyết trong cơ thể bạn có thể dễ dàng kiểm tra với que thử Accu-Chek Active. Chúng đã được kiểm chứng về độ chính xác, dễ sử dụng hàng ngày và không cần mã thủ công. Chỉ cần cắm que thử, lấy mẫu máu nhỏ, để nó thấm và đọc kết quả trên màn hình. Que thử Accu-Chek Glucometer dùng cho bệnh nhân tiểu đường tuýp 1 và 2. Không sử dụng que quá hạn ghi trên hộp. Accu-Chek Active cho phép bạn kiểm tra lại và xác minh kết quả hiển thị.', 'Accu-Chek Active Glucometer Test Strips Box Of 50, máy đo, que thử đường huyết', 'Strips.jpg', 50, 800),
(18, 'Omron Blood Pressure Monitor HEM-7121J', 'Omron', 'machine', 'Máy đo huyết áp Omron Hem-7121J tự động với công nghệ IntelliSense mang lại sự thoải mái cho người dùng. Nó báo OK khi quấn vòng bít đúng cách, đảm bảo áp suất phù hợp để cho kết quả chính xác, nhanh chóng. Dễ dàng theo dõi huyết áp tại nhà.', 'Omron Blood Pressure Monitor HEM-7121J, đo huyết áp', 'Blood Pressure.jpg', 49, 1759),
(19, 'Omron Compressor Nebulizer Ne-C106', 'Omron', 'machine', 'Hít thở dễ dàng, thoải mái với máy xông mũi họng Omron Ne-C106 giúp bạn hít thuốc. Thiết kế dễ sử dụng cho cả người lớn và trẻ em.', 'Omron Compressor Nebulizer Ne-C106', 'Omron Compressor Nebulizer Ne-C106.jpeg', 50, 1492),
(20, 'OneTouch Select Plus Simple Glucometer (FREE 10 strips + lancing device + 10 lancets)', 'OneTouch', 'machine', 'OneTouch Select Plus Simple là hệ thống đo đường huyết dễ sử dụng, chính xác, gần như không đau. OneTouch® là thương hiệu được bác sĩ tiểu đường Việt Nam khuyên dùng nhiều nhất (theo khảo sát 2020 với 150 bác sĩ).', 'OneTouch Select Plus Simple Glucometer (kèm 10 que thử + bút chích + 10 kim)', 'OneTouch Select Plus Simple Glucometer.jpeg', 48, 871),
(21, 'Accu-Chek Active Blood Glucose Monitoring System With 10 Free Test Strips', 'Accu-Chek', 'machine', 'Hệ thống đo đường huyết Accu-Chek Active cho kết quả chính xác tại nhà, dễ sử dụng, nhỏ gọn, nhanh có kết quả dễ hiểu.', 'Accu-Chek Active Blood Glucose Monitoring System With 10 Free Test Strips', 'Accu-Chek Active Blood Glucose Monitoring System.jpeg', 50, 1321),
(22, 'Apollo Pharmacy Digital Flexible Thermometer', 'Apollo', 'machine', 'Nhiệt kế Apollo phản hồi nhanh, độ chính xác cao (±0,2°F), màn hình LCD dễ đọc, pin lâu lên đến 200 giờ. Có tín hiệu báo khi đo xong, tự động tắt.', 'Apollo Pharmacy Digital Flexible Thermometer', 'Apollo Pharmacy Digital Flexible Thermometer.jpeg', 50, 100),
(23, 'Romsons Respirometer SH-6082', 'ROMSONS', 'machine', 'Máy tập thở Romsons Respirometer SH-6082 giúp tập luyện phổi hiệu quả với thiết kế 3 bóng, dễ cầm, vỏ trong suốt để theo dõi quá trình tập thở.', 'Romsons Respirometer SH-6082', 'Romsons Respirometer SH-6082.jpeg', 50, 275),
(24, 'Prega News Pregnancy Test Card', 'Prega', 'machine', 'Nhận kết quả thử thai chỉ sau 5 phút với bộ thử Prega News. Chỉ cần 3 giọt nước tiểu, dễ sử dụng và đọc kết quả ngay tại nhà.', 'Prega News Pregnancy Test Card', 'Prega News Pregnancy Test Card.jpeg', 48, 55),
(26, 'Polymed Pulse Oximeter CMS50C', 'Polymed', 'machine', 'Máy đo nồng độ oxy Polymed CMS50C giúp bạn dễ dàng theo dõi chỉ số SpO2 và nhịp tim tại nhà.', 'Polymed Pulse Oximeter CMS50C', 'Polymed Pulse Oximeter CMS50C.jpeg', 49, 750),
(27, 'Freestyle Libre Reader - Flash Glucose Monitoring System', 'ABBOTT', 'machine', 'Hệ thống đo đường huyết Freestyle Libre cho phép quét 1 giây không đau thay vì chích máu.', 'Freestyle Libre Reader - Flash Glucose Monitoring System', 'Freestyle Libre Reader.jpeg', 48, 4999),
(28, 'Seni Air Classic Breathable Adult Diapers Medium', 'Seni Air', 'self-care', 'Seni là thương hiệu châu Âu về sản phẩm thấm hút và chăm sóc da đã chiếm được lòng tin của hàng triệu bệnh nhân tiểu không tự chủ cũng như người chăm sóc. Kiến thức chuyên sâu và kinh nghiệm phong phú đảm bảo sự thoải mái tối đa và bảo vệ da chuyên biệt khỏi loét.', 'Seni Air Classic Breathable Adult Diapers Medium', 'Seni Air Classic Breathable Adult Diapers Medium.jpeg', 48, 550),
(29, 'Cipla Saslic DS Foaming Face Wash, 60 ml', 'Cipla', 'self-care', 'Sữa rửa mặt tạo bọt Saslic DS chứa axit salicylic giúp thúc đẩy chu kỳ tái tạo tế bào da, làm sạch và giảm mụn.', 'Cipla Saslic DS Foaming Face Wash, 60 ml', 'Cipla Saslic DS Foaming Face Wash, 60 ml.jpg', 50, 435),
(30, 'Cetaphil Gentle Skin Cleanser, 250 ml', 'Cetaphil', 'self-care', 'Sữa rửa mặt dịu nhẹ Cetaphil không chứa xà phòng, làm sạch mà không gây kích ứng, cho da mềm mại, mịn màng.', 'Cetaphil Gentle Skin Cleanser, 250 ml', 'Cetaphil Gentle Skin Cleanser, 250 ml.jpeg', 50, 563),
(31, 'Colgate Sensitive Plus Anticavity Toothpaste, 70 gm', 'Colgate', 'self-care', 'Nhạy cảm răng xảy ra khi men bảo vệ bị mòn hoặc tụt nướu làm lộ ngà răng. Khi tiếp xúc với nóng, lạnh, ngọt, tín hiệu truyền đến dây thần kinh gây đau buốt. Colgate Sensitive Plus sử dụng công nghệ Pro-Argin™ giúp giảm đau ngay lập tức và lâu dài bằng cách bịt kín các ống ngà. Sử dụng thường xuyên để bảo vệ răng.', 'Colgate Sensitive Plus Anticavity Toothpaste, 70 gm', 'Colgate Sensitive Plus Anticavity Toothpaste, 70 gm.png', 46, 65),
(32, 'Patanjali Haldi Chandan Kanti Body Cleanser Soap, 75 gm', 'Patanjali', 'self-care', 'Xà phòng Patanjali haldi chandan cho mặt và cơ thể, chứa nghệ, gỗ đàn hương giúp trẻ hóa, nuôi dưỡng và làm sáng da.', 'Patanjali Haldi Chandan Kanti Body Cleanser Soap, 75 gm', 'Patanjali Haldi Chandan Kanti Body Cleanser Soap, 75 gm.jpeg', 50, 18),
(33, 'Sri Sri Tattva Body Oil, 200 ml', 'Sri Sri', 'self-care', 'Dầu dưỡng Sri Sri Tattva chứa thành phần tự nhiên và tinh dầu giúp nuôi dưỡng, phục hồi làn da hư tổn, cải thiện tình trạng da, làm mờ dấu hiệu lão hóa.', 'Sri Sri Tattva Body Oil, 200 ml', 'Sri Sri Tattva Body Oil, 200 ml.jpeg', 48, 130),
(34, 'Jiva Amla Shampoo, 200 ml', 'Jiva Amla ', 'self-care', 'Dầu gội Jiva Amla giữ da đầu mát, ngăn rụng tóc, bạc sớm, gàu. Amla có tính chất Ayurvedic cân bằng Pitta, kết hợp các thảo dược khác cho tóc khỏe đẹp.', 'Jiva Amla Shampoo, 200 ml', 'Jiva Amla Shampoo, 200 ml.jpeg', 100, 175),
(35, 'Sri Sri Tattva Neem & Lemon Flavoured Kleanup Handwash, 300 ml Pump Bottle', 'Sri Sri', 'self-care', 'Nước rửa tay Sri Sri Tattva Neem & Lemon chứa Neem, Chanh, Ushira giúp diệt khuẩn, dưỡng ẩm, khử mùi, bảo vệ tay khỏi vi khuẩn nhưng vẫn dịu nhẹ cho da.', 'Sri Sri Tattva Neem & Lemon Flavoured Kleanup Handwash, 300 ml Pump Bottle', 'Sri Sri Tattva Neem & Lemon Flavoured Kleanup Handwash, 300 ml Pump Bottle.jpeg', 50, 121),
(36, 'Sri Sri Tattva Swaccha Rose Flavoured Hand Sanitizer, 130 ml', 'Sri Sri', 'self-care', 'Dung dịch rửa tay khô Sri Sri Tattva Swaccha hương hoa hồng chứa Neem, Nha đam, Ushira giúp diệt khuẩn hiệu quả, giữ tay mềm mại, thơm mát.', 'Sri Sri Tattva Swaccha Rose Flavoured Hand Sanitizer, 130 ml', 'Sri Sri Tattva Swaccha Rose Flavoured Hand Sanitizer, 130 ml.jpeg', 48, 65),
(37, 'Kamasutra Urge Men Deodorant Spray, 150 ml', 'Kamasutra', 'self-care', 'Xịt khử mùi Kamasutra với công thức quyến rũ giúp bạn nổi bật giữa đám đông.', 'Kamasutra Urge Men Deodorant Spray, 150 ml', 'Kamasutra Urge Men Deodorant Spray, 150 ml.jpeg', 49, 105),
(38, 'Himalaya Geriforte Syrup 200 ml', 'Himalaya', 'medicine', 'Các thành phần tự nhiên trong Geriforte phối hợp ngăn ngừa tổn thương oxy hóa do gốc tự do ở các cơ quan.', 'Himalaya Geriforte Syrup 200 ml', 'Himalaya Geriforte Syrup 200 ml.jpeg', 50, 125),
(43, 'Eno Regular Flavoured Powder, 5 gm', 'Eno', 'medicine', 'Eno giúp trung hòa axit trong dạ dày, bắt đầu tác dụng chỉ sau 6 giây.', 'Eno Regular Flavoured Powder, 5 gm', 'Eno Regular Flavoured Powder, 5 gm.jpeg', 48, 19),
(44, 'Benadryl Cough Formula Syrup 150 ml', 'Benadryl', 'medicine', 'Si-rô Benadryl điều trị ho, giảm các triệu chứng dị ứng như sổ mũi, nghẹt mũi, hắt hơi, chảy nước mắt.', 'Benadryl Cough Formula Syrup 150 ml', 'Benadryl Cough Formula Syrup 150 ml.jpeg', 50, 115),
(45, 'Zinda Tilismath Unani Medicine, 5 ml', 'Zinda', 'medicine', 'Zinda Tilismath là thuốc thảo dược 100% điều trị các bệnh thông thường như cảm, ho.', 'Zinda Tilismath Unani Medicine, 5 ml', 'Zinda Tilismath Unani Medicine, 5 ml.jpeg', 50, 119),
(46, 'Dee Snor Anti Snoring Syrup 100 ml', 'Dee Snor', 'medicine', 'Dee Snor là si-rô chống ngáy giúp giảm ngáy, hỗ trợ giảm hen suyễn, 100% thảo dược, không tác dụng phụ.', 'Dee Snor Anti Snoring Syrup 100 ml', 'Dee Snor Anti Snoring Syrup 100 ml.jpeg', 49, 174),
(47, 'Himalaya Himplasia, 30 Tablets', 'Himalaya', 'medicine', 'Himplasia hỗ trợ sức khỏe tuyến tiền liệt, chức năng niệu sinh dục, bàng quang, sinh sản, là công thức thảo dược không chứa hormone.', 'Himalaya Himplasia, 30 Tablets', 'Himalaya Himplasia, 30 Tablets.jpeg', 47, 160),
(48, 'Himalaya Punarnava, 60 Capsules', 'Himalaya', 'medicine', 'Punarnava hỗ trợ hệ tiết niệu, bảo vệ thận, làm dịu đường tiết niệu.', 'Himalaya Punarnava, 60 Capsules', 'Himalaya Punarnava, 60 Capsules.jpeg', 50, 152),
(49, 'Himalaya Diabecon DS ,60 Tablets', 'Himalaya', 'medicine', 'Diabecon DS hỗ trợ quản lý tiểu đường, là công thức Ayurvedic chứa các thành phần như Gymnema, shilajeet.', 'Himalaya Diabecon DS ,60 Tablets', 'Himalaya Diabecon DS ,60 Tablets.jpeg', 48, 152),
(50, 'Mylab CoviSelf COVID-19 Rapid Antigen Self Test Kit', 'Mylab', 'machine', 'Bộ xét nghiệm nhanh COVID-19 Mylab CoviSelf giúp bạn tự kiểm tra an toàn, dễ dàng tại nhà chỉ trong 15 phút.', 'Mylab CoviSelf COVID-19 Rapid Antigen Self Test Kit', 'Mylab CoviSelf COVID-19 Rapid Antigen Self Test Kit.jpeg', 50, 452),
(51, 'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets', 'ABBOTT', 'medicine', 'Limcee Vitamin C 500 mg cam nhai, bổ sung vitamin C, ngăn ngừa và điều trị thiếu hụt dinh dưỡng, hỗ trợ phát triển cơ thể.', 'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets', 'Limcee Vitamin C 500 mg Orange Flavour Chewable, 15 Tablets.jpeg', 49, 20),
(52, 'GNC PRO Performance L-Carnitine 500 mg, 60 Capsules', 'PRO', 'medicine', 'GNC L-Carnitine 500 mg giúp giảm cân, phục hồi cơ bắp, tăng trưởng cơ bắp với liều thiết yếu mỗi ngày.', 'GNC PRO Performance L-Carnitine 500 mg, 60 Capsules', 'GNC PRO Performance L-Carnitine 500 mg, 60 Capsules.jpeg', 60, 1049);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_quantity` int(3) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `item_id`, `user_id`, `order_quantity`, `order_date`, `order_status`) VALUES
(210, 27, 55, 1, '2022-03-18', 1),
(211, 18, 55, 1, '2022-03-18', 1),
(212, 28, 55, 1, '2022-03-18', 0),
(213, 33, 55, 2, '2022-03-19', 0),
(214, 20, 55, 2, '2022-03-19', 0),
(215, 37, 55, 1, '2022-03-19', 0),
(216, 31, 55, 4, '2022-03-19', 0),
(217, 43, 55, 2, '2022-03-23', 0),
(218, 24, 55, 2, '2022-03-23', 0),
(219, 49, 55, 2, '2022-03-23', 0),
(220, 28, 55, 1, '2022-03-23', 0),
(221, 27, 55, 1, '2022-03-23', 0),
(222, 51, 55, 1, '2022-03-23', 0),
(223, 46, 55, 1, '2022-03-24', 0),
(224, 26, 55, 1, '2022-03-24', 0),
(225, 47, 55, 3, '2022-03-24', 0),
(226, 36, 55, 2, '2022-03-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_Lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_id` int(3) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_Lname`, `email`, `user_password`, `user_id`, `user_fname`, `user_address`) VALUES
('user', 'user@gmail.com', 'user', 55, 'user', 'Phu An-Duc Hiep-Mo Duc-Quang Ngai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
